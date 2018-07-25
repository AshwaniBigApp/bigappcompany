<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('cms_admin/faq_model', 'FAQ');
		//$this->load->view('common/header');
		if(isset($this->session->userdata['email'])){
			$this->load->view('common/header');
		}else{
			redirect('admin/login');
		} 
	}
	
	//Start of function to get list of all faq's
	public function FaqList(){
		$data['faqs'] = $this->FAQ->GetAllFAQ();
		$this->load->view('faq/list', $data);
		$this->load->view('common/footer');
	}
	//End of function to get list of all faq's
	
	//Start of function to create new faq
	public function FaqCreate(){
		$this->form_validation->set_rules('question', 'Question', 'trim|required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('faq/add');
			$this->load->view('common/footer');
			
		}
		else
		{
			$record = $this->FAQ->CreateFAQ();
			//echo"<pre>";print_r($record);exit;
			if($record == 1){
				$this->session->set_flashdata('msg', 'FAQ created successfully!');
				redirect('admin/faq');
			}else{
				$this->session->set_flashdata('error_msg', 'This question is already created!');
				$this->load->view('faq/add');
				$this->load->view('common/footer');
			}
			
		}
	}
	//End of function to create new faq
	
	//Start of function to update faq
	public function FaqUpdate($faq_id){
		$this->form_validation->set_rules('question', 'Question', 'trim|required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		$data['details'] = $this->FAQ->GetFAQDetailsByID($faq_id);
		$data['faq_id'] = $faq_id;
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('faq/edit', $data);
			$this->load->view('common/footer');
			
		}
		else
		{
			$this->FAQ->UpdateFAQ($faq_id);
			$this->session->set_flashdata('msg', 'FAQ updated successfully!');
			redirect('admin/faq');
		}
	}
	//End of function to update faq
	
	//Start of function to delete faq
	public function FaqDelete(){
		$faq_id = $_REQUEST['faq_id'];
		$this->FAQ->DeleteFAQByID($faq_id);
	}
	//End of function to delete faq
}