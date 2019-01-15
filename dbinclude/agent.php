<?
//************************ referal function start**************************
function check_valid_agent($agentcode)
{	
	 return getonefielddata("select agentid from tbl_agent_master  where currentstatus=0 and agent_code='".$agentcode."'");
}


function register_user_for_agent($userid,$agentcode)
{
$agentid =0;
$action=0;
if ($agentcode != "")
{
$result = getdata("select agentid,reg_commission,discount_percentage,membership_commission from tbl_agent_master
  where currentstatus=0 and agent_code='".$agentcode."'");
while ($rs = mysqli_fetch_array($result))
{
	$agentid = $rs[0];
	$reg_commission = $rs[1];
	$discount_percentage = $rs[2];
	$membership_commission= $rs[3];
}
if ($agentid != "")
{
	$agent_userid = getonefielddata("select agent_userid from tbl_agent_user_master where agentid='".$agentid."'
	 and userid='".$userid."' ");
	if ($agent_userid == "")
	{
		$query = sendtogeneratequery($action,"agentid",$agentid,"Y");
		$query .= sendtogeneratequery($action,"userid",$userid,"Y");
		$query .= sendtogeneratequery($action,"reg_commission",$reg_commission,"Y");
		$query .= sendtogeneratequery($action,"discount_percentage",$discount_percentage,"Y");
		$query .= sendtogeneratequery($action,"membership_commission",$membership_commission,"Y");
		$query .= sendtogeneratequery($action,"createip",getip(),"Y");
		$query = substr($query,1);
		$sSql = "insert into tbl_agent_user_master (agentid,userid,reg_commission,discount_percentage,membership_commission,createip,createdate) values(" . $query .",now())";
	execute($sSql);
	$update_user = "UPDATE tbldatingusermaster SET agent_commission='".$reg_commission."' WHERE userid=".$userid;
	execute($update_user);
	update_agent_commision(4,$userid,'','');
	
	}
}
}
return $agentid;

}

function update_franchisee_fund($commision_add_type,$userid,$agentid,$invoiceid){
	if ($commision_add_type == 3)
	{
		$fldnm = "membership_commission";
		$check_calculate_fld ="membership_commission_calculated";
		$date_fld ="membership_commission_date";
	}
	elseif ($commision_add_type == 4)
	{
		$fldnm = "reg_commission";
		$check_calculate_fld ="reg_commision_calculated";
		$date_fld ="reg_commision_date";
	}
	//$comm_data = getdata("SELECT fldnm from tbl_agent_master WHERE $check_calculate_fld='N'");
	
	if($invoiceid!=''){
		$invoice_amount = getonefielddata("SELECT totalpaymentamount from  tbldatingpaymentmaster WHERE paymentid=".$invoiceid);
	} else {
		$invoice_amount = '';	
	}
	
	$comm_data = getdata("SELECT $fldnm from tbl_agent_master WHERE currentstatus=0 AND agentid='".$agentid."' ");
	$comm_rs = mysqli_fetch_array($comm_data);
	if($commision_add_type==3){
		if($invoice_amount!=''){			
			$comm_rate = $comm_rs[0];
			if($comm_rate!=''){
				$commision = ($invoice_amount * $comm_rate) / 100;
			}
		} else {
			$commision = '';
		}
	}
	if($commision_add_type==4){
			$commision = $comm_rs[0];
	}
	//$commision = $comm_rs[0];
	
	$invoice_amount = getonefielddata("SELECT totalpaymentamount from tbldatingpaymentmaster WHERE paymentid=".$invoiceid);		
	$userid = getonefielddata("SELECT createby from tbldatingpaymentmaster WHERE paymentid=".$invoiceid);
	$packageid = getonefielddata("SELECT group_concat(packageid) from tbldatingpaymentdetail WHERE paymentid=".$invoiceid);
	$maxid = getonefielddata("SELECT max(id) from tbl_agent_fund_master WHERE agentid=".$agentid." AND balance_amount!=''");
	if($maxid!=''){
		$balance_amount = getonefielddata("SELECT balance_amount from tbl_agent_fund_master WHERE id=".$maxid);
	} else {
		$balance_amount = '';	
	}
	//$invoice_amount = number_format($invoice_amount,2);
	if($balance_amount!=''){		
		$newbalance_amount = ($balance_amount + $commision) - $invoice_amount;
		//$newbalance_amount = number_format($newbalance_amount,2);
	} else {
		$newbalance_amount = (0 + $commision) - $invoice_amount;
		//$newbalance_amount = number_format($newbalance_amount,2);
	}
	execute("INSERT into tbl_agent_fund_master SET agentid=".$agentid.", userid=".$userid.", invoiceid=".$invoiceid.", pkg_amount='".$invoice_amount."', packageid='".$packageid."', comm_amount='".$commision."', currentstatus=1, createdate=curdate(), balance_amount='".$newbalance_amount."'");
}

function update_franchisee_commision($commision_add_type,$userid,$agentid,$invoiceid=""){
	if ($commision_add_type == 3)
	{
		$fldnm = "membership_commission";
		$check_calculate_fld ="membership_commission_calculated";
		$date_fld ="membership_commission_date";
	}
	elseif ($commision_add_type == 4)
	{
		$fldnm = "reg_commission";
		$check_calculate_fld ="reg_commision_calculated";
		$date_fld ="reg_commision_date";
	}
	//$comm_data = getdata("SELECT fldnm from tbl_agent_master WHERE $check_calculate_fld='N'");
	if($invoiceid!=''){
		$invoice_amount = getonefielddata("SELECT totalpaymentamount from  tbldatingpaymentmaster WHERE paymentid=".$invoiceid);
	} else {
		$invoice_amount = '';	
	}
	
	$comm_data = getdata("SELECT $fldnm from tbl_agent_master WHERE currentstatus=0 AND agentid='".$agentid."' ");
	$comm_rs = mysqli_fetch_array($comm_data);
	if($commision_add_type==3){
		if($invoice_amount!=''){			
			$comm_rate = $comm_rs[0];
			if($comm_rate!=''){
				$commision = ($invoice_amount * $comm_rate) / 100;
			}			
		} else {
			$commision = '';
		}
	}
	if($commision_add_type==4){
			$commision = $comm_rs[0];
	}
	
	
	$result = getdata("select agent_userid,agentid,$fldnm from tbl_agent_user_master where $check_calculate_fld='N' and currentstatus=0 and userid=$userid ");
	$agent_typeid = getonefielddata("SELECT agent_typeid from tbl_agent_master WHERE agentid='".$agentid."' ");	
	
	//$balanceid = getonefielddata("select balanceid from tbl_commision_unpaid_master where agentid=$agentid and currentstatus=0 and commission_type_id=$commision_add_type");
	if ($balanceid == ""){
		execute("INSERT into tbl_agent_commision_unpaid_master SET userid=".$userid.", invoiceid='".$invoiceid."', invoice_amount='".$invoice_amount."', agent_typeid='".$agent_typeid."', agentid=".$agentid.", unpaid_commision='".$commision."', commission_typeid='".$commision_add_type."', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'");
	//	execute("insert into tbl_commision_unpaid_master (agentid,unpaid_commision,commission_type_id,modifydate) values ($agentid,$commision,$commision_add_type,curdate())");
	} else {
		execute("INSERT into tbl_agent_commision_unpaid_master SET userid='".$userid."', invoiceid='".$invoiceid."', invoice_amount='".$invoice_amount."', agent_typeid='".$agent_typeid."',  agentid='".$agentid."', unpaid_commision='".$commision."', commission_typeid='".$commision_add_type."', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'");
		//execute("update tbl_commision_unpaid_master set unpaid_commision=ifnull(unpaid_commision,0)+$commision,modifydate=curdate() where agentid= $agentid and commission_type_id=$commision_add_type");
	}
	//execute("update tbl_agent_user_master set $check_calculate_fld='Y',$date_fld=curdate() where agent_userid=$agent_userid");
	$commissiosn_type = getonefielddata("select title from tbl_commission_type_master where id=$commision_add_type");
$exmessage ="commission type : $commission_type<br>commission : " . $commision;
	send_email_agent("agent_new_commision_received_subject","agent_new_commision_received_message",$exmessage ,$agentid);	
}

function update_commagent_commision($commision_add_type,$userid,$invoiceid=""){
	if ($commision_add_type == 3){
		$fldnm = "membership_commission";
		$check_calculate_fld ="membership_commission_calculated";
		$date_fld ="membership_commission_date";
	} elseif ($commision_add_type == 4){
		$fldnm = "reg_commission";
		$check_calculate_fld ="reg_commision_calculated";
		$date_fld ="reg_commision_date";
	}
		
	if($invoiceid!=''){
	
		$invoice_amount = getonefielddata("SELECT totalpaymentamount from  tbldatingpaymentmaster WHERE paymentid=".$invoiceid);
	} else {
		$invoice_amount = '';	
	}
	$result = getdata("select agent_userid,agentid,$fldnm from tbl_agent_user_master where $check_calculate_fld='N' and currentstatus=0 and userid=$userid ");
	
	while($rs= mysqli_fetch_array($result)){
		$agent_userid = $rs[0];
		$agentid = $rs[1];
		//$commision = $rs[2];
		
		if($commision_add_type==3)
		{
			
			if($invoice_amount!='')
			{			
				$comm_rate = $rs[2];
				if($comm_rate!='')
				{
					$commision = ($invoice_amount * $comm_rate) / 100;
				}			
			} 
			else 
			{
				$commision = '';
			}
		}
		
		if($commision_add_type==4)
		{
			$commision = $rs[2];
		}
		
	}

	if ($agent_userid != "")
	{
	$$balanceid="";	
	//$balanceid = getonefielddata("select balanceid from tbl_commision_unpaid_master where agentid=$agentid and currentstatus=0 and commission_type_id=$commision_add_type");
	$agent_typeid = getonefielddata("SELECT agent_typeid from tbl_agent_master WHERE agentid='".$agentid."' ");		
	
	if ($balanceid == "")
	{
		execute("INSERT into tbl_agent_commision_unpaid_master SET userid=".$userid.", invoiceid='".$invoiceid."', invoice_amount='".$invoice_amount."', agent_typeid='".$agent_typeid."', agentid=".$agentid.", unpaid_commision='".$commision."', commission_typeid='".$commision_add_type."', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'");
		//execute("insert into tbl_commision_unpaid_master (agentid,unpaid_commision,commission_type_id,modifydate) values ($agentid,$commision,$commision_add_type,curdate()) ");
	}
	else
	{		
		execute("INSERT into tbl_agent_commision_unpaid_master SET userid=".$userid.", invoiceid='".$invoiceid."', invoice_amount='".$invoice_amount."', agent_typeid='".$agent_typeid."', agentid=".$agentid.", unpaid_commision='".$commision."', commission_typeid='".$commision_add_type."', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'");
		//execute("update tbl_commision_unpaid_master set unpaid_commision=ifnull(unpaid_commision,0)+$commision,modifydate=curdate() where agentid= $agentid and commission_type_id=$commision_add_type");
	}
	
	execute("update tbl_agent_user_master set $check_calculate_fld='Y',$date_fld=curdate() where agent_userid=$agent_userid");
	
	$commission_type = getonefielddata("select title from tbl_commission_type_master where id=$commision_add_type");
$exmessage ="commission type : $commission_type<br>commission : " . $commision;
	send_email_agent("agent_new_commision_received_subject","agent_new_commision_received_message",$exmessage ,$agentid);
	}
}



function update_agent_commision($commision_add_type,$userid,$invoiceid,$franch_code)
{


		if ($commision_add_type == 3){
			$fldnm = "membership_commission";
			$check_calculate_fld ="membership_commission_calculated";
			$date_fld ="membership_commission_date";
		} elseif ($commision_add_type == 4){
			$fldnm = "reg_commission";
			$check_calculate_fld ="reg_commision_calculated";
			$date_fld ="reg_commision_date";
		}

	
		
		if($invoiceid!=''){
		$invoice_amount = getonefielddata("SELECT totalpaymentamount from  tbldatingpaymentmaster WHERE
		 paymentid='".$invoiceid."' ");
		} else {
			$invoice_amount = '';	
		}	

		$agent_userid = "";
		if($franch_code!='')
		{
		$result = getdata("select referedid,agentid,$fldnm from tbl_agent_master where currentstatus=0  
		and agent_code='".$franch_code."' ");
		}else
		{
		$result = getdata("select agent_userid,agentid,$fldnm from tbl_agent_user_master where currentstatus=0 and userid='".$userid."' ");
		}
		
		
		

		while($rs= mysqli_fetch_array($result))
		{
			$agent_userid = $rs[0];
			$agentid = $rs[1];
		
			if($commision_add_type==3)
			{
				if($invoice_amount!='')
				{			
					$comm_rate = $rs[2];
	
					if($comm_rate!='')
					{
						$commision = ($invoice_amount * $comm_rate) / 100;
					}			
				} 
				else 
				{
						$commision = '';
				}
			}


			if($commision_add_type==4)
			{
				$commision = $rs[2];
			}
 	}			
		$agent_typeid="";
			
			if($commision_add_type==4)
			{
		
		execute("INSERT into tbl_agent_commision_unpaid_master SET userid=".$userid.", invoiceid='".$invoiceid."', invoice_amount='".$invoice_amount."', agentid=".$agentid.", unpaid_commision='".$commision."',agent_typeid='".$agent_typeid."', commission_typeid='".$commision_add_type."', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."',clear='Y' ");
	
		$max_balanceid = getonefielddata("SELECT max(balanceid) from  tbl_agent_commision_unpaid_master");
		
		execute("INSERT into tbl_commision_unpaid_master SET 
		balanceid_r='".$max_balanceid."',unpaid_commision='".$commision."',
		commission_type_id='".$commision_add_type."',agentid='".$agentid."',
		modifydate=curdate(),userid='".$userid."'  ");
	
			}
	
			
			
			if($commision_add_type==3)
			{
			
			 $chk = getonefielddata("select count(balanceid) from  tbl_agent_commision_unpaid_master 
		where userid='".$userid."' and currentstatus=0 and agentid='".$agentid."' and invoiceid='".$invoiceid."' ");
	
				if($chk==0)
				{
				
				execute("INSERT into tbl_agent_commision_unpaid_master SET userid=".$userid.", invoiceid='".$invoiceid."', invoice_amount='".$invoice_amount."', agentid=".$agentid.", unpaid_commision='".$commision."',agent_typeid='".$agent_typeid."', commission_typeid='".$commision_add_type."', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'");	
			$max_balanceid1 = getonefielddata("SELECT max(balanceid) from  tbl_agent_commision_unpaid_master");
				
				execute("INSERT into tbl_commision_unpaid_master SET 
			balanceid_r='".$max_balanceid1."',unpaid_commision='".$commision."',
			commission_type_id='".$commision_add_type."',agentid='".$agentid."',
			modifydate=curdate(),userid='".$userid."'  ");
					
				}
				else
				{
	
				 execute("update tbl_agent_commision_unpaid_master set clear='Y', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."',agent_typeid='".$agent_typeid."'  where agentid= $agentid and invoiceid=$invoiceid"); 
				}

		   }

		
}
function find_agent_name($agentid)
{
	 return getonefielddata("select concat(agent_code,'-',email) from tbl_agent_master  where agentid='".$agentid."'");
}
function agent_search_query($kw)
{
	return "(tbl_agent_master.name like '%$kw%' or tbl_agent_master.phoneno like '%$kw%' or tbl_agent_master.address like '%$kw%' or tbl_agent_master.mobile like '%$kw%' or tbl_agent_master.website like '%$kw%' or tbl_agent_master.email like '%$kw%' or tbl_agent_master.city like '%$kw%' or tbl_agent_master.state like '%$kw%' or tbl_agent_master.profiledescription like '%$kw%') and ";
}
function find_discount_percentage_membersip($userid)
{
	return getonefielddata("select discount_percentage from tbl_agent_user_master where userid=$userid and currentstatus=0 and membership_commission_calculated='N'");
}
function checkerroragent()
{
	global $session_name_initital;
	echo($_SESSION[$session_name_initital . "agenterror"]);
	$_SESSION[$session_name_initital . "agenterror"]="";
	
}
function checkagentlogin()
{
global $session_name_initital;
	if(!isset($_SESSION[$session_name_initital . "agentlogin"])){
		header("location:login.php");	
		exit;
	} else if ($_SESSION[$session_name_initital . "agentlogin"] == "")
  {
	header("location:login.php");
	exit();
  }
  /*if (!session_is_registered($session_name_initital . "agentlogin"))
  {
	header("location:login.php");
	exit();
  }
  elseif ($_SESSION[$session_name_initital . "agentlogin"] == "")
  {
	header("location:login.php");
	exit();
  }*/
}
function send_email_agent($subjet_fld_nm,$message_fld_nm,$exmessage,$agentid)
{
	if ($agentid != "")
	{

	$subject = getonefielddata("select fldval from tbl_agent_setting_master where fldnm='$subjet_fld_nm'");
	$message = getonefielddata("select fldval from tbl_agent_setting_master where fldnm='$message_fld_nm'");
	$agent_email_address = getonefielddata("select email from tbl_agent_master where agentid='".$agentid."' ");
		$name = getonefielddata("select name from tbl_agent_master where agentid='".$agentid."'");
	
	$message = str_replace("[name]",$name,$message);
	$message = str_replace("[extra]",$exmessage,$message);
	
	//$message = $message ."<br>" . $exmessage;
	//echo($message);
	
	sendemaildirect($agent_email_address,$subject,$message);
	
	}
	
}	
?>
