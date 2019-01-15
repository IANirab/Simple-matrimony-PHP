<? 
//Modified field start
if(isset($_SESSION[$session_name_initital."pl"]) && $_SESSION[$session_name_initital."pl"]=='single'){
	$gethidden = $_POST['gethidden'];
	$valfield = $_POST['valfield'];
	$datehidden = $_POST['datehidden'];
	if($gethidden!='' && $valfield!=''){
		execute("insert into tbl_modified_field_master(userid,name,vals,timing)values('$curruserid','$gethidden','$valfield','$datehidden')");
	}
	$_SESSION[$session_name_initital."pl"] = '';
}
if(isset($_SESSION[$session_name_initital."pl"]) && $_SESSION[$session_name_initital."pl"]=='multiple'){
	$gethidden = explode(",",$_POST['gethidden']);
	$valfield = explode(",",$_POST['valfield']);
	$datehidden = $_POST['datehidden'];
	$count = count($gethidden);
	for($i = 0; $i<$count; $i++) {	
		execute("insert into tbl_modified_field_master(userid,name,vals,timing)values('$curruserid','$gethidden[$i]','$valfield[$i]','$datehidden')");
	}
	$_SESSION[$session_name_initital."pl"] = '';
}
if(isset($_SESSION[$session_name_initital."pl"]) && $_SESSION[$session_name_initital."pl"]=='photo'){
	execute("insert into tbl_modified_field_master(userid,name,vals,timing)values('$id','thumbnil_image','".$thumb_image_name.$_SESSION['user_file_ext']."','".date("Y-m-d H:i:s")."')");
	$_SESSION[$session_name_initital."pl"] = '';
}
	//Modified field end
?>