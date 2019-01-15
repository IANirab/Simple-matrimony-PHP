<?php
include("commonfileadmin.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php $religion=getdata( "SELECT tbldatingcastmaster.id,tbldatingcastmaster.title,count(*) from tbldatingcastmaster INNER JOIN tbldatingusermaster ON tbldatingusermaster.castid=tbldatingcastmaster.id AND tbldatingusermaster.currentstatus=0 AND tbldatingcastmaster.currentstatus=0 AND DATE_FORMAT(tbldatingusermaster.createdate,'%Y-%m')='".date('Y-m')."'  group by tbldatingcastmaster.title order by count(*) desc "); ?>
</body>
</html>