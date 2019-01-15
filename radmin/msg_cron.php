<? 
include("commonfileadmin.php");
$days = findsettingvalue('days_to_deletemsg');
$sql = "update tbldatingpmbmaster SET currentstatus=5 WHERE currentstatus=4 AND datediff(curdate(),createdate)>21";
execute($sql);
?>