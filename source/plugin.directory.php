<!-- ********* TITLE START HERE *********-->
 <div class="featured_title_div abtus left_add_title">

   <span class=""><?= $directorypgtitle ?></span>
   <i>
   <a href="<?= $sitepath ?>directory.php"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory1.png" alt="" onclick="close_form();" class="" /> <?=$directory_search_result_browsedirectory ?>
   
   </a>
<a href="<?= $sitepath ?>directory_add.php"><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory2.png" alt="" onclick="close_form();" class="" /> <?= $directory_search_result_adddirecotorylisting ?>



</a>
<a href="<?= $sitepath ?>directory_lostpassword.php"><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory3.png" alt="" onclick="close_form();" class=""  /> <?= $directory_search_result_lostdirectorypassword ?>

</a>
</i>
</div>
 

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent add_dirsection">
		<!-- ********* CONTENT START HERE *********-->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search_left_modify directorycat cader_drect">
		<?
		$result = getdata("select categoryid, 
title from tbl_directory_category_master where currentstatus=0 ");
		while($rs= mysqli_fetch_array($result))
		{
		 $categoryid = $rs[0] ;
		 $title = $rs[1];
		 //$link_title =  generatelink($title,$categoryid,"directory_category_que")
		 $link_title =  $sitepath."directory_category_que.php?b=".$categoryid."&t=".$title;
		?>
<a href='<?= $link_title  ?>'><?= $title ?></a>
		<? }
			freeingresult($result);
		 ?>
         
         
        </div>
         
         
   <div class="inquiry_now"><?
		$searchque = "typeid=2 and payment_completed='Y' and ";
		$FileNm ="directory";
		$Pgnm = getsimpleid("pgnm");
		if (! is_numeric($Pgnm))
		$Pgnm =1;
		$disp_total = 5;
		require_once("directory_search_grid.php");
		?></div> 
        
    <div class="google_images google_images1 change_ads">
             <? 
$objbottombanner = new banner();
echo ($objbottombanner->Showbanner1(48));
?>      
        </div>    
    
</div>


 

<!--<div class="col-xs-9 col-sm-6 col-md-3 col-lg-3 search_right_modify">
  <div class="searchresultsleft sunni_refine">
  <div class="basic">
<h2><?= $directory_search_result_directory ?></h2>
<a href="<?= $sitepath ?>directory.php"><?= $directory_search_result_browsedirectory ?></a>
<a href="<?= $sitepath ?>directory_add.php"><?= $directory_search_result_adddirecotorylisting ?></a>
<a href="<?= $sitepath ?>directory_lostpassword.php"><?= $directory_search_result_lostdirectorypassword ?></a>
</div>

<div class="google_images google_images1">
      
        	<img src="<?= $siteimagepath ?>images/event_right.jpg">
            
        </div>

</div>
        
</div>-->

<br />
<br />

		
		
		<!-- ********* CONTENT END HERE *********-->
		</div>