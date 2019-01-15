<div class="slider_border_shadow">

<?    
$get_homepageimg = getdata("SELECT title,link,description from tbl_homepage_images WHERE currentstatus=0 AND pagenm=1");
?>
    <ul id="owlhomeslider" class="owl-carousel bxslider"> 
    <?
    $i=1; 
    while($get_rs = mysqli_fetch_array($get_homepageimg)){
        $title = $get_rs[0];
		$link = $get_rs[1];
		$description =$get_rs[2];
    ?>
        <? if ($title != "") { ?>
        <li class="sliderImage item">
        <a href=""><img src='<?= $sitepath ?>uploadfiles/site_<? echo $sitethemefolder ?>/<?=$title ?>' class="img-responsive" border="0" alt="" width="" height="" title=" " /></a>
        <? if($description!='') {?><div class="slider_text"><? echo $description;?></div><? } ?>
        </li><? } ?>    
    <? 
    $i++;
    } ?>      
    </ul>
</div>

<div style="display:none;"></div>