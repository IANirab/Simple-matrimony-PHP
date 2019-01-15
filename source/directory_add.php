<?
ob_start();
include("commonfile.php");
$chk_free = "";
$chk_paid ="selected";
$categoryids="";
$titles ="";
$links="http://";
$mobile ="";
$email="";
$descriptions ="";
$image ="";
$id="";
$passcode="";
$directoryid ="";
if ((isset($_GET["b"])) && (is_numeric($_GET["b"])))
	$id = $_GET["b"];
	
if ((isset($_GET["b1"])) && (is_numeric($_GET["b1"])))
	$passcode = $_GET["b1"];
if (($id != "") && ($passcode != ""))
{	
	$result = getdata("select directoryid,title,categoryid,description,image_nm,link,mobile,email,code,password,typeid from tbl_directory_master where deactive='N' and currentstatus=0 and directoryid=$id and password='$passcode'");
while($rs= mysqli_fetch_array($result))
{
	$directoryid = $rs[0];
	$titles =$rs[1];
	$categoryids=$rs[2];
	$descriptions =$rs[3];
	$image =$rs[4];
	$links=$rs[5];
	$mobile =$rs[6];
}
	freeingresult($result);
if ($directoryid == "")
{
	header("location:message.php?b=62");
	exit();
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?=$ltr?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript">
<!--
function imposeMaxLength(Object, MaxLen)
{
  return (Object.value.length <= MaxLen);
}
-->
</script>

<script>
function show_price(id)
{
	
	if(id==2)
	{
		$("#price_data").show();
	}
	if(id==1)
	{
		$("#price_data").hide();
	}
}
</script>

</head>
<body>

<!-- TOP START ######################## -->
<?php include("top.php") ?>
<!-- TOP END ######################## -->

	<!-- LEFT START ######################## -->
	
	<!-- LEFT END ######################## -->
	<!-- RIGHT START ######################## -->
	
	<!-- RIGHT END ######################## -->
	<!-- MAINIMAGE START ######################## -->

	<!-- MAINIMAGE END ######################## -->
	<!-- CENTER START ######################## -->
		<div class="wrapper_about raw">
	<div class="container">
    	 <div class="box_shader">
         
         
           <div class="pagetitle">
 	 <div class="featured_title_div abtus left_add_title">
   <span><?= $adddirectorypgtitle ?></span>
   <i>
   <a href="<?= $sitepath ?>directory.php"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory1.png" alt="" onclick="close_form();" class="" /> <?=$directory_search_result_browsedirectory ?>
   
   </a>
<a href="<?= $sitepath ?>directory_add.php"><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory2.png" alt="" onclick="close_form();" class="" /> <?= $directory_search_result_adddirecotorylisting ?>



</a>
<a href="<?= $sitepath ?>directory_lostpassword.php"><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory3.png" alt="" onclick="close_form();" class=""  /> <?= $directory_search_result_lostdirectorypassword ?>

</a>
<a href="directory.php">
    <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/back.png" alt="" onclick="close_form();" class="" /> Back</a>
</i>
    </div>
            </div>
		<!-- ********* TITLE START HERE *********-->
	
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent leftpadds default_diradd">
<!-- ********* CONTENT START HERE *********-->
<div class="default_textadd">
<p>
You can have one listing per email address</p>

<p>All paid listing needs approval once payment is completed.</p>

<p>To contact for the support <a href="<?=$sitepath?>contactus.php">use this form</a>.</p>

<p>To modify the listing use <a href="<?=$sitepath?>directory.php">this form</a>.</p>

<p>We reserve rights to approve or disapprove the listing.</p>
</p>
</div>

<form name="frm_directory_add" class="Login form_sections" method="post" action="<? $sitepath ?>directory_insert.php" ENCTYPE="multipart/form-data" >
<input type="hidden" name="directoryid" value="<?= $directoryid ?>" />
<input type="hidden" name="passcode" value="<?= $passcode ?>" />

<? //if ($directoryid == "") { ?>
 <div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_add_listingtype ?> </label>
 <div class="col-lg-8"><select name="typeid" class="form-control" onchange="show_price(this.value)">
<option value="1" <?= $chk_free ?>><?= $directory_add_freetype; ?></option>
<option value="2" <?= $chk_paid ?>><?= $directory_add_paidtype; ?></option>			 
</select>
</div>
</div>
<? //} ?>
					<?
					$style_type='';
                    if($chk_paid=="selected")
					{
						 $style_type='style="display:block"';
					}
					else
					{
						 $style_type='style="display:none"';
					}
					?>
				<div class="form-group" id="price_data" <?=$style_type?>>
                <span>				
				<? echo $CurrencySymbol = findsettingvalue("CurrencySymbol");?>
				<? echo $amount = findsettingvalue("Directory_listing_price");?>
                </span>
                </div>
                	

 <div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_add_category ?> </label>
 <div class="col-lg-8"><select name="categoryid" class="form-control">
<? fillcombo("select categoryid,title from tbl_directory_category_master where currentstatus=0 order by title ",$categoryids,""); ?>
</select>
</div>
</div>

 <div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_add_title?>  </label>
 <div class="col-lg-8"><input type="text" name="dtitle" value="<?= $titles ?>" class="form-control" size="35" /></div>
 </div>
 <div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_add_link ?> </label>
 <div class="col-lg-8"><input type="text" name="link" value="<?= $links ?>" class="form-control" size="35" />(Link Should Start With http://)</div>
 </div>
<div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_add_mobileno ?> </label>
 <div class="col-lg-8"><input type="text" name="dmobile" value="<?= $mobile ?>" class="form-control" size="35" /></div>
 </div>

<div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_add_email ?></label>
 <div class="col-lg-8"><input type="text" name="email" id="email" value="<?= $email ?>" class="form-control" size="35" /></div>
 </div>

<div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_add_description ?>  </label>
<div class="col-lg-8">
<textarea id="message" name="message" rows="5" cols="50" class="form-control" onkeypress="return imposeMaxLength(this, 200);"><?= $descriptions ?></textarea><br />
<span class="note_2">[ <?= $directory_add_messagedescription ?> ]</span>
</div>
</div>

<div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_add_uploadimage ?> </label>
<div class="col-lg-8"><input type="file" name="img" size=35  class="form-control"><br />
<span class="note note_2">[ <?= $directory_add_heightwidth ?>]</span>
<?
if ($image != "") { ?>
<img src='<?= $sitepath ?>uploadfiles/<?= $image ?>' width="80px" height="80px" align="absmiddle" />
<? } ?>
</div>
</div>
   
   <div class="form-group button_section">
                    <label class="col-lg-4 control-label">&nbsp;</label>
    <div class="col-lg-8"><div class="formbtn_outer"><input type="submit" class="formbtn" onclick="MM_validateForm('dtitle','','R','email','','RisEmail','dmobile','','RisNum');return document.MM_returnValue"   value="<?= $directory_add_btn_submit ?>" /></div></div>
    <!---->
    </div>
</form>

		<!-- ********* CONTENT END HERE *********-->
		</div>
		</div>
		</div>
		</div>
	<!-- CENTER END ######################## -->
	<!-- FOOTER START ######################## -->
 	<?php include("footer.php") ?>
	<!-- FOOTER END ######################## -->
</body>
</html>
<script type="text/JavaScript">

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
<?
ob_flush();
?>