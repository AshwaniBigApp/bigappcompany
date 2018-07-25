<?php

class User_model extends CI_Model{
	//start of function to fetch all records from table
	public function GetAllUsers(){
		$query = $this->db->get('users');
		return $query->result();
	}
	//end of function to fetch all records from table

	//start of function to insert record in table
	public function CreateUser(){
		$password = $this->input->post('password');
		$encrypted_pass = base64_encode($password);
		//echo"<pre>";print_r($this->input->post());exit;
		$data = array(
				'name' => $this->input->post('Name'),
				'admin_email' => $this->input->post('email'),
				'password' => $encrypted_pass,
				'admin_mobile_no' => $this->input->post('mobile'),
			);
		return $this->db->insert('users', $data);
	}
	//end of function to insert record in table

	//start of function to get record details by id from table
	public function GetUserInfoByID($user_id){
		$query = $this->db->get_where('users', array(
				'admin_id' => $user_id,
			));
		$data = $query->result();
		if(!empty($data)){
			return $data[0];
		}else{
			return '';
		}
	}
	//end of function to get record details by id from table

	//start of function to update record in table by id
	public function UpdateUserInfo($user_id){
		//echo"<pre>";print_r($this->input->post());exit;
		$password = $this->input->post('Password');
		$encrypted_pass = base64_encode($password);
		$data = array(
				'name' => $this->input->post('Name'),
				'admin_email' => $this->input->post('email'),
				'password' => $encrypted_pass,
				'admin_mobile_no' => $this->input->post('mobile'),
			);
		$this->db->where('admin_id', $user_id);
		$this->db->update('users', $data);
	}
	//end of function to update record in table by id

	public function GetUserDetailsForLogin($username){

		$password = $this->input->post('password');
		$encrypted_pass = base64_encode($password);
		//echo"<pre>";print_r($encrypted_pass);exit;
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array(
				'users.admin_email' => $username,
				'users.password' => $encrypted_pass,
				'users.admin_user_status' => 1,
			));
		$query = $this->db->get();
		$data = $query->result();
		if(!empty($data)){
			return $data[0];
		}else{
			return false;
		}
	}

	//start of function to change password of user by user id
	public function ChangePassword($user_name){
		$data = array(
				'password' => base64_encode($this->input->post('password')),
			);
		$this->db->where('admin_email', $user_name);
		$this->db->update('users', $data);
	}
	//end of function to change password of user by user id

	//start of function to change status of role to 0 i.e, inactivate user
	public function InactivateAdminUserByUserID($admin_user_id){
		$data = array(
				'admin_user_status' => 0,
			);
		$this->db->where('admin_id', $admin_user_id);
		$this->db->update('users', $data);
	}
	//end of function to change status of role to 0 i.e, inactivate user

	//start of function to change status of role to 1 i.e, activate user
	public function ActivateAdminUserByUserID($admin_user_id){
		$data = array(
				'admin_user_status' => 1,
			);
		$this->db->where('admin_id', $admin_user_id);
		$this->db->update('users', $data);
	}
	//end of function to change status of role to 1 i.e, activate user

	//start of function to delete record from table by id
	public function DeleteAdminUserByUserID($admin_user_id){
		$this->db->where('admin_id', $admin_user_id);
		$this->db->delete('users');
	}
	//end of function to delete record from table by id
	
	/**
	 * Name : checkAdminEmailAndInstitute
	 * Purpose : Check the existance of the email and followed by the related Institution
	 * @param string $email       The email id of the admin.
	 * @param string $instituteID The institute of the admin from which he/she
	 * is requesting
	 */
	public function checkAdminEmailAndInstitute($adminEmail){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array(
				'admin_email' => $adminEmail,
				'admin_user_status' => 1,
		));
		$query = $this->db->get();
		$emailExists = $query->num_rows();
		
		if ($emailExists > 0) {
			return $emailExists;
		} else {
			return 0; // No such email is registered
		}
	}
	
	/**
	 * Name : resetPasswordEmail
	 * Purpose : To send a email for the admin to reset his password.
	 * @param string $adminEmail The email of the admin t which the password to be reset.
	 */
	public function resetPasswordEmail($adminEmail){
		
		$code = random_string('alnum', 6);
		$enc_code = base64_encode($code);
		$data = array(
				'pwd_request_code' => $code,
				'pwd_change_request' => 1,
		);
		$this->db->where(array(
				'admin_email' => $adminEmail,
				'admin_user_status' => 1,
		));
		
		$this->db->update('users', $data);
		$to_email = $adminEmail;
		
		$subject = 'Password Reset';
		$message = "Dear User, <br/>Please click on the below given link to reset your password,<br/>URL :".base_url('admin/reset-password/').base64_encode($adminEmail).'/'.$enc_code. "<br/> Regards,<br/>BigApp Team";
		$this->email->from('harshal@spotsoon.com', 'NoReply');
		//$this->email->from('pravin@spotsoon.com', 'Support Team');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Name :  GetAdminDetailsByToken
	 * Purpose : to get the details of the admin from the generated token.
	 */
	public function GetAdminDetailsByToken($adminEmail, $token){
		$query = $this->db->get_where('users', array(
				'admin_email' => $adminEmail,
				'pwd_request_code' => $token,
		));
		$data = $query->result();
		if(!empty($data)){
			return $data[0];
		}
	}
	
	//start of function to change password of teacher
	public function ChangepasswordofAdmin($adminEmail, $token_post){
		
		$query = $this->GetAdminDetailsByToken($adminEmail, $token_post);
		//echo"<pre>";print_r($query);exit;
		$data = array(
				'password' => base64_encode($this->input->post('password')),
				'pwd_request_code' => '',
				'pwd_change_request' => 0,
		);
		$this->db->where(array(
				'admin_email' => $adminEmail,
				'pwd_request_code' => $token_post,
		));
		
		if($this->db->update('users', $data)){
			
			$to_email = $adminEmail;
			$subject = 'Password Change Notification';
			$message = "Dear ".ucwords($query->name). ", <br/><br/>Your Password has been reset successfully!<br/><br/> Regards,<br/>BigApp Team";
			$this->email->from('no-reply@spotsoon.com', 'NoReply');
			$this->email->to($to_email);
			$this->email->subject($subject);
			$this->email->message($message);
			if($this->email->send()){
				return true;
			}else{
				return false;
			}
			
		}
		
	}
	//end of function to change password of teacher
}