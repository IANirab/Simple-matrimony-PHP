<? //include("reg_include.php");
require_once("../translation.php");
require_once("../dbinclude/function.php");
require_once("../dbinclude/configuration.php");
include_once("../dbinclude/datingcommonfunction.php");
include_once('../assets/'.$sitethemefolder.'/design_config.php');
$ex_id ='';
$errid ='';
function remove_numbers($string) {
	$vowels = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
  	$string = str_replace($vowels, '*', $string);
  	return $string;
} 
checkadminlogin();
$message = "";
$nickname = '';
if(isset($_GET['uid']) && $_GET['uid']!=''){
	$nickname = getonefielddata("SELECT nickname from tbldatingusermaster WHERE userid=".$_GET['uid']);
}
$chkdailyview = findsettingvalue("max_contacts_view");
if (isset($_GET["b"]))
{
	$errid = $_GET["b"];
	$ex_id = "";
	if (isset($_GET["b1"]))
	$ex_id = $_GET["b1"];
	if ($errid == 1)
		$message = $messageerrmess1;
	if ($errid == 2)
		$message =  $messageerrmess2;
	if ($errid == 3)
		$message =  $messageerrmess3;
	if ($errid == 4)
		$message =  $messageerrmess4;
	if ($errid == 5)
		$message =  $messageerrmess5;
	if ($errid == 6)
		$message =  $messageerrmess6;
	if ($errid == 7)
		$message =  $messageerrmess7;
	if ($errid == 8)
		$message =  $messageerrmess8;
	if ($errid == 9)
		$message =  $messageerrmess9;
	if ($errid == 10)
		$message =  $messageerrmess10;
	if ($errid == 11)
		$message =  $messageerrmess11;
	if ($errid == 12)
		$message =  $messageerrmess12;
	if ($errid == 13)
		$message =  $messageerrmess13;
	if ($errid == 14)
		$message =  $messageerrmess14;
	if ($errid == 15)
		$message =  $messageerrmess15;
	if ($errid == 16)
		$message =  $messageerrmess16;
	if ($errid == 17)
		$message =  $messageerrmess17;
	if ($errid == 18)
		$message =  $messageerrmess18;
	if ($errid == 19)
		$message =  $messageerrmess19;
	if ($errid == 20)
		$message =  $messageerrmess20;
	if ($errid == 21)
		$message =  $messageerrmess21;
	if ($errid == 22)
		$message =  $messageerrmess22;
	if ($errid == 23)
		$message =  $messageerrmess23;
	if ($errid == 24)
		$message =  $messageerrmess24;
	if ($errid == 25)
		$message =  $messageerrmess25;
	if ($errid == 26)
		$message =  $messageerrmess26;
	if ($errid == 27)
		$message =  $messageerrmess27;
	if ($errid == 28)
		$message =  $messageerrmess28;
	if ($errid == 29)
		$message =  $messageerrmess29;
	if ($errid == 30)
		$message =  $messageerrmess30;
	if ($errid == 31)
		$message =  $messageerrmess31;
	if ($errid == 32)
		$message =  $messageerrmess32;
	if ($errid == 33)
		$message =  $messageerrmess33;
	if ($errid == 34)
		$message =  $messageerrmess34;
	if ($errid == 35)
		$message =  $messageerrmess35;
	if ($errid == 36)
		$message =  $messageerrmess36;
	if ($errid == 37)
		$message = str_replace("[sitepath]",$sitepath,$messageerrmess37);
	if ($errid == 38)
		$message = str_replace("[sitepath]",$sitepath,$messageerrmess38);
	if ($errid == 39)
		$message = $messageerrmess39;
	if ($errid == 40)
		$message = $messageerrmess40;
	if ($errid == 41)
		$message = $messageerrmess41;
	if ($errid == 42)
		$message = $messageerrmess42;
	if ($errid == 43)
		$message = $messageerrmess43;
	if ($errid == 44)
		$message = $messageerrmess44;
	if ($errid == 45)
		$message = $messageerrmess45;
	if ($errid == 46)
		$message = $messageerrmess46;
	if ($errid == 47)
		$message = $messageerrmess47;
	if ($errid == 48)
		$message = $messageerrmess48;
	if ($errid == 49)
		$message = $messageerrmess49;
	if ($errid == 50)
		$message = $messageerrmess50;
    if ($errid == 51)
		$message = $messageerrmess51;
	 if ($errid == 53)
		$message = $messageerrmess53;
	if ($errid == 54)
		$message = $messageerrmess54;
	if ($errid == 55)
		$message = $messageerrmess55;
	if ($errid == 56)
		$message = $messageerrmess56;
	if ($errid == 57)
		$message = $messageerrmess57;
	if ($errid == 58)
		$message = $messageerrmess58;
	if ($errid == 59)
		$message = $messageerrmess59;
	if ($errid == 60)
		$message = $messageerrmess60;
	if ($errid == 61)
		$message = $messageerrmess61;
	if ($errid == 62)
		$message = $messageerrmess62;
	if ($errid == 63)
		$message = $messageerrmess63;
	if ($errid == 64)
		$message = $messageerrmess64;
	if ($errid == 65)
		$message = $messageerrmess65;
	if ($errid == 66)
		$message = $messageerrmess66;
	if ($errid == 67)
		$message = $messageerrmess67;
	if ($errid == 68)
		$message = $messageerrmess68;
	if ($errid == 69)
		$message = $messageerrmess69;
	if ($errid == 70)
		$message = $messageerrmess70;
	if ($errid == 71)
		$message = $messageerrmess71;
	if ($errid == 72)
		$message = $messageerrmess72;
	if ($errid == 73)
		$message = $messageerrmess73;
	if ($errid == 74)
		$message = $messageerrmess74;
	if ($errid == 75)
		$message = $messageerrmess75;
	if ($errid == 76)
		$message = $messageerrmess76;
	if ($errid == 77)
		$message = "OK";
	if ($errid == 78)
		$message = $messageerrmess78;
	if ($errid == 79)
		$message = $messageerrmess79;
	if ($errid == 80)
		$message = $messageerrmess80;
	if ($errid == 81)
		$message = "You can not see more than ".$chkdailyview." contacts per day.";
	if ($errid == 82)
		$message = $messageerrmess82;
	if ($errid == 83)
		$message = $messageerrmess83;
	if ($errid == 84)
		$message = $messageerrmess84;
	if ($errid == 85)
		$message = $messageerrmess85;
	if ($errid == 86)
		$message = $messageerrmess86;
	if ($errid == 87)
		$message = $messageerrmess87;
	if ($errid == 88)
		$message = $messageerrmess88;
	if ($errid == 89)
		$message = str_replace("[nickname]",$nickname,$messageerrmess89);
	if ($errid == 90)
		$message = $messageerrmess90;
	if ($errid == 91)
		$message = $messageerrmess91;
	if ($errid == 92)
		$message = $messageerrmess92;
	if ($errid == 93)
		$message = $messageerrmess93;
	if ($errid == 94)
		$message = $messageerrmess94;
	if ($errid == 95)
		$message = $messageerrmess95;
	if ($errid == 96)
		$message = "";
	if ($errid == 97)
		$message = $messageerrmess97;
	if ($errid == 98)
		$message = $messageerrmess98;
	if ($errid == 99)
		$message = $messageerrmess99;
	if ($errid == 100)
		$message = $messageerrmess100;
	if ($errid == 101)
		$message = $messageerrmess101;		
	if ($errid == 102)
		$message = $messageerrmess102;
	if ($errid == 103)
		$message = "<a href='".$sitepath."updateprofile2.php'>

		Fill Up Your Details THen Display Your Horoscope </a>";
		//		This is user  is not fill uo its Horoscope Details
		if ($errid == 105)
		$message = "This user  is not fill up its Horoscope Details";
	if ($errid == 104)
		$message = "This user Not Upload its full Details..";
	if ($errid == 106)
	$message = "This user not create its horscope.";
}
$message = str_replace("[sitepath]",$sitepath,$message);
$message = str_replace("[ex_id]",$ex_id,$message);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?=$ltr?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 



<script language="javascript" type="text/javascript">
function change_captcha(){
	$.post('change_contactcaptcha.php',{
			captcha:"captcha"},
				function (data){					
					document.getElementById('imagenmcaptcha').src = '<?=$sitepath?>uploadfiles/'+data;	
				}
			);
}
</script>


</head>
<body>

<?php include("admintop.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	
		<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-2 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-8 midle_title"><span><?= $messagepgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-2 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>


		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="alerttable">
	<tr>
	<td class="alerticon"><img src="<?= $siteuploadfilepath_new ?>images/alerticon.gif" alt=""></td>
	<td>
		<div class="error1" align="center" class=""><p style="color:#fff;text-transform:capitalize">
		<? if($message!='') { ?><?= $message ?><? } ?></p></div>
		<br />
		<br /><br />
		
		<div align="center" class="boldtext extralink1">
        <? if($errid==75){ ?>
        	<a href="<?= $sitepath ?>searchresult.php" class="link"><?= $messagesearchresult ?></a> &nbsp;&nbsp;|
        <? } ?>
		<a href="<?= $sitepath ?>advancesearch.php" class="link"><?= $messageextralink1 ?></a> &nbsp;&nbsp;|&nbsp;&nbsp; 
        <a href="<?= $sitepath ?>dashboard.php" class="link"><?= $messageextralink2 ?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
         <a href="javascript:history.go(-1)" class="link"><?= $messageextralink3 ?></a>  &nbsp;&nbsp;|&nbsp;&nbsp; 
		
		<? if ($Update_profile_Pages_design_setting == "D") { ?>
<a class="link" href="<?= $sitepath ?>updateprofilepersonal.php"><?= $leftlinkprofile ?></a>
<? } ?>
<? if ($Update_profile_Pages_design_setting == "S") { ?><a class="link" href="<?= $sitepath ?>registration2.php">
<?= $leftlinkprofile ?></a><? } ?>

		</div>
	</td>
	</tr>
	</table>
<br><br><br><br>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>
	
    </div>
   
</div>
</div>

<!--matrimonal_footer Start  -->
<?php include("adminbottom.php") ?>
</body>
</html>
