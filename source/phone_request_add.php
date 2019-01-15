<?

ob_start();
require_once('commonfile.php');
checklogin($sitepath);
$curruserid=0;
if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	$curruserid = $_SESSION[$session_name_initital."memberuserid"];	
}
$packageid = getonefielddata("SELECT packageid from tbldatingusermaster WHERE userid=".$curruserid);

if($sitethemefolder=='cometomarryme'){
	if(isset($_GET['b']) && $_GET['b']!=''){
		$touserpkgtypeid = getonefielddata("SELECT tbldatingpackagemaster.main_package_typeid from tbldatingusermaster,tbldatingpackagemaster WHERE tbldatingusermaster.userid=".$_GET['b']." AND tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND tbldatingusermaster.currentstatus=0" );
		$fromuserpkgtypeid = getonefielddata("SELECT tbldatingpackagemaster.main_package_typeid from tbldatingusermaster,tbldatingpackagemaster WHERE tbldatingusermaster.userid=$curruserid AND tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND tbldatingusermaster.currentstatus=0");
		if($touserpkgtypeid!=$fromuserpkgtypeid){
			header("location:message.php?b=95");
			exit;
		}
	}
}
if(isset($_GET['b']) && $_GET['b']!='')
{ $uid = $_GET['b'];}
else
{$uid = '';}
execute("insert into tbldatingprofilehistorymaster (touserid,CreateDate,CreateIP,currentstatus) values (".$uid.",now(),'".getip()."',3)");
$remain = user_can_see_contact_detail($curruserid,"Y");
$touser = "";
if ($uid != "")
{
	checkselfcontact($uid,$curruserid);
	$touser = setdisplayprofilelink($uid,"");
}
$check_private = getonefielddata('SELECT private_phone_no from tbldatingusermaster WHERE userid='.$uid);
//checkweatherblacklist($curruserid,$uid);
//express_intrest_insert($uid,$curruserid);
//for package confirmation Nishit start
$getpackagedetail = getdata("SELECT tbldatingusermaster.packageid, tbldatingpackagemaster.no_of_contact_display from tbldatingusermaster,tbldatingpackagemaster WHERE tbldatingusermaster.userid=$curruserid AND tbldatingusermaster.packageid=tbldatingpackagemaster.PackageId");
$getpackagerows = mysqli_fetch_array($getpackagedetail);
$no_of_rows = getdata("SELECT fromuserid from tblphonerequestmaster WHERE fromuserid=".$curruserid);
$getrows = mysqli_num_rows($no_of_rows);
$custom = getonefielddata("SELECT custom_pkg_id from tbldatingusermaster WHERE userid=$curruserid");
if($getpackagerows[1]==''){
	$getpackagerows[1] = 0;	
}
$total_contact_can_view = getonefielddata("SELECT total_contact_can_view-total_contact_already_viewd from tbldating_view_conact_package_user_master WHERE userid=$curruserid AND currentstatus=0 AND datediff(expiredate,curdate())>0");

//for daily contact control
$date = getonefielddata("SELECT contactdate from tbldatingusermaster WHERE userid=$curruserid");
if($date!=date("Y-m-d")){
	execute("update tbldatingusermaster SET contactviewed=contactviewed+1,contactdate=curdate() WHERE userid=$curruserid");		
}
//for daily contact control


//if($getrows==$getpackagerows[1] && $custom==''||$getpackagerows[1] < $getrows && $custom==''){	
if($total_contact_can_view==0){
	header("location:message.php?b=75");
	exit();
}
//for package confirmation Nishit end
if ($touser == "")
	header("location:message.php?b=5");		
	$id = getonefielddata("select id from tblphonerequestmaster where touserid=$uid and createby=$curruserid and currentstatus=0");		
	
	
	if ($id != "")
	{
		$chk_accepted = getonefielddata("SELECT accepted from tblphonerequestmaster WHERE id=".$id);		
		$check_private = getonefielddata('SELECT private_phone_no from tbldatingusermaster WHERE userid='.$uid);		
		if($chk_accepted=='A' || $check_private=='N'){				
			header("location:phonerequest.php?b=".$uid);
			exit;
		} else {		
			header("location:message.php?b=72");
			exit;
		}
	} else {
		$check_private_enable = findsettingvalue("private_contact_details");		
		if($check_private_enable=='Y'){		
		$chk_private = getonefielddata("SELECT private_phone_no from tbldatingusermaster WHERE userid=".$uid);			
		$ip =  getip();
		$action =0;
		$query = sendtogeneratequery($action,"fromuserid",$curruserid,"Y");
		$query .= sendtogeneratequery($action,"touserid",$uid,"Y");
		$query .= sendtogeneratequery($action,"createby",$curruserid,"Y");
		$query .= sendtogeneratequery($action,"createip",$ip ,"Y");
		$query = substr($query,1);
		execute("insert into tblphonerequestmaster (fromuserid,touserid,createby,createip,createdate) values(" . $query .",now())");
		$maxphrequest = getonefielddata("SELECT max(id) from tblphonerequestmaster");
		/*
		commented as per shaadiwala issue
		if($check_private=='N'){
			execute("update tblphonerequestmaster SET accepted='A' WHERE id=".$maxphrequest);	
		}*/
		/*header("location:message.php?b=73");
		exit();*/
		$id = getonefielddata("select max(id) from tblphonerequestmaster");		
		/*
		commented as per shaadiwala issue
		if($check_private=='N'){				
			header("location:phonerequest.php?b=".$uid."&act=phone");
			exit;	
		}*/
		$result = getdata("select subject,message from tbldatingemailmaster where emailid =23");		
		while($rs= mysqli_fetch_array($result))
		{ 
			$subject = $rs[0];
			$message = $rs[1];
		}
		freeingresult($result);
		$result = getdata("select name,imagenm,nickname,userid from tbldatingusermaster where userid =$curruserid");
		while($rs= mysqli_fetch_array($result))
		{
			 $sendername = $rs[0];
			 if(enable_name_display=='N'){
				$sendername = find_profile_code($rs[3]);
			 }
			 $senderimage =find_user_image($curruserid,"","","");
			 //$senderlink = displayprofilelink($curruserid);
			 //$senderlink = $sitepath."displayprofile/$curruserid"."_".$rs['nickname']; 
			 $senderlink = $sitepath."displayprofile.php?b=$curruserid"; 
		}
		freeingresult($result);
		$acceptlink = $sitepath."phone_request_received_action.php?b=$id&b1=A&to_user=".$uid."&from_user=".$curruserid;
		$declinlink = $sitepath."phone_request_received_action.php?b=$id&b1=D&to_user=".$uid."&from_user=".$curruserid;
		
		$receivername = getonefielddata("select name from tbldatingusermaster where userid =$uid");
		if(enable_name_display=='N'){
			$receivername = find_profile_code($uid);	
		}
		$subject = str_replace("[sendername]",$sendername,$subject);
		$subject = str_replace("[senderimage]",$senderimage,$subject);
		$subject = str_replace("[senderlink]",$senderlink,$subject);
		$subject = str_replace("[receivername]",$receivername,$subject);
		$subject = str_replace("[acceptlink]",$acceptlink,$subject);
		$subject = str_replace("[declinedlink]",$declinlink,$subject);

		$message = str_replace("[sendername]",$sendername,$message);
		$message = str_replace("[senderimage]",$senderimage,$message);
		$message = str_replace("[senderlink]",$senderlink,$message);
		$message = str_replace("[receivername]",$receivername,$message);
		$message = str_replace("[acceptlink]",$acceptlink,$message);
		$message = str_replace("[declinedlink]",$declinlink,$message);
		$message = str_replace("[sitename]",$sitepath,$message);
		
		$query = sendtogeneratequery($action,"FromUserId",$curruserid,"Y");
		$query .= sendtogeneratequery($action,"ToUserId",$uid,"Y");
		$query .= sendtogeneratequery($action,"Subject",$subject,"Y");
		$query .= sendtogeneratequery($action,"Message",$message,"Y");
		$query .= sendtogeneratequery($action,"ParentId",0,"Y");
		$query .= sendtogeneratequery($action,"CreateIP",$ip,"Y");
		$query .= sendtogeneratequery($action,"MessageStatus",1,"Y");		
		$query = substr($query,1);
		
	   	$sSql = "insert into tbldatingpmbmaster(FromUserId,ToUserId,Subject,Message,ParentId,CreateIP,MessageStatus,CreateDate) values(" . $query .",now())";		
	  	execute($sSql);
		
		
		insert_phone_request($uid,$curruserid);
		//update_view_contact_detail_package($packageid,$curruserid,$_GET['b']);
		$view_contact_packageid = getonefielddata("SELECT featureid from tbldating_view_conact_package_user_master WHERE userid=".$curruserid." AND currentstatus=0 AND datediff(expiredate,curdate())>0");
		
		if($view_contact_packageid!='')
		{
		//update_view_contact_detail_package($view_contact_packageid,$curruserid,$_GET['b']);
		execute("update tbldating_view_conact_package_user_master set total_contact_already_viewd=ifnull(total_contact_already_viewd,0)+1 where featureid=$view_contact_packageid and userid=$curruserid");
		}
		pmbmessage($uid,$subject);		
		header("location:message.php?b=73");
		exit();
		} else {
			$ip =  getip();
			$action =0;
			$query = sendtogeneratequery($action,"fromuserid",$curruserid,"Y");
			$query .= sendtogeneratequery($action,"touserid",$uid,"Y");
			$query .= sendtogeneratequery($action,"createby",$curruserid,"Y");
			$query .= sendtogeneratequery($action,"createip",$ip ,"Y");
			$query = substr($query,1);
			execute("insert into tblphonerequestmaster (fromuserid,touserid,createby,createip,createdate) values(" . $query .",now())");	
			header("location:phonerequest.php?b=".$uid);	
			exit;	
		}
		
	}
	function insert_phone_request($uid,$userid){
	$phnerequestid = getonefielddata("select phnerequestid from tbldatingphonerequestmaster where touserid=$uid and fromuserid=$userid and currentstatus=0");
		if ($phnerequestid == ""){
			$action =0;
			$query = sendtogeneratequery($action,"touserid",$uid,"Y");
			$query .= sendtogeneratequery($action,"fromuserid",$userid,"Y");
			$query .= sendtogeneratequery($action,"CreateBy",$userid,"Y");
			$query .= sendtogeneratequery($action,"CreateIP",getip(),"Y");
			$query = substr($query,1);
			execute("insert into tbldatingphonerequestmaster (touserid,fromuserid,CreateBy,CreateIP,CreateDate) values(" . $query .",now())");
		}
	}
	//express_intrest_insert($uid,$curruserid);
ob_flush();
?>