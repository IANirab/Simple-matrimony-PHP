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
<?php $pastdate=date('Y-m-d',strtotime("-365 days")); 

$currentdate=date('Y-m-d');

?>

<?php
/*echo "select tbldatingpackagemaster.Description,tbldatingpackagemaster.CreateDate,count(*) from tbldatingpackagemaster INNER JOIN  tbldatingpaymentdetail ON  tbldatingpackagemaster.PackageId=tbldatingpaymentdetail.packageid  AND  tbldatingpackagemaster.currentstatus=0  AND   tbldatingpackagemaster.CreateDate>='".$pastdate."' AND  tbldatingpackagemaster.CreateDate<='".$currentdate."' group by tbldatingpackagemaster.Description order by count(*) desc "; exit;*/
$packages=getdata("select tbldatingpackagemaster.Description,count(*) from tbldatingpackagemaster INNER JOIN  tbldatingpaymentdetail ON  tbldatingpackagemaster.PackageId=tbldatingpaymentdetail.packageid  AND  tbldatingpackagemaster.currentstatus=0  AND   tbldatingpackagemaster.CreateDate>='".$pastdate."' AND  tbldatingpackagemaster.CreateDate<='".$currentdate."' group by tbldatingpackagemaster.Description order by count(*) desc "); ?>
</body>
</html>