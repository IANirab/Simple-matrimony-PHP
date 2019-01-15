<? include("commonfile.php");
if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!=''){
	$curruserid = $_SESSION[$session_name_initital . "memberuserid"];
}
$filename = "searchquicksubmit";
$totaldisplay = 4;
$religionid = findsettingvalue("Religion_default_id");
$work_in_country = "";
$work_in = "";
$grahid = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_professional_search")?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<style>
.box {
	width:200px;
	height:100px;
	border:1px solid;
	float:left;
	margin:5px;
	padding:15px;
	overflow:auto;
}
.big_box {
	width:500px;
	height:1500px;
	border:1px solid;
}
.chbx{
	padding:0px;
	margin:0px;
	width:16px;
	height:16px;
	border:none;
}
.div_text{
	z-index:auto;
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
/*.box {
	width:200px;
	height:100px;
	border:1px solid;
	float:left;
	margin:5px;
	padding:15px;
	overflow:auto;
}
.big_box {
	width:500px;
	height:1500px;
	border:1px solid;		
	
}

.chbx{
	padding:0px;
	margin:0px;
	width:16px;
	height:16px;
	border:none;
}
.div_text{
	z-index:auto;
}*/
</style>

<script type="text/javascript">
	function add_social(val){
		document.getElementById('remove_sc').style.display = 'none';
		if(document.getElementById('socials_'+val).style.display == 'none'){
			document.getElementById('socials_'+val).style.display = 'inline';		
			document.getElementById('social_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_social(val){
		document.getElementById('socials_'+val).style.display = 'none';
		document.getElementById('social_'+val).disabled = true;	
	}
	
	function add_marital(val){
		if(val==2 || val==3) {
			document.getElementById('have_children').style.display = 'table-row';
		}
		document.getElementById('remove_m').style.display = 'none';
		if(document.getElementById('maritals_'+val).style.display == 'none'){
			document.getElementById('maritals_'+val).style.display = 'inline';		
			document.getElementById('marital_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_marital(val){
		document.getElementById('maritals_'+val).style.display = 'none';
		document.getElementById('marital_'+val).disabled = true;	
	}
	
	function add_mangalik(val){
		document.getElementById('remove_n').style.display = 'none';
		if(document.getElementById('mangaliks_'+val).style.display == 'none'){
			document.getElementById('mangaliks_'+val).style.display = 'inline';		
			document.getElementById('mangalik_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_mangalik(val){
		document.getElementById('mangaliks_'+val).style.display = 'none';
		document.getElementById('mangalik_'+val).disabled = true;	
	}
	
	function add_work_c(val){
		document.getElementById('remove_c').style.display = 'none';
		if(document.getElementById('workcs_'+val).style.display == 'none'){
			document.getElementById('workcs_'+val).style.display = 'inline';		
			document.getElementById('workc_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_work_c(val){
		document.getElementById('workcs_'+val).style.display = 'none';
		document.getElementById('workc_'+val).disabled = true;	
	}
	
	function add_occupation(val){
		document.getElementById('remove_oc').style.display = 'none';
		if(document.getElementById('occupations_'+val).style.display == 'none'){
			document.getElementById('occupations_'+val).style.display = 'inline';		
			document.getElementById('occupation_'+val).disabled = false;
		} else {
			alert('You have already added');
		}		
	}
	
	function remove_occupation(val){
		document.getElementById('occupations_'+val).style.display = 'none';
		document.getElementById('occupation_'+val).disabled = true;	
	}
	
	function remove_any(val){
		document.getElementById('remove_'+val).style.display = 'none';
	
	}	
	
	
	</script>

    <script>
	
function add_cast(div){	
	document.getElementById(div).disabled = true;
	$('div.showhide'+div+',h1').show("slow");
	document.getElementById(div).disabled = false;
}

function remove_cast(div){
	$('div.showhide'+div+',h1').hide("slow");
	document.getElementById(div).disabled = true;
}

function add(div,div1){
	document.getElementById(div1).disabled = true;
	$('div.'+div+',h1').show("slow");
	document.getElementById(div1).disabled = false;
}

function remove(div,div1){
	$('div.'+div+',h1').hide("slow");
	document.getElementById(div1).disabled = true;
}

function check_casts(religionid)
{
		if(religionid!='0.0')
		{
			$.post("check_casts.php",{
			religionid:religionid
			},function (data){
			
				$("#searchquick_casts_hide").remove();
				$("#searchquick_casts_show").html(data);
			}		
			)
		}
}

</script>

</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about wrapper_advancesearch raw">
	<div class="container">
    	<? include("plugin.professional.php");?>
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