<?php
require_once 'funcs.php';
if(isset($_POST['send'])){
    /** 
     * Save POst data into variables
     */
$fullname= $_POST['fullname'];
$email= $_POST['email'];
$title= $_POST['title'];
$message =$_POST['message'];

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
  //your site secret key
  //get verify response data
  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
  $responseData = json_decode($verifyResponse);
  if($responseData->success){
    $API = json_encode($_POST);
      //save form data or send to email
      print($API);
  }else{
      echo "captcha verification failed, Please try again";
  }
}else{
    echo "you need to validate captcha";
}
}