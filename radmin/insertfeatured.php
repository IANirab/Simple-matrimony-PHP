<?php session_start(); 
require_once("commonfileadmin.php");
checkadminlogin();
if(isset($_POST['section1']) && $_POST['section1']!='')
{
	$section =$_POST['section1'];
}
elseif(isset($_POST['section2']) && $_POST['section2']!='')
{
	$section =$_POST['section2'];
}
elseif(isset($_POST['section3']) && $_POST['section3']!='')
{
	$section =$_POST['section3'];
}
else{$section='';}



if(isset($_POST['userid1']) && $_POST['userid1']!='')
{
	$ids = $_POST['userid1'];
}
elseif(isset($_POST['userid2']) && $_POST['userid2']!='')
{
	$ids =$_POST['userid2'];
}
elseif(isset($_POST['userid3']) && $_POST['userid3']!='')
{
	$ids =$_POST['userid3'];
}
else{$ids='';}

$ids = explode(';',$ids);




$sSql = "delete from tbldatindatigadminfeaturedusermaster where section='$section'";
execute($sSql);

for($i=0;$i<count($ids);$i++)
{
//		echo "insert into tbldatindatigadminfeaturedusermaster(userid,section) values(".$ids[$i].",'".$section."')";
		execute("insert into tbldatindatigadminfeaturedusermaster(userid,section) values(".$ids[$i].",'".$section."')");

}

$retfile ="addfeatured.php";
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>