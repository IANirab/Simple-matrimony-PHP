<?

ob_start();
require_once('commonfile.php');
checklogin($sitepath);

if(isset($_POST['current_displayed_userids']) && $_POST['current_displayed_userids']!='')
{ $current_displayed_userids = $_POST['current_displayed_userids'];}
else
{$current_displayed_userids = '';}

if($current_displayed_userids==''){
	$_SESSION[$session_name_initital . "error"] = "You have not selected any user to add in your favorite list.";
	header("location:searchresult.php");
	exit;
}

if ($current_displayed_userids != "")
{
$touser_array = split(",",$current_displayed_userids);
for($i=0;$i<count($touser_array);$i++)
{
	if (isset($_POST["chk_user_" .$touser_array[$i]]))
	{
		$touserid=$_POST["chk_user_" .$touser_array[$i]];
			$chk_ShortlistId = getonefielddata("select count(ShortlistId) from tbldatingshortlistmaster where 
		UserId='".$touserid."' and CreateBy='".$curruserid."' and CurrentStatus=0 ");	
		if($chk_ShortlistId==0)
		{
			$sql_ins="insert into  tbldatingshortlistmaster(UserId,CreateBy,sel_id,create_date,create_time,CreateIP) 
				values('".$touserid."','".$curruserid."','Pending for Request','".date('Y-m-d')."','".date('h:i:s')."','".$_SERVER['REMOTE_ADDR']."')";
				execute($sql_ins);
				//echo 'sucess_add to favorite list sucessfully'; exit;
		}
		else
		{
			//echo 'fail_already added to favorite list'; exit;
		}
	}
	//favorite_insert($touser_array[$i],$curruserid);
}
}
header("location:message.php?b=18"); 
ob_flush();
?>
