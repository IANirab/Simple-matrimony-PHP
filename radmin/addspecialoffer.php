<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$specialoffercode= "";
$specialofferper= "";
$specialofferval= "";
$specialsffervalue= "";
$active= "";
$specialoffertypeper = "";
$specialoffertypeval = "";
$selected_p = "";
$selected_v = "";
$specialsffervaluedisplay = "";
$action = 0;
$filename ="insertspecialoffer";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select specialofferid,specialoffercode,specialoffertype,specialsffervalue,active,specialsffervaluedisplay from tblscspecialoffermaster where currentstatus =0 and specialofferid=$action");
	while ($rs = mysqli_fetch_array($result))
	{
			$specialoffercode= $rs[1];
			$specialoffertype = $rs[2];
			$specialsffervalue = $rs[3];
			if ($rs[4] =="Y")
				$active= "Checked";
			else
				$active= "";
			if($specialoffertype=='v'){
				$selected_v = 'selected="selected"';
				$selected_p = "";
			} else {
				$selected_v = "";
				$selected_p = 'selected="selected"';
			}
			$specialsffervaluedisplay = $rs[5];
	}
}
?>
<html>
<head>
<title><?= $admintitle ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
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
			<h1 class="pagetitle">Add Special Offer </h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

     
	  <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal ">
       <div align="center" class="errorbox"><?= checkerroradmin(); ?></div>
    <div class="form-group singleline_class">
          <div class="widhtsetr">
       <label>Type </label>
			<? 
				
			?>
              <select name ="cmbtype"  class="form-control">
				<option value="">Select</option>
				<option value ="v" <?=$selected_v?>>Value</option>
				<option value ="p" <?=$selected_p?>>Percentage</option>
			</select>
              </div>
		  
		  <div class="widhtsetr">
           <label>Code </label>
           
              <input type="text" name="specialoffercode" value="<?= $specialoffercode ?>" class="form-control">
              </div>
		  
		  <div class="widhtsetr control-label_25">
           <label>Value </label>
              <input type="text" name="specialsffervalue" value="<?= $specialsffervalue ?>" class="form-control">
              </div>
              </div>
          
         <div class="form-group">
          <div class="widhtsetr"><label>Value for Display</label>
              <input type="text" name="specialsffervaluedisplay" value="<?= $specialsffervaluedisplay ?>" class="form-control">
              <note>In case of value type, this will be used for display in invoice</note>
              </div>
			 <div class="widhtsetr control-label_25"> 
             <label>&nbsp;</label> 
              <input type="checkbox" id=active name=active <?= $active ?> value="Y" /> Active
              </div>
             	</div>  
          
          <div class="form-group common_button">
          <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn"value="Reset" title="Reset" alt="Reset">
            </div>
    </form>
        <?php /*?><form name =frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>">
		  <tr valign="top"> 
            <th scope="row" width="25%" class="adminformhead">Type :</th>
            <td class="adminformcont"> 
			<select name ="cmbtype" class="adminform">
			<option value="">Select</option>
			<option value ="v" >Value</option>
			<option value ="p" >Percentage</option>
			</select>
              *</td>
          </tr>
          <tr valign="top">
            <th scope="row" class="adminformhead">Code :</th>
            <td class="adminformcont"> 
              <input type="text" name="specialoffercode" class="adminform" size=35 maxlength="100" value ="<?= $specialoffercode  ?>">
              </td>
          </tr>
          <tr valign="top">
          <th scope="row" class="adminformhead">Value :</th>
            <td class="adminformcont"> 	
              <input type="text" name="specialsffervalue" class="adminform" size=35 maxlength="100" value ="<?= $specialsffervalue ?>">
              </td>
          </tr>
          <tr valign="top">
          <th scope="row" class="adminformhead">&nbsp;</th>
            <td class="adminformcont"><input type="checkbox" id=active name=active <?= $active ?> value="Y" /> Active</td>
          </tr>
          <tr valign="top"> 
            <th scope="row" class="adminformhead">&nbsp;</th>
            <td class="adminformcont"><input name="Submit" type="submit" class="adminformbtn" title="Submit" onClick="MM_validateForm('specialoffercode','','R','specialsffervalue','','R');return document.MM_returnValue" value="Submit" alt="Submit"> 
              <input name="Reset" type="reset" class="adminformbtn2" value="Reset" title="Reset" alt="Reset"> 
            </td>
          </tr>
        </form><?php */?>
      </table>
<p>&nbsp;</p>
			
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
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