<? 
include("commonfileadmin.php");
$result = getdata("select userid,name,email from tbldatingusermaster WHERE currentstatus=0 AND dob='curdate()' AND birthcronyear='".date('Y')."' limit 100");
while($rs = mysqli_fetch_array($result)){	
	$userid = $rs[0];
	$name = $rs[1];
	$email = $rs[2];
	$emaildata = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=29");
	$emailrs = mysqli_fetch_array($emaildata);
	$subj = $emailrs[0];
	$msg = $emailrs[1];
	$msg = str_replace("[username]",$name,$msg);
	execute("INSERT into tbl_birthdaycron_master SET emailid='".$email."', subject='".$subj."', message='".$msg."'");	
	execute("update tbldatingusermaster SET birthcronyear='".date('Y')."'");
}
$res = getdata("SELECT emailid,subject,message,id from tbl_birthdaycron_master WHERE currentstatus=0 limit 100");
while($rs = mysqli_fetch_array($res)){
	sendemaildirect($rs[0],$rs[1],$rs[2]);
	execute("update tbl_birthdaycron_master SET currentstatus=1 WHERE id=".$rs[4]);
}

?>