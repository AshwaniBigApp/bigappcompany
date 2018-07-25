<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('cms_admin/team_model', 'Team');
		//$this->load->view('common/header');
		if(isset($this->session->userdata['email'])){
			$this->load->view('common/header');
		}else{
			redirect('admin/login');
		} 
	}
	
	//Start of function to get list of all team records
	public function TeamList(){
		$data['records'] = $this->Team->GetAllTeamMembers();
		$this->load->view('team/list', $data);
		$this->load->view('common/footer');
	}
	//End of function to get list of all team records
	
	//Start of function to create new Team record
	public function TeamCreate(){
		$this->form_validation->set_rules('memberName', 'Name', 'trim|required');
		$this->form_validation->set_rules('memberDesignation', 'Designation', 'trim|required');
		$this->form_validation->set_rules('memberDescription', 'Description', 'trim|required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('team/add');
			$this->load->view('common/footer');
			
		}
		else
		{
			
			if($_FILES['memberImage']['error'] == 0){
				$file_name=time().'_'.$_FILES['memberImage']['name'];
				$img_name = str_replace(' ', '_', $file_name);
				if (!is_dir('assets/team/')) {
					mkdir('./assets/team', 0777, TRUE);
					mkdir('./assets/team/original/', 0777, TRUE);
					mkdir('./assets/team/thumb/', 0777, TRUE);
				}
				$dir = './assets/team/original/';
				
				//upload and update the file
				$config['file_name'] = $img_name;
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'png|jpg|jpeg|gif';
				$config['max_size'] = "2048000";
				$config['overwrite'] = false;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('memberImage'))
				{//echo"<pre>";print_r($this->upload->display_errors('', ''));exit;
					$this->session->set_flashdata('message', $this->upload->display_errors('', ''));
					redirect('admin/team/add');
				}
				else{
					$rz_dir = './assets/team/thumb/';
					$resized_file_name = $this->upload->file_name;
					//Image Resizing
					$config1['image_library'] = 'gd2';
					$config1['file_name'] = $resized_file_name;
					$config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config1['new_image'] = $rz_dir.$resized_file_name;
					$config1['maintain_ratio'] = TRUE;
					$config1['overwrite'] = true;
					$config1['width'] = 350;
					$config1['height'] = 175;
					
					//echo"<pre>";print_r($config1);exit;
					$this->load->library('image_lib', $config1);
					$this->image_lib->initialize($config1);
					
					if ( ! $this->image_lib->resize()){
						echo"<pre>";print_r($this->upload->display_errors());exit;
						$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
					}
					
					$this->Team->CreateTeamMember($img_name);
				}
				
			}else{
				$img_name = '';
				$this->Team->CreateTeamMember($img_name);
			}
			$this->session->set_flashdata('msg', 'Team member created successfully!');
			redirect('admin/team');
		}
	}
	//End of function to create new Team record
	
	
	//Start of function to update Team record
	public function TeamUpdate($member_id){
		$this->form_validation->set_rules('memberName', 'Name', 'trim|required');
		$this->form_validation->set_rules('memberDesignation', 'Designation', 'trim|required');
		$this->form_validation->set_rules('memberDescription', 'Description', 'trim|required');
		$data['details'] = $this->Team->GetMemberDetailsByID($member_id);
		$data['id'] = $member_id;
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('team/edit', $data);
			$this->load->view('common/footer');
			
		}
		else
		{
			
			if($_FILES['memberImage']['error'] == 0){
				$file_name=time().'_'.$_FILES['memberImage']['name'];
				$img_name = str_replace(' ', '_', $file_name);
				if (!is_dir('assets/team/')) {
					mkdir('./assets/team/', 0777, TRUE);
					mkdir('./assets/team/original/', 0777, TRUE);
					mkdir('./assets/team/thumb/', 0777, TRUE);
				}
				$dir = './assets/team/original/';
				
				//upload and update the file
				$config['file_name'] = $img_name;
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'png|jpg|jpeg|gif';
				$config['max_size'] = "2048000";
				$config['overwrite'] = false;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('memberImage'))
				{echo"<pre>";print_r('Error');exit;
				$this->session->set_flashdata('message', $this->upload->display_errors('', ''));
				redirect('admin/team');
				}
				else{
					$rz_dir = './assets/team/thumb/';
					$resized_file_name = $this->upload->file_name;
					//Image Resizing
					$config1['image_library'] = 'gd2';
					$config1['file_name'] = $resized_file_name;
					$config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config1['new_image'] = $rz_dir.$resized_file_name;
					$config1['maintain_ratio'] = TRUE;
					$config1['overwrite'] = true;
					$config1['width'] = 350;
					$config1['height'] = 175;
					
					
					$this->load->library('image_lib', $config1);
					$this->image_lib->initialize($config1);
					if ( ! $this->image_lib->resize()){
						echo"<pre>";print_r($this->image_lib->display_errors('', ''));exit;
						$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
					}
					$this->Team->DeleteOldFiles($member_id);
					$this->Team->UpdateMemberDetails($img_name, $member_id);
				}
				
			}else{
				$img_name = $this->input->post('oldmemberImage');
				$this->Team->UpdateMemberDetails($img_name, $member_id);
			}
			$this->session->set_flashdata('msg', 'Member Details updated successfully!');
			redirect('admin/team');
		}
	}
	//End of function to update Team record
	
	//Start of function to delete Team record
	public function TeamDelete(){
		$member_id = $_REQUEST['member_id'];
		$this->Team->DeleteTeamMemberByID($member_id);
	}
	//End of function to delete Team record
}