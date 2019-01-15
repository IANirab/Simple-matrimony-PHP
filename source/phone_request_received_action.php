<?

ob_start();
require_once('commonfile.php');
checklogin($sitepath);

if(isset($_GET['b']) && $_GET['b']!='')
{ $id = $_GET['b'];}
else
{$id = 0;}

if(isset($_GET['b1']) && $_GET['b1']!='')
{ $accepted = $_GET['b1'];}
else
{$accepted = 'D';}


if (($accepted == "A" ) || ($accepted == "D"))
	$accepted1 = "";
else
$accepted = "D";

if(isset($_GET['to_user']) && $_GET['to_user']!=""){
	$to_user = $_GET['to_user'];
}
if(isset($_GET['from_user']) && $_GET['from_user']!=""){
	$from_user =$_GET['from_user'];
}
 /*else{
	$action = $_GET['b2'];
	//header("location:message.php?b=74");	`
}*/


if ($id != 0)
{	
	execute("update tblphonerequestmaster set accepted ='".$_GET['b1']."', response_received_date=now() where id=$id and touserid=$curruserid");
	if($to_user!="" && $_GET['b1']=="A"){
		$result = getdata("select subject,message from tbldatingemailmaster where emailid =24");
		while($rs= mysqli_fetch_array($result))
		{ 
			$subject = $rs[0];
			$message = $rs[1];
		}
		freeingresult($result);
		
		$result = getdata("select name,nickname,userid from tbldatingusermaster where userid=$to_user");
		while($res = mysqli_fetch_array($result)){
			$sendername = $res[0];
			$sender_nickname = $res[1];
			if(enable_name_display=='N'){
				$sendername = find_profile_code($res[2]);
			}
			//$senderlink = $sitepath."displayprofile/$to_user"."_".$sender_nickname; 	
			//$senderlink = $sitepath."displayprofile.php?b=$to_user"; 		
			$senderlink = $sitepath."phonerequest.php?b=$to_user&act=phone"; 		
		}
		$result1 = getdata("SELECT name,nickname,userid from tbldatingusermaster where userid=$from_user");
		while($res1 = mysqli_fetch_array($result1)){
			$receivername = $res1[0];
			$receiver_nickname = $res[1];
			if(enable_name_display=='N'){
				$receivername = find_profile_code($res[2]);
				$receiver_nickname = find_profile_code($res[2]);
			}
		}
		
		$message = str_replace("[receivername]",$receivername,$message);
		$message = str_replace("[sendername]",$sendername,$message);
		$message = str_replace("[senderlink]",$senderlink,$message);
		$message = str_replace("[sitename]",$sitepath,$message);
		
		$ip =  getip();
		$action = 0;
		$query = sendtogeneratequery($action,"FromUserId",$to_user,"Y");
		$query .= sendtogeneratequery($action,"ToUserId",$from_user,"Y");
		$query .= sendtogeneratequery($action,"Subject",$subject,"Y");
		$query .= sendtogeneratequery($action,"Message",$message,"Y");
		$query .= sendtogeneratequery($action,"ParentId",0,"Y");
		$query .= sendtogeneratequery($action,"CreateIP",$ip,"Y");
		$query .= sendtogeneratequery($action,"MessageStatus",1,"Y");
		
		$query = substr($query,1);
	   	$sSql = "insert into tbldatingpmbmaster(FromUserId,ToUserId,Subject,Message,ParentId,CreateIP,MessageStatus,CreateDate) values(" . $query .",now())";
	  	execute($sSql);	
		
		pmbmessage($to_user,$subject);	
	}
	if($to_user!="" && $_GET['b1']=="D"){
		$result = getdata("select subject,message from tbldatingemailmaster where emailid =25");
		while($rs= mysqli_fetch_array($result))
		{ 
			$subject = $rs[0];
			$message = $rs[1];
		}
		freeingresult($result);
		
		$result = getdata("select name,nickname,userid from tbldatingusermaster where userid=$to_user");
		while($res = mysqli_fetch_array($result)){
			$sendername = $res[0];
			$sender_nickname = $res[1];
			if(enable_name_display=='N'){
				$sender_nickname = find_profile_code($res[2]);
				$sendername = find_profile_code($res[2]);
			}	
			$senderlink = $sitepath."displayprofile/$to_user"."_".$sender_nickname; 		
		}
		$result1 = getdata("SELECT name,nickname,userid from tbldatingusermaster where userid=$from_user");
		while($res1 = mysqli_fetch_array($result1)){
			$receivername = $res1[0];
			$receiver_nickname = $res[1];
			if(enable_name_display=='N'){
				$receivername  = find_profile_code($res1[2]);
				$receiver_nickname = find_profile_code($res1[2]);
			}
		}
		
		$message = str_replace("[receivername]",$receivername,$message);
		$message = str_replace("[sendername]",$sendername,$message);
		$message = str_replace("[sitename]",$sitepath,$message);
		//$message = str_replace("[senderlink]",$senderlink,$message);
		
		$ip =  getip();
		$action = 0;
		$query = sendtogeneratequery($action,"FromUserId",$to_user,"Y");
		$query .= sendtogeneratequery($action,"ToUserId",$from_user,"Y");
		$query .= sendtogeneratequery($action,"Subject",$subject,"Y");
		$query .= sendtogeneratequery($action,"Message",$message,"Y");
		$query .= sendtogeneratequery($action,"ParentId",0,"Y");
		$query .= sendtogeneratequery($action,"CreateIP",$ip,"Y");
		$query .= sendtogeneratequery($action,"MessageStatus",1,"Y");
		
		$query = substr($query,1);
	   	$sSql = "insert into tbldatingpmbmaster(FromUserId,ToUserId,Subject,Message,ParentId,CreateIP,MessageStatus,CreateDate) values(" . $query .",now())";
	  	execute($sSql);			
		pmbmessage($from_user,$subject);	
	}
	header("location:message.php?b=74");	
}	
ob_flush();
?>


