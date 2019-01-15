<? session_start();
require_once("commonfileadmin.php");
checkadminlogin();

$country_code = '';
$curruserid = '';
$Horoscope ='';
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){
	$user_mnager_um_1 = user_mnager_um_1();
	$user_mnager_um_2 = user_mnager_um_2();
	$user_mnager_um_3 = user_mnager_um_3();
	$user_mnager_um_4 = user_mnager_um_4();
	$user_mnager_um_5 = user_mnager_um_5();
	$user_mnager_um_6 = user_mnager_um_6();
	$user_mnager_um_7 = user_mnager_um_7();
	$user_mnager_um_8 = user_mnager_um_8();
	$user_mnager_um_9 = user_mnager_um_9();
} else {
	$user_mnager_um_1 = "N";	
	$user_mnager_um_2 = "N";
	$user_mnager_um_3 = "N";
	$user_mnager_um_4 = "N";
	$user_mnager_um_5 = "N";
	$user_mnager_um_6 = "N";
	$user_mnager_um_7 = "N";
	$user_mnager_um_8 = "N";	
	$user_mnager_um_9 = "N";
}
$status  = "0,1,2,4";
$quer_st = "";
$ex_quer_st="";
if (isset($_GET["b"]))
if ($_GET["b"] != "")
{
	$status = $_GET["b"];
	$quer_st = $status;
	$ex_quer_st ="*b=$status";
}
$exque ="";
if (isset($_GET["b2"]))
if ($_GET["b2"] != "")
{
	if ($_GET["b2"] =="e"){
		$exque = " datediff(tbldatingusermaster.expiredate,curdate()) < 0 and ";
	} else {
		$exque = " datediff(tbldatingusermaster.expiredate,curdate()) > 0 and tbldatingusermaster.packageid<>1 and ";
	}
	$status =0;
	$quer_st = $status ."&b2=" . $_GET["b2"];
	$ex_quer_st .="*b2=".$_GET["b2"];
}
$remove_query = "";
if (isset($_GET["b1"]))
if ($_GET["b1"] != "")
	$remove_query = $_GET["b1"];
if ($remove_query == "-1")
	$_SESSION[$session_name_initital . "admin_user_search"]="";
if($user_mnager_um_9=='Y' || $user_mnager_um_9=='N')	{
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
 function show_password(userid)
 {
	$("#hide_pass"+userid).hide();	
	$("#show_pass"+userid).show();	
 }
  function hide_password(userid)
 {
	$("#show_pass"+userid).hide();	
	$("#hide_pass"+userid).show();	
 }
 
 </script>
			

<script language="javascript">
function changetransfee(filenm,id)
{
	document.frmmodify.action = filenm;
	document.frmmodify.submit();
}
function search_cast(val){
		if(val!=''){

			$.post("search_cast.php",{
				religionid:val},
				function (data){
					if(data!=''){
						
						document.getElementById('span_cast_hide').style.display = 'none';
						document.getElementById('span_cast').style.display = 'block';
						document.getElementById('span_cast').innerHTML = data;
					}	
				
				}
				)
		}
	
	}
</script>
<script language="javascript" type="text/javascript">
function update_fav(id){
	var favlist = document.getElementById('fav'+id).value;
	if(favlist!=''){
		$.post("update_fav.php",{
			favlist:favlist,
			userid:id	
		}, function (data){
			alert(data);
		})
	}
}
function enable_favourite(id){
	if(document.getElementById('spfav'+id).style.display=='none'){
		document.getElementById('spfav'+id).style.display = 'block';
	} else {
		document.getElementById('spfav'+id).style.display = 'none';
	}
}

function assign_employee(empid,userid){
	$.post("assign_employee.php",{
		empid:empid,
		userid:userid	
	}, function (data){
		window.location.reload();
	})	
}
</script>
<script>
function chkforrec() {
	if(document.getElementById("allrec").value == 0) {
		document.getElementById("hideifnot").style.display = "none";
	}
}
function chkall() {
	
	var newvar = "";
	var tot = document.getElementById("allrec").value;

	for(var i = 1; i <= tot; i++) {

		if(document.getElementById("chk"+i).checked == false) {
		document.getElementById("chk"+i).checked = true;
		} else {
			document.getElementById("chk"+i).checked = false;
		}
		if(document.getElementById("chk"+i).checked == true) {
			newvar += document.getElementById("chk"+i).value + ",";
		}else{
			newvar += "";
		}
		
		document.getElementById("deleteall").value = newvar;
		//alert(document.getElementById("deleteall").value);
	}
}
function confirmmsg() {
	if(document.getElementById("deleteall").value == "") {
		alert("Please select at leat one checkbox");
		return false;
	}
	var ok = confirm("Are You Sure You Want To Delete");
	if(!ok) {
		return false;
	}
}
function confirmmsg1() {
	if(document.getElementById("deleteall").value == "") {
		alert("Please select at leat one checkbox");
		return false;
	}
	var ok = confirm("Are You Sure You Want To Approve The Images");
	if(!ok) {
		return false;
	}
}
function confirmmsg1() {
	if(document.getElementById("deleteall").value == "") {
		alert("Please select at leat one checkbox");
		return false;
	}
	var ok = confirm("Are You Sure You Want To Approve The Albums");
	if(!ok) {
		return false;
	}
}

function change_check(id) {

	//alert(id)
	if(document.getElementById(id).checked == true){
	var first = document.getElementById(id).value+",";
	document.getElementById("deleteall").value += first;
	//var second = document.getElementById(id).value;
	}else{
	var first = "";
	document.getElementById("deleteall").value += first;
	}
	//alert(first)
}
</script>

<script>

function show_add_more_cnt(id)
{

	$("#add_more_cnt"+id).toggle();
}



function send_cnt(cnt_userid)
{
	
	var cnt_count = $("#cnt_count"+cnt_userid).val();
				
							
		$.ajax({
		type: "POST",
		url: "increase_contact.php",
		data:'count='+cnt_count+'&userid='+cnt_userid,
		success: function(data){
			$("#cnt_count"+cnt_userid).val("");
			location.reload(); 
		}
		});
}




</script>

<script>

function show_smsdiv(id)
{
	$("#verify_sms"+id).toggle();
}

function send_smsverify(userid)
{
	
	//var smscode = $("#smscode"+userid).val();
		$.ajax({
		type: "POST",
		url: "sms_verify.php",
		//data:'smscode='+smscode+'&userid='+userid,
		data:'userid='+userid,
		success: function(data)
		{
			$("#error_sms"+userid).show();
			$("#error_sms"+userid).html(data);
				setTimeout(function()
				{ 
					$("#error_sms"+userid).hide();
					$("#error_sms_hide"+userid).hide();
					if(data=='SMS Verified Sucessfully')
					{
						$("#verify_sms"+userid).hide();
					}
			}, 5000);
		}
		});

}

</script>

<script>
	function show_user(id)
	{
			$.ajax({
			type: "POST",
			url: "user_analytics.php",
			data:'b='+id,
			success: function(data){
				$("#show_user_analytics").html(data);
			}
			});
	}
	
	
		function show_log(id)
	{
			$.ajax({
			type: "POST",
			url: "user_log.php",
			data:'b='+id,
			success: function(data){
				$("#show_user_log").html(data);
			}
			});
	}
	
	function show_astro(id)
	{
			$.ajax({
			type: "POST",
			url: "user_astro_detail.php",
			data:'b='+id,
			success: function(data){
				$("#show_user_astro").html(data);
			}
			});
	}
	
	</script>

<script>



function send_spam(type,userid)
{
			$.ajax({
				type: "POST",
				url: "report_spam.php",
				data:'type='+type+'&userid='+userid,
				success: function(data){
					location.reload();
					//$("#city").html(data);
				}
				});
}

</script>


</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->
		<!-- CENTER START ######################## -->
        
      

				<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle"><i class="fa fa-user"></i> 
            User Manager 
            <?
			
			if(isset($_GET['i']) && $_GET['i']!='' && $_GET['i']=='N')
			{
				echo "(Unapproved profile images)";
			}
			elseif(isset($_GET['a']) && $_GET['a']!='' && $_GET['a']==1)
			{
				echo "(Unapproved album)";
			}
			elseif(isset($_GET['b2']) && $_GET['b2']!='' && $_GET['b2']=='p')
			{
				echo "(Paid member)";
			}
			elseif(isset($_GET['b2']) && $_GET['b2']!='' && $_GET['b2']=='e')
			{
				echo "(Membership expired)";
			}
			elseif(isset($_GET['b']) && $_GET['b']!='' && $_GET['b']==0)
			{
				echo "(Active)";
			}
			elseif(isset($_GET['b']) && $_GET['b']!='' && $_GET['b']==1)
			{
				echo "(Unapproved)";
			}
			elseif(isset($_GET['b']) && $_GET['b']!='' && $_GET['b']==2)
			{
				echo "(Deactive)";
			}
			elseif(isset($_GET['b']) && $_GET['b']!='' && $_GET['b']==3)
			{
				echo "(Trash)";
			}
			elseif(isset($_GET['b']) && $_GET['b']!='' && $_GET['b']==4)
			{
				echo "(Deactive by user)";
			}
			elseif(isset($_GET['b']) && $_GET['b']!='' && $_GET['b']==5)
			{
				echo "(Offline)";
			}
			elseif(isset($_GET['b']) && $_GET['b']!='' && $_GET['b']==8)
			{
				echo "(Spam)";
			}
			elseif(isset($_GET['b1']) && $_GET['b1']!='' && $_GET['b1']==-1)
			{
				echo "(ALL)";
			}
			?>
            
            
            </h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->



<?=checkerroradmin()?>
<div class="form-wrapper">

<div class="col-lg-6 col-md-6">
<form name="frm_search_profile" class="form_first" action="user_search_profileid.php" method="post">
<div class="form-group">
<label>profile id :</label> 
<input type="text" name="txtprofileid" class="form-control" placeholder="e.g. R-12345601">
<input type="hidden" name="section" value="proid" >
<input type="submit" value="Search" class="btn" id="submit_form_key1">
</div>
</form>
</div>

<div class="col-lg-6 col-md-6">
<form name="frm_search_profile" class="form_first" action="user_search_profileid.php" method="post">
<div class="form-group">
<label>user id :</label> 
<input type="text" name="search_userid" class="form-control" placeholder="e.g. 102">
<input type="hidden" name="section" value="uid" >
<input type="submit" value="Search" class="btn" id="submit_form_key">
</div>
</form>
</div>




<form name="frm_search_profile_detail" id="frm_search_profile_detail" class="form_second" action="user_search_detail.php" method="post">
<div class="form-group">
<label>Looking for</label> <select name='LookingFor' class="form-control">
<option value="0">Any</option>
<? fillcombo(lookingfor_query($curruserid),"",""); ?>
</select></div>
<div class="form-group Age_sec">
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Age</label>
<span> 
<i>form</i>
<select name='MinAge' class="form-control"><?  fillage("") ?></select>  
<i>To </i>
<select name='MaxAge' class="form-control"><? 	fillage("65") ?></select>
</span>
</div>
<div class="Cast_sec_Full">
<div class="form-group">
<label>Religion</label>
<select name="religion" class="form-control" onChange="search_cast(this.value);"><?=fillcombo("SELECT id,title from tbldatingreligianmaster WHERE currentstatus=0","","Any");?></select>
</div>

<div class="form-group" id="span_cast_hide">
<label>Caste</label>
<select name="cast" id="cast" class="form-control">
<option value="0">Select</option>
</select>
</div>

<div class="form-group" id="span_cast" style="display:none">
</div>



<div class="form-group">
<label>Country</label> <select name='Country' class="form-control">
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0 order by title ","","select"); ?>
</select>
</div>
</div>

<div class="form-group Cast_sec"><label>Keyword </label>
<input type="text" name="txtkeyword" class="form-control" placeholder="e.g rahul@makeyoursoftware.com ,Rahul, 8888888888, Raj">
<p class="note"> Search by Email Id, Name, Mobile, Nickname</p>
</div>

<input type="submit" value="Search" class="btn" >
</form>
</div>
<div class="form_check">
<form name="delall" method="post" action="user_delete_all.php" class="">
<input type="button" value="Check All" name="chkall" onClick="chkall()" class="change_button">            
</div>
<? 
if($user_mnager_um_6 == 'Y' || $user_mnager_um_6 == 'N'){
	?>
    <? 
if(isset($_GET['i']) && $_GET['i'] == 'N'){
?>	
<div class="form_check">

   
<input type="hidden" name="type" id="type" value="approve_image">
<input type="hidden" name="deleteall" id="deleteall" value="">
<input type="submit" name="all" id="all" value="Approve" onClick="return confirmmsg1();" class="change_button" >
</div>
	
<?
}else if(isset($_GET['a']) && $_GET['a'] != ''){
?>	
<div class="form_check">
            
   

<input type="hidden" name="type" id="type" value="approve_album">

<input type="hidden" name="deleteall" id="deleteall" value="">
<input type="submit" name="all" id="all" value="Approve" onClick="return confirmmsg2();" class="change_button" >


            </div>
	
<?
}else{
?>
  	
<div class="form_check">

   
<input type="hidden" name="type" id="type" value="delete">
<input type="hidden" name="deleteall" id="deleteall" value="">
<input type="submit" name="all" id="all" value="Delete" onClick="return confirmmsg();" class="change_button" >
   			<?
if(isset($_SESSION[$session_name_initital . "admin_user_search"]) && 
$_SESSION[$session_name_initital . "admin_user_search"] != "")
{
?>
<a class="btn" onClick="press_reset()">Reset Search</a>
<? } ?>

            </div>
<? } 
}?>

<div class="table-responsive">
<table  border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
    <th scope="col" width="5%">Id</th>
    <th scope="col" width="37%">User Detail</th>
    <th scope="col" class="mobile_none" width="30%">Membership Detail</th>
    <th scope="col" width="12%">Status</th>
    <th scope="col" width="15%">Action</th>
</tr>
</thead>
	<tbody>

<?
if(isset($_SESSION[$session_name_initital . "admin_user_search"]) && $_SESSION[$session_name_initital . "admin_user_search"] != "")
	$searchqry = $_SESSION[$session_name_initital . "admin_user_search"];
else
	$searchqry = "";
//$jointab="";
$album="";
$chkimgapproval = '';
if(isset($_GET['a']) && $_GET['a']=='1')
{
	$albumdata=getdata("select DISTINCT(CreateBy) from tbldatingalbummaster where currentstatus=1");
	$albumcreateby="";
	while($album=mysqli_fetch_array($albumdata))
	{
		$albumcreateby .=$album[0].",";
	}
	 if($albumcreateby!='')
	 {
		 $albumcreateby=substr($albumcreateby,0,-1);
	 }
	
	//$jointab=",tbldatingalbummaster";
	if($albumcreateby!=''){
		$album=" tbldatingusermaster.userid IN ($albumcreateby) AND";
	}
}
if(isset($_GET['i']) && $_GET['i']=='N'){
	$chkimgapproval = "tbldatingusermaster.imagenm!='' AND image_approval='N' AND ";	
}
$searchqry = $searchqry . " " . $exque.$album.$chkimgapproval;
$fromqry = " from tbldatingusermaster where $searchqry tbldatingusermaster.currentstatus in ($status) AND tbldatingusermaster.is_empadmin='N' ";

if(isset($_GET['a']) && $_GET['a']=='1'){
	$FileNm = "usermanager.php?a=".$_GET['a']."&";
}else if(isset($_GET['i']) && $_GET['i']=='N'){
	$FileNm = "usermanager.php?i=".$_GET['i']."&";
}
else
{
$FileNm = "usermanager.php?b=$quer_st&";
}
$blockchat = '';

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
$ex_quer_st .="*pgnm=".$Pgnm;
$totalnorecord = getonefielddata( "select count(userid) $fromqry ");
 ?>
 <input type="hidden" name="allrec" id="allrec" value="<?=$totalnorecord?>">
 
 
 <div class="record_cout">No of Record Found : <strong><?=$totalnorecord?></strong></div>
 
 <?		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
 $NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];
 $sql = "select tbldatingusermaster.userid,tbldatingusermaster.name,tbldatingusermaster.email,tbldatingusermaster.password,tbldatingusermaster.emailverified,tbldatingusermaster.emailverificationcode,tbldatingusermaster.currentstatus,tbldatingusermaster.mobile,tbldatingusermaster.phno,date_format(tbldatingusermaster.createdate,'$date_format'),tbldatingusermaster.packageid,date_format(tbldatingusermaster.expiredate,'$date_format'),tbldatingusermaster.landline,tbldatingusermaster.country_code,tbldatingusermaster.city_code,tbldatingusermaster.deactive_comment,tbldatingusermaster.blockchat,tbldatingusermaster.lastloginip,tbldatingusermaster.genderid,tbldatingusermaster.thumbnil_image,imagenm,verification_doc,verified_doc,image_approval,staff_agentid,verified_doc_type,
message,smsverified ". $fromqry ." order by tbldatingusermaster.userid DESC ". $NoOfRecord;
$result = getdata($sql);
$j = 1;
while($rs= mysqli_fetch_array($result)){
	$userid=$rs[0];
	$name=$rs[1];
	$email = $rs[2];
	$password=$rs[3];
	$emailverified=$rs[4];
	$emailverificationcode = $rs[5];
	$currentstatus = $rs[6];
	$mobile= $rs[7];
	$phno= $rs[8];
	$createdate= $rs[9];
	$package= $rs[10];
	$expiredate = $rs[11];
	$landline = $rs[12];
	$genderid='';
	$gender='';
	$genderid=$rs['genderid'];
	$thumbnil_image = $rs['thumbnil_image'];
	$imagenm = $rs['imagenm'];
	$verified_doc_type = $rs['verified_doc_type'];
	$message=$rs['message'];
	$smsverified=$rs['smsverified'];
	if($genderid!=''){
		$gender = getonefielddata("select gender from  tbldatingendermaster where genderid='".$genderid."'");
	}
	if ($package != ""){
		if($sitethemefolder=="cometomarryme"){
			$package = getonefielddata("select Description from tbldatingpackagemaster where PackageId=$package AND main_package_typeid IN (1,2)");
		} else {
			$package = getonefielddata("select Description from tbldatingpackagemaster where PackageId=$package");
		}
	}
		
	$profile_code = find_profile_code($userid);
	
	if($currentstatus == 0)
	{
		$status = '<a href="#" class="Mytooltipa" data-toggle="tooltip" title="Active">
		<img src="images/active.png" height="18"></a>';
	}
	elseif($currentstatus == 1)
	{
		$status = '<a href="#" class="Mytooltipa" data-toggle="tooltip" title="Unapproved">
		<img src="images/pending.png" height="15"></a>';
	}
	elseif($currentstatus == 2)
	{
		$status = '<a href="#" class="Mytooltipa" data-toggle="tooltip" title="Deactive">
		<img src="images/deactive.png" height="18"></a>';
	}
	elseif($currentstatus==3)	
	{
		$status = '<a href="#" class="Mytooltipa" data-toggle="tooltip" title="Delete">
		<img src="images/deactive.png" height="18"></a>';
	}
	elseif($currentstatus==4)	
	{
		$status = '<a href="#" class="Mytooltipa" data-toggle="tooltip" title="Self Deactive">
		<img src="images/deactive.png" height="18"></a>';
	}
	elseif($currentstatus==5)	
	{
		$status = '<a href="#" class="Mytooltipa" data-toggle="tooltip" title="Offline">
		<img src="images/deactive.png" height="18"></a>';
	}
	else {$status = '<img src="images/deactive.png" height="18">';}
		
	if($landline!=''){
		$phone = $landline;
	} else if($phno!='') {
		$phone = $phno;
	} else {
		$phone = "";	
	}
	if($rs["country_code"]!=""){
		$country_code = $rs["country_code"]."-";
	} else {
		$country_code = '';	
	}
	$city_code = $rs["city_code"];
	$deactive_comment = $rs['deactive_comment'];
	$blockchat = $rs['blockchat'];
	$lastloginip = $rs['lastloginip'];
	$verification_doc = $rs['verification_doc'];
	$verified_doc = $rs['verified_doc'];
	$image_approval = $rs['image_approval'];
	$staff_agentid = $rs['staff_agentid'];
	$favlist = getonefielddata("SELECT group_concat(userid) from tbldatingshortlistmaster WHERE createby=".$userid);
	if($j%2==0){
	$class1 = '';
	}
	
	
	
	
if($verified_doc_type!=''){
$view_verification_doc = getonefielddata("select title from tbl_verification_document where id='".$verified_doc_type."'");

}else{
$view_verification_doc='Doc';
}
            
	    $newDate = date("Y-m-d", strtotime($createdate)); 
		$date2=date("Y-m-d");
		$date3=date_create($newDate);
		$date4=date_create($date2);
		$diff=date_diff($date3,$date4);
		$ab=$diff->format("%a");; 
		if($ab <= 7)
		{ $style="OnlyHigtLigt";}
		else{$style='';}
	
?>

<tr valign="top" <?=$style?>>
          	<td >
             
            <input type="checkbox" name="chk[]" id="chk<?=$j?>" value="<?=$userid?>" onClick="change_check(this.id)"><span class="high_light"><?=$userid?></span>
            	<span class="ArtPop">                	                                        
                      <a  href="#" title="Analytics" class="pop_but" data-toggle="modal" data-target="#myModal"
            onclick="show_user('<?=$userid?>')"><img src="images/Analytics_icon.png" alt="Analytics" title="Analytics" ></a>            
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                          <div class="modal-content">
                          	<div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h2 class="pagetitle">User Analytics</h2>
                                <div id="show_user_analytics">
                                </div>  
                            </div>                         
                          </div>
                    </div>
                  </div>
                  
                  
               
             <a  href="#" title="Activity Log" class="pop_but" data-toggle="modal" data-target="#myModallog"
            onclick="show_log('<?=$userid?>')"><img src="images/ActivityLog_icon.png" alt="Activity Log" title="Activity Log" ></a>
            
                  <div class="modal fade" id="myModallog" role="dialog">
                    <div class="modal-dialog">
                          <div class="modal-content">
                          	<div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h2 class="pagetitle">Activity Log</h2>
                                <div id="show_user_log">
                                </div>  
                            </div>                         
                          </div>
                    </div>
                  </div>
                  <a href="profile_print.php?b=<?=$userid?>&c=N" class="pop_but" target="_blank">
                  <img src="images/pdf_icon.png" title="PDF"></a>  
                   <a href="profile_print.php?b=<?=$userid?>&c=Y" class="pop_but" target="_blank">
                   <img src="images/Contpdf_icon.png" 
                   title="PDF + Contact Info"></a>
                 
        <a href="displayprofile_print_detail.php?b=<?= $userid ?>" class="pop_but" title="Display Profile" target="_blank">
        <img src="images/display_icon.png"></a>             

                </span>
            </td>
          	<td class="user_details">
		      
            
            <? if($emailverified=='Y') { ?>
            <img src="images/emaiyl_verfy.png" height="20" alt="Email Verified" title="Email Verified" >  <? } ?>
             <? if($smsverified=='Y' && $dashboard_mobile_verification_sms=='Y'){ ?>
            <img src="images/sms_verfy.png" height="28" alt="SMS Verified" title="SMS Verified" >
            <? }?>
            
            
            <? if($emailverified=='N' || $smsverified!='Y' && $dashboard_mobile_verification_sms=='Y') { ?>
            <div class="OnlyHigtLigt">		
			<? if($emailverified=='N') { ?>
                <strong>Email Verified:</strong> <?=$emailverified?> &nbsp;(<?=$emailverificationcode?>) <br>
                <div class="edit_contact_block">
                <a href="sendverificationemail.php?b=<?=$userid?>" class="actionbtn green">Resend Email</a>
              &nbsp;&nbsp;<a href="verifyemail.php?b=<?= $userid ?>" class="btn btn-success">Verify Email</a>
                </div>
			<? } ?>
            
             <? if($smsverified!='Y' && $dashboard_mobile_verification_sms=='Y'){ ?>
            <div class="edit_contact_block">
              <div class="Verror" id="error_sms<?=$userid?>" style="display:none"></div>
              <span id="error_sms_hide<?=$userid?>">
              <a class="actionbtn green" href="send_email2.php?b=<?=$userid?>&b1=sms&pgnm=<?=$Pgnm?>">Resend SMS</a>&nbsp;&nbsp;
                <a class="btn btn-success"  onClick="send_smsverify('<?=$userid?>')" >
                <?php /*?>onClick="show_smsdiv('<?=$userid?>')"<?php */?>
                 Verify SMS</a> 
                 </span>
                 
                    <?php /*?>
                    <div id="verify_sms<?=$userid?>" style="display:none">
                    <input placeholder="SMS Code" class="form-control" type="text" name="smscode<?=$userid?>" id="smscode<?=$userid?>">
                    <a class="btn btn-info" onClick="send_smsverify('<?=$userid?>')">Verify</a>
                    </div><?php */?>
           
            </div>
            
            
			
			<? } ?>
            </div>
            <? } ?>
            
            <? if($thumbnil_image!='' && file_exists("../uploadfiles/".$thumbnil_image)){ ?>
                <a target="_blank" href="../uploadfiles/<?=$imagenm?>"><img src="../uploadfiles/<?=$thumbnil_image?>" style="width:58px; height:58px;"></a>
                <? } ?>
            <br>
			<b><?=$name?>&nbsp;
            <? if($genderid!=''){ ?>
             (<?=$gender?>)</b>
            <? } ?><br>
			
            <style>
			.form-control-hidetext
			{
				padding:0;background:transparent;border:none;font-size:1px;overflow:hidden;color:#FFF;width:1;
			}
			</style>
            
            <b><strong>Profile ID:</strong> <?=$profile_code?><br></b>
			<? if($user_mnager_um_2 == 'Y' || $user_mnager_um_2 == 'N') { ?>
			<b><strong>Mobile No:</strong> <a href="tel:<?=$country_code?><?= $mobile ?>"><?=$country_code?><?= $mobile ?></a><br></b>
			<? } ?>
			<? if($user_mnager_um_1 == 'Y' || $user_mnager_um_1 == 'N') { ?>
			<b><strong>Email:</strong><a class="bluelink" href='user_emailmanager.php?b=<?= $userid ?>' title="Send Email">
			<?= $email ?> <i class="fa fa-share" aria-hidden="true"></i></a>
            
            <input class="form-control-hidetext" type="text" name="copy<?=$userid?>_email" id="copy<?=$userid?>_email" 
            value="<?=$email?>" />&nbsp;
            <a class="CopyCl fa fa-clipboard" data-copytarget="#copy<?=$userid?>_email" title="Copy Email" href="javascript:void(0)">&nbsp;</a> 
            <span class="" id="copy<?=$userid?>_email_error" style="display:none"></span>
            </b>
			
            <br>
             <? } ?>
             
             
			<? if($user_mnager_um_3 == 'Y' || $user_mnager_um_3 == 'N') { ?>
			<span onMouseOut="hide_password(<?= $userid ?>);">
            <b><strong>Password:</strong>
            <span onMouseOver="show_password(<?= $userid ?>);">
            <a href='user_change_password.php?b=<?= $userid ?>' class="bluelink" title="Change Detail">
			<span id="show_pass<?=$userid?>" style="display:none">
			<?=$password?> 
            </span>
            <span id="hide_pass<?=$userid?>" >
			<? for($pass_i=0;$pass_i<strlen($password)+3;$pass_i++){
				echo '*';
			}
				?>
            
            </span>
            
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            
            
            <input class="form-control-hidetext" type="text" name="copy<?=$userid?>_pass" id="copy<?=$userid?>_pass"            value="<?=$password?>" />&nbsp;            
            <a class="CopyCl fa fa-clipboard" data-copytarget="#copy<?=$userid?>_pass" title="Copy Password" href="JavaScript:Void(0);">&nbsp;</a> 
            <span class="" id="copy<?=$userid?>_pass_error1" style="display:none"></span>
			</span>
            </b>
            </span>
            <br>
			<? } ?> 
			
            <div class="edit_contact_block">
           
                     
            <? if($verification_doc!='') { ?>
             <br /> <br />	<a href="<?=$sitepath?>uploadfiles/<?=$verification_doc?>" class="bluelink send_varification_email">View <?=$view_verification_doc?>. for verification</a>
            <? } if($verified_doc=='Y') { ?><a href="#">Approved</a>
			<? } if($verification_doc=='N') { ?><a href="#">Disapproved</a><? } ?>
            
            <? if($deactive_comment!='') { ?>
            	<br><strong>Reason : </strong><?=$deactive_comment?>
            <? } ?>
            </div>
            
            
            
            
            
            </td>
          	<td class="mobile_none">
            <div class="<?=$style?>">
	            <strong>Register Date:</strong> <? $createdate=date_create($createdate);
					echo date_format($createdate,"M d,Y"); ?><br>
            </div>
			<strong>Membership:</strong> <?= $package ?>
            <br><strong>Expiry date:</strong> <?= $expiredate ?><br>
            
            <div class="edit_contact_block">
            <? if($expiredate>=date('Y-m-d')){?>
            <a href="upgradepackage.php?b=<?=$userid?>" class="bluelink edit_detail">Membership Renew</a></div>
            <? } ?>	
            <b><strong>Contact can view :</strong>
			<?=user_can_see_contact_detail($userid,"Y"); ?> </b>
            <br>
                <div class="edit_contact_block">
                <a class="bluelink contact_dtail" onClick="show_add_more_cnt('<?=$userid?>')">
                 <!--<img src="images/add_phone_Icon.png" alt="Contact" title="Contact" height="22">--> Add Contact</a><br>
                    <div id="add_more_cnt<?=$userid?>" style="display:none">
                    <input class="form-control" type="text" name="cnt_count<?=$userid?>"
                    placeholder="No of contact" id="cnt_count<?=$userid?>">
                    
                    <a onClick="send_cnt('<?=$userid?>')">Add</a>
                    </div>
            </div>
            
			
          <? if($lastloginip!=''){?> 
          <div class="OnlyHigtLigt">
           <strong>Last login IP:</strong> <?=$lastloginip?> 
            </div>
            <? } ?>
          
            

            </td>
			<td ><div class="ImgCenter"><?= $status ?></div><br>
            <? if($currentstatus==4){ echo $message;?><? } ?>
	 
            <?
            if($user_mnager_um_7 == 'Y' || $user_mnager_um_7 == 'N') {
            ?>	

			<? if($currentstatus==0){?>
            <a href="userdeactive.php?b=<?= $userid ?>&b1=2" class="Deactive_color action_user">Deactive</a>
            <? }else{ ?>
            <a href="useraction.php?b=<?= $userid ?>&b1=0&ex=<?=$ex_quer_st ?>" class="green action_user">Active</a><br>
            <? } ?>
            <? } ?>
			
           
            
            <?
            if($user_mnager_um_7 == 'Y' || $user_mnager_um_7 == 'N') {
            ?>			
            <? } if($user_mnager_um_8 == 'Y' || $user_mnager_um_8 == 'N') { ?>
            <? if($enable_admin_search=='Y') { ?>
            <a href="useraction.php?b=<?= $userid ?>&b1=5&ex=<?=$ex_quer_st ?>" class="Deactive_color action_user">Offline</a>
            <? } ?>
			<? } ?>

           <? if($user_mnager_um_6 == 'Y' || $user_mnager_um_6 == 'N') { ?>
            <a href="userdeactive.php?b=<?= $userid ?>&b1=3" class="Delete_color action_user">Trash</a>
	
                <? if($span_detect=='Y' && $currentstatus!=8){?>
                <select onChange="send_spam(this.value,<?=$userid?>)">
                <option value="0">Report Spam</option>
                <option value="1">Add to Spam Pass List</option>
                <option value="2">Add to Spam Ip List</option>
                <option value="5">Add to Spam email List</option>
                <option value="3">Add to Spam Only</option>
                <option value="4">Erase</option>
                </select>
            	    <? } ?>   
                    
					<? if(isset($_GET['b']) && $_GET['b']==8 && $span_detect=='Y'){?>           
                    <a href="useraction.php?b=<?= $userid ?>&b1=8&ex=<?=$ex_quer_st ?>" class="Deactive_color action_user">
                     Erase
                    </a>
                    <? } ?>     
                    
        	 
		
    		<? } ?>  
            
            
            </td>			
            
            <td>
            
			
           	<?
                if($user_mnager_um_5 == 'Y' || $user_mnager_um_5 == 'N') {
                ?>
                <a href="updatepicture.php?b=<?= $userid ?>"  class="actionbtn">Profile Picture</a>
                <a class="actionbtn" href="albummaster.php?b=<?=$userid?>">
			 Album
			</a> 
            <a href="badge_manager.php?b=<?=$userid?>" class="actionbtn">Identify Doc</a>           
				<? } ?>
                <? if($enable_admin_search=='Y') {?>
            <a class="actionbtn" href="elite_reg_updateprofilepersonal.php?b=<?=$userid?>">
			Edit Profile
			</a>
			
         <?php /*?>  <a class="actionbtn" href="search_profile.php?b=<?=$userid?>">
			Search</a><?php */?>
             <a class="actionbtn" href="elite_search_profile.php?b=<?=$userid?>">
			Elite</a>
            <? } ?>
            
            
            	<? if($enable_astrological_module_basic=='Y'){?>
            
               <a  href="javascript:void(0)"  class="actionbtn" data-toggle="modal" data-target="#myastro_info"
            onclick="show_astro('<?=$userid?>')">
            Astro Detail</a>
            
                  <div class="modal fade" id="myastro_info" role="dialog">
                    <div class="modal-dialog">
                          <div class="modal-content">
                          	<div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h2 class="pagetitle">Astro Detail</h2>
                                <div id="show_user_astro">
                                </div>  
                            </div>                         
                          </div>
                    </div>
                  </div>
            
			<? } ?>
            
            
             

			<? if(file_exists("plugin.blockchat.php")) { 
				if($blockchat==''){
			?>
            <a href="plugin.blockchat.php?b=<?=$userid ?>&b1=Y" class="Deactive_color action_user">Block Userchat</a>
            <? } else { ?>
            <a href="plugin.blockchat.php?b=<?=$userid ?>" class="green action_user">Unblock Userchat</a>
           
            <? }} ?>

		

<? $chk_emp=0;
$chk_emp = getonefielddata("SELECT count(loginid) from tbldatingadminloginmaster WHERE currentstatus=0 AND loginid!=1");?>
<? if($chk_emp>0){?>
<select name="employee" id="employee" class="form-control select_control" onChange="assign_employee(this.value,'<?=$userid?>')">
	<? fillcombo("SELECT loginid,username from tbldatingadminloginmaster WHERE currentstatus=0 AND loginid!=1",$staff_agentid,"Assign") ?>
</select>
<? } ?>



           	</td>
            </tr>
            
		<?
		$j++;
	}
	freeingresult($result);
	?>
	</tbody>
    </table>
    </div>
    </form>
    



	<table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" <?= adminnextbackcls ?>><?=$BackStr ?></td>
	<td class="nextbackmid"><?=$page_no_str ?></td>
	<td align="right" <?= adminnextbackcls ?>><?=$NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>


<form name="form_delete" class="user_frmdelete" action="user_delete_id.php?b=<?= $quer_st ?>" method="post">
<div class="delete1"><h3>Delete User</h3>
<div class="form-group form_first">
<label>ID</label> 
<input type="text" name="txt_del_uid" class="form-control ">
<input type="button"  onClick="send_for_delete()" value="Delete" class="btn" >
</div>
<strong>This Will delete user detail permanent</strong>
</div>
</form>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $usermanager_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->

  
<script>
(function() {

  'use strict';

  // click events
  document.body.addEventListener('click', copy, true);

  // event handler
  function copy(e) {

    // find target element
    var
      t = e.target,
      c = t.dataset.copytarget,
      inp = (c ? document.querySelector(c) : null);
	
    // is element selectable?
    if (inp && inp.select) {

      // select text
      inp.select();

	var res = c.split("_");
	
	if(res[1]=='email')
	{
		$(c+"_error").show();
		$(c+"_error").html("Copied");
		setTimeout(function(){ 
		$(c+"_error").hide();
		}, 3000);
	}
	if(res[1]=='pass')
	{
		$(c+"_error1").show();
		$(c+"_error1").html("Copied");
		setTimeout(function(){ 
		$(c+"_error1").hide();
		}, 3000);
	}
	

	try {
        // copy text
        document.execCommand('copy');
        inp.blur();
	  }
      catch (err) {
        alert('please press Ctrl/Cmd+C to copy');
      }
	  

    }

  }

})();

</script>

<script>
function press_reset()
{
	document.getElementById("frm_search_profile_detail").submit(); 
}
</script>

</body>
</html>
<script language="javascript">
function send_for_delete()
{
	if (confirm("are you sure want to delete"))
	{
		document.form_delete.submit();
	}
}
</script>
<? } else { 
	header("location:dashboard.php?msg=no");
} ?>