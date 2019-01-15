<? 
include("commonfileadmin.php");
$whque = "";
$cronusers = getdata("SELECT states,agefrom,ageto,genderid,tbl_cron_user_master.userid from tbl_cron_user_master,tbldatingpartnerprofilemaster WHERE tbl_cron_user_master.currentstatus=1 AND tbldatingpartnerprofilemaster.userid=tbl_cron_user_master.userid LIMIT 100 ");
while($partnerrs = mysqli_fetch_array($cronusers)){
	$states = $partnerrs[0];
	$agefrom = $partnerrs[1];
	$ageto = $partnerrs[2];
	$genderid = $partnerrs[3];
	$userid = $partnerrs[4];
	$states_arr = explode(",",$states);	
	if($states!=''){
		$whque .= " AND (";
		for($s=0; $s<count($states_arr); $s++){			
			$whque .= "state=".$states_arr[$s]." OR ";				
		}		
		$whque = substr($whque,0,-4);
		$whque .= ")";		
	}
	if($agefrom!='' && $agefrom!='0.0' && is_numeric($agefrom)){
		 $whque .= " AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= ".$agefrom."  " ;
	}
	if($ageto!='' && $ageto!='0.0' && is_numeric($ageto)){	
		$whque .= " AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" .$ageto. "  " ;
	}
	if($genderid!=''){
		$whque .= " AND genderid=".$genderid;	
	}
$fromque ="from tbldatingusermaster where ". datinguserwhereque().$whque;


$result = getdata("select userid $fromque order by userid desc");
while($rs = mysqli_fetch_array($result)){
		$ifavailable = getonefielddata("SELECT id from tbl_cron_usermatched_data WHERE userid=".$rs[0]);
		if($ifavailable!=''){
			execute("update tbl_cron_usermatched_data SET matches=concat(matches,',".$userid."') WHERE id=".$ifavailable);
		} else {
			$sql = "INSERT into tbl_cron_usermatched_data SET userid=".$rs[0].", matches=".$userid."";
			execute($sql);
		}
		execute("update tbl_cron_user_master SET currentstatus='0.0',crondate=curdate() WHERE userid=".$userid);
	}
}
?>