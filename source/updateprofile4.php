<? include_once("commonfile.php");
$getid = "";
if(isset($_GET['b']) && $_GET['b'] != "" && is_numeric($_GET['b']) && $_SESSION[$session_name_initital."session"]==session_id() && $_SESSION[$session_name_initital."referal"]==$newsitepath && isset($_SERVER['HTTP_REFERER']) ) {
	$curruserid = $_GET['b'];
	$getid = $_GET['b'];
} else {
	checklogin($sitepath);
}
$filename ="updateprofile4insert";
$profiletoplinklifestyle_css_classs = "profilenavnumber_active";
$action = 0;
$dietid = "";
$smokerstatusid = "";
$drinkerstatusid = "";

$result = getdata("select dietid,smokerstatusid,drinkerstatusid from tbldatingusermaster where userid =$curruserid");
	while ($rs = mysqli_fetch_array($result))
	{
		$dietid = $rs[0];
		$smokerstatusid = $rs[1];
		$drinkerstatusid = $rs[2];
	}
	freeingresult($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
    span{
        color:black !important;
    }
</style>

<style type="text/css">
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
}

#mainWrap {
	margin: 0 auto;
	width: 900px;
}

#wrdInfoWrap {
	background-color: #FFFF99;
	height: 80px;
}

#wrdInfoWrapLeft {
	float: left;
	width: 300px;
	padding: 10px;
}

#wrdInfoWrapRight {
	float: right;
}

#wrdInfoWrapRight A:link, #wrdInfoWrapRight A:visited, #wrdInfoWrapRight A:active {
	color: #333333;
	text-decoration: underline;
}

#wrdInfoWrapRight A:hover {
	color: #669900;
}

#wrdTutorialInfo {
	margin: 25px 10px; 0 0;
	background-color: #FFFFFF;
	padding: 5px;
}

#headerWrap {
	width: 100%;
	height: 30px;
	background-color: #666666;
	border: 1px #999999 solid;
}

#contentWrapLeft {
	float: left;
	width: 650px;
}


#contentWrapRight {
	float: right;
	width: 250px;
}

.productWrap {
	float:left;
	width: 170px;
	margin: 5px;
	padding:10px;
	text-align:center;
	color:#7a7a7a;
	border: 1px #EBEBEB solid;
}

.productPriceWrap {
	background-color: #CCCCCC;
	padding: 5px;
	color: #000000;
	font-weight: bold;
}

.productPriceWrap img {
	border: 0;
}

#basketWrap {
	margin: 10px;
	background-color: #EBEBEB;
	padding-bottom: 5px;
}

#basketTitleWrap {
	background-color: #669900;
	border: 3px #CCCCCC solid;
	padding: 5px;
	color: #FFFFFF;
	font-weight: bold;
	height: 20px;
}

#basketItemsWrap img {
	border: 0;
}

#basketItemsWrap ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

.basketItemLeft {
	float: left;
}

.basketItemRight {
	float: right;
}

#bannerWrap {
	margin: 10px;
	padding-bottom: 5px;
}
/*new css for music*/
#basketItemsWrap1 img {
	border: 0;
}

#basketItemsWrap1 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap1 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for interest*/
#basketItemsWrap2 img {
	border: 0;
}

#basketItemsWrap2 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap2 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for Favourite Read*/
#basketItemsWrap3 img {
	border: 0;
}

#basketItemsWrap3 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap3 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for Favourite Cuisines*/
#basketItemsWrap4 img {
	border: 0;
}

#basketItemsWrap4 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap4 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for Favourite Dress*/
#basketItemsWrap5 img {
	border: 0;
}

#basketItemsWrap5 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap5 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

/*new css for Fitness*/
#basketItemsWrap6 img {
	border: 0;
}
	
#basketItemsWrap6 ul {
	list-style-type: none;
	list-style-position: outside;
	margin: 0;
	padding: 0;
}

#basketItemsWrap6 li {
	background-color: #ffffff;
	margin: 5px;
	font-size: 12px;
}

</style>

<script language="javascript" type="text/javascript">
function sub()
{

window.location="updateprofile4insert.php";
}
function add(div,div1,show,hide){	
	document.getElementById(div1).disabled = true;
	$('div.'+div+',h1').show("slow");
	document.getElementById(div1).disabled = false;
	$("#"+show).hide("slow");
}

function remove1(div,div1,show,hide){	
	$('div.'+div+',h1').hide("slow");
	document.getElementById(div1).disabled = true;	
	$("#"+show).show("slow");
}

function removing(div,div1,show,hide){
	$('div.'+div+',h1').hide("slow");
	document.getElementById(div1).disabled = true;	
	$("#"+show).show("slow");
}

</script>

<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    
    	<? include("plugin.updateprofile4.php");?>
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
<? include('formjs.php'); ?>


   
<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>