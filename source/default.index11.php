<?
ob_start();
require_once('commonfile.php');
$home_page_main_image = findsettingvalue("Home_page_main_image_nm");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<? include('indexjs.php'); ?>
<?= $sitetitle ?>
<title>Events a Wedding Category Bootstrap Responsive website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?= $sitethemepath ?>
<meta name="keywords" content="Events Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>


<!-- //js -->
<!-- web-fonts -->  
<link href="https://fonts.googleapis.com/css?family=Bitter|Kanit|Lobster|Nunito|Quicksand|Varela+Round|Work+Sans" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Cormorant+Upright|Croissant+One|Milonga|Princess+Sofia|Redressed" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Cookie|Great+Vibes|Lobster|Lobster+Two|Old+Standard+TT|Tangerine" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Acme|Lato|Montserrat|Mukta|Mukta+Malar|Noto+Sans" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<!-- web-fonts -->



<? 
/*
$enable_nri_search='';
if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	 $curruserid = $_SESSION[$session_name_initital."memberuserid"]; 
} */
?>
<script type="text/javascript" language="javascript">
	function change_cast(val,type)
	{		
		if(val!="")
		{
			
			if(document.getElementById('cast').style.display=='inline' && type==1)
			{
				document.getElementById('cast').style.display = 'none';
			}
			
	      <? if($enable_quick_search_long_2=='Y') {?>		
			
			if(document.getElementById('subcast_dr').style.display=='inline' && type==2)
			{
				document.getElementById('subcast_dr').style.display = 'none';
			}
			<? }?>
			
			if(type==1)
			{
				document.getElementById('indicator').style.display = 'inline';
				document.getElementById('casts').style.display = 'none';
			}
			if(type==2)
			{
				document.getElementById('indicator1').style.display = 'inline';
				document.getElementById('subcast_drs').style.display = 'none';		
			}
			
			$.post("<?=$sitepath?>search_cast.php",
				{religionid:val,type:type,
				 cat:"topsearch"},
				function (data)
				{					
						var str = data;
						if(str!="" && type==1)
						{
							document.getElementById('indicator').style.display = 'none';
							document.getElementById('cast').style.display = 'inline';
							document.getElementById('cast').innerHTML = str;
						}
						if(str!="" && type==2)
						{
							document.getElementById('indicator1').style.display = 'none';
							document.getElementById('subcast_dr').style.display = 'inline';
							document.getElementById('subcast_dr').innerHTML = str;
						}
				}
			)
		}
	}
	
	function setvisiblity1(){

    if (document.getElementById("divparameter1").style.display =="block"){
        document.getElementById("divparameter1").style.display ='none';
    }else
        document.getElementById("divparameter1").style.display ='block';
}
</script>


<script>
	var doc = document.documentElement;
	doc.setAttribute('data-useragent', navigator.userAgent);
</script>







<!-- slider -->



<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/papaCarousel.css">



<!-- slider -->




<style type="text/css">

p {
   font-family: Raleway;
   /*font-size: 20px !important;*/
}

span {
   font-family: Redressed;
}

h1,h2,h3{
    font-family:Croissant one;
}

span.bottom_link {
    /*font-size: 20px;*/
}

.navbar-default .navbar-nav > li > a {
    font-family: Lato;
}

.slider {
    margin-top: 80px;
}
.form-control {
    width: 164% !important;
}
    select.form-control.fs {
    width: 100% !important;
    margin-right: 10px;
    }
    .fm {
        float:left;
        margin-right: 20px;
    }
    
   img.logoimg {
    width: 92px;
    position: relative;
    /*top: -28px;*/
    left: -48px;
}

    .h-search {
    background: #eee;
    padding-left: 40px;
    position: absolute;
    top: 110px;
    z-index: 99;
}
.thumbnail {
    width: 66px !important;
}
ul.home {
    width: 211px;
}
.laptop {
    background: white !important;
    padding:2em 2em;
    margin: 0 15px;
}

nav.navbar.navbar-default.navbar-fixed-top {
  background: black !important;
}

/*.testimonials{
    background: url(../images/4.jpg)no-repeat;
    background-size: cover;
    background-attachment: fixed;
    padding: 5em 0;
}*/

input.btn {
    background: #ff0a80;
}
span {
    color: #fff !important;
}
a {
    color: #fff !important;
}









.card {
    float: left;
    margin-right: 25px;
}
.main-form {
    width: 485px;
    margin: 0 auto;
    position: relative;
    top: -330px;
    z-index: 99;
}
select#s1 {
    width: 160px;
    height: 35px;
}
select.s2 {
    width: 60px;
    height: 35px;
}
select#s4 {
    width: 165px;
    height: 35px;
}
select#s3 {
    width: 105px;
    height: 35px;
}
select {
    margin-top: 10px;
    padding-left: 9px;
    color: #333;
    font-weight: 700;
}
input[type="submit"] {
    margin-top: 28px;
    width: 80px;
    height: 35px;
    border: none;
    background: #ff1493;
    color: white;
    border-radius: 3px;
}
.main-form {
    background: rgba(2, 1, 3, 0.56)!important;
    overflow: hidden;
    padding: 31px;
    padding-right: 0px;
    color: white;
    font-family: arial;
    word-spacing: 4px;
}
.logoimg{
    width: 168px;
    position: absolute;
    top: 1px;

}
.col-lg-4 {
    width: 96.333333% !important;
    font-size: 13px !important;
}


.col-lg-8 {
    margin: 10px 0px;
}
select.form-control.ex_small.pull-right {
    margin-top: 33px;
}
.form-group.search-com.fee {
    position: relative;
    top: 0px;
}
.form-group {
    width: 30%;
    float: left;
}
.form-group.search-com.fee {
    position: relative;
    top: -101px;
}
.form-group.seach-country.fee {
    position: relative;
    top: -15px;
    left: -136px;
}
.form-group.extand_largeer {
    position: relative;
    left: -117px;
    top: 6px;
}
input[type="submit"] {
    margin-top: 17px;
    width: 80px;
    height: 35px;
    border: none;
    background: #ff1493;
    color: white;
    border-radius: 3px;
    position: relative;
    left: -117px;
}
span.agg_year {
    position: relative;
    left: 0px;
    top: 8px;
}
select.form-control.ex_small.pull-right {
    margin-top: 33px;
    position: relative;
    left: 40px;
}
.form {
    position: absolute;
    top: 389px;
    left: 780px;
}

.s-header{
     text-align:center;
     font-size: 29px;
}
.btn-block {
    background: #ff1493 !important;
    position: relative;
    top: 25px;
}
.btn-block:hover {
    background: #00bfff !important;
    color:white;
}
.more-button {
    width: 110px;
    height: 36px;
    background: #ff1493 !important;
    color: white;
    border: none;
    border-radius: 3px;
    margin-left: 20px;
    position:relative;
    top: -109px;
    left: -5px;
}
.more-button:hover {
    background: #00bfff !important;
}

@media (min-width: 950px){
.col-lg-4 {
    width: 66.333333%% !important;
    font-size: 9px;
    position: relative;
    top: 12px;
}
}





@media (max-width: 1200px){
button.more-button {
    float: left;
    top: -38px;
}
}

@media (min-width: 1200px)
.col-lg-4 {
    width: 53.333333% !important;
}

@media (max-width: 1200px){
.carousel .papa-container {
    height: 533px;
}
img.logoimg {
    width: 92px;
    position: relative;
    top: 10px;
    left: -57px;
}

.col-lg-4 {
    width: 66.333333%% !important;
    font-size: 9px;
}
select.form-control {
    font-size: 9px;
}
select option {
    font-size: 9px;
}
.form-control {
    width: 80% !important;
}
select.form-control.ex_small.pull-right {
    position: relative;
    left: -23px;
    
}
.form-group.religon_spacer {
    position: relative;
    top: -60px;
    margin-bottom: 35px;
}
.form-group.search-com.fee {
    position: relative;
    top: 0px;
}
.searchinclude {
    width: 670px;
    margin: 0 auto;
}
.form-group {
    width: 49%;
    float: left;
}
.form-group.search-com.fee {
    margin: 114px 0px;
}
.form-group.search-com.fee {
    position: relative;
    top: -132px;
}
.form-group.seach-country.fee {
    position: relative;
    top: -365px;
    left: -1px;
}
.form-group.extand_largeer {
    position: relative;
    left: -130px;
    top: -305px;
    font-size: 11px;
    margin: 42px 0px;
    margin-bottom: 18px;
}
input[type="submit"] {
    margin-top: 17px;
    width: 80px;
    height: 35px;
    border: none;
    background: #ff1493;
    color: white;
    border-radius: 3px;
    position: relative;
    left: 16px;
    top: -316px;
}
span.agg_year {
    position: relative;
    left: 0px;
}
.form {
     position: relative; 
     top: 0px; 
     left: 0px; 
}

.main-form {
    background: black !important;
    overflow: hidden;
    padding: 31px;
    padding-right: 0px;
    color: white;
    font-family: arial;
    word-spacing: 4px;
    width: 100%;
    margin: 0 auto;
    position: relative;
    top: 4px;
    height: 500px;
}

.searchinclude {
    width: 322px;
    margin: 0 auto;
}
.ser_agile {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.stats-agileits {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.testimonials {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.footer-top {
    padding: 3em 0;
    position: relative;
    top: 187px;
}
.copy-right {
    padding: 1em 0;
    background: #030303;
    position: relative;
    top: 187px;
}
.s-header{
     text-align:center;
     font-size: 12px;
}
hr {
    position: relative;
    top: -11px;
}
}



@media (max-width : 950px) {
img.img-slider {
   /* height: 435px !important;*/
    width: 100% !important;
}
.col-lg-8 {
    margin: 10px 0px;
}
.col-lg-4 {
    width: 66.333333%% !important;
    font-size: 9px;
}
select.form-control {
    font-size: 9px;
}
select option {
    font-size: 9px;
}
.form-control {
    width: 80% !important;
}
select.form-control.ex_small.pull-right {
    position: relative;
    left: -23px;
    
}
.form-group.religon_spacer {
    position: relative;
    top: -60px;
    margin-bottom: 35px;
}
.form-group.search-com.fee {
    position: relative;
    top: 0px;
}
.searchinclude {
    width: 670px;
    margin: 0 auto;
}
.form-group {
    width: 49%;
    float: left;
}
.form-group.search-com.fee {
    margin: 114px 0px;
}
.form-group.search-com.fee {
    position: relative;
    top: -132px;
}
.form-group.seach-country.fee {
    position: relative;
    top: -365px;
    left: -1px;
}
.form-group.extand_largeer {
    position: relative;
    left: -130px;
    top: -305px;
    font-size: 11px;
    margin: 42px 0px;
    margin-bottom: 18px;
}
input[type="submit"] {
    margin-top: 17px;
    width: 80px;
    height: 35px;
    border: none;
    background: #ff1493;
    color: white;
    border-radius: 3px;
    position: relative;
    left: 16px;
    top: -316px;
}
span.agg_year {
    position: relative;
    left: 0px;
}
.form {
     position: relative; 
     top: 0px; 
     left: 0px; 
}
/*
.main-form {
    background: black !important;
    overflow: hidden;
    padding: 31px;
    padding-right: 0px;
    color: white;
    font-family: arial;
    word-spacing: 4px;
    width: 100%;
    margin: 0 auto;
    position: relative;
    top: 139px;
}
*/
.searchinclude {
    width: 322px;
    margin: 0 auto;
}
.ser_agile {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.stats-agileits {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.testimonials {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.footer-top {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.copy-right {
    padding: 1em 0;
    background: #030303;
    position: relative;
    top: 30px;
}
.s-header{
     text-align:center;
     font-size: 12px;
}
hr {
    position: relative;
    top: -11px;
}
}


@media (max-width: 1077px){
img.logoimg {
    width: 92px;
    position: relative;
    top: 10px;
    left: -22px;
}
}

@media (max-width:450px){
/* .main-form {
    background: rgba(2, 1, 3, 0.85)!important;
    width: 313px;
    margin: 0 auto;
    position: relative;
    top: 215px;
    z-index: 99;
    height: 506px;
    left: 0px;
} */
.ser_agile {
    padding: 3em 0;
    position: relative;
    top: 13px;
}
.stats-agileits {
    padding: 3em 0;
    position: relative;
    top: 32px;
}
.testimonials {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.footer-top {
    padding: 3em 0;
    position: relative;
    top: 30px;
}
.copy-right {
    padding: 1em 0;
    background: #030303;
    position: relative;
    top: 30px;
}
}
img.img-slider {
    height: auto;
    width: 100%;
}
.carousel img {
    position: absolute;
    height: auto;
    width: 100%;
}
.carousel .papa-container {
    height: 587px;
}

@media (max-width: 1198px){
button.more-button {
    float: left;
    top: -38px;
}
}

@media (max-width: 1150px){
    .carousel .papa-container {
    height: 545px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}
@media (max-width: 1020px){
    .carousel .papa-container {
    height: 510px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 935px){
    .carousel .papa-container {
    height: 448px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}
@media (max-width: 963px){
button.more-button {
    float: left;
    top: 30px;
}
}
@media (max-width: 900px){
    .carousel .papa-container {
    height: 428px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 865px){
    .carousel .papa-container {
    height: 418px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 828px){
    .carousel .papa-container {
    height: 400px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}
@media (max-width: 817px){
img.logoimg {
    width: 65px;
    position: relative;
    top: 10px;
    left: 20px;
}
}

@media (max-width: 806px){
    .carousel .papa-container {
    height: 390px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
img.logoimg {
    width: 65px;
    position: relative;
    top: 10px;
    left: 20px;
}
}
@media (max-width: 785px){
    .carousel .papa-container {
    height: 380px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 765px){
    .carousel .papa-container {
    height: 372px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 748px){
    .carousel .papa-container {
    height: 368px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 722px){
    .carousel .papa-container {
    height: 350px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 694px){
    .carousel .papa-container {
    height: 335px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 694px){
    .carousel .papa-container {
    height: 335px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 675px){
    .carousel .papa-container {
    height: 320px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 650px){
    .carousel .papa-container {
    height: 305px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 622px){
    .carousel .papa-container {
    height: 290px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 605px){
    .carousel .papa-container {
    height: 275px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 570px){
    .carousel .papa-container {
    height: 260px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 553px){
    .carousel .papa-container {
    height: 245px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 535px){
    .carousel .papa-container {
    height: 230px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 515px){
    .carousel .papa-container {
    height: 215px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 488px){
    .carousel .papa-container {
    height: 200px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 463px){
    .carousel .papa-container {
    height: 185px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 440px){
    .carousel .papa-container {
    height: 170px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
.main-form {
    background: black !important;
    overflow: hidden;
    padding: 31px;
    padding-right: 0px;
    color: white;
    font-family: arial;
    word-spacing: 4px;
    width: 100%;
    margin: 0 auto;
    position: relative;
    top: 14px !important;
    height: 500px !important;
}
}

@media (max-width: 410px){
    .carousel .papa-container {
    height: 155px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}

@media (max-width: 391px){
    .carousel .papa-container {
    height: 140px !important;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}


@media (max-width: 374px){
    .carousel .papa-container {
    height: 155px;
    position: relative;
    top: -21px;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}
@media (max-width: 350px){
    .carousel .papa-container {
    height: 150px;
    position: relative;
    top: -21px;
}
.carousel img {
    position:absolute;
    left:0;
    right:50px;
    height: auto;
    width: 100%;
}
}


.nbs-flexisel-inner{
    width:100% !important;
}

.testa{
    position:relative;right:10px;top:-10px;
}
.testb{
    position:relative;top:30px;right:55px;
}
.testc{
    position:relative;right:10px;
}


@media (max-width: 995px){
.testb{
    position:relative;top:30px;right:20px;
}
}
</style>




<script type="text/javascript">jssor_1_slider_init();</script>

<!-- //web-fonts -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  











<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bee5c6070ff5a5a3a726c82/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    






	<!-- banner -->
	<div id="home" class="w3ls-banner"> 

		<!-- banner-text -->
		<div class="slider">
		    



   
        <main class="present-carousel">
            <section class="carousel">
<?    
$get_homepageimg = getdata("SELECT title,link,description from tbl_homepage_images WHERE currentstatus=0 AND pagenm=1");
?>
                <div class="papa-container">
                    
<?
    $i=1; 
    while($get_rs = mysqli_fetch_array($get_homepageimg)){
        $title = $get_rs[0];
		$link = $get_rs[1];
		$description =$get_rs[2];
    ?>
    
                <? if ($title != "") { ?>
                    <div class="papa-item fourth-color"><img src='<?= $sitepath ?>uploadfiles/site_<? echo $sitethemefolder ?>/<?=$title ?>' /></div>
                <? } ?>
                    
    <? 
    $i++;
    } ?>
                </div>
            </section>
        </main>

			<div class="clearfix"> </div>
			

			
	
			
			
			
		 <?php // include('searchinclude.php') ?>	
			
	<div class="form">
    <div class="main-form">
     
     
     
     
<? 
$enable_nri_search='';
if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	 $curruserid = $_SESSION[$session_name_initital."memberuserid"]; 
}
?>
<script type="text/javascript" language="javascript">
	function change_cast(val,type)
	{		
		if(val!="")
		{
			
			if(document.getElementById('cast').style.display=='inline' && type==1)
			{
				document.getElementById('cast').style.display = 'none';
			}
			
	      <? if($enable_quick_search_long_2=='Y') {?>		
			
			if(document.getElementById('subcast_dr').style.display=='inline' && type==2)
			{
				document.getElementById('subcast_dr').style.display = 'none';
			}
			<? }?>
			
			if(type==1)
			{
				document.getElementById('indicator').style.display = 'inline';
				document.getElementById('casts').style.display = 'none';
			}
			if(type==2)
			{
				document.getElementById('indicator1').style.display = 'inline';
				document.getElementById('subcast_drs').style.display = 'none';		
			}
			
			$.post("<?=$sitepath?>search_cast.php",
				{religionid:val,type:type,
				 cat:"topsearch"},
				function (data)
				{					
						var str = data;
						if(str!="" && type==1)
						{
							document.getElementById('indicator').style.display = 'none';
							document.getElementById('cast').style.display = 'inline';
							document.getElementById('cast').innerHTML = str;
						}
						if(str!="" && type==2)
						{
							document.getElementById('indicator1').style.display = 'none';
							document.getElementById('subcast_dr').style.display = 'inline';
							document.getElementById('subcast_dr').innerHTML = str;
						}
				}
			)
		}
	}
	
	function setvisiblity1(){

    if (document.getElementById("divparameter1").style.display =="block"){
        document.getElementById("divparameter1").style.display ='none';
    }else
        document.getElementById("divparameter1").style.display ='block';
}
</script>
<div class="searchinclude">

<h4 class="s-header"><?=$searchead?></h4><hr>


<div class="text_header">
<div class="searchincludeimage"></div>
<div class="profileidSearch">
          <a href="#" onclick="setvisiblity1()"><?=$pindex_profileidsearch?></a>
          
          </div>
          <div id="divparameter1" class="pops_profiled" style="display:none;">
		<?php include("searchbyprofileid.php") ?>
		</div> 
        <form name='searchpartner' method='POST' class="" action='<?= $sitepath ?>searchresultque.php'>
<nice>

<div class="form-group">
	
<label class="col-lg-4"><?= $searchlookingfor ?>: </label>
<?
if(isset($_SESSION[$session_name_initital . "searchincludelookingfor"]) && 
$_SESSION[$session_name_initital . "searchincludelookingfor"]!='')
{
	$search_sel_lookingfor=$_SESSION[$session_name_initital . "searchincludelookingfor"];
}else{$search_sel_lookingfor='';}
?>
<div class="col-lg-8"> 
	<select name='LookingFor' class="form-control   small_lengths">
		<? fillcombo(lookingfor_query($curruserid),$search_sel_lookingfor,""); ?>
	</select>
 </div>
 </div>
 <div class="form-group  ">
<label  class="col-lg-4"><?= $searchminage ?> :</label>
<div class="col-lg-8 yers_city"> 


	<?
    if(isset($_SESSION[$session_name_initital . 'searchincludeminage']) 
    && $_SESSION[$session_name_initital . 'searchincludeminage']!='')
    {
        $search_sel_minage=$_SESSION[$session_name_initital . 'searchincludeminage'];
    }else{$search_sel_minage='';}
    ?>
	<select name='MinAge' class="form-control  ex_small">
		<?  fillage($search_sel_minage) ?>
   </select>  


	<span class="agg_year"> <?= $searchmaxage ?> </span> 

	<?
    if(isset($_SESSION[$session_name_initital . 'searchincludemaxage']) 
    && $_SESSION[$session_name_initital . 'searchincludemaxage']!='')
    {
        $search_sel_maxage=$_SESSION[$session_name_initital . 'searchincludemaxage'];
    }else{$search_sel_maxage='';}
    ?>
	<select name='MaxAge' class="form-control  ex_small pull-right ">
	<? fillage($search_sel_maxage) ?>
    </select>
	
	
</div>
</div>
 <div class="form-group   religon_spacer">    
<label class="col-lg-4"><?= $default_searchgrid_design_religion?>  : </label>	
    <div class="col-lg-8"> 
    <?
    if(isset($_SESSION[$session_name_initital . "searchincludereligian"]) && $_SESSION[$session_name_initital . "searchincludereligian"]!='')
	{
		$search_sel_religian=$_SESSION[$session_name_initital . "searchincludereligian"];
	}else{$search_sel_religian='';}
	
	if(isset($_SESSION[$session_name_initital . "searchincludecast"]) && $_SESSION[$session_name_initital . "searchincludecast"]!='')
	{
		$search_sel_cast=$_SESSION[$session_name_initital . "searchincludecast"];
	}else{$search_sel_cast='';}
	

	?>
    <select name="cmbreligion" class="form-control searchincludecountry" onchange="change_cast(this.value,1)">
		<? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$search_sel_religian,$advancesearchcountrycombotitle) ?></select>
        </div>
        </div>
         <!-----------cast start------------->
<? if($enable_quick_search_long=='Y') {?>
<img src="uploadfiles/indicator.gif"/ id="indicator" style="display:none;">
 <div class="form-group" id="casts"> 
	<label class="col-lg-4"><?= $default_searchgrid_design_caste?> : </label>
    <div class="col-lg-8 default_grids1_actions"> 
	<select name="cmbcast" class="form-control searchincludecountry default_grids1" id="cmbcast" 
    <? if($enable_quick_search_long_2=='Y') {?>onchange="change_cast(this.value,2)" <? }?>>
	<? echo fillcombo("select id,title from tbldatingcastmaster where currentstatus=0 and religianid=".$search_sel_religian." and languageid=$sitelanguageid order by title",$search_sel_cast,$advancesearchcountrycombotitle); ?>
	</select>
</div>
</div>
<div id="cast" class="form-group   silsila_position" style="display:none;"></div>
<? } ?>
		   <!-----------cast end------------->
           
<? if($enable_quick_search_long_2=='Y') {?>
			  <!-----------subcast start------------->
<img src="uploadfiles/indicator.gif"/ id="indicator1" style="display:none;">
<div class="form-group" id="subcast_drs"> 
<?

	if(isset($_SESSION[$session_name_initital . "searchincludecmbsubcast"]) && $_SESSION[$session_name_initital . "searchincludecmbsubcast"]!='')
	{
		$search_sel_subcast=$_SESSION[$session_name_initital . "searchincludecmbsubcast"];
	}else{$search_sel_subcast='';}

?>
	<label class="col-lg-4"><?=$default_displayprofile_subcast?> : </label>
    <div class="col-lg-8 default_grids1_actions"> 
	<select name="cmbsubcast" class="form-control searchincludecountry default_grids1" id="cmbsubcast">
	<? echo fillcombo("select id,title from tbldatingsubcastmaster where currentstatus=0 and castid=".$search_sel_subcast." and languageid=$sitelanguageid order by title",$search_sel_subcast,$advancesearchcountrycombotitle); ?>
	</select>
</div>
</div>
<div id="subcast_dr" class="form-group   silsila_position" style="display:none;"></div>
<? } ?>
			<!-----------subcast end------------->
		
		
		<?	if($enable_quick_search_long=='Y') { ?>
         <div class="form-group search-com fee">
		<label  class="col-lg-4"><?=$default_searchgrid_design_community ?>  : </label>	
        <div class="col-lg-8"> 
        <?
		if(isset($_SESSION[$session_name_initital . "searchincludecommunity"]) && $_SESSION[$session_name_initital . "searchincludecommunity"]!='')
	{
		$search_sel_community=$_SESSION[$session_name_initital . "searchincludecommunity"];
	}else{$search_sel_community='';}
        
		?>
        <select name="cmbcommunity" class="form-control searchincludecountry">
		<? fillcombo("select id,title from tbldatingmothertonguemaster where currentstatus =0 and languageid=$sitelanguageid order by title",$search_sel_community,$advancesearchcountrycombotitle) ?>
		</select>
        </div>
        </div>
<?
	
 }
 ?>

<?

if($enable_nri_search == 'Y') { ?>
<div class="form-group  ">
<label class="col-lg-4"><?=$searchNRI?>:</label>
<div class="col-lg-8"> 
<?
	if(isset($_SESSION[$session_name_initital . "searchincludenri"]) && $_SESSION[$session_name_initital . "searchincludenri"]!='')
	{
		$search_sel_nri=$_SESSION[$session_name_initital . "searchincludenri"];
	}else{$search_sel_nri='';}

?>
<select name="nri" id="nri" class="form-control">
<option value="0.0">select</option>
<option value="113" <?php if (isset($search_sel_nri) =='113'){ ?> selected="selected" <?php } ?>>India</option>
<option value="nri" <?php if (isset($search_sel_nri) =='nri'){ ?> selected="selected" <?php } ?>><?=$searchNRI?></option>
</select>
</div>
</div>
<?php } else {
 ?>
 <div class="form-group seach-country fee">
<label class="col-lg-4"><?= $searchCountry ?> : </label>	
<div class="col-lg-8 grids_srchfs_fiver" >
<?
	if(isset($_SESSION[$session_name_initital . "searchincludecountry"]) && $_SESSION[$session_name_initital . "searchincludecountry"]!='')
	{
		$search_sel_country=$_SESSION[$session_name_initital . "searchincludecountry"];
	}else{$search_sel_country='';}

?>
<select name='Country' class="form-control searchincludecountry grids_srchfs">	
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0  and languageid=$sitelanguageid  order by title ",$search_sel_country,"$searchincludecountrycombotitle"); ?>
</select>
</div>
</div>
  
<?php /*?><div><input type="image" src="<?=$sitepath?>uploadfiles/search_btn.png" name="submit"  style="margin-top:-19px; margin-left:99px; float:right;"/></div><?php */?>
</nice>
<div class="button_eftdr">

<? } if(isset($_SESSION[$session_name_initital . "searchincludewith_photo"]) && $_SESSION[$session_name_initital . "searchincludewith_photo"]=='checked') {
	$wphchk = 'checked="checked"';	
} else {
	$wphchk = "";
}	
?>
 <div class="form-group   extand_largeer">
 
    
	<input type="checkbox" name="with_photo" class="flefterput" value="with" <?=$wphchk?>/>  
    <span><?= $default_searchgrid_design_withphoto?></span>
    
      <a href='advancesearch.php'><?= $searchincludeadvsearch ?></a>

   </div>

 
    <i class="text-center"><input type="submit" name='Search' value='<?= $searchsubmit ?>'></i>
    
<!--was cut [class="btn"] -->
  
  
    </div>
</div>
</form>
</div>
</div>
</div>

			



	</div>
	</div>
<!--banner Slider starts Here-->
		 
 
	</div>	
	<!-- //banner --> 
			<!-- header -->
		<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="index.php">
					<img class="logoimg" src="<?= $sitepath ?>uploadfiles/site_<?=$sitethemefolder?>/<?= findsettingvalue("Logo_filenm") ?>" alt="" border="0" />
						</a></h1>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right">
						    <? include("navigation.php");?>
						  
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<!--
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
							<li><a class="hvr-sweep-to-right" href="index.html">HOME</a></li>
							<li><a class="hvr-sweep-to-right" href="about.html">ABOUT US</a></li>
							<li><a class="hvr-sweep-to-right" href="events.html">MEMBERSHIP</a></li>
							<li><a class="hvr-sweep-to-right" href="events.html">FAQ S</a></li>
							<li><a class="hvr-sweep-to-right" href="events.html">CONTACT US/FEEDBACK</a></li>
							<li><a class="hvr-sweep-to-right" href="events.html">DASHBOARD</a></li>
							<li><a class="hvr-sweep-to-right" href="gallery.html">SEARCH</a></li>
							<li><a class="hvr-sweep-to-right" href="contact.html">LOGOUT</a></li>
							-->
							
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	
		<!-- //header -->
		<!-- ser_agile -->
		<div class="ser_agile">
			<div class="container">
			<h2 class="heading-agileinfo"><?=$dashboardwelcome?><span></span></h2>

<?    
$get_homepageimg = getdata("SELECT title,link,description from tbl_homepage_images WHERE currentstatus=0 AND pagenm=14 order by id desc limit 1");
    while($get_rs = mysqli_fetch_array($get_homepageimg)){	
	?>
		<div class="row">	
				<div class="col-sm-6">
					<p style="float: left;"><?=$get_rs[2]?></p>					
				</div>
				<div class="col-sm-6">
				    <? $banner=get_homepage_images(29)?>
				    <img class="img-responsive" src="<?= $sitepath ?>uploadfiles/site_<?=$sitethemefolder?>/<?=$get_rs[0]?>"> 
					<!--<img class="img-responsive" src="images/g8.jpg"> -->
				</div>
				<a href="<?=$get_rs[1]?>"><button class="more-button">See More</button></a>
			</div>
			<? } ?>
			</div>
		</div>


<div class="ser_agile">
			<div class="container">
			<h2 class="heading-agileinfo">Join Us<span>Events is a professionally managed Event</span></h2>
			
			<div class="row">
			    <div class="col-sm-6">
			     <img class="img-responsive" src="<?=$siteuploadfilepath_new?><?=$banner[0]?>" />
			    </div>
				<div class="col-sm-6">
				    <br><br>
					<p style="float: left;">WELCOME Hello! Welcome to our world. You are here for a specific purpose right? And yeah.. we know your purpose. We will help you to meet your desired happiness to take your life to the next level. We will help to make the most hard and valuable decision of your life. From here a new story begins. And we feel very proud to be a part of your story! We will be always there for you.</p>
			<a href="membership.php"><button type="button" class="btn btn-outline-primary btn-lg btn-block">Join Us </button></a>
				</div>
				
			</div>
			
			

			</div>
</div>






	<!-- //ser_agile -->
<!-- Stats -->
	<div class="stats-agileits">
	<div class="container">
		<h3 class="heading-agileinfo white-w3ls">HOW IT WORKS<span class="black-w3ls"></span></h3>
	</div>
		<div class="stats-info agileits w3layouts">
		<div class="container">
			<div class="col-md-3 col-sm-3 agileits w3layouts stats-grid stats-grid-1">
				<img style="width: 38px;" src="images/flow1.png">
				<div class="stat-info-w3ls">
					<h4 style="position: relative;
    top: 17px;" class="agileits w3layouts">FREE SIGN UP</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 agileits w3layouts stats-grid stats-grid-1">
				<i class="fa fa-user" aria-hidden="true"></i>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">UPDATE PROFILE & PICTURES</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 agileits w3layouts stats-grid stats-grid-2">
				<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">SEARCH, SHORTLIST & CONTACT</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 stats-grid agileits w3layouts stats-grid-3">
			<img style="width: 38px;" src="images/flow4.png">
				<div class="stat-info-w3ls">
					<h4 style="position: relative;
    top: 17px;" class="agileits w3layouts">COMMUNICATE & MOVE AHEAD</h4>
				</div>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //Stats -->

	<!-- showcase_w3layouts -->	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	<!--testimonials-->
<div class="testimonials">
	<div class="container">
		<h3 class="heading-agileinfo"><?= $homefeaturedmember ?><span>Events is a professionally managed Event</span></h3>
		<div class="flex-slider">
			<ul id="flexiselDemo1">	

        <?
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=62;
        $sql = "select * from tbldatingusermaster where packageid='$id'";
        $result = $db->query($sql);
        
        if($result){
        while($data = $result->fetch_object()){
        ?>

				<li>
					<div class="laptop">
						<div class="col-md-8 col-sm-12 team-right">
							<p align="right">
							<a href=""></a><? echo $data->profile_code; ?></p>
			

<? if($data->imagenm == NULL){ ?>

<a style="float:right;color:#ff0a80 !important;" href=''>
<i>
<br><br>
<b class="testb">
<? 
$name = $data->name;
$name1 = substr($name,0,3);
echo $name1.$data->profile_code; 
?></b><br>
<b style="position:relative;right:20px;"><? echo "From ".$data->address; ?></b>
<img style="width:150px;border-radius:50%;" src="https://cdn.wccftech.com/images/default_avatar.png" />
<p></p>
</i>
</a>

<? } else { ?>
							<a style="float:right;color:#ff0a80 !important;" href=''>
							<i>
							<br><br>
							<b class="testc">
							<? 
							$name = $data->name;
							$name1 = substr($name,0,3);
							echo $name1.$data->profile_code; 
							?></b><br>
							<b class="testa"><? echo "From ".$data->address; ?></b>
							<img style="width:150px;border-radius:50%;" src="uploadfiles/<? echo $data->imagenm; ?>" />
							<p></p>
							</i>
							</a>
<? } ?>
						</span>

						</div>

                    <div style="width=83px;" class="col-md-4 team-left">
                        
						<div class="clearfix"></div>
					</div>
				</li>
		<? } } ?>
		
		
		
		
			</ul>
			
		</div>


	</div>
</div>
</div>
<!--//testimonials-->






<!-- footer-top -->	
	<div class="footer-top">
		<div class="container">
		    <div class="row">
			<div class="col-sm-4 foot-left">
				<h3><?=findsettingvalue("notice_title"); ?></h3>
			
				<p><?=findsettingvalue("notice_desc1"); ?></p>
			</div>
			<div class="col-sm-4 foot-left">
					<h3>Get In Touch</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
				
						<div class="contact-btm">
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							<p><?=findsettingvalue("CompanyName"); ?>
<?=findsettingvalue("CompanyAddress"); ?></p>
						</div>
						<div class="contact-btm">
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<p><?=findsettingvalue("HeaderPhoneno"); ?></p>
						<div class="contact-btm">
						</div>
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
							<p><a href="mailto:example@email.com"><?=findsettingvalue("AdminMail"); ?></a></p>
						</div>
						<div class="clearfix"></div>

			</div>
			<div class="col-sm-4 foot-left">
				<h3>Our Links</h3>
				<ul class="home">
					<li><? echo getcmslinks(3).'<br/>'; ?></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			</div>
			
			
				<div class="clearfix"></div>
		</div>
	</div>
<!-- /footer-top -->							

<!-- footer -->
			<div class="copy-right">
				<div class="container">
				<div class="col-md-6 col-sm-6 col-xs-6 copy-right-grids">
						<div class="copy-left">
						<p>&copy; 2018 Events. All rights reserved | Design by <a href="http://Paroshi.com/">Paroshi.Com</a></p>
						</div>
					</div>
				<div class="col-md-6 col-sm-6 col-xs-6 top-middle">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-vimeo"></i></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					</div>
			</div>
			
<!-- //footer -->
<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Events
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="images/g8.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>



<!-- //bootstrap-modal-pop-up --> 
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="js/jquery-2.2.3.min.js"></script> 
	
<!-- skills -->


<!-- slider -->



    <script src="js/papacarousel.min.umd.js"></script>
    <script>
        new Papacarousel.PapaFascade().setProgressBar(true).setButtons(true).getPapa();
    </script>

<!-- slider -->



						<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
			<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>

<!-- start-smoth-scrolling -->
<!-- OnScroll-Number-Increase-JavaScript -->
	<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //OnScroll-Number-Increase-JavaScript -->
<!--flexiselDemo1 -->
 <script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 2,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 1
										},
										tablet: { 
											changePoint:991,
											visibleItems: 1
										}
									}
								});
								
							});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!--//flexiselDemo1 -->

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>