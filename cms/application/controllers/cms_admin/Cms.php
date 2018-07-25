<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('cms_admin/cms_model', 'Cms');
		//$this->load->view('common/header');
		if(isset($this->session->userdata['email'])){
			$this->load->view('common/header');
		}else{
			redirect('admin/login');
		} 
	}
	
	//Start of function to get list of all cms pages
	public function CmsList(){
		$data['pages'] = $this->Cms->GetAllCmsData();
		$this->load->view('cms/list', $data);
		$this->load->view('common/footer');
	}
	//End of function to get list of all cms pages
	
	//Start of function to create new cms content
	public function CmsCreate(){
		$this->form_validation->set_rules('pageName', 'Page name', 'trim|required|callback_check_page');
		$this->form_validation->set_rules('pageContent', 'Content', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('cms/add');
			$this->load->view('common/footer');
			
		}
		else
		{
			$this->Cms->CreateCmsContent();
			$this->session->set_flashdata('msg', 'Cms Content created successfully!');
			redirect('admin/cms');
		}
	}
	//End of function to create new cms content
	
	//Start of function to check if page already created
	public function check_page($page){
		$verify_page = $this->Cms->CheckIfPageExists($page);
		if($verify_page == '1'){
			$this->form_validation->set_message('check_page', 'Content for this page is already created!');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	//End of function to check if page already created
	
	//Start of function to update cms content
	public function CmsUpdate($cms_id){
		$this->form_validation->set_rules('pageName', 'Page name', 'trim|required');
		$this->form_validation->set_rules('pageContent', 'Content', 'required');
		$data['details'] = $this->Cms->GetCmsContentDetailsByID($cms_id);
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('cms/edit', $data);
			$this->load->view('common/footer');
			
		}
		else
		{
			$this->Cms->UpdateCmsContent($cms_id);
			$this->session->set_flashdata('msg', 'Cms Content updated successfully!');
			redirect('admin/cms');
		}
	}
	//End of function to update cms content
	
	//Start of function to delete cms content
	public function CmsDelete(){
		$cms_id = $_REQUEST['cms_id'];
		$this->Cms->DeleteCmsContentByID($cms_id);
	}
	//End of function to delete cms content
}