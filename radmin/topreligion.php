<?php
include("commonfileadmin.php");

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Top Religion</title>
</head>
<!--select tbl_category_master.categoryid,tbl_category_master.title,count(*) from tbl_category_master INNER JOIN tbl_listing_master ON tbl_listing_master.categoryid=tbl_category_master.categoryid group by tbl_category_master.title order by count(*)-->
<body>
<?php 
/*echo "SELECT tbldatingreligianmaster.id,tbldatingreligianmaster.title,tbldatingusermaster.createdate,count(*) from tbldatingreligianmaster INNER JOIN tbldatingusermaster ON tbldatingusermaster.religianid=tbldatingreligianmaster.id AND tbldatingusermaster.currentstatus=0 AND tbldatingreligianmaster.currentstatus=0 AND DATE_FORMAT(tbldatingusermaster.createdate,'%Y-%m')='".date('Y-m')."'  group by tbldatingreligianmaster.title order by count(*) desc limit 10 "; exit;*/
/*echo "SELECT tbldatingreligianmaster.id,tbldatingreligianmaster.title,tbldatingusermaster.createdate,count(*) from tbldatingreligianmaster INNER JOIN tbldatingusermaster ON tbldatingusermaster.religianid=tbldatingreligianmaster.id AND tbldatingusermaster.currentstatus=0 AND tbldatingreligianmaster.currentstatus=0 AND DATE_FORMAT(tbldatingusermaster.createdate,'%Y-%m')='".date('Y-m')."'  group by tbldatingreligianmaster.title order by count(*) desc "; exit;*/


?>




<?php $religion=getdata("SELECT tbldatingreligianmaster.id,tbldatingreligianmaster.title,tbldatingusermaster.createdate,count(*) from tbldatingreligianmaster INNER JOIN tbldatingusermaster ON tbldatingusermaster.religianid=tbldatingreligianmaster.id AND tbldatingusermaster.currentstatus=0 AND tbldatingreligianmaster.currentstatus=0 AND DATE_FORMAT(tbldatingusermaster.createdate,'%Y-%m')='".date('Y-m')."'  group by tbldatingreligianmaster.title order by count(*) desc "); ?>


<?php /*?><?
"SELECT tbldatingreligianmaster.id,tbldatingreligianmaster.title,count(*) from tbldatingreligianmaster INNER JOIN tbldatingusermaster ON tbldatingusermaster.religianid=tbldatingreligianmaster.id AND tbldatingusermaster.currentstatus=0 AND tbldatingreligianmaster.currentstatus=0 AND DATE_FORMAT(tbldatingusermaster.createdate,'%Y-%m')='".date('Y-m')."'  group by tbldatingreligianmaster.title order by count(*) desc limit 10 "
?><?php */?>
</body>
</html>