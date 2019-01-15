<? 
session_start();
include("commonfileadmin.php");
require_once("emailbulkcommonfunction.php");
checkadminlogin();
$lotid = 0;
$EmailLot = findsettingemailbulk("EmailLot");
$bulkdata = getdata("SELECT sendid,tbldatingusermaster.email,subject,message from tblemailbulkmaster,tbldatingusermaster WHERE tblemailbulkmaster.userid!='' AND tblemailbulkmaster.userid=tbldatingusermaster.userid limit $EmailLot");
while($rs = mysqli_fetch_array($bulkdata)){
	$sendid = $rs[0];
	$email = $rs[1];
	$subject = $rs[2];
	$message = $rs[3];
	sendemaildirect($email,$subject,$message);
	execute("DELETE from tblemailbulkmaster WHERE sendid=".$sendid);
}
$max = getonefielddata("SELECT count(sendid) from tblemailbulkmaster WHERE userid!=''");
header("location:partnermatch_send.php?b=".$max);
?>