<?php
class Faq_model extends CI_Model{
	//start of function to get list of all faq's
	public function GetAllFAQ(){
		$query = $this->db->get('faqs');
		return $query->result();
	}
	//end of function to get list of all faq's
	
	//start of function to insert record in faq table
	public function CreateFAQ(){
		$question = $this->input->post('question');
		$check = $this->CheckQuestionExisits($question);
		if($check == 0){
			$data = array(
					'question' => $this->input->post('question'),
					'answer' => $this->input->post('answer'),
			);
			return $this->db->insert('faqs', $data);
		}else{
			return false;
		}
	}
	//end of function to insert record in faq table
	
	//start of function to check whether question is already created or not
	private function CheckQuestionExisits($question){
		$query = $this->db->get_where('faqs', array(
				'question' => $question,
		));
		return $query->num_rows();
	}
	//end of function to check whether question is already created or not
	
	//start of function to get record details from faq table by id
	public function GetFAQDetailsByID($faq_id){
		$query = $this->db->get_where('faqs', array(
				'faq_id' => $faq_id,
		));
		$data = $query->result();
		if(!empty($data)){
			return $data[0];
		}
	}
	//end of function to get record details from faq table by id
	
	//start of function to update record in faq table by id
	public function UpdateFAQ($faq_id){
		$data = array(
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),
		);
		$this->db->where('faq_id', $faq_id);
		$this->db->update('faqs', $data);
	}
	//end of function to update record in faq table by id
	
	//start of function to delete record from faq table by id
	public function DeleteFAQByID($faq_id){
		$this->db->where('faq_id', $faq_id);
		$this->db->delete('faqs');
	}
	//end of function to delete record from faq table by id
}