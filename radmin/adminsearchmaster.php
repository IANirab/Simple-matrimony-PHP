<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$title = "";
$gender = "";
$agefrom = "";
$ageto = "";
$searchbase1 = "no";
$keyword1 = "";
$searchbase2 = "no";
$keyword2 = "";
$keyword = "";
$metatag = "";
$languageid =0;
$sectionid = "";
$filename ="adminsearchinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$home_search_hp_1 = home_search_hp_1();
	$home_search_hp_2 = home_search_hp_2();	
	$home_search_hp_4 = home_search_hp_4();	
} else {	
	$home_search_hp_1 = "N";
	$home_search_hp_2 = "N";
	$home_search_hp_4 = "N";
}
if($home_search_hp_1 == 'Y' || $home_search_hp_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,gender,agefrom,ageto,searchbase1,keyword1,searchbase2,keyword2,keyword,metatag,languageid,sectionid from tbldatingadminsearchmaster where searchid=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];
		$gender = $rs[1];
		$agefrom = $rs[2];
		$ageto = $rs[3];
		$searchbase1 = $rs[4];
	  	$keyword1 = $rs[5];
	  	$searchbase2 = $rs[6];
	  	$keyword2 = $rs[7];
	  	$keyword = $rs[8];
	  	$metatag = $rs[9];
		$languageid = $rs[10];
		$sectionid = $rs[11];
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript src='../scripts/innovaeditor.js'></script>

<script>
function show_detail(val,type)
{
	if(val!=0)
	{
	$.ajax({
			type: "POST",
			url: "get_adminsearch_detail.php",
			data:'val='+val+'&type='+type,
			success: function(data){
				$("#hide_keyword"+type).hide();
				$("#hide_keyword"+type).show();
				$("#hide_keyword"+type).html(data);
			}
		});
	}
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
			<h1 class="pagetitle">Add customized search links</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($home_search_hp_2 == 'Y' || $home_search_hp_2 == 'N') { ?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal ">
     
     <input type="hidden" name="cmblanguage" id="cmblanguage" value="1">
     <input type="hidden" name="sectionid" id="sectionid" value="3">
     
     
       <div class="form-group">
          <?php /*?><div class="widhtsetr">
       <label>Language</label>
              <select name="cmblanguage"  class="form-control">
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select>
              </div>
		  <div class="widhtsetr control-label_25">
           <label>Section</label>
			 	<select name="sectionid" id="sectionid"  class="form-control">
                	<? fillcombo("SELECT id,title from tbldatingadminsearch_section_master WHERE currentstatus=0",$sectionid,"Select"); ?>
                </select>
			</div><?php */?>
          	 
             <div class="widhtsetr">
       <label>Title</label>
			 <input type="text" name="Title" class="form-control" title="Title" alt="Title" size=35 value ="<?= $title  ?>">
			</div>
    		
            <div class="widhtsetr control-label_25">
         
       <label>keyword for search in all text field</label>
			<input type="text" name="keyword" class="form-control" value="<?= $keyword ?>">
			
            </div>      
          
            
          </div>
       <div class="form-group singleline_class">
          <div class="widhtsetr">
       <label>Gender</label>
            <select name="gender" class="form-control">
            <?
            fillcombo("select genderid,gender from tbldatingendermaster where currentstatus=0 order by gender ",$gender,"");
			?>
            </select>
			</div>
<div class="widhtsetr">
       <label>Age from</label>
           <select name='agefrom' class="form-control"><?  fillage($agefrom) ?></select>
			</div>
		 <div class="widhtsetr control-label_25">
           <label>Age to</label>
           <select name='ageto' class="form-control"><?  fillage($ageto) ?></select>
			</div>
            </div>
	 <div class="form-group">
         
       <label>meta</label>
            <textarea name="metatag"  class="form-control" rows="7" cols="50" ><?= $metatag ?></textarea>
		
            </div>
		 
    
          <?
          	$optr ="";
			$optl = "";
			$optc ="";
            $opto = "";
            $optm ="";
            $opts = "";
            $optmt ="";
            $no = "";
			$optedu = '';
			if ($searchbase1 == "R")
			{
				$optr ="selected";
				$tblnm= "tbldatingreligianmaster";
			}
			elseif ($searchbase1 == "L")
			{
				$optl ="selected";
				$tblnm= "tbldatingcountrymaster";
			}
			elseif ($searchbase1 == "C")
			{
				$optc ="selected";
				$tblnm= "tbldatingcastmaster";
			}
			elseif ($searchbase1 == "O")
			{
				$opto ="selected";
				$tblnm= "tbldatingoccupationmaster";
			}
			elseif ($searchbase1 == "M")
			{
				$optm ="selected";
				$tblnm= "tbldatingmaritalstatusmaster";
			}
			elseif ($searchbase1 == "S")
			{
				$opts ="selected";
				$tblnm= "tbldatingspecialcasemaster";
			}
			elseif ($searchbase1 == "MT")
			{
				$optmt ="selected";
				$tblnm= "tbldatingmothertonguemaster";
			}
			elseif ($searchbase1 == "EDU")
			{
				$optedu ="selected";			
				$tblnm= "tbl_education_master";	
			}
			?>
         <div class="form-group">  <label>search in</label>
          <div class="widhtsetr">
     

			<select name="searchbase1" class="form-control" onChange="show_detail(this.value,1)">
				<option value="0">Select</option>
                <option value="R"  <?=$optr ?>>Religian</option>
				<option value="L"  <?=$optl ?>>Country</option>
				<option value="C"  <?=$optc ?>>Cast</option>
				<option value="O"  <?=$opto ?>>Occupation</option>
				<option value="M"  <?=$optm ?>>Marital status</option>
				<option value="S"  <?=$opts ?>>Special case</option>
				<option value="MT" <?=$optmt ?>>Mother tounge</option>
                <option value="EDU" <?=$optedu ?>>Education</option>
			
			</select>
            </div>
   
             <div class="widhtsetr control-label_25" id="hide_keyword1">
				<select name="keyword1" class="form-control">
				<option value="0">Select</option>
                <?
                $result = getdata("select id,title FROM ".$tblnm." where currentstatus=0 and title!='' order by title asc ");
				while($rs= mysqli_fetch_array($result))
				{ 
					if($keyword1!='')
					{ 
						if($keyword1==$rs[0])
						{
							$key1='selected';
						}else{$key1='';}
					}else{$key1='';}
				?>
					<option value='<?=$rs[0]?>' <?=$key1?>><?=$rs[1]?></option>
					
				<? } ?>
				</select>
			</div>
			            
            <div class="widhtsetr control-label_25" id="show_keyword1" style="display:none">

			</div>
            
            </div>
          <?
          	$optr2 ="";
            $optl2 = "";
            $optc2 ="";
            $opto2 = "";
            $optm2 ="";
            $opts2 = "";
            $optmt2 ="";
            $no = "";
			$optmedu2 ='';
			if ($searchbase2 == "R")
			{
				$optr2 ="selected";
				$tblnm2= "tbldatingreligianmaster";
			}
			elseif ($searchbase2 == "L")
			{
				$optl2 ="selected";
				$tblnm2= "tbldatingcountrymaster";
			}
			elseif ($searchbase2 == "C")
			{
				$optc2 ="selected";
				$tblnm2= "tbldatingcastmaster";
			}
			elseif ($searchbase2 == "O")
			{
				$opto2 ="selected";
				$tblnm2= "tbldatingoccupationmaster";
			}
			elseif ($searchbase2 == "M")
			{
				$optm2 ="selected";
				$tblnm2= "tbldatingmaritalstatusmaster";
			}
			elseif ($searchbase2 == "S")
			{
				$opts2 ="selected";
				$tblnm2= "tbldatingspecialcasemaster";
			}
			elseif ($searchbase2 == "MT")
			{
				$optmt2 ="selected";
				$tblnm2= "tbldatingmothertonguemaster";
			}
			elseif ($searchbase2 == "EDU")
			{
				$optmedu2 ="selected";
				$tblnm2= "tbl_education_master";
			}
		  ?>	
           <div class="form-group">  <label>search in</label>

			<div class="widhtsetr">
            <select name="searchbase2" class="form-control" onChange="show_detail(this.value,2)">
            	<option value="0">Select</option>
                <option value="R"  <?= $optr2 ?>>Religian</option>
				<option value="L"  <?= $optl2 ?>>Country</option>
				<option value="C"  <?= $optc2 ?>>Cast</option>
				<option value="O"  <?= $opto2 ?>>Occupation</option>
				<option value="M"  <?= $optm2 ?>>Marital status</option>
				<option value="S"  <?= $opts2 ?>>Special case</option>
				<option value="MT" <?= $optmt2 ?>>Mother tounge</option>
                <option value="EDU" <?= $optmedu2 ?>>Education</option>
			
			</select>
            </div>
            
            <div class="widhtsetr control-label_25" id="hide_keyword2">
				<select name="keyword2" class="form-control">
				<option value="0">Select</option>
                 <?
                $result2 = getdata("select id,title FROM ".$tblnm2." where currentstatus=0 and title!='' order by title asc ");
				while($rs2= mysqli_fetch_array($result2))
				{ 
					if($keyword2!='')
					{ 
						if($keyword2==$rs2[0])
						{
							$key2='selected';
						}else{$key2='';}
					}else{$key2='';}
				?>
					<option value='<?=$rs2[0]?>' <?=$key2?>><?=$rs2[1]?></option>
					
				<? } ?>
				</select>
			</div>
			            
            <div class="widhtsetr control-label_25" id="show_keyword2" style="display:none">

			</div>

            
            </div>
         <div class="form-group common_button">
         <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form><? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $adminsearchmaster_help ?></div>
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
<? function searchbasedropdown($searchbase)
{ 
$optr ="";
$optl = "";
$optc ="";
$opto = "";
$optm ="";
$opts = "";
$optmt ="";
$no = "";
if ($searchbase == "R")
$optr ="selected";
elseif ($searchbase == "L")
$optl ="selected";
elseif ($searchbase == "C")
$optc ="selected";
elseif ($searchbase == "O")
$opto ="selected";
elseif ($searchbase == "M")
$optm ="selected";
elseif ($searchbase == "S")
$opts ="selected";
elseif ($searchbase == "MT")
$optmt ="selected";
?>
	<option value="R"  <?= $optr ?>>Religian</option>
	<option value="L"  <?= $optl ?>>Country</option>
	<option value="C"  <?= $optc ?>>Cast</option>
	<option value="O"  <?= $opto ?>>Occupation</option>
	<option value="M"  <?= $optm ?>>Marital status</option>
	<option value="S"  <?= $opts ?>>Special case</option>
	<option value="MT" <?= $optmt ?>>Mother tounge</option>
<? } ?>
<? } else {
	header("location:dashboard.php?msg=no");
	exit;
} ?>