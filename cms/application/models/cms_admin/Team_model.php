<?php

class Team_model extends CI_Model{
	//start of function to fetch all records from table
	public function GetAllTeamMembers(){
		$query = $this->db->get('team');
		return $query->result();
	}
	//end of function to fetch all records from table
	
	//start of function to insert record in table
	public function CreateTeamMember($img_name){
		$data = array(
				'member_name' => $this->input->post('memberName'),
				'member_designation' => $this->input->post('memberDesignation'),
				'member_image' => $img_name,
				'about_member' => $this->input->post('memberDescription'),
		);
		return $this->db->insert('team', $data);
	}
	//end of function to insert record in table
	
	//start of function to fetch record details by id
	public function GetMemberDetailsByID($member_id){
		$query = $this->db->get_where('team', array(
				'member_id' => $member_id,
		));
		$data = $query->row();
		return $data;
	}
	//end of function to fetch record details by id
	
	//start of function to delete old files from folder
	public function DeleteOldFiles($member_id){
		$query = $this->db->get_where('team', array(
				'member_id' => $member_id,
		))->row();
		$file = $query->member_image;
		unlink('./assets/team/original/'. $file);
		unlink('./assets/team/thumb/'. $file);
	}
	//end of function to delete old files from folder
	
	//start of function to update record details by id in table
	public function UpdateMemberDetails($img_name, $member_id){
		$data = array(
				'member_name' => $this->input->post('memberName'),
				'member_designation' => $this->input->post('memberDesignation'),
				'member_image' => $img_name,
				'about_member' => $this->input->post('memberDescription'),
		);
		$this->db->where('member_id', $member_id);
		$this->db->update('team', $data);
	}
	//end of function to update record details by id in table
	
	//start of function to delete record from table by id
	public function DeleteTeamMemberByID($member_id){
		$delete_files = $this->DeleteOldFiles($member_id);
		$this->db->where('member_id', $member_id);
		$this->db->delete('team');
	}
	//end of function to delete record from table by id
}