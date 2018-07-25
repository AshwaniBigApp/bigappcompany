<?php

class Gallery_model extends CI_Model{
	//start of function to fetch all records from table
	public function GetAllGalleryData(){
		$query = $this->db->get('gallery');
		return $query->result();
	}
	//end of function to fetch all records from table
	
	//start of function to insert record in table
	public function CreateGalleryContent($img_name){
		$data = array(
				'gallery_image' => $img_name,
				'description' => $this->input->post('galleryDescription'),
		);
		return $this->db->insert('gallery', $data);
	}
	//end of function to insert record in table
	
	//start of function to fetch record details by id
	public function GetGalleryContentDetailsByID($gallery_id){
		$query = $this->db->get_where('gallery', array(
				'gallery_id' => $gallery_id,
		));
		$data = $query->row();
		return $data;
	}
	//end of function to fetch record details by id
	
	//start of function to delete old files from folder
	public function DeleteOldFiles($gallery_id){
		$query = $this->db->get_where('gallery', array(
				'gallery_id' => $gallery_id,
		))->row();
		$file = $query->gallery_image;
		unlink('./assets/gallery/original/'. $file);
		unlink('./assets/gallery/thumb/'. $file);
	}
	//end of function to delete old files from folder
	
	//start of function to update record details by id in table
	public function UpdateGalleryContent($img_name, $gallery_id){
		$data = array(
				'gallery_image' => $img_name,
				'description' => $this->input->post('galleryDescription'),
		);
		$this->db->where('gallery_id', $gallery_id);
		$this->db->update('gallery', $data);
	}
	//end of function to update record details by id in table
	
	//start of function to delete record from table by id
	public function DeleteGalleryContentByID($gallery_id){
		$delete_files = $this->DeleteOldFiles($gallery_id);
			$this->db->where('gallery_id', $gallery_id);
			$this->db->delete('gallery');
	}
	//end of function to delete record from table by id
}