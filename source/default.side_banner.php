
<?     
$get_homepageimg = getdata("SELECT title,link from tbl_homepage_images WHERE currentstatus=0 AND pagenm=3 order by title desc Limit 3");
while($get_rs = mysqli_fetch_array($get_homepageimg)){
	 $title = $get_rs[0];
	 $link = $get_rs[1];
	 ?>
     <? if ($title != "") { ?>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
   <a href="<?=$link?>" target="_blank">    <img src='<?= $sitepath ?>uploadfiles/site_<? echo $sitethemefolder ?>/<?=$title ?>'   />
      </a></div>
       <? } ?>
     <?
}
?>


