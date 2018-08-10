<?php
session_start();
$_SESSION["name"] = $_POST['name'];
 $html = ' Name: '. $_POST['name'] .'
 Email: '.$_POST['email'].'
 Mobile: '.$_POST['mobile'].'
 Message: '.$_POST['message'];
//var_dump($_POST);
$message = $html;
$subject = 'BigAppCompany Client Enquiry (Quick Access Fixed Form)'; 
$headers = 'From: support@bigappcompany.com' . "\r\n" . 'Reply-To: support@spotsoon.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion(); 
//echo $html;
$to ='support@bigappcompany.com.test-google-a.com';


//$recipients = array('ravindra.gangadhar23@gmail.com' => 'BigApp Company');

if(mail($to, $subject, $message, $headers)) {
     echo "<script>location.href=\"../thankyou/index.php\";</script>";
}
else 
{ echo "<script>location.href=\"../thankyou/error.php\";</script>"; 
}			
?>