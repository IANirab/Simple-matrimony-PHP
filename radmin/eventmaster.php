<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;

$title = "";
$location = "";
$eventdd = "";
$eventmm = "";
$eventyy = "";
$image = "";
$archiveyes = "";
$archiveno = "checked";
$req_registeryes = "checked";
$req_registerno = "";
$categoryid = "";
$description = "";
$short_description = "";
$dress_code = "";
$event_time = "";
$languageid =0;

$filename ="eventinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$event_mgmnt_em_1 = event_mgmnt_em_1();
	$event_mgmnt_em_2 = event_mgmnt_em_2();	
} else {	
	$event_mgmnt_em_1 = "N";
	$event_mgmnt_em_2 = "N";	
}
if($event_mgmnt_em_1 == 'Y' || $event_mgmnt_em_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,location,day(eventdate),month(eventdate),year(eventdate),imagenm,archive,req_register,categoryid,description,short_description,languageid,dress_code,event_time from tbl_event_master where  eventId=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];
		  	$location = $rs[1];
			$eventdd = $rs[2];
			$eventmm =$rs[3];
			$eventyy = $rs[4];
			$image = $rs[5];
			$archive = $rs[6];
			
			if ($archive == "Y" )
			{
				$archiveyes = "checked";
				$archiveno = "";
			}
			$req_register = $rs[7];
			if ($req_register == "" )
				$req_register = "Y";
			if ($req_register == "Y" )
			{
				$req_registeryes = "checked";
				$req_registerno = "";
			}
			else
			{
				$req_registeryes = "";
				$req_registerno = "checked";
			}
			$categoryid = $rs[8];
			$description = $rs[9];
			$short_description = $rs[10];
		$languageid= $rs[11];
		$dress_code =$rs[12];
		$event_time =$rs[13];		
	}
	freeingresult($result);
}
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
			<h1 class="pagetitle">Add Event</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($event_mgmnt_em_2 == 'Y' || $event_mgmnt_em_2 == 'N') { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>" ENCTYPE="multipart/form-data"  class="form-horizontal ">
		<div class="form-group">
         <div class="widhtsetr">
               <label>Language </label>
            
              <select name="cmblanguage" class="form-control" >
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select>
              </div>
		  
		 <!--  <div class="form-group">
               <div class="widhtsetr control-label_25"><label>Category </th>
            <td  > 
            <select name="cmbcategory" class="form"><? fillcombo("select categoryid,title from tbl_event_category_master where currentstatus=0 order by title",$categoryid); ?></select>
            </td>
          </tr> -->
		  <div class="widhtsetr control-label_25">
               <label>Title</label>
            <input type="text" id="title" name="title" alt="Title"  size=35 maxlength="100"  class="form-control" value="<?= $title ?>">  
            </div>
            </div>
          <div class="form-group">
              <label>Location</label>
           
			<textarea id="location" name="location" rows="5"  class="form-control" cols="35"><?= $location ?></textarea>  
			</div>
		  
		 <div class="form-group singleline_class three_section">
              <label>Event Date</label>
          <div class="widhtsetr ">     
		<select name="eventmm" class="form-control"><? fillnumdata(1,12,"",$eventmm) ?> </select> 
        </div>
         <div class="widhtsetr ">	   
		<select name="eventdd" class="form-control"><? fillnumdata(1,31,"",$eventdd) ?></select>
        </div>
         <div class="widhtsetr control-label_25"> 
	    <select name="eventyy" class="form-control"><? fillnumdata(date("Y")-0,date("Y")+20,"",$eventyy) ?></select>
        </div>   
        </div>
		  <div class="form-group">
          <div class="widhtsetr">
          <label>Image </label>
       
         <input type=file name="img"  id="img" size="35" alt="Upload Image"  class="form-control">
		
		<note>[ Recommend Image Size  Width = 500 Height = Any ]</note>
		

		   <? if ($image  != "") { ?>
            <img  src="../uploadfiles/<?= $image ?>" height=80 width=80 align="absmiddle">
			<? } ?>

         
         
	   
         </div>
         <div class="widhtsetr control-label_25">
               <label>Event Time </label>
            <input type="text" id="event_time" class="form-control" name="event_time" alt="Event Time" size=35 maxlength="100" value="<?= $event_time ?>">  
            </div>
            </div>
		  <div class="form-group">
          <div class="widhtsetr">
       <label>Archive </label>
       <checkbox>
		<i>
		<input type="radio" name="radarchive" value="N" <?= $archiveno?> /><strong><b>NO</b></strong></i>
           <i> <input type="radio" name="radarchive" value="Y" <?= $archiveyes?> /><strong><b>Yes</b></strong>
           </i>
           <checkbox>
          
			
          </div>
                 <div class="widhtsetr control-label_25">
               <label>registration module</label>
               <checkbox>
		<i><input type="radio" name="radregister" value="Y" <?= $req_registeryes?> /><strong><b>Yes</b></strong></i>
		<i><input type="radio" name="radregister" value="N" <?= $req_registerno?> /><strong><b>NO</b></strong></i>
            
			</checkbox>
          </div>
          </div>
	   
               <div class="form-group">
               <label>Dress Code </label>
			<textarea id="dress_code" name="dress_code" class="form-control" rows="3" cols="35" ><?= $dress_code ?></textarea>  
			</div>
		  
               
	  <div class="form-group">
              <label>Short Description </label>
			<textarea id="short_description" name="short_description" class="form-control" rows="3" cols="35" ><?= $short_description ?></textarea>  
             <note>[Maximum 150 chars]</note>
			</div>
	  <div class="form-group">
               <label>Description </label>
			<textarea id="description" class="form-control" name="description" rows="15" cols="35" style="width:100%"><?= $description ?></textarea>  
			</div>
          
           <div class="form-group common_button">
           <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>
	<? } ?>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $eventmaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>
<? } else {
	header("location:dashboard.php?msg=no");
} ?>