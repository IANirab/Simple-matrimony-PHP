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

<?php $promocode=getdata("select tblscspecialoffermaster.specialoffercode,tblscspecialoffermaster.specialoffertype,tblscspecialoffermaster.specialsffervalue,count(*) from tblscspecialoffermaster INNER JOIN  tbldatingpaymentmaster ON  tblscspecialoffermaster.specialofferid=tbldatingpaymentmaster.promo_code AND  tbldatingpaymentmaster.currentstatus=0 AND  tblscspecialoffermaster.currentstatus=0 AND  tbldatingpaymentmaster.CreateDate>='".$pastdate."' AND tbldatingpaymentmaster.CreateDate<='".$currentdate."' group by tblscspecialoffermaster.specialoffercode order by count(*) desc "); ?>
</body>
</html>













