<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if(isset($_GET['c']) && $_GET['c']!='')
{
	$c=$_GET['c'];
}else{$c='';}

if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "ModifyBy";
	  $ipfldnm = "ModifyIP";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "CreateBy";
	  $ipfldnm = "CreateIP";
	}
	$ip = $_SERVER["REMOTE_ADDR"];
  if ($_POST['txtdays'] != "")
  $txtdays =  $_POST['txtdays'];
  else
  $txtdays = "0.0";
  
  if(isset($_POST['sms_qty']) && $_POST['sms_qty']!=""){
  	$sms_qty = $_POST['sms_qty'];
  } else {
  	$sms_qty = "";
  }
  
  
  
		
		if(isset($_POST['small_note']) && $_POST['small_note']!=""){
		$small_note = $_POST['small_note'];
		} else {
		$small_note = "";
		}
		
		if(isset($_POST['big_note']) && $_POST['big_note']!=""){
		$big_note = $_POST['big_note'];
		} else {
		$big_note = "";
		}
  

  
  
  
  
   if(isset($_POST['package_feature']) && $_POST['package_feature']!=""){
	  $package_feature = implode(',',$_POST['package_feature']);
  } else {
  	  $package_feature = "";
  }
  
  
  $taxtype='';
  if($enable_tax_module == 'Y'){ 
                     
					   if(isset($_POST['taxtype']) && $_POST['taxtype']!=0.0){
	                     $taxtype = $_POST['taxtype'];
					   }else{
						 $taxtype=''; 
					   }
  
  }else{
	 $taxtype='';  
  }
  
  
if(isset($_POST['main_package_typeid']) && $_POST['main_package_typeid']!='')
{
	$main_package_typeid=$_POST['main_package_typeid'];
}else{$main_package_typeid='';}




if(isset($_POST['excnt']) && $_POST['excnt']!=""){
  $excnt = $_POST['excnt'];
} else {
 $excnt = 0;
}

if(isset($_POST['ecardcnt']) && $_POST['ecardcnt']!=""){
  $ecardcnt = $_POST['ecardcnt'];
} else {
 $ecardcnt = 0;
}






	$query = sendtogeneratequery($action,"Description",$_POST['txttitle'],"Y");
	$query .= sendtogeneratequery($action,"main_package_typeid",$main_package_typeid,"Y");
	$query .= sendtogeneratequery($action,"PackageTypeId",$_POST['cmbpackagetype'],"Y");
	$query .= sendtogeneratequery($action,"Price",$_POST['txtprice'],"Y");
	$query .= sendtogeneratequery($action,"Days",$txtdays,"Y");
	$query .= sendtogeneratequery($action,"sms_qty",$sms_qty,"Y");	
	//$query .= sendtogeneratequery($action,"display_price",$_POST['display_price'],"Y");
	//$query .= sendtogeneratequery($action,"display_price_curr_code",$_POST['display_price_curr_code'],"Y");
	//$query .= sendtogeneratequery($action,"allow_messenger",$_POST['allow_messanger'],"Y");
	$query .= sendtogeneratequery($action,"note",$_POST['txtnote'],"Y","N");
	$query .= sendtogeneratequery($action,"small_note",$small_note,"Y","N");
	$query .= sendtogeneratequery($action,"big_note",$big_note,"Y","N");
   

  
	
	if ($_POST['no_of_contact_display'] != "")
		$no_of_contact_display = $_POST['no_of_contact_display'];
	else
		$no_of_contact_display = "";
		
		
		
	if ($no_of_contact_display == "0")
		$no_of_contact_display = "0.0";
	
	if(isset($_POST['parentid']) && $_POST['parentid']!='')
	{
		$parentid=$_POST['parentid'];
	}else{$parentid='';}
	
//	if ($no_of_contact_display == "")
//		$no_of_contact_display = 0;
	$query .= sendtogeneratequery($action,"no_of_contact_display",$no_of_contact_display,"Y");	
	$query .= sendtogeneratequery($action,"formattypeid",$_POST['cmbformat'],"Y");
	//$query .= sendtogeneratequery($action,"default_type",$_POST['cmbdefault'],"Y");
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	$query .= sendtogeneratequery($action,"parentid",$parentid,"Y");
	//$query .= sendtogeneratequery($action,"order_by",$_POST['order_by'],"Y");
	$query .= sendtogeneratequery($action,"package_feature",$package_feature,"Y");
	$query .= sendtogeneratequery($action,"hsncode",$taxtype,"Y");
	$query .= sendtogeneratequery($action,"express_count",$excnt,"Y","N");
    $query .= sendtogeneratequery($action,"ecard_count",$ecardcnt,"Y","N");
	
	
	

	$query = substr($query,1);
//echo $query; exit;
	if ($action == 0)
	{
		//if($_POST['cmbdefault']==1){
//		$exist_default = getonefielddata("SELECT default_type from tbldatingpackagemaster WHERE default_type=1 AND currentstatus=0");		
//		if($exist_default!=""){
//			$_SESSION[$session_name_initital . "adminerror"] = "Default package is already existed";
//				header("location:packagemaster.php?c=".$c."");
//				exit;			
//			
//		}
//		}
 	$sSql = "insert into tbldatingpackagemaster (Description,main_package_typeid,PackageTypeId,Price,Days,sms_qty,note,small_note,big_note,no_of_contact_display,formattypeid,CreateBy,$ipfldnm,parentid,package_feature,hsncode,express_count,ecard_count,CreateDate) values($query,curdate())";				
	
		execute($sSql); 
		
		  $result = getdata("select PackageId from tbldatingpackagefeaturedmaster where currentstatus=0 order by PackageId desc limit 0,1");
          $rs = mysqli_fetch_array($result);
		  $id=$rs['PackageId'];
	 	   if (is_uploaded_file($_FILES['packageimg']['tmp_name']))
			{
				$t=time() ;
				$filenm = "packageimg$id$t." . strrev(substr(strrev($_FILES['packageimg']['name']),0,3));
				copy($_FILES['packageimg']['tmp_name'],"../uploadfiles/$filenm");
				execute("update tbldatingpackagefeaturedmaster set image='$filenm' where PackageId=$id");
			}
			$retfile ="packagemaster.php";
	}
	else
	{
		if($_POST['cmbdefault']==1){
		$exist_default = getonefielddata("SELECT default_type from tbldatingpackagemaster WHERE default_type=1 AND currentstatus=0 AND PackageId!=".$action);		
		if($exist_default!=""){
			$_SESSION[$session_name_initital . "adminerror"] = "Default package is already existed";
				header("location:packagemaster.php?b=".$action."&c=".$c." ");
				exit;
			
		}
		}
	 	 $sSql = "update tbldatingpackagemaster set $query,ModifyDate=curdate() where PackageId=$action";  
		execute($sSql);
		
		    if (is_uploaded_file($_FILES['packageimg']['tmp_name']))
			{ 
				$checkimage1=Validiate_image("packageimg");  
				if($checkimage1=='Y')
				{
					$t=time() ;
					$filenm = "packageimg$action$t." . strrev(substr(strrev($_FILES['packageimg']['name']),0,3));
					copy($_FILES['packageimg']['tmp_name'],"../uploadfiles/site_$sitethemefolder/$filenm");
					execute("update tbldatingpackagemaster set image='$filenm' where PackageId=$action");
				}
			}
			
			if (is_uploaded_file($_FILES['smallimg']['tmp_name']))
			{ 
				$checkimage2=Validiate_image("smallimg");  
				if($checkimage2=='Y')
				{
					$t=time() ;
					$filenm = "packageimgsmallimg$action$t." . strrev(substr(strrev($_FILES['smallimg']['name']),0,3));
					copy($_FILES['smallimg']['tmp_name'],"../uploadfiles/site_$sitethemefolder/$filenm");
					execute("update tbldatingpackagemaster set smallimg='$filenm' where PackageId=$action");
				}
			}
		
		
		$retfile ="packagemager.php?c=".$c."";
		echo($sSql);
		
	}
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>