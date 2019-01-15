<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $createbyfld = "modifyby";
	  $ipfldnm = "modifyip";
	}
else
	{
	  $action = 0;
	  $createbyfld = "createby";
	  $ipfldnm = "createip";
	}
	
	$title='';
	$note='';
	$hsncode='';
	$cess1='';
	$cess2='';
	$fdate='';
	$from_date='';
	$tdate='';
	$to_date='';
	$igst='';
	$cgst='';
	$sgst='';
	$back=$_SERVER['HTTP_REFERER'];
	
	if(isset($_POST['hsncode']) && $_POST['hsncode']!=''){
		
	    $chek_hsn= getdata("select count(id) from tbldatingtaxmaster where currentstatus in (0,1) and hsncode='".$_POST['hsncode']."' and id!='".$action."' ");
 	    $rs = mysqli_fetch_array($chek_hsn);
		if($rs[0]>0){ 
		$_SESSION[$session_name_initital . "adminerror"] = "HSN Code All ready in use";
		header("location:$back");
		exit;
		}
		
	}


	
	if(isset($_POST['title']) && $_POST['title']!=''){
		$title=$_POST['title'];
	}else{
		$_SESSION[$session_name_initital . "adminerror"] = "Please enter title";
		header("location:$back");
		exit;
	}
	
	if(isset($_POST['note']) && $_POST['note']!=''){
		$note=$_POST['note'];
	}
	
	if(isset($_POST['hsncode']) && $_POST['hsncode']!=''){
		$hsncode=$_POST['hsncode'];
	}
	
	if(isset($_POST['cess1']) && $_POST['cess1']!=''){
		$cess1=$_POST['cess1'];
	}
	
	if(isset($_POST['cess2']) && $_POST['cess2']!=''){
		$cess2=$_POST['cess2'];
	}
	
	if(isset($_POST['from_date']) && $_POST['from_date']!=''){
		$fdate=$_POST['from_date'];
		$date_f=date_create("$fdate");			
		$from_date=date_format($date_f,"Y-m-d");
	}
	
	if(isset($_POST['to_date']) && $_POST['to_date']!=''){
		$tdate=$_POST['to_date'];
		$date_t=date_create("$tdate");			
		$to_date=date_format($date_t,"Y-m-d");
	}
	
	if(isset($_POST['igst']) && $_POST['igst']!=''){
		$igst=$_POST['igst'];
	}
	
	if(isset($_POST['cgst']) && $_POST['cgst']!=''){
		$cgst=$_POST['cgst'];
	}
	
   if(isset($_POST['sgst']) && $_POST['sgst']!=''){
		$sgst=$_POST['sgst'];
	}
	
		
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"title",$title,"Y");
	$query .= sendtogeneratequery($action,"note",$note,"Y");	
	$query .= sendtogeneratequery($action,"hsncode",$hsncode,"Y");
	$query .= sendtogeneratequery($action,"igst",$igst,"Y");
	$query .= sendtogeneratequery($action,"cgst",$cgst,"Y");
	$query .= sendtogeneratequery($action,"sgst",$sgst,"Y");
	$query .= sendtogeneratequery($action,"cess1",$cess1,"Y");
	$query .= sendtogeneratequery($action,"cess2",$cess2,"Y");
	$query .= sendtogeneratequery($action,"fromdate",$from_date,"Y");
	$query .= sendtogeneratequery($action,"todate",$to_date,"Y");
	$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	$query = substr($query,1);

	if ($action == 0)
	{
	 	
	     $sSql = "insert into tbldatingtaxmaster (title,note,hsncode,igst,cgst,sgst,cess1,cess2,fromdate,todate,CreateBy,$ipfldnm) values($query)";				
		execute($sSql);
		$action = getonefielddata("SELECT max(id) from tbldatingtaxmaster");
		$retfile ="taxmanager.php";
	}
	else
	{
		
		$sSql = "update tbldatingtaxmaster set $query where id=$action";
		execute($sSql);
		$retfile ="taxmanager.php";
	}

$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>