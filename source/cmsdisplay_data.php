<p style="font-family: koho;">
   <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 midle_title"><span><?= $cms_Title ?></span></div>
     <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    </div>
            </div>


		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
<div class="articledetails">


<? if($ImgNm!=''){ ?>
<img src='<?= $sitepath ?>uploadfiles/<?= $ImgNm ?>' class="authorthumb" />
<? } ?>

<p style="font-family: koho;">
<? if ($LocationId == 5) { ?>
<? if ($author_image != "" ) { ?>
<img src='<?= $sitepath ?>uploadfiles/<?= $author_image ?>' class="authorthumb" />
<? } ?>

<? if ($author_name != "") { ?>
<span style="text-transform: capitalize;"><?= $cmsauthorname ?> <?= $author_name ?></span>, 
<? } ?>

<strong><?= $cmspublishdate ?> <?= $CreateDate ?></strong>
<? } ?>



<?= $Description  ?></p>
</p>
</div>
</div>