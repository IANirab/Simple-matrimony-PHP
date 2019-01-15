<?
ob_start();
require_once('commonfile.php');
$home_page_main_image = findsettingvalue("Home_page_main_image_nm");

?>
<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Paroshi.com &mdash; Finding Happiness</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap2.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style2.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 0,
              $SlideDuration: 5000,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 240,
              $Align: 0
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .shape{
        	display: none;
        }
        #sh1:hover .shape{
            display:block;
        }
        
    #gtco-header .form-wrap .tab-content {
    z-index: 10;
    position: relative;
    clear: both;
    background: rgba(0, 0, 0, 0.66) !important;
    padding: 30px;
    color: white !important;
}
.form-control {
    color: white !important;
}
.form-control option {
    color: black !important;
}
.gtco-nav ul {
    padding: 0;
    margin: 14px 0 0 0;
}
.btn-primary {
    background: #ff1493;
    color: #fff;
    border: 2px solid #ff1493 !important;
}
.btn-primary:hover {
    background: #0bbfff !important;
    color: #fff;
    border: 2px solid #0bbfff !important;
}
#gtco-header .form-wrap {
    border-top: 10px solid #ff1493 !important;
}
#gtco-features {
    background: #00bfff !important;
}
#gtco-features .feature-center .icon {
    background: #0bbfff !important;
}
#gtco-counter .counter {
    color: #0bbfff !important;
}
#gtco-subscribe {
    background: #0bbffF !important;
}
#gtco-subscribe .btn {
    background: #ff1493 !important;
}
#gtco-subscribe .btn:hover {
    background: #0bbfff !important;
}
a {
    color: #0bbfff !important;
}
</style>


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

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-2 col-xs-12">
					<div id="gtco-logo">
					    
					    <a class="navbar-brand" href="index.php">
					<img style="width:115px" class="logoimg" src="<?= $sitepath ?>uploadfiles/site_<?=$sitethemefolder?>/<?= findsettingvalue("Logo_filenm") ?>" alt="" border="0" />
						</a>
						<a href=""></a>
						<!--<a href="index.html">Traveler <em>.</em></a>-->
					</div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
					    
					    <? include("navigation.php");?>
					    
						<!--<li><a href="destination.html">Destination</a></li>-->
						<!--<li class="has-dropdown">-->
						<!--	<a href="#">Travel</a>-->
						<!--	<ul class="dropdown">-->
						<!--		<li><a href="#">Europe</a></li>-->
						<!--		<li><a href="#">Asia</a></li>-->
						<!--		<li><a href="#">America</a></li>-->
						<!--		<li><a href="#">Canada</a></li>-->
						<!--	</ul>-->
						<!--</li>-->
						<!--<li><a href="pricing.html">Pricing</a></li>-->
						<!--<li><a href="contact.html">Contact</a></li>
						it's default header image link
						images/img_bg_2
						
						-->
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(home-left.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
					    
						<div class="col-md-6 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1></h1>	
						</div>	    
					    
					    
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
						
						
						<div class="col-md-6 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
								<div class="tab-content">
									<div class="tab-content-inner active" data-content="signup">
											<h3 style="color:#ddd;">Search Here</h3>
											
							<form name="searchpartner" method='POST' class="" action='<?= $sitepath ?>searchresultque.php'>
							    
							<div class="row form-group">
<?
if(isset($_SESSION[$session_name_initital . "searchincludelookingfor"]) && 
$_SESSION[$session_name_initital . "searchincludelookingfor"]!='')
{
	$search_sel_lookingfor=$_SESSION[$session_name_initital . "searchincludelookingfor"];
}else{$search_sel_lookingfor='';}
?>
								<div class="col-md-4">
								<label for="activities">Looking For</label>
						<select name='LookingFor' id="activities" class="form-control">
							<? fillcombo(lookingfor_query($curruserid),$search_sel_lookingfor,""); ?>
						</select>
							</div>
							
	<?
    if(isset($_SESSION[$session_name_initital . 'searchincludeminage']) 
    && $_SESSION[$session_name_initital . 'searchincludeminage']!='')
    {
        $search_sel_minage=$_SESSION[$session_name_initital . 'searchincludeminage'];
    }else{$search_sel_minage='';}
    ?>
						<div class="col-md-4">
							<label for="activities">Age From</label>
						  <select name='MinAge' id="activities" class="form-control">
								<?  fillage($search_sel_minage) ?>
						</select>
							</div>
							
	<?
    if(isset($_SESSION[$session_name_initital . 'searchincludemaxage']) 
    && $_SESSION[$session_name_initital . 'searchincludemaxage']!='')
    {
        $search_sel_maxage=$_SESSION[$session_name_initital . 'searchincludemaxage'];
    }else{$search_sel_maxage='';}
    ?>
							<div class="col-md-4">
								<label for="activities">Age To</label>
						<select name='MaxAge' id="activities" class="form-control">
								<? fillage($search_sel_maxage) ?>
						</select>
							</div>
					    </div>
							
	
							
					<div class="row form-group">
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
							<div class="col-md-4">
								<label for="activities">Religion</label>
						<select name="cmbreligion" id="activities" class="form-control" onchange="change_cast(this.value,1)">
									<? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$search_sel_religian,$advancesearchcountrycombotitle) ?>
						</select>
							</div>
						   <?	if($enable_quick_search_long=='Y') { ?>
								<div class="col-md-4">
								<label for="activities">Comiunity</label>
			<?
		if(isset($_SESSION[$session_name_initital . "searchincludecommunity"]) && $_SESSION[$session_name_initital . "searchincludecommunity"]!='')
	{
		$search_sel_community=$_SESSION[$session_name_initital . "searchincludecommunity"];
	}else{$search_sel_community='';}
        
		?>
						<select name="cmbcommunity" id="activities" class="form-control">
									<? fillcombo("select id,title from tbldatingmothertonguemaster where currentstatus =0 and languageid=$sitelanguageid order by title",$search_sel_community,$advancesearchcountrycombotitle) ?>
						</select>
		<?
	
 }
 ?>
							</div>

						<? if($enable_quick_search_long=='Y') {?>
							<div class="col-md-4">
								<label for="activities">Caste</label>
					<select name="cmbcast" id="cmbcast" class="form-control" 
			<? if($enable_quick_search_long_2=='Y') {?>onchange="change_cast(this.value,2)" <? }?>>
	<? echo fillcombo("select id,title from tbldatingcastmaster where currentstatus=0 and religianid=".$search_sel_religian." and languageid=$sitelanguageid order by title",$search_sel_cast,$advancesearchcountrycombotitle); ?>
						</select>
							</div>
				<? } ?>
					    </div>
							
							
						<div class="row form-group">
					<?php if($enable_nri_search == 'Y') { ?>
								<div class="col-md-4">
								<label for="activities">Country</label>
<?
	if(isset($_SESSION[$session_name_initital . "searchincludenri"]) && $_SESSION[$session_name_initital . "searchincludenri"]!='')
	{
		$search_sel_nri=$_SESSION[$session_name_initital . "searchincludenri"];
	}else{$search_sel_nri='';}

?>
			<select name="nri" id="nri" class="form-control">
			    <option value="0.0">select country</option>
					<option value="113" <?php if (isset($search_sel_nri) =='113'){ ?> selected="selected" <?php } ?>>India</option>
<option value="nri" <?php if (isset($search_sel_nri) =='nri'){ ?> selected="selected" <?php } ?>><?=$searchNRI?></option>
			</select>
							</div>
					<?php } else { ?>
					
					<div class="col-md-4">
						<label for="activities"><?= $searchCountry ?></label>
<?
	if(isset($_SESSION[$session_name_initital . "searchincludecountry"]) && $_SESSION[$session_name_initital . "searchincludecountry"]!='')
	{
		$search_sel_country=$_SESSION[$session_name_initital . "searchincludecountry"];
	}else{$search_sel_country='';}

?>
						<select name='Country' id="activities" class="form-control">
							<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0  and languageid=$sitelanguageid  order by title ",$search_sel_country,"$searchincludecountrycombotitle"); ?>
						</select>
						</div>
							
	<? } if(isset($_SESSION[$session_name_initital . "searchincludewith_photo"]) && $_SESSION[$session_name_initital . "searchincludewith_photo"]=='checked') {
	$wphchk = 'checked="checked"';	
} else {
	$wphchk = "";
}	
?>

<? if($enable_quick_search_long_2=='Y') {?>
							<div class="col-md-4">
    <?

	if(isset($_SESSION[$session_name_initital . "searchincludecmbsubcast"]) && $_SESSION[$session_name_initital . "searchincludecmbsubcast"]!='')
	{
		$search_sel_subcast=$_SESSION[$session_name_initital . "searchincludecmbsubcast"];
	}else{$search_sel_subcast='';}

?>							
		<label for="activities"><?=$default_displayprofile_subcast?></label>
					<select name="cmbsubcast" id="cmbsubcast" class="form-control" 
		<? echo fillcombo("select id,title from tbldatingsubcastmaster where currentstatus=0 and castid=".$search_sel_subcast." and languageid=$sitelanguageid order by title",$search_sel_subcast,$advancesearchcountrycombotitle); ?>
						</select>
							</div>
<? } ?>

						<div class="col-md-4">
						  <br>
						 <input type="checkbox" name="with_photo" class="flefterput" value="with" <?=$wphchk?>/>  
    <span><?= $default_searchgrid_design_withphoto?></span>
    
      <a href='advancesearch.php'><?= $searchincludeadvsearch ?></a>
						</div>
						
					    </div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary btn-block" value="Search">
													</div>
												</div>
											</form>	
										</div>
									</div>
								</div>
							</div>
						</div>
					    
					    

					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Best Matrimonial Site</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			
	<?    
$get_homepageimg = getdata("SELECT title,link,description from tbl_homepage_images WHERE currentstatus=0 AND pagenm=14 order by id desc limit 1");
    while($get_rs = mysqli_fetch_array($get_homepageimg)){	
	?>
			<div class="row">
			    <div class="col-sm-6">
					<p style="float: left;"><?=$get_rs[2]."......"?></p>	
					<a href="<?=$get_rs[1]?>">See More</a>
				</div>
					<div class="col-sm-6">
				    <? $banner=get_homepage_images(29)?>
				    <img class="img-responsive" src="<?= $sitepath ?>uploadfiles/saad.jpg"> 
					<!--<img class="img-responsive" src="images/g8.jpg"> -->
				</div>
			</div>
<? } ?>
<br>
			<div class="row">
			    <div class="col-sm-6">
			        <br>
			     <img class="img-responsive" src="<?= $sitepath ?>uploadfiles/ryan.jpg" />
			    </div>
				<div class="col-sm-6">
				    <br>
				    <h2 style="text-align:center;" class="heading-agileinfo">Join Us<hr></h2
					<p style="float: left;">WELCOME Hello! Welcome to our world. You are here for a specific purpose right? And yeah.. we know your purpose. We will help you to meet your desired happiness to take your life to the next level. We will help to make the most hard and valuable decision of your life. From here a new story begins. And we feel very proud to be a part of your story! We will be always there for you.</p>
			<a href="/registration.php"><button type="button" class="btn btn-primary btn-lg btn-block">Join Us </button></a>
				</div>
				
			</div>
			
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Find your Special Someone</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>1</i>
						</span>
						<h3>Sign up</h3>
						<p>Register for free & put up your Profile</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>2</i>
						</span>
						<h3>Connect</h3>
						<p>Select & Connect with Matches you like & Start a Conversation</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>3</i>
						</span>
						<h3>Interact</h3>
						<p>Become a Premium Member & get more facilities.</p>
					</div>
				</div>
				

			</div>
		</div>
	</div>



			<div class="row">
				<div style="margin-top: 37px;" class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Some Featured Profile's</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:200px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:200px;overflow:hidden;">
            <!--<div>-->
            <!--    <img data-u="image" src="img/001.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/002.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/003.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/004.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/009.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/010.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/019.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/020.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/021.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/022.jpg" />-->
            <!--</div>-->
            <!--<div>-->
            <!--    <img data-u="image" src="img/024.jpg" />-->
            <!--</div>-->
            
        <?
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=62;
        $sql = "select * from tbldatingusermaster where packageid='$id'";
        $result = $db->query($sql);
        
        if($result){
        while($data = $result->fetch_object()){
        ?>
            <div id="sh1">
                <? if($data->imagenm == NULL){ ?>
                <img id="sh1" data-u="image" src="https://cdn.wccftech.com/images/default_avatar.png" />
                <? } else { ?>
                <img id="sh1" data-u="image" src="uploadfiles/<? echo $data->imagenm; ?>" />
                <? } ?>
            <div style="
            background: rgba(2, 1, 3, 0.56)!important;
        	width: 120px;
        	padding: 50px 10px;
        	position: relative;
        	top:20px;
        	color: white;
        	left: 20px;
        	z-index: 99;" 
        	class="shape">
            <p>
<? 
$userid = $data->userid;
$nnn1 = $data->dob;
$birthday_timestamp = strtotime($nnn1); 
$age1 = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);
$name = $data->name;
$name1 = substr($name,0,3);
echo "<a href='https://www.paroshi.com/displayprofile.php?b=".$userid."' target='_blank'>".$name1.$data->profile_code."<br>"; 
echo $age1." Yrs <br>";
echo "From ".$data->address."<br></a>";
?>

            
            </p>
         </div>
            </div>
        <? } } ?>
        
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <br>
    <br><br><br><br>
<!--images/img_bg_1.jpg-->
	<div class="gtco-cover gtco-cover-sm" style="background-image: url(uploadfiles/anne.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>We have high quality services that you will surely love!</h1>
				</div>	
			</div>
		</div>
	</div>


	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Our States</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Bride</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Groom</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Active Now</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Happy Customer</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>

	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Subscribe</h2>
					<p>Be the first to know about the new updates.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>NOTICE! </h3>
						<p>Today's By Using this website you are agreeing to website terms & privacy policy. Further your sole intent is to enter into matrimonial alliance & further. Profile information provided on site do not authenticate the profile So you are requested to verify the data. We recommend to check saftey tips & use support to take further help.</p>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>OUR LINKS</h3>
						<ul class="gtco-footer-links">
							<li><a href="https://www.paroshi.com/cms/110_Terms_of_Use">Terms of Use</a></li>
							<li><a href="https://www.paroshi.com/cms/53_Site_Map">Site Map</a></li>
							<li><a href="https://www.paroshi.com/cms/109_Privacy_Policy">Privacy Policy</a></li>
							<li><a href="https://www.paroshi.com/cms/101_Apply_for_Franchisee">Apply for Franchisee</a></li>
							<li><a href="https://www.paroshi.com/cms/102_Advertise">Advertise</a></li>
							<li><a href="https://www.paroshi.com/cms/47_FAQ_s">FAQ s</a></li>
						</ul>
					</div>
				</div>

				<!--<div class="col-md-2 col-md-push-1">-->
				<!--	<div class="gtco-widget">-->
				<!--		<h3>Hotels</h3>-->
				<!--		<ul class="gtco-footer-links">-->
				<!--			<li><a href="#">Luxe Hotel</a></li>-->
				<!--			<li><a href="#">Italy 5 Star hotel</a></li>-->
				<!--			<li><a href="#">Dubai Hotel</a></li>-->
				<!--			<li><a href="#">Deluxe Hotel</a></li>-->
				<!--			<li><a href="#">BoraBora Hotel</a></li>-->
				<!--		</ul>-->
				<!--	</div>-->
				<!--</div>-->

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
						    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
							<li><a href="#"><i class="icon-phone"></i> Client Support +8801985516180</a></li>
							<li><a href="#"><i class="icon-mail2"></i> hello@paroshi.com</a></li>
							<li><a href="#"><i class="icon-chat"></i> paroshi.com<br>
Dhaka<br>
Bangladesh</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2018 Paroshi.com. All Rights Reserved.</small> 
						<small class="block">Developed by <a href="https://web.facebook.com/istiaq.nirab.1" target="_blank">Istiaq Nirab</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>
	
	</body>
</html>

