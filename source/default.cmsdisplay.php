<? include("commonfile.php");
$id = find_querystr_array_id("b");
$result1='';
$authorid='';
$Meta='';
$CMS_TITLE ='';
$LocationId ='';
$Description ='';



if(isset($_GET['bs']) && $_GET['bs']!=""){	
	$result1 = getdata("select Title,Meta_kw,Description,Meta_desc,date_format(CreateDate,'$date_format'),LocationId,authorid,ImgNm from tblcmsmaster where CurrentStatus=0 and LocationId=".$_GET['bs']." order by cmsid");
}
if($id != ""){
	
$result1 = getdata("select Title,Meta_kw,Description,Meta_desc,date_format(CreateDate,'$date_format'),LocationId,authorid,ImgNm from tblcmsmaster where CurrentStatus=0 and cmsid=$id order by cmsid");
}
$ImgNm='';
while($rs1= mysqli_fetch_array($result1)) { 
 $cms_Title = $rs1[0];
 $Meta = $rs1[1]; 
 $Description = $rs1[2];
 $Meta_desc = $rs1[3];
 $Meta_desc1=strip_tags($rs1[3]);
 $Meta_desc2=substr($Meta_desc1,0,100);
 $CreateDate= $rs1[4];
 $LocationId= $rs1[5];
 $authorid= $rs1[6];
 $ImgNm= $rs1[7];
 }
 	freeingresult($result1);
 
 
 $author_name = "";
 $author_image = "";
 
 if ($authorid != "")
 {
 $result1 = getdata("select name from tbldatingadminloginmaster where LoginId=$authorid");
 while($rs1= mysqli_fetch_array($result1))
 { 
 $author_name = $rs1[0];
 }
 	freeingresult($result1);
 }

$display_cms_seo_title=findsettingvalue("cms_seo");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include('topjs.php'); ?>
<? if($display_cms_seo_title=='Y'){?>
<?= $Meta ?>   
<? }else{ ?>
<?= $sitetitle ?>
<? } ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>




<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Acme|KoHo|Roboto+Slab|Source+Code+Pro" rel="stylesheet">

<style type="text/css">
    p{
        font-family: koho;
    }
    li{
        font-family: koho;
    }
</style>

</head>

<body>



    



<?php include("top.php") ?>
<div class="wrapper_about raw OnlyCmsPage">
	<div class="container">
    	<? include("cmsdisplay_data.php");?>
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
<div class="wrapper4 cms_annoncement">
<div class="container">
<div class="row padding_space">

<!--<h2><?=$announcementhead ?></h2>-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<!--matrimonal_annoucement Start  -->

<div class="matrimonal_annoucement cms_announce">
<span></span>
</div>

<!--matrimonal_annoucement End  -->
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<!--matrimonal_side_banner Start  -->

<div class="matrimonal_side_banner cms_bottom_banner">
<span><?php include("side_banner.php"); ?></span>

</div>

<!--matrimonal_side_banner End  -->
</div>
</div>
</div>
</div>
<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>