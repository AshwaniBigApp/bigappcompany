<?php
session_start();
$_SESSION["name"] = $_POST['name'];
 $html = ' Name: '. $_POST['name'] .'
 Email: '.$_POST['email'].'
 Mobile: '.$_POST['mobile'].'
 Message: '.$_POST['message'];
//var_dump($_POST);
$message = $html;
$subject = 'BigAppCompany Client Enquiry (SEO Landing Page)'; 
$headers = 'From: support@bigappcompany.com' . "\r\n" . 'Reply-To: support@spotsoon.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion(); 
//echo $html;
$to ='support@bigappcompany.com,sandeep.sandeep.mandal@gmail.com,balaji@bigappcompany.com';


//$recipients = array('ravindra.gangadhar23@gmail.com' => 'BigApp Company');

if(mail($to, $subject, $message, $headers)) {
     echo "<script>location.href=\"https://bigappcompany.com\";</script>";
}
else 
{ echo "<script>location.href=\"https://bigappcompany.com\";</script>"; 
}			
?>