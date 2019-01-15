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

<?php 
$curr = findsettingvalue("CurrencySymbol");
/*echo "select sum(ifnull(totalpaymentamount,0)),monthname(cleardate) from tbldatingpaymentmaster where currentstatus=0 and clear='Y' and cleardate >= date_add(curdate(),interval -1 year) and cleardate <= curdate() group by monthname(cleardate) order by cleardate "; exit;*/
$sales = getdata("select sum(ifnull(totalpaymentamount,0)),monthname(cleardate) from tbldatingpaymentmaster where currentstatus=0 and clear='Y' and cleardate >= date_add(curdate(),interval -1 year) and cleardate <= curdate() group by monthname(cleardate) order by cleardate");
?>
</body>
</html>