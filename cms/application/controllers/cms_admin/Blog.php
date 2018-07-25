<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public $is_hookable = TRUE;
	public function __construct(){
		parent::__construct();
		$this->load->model('cms_admin/blog_model', 'Blog');
		if(isset($this->session->userdata['email'])){
			$this->load->view('common/header');
		}else{
			redirect('admin/login');
		} 
	}
	
	//Start of function to get list of all blogs
	public function BlogList(){
		$data['blogs'] = $this->Blog->GetAllBlogs();
		$this->load->view('blog/list', $data);
		$this->load->view('common/footer');
	}
	//End of function to get list of all blogs
	
	//Start of function to create blog
	public function BlogCreate(){
		$this->form_validation->set_rules('blogTitle', 'Title', 'trim|required');
		$this->form_validation->set_rules('blogDescription', 'Description', 'trim|required');
		if ($this->form_validation->run() === FALSE){
			$this->load->view('blog/add');
			$this->load->view('common/footer');
			
		}else{
			if($_FILES['blogImage']['error'] == 0){
				$file_name=time().'_'.$_FILES['blogImage']['name'];
				$img_name = str_replace(' ', '_', $file_name);
				if (!is_dir('assets/blogs/')) {
					mkdir('./assets/blogs/', 0777, TRUE);
					mkdir('./assets/blogs/original/', 0777, TRUE);
					mkdir('./assets/blogs/thumb/', 0777, TRUE);
				}
				$dir = './assets/blogs/original/';
				
				//upload and update the file
				$config['file_name'] = $img_name;
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'png|jpg|jpeg|gif';
				$config['max_size'] = "2048000";
				$config['overwrite'] = false;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('blogImage'))
				{echo"<pre>";print_r($this->upload->display_errors('', ''));exit;
				$this->session->set_flashdata('message', $this->upload->display_errors('', ''));
				redirect('school/events/list');
				}
				else{
					$rz_dir = './assets/blogs/thumb/';
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
				}
				
			}else{
				$img_name = '';
			}
			$this->Blog->CreateBlog($img_name);
			$this->session->set_flashdata('msg', 'Blog created successfully!');
			redirect('admin/blog');
		}
	}
	//End of function to create blog
	
	//Start of function to update blog
	public function BlogUpdate($slug){
		$data['slug'] = $slug;
		$data['blog_details'] = $this->Blog->GetBlogDetailsBySlug($slug);
		$old_image = $data['blog_details']->blog_image;
		$this->form_validation->set_rules('blogTitle', 'Title', 'trim|required');
		$this->form_validation->set_rules('blogDescription', 'Description', 'trim|required');
		if ($this->form_validation->run() === FALSE){
			$this->load->view('blog/edit', $data);
			$this->load->view('common/footer');
			
		}else{
			if($_FILES['blogImage']['error'] == 0){
				$file_name=time().'_'.$_FILES['blogImage']['name'];
				$img_name = str_replace(' ', '_', $file_name);
				if (!is_dir('assets/blogs/')) {
					mkdir('./assets/blogs/', 0777, TRUE);
					mkdir('./assets/blogs/original/', 0777, TRUE);
					mkdir('./assets/blogs/thumb/', 0777, TRUE);
				}
				$dir = './assets/blogs/original/';
				
				//upload and update the file
				$config['file_name'] = $img_name;
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'png|jpg|jpeg|gif';
				$config['max_size'] = "2048000";
				$config['overwrite'] = false;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('blogImage'))
				{echo"<pre>";print_r($this->upload->display_errors('', ''));exit;
				$this->session->set_flashdata('message', $this->upload->display_errors('', ''));
				redirect('admin/blog');
				}
				else{
					$rz_dir = './assets/blogs/thumb/';
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
				}
				unlink('./assets/blogs/original/'.$old_image);
				unlink('./assets/blogs/thumb/'.$old_image);
			}else{
				$img_name = $this->input->post('oldBlogImage');
			}
			$this->Blog->UpdateBlog($slug, $img_name);
			$this->session->set_flashdata('msg', 'Blog updated successfully!');
			redirect('admin/blog');
		}
	}
	//End of function to update blog
	
	//Start of function to vew blog details
	public function BlogDetails($slug){
		$data['blog_details'] = $this->Blog->GetBlogDetailsBySlug($slug);
		$this->load->view('blog/detail', $data);
		$this->load->view('common/footer');
	}
	//End of function to view blog details
	
	//Start of function to delete blog
	public function BlogDelete(){
		$blog_id = $this->input->post('blog_id');
		$this->Blog->DeleteBlog($blog_id);
	}
	//End of function to delete blog
}