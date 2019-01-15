<?

include_once("commonfile.php");
$Pgnm = getsimpleid("pgnm");
if (! is_numeric($Pgnm))
$Pgnm =1;
$meta_description = "";
$meta_keyword = "";
$pgtitle ="";
if (isset($_SESSION[$session_name_initital . "directory_meta_desc"]))
$meta_description = $_SESSION[$session_name_initital . "directory_meta_desc"];
if (isset($_SESSION[$session_name_initital . "directory_meta_keyword"]))
$meta_keyword = $_SESSION[$session_name_initital . "directory_meta_keyword"];
if (isset($_SESSION[$session_name_initital . "directory_pgtitle"]))
$pgtitle = $_SESSION[$session_name_initital . "directory_pgtitle"];


	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    		<!-- ********* TITLE START HERE *********-->
          <div class="pagetitle add_dir_search_section">   
          <div class="featured_title_div abtus left_add_title">
   <span>
   <h2><?= $directorypgtitle ?></h2>
    <h3><?=$pgtitle?></h3>
    </span>
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
     
    
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<div class="main_xwarpper">
<div class="addsans_banners">
		<? 
		$FileNm = $sitepath . "directory_search_result";
		$disp_total ="";
		if (isset($_SESSION[$session_name_initital . "directory_searchquery"]))
		{
			$searchque = $_SESSION[$session_name_initital . "directory_searchquery"];
			include("directory_search_grid.php");
		}
		?>
       
        <div class="google_images google_images1 ">
 <?php /*?><? 

	 $select = getdata("select title,pagenm,link,description from tbl_homepage_images where pagenm=8"); 
	while($row = mysqli_fetch_array($select))
	{
		$title = $row[0];
		$description = $row[3];
		$description1 =  substr($description,0,800);
	    $link = $row[2];
		?>
        
    <img src="<?= $sitepath ?>uploadfiles/<?="site_".$sitethemefolder?>/<?=$title?>" />

        <?
	}
	
	 ?><?php */?>
     
     <? 
$objbottombanner = new banner();
echo ($objbottombanner->Showbanner1(24));
?>      
        </div>
        </div> 
        
        <div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<div class="nexttext"><?= $NextStr ?></div>
</div>

<div style="position:relative"> 
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pgnumber">
    <tr> 
      <td align="center">
        <?= $page_no_str ?>
      </td>
    </tr>
  </table>
</div>
<br />
<br />
		</table>
        
		<!-- ********* CONTENT END HERE *********-->
		</div>
    </div>
   
</div>
</div>


<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>