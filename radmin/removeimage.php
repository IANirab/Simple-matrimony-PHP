<?
include("commonfileadmin.php");
if(isset($_POST['userid']) && $_POST['userid']!='')
{
	$userid=$_POST['userid'];
}
if(isset($_POST['imagenm']) && $_POST['imagenm']!='')
{
	$imagenm=$_POST['imagenm'];
}
if(isset($_POST['tname']) && $_POST['tname']!='')
{
	$tname=$_POST['tname'];
}
$type = '';
if(isset($_POST['type']) && $_POST['type']!=''){
	$type = $_POST['type'];
}

if($type=='approve'){
	execute("update tbldatingusermaster SET image_approval='Y', currentstatus='0.0' WHERE userid=".$userid);	
	echo "Approved successfully.";
	exit;
}

if($tname=='u')
{
	$image=getonefielddata("select imagenm from tbldatingusermaster where userid=".$userid." and currentstatus=0");
	//echo "..uploadfiles/".$image."";
	//echo "..uploadfiles/".$imagenm."";
	//exit;
	execute("update tbldatingusermaster set imagenm='',thumbnil_image='' where userid=".$userid." ");
	
	if(file_exists("../uploadfiles/".$image)){
		@unlink("../uploadfiles/".$image."");
	}if(file_exists("../uploadfiles/".$imagenm)){
		@unlink("../uploadfiles/".$imagenm."");
	}
	$_SESSION[$session_name_initital . "adminerror"]= "Unapproved successfully";
	//exit;
}
if($tname=='a')
{
	
	//execute("update tbldatingalbummaster set imagenm='' where albumid=".$userid." and currentstatus=0");
	execute("DELETE from tbldatingalbummaster WHERE albumid=".$userid."");
	if(file_exists("../uploadfiles/".$imagenm)){
		@unlink("../uploadfiles/".$imagenm."");
	}
	$_SESSION[$session_name_initital . "adminerror"]= "Deleted successfully";
	exit;
}

?>