<?php
include("commonfileadmin.php");
if(isset($_GET['b']) && $_GET['b'])
{
	$action=$_GET['b'];
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Monthly Female Registration</title>
</head>

<body>
<?php /*?><?php echo "select  userid,email,name,currentstatus,phno,createdate,genderid from  tbldatingusermaster where currentstatus=0 and genderid=$action and DATE_FORMAT(createdate,'%Y-%m')='".date('Y-m')."' order by createdate asc"; exit; ?><?php */?>
<?php $female=getdata("select  userid,email,name,currentstatus,phno,createdate,genderid from  tbldatingusermaster where currentstatus=0 and genderid=$action and DATE_FORMAT(createdate,'%Y-%m')='".date('Y-m')."' order by createdate asc") ; ?>
</body>
</html>