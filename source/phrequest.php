<? 

ob_start();
require_once('commonfile.php');
checklogin($sitepath);
$check_private = getonefielddata("SELECT private_phone_no from tbldatingusermaster WHERE userid=".$_GET['b']);
$check_accepted = getonefielddata("SELECT accepted from tblphonerequestmaster WHERE currentstatus=0 AND fromuserid=".$curruserid." AND touserid=".$_GET['b']);
execute("insert into tbldatingprofilehistorymaster (touserid,CreateDate,CreateIP,currentstatus) values (".$_GET['b'].",now(),'".getip()."',3)");
/*echo $check_accepted;
exit;*/
if($check_accepted=='Y'){
	header("location:phone_request_add.php?b=".$_GET['b']);	
}
if(isset($_GET['b']) && $_GET['b']!=''){ 
	$uid = $_GET['b'];
} else {
	$uid = '';
}
$remain = user_can_see_contact_detail($curruserid,"Y");
$chkdailyview = findsettingvalue("max_contacts_view");
$viewed = getonefielddata("SELECT contactviewed from tbldatingusermaster WHERE userid=$curruserid");
if($viewed>=$chkdailyview && $chkdailyview!=''){		
	header("location:message.php?b=68");	
	exit;	
}
if($remain==0 || $remain==''){
	header("location:message.php?b=68");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?=$ltr?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery/jquery.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
function check_contacts(rem,uid){
	if(rem==0 || rem=='')	{
		window.location.href = "message.php?b=68";
	}
	var ans = confirm ("Your remaining contact is "+rem+" Do you want to continue?");
	if(ans && rem>0){		
		//window.location.href = "displayprofile_print_detail.php?b="+uid+"&act=ph";
		window.location.href = "phone_request_add.php?b="+uid;
	} else if(rem==0) {
		window.location.href = "message.php?b=68";	
	} else {
		window.location.href = "message.php?b=77";
	}
}
<? if($remain>0) ?>
$(document).ready(function() { 
	check_contacts('<?=$remain?>','<?=$uid ?>');
});
</script>
<?
ob_flush();
?>