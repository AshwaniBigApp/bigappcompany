<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('cms_admin/User_model', 'User');
	}
	
	//Start of function to get list of all users
	public function UsersList(){
		$data['users'] = $this->User->GetAllUsers();
		$this->load->view('common/header');
		$this->load->view('users/list', $data);
		$this->load->view('common/footer');
	}
	//End of function to get list of all users
	
	//Start of function to create user
	public function UserCreate(){
		$this->form_validation->set_rules('Name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('common/header');
			$this->load->view('users/add');
			$this->load->view('common/footer');
			
		}
		else
		{
			$this->User->CreateUser();
			$this->session->set_flashdata('msg', 'User created successfully!');
			redirect('admin/users');
		}
	}
	//End of function to create user
	
	//Start of function to update user
	public function UserUpdate($user_id){
		$this->form_validation->set_rules('Name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
		$this->form_validation->set_rules('Password', 'Password', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
		$data['user_details'] = $this->User->GetUserInfoByID($user_id);
		if(!empty($data['user_details'])){
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('common/header');
				$this->load->view('users/edit', $data);
				$this->load->view('common/footer');
				
			}
			else
			{
				$this->User->UpdateUserInfo($user_id);
				$this->session->set_flashdata('msg', 'User details updated successfully!');
				redirect('admin/users');
			}
		}else{
			$this->load->view('admin/404_error');
		}
	}
	//End of function to update User
	
	//Start of function log in user
	public function AdminLogin(){
		$this->form_validation->set_rules("username", "Username", "trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		
		if ($this->form_validation->run() == FALSE)
		{//print_r('Error');exit;
			//validation fails
			$this->load->view('users/login');
		}
		else
		{
			//validation succeeds
			if ($this->input->post('btn_login') == "Login")
			{
				$username = $this->input->post('username');
				$usr_result = $this->User->GetUserDetailsForLogin($username);
				//echo"<pre>";print_r($usr_result);exit;
				
				if (!empty($usr_result->name)) //active user record is present
				{
					//set the session variables
					$sessiondata = array(
							'name' => $usr_result->name,
							'username' => $username,
							'email' => $usr_result->admin_email,
							'role' => $usr_result->admin_role_id,
							'user_type' => 'SA',
							'loginuser' => TRUE
					);
					//echo"<pre>";print_r($sessiondata);exit;
					$this->session->set_userdata($sessiondata);
					redirect("admin/users");
				}
				else
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
					redirect('admin/login');
				}
			}
			else
			{
				redirect('admin/login');
			}
		}
		
	}
	//End of function to login user
	
	//Start of function to change password
	public function ChangePassword(){
		
		if(!empty($this->session->userdata['username'])){
			$this->form_validation->set_rules("password", "Password", "trim|required");
			
			if ($this->form_validation->run() == FALSE)
			{    //validation fails
				$this->load->view('common/header');
				$this->load->view('users/changepassword');
				$this->load->view('common/footer');
			}
			else
			{
				
				$this->User->ChangePassword($this->session->userdata['username']);
				$this->session->set_flashdata('msg', 'Password changed successfully!');
				redirect('admin/users/changepassword');
			}
		}
		else{
			redirect('admin/login');
		}
	}
	//End of function to change password
	
	//Start of function to logout user
	public function Logout(){
		$newdata = array(
				'name' => '',
				'username' => '',
				'email' => '',
				'role' => '',
				'logged_in' => FALSE,
		);
		
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	//End of function to logout user
	
	//Start of function to deactivate User
	public function UserDeactivate(){
		//echo"<pre>";print_r($_REQUEST);exit;
		$admin_user_id = $_REQUEST['admin_user_id'];
		$this->User->InactivateAdminUserByUserID($admin_user_id);
	}
	//End of function to deactivate User
	
	//Start of function to activate User
	public function UserActivate(){
		$admin_user_id = $_REQUEST['admin_user_id'];
		$this->User->ActivateAdminUserByUserID($admin_user_id);
	}
	//End of function to activate User
	
	//Start of functio to delete User
	public function UserDelete(){
		$admin_user_id = $_REQUEST['admin_user_id'];
		$this->User->DeleteAdminUserByUserID($admin_user_id);
	}
	//End of function to delete User
	
	public function ForgotPassword(){
		$this->form_validation->set_rules("email", "Email", "trim|required");
		if ($this->form_validation->run() == FALSE)
		{    //validation fails
			$this->load->view('users/forgot-password');
		} else {
			$adminEmail = $this->input->post('email');
			$result = $this->User->checkAdminEmailAndInstitute($adminEmail);
			if ($result == 1) {
				
				$this->User->resetPasswordEmail($adminEmail);
				$this->session->set_flashdata('msg', 'A link to reset your password is sent to the given Email.');
				redirect('admin/forgotPassword');
				//redirect('admin/login');
			} else if ($result == 0) {
				$this->session->set_flashdata('msg', "$adminEmail does not Exists.");
				redirect('admin/forgotPassword');
			} else {
				$this->session->set_flashdata('msg', 'This email is registered with another Institute');
				redirect('admin/forgotPassword');
			}
		}
	}
	
	/**
	 * Name : AdminResetPassword
	 * Purpose : When the admin clicks the ResetPassword link from the email, this function will be called.
	 * @param string $adminEmail The email id of the admin
	 * @param string $token      The token that is generated.
	 */
	public function ResetPassword($adminEmail, $token){
		$data['token'] = base64_decode($token);
		$data['adminEmail'] = base64_decode($adminEmail);
		
		$record = $this->User->GetAdminDetailsByToken(base64_decode($adminEmail), base64_decode($token));
		
		if(isset($record) && $record->pwd_request_code == $data['token']) {
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confPassword', 'Password Confirmation', 'required|matches[password]');
			if ($this->form_validation->run() === FALSE)
			{
				//$this->load->view('teacher/common/header');
				$this->load->view('admin-reset-password', $data);
				//$this->load->view('teacher/common/footer');
			}else{
				
				$adminEmailPost = $this->input->post('email');
				
				$token_post = $this->input->post('token');
				$this->User->ChangepasswordofAdmin($adminEmailPost, $token_post);
				$this->session->set_flashdata('msg', 'Your password has been reset successfully.');
				redirect('admin/login');
			}
		}else{
			redirect('admin/experied-reset-link');
		}
	}
	
	public function Admin404Error(){
		$this->load->view('admin/404_error');
	}
}
