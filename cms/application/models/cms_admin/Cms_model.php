<?php

class Cms_model extends CI_Model{
	//start of function to fetch all records from table
	public function GetAllCmsData(){
		$query = $this->db->get('cms');
		return $query->result();
	}
	//end of function to fetch all records from table
	
	//start of function to insert record in table
	public function CreateCmsContent(){
		$data = array(
				'page_name' => $this->input->post('pageName'),
				'description' => $this->input->post('pageContent'),
				'email' => $this->input->post('contactEmail'),
				'phone' => $this->input->post('contactPhone'),
				'add_line_1' => $this->input->post('addressLine1'),
				'add_line_2' => $this->input->post('addressLine2'),
				'pincode' => $this->input->post('pinCode'),
		);
		return $this->db->insert('cms', $data);
	}
	//end of function to insert record in table
	
	//start of function to check if record exists
	public function CheckIfPageExists($page){
		$query = $this->db->get_where('cms', array(
				'page_name' => $page,
		));
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	//end of function to check if record exists
	
	//start of function to fetch record details by id
	public function GetCmsContentDetailsByID($cms_id){
		$query = $this->db->get_where('cms', array(
				'cms_id' => $cms_id,
		));
		$data = $query->result();
		return $data[0];
	}
	//end of function to fetch record details by id
	
	//start of function to update record details by id in table
	public function UpdateCmsContent($cms_id){
		$data = array(
				'page_name' => $this->input->post('pageName'),
				'description' => $this->input->post('pageContent'),
				'email' => $this->input->post('contactEmail'),
				'phone' => $this->input->post('contactPhone'),
				'add_line_1' => $this->input->post('addressLine1'),
				'add_line_2' => $this->input->post('addressLine2'),
				'pincode' => $this->input->post('pinCode'),
		);
		$this->db->where('cms_id', $cms_id);
		$this->db->update('cms', $data);
	}
	//end of function to update record details by id in table
	
	//start of function to delete record from table by id
	public function DeleteCmsContentByID($cms_id){
		$this->db->where('cms_id', $cms_id);
		$this->db->delete('cms');
	}
	//end of function to delete record from table by id
}