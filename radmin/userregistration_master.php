<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$email="";
$password="";
$name="";
$dob="";
$nickname="";
$mobile="";
$religianid="";
$motherthoungid="";
$maritalstatusid="";
$heightid="";
$weightid="";
$castid="";
$educationid="";
$ocupationid="";
$annual_income_currancyid="";
$annual_income_id="";
$genderid="";
$stateid="";
$countryid="";
$cityid="";
$profileheadline="";
$day = '';
$month = '';
$year = '';

//$filename ="tbldatingusermaster_insert";
if(isset($_SESSION['email']) && $_SESSION['email']!=''){
	$email = $_SESSION['email'];
}
if(isset($_SESSION['name']) && $_SESSION['name']!=''){
	$name = $_SESSION['name'];
}
if(isset($_SESSION['dob']) && $_SESSION['dob']!=''){
	$dob = $_SESSION['dob'];
}
if(isset($_SESSION['nickname']) && $_SESSION['nickname']!=''){
	$nickname = $_SESSION['nickname'];
}
if(isset($_SESSION['mobile']) && $_SESSION['mobile']!=''){
	$mobile = $_SESSION['mobile'];
}
if(isset($_SESSION['religianid']) && $_SESSION['religianid']!=''){
	$religianid = $_SESSION['religianid'];
}
if(isset($_SESSION['motherthoungid']) && $_SESSION['motherthoungid']!=''){
	$motherthoungid = $_SESSION['motherthoungid'];
}
if(isset($_SESSION['heightid']) && $_SESSION['heightid']!=''){
	$heightid = $_SESSION['heightid'];
}
if(isset($_SESSION['weightid']) && $_SESSION['weightid']!=''){
	$weightid = $_SESSION['weightid'];
}
if(isset($_SESSION['castid']) && $_SESSION['castid']!=''){
	$castid = $_SESSION['castid'];
}
if(isset($_SESSION['annual_income_currancyid']) && $_SESSION['annual_income_currancyid']!=''){
	$annual_income_currancyid = $_SESSION['annual_income_currancyid'];
}
if(isset($_SESSION['annual_income_id']) && $_SESSION['annual_income_id']!=''){
	$annual_income_id = $_SESSION['annual_income_id'];
}
if(isset($_SESSION['genderid']) && $_SESSION['genderid']!=''){
	$genderid = $_SESSION['genderid'];
}
if(isset($_SESSION['stateid']) && $_SESSION['stateid']!=''){
	$stateid = $_SESSION['stateid'];
}
if(isset($_SESSION['countryid']) && $_SESSION['countryid']!=''){
	$countryid = $_SESSION['countryid'];
}
if(isset($_SESSION['cityid']) && $_SESSION['cityid']!=''){
	$cityid = $_SESSION['cityid'];
}
if(isset($_SESSION['profileheadline']) && $_SESSION['profileheadline']!=''){
	$profileheadline = $_SESSION['profileheadline'];
}


$filename ="userregistration_insert";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select email,password,name,dob,nickname,mobile,religianid,motherthoungid,maritalstatusid,heightid,weightid,castid,educationid,ocupationid,annual_income_currancyid,annual_income_id,genderid,state,countryid,city,profileheadline from tbldatingusermaster where userid=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$email=$rs[0];
		$password=$rs[1];
		$name=$rs[2];
		$dob=$rs[3];
		$nickname=$rs[4];
		$mobile=$rs[5];
		$religianid=$rs[6];
		$motherthoungid=$rs[7];
		$maritalstatusid=$rs[8];
		$heightid=$rs[9];
		$weightid=$rs[10];
		$castid=$rs[11];
		$educationid=$rs[12];
		$ocupationid=$rs[13];
		$annual_income_currancyid=$rs[14];
		$annual_income_id=$rs[15];
		$genderid=$rs[16];
		$stateid=$rs[17];
		$countryid=$rs[18];
		$cityid=$rs[19];
		$profileheadline=$rs[20];

	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script>
function show_state(val) {
	$.ajax({
	type: "POST",
	url: "get_state_new.php",
	data:'country='+val,
	success: function(data){
		$("#h_state").hide();
		$("#s_state").show();		
		$("#s_state").html(data);
	}
	});
}

function show_city(val) {
	$.ajax({
	type: "POST",
	url: "get_city_new.php",
	data:'state='+val,
	success: function(data){
		$("#h_city").hide();
		$("#s_city").show();		
		$("#s_city").html(data);
	}
	});
}



</script>





<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById('email').value==''){
		alert("Please enter email ");	
		document.getElementById('email').focus();
		return false;
	} else if(document.getElementById('nickname').value==''){
		alert("Please enter nickname");	
		document.getElementById('nickname').focus();
		return false;
	} else if(document.getElementById('password').value==''){
		alert("Please enter password");	
		document.getElementById('password').focus();
		return false;
	} else if(document.getElementById('nickname').value.length<6){
		alert("Nickname should be more than 6 characters");	
		document.getElementById('nickname').focus();
		return false;
	} else if(document.getElementById('password').value.length<6){
		alert("Password should be more than 6 characters");	
		document.getElementById('password').focus();
		return false;
	} else {
		return true;	
	}
		
}
</script>
<title>
<?= $admintitle ?>
</title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

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
			<h1 class="pagetitle">User Registration Master</h1>
          
          <!-- ********* TITLE END HERE *********-->
          <div id="pagecontent"> 
          <div class="common-form">
            <!-- ********* CONTENT START HERE *********-->
  
              <?= checkerroradmin()?>
        
              
  
            <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" 
            onSubmit="return validate();" class="form-horizontal ">
             <div class="form-group">
             <div class="widhtsetr">
                  <label>Email :</label>
                  <input type="text" name="email" id="email" value="<?=$email?>" class="form-control">
                  </div>
                  <div class="widhtsetr control-label_25">
               <label>Nickname :</label>
               <input type="text" name="nickname" id="nickname" value="<?=$nickname?>"  class="form-control">
               </div>
                </div>
                
                <div class="form-group singleline_class">
             <div class="widhtsetr">
                  <label>password :</label><input type="text" name="password" id="password"   class="form-control" value="<?=$password?>">
                  </div>
               
                  <div class="widhtsetr">
                  <label>name :</label>
                 <input type="text" name="name" id="name" value="<?=$name?>" class="form-control"></td>
                </div><div class="widhtsetr control-label_25">
                 <label>gender :</label>
                  <select name="genderid" id="genderid" class="form-control">
                      
                      <? fillcombo("select genderid,gender from tbldatingendermaster where currentstatus=0 order by gender ",$genderid,""); ?>
                    </select></div>
                </div>
                 
                   <div class="form-group singleline_class">
                  <label>dob :</label>
                  
                  <? 
					$start_year = date('Y')-65;
					$end_year = date('Y')+18;
?>
<div class="widhtsetr">
				  	<select name="dobdd" class="form-control"><? fillnumdata(1,31,$day,"Days")  ?></select>
                    </div>
                    <div class="widhtsetr">
					<select name="dobmm"  class="form-control"><? fillnumdata(1,12,$month,"Month","Y") ?></select>
                    </div>
                    <div class="widhtsetr control-label_25">
                    <select name="dobyy"  class="form-control"><? fillnumdata($start_year,$end_year,$year,"Year") //fillnumdata(date("Y")-100,date("Y")-18,$updatepersonalprofiledprofileselect_year,"$dob_yy") ?>
</select>
</div>
				  <?php /*?><input type="text" name="dob" id="dob" value="<?=$dob?>"><?php */?></td>
                </div>
               <div class="form-group">
                <div class="widhtsetr "><label>country :</label>
                 <?	$countryid = getonefielddata("select fldval from tbldatingsettingmaster where fldnm='preselected_country' "); ?>
               <select name="countryid" id="countryid" class="form-control" onChange="show_state(this.value)">
                   
                      <? fillcombo("select id,title from  tbldatingcountrymaster where currentstatus=0 order by title ",$countryid,"Select"); ?>
                    </select>
                    </div>
                    
                    <div id="s_state" style="display:none"></div>
                 <div class="widhtsetr control-label_25" id="h_state">
                 <label>state :</label>
                  <select name="" id="" class="form-control">
                      <option value="">Select</option>
                      <? /* fillcombo("select id,title from  tbldating_state_master where currentstatus=0 order by title ",$stateid,"Select"); */?>
                    </select>
                    </div>
                    
                    </div>
                    
                <div class="form-group">
                 <div id="s_city" style="display:none"></div>
                <div class="widhtsetr" id="h_city">
                <label>city :</label>
                <select name="" id="" class="form-control">
                      <option value="">Select</option> 
                      <? /*fillcombo("select id,title from tbldating_city_master where currentstatus=0 order by title ",$cityid,"Select");*/ ?>
                    </select>
                    </div>
                    
                    
                    <div class="widhtsetr control-label_25">
               <label>mobile :</label>
                 <input type="text" name="mobile" class="form-control" id="mobile" value="<?=$mobile?>"></div>
                    </div>
               
                <div class="form-group">
                <div class="widhtsetr "><label>marital status :</label>
                <select name="maritalstatusid" id="maritalstatusid" class="form-control">
                     
                      <? fillcombo("select id,title from tbldatingmaritalstatusmaster where currentstatus=0 order by title ",$maritalstatusid,"Select"); ?>
                    </select></div>
                
                <div class="widhtsetr control-label_25"><label>height :</label>
                <select name="heightid" id="heightid" class="form-control">
                     
                      <? fillcombo("select id,title from tbldatingheightmaster where currentstatus=0 order by title ",$heightid,"Select"); ?>
                    </select></div>
                    </div>
                <div class="form-group">
                <div class="widhtsetr ">
                <label>weight :</label><select name="weightid" id="weightid" class="form-control">
                    
                      <? fillcombo("select id,title from  tbldatingweightmaster where currentstatus=0 order by title ",$weightid,"Select"); ?>
                    </select></div>
                 <div class="widhtsetr control-label_25">
               
                <?	$religianid = getonefielddata("select fldval from tbldatingsettingmaster where fldnm='Religion_default_id' "); ?>
               <label>Religion :</label><select name="religianid" id="religianid" class="form-control">
                     
                      <? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 order by title ",$religianid,"Select"); ?>
                    </select></div>
                    </div>
                <div class="form-group">
                <div class="widhtsetr "><label>caste :</label><select name="castid" class="form-control" id="castid">
                     
                      <? fillcombo("select id,title from tbldatingcastmaster where currentstatus=0 and title!='' order by title ",$castid,"Select"); ?>
                    </select></div>
                <div class="widhtsetr control-label_25"><label>mother tounge :</label>
                <select name="motherthoungid" id="motherthoungid"  class="form-control">
                    
                      <? fillcombo("select id,title from tbldatingmothertonguemaster where currentstatus=0 order by title ",$motherthoungid,"Select"); ?>
                    </select></div>
                    </div>
                <div class="form-group">
                <div class="widhtsetr "><label>education :</label>
                <select name="educationid" id="educationid" class="form-control">
                     
                      <? fillcombo("select id,title from tbl_education_master where currentstatus=0 order by title ",$educationid,"Select"); ?>
                    </select></div>
                <div class="widhtsetr control-label_25"><label>ocupation:</label>
                <select name="ocupationid" id="ocupationid" class="form-control">
                     
                      <? fillcombo("select id,title from tbldatingoccupationmaster where currentstatus=0 order by title ",$ocupationid,"Select"); ?>
                    </select></div>
                    </div>
                <div class="form-group">
               
                <label>profile headline :</label><textarea name="profileheadline"  class="form-control"id="profileheadline"><?=$profileheadline?>
</textarea></div>
               
                                
              <div class="form-group">
              <label>annual income :</label>
               <div class="widhtsetr">
               <select name="annual_income_currancyid" id="annual_income_currancyid" class="form-control">
                     
                      <? fillcombo("select id,title from  tbldating_annual_income_currancy_master where currentstatus=0 order by title ",$annual_income_currancyid,"Select"); ?>
                    </select>
                    </div>
                    <div class="widhtsetr control-label_25">
                    <select name="annual_income_id" id="annual_income_id" class="form-control">
                   
                      <? fillcombo("select id,title from tbldating_annual_income_master where currentstatus=0 order by title ",$annual_income_id,"Select"); ?>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="widhtsetr">                    
                      <checkbox>
<label class="switch">
  <input name="send_email" id="send_email" type="checkbox" <?= adminbuttonclass ?> value="Y">
  <span class="slider round"></span>
</label> &nbsp; Send Email </checkbox>
                    </div>
                    
                    <div class="widhtsetr control-label_25">
                      <checkbox><label class="switch">
  <input name="send_sms" id="send_sms" type="checkbox" <?= adminbuttonclass ?>  value="Y">
  <span class="slider round"></span>
</label> &nbsp; Send SMS </checkbox>
                    </div>
                    </div>
                    
               <div class="form-group common_button">
               <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
                    <input name="Reset" type="reset"  value="Reset" class="btn"  title="Reset" alt="Reset"></div>
            
            </form>
            <!-- ********* CONTENT END HERE *********--> 
          </div>
          </div>
        </div>
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
