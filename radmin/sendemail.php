<? 
include("commonfileadmin.php");
$email = "phpdev01@makeyourwebsites.com";
$subject = "subject";
$message = "Message";
mail($email,$subject,$message);
//sendemaildirect($email,$subject,$message);
?>