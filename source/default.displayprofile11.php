<?
require_once("plugin.displayprofile_coding.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<? include('fancyboxjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<link rel="canonical" href="<?=$sitepath?>displayprofile.php?b=<?=$dispayuserid?>" />
<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script language="javascript">
function printPage(arg)
{
	if(arg=='Y'){
		window.open("<?=$sitepath?>displayprofile_print_detail.php?b=<?=$dispayuserid?>&act=ph","_blank");
	} else if(arg=='A'){
		window.open("<?=$sitepath?>displayprofile_print_detail.php?b=<?=$dispayuserid?>");
	} else {
		window.open("<?=$sitepath?>displayprofile_print_detail.php?b=<?=$dispayuserid?>");
	}
}
</script>

<script language="javascript" type="text/javascript">
function open_box(userid){	
	return parent.GB_showCenter('Zoom', "<?=$sitepath?>imagegb.php?b="+userid, 680, 515);	
}
</script>
<?= $sitetitle ?>
<?= $meta_key ?>
<?= $meta_desc ?>
<?= generatestylesheet($dispayuserid) ?>
<style type="text/css">
.thumbnail{
/*position: relative;*/
position:static;
z-index:0;
}
.thumbnail:hover{
background-color: transparent;
z-index:1000;
}
.thumbnail div{ /*CSS for enlarged image*/
position: absolute;
padding: 0px;
margin:0px;
left: -5000px;
/*border: 1px dashed gray;*/
visibility: hidden;
color: black;
text-decoration: none;
/*overflow:auto;*/
z-index:1000;
}
.thumbnail div img{ /*CSS for enlarged image*/
padding: 0px;
margin:0px;
width:auto;
height:auto;
z-index:1000;
}
.thumbnail:hover div{ /*CSS for enlarged image on hover*/
position:absolute;
visibility: visible;
top: 0px;
left: 0px; /*position where enlarged image should offset horizontally */
border:solid 1px #666666;
z-index:1000;
}
</style>



<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>


<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.displayprofile.php");?>
         <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 search_right_modify">
        <div class="searchresultsleft sunni_refine"><?php include("adleft.php") ?>
        <? //include("side_banner.php"); ?>
</div>
	</div>
    </div>
   
</div>
</div>
<div class="wrapper_blank">
	<div class="container">
    	 <div col-lg-9 col-md-9 col-sm-9 col-xs-12>
    			<div class="leftcms">
		 &nbsp;
    </div>
    </div>
    <div col-lg-3 col-md-3 col-sm-3 col-xs-12>
    			<div class="rightcms">
		 &nbsp;
    </div>
    </div>
    </div>
</div>

<script language="javascript" type="text/javascript">
	function check_email(){
		
		var captcha = document.frm_send_friend.Captcha;
		var h_captcha = document.frm_send_friend.hiddencaptcha;  
		
		if(document.getElementById('txtemail').value==""){
			alert("Please Enter Valid Email Address.");
			document.getElementById('txtemail').focus();
			return false;
		}
		else if(captcha.value == "")
		{
			alert("Please Enter imagecode");
			captcha.focus();
			return false;
		}
		else if(captcha.value != "")
		{
			 if(captcha.value != h_captcha.value)
			 { 
				alert("Please Enter valid imagecode");
		 		captcha.value = "";
				captcha.focus();
		 		return false;
			}
		}
		else {
			return true;
		}
	}
	
	function change_captcha(){
	$.post('change_captcha.php',{
			captcha:"captcha"},
				function (data){							
					var newdata = data.split('#');										
					document.getElementById('imagenmcaptcha').src = '<?=$sitepath?>uploadfiles/'+newdata[0];	
					document.getElementById('hiddencaptcha').value = newdata[1];
				}
			);
}
	
</script>


<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
</script>

<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>


</body>
</html>