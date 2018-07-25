<?php
class Blog_model extends CI_Model{
	//start of function to get all records from blogs table
	public function GetAllBlogs(){
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->join('users', 'blogs.blog_author = users.admin_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	//end of function to get all records from blogs table
	
	//start of function to insert record in blog table
	public function CreateBlog($img_name){
		$slug = url_title($this->input->post('blogTitle'), 'dash', TRUE);
		$data = array(
				'blog_title' => $this->input->post('blogTitle'),
				'blog_slug' => $slug,
				'blog_description' => $this->input->post('blogDescription'),
				'blog_image' => $img_name,
				'blog_author' => 'Admin',
		);
		$this->db->insert('blogs', $data);
	}
	//end of function to insert record in blog table
	
	//start of function to get record details from table by slug
	public function GetBlogDetailsBySlug($slug){
		$query = $this->db->get_where('blogs', array(
				'blog_slug' => $slug,
		));
		$data = $query->result();
		if(!empty($data)){
			return $data[0];
		}
	}
	//end of function to get record details from table by slug
	
	//start of function to update record details in table by slug
	public function UpdateBlog($old_slug, $img_name){
		$slug = url_title($this->input->post('blogTitle'), 'dash', TRUE);
		$data = array(
				'blog_title' => $this->input->post('blogTitle'),
				'blog_slug' => $slug,
				'blog_description' => $this->input->post('blogDescription'),
				'blog_image' => $img_name,
				'blog_author' => 'Admin',
		);
		$this->db->where('blog_slug', $old_slug);
		$this->db->update('blogs', $data);
	}
	//end of function to update record details in table by slug
	
	//start of function to delete record from table by id
	public function DeleteBlog($blog_id){
		$blog_image = $this->GetBlogImageNameByBlogID($blog_id);
		$this->db->where('blog_id', $blog_id);
		if($this->db->delete('blogs')){
			unlink('./assets/blogs/original/'.$blog_image);
			unlink('./assets/blogs/thumb/'.$blog_image);
		}
	}
	//end of function to delete record from table by id
	
	//start of fucntion to get blog image name by blog id
	private function GetBlogImageNameByBlogID($blog_id){
		$this->db->select('blog_image');
		$this->db->from('blogs');
		$this->db->where(array(
				'blog_id' => $blog_id,
		));
		$query = $this->db->get();
		$data = $query->result();
		if(!empty($data)){
			return $data[0]->blog_image;
		}
	}
	//end of function to get blog image name by blog id
}