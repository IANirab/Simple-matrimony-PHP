<?php
//require_once("commonfile.php");
//require_once("dbinclude/function.php");

//$Id="";
//
//$result =  getdata("SELECT fldval FROM `tblsettingmaster` WHERE FldNm='captcha_code'");
//while ($rs = mysqli_fetch_array($result))
//{
//  	   $Id = $rs[0];
//}
////echo("c1fe");
////echo($Id.trim());
//echo($Id);

//require_once("commonfile.php");
//
//$session_val="";
//if(isset($_POST['hiddencaptcha']) &&  $_POST['hiddencaptcha']!='' ){
//	$session_val=$_POST['hiddencaptcha'];
//}else{
//	$session_val="";
//}
//echo($session_val);
//

$secret="6Lcb8hMUAAAAALVcy1P_YUkBPgCWY2O-XiA4nLYf";
$response=$_POST["captcha"];

$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success=json_decode($verify);
if ($captcha_success->success==false) {
  //This user was not verified by recaptcha.
  echo ('Not Ok');

}
else if ($captcha_success->success==true) {
  //This user is verified by recaptcha
  echo ('Ok');

}


?>