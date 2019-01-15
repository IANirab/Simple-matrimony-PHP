<?

ob_start();
require_once('commonfile.php');
checklogin($sitepath);
if(isset($_POST['current_displayed_userids']) && $_POST['current_displayed_userids']!=''){ 
	$current_displayed_userids = $_POST['current_displayed_userids'];
} else {
	$current_displayed_userids = '';
}
if($current_displayed_userids==''){
	$_SESSION[$session_name_initital . "error"] = "You have not selected any user to send express intrest.";
	header("location:searchresult.php");
	exit;
}
$type=1;
if ($current_displayed_userids != "")
{
$touser_array = explode(",",$current_displayed_userids);

for($i=0;$i<count($touser_array);$i++)
{
	
	$exp_cnt = getonefielddata("SELECT express_count from tbldatingusermaster WHERE 
	  userid=".$curruserid." and expiredate>=curdate() ");	
	  if($exp_cnt>0) 
		{
		
			$chk=getonefielddata("select count(PmbId) from tbldatingpmbmaster where FromUserId='".$curruserid."' 
			and ToUserId='".$touserid."' and type='".$type."' and CurrentStatus=0 ");
	  
			if (isset($_POST["chk_user_" .$touser_array[$i]]))
			{
					$touserid=$_POST["chk_user_" .$touser_array[$i]];
					$chk=getonefielddata("select count(PmbId) from tbldatingpmbmaster where FromUserId='".$curruserid."' 
				and ToUserId='".$touserid."' and type='".$type."' and CurrentStatus=0 ");
				if($chk==0)
				{
					$sql_ins="insert into  tbldatingpmbmaster(ToUserId,FromUserId,type,create_date,create_time,CreateIP,createby) 
					values('".$touserid."','".$curruserid."','".$type."','".date('Y-m-d')."','".date('h:i:s')."','".$_SERVER['REMOTE_ADDR']."','".$curruserid."')";
					execute($sql_ins);
					if($exp_cnt!='' && $exp_cnt>0)
					{
					$exp_cnt=$exp_cnt-1;
					execute("UPDATE  tbldatingusermaster set express_count='".$exp_cnt."' where userid='".$curruserid."' ");
					}
				}		
			}
			
		}
	
	
}
}
header("location:message.php?b=47");
ob_flush();
?>