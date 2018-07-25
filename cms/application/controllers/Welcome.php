<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('dashboard');
		$this->load->view('common/footer');
	}
	
	public function chek_email(){
		$user_msg = 'Test';
		$this->email->from('support@bigappcompany.com');
		$this->email->to('harshal@spotsoon.com');
		$this->email->subject('Confirmation');
		$this->email->message('test message');
		if($this->email->send()){
			print_r('Mail Sent to user also');exit;
		}else{
			print_r('Mail Not sent to user');exit;
		}
	}
	
	public function ContactUs2SendMail(){
		//
		$data = $this->input->post('product_name');
		
		
		parse_str($data, $array);
		$message = '';
		foreach($array as $key => $val):
		$user_email = $array['email'];
		$user_msg = $array['conf_txt'];
		if ($key != 'from_email' && $key != 'to_email' && $key != 'to_cc' && $key !='subject' && $key !='conf_txt'){
			$replaced_key = str_replace('_', ' ', $key);
			$message = $message.' '.ucwords($replaced_key)." : ".$val."<br/> ";
		}
		endforeach;
		//$this->SendEmailConfirmationToCustomer($this->input->post());
		$msg = "Contact Details : <br/>".$message. "<br/><br/>Regards,<br/>BigApp Team";
		
		/* $name = $array['name'];
		$contactnumber = $array['phone']; 
		$email = $array['email'];*/
		$message = $msg;
		$from_email = $array['from_email'];
		$to_email = $array['to_email']; 
		$subject = $array['subject'];
		//Load email library
		
		//$user_msg = $this->input->post('conf_txt');
		$this->email->from($from_email);
		$this->email->to($user_email);
		$this->email->subject('Confirmation');
		$this->email->message($user_msg);
		$this->email->send();
		
		$this->email->from($from_email);
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($msg);
		if(!empty($_FILES['file_2']['name'][0]) && $_FILES['file_2']['error'][0] == '0'){
			 foreach($_FILES['file_2']['name'] as $key => $value){
			 	$file = $_FILES['file_2']['tmp_name'][$key];
			 	$file_name = $value;
				$this->email->attach($file, 'attachment', $file_name);
			} 
		}
		//Send mail
		if($this->email->send()){
				print_r('1');exit;
		}else{
			print_r('0');exit;
			//echo"<pre>";print_r($this->email->print_debugger());exit;
		}
		
	}
	
	public function ContactUsSendMail(){
	//echo"<pre>";print_r($_FILES);exit;
		$data = $this->input->post('product_name');
		parse_str($data, $array);
		$message = '';
		foreach($array as $key => $val):
		if ($key != 'from_email' && $key != 'to_email' && $key != 'to_cc' && $key !='subject'){
			$replaced_key = str_replace('_', ' ', $key);
			$message = $message.' '.ucwords($replaced_key)." : ".$val."<br/> ";
		}
		endforeach;
		
		//$this->SendEmailConfirmationToCustomer($this->input->post());
		$msg = "Contact Details : <br/>".$message. "<br/><br/>Regards,<br/>BigApp Team";
		/* $name = $array['name'];
		$contactnumber = $array['phone']; 
		$email = $array['email'];*/
		$message = $msg;
		$from_email = $array['from_email'];
		$to_email = $array['to_email']; 
		$to_cc = $array['to_cc'];
		$subject = $array['subject'];
		//Load email library
		
		$this->email->from($from_email);
		$this->email->to($to_email);
		$this->email->cc($to_cc);
		$this->email->subject($subject);
		$this->email->message($msg);
		if(!empty($_FILES['file']['name'][0]) && $_FILES['file']['error'][0] == '0'){
			 foreach($_FILES['file']['name'] as $key => $value){
			 	$file = $_FILES['file']['tmp_name'][$key];
			 	$file_name = $value;
				$this->email->attach($file, 'attachment', $file_name);
			} 
		}
		//Send mail
		if($this->email->send()){
			print_r('1');exit;
		}else{
			print_r('0');exit;
			//echo"<pre>";print_r($this->email->print_debugger());exit;
		}
				
	}
	
	public function SendEmailAttachment2(){
		//echo"<pre>";print_r($_FILES);exit;
		
		$this->email->set_newline("\r\n");
		$this->email->from('harshal@spotsoon.com');
		$this->email->to('harshal@spotsoon.com');
		$this->email->subject('Test Subject');
		$this->email->message('Test Message');
		//$this->email->attach($file);
		$this->email->attach($file, 'attachment', $file_name);
		if($this->email->send())
		{
			echo 'Email send.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
	
	public function SendEmailAttachment(){
		//echo"<pre>";print_r($_FILES);exit;
		
		$this->email->set_newline("\r\n");
		$this->email->from('harshal@spotsoon.com');
		$this->email->to('harshal@spotsoon.com');
		$this->email->subject('Test Subject');
		$this->email->message('Test Message');
		//$this->email->attach($file);
		$this->email->attach($file, 'attachment', $file_name);
		if($this->email->send())
		{
			echo 'Email send.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
	
		public function SendEmailConfirmationToCustomer($args){
		//echo"<pre>";print_r($_FILES);exit;
		
		$this->email->set_newline("\r\n");
		$this->email->from('info@bigappcompany.com');
		$this->email->to('Info');
		$this->email->subject('');
		$this->email->message('Thanks for contacting us');
		//$this->email->attach($file);
//		$this->email->attach($file, 'attachment', $file_name);
		if($this->email->send())
		{
			echo 'Email send.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}
