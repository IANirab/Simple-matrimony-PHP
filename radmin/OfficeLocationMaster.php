
<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$pagenm = '';
$filename ="OfficeLocationInsert";

$CityID = ''; 		
$StateID = '';			
$CountryID = '';		
$ContactPerson = '';			
$NameOfOffice = '';		
$StreetAdd = '';		
$LandAdd = '';		
$Postcode = '';			
$Email = '';			
$Phone = '';	




if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("SELECT CityID,StateID,CountryID,ContactPerson,NameOfOffice,StreetAdd,LandAdd,Postcode,Email,Phone from tbloffice_location where currentstatus =0 and id=$action ");



	while ($rs = mysqli_fetch_array($result))
	{		  	
$CityID = $rs[0]; 		
$StateID = $rs[1];			
$CountryID = $rs[2];		
$ContactPerson = $rs[3];			
$NameOfOffice = $rs[4];			
$StreetAdd = $rs[5];		
$LandAdd = $rs[6];		
$Postcode = $rs[7];			
$Email = $rs[8];			
$Phone = $rs[9];		

	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById("").value==""){alert("Plese Enter "); document.getElementById("").focus(); return false;}else {return true;}	
}
</script>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<h1 class="pagetitle">Add Office Location Master</h1>
			<!-- ********* TITLE END HERE *********-->
				<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<?php /*?><div class="errorbox"><?= checkerroradmin()?></div><?php */?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal" onSubmit="return validate();">
       
        
        <div class="form-group">
        <div class="widhtsetr">
        <label>Contact Person</label>
<input name="txtContactPerson" type="text" class="form-control" value="<?=$ContactPerson?>" required /> </div>
<div class="widhtsetr control-label_25"><label>Office</label>
<input name="txtNameOfOffice" type="text" value="<?=$NameOfOffice ?>" class="form-control" required /> </div>
</div>
<div class="form-group singleline_class">
<div class="widhtsetr"><label>Street Address</label>
<input name="txtStreetAdd"  type="text" class="form-control" value="<?=$StreetAdd ?>" /> </div>
<div class="widhtsetr"><label>Landmark Address</label>
<input name="txtLandAdd"  type="text" class="form-control" value="<?=$LandAdd ?>" /> </div>
<div class="widhtsetr  control-label_25"><label>Postcode</label>
<input name="numPostcode"  type="number" class="form-control" value="<?=$Postcode ?>"> </div>
</div>
<div class="form-group">
<div class="widhtsetr">
<label>Phone</label>
<input name="telPhone" type="tel" class="form-control" required value="<?=$Phone ?>"> </div>
<div class="widhtsetr  control-label_25">
<label>Email</label>
<input name="emailEmail"  type="email" class="form-control" required value="<?=$Email ?>"> </div>
</div>
<div class="form-group singleline_class">
<div class="widhtsetr">
<label>Country</label>
<select name="countryid" id="countryid" class="form-control">
<? fillcombo("select id,title from  tbldatingcountrymaster where currentstatus=0 order by title ",$CountryID,"Select"); ?>
</select>
</div>
<div class="widhtsetr">
<label>State</label>
<select name="stateid" id="stateid" class="form-control">
<? fillcombo("select id,title from  tbldating_state_master where currentstatus=0 order by title ",$StateID,"Select"); ?>
</select>
</div>
  <div class="widhtsetr control-label_25">
  <label>City</label>                  
<select name="cityid" id="cityid" class="form-control">
                      
 <? fillcombo("select id,title from tbldating_city_master where currentstatus=0 order by title ",$CityID,"Select"); ?>
</select>
</div>
</div>
                    
                    
  


<div class="form-group common_button">
                
    <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
     <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
     </div>
	</div>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
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