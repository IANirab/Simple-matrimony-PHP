<?php
require_once("commonfileadmin.php");
if ((isset($_POST["userid"]))&& $_POST["userid"] != "")
{
	$uid = $_POST["userid"];
}
else
{
	$uid = 0;
}

if ((isset($_POST["count"]))&& $_POST["count"] != "")
{
	$count = $_POST["count"];
}
else
{
	$count = 0;
}




  $featureid = getonefielddata("select featureid from tbldating_view_conact_package_user_master where currentstatus=0 and userid ='".$uid."'  order by featureid desc limit 1 ");
  
  	$old_count=getonefielddata("select total_contact_can_view from tbldating_view_conact_package_user_master where currentstatus=0 and featureid ='".$featureid."'  ");
	$count=$old_count+$count;		
			
		$last_1 = date('Y-m-d', strtotime('today + 2 days'));
				 $sql = "update tbldating_view_conact_package_user_master set 
				total_contact_can_view='".$count."' ,expiredate='".$last_1."'
				where featureid='".$featureid."'   "; 		 
				execute($sql);



?>