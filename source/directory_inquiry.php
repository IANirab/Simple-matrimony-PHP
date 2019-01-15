<?

ob_start();
include("commonfile.php");

if ((isset($_GET["b"])) && (is_numeric($_GET["b"])))
	$id = $_GET["b"];
else
	$id  =0;

	$result1 = getdata("select directoryid,title,email from tbl_directory_master where directoryid=$id and " .directorywhereque());
	$title ="";
	 while($rs= mysqli_fetch_array($result1))
	 { 
		 $directoryid = $rs[0];
		 $title = $rs[1];
		 $email = $rs[2];
	 }
	 	freeingresult($result1);
	 if ($title != "")
	 {
		$subject  = $title;
		$message  = " title :". $title ."<br>";
		$message .= " name :". $_POST['name'] ."<br>";
		$message .= " email :". $_POST['email'] ."<br>";
		$message .= " phone :". $_POST['phone'] ."<br>";
		$message .= " message :" . $_POST['message'] ."<br>"; 
		sendemaildirect($email,$subject,$message,"");
		header("location:message.php?b=56");
	}
	ob_flush();
?>