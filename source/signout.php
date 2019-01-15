<?php 

ob_start();
require_once('commonfile.php');
  checklogin($sitepath);

  activity_log($_SESSION[$session_name_initital . "memberuserid"],2,1);
  //session_unset();
  $_SESSION[$session_name_initital . "memberuserid"] = "";
  $_SESSION[$session_name_initital . "memberusername"] = "";
  $_SESSION[$session_name_initital . "membername"] = "";
  $_SESSION[$session_name_initital . 'SESSION_CHAT_USER_ID'] = "";
  unset($_SESSION[$session_name_initital . "memberuserid"]);
  unset($_SESSION[$session_name_initital . "memberusername"]);
  unset($_SESSION[$session_name_initital . "membername"]);
  unset($_SESSION[$session_name_initital . 'SESSION_CHAT_USER_ID']);
  header("location:login.php");
  ob_flush();
?>
