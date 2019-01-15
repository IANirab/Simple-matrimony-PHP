<?php
session_start();
require_once("commonfileadmin.php");
//checkadminlogin("Y");

if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
{
  $action = $_GET["b"];
  $CreateByfld = "ModifyBy";
  $ipfldnm = "ModifyIP";
}
$paymentstatus="";
$result = getdata("select paymentstatus from tbldatingpaymentmaster where paymentid=$action");
while($rs= mysqli_fetch_array($result)){
  	$paymentstatus=$rs[0];
}
freeingresult($result);


//////////////////////////////  OLD SMS CODE STRART/////////////////////////////////////
////sms package clearance start
//$get_user_id = getonefielddata("SELECT CreateBy from tbldatingpaymentmaster WHERE paymentid=$action");
//$get_package_details = getdata("SELECT packageid,days from tbldatingpaymentdetail WHERE paymentid=$action");
//if(mysqli_num_rows($get_package_details)>1){
//	$get_pkg_id = '';
//	while($rs_pkg_details = mysqli_fetch_array($get_package_details)){
//		$get_pkg_id .= $rs_pkg_details['packageid'].",";	
//	}
//	$get_pkg_id = substr($get_pkg_id,0,-1);
//} else {
//	$rs_pkg_details = mysqli_fetch_array($get_package_details);
//	$get_pkg_id = $rs_pkg_details['packageid'];
//	//$days = $rs_pkg_details['days'];
//}
////echo $get_pkg_id;
//	
//$get_pkg_det = getdata("SELECT PackageTypeId,sms_qty,Days from tbldatingpackagemaster WHERE PackageId IN ($get_pkg_id)");
//if(mysqli_num_rows($get_pkg_det)>1){
//	$pkg_type_id = '';
//	$sms_qty = '';
//	$days = '';
//	while($rs_pkg_det = mysqli_fetch_array($get_pkg_det)){
//		if($rs_pkg_det['PackageTypeId']!=""){
//			$pkg_type_id .= $rs_pkg_det['PackageTypeId'].",";
//		} if($rs_pkg_det['sms_qty']!=""){
//			$sms_qty .= $rs_pkg_det['sms_qty'].",";
//		} if($rs_pkg_det['Days']!=""){
//			$days .= $rs_pkg_det['Days'].",";
//		}	
//	}
//	$pkg_type_id = substr($pkg_type_id,0,-1);
//	$sms_qty = substr($sms_qty,0,-1);
//	$days = substr($days,0,-1);
//} else {	
//	$rs_pkg_det = mysqli_fetch_array($get_pkg_det);
//	$pkg_type_id = $rs_pkg_det['PackageTypeId'];
//	$sms_qty = $rs_pkg_det['sms_qty'];
//	$days = $rs_pkg_det['Days'];
//}
///*echo $get_pkg_id."<br>";
//echo $pkg_type_id."<br>";
//echo $sms_qty."<br>";
//echo $days."<br>";*/
//$sms_pkg_type_id = strstr($pkg_type_id,'7');

//	//echo $custom_pkg_type_id;exit;
//	
//$exp_date = date('Y-m-d', strtotime("+$days days"));
//
////if($pkg_type_id == "7"){
//if($sms_pkg_type_id != ""){	
//	$get_sms_pkkg = getdata("SELECT PackageId from tbldatingpackagemaster WHERE PackageTypeId=7");
//	$get_sms_pkkg_id = array();;
//	while($rs_sms_pkkg = mysqli_fetch_array($get_sms_pkkg)){		
//		array_push($get_sms_pkkg_id,$rs_sms_pkkg[0]);
//	}
//	$get_pkg_id_arr = explode(",",$get_pkg_id);
//	$get_exact_pkg_id_arr = array_intersect($get_sms_pkkg_id,$get_pkg_id_arr);
//	$get_sms_pkg_days = getonefielddata("SELECT Days from tbldatingpackagemaster WHERE PackageId=".$get_exact_pkg_id_arr[0]);
//	$exp_date = date('Y-m-d',strtotime("+$get_sms_pkg_days days"));
//	execute("UPDATE tbldatingusermaster SET sms_can_send=".$sms_qty.", sms_package_id='".$get_exact_pkg_id_arr[0]."', sms_exp_date='".$exp_date."' WHERE userid=".$get_user_id);
//	//execute("UPDATE tbldatingusermaster SET sms_can_send=".$sms_qty.", sms_package_id=".$get_pkg_id.", sms_exp_date='".$exp_date."' WHERE userid=".$get_user_id);
//}
//
////sms package clearance end
//
//////////////////////////////  OLD SMS CODE END/////////////////////////////////////



//////////////////////NEW SMS express $ ecard count CODE START/////////////////////////////////////////

$get_user_id = getonefielddata("SELECT CreateBy from tbldatingpaymentmaster WHERE paymentid=$action");
$get_package_id = getonefielddata("SELECT packageid from tbldatingpaymentdetail WHERE paymentid=$action");
$get_package_day = getonefielddata("SELECT Days from tbldatingpackagemaster WHERE PackageId=$get_package_id");
$get_package_smscount = getonefielddata("SELECT sms_qty from tbldatingpackagemaster WHERE PackageId=$get_package_id");
$get_package_expcount = getonefielddata("SELECT express_count from tbldatingpackagemaster WHERE PackageId=$get_package_id");
$get_package_ecardcount = getonefielddata("SELECT ecard_count from tbldatingpackagemaster WHERE PackageId=$get_package_id");
$exp_date = date('Y-m-d', strtotime("+$get_package_day days"));

	execute("UPDATE tbldatingusermaster SET sms_can_send='".$get_package_smscount."'
	, sms_exp_date='".$exp_date."',express_count='".$get_package_expcount."',ecard_count='".$get_package_ecardcount."'
	WHERE userid='".$get_user_id."' ");





//////////////////////NEW SMS express $ ecard count CODE END/////////////////////////////////////////








//custom package clearance start
$pck_id = getonefielddata("SELECT PackageId from tbldatingpaymentdetail WHERE paymentid='".$action."' ");
$pckg_type = getonefielddata("SELECT PackageTypeId from tbldatingpackagemaster WHERE PackageId='".$pck_id."' ");

if($pckg_type==8){
	
	$get_custom_pkkg = getonefielddata("SELECT PackageId from tbldatingpackagemaster WHERE PackageTypeId=8");
	$get_custom_pkkg_id = array();
	while($rs_custom_pkkg = mysqli_fetch_array($get_custom_pkkg)){
		array_push($get_custom_pkkg_id,$rs_custom_pkkg[0]);
	}
	$get_pkg_id_arr = explode(",",$get_pkg_id);
	
	$get_exact_pkg_id_arr = array_intersect($get_custom_pkkg_id,$get_pkg_id_arr);
	//print_r($get_exact_pkg_id_arr);
	$get_custom_pkg_days = getonefielddata("SELECT Days from tbldatingpackagemaster WHERE PackageId=".$get_custom_pkkg);
	$exp_date = date('Y-m-d',strtotime("+$get_custom_pkg_days days"));
	//echo $get_custom_pkkg;exit;
	execute("UPDATE tbldatingusermaster SET custom_pkg_id=".$get_custom_pkkg.", custom_exp_date='".$exp_date."' WHERE userid=".$get_user_id);
	
}

//custom package clearance end

$txtnote=get_form_data($_POST['txtnote'],1);
$txtpaidamount=get_form_data($_POST['txtpaidamount'],1);

$paymentstatus .= " clear by admin ";
$ip = $_SERVER["REMOTE_ADDR"];
$query = sendtogeneratequery($action,"adminnote",$txtnote,"Y");
$query .= sendtogeneratequery($action,"paidamount",$txtpaidamount,"Y");
$query .= sendtogeneratequery($action,"paymentstatus",$paymentstatus,"Y");
$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
$query = substr($query,1);
$sSql = "update tbldatingpaymentmaster set $query,cleardate=curdate(), ModifyDate=curdate() where paymentid=$action";
execute($sSql);
sendforclearance($action); 
$retfile ="invoicemager.php";

$userid = getonefielddata("SELECT createby from tbldatingpaymentmaster WHERE paymentid=".$action);
 $sSql2 = "update  tbldatingusermaster set expire_package_send='20' where userid=".$userid." ";
execute($sSql2);



//affiliate commission start

$get_affiliateuid = getonefielddata("SELECT affiliateuid from tbldatingusermaster WHERE userid=".$userid);
if($get_affiliateuid!=""){
	$check_first = getonefielddata("SELECT count(paymentid) from tbldatingpaymentmaster WHERE CreateBy=".$userid);	
	if($check_first==1){
		$get_programid = getonefielddata("SELECT afft_program from afft_user_master WHERE afft_userid=".$get_affiliateuid);		
		$get_comm = getonefielddata("SELECT commission from afft_program_master WHERE program_id=".$get_programid);		
		$invamount = getonefielddata("SELECT totalpaymentamount from tbldatingpaymentmaster WHERE paymentid=".$action);		
		$comm_amount = ($invamount * $get_comm) / 100;		
		$fetch_comm = getonefielddata("SELECT afft_total_comm from afft_user_master WHERE afft_userid=".$get_affiliateuid);		
		$new_comm = round($comm_amount) + round($fetch_comm);				
		execute("UPDATE afft_user_master SET afft_total_comm=".$new_comm." WHERE afft_userid =".$get_affiliateuid);
		$commission_sql = "INSERT into afft_commission_master SET afft_user_id='".$get_affiliateuid."', afft_comm_amount='".$comm_amount."', aff_comm_month='".date("m")."', afft_comm_year='".date("Y")."', afft_matri_id='".$userid."', createby='".$userid."', createip='".$_SERVER['REMOTE_ADDR']."', createdate='".date("Y-m-d")."'";		
		execute($commission_sql);
	}
}
//affiliate commission end

//franchisee code start
$franchisee_code = getonefielddata("SELECT franchisee_code from tbldatingpaymentmaster WHERE currentstatus=0 AND paymentid=".$action);
if($franchisee_code!=''){
	$agentid = getonefielddata("SELECT agentid from tbl_agent_master WHERE agent_code=".$franchisee_code." AND agent_typeid=2");	
	$packageid = getonefielddata("SELECT group_concat(packageid) from tbldatingpaymentdetail WHERE paymentid=".$action);
	$invoice_details = getdata("SELECT createby,totalpaymentamount from tbldatingpaymentmaster WHERE paymentid=".$action);
	$invoicing_rs = mysqli_fetch_array($invoice_details);
	$invcreateby = $invoicing_rs[0];
	$pkg_amount = $invoicing_rs[1];
	
	/*$useragentid = getonefielddata("SELECT staff_agentid from tbldatingusermaster WHERE userid=".$userid);	
	if($useragentid!=''){
		$getagentmxid = getonefielddata("SELECT max(id) from tbl_agent_fund_master WHERE agentid=".$useragentid." AND balance_amount!=''");
		if($getagentmxid!=''){
			$balance_amount = getonefielddata("SELECT balance_amount from tbl_agent_fund_master WHERE id=".$getagentmxid);
			$newbalance = $balance_amount - $pkg_amount;		
		} else {
			$newbalance = '';
		}
		execute ("INSERT into tbl_agent_fund_master SET userid='".$userid."', agentid='".$useragentid."', packageid='".$packageid."', cleardate=curdate(), pkg_amount='".$pkg_amount."', balance_amount='".$newbalance."', createip='".$_SERVER['REMOTE_ADDR']."', createdate=curdate(), createby='".$_SESSION[$session_name_initital.'adminlogin']."'");
	}*/
	
	//$useragentid = getonefielddata("SELECT staff_agentid from tbldatingusermaster WHERE userid=".$userid);	
	if($agentid!=''){
		$getagentmxid = getonefielddata("SELECT max(id) from tbl_agent_fund_master WHERE agentid=".$agentid." AND balance_amount!=''");		
		if($getagentmxid!=''){
			$balance_amount = getonefielddata("SELECT balance_amount from tbl_agent_fund_master WHERE id=".$getagentmxid);
			$newbalance = $balance_amount - $pkg_amount;		
		} else {
			$newbalance = '';
		}		
		execute ("INSERT into tbl_agent_fund_master SET userid='".$userid."', agentid='".$agentid."', packageid='".$packageid."', cleardate=curdate(), pkg_amount='".$pkg_amount."', balance_amount='".$newbalance."', createip='".$_SERVER['REMOTE_ADDR']."', createdate=curdate(), createby='".$_SESSION[$session_name_initital.'adminlogin']."'");
	}
	/*$maxbalid = getonefielddata("SELECT max(id) from tbl_agent_fund_master WHERE agentid=".$agentid." AND balance_amount!=''");	
	if($maxbalid!=''){
		$agntbalance_amount = getonefielddata("SELECT balance_amount from tbl_agent_fund_master WHERE id=".$maxbalid);
		$agntnewbalance = $agntbalance_amount + $comm_amount;
	} else {
		$agntnewbalance = $comm_amount;
	}
	
	$membership_commision = getonefielddata("SELECT membership_commission from tbl_agent_master WHERE agentid=".$agentid);	
	execute("INSERT into tbl_agent_fund_master SET userid='".$userid."', agentid='".$agentid."', packageid='".$packageid."', cleardate=curdate(), comm_amount='".$membership_commision."', balance_amount='".$agntnewbalance."', createip='".$_SERVER['REMOTE_ADDR']."', createdate=curdate(), createby='".$_SESSION[$session_name_initital.'adminlogin']."'");	*/	
}
//franchisee code end
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>