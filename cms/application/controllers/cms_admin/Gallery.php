<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('cms_admin/gallery_model', 'Gallery');
		//$this->load->view('common/header');
		if(isset($this->session->userdata['email'])){
			$this->load->view('common/header');
		}else{
			redirect('admin/login');
		} 
	}
	
	//Start of function to get list of all gallery records
	public function GalleryList(){
		$data['records'] = $this->Gallery->GetAllGalleryData();
		$this->load->view('gallery/list', $data);
		$this->load->view('common/footer');
	}
	//End of function to get list of all gallery records
	
	//Start of function to create new gallery record
	public function GalleryCreate(){
		$this->form_validation->set_rules('galleryDescription', 'Description', 'trim|required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('gallery/add');
			$this->load->view('common/footer');
			
		}
		else
		{
			
			if($_FILES['galleryPic']['error'] == 0){
				$file_name=time().'_'.$_FILES['galleryPic']['name'];
				$img_name = str_replace(' ', '_', $file_name);
				if (!is_dir('assets/gallery/')) {
					mkdir('./assets/gallery', 0777, TRUE);
					mkdir('./assets/gallery/original/', 0777, TRUE);
					mkdir('./assets/gallery/thumb/', 0777, TRUE);
				}
				$dir = './assets/gallery/original/';
				
				//upload and update the file
				$config['file_name'] = $img_name;
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'png|jpg|jpeg|gif';
				$config['max_size'] = "2048000";
				$config['overwrite'] = false;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('galleryPic'))
				{//echo"<pre>";print_r($this->upload->display_errors('', ''));exit;
					$this->session->set_flashdata('message', $this->upload->display_errors('', ''));
					redirect('admin/gallery/add');
				}
				else{
					$rz_dir = './assets/gallery/thumb/';
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
					
					$this->Gallery->CreateGalleryContent($img_name);
				}
				
			}else{
				$img_name = '';
				$this->Gallery->CreateGalleryContent($img_name);
			}
			$this->session->set_flashdata('msg', 'Gallery Content created successfully!');
			redirect('admin/gallery');
		}
	}
	//End of function to create new gallery record
	
	
	//Start of function to update gallery record
	public function GalleryUpdate($gallery_id){
		$this->form_validation->set_rules('galleryDescription', 'Description', 'trim|required');
		$data['details'] = $this->Gallery->GetGalleryContentDetailsByID($gallery_id);
		$data['id'] = $gallery_id;
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('gallery/edit', $data);
			$this->load->view('common/footer');
			
		}
		else
		{
			
			if($_FILES['galleryPic']['error'] == 0){
				$file_name=time().'_'.$_FILES['galleryPic']['name'];
				$img_name = str_replace(' ', '_', $file_name);
				if (!is_dir('assets/gallery/')) {
					mkdir('./assets/gallery/', 0777, TRUE);
					mkdir('./assets/gallery/original/', 0777, TRUE);
					mkdir('./assets/gallery/thumb/', 0777, TRUE);
				}
				$dir = './assets/gallery/original/';
				
				//upload and update the file
				$config['file_name'] = $img_name;
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'png|jpg|jpeg|gif';
				$config['max_size'] = "2048000";
				$config['overwrite'] = false;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('galleryPic'))
				{echo"<pre>";print_r('Error');exit;
				$this->session->set_flashdata('message', $this->upload->display_errors('', ''));
				redirect('admin/gallery');
				}
				else{
					$rz_dir = './assets/gallery/thumb/';
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
					$this->Gallery->DeleteOldFiles($gallery_id);
					$this->Gallery->UpdateGalleryContent($img_name, $gallery_id);
				}
				
			}else{
				$img_name = $this->input->post('oldGalleryPic');
				$this->Gallery->UpdateGalleryContent($img_name, $gallery_id);
			}
			$this->session->set_flashdata('msg', 'Gallery Content updated successfully!');
			redirect('admin/gallery');
		}
	}
	//End of function to update gallery record
	
	//Start of function to delete gallery record
	public function GalleryDelete(){
		$gallery_id = $_REQUEST['gallery_id'];
		$this->Gallery->DeleteGalleryContentByID($gallery_id);
	}
	//End of function to delete gallery record
}