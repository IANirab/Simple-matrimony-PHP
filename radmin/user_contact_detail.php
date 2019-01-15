<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;


//$result = getdata("select name,email,password,tbl_country_master.title,tbldating_state_master.title,city,area,postcode, altemail, mobile,phno,callingtime,talkpreference,address,thumbnil_image,tbldatingusermaster.imagenm from tbl_country_master,tbldating_state_master,tbldatingusermaster where userid=$uid");

$result = getdata("select name,email,password,countryid,state,city,area,postcode, altemail, mobile,phno,callingtime,talkpreference,address,thumbnil_image,imagenm from tbldatingusermaster where userid=$uid");
while($rs= mysqli_fetch_array($result))
{
	$name=$rs[0];
	$email=$rs[1];
	$password=$rs[2];
	$countryid=findcountryid($rs[3]);
	if($rs[4]!='' && is_numeric($rs[4])){
		$state=getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[4]);
	} else {
		$state = '';	
	}
	if($rs[5]!='' && is_numeric($rs[5])){
		$city=getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[5]);	
	} else {
		$city="";	
	}
	
	$area=$rs[6];
	
	$postcode=$rs[7];
	$altemail=$rs[8];
	$mobile=$rs[9];
	$phno=$rs[10];
	
	$callingtime=$rs[11];
	$talkpreference=$rs[12];
	if ($talkpreference != "")
		$talkpreference = getonefielddata("select title from tbldatingtaklingpreferencemaster where id=$talkpreference");
	$address=$rs[13];
	$thumbnil_image =$rs[14];
	$imagenm =$rs[15];
	if ($thumbnil_image == "")
		$thumbnil_image = $imagenm;
		
	if ($thumbnil_image == "")
		$thumbnil_image ="noimageprofile.gif";
	$profile_code = find_profile_code($uid);
}	
freeingresult($result);
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<h1 class="pagetitle">Change Password</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="user_change_password_submit.php?b=<?= $uid ?>" class="form-horizontal ">
    
		<?php /*?><tr valign="top">
            <th scope="row" width="30%"   >name :</th>
            <td  >
              <?= $name ?>
              </td>
          </tr><?php */?>
		 
	
	<div class="form-group text-form">
         <div class="widhtsetr">
        <label>name :</label><?= $name ?>
              </div>
		<div class="widhtsetr control-label_25">
           <label>email :</label><?= $email ?>
              </div>
              </div>
    
          <div class="form-group text-form">
         <div class="widhtsetr">
        <label>password :</label><?=$password ?>
               </div>
		  
          
   <?php /*?>       
          <div class="widhtsetr control-label_25">
           <label>country :</label>
				<?= $countryid ?>
              </div>
             
         <div class="form-group text-form">
         <div class="widhtsetr">
        <label>state :</label><?= $state ?></div>
        
  <div class="widhtsetr control-label_25">
           <label>city :</label><?=$city ?>
              </div>
              </div>
		 <div class="form-group text-form">
         <div class="widhtsetr">
        <label>area :</label><?=$area ?>
              </div>
		  	<div class="widhtsetr control-label_25">
           <label>post code :</label><?=$postcode ?>
              </div>
              </div>
	<?php */?>
    
    
    
	<div class="form-group text-form">
         <div class="widhtsetr">
        <label>Alt email :</label>
		<?=$altemail ?>
              </div>
   <div class="widhtsetr control-label_25">
           <label>mobile :</label>
		   <?=$mobile ?>
              </div>
              </div>
	<div class="form-group text-form">
         <div class="widhtsetr">
        <label>phone :</label>
		<?=$phno ?>
             </div>
              
	 <div class="widhtsetr control-label_25">
           <label>calling time :</label>
		   <?=$callingtime ?>
              </div>
              </div>
	
	         
	<div class="form-group text-form">
         <div class="widhtsetr">
        <label>talk preference:</label><?=$talkpreference ?>
              </div>
	 <div class="widhtsetr control-label_25">
           <label>address:</label><?=$address ?>
              </div>
              </div>
	<div class="form-group text-form">
         <div class="widhtsetr">
        <label>image:</label>
				<img src='../uploadfiles/<?= $thumbnil_image ?>' width="100" height="100">
              </div>
              
	 <div class="widhtsetr control-label_25">
           <label>profile code:</label><?=$profile_code ?>

              </div>
              </div>
    
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $passwordchange_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	</div>
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>