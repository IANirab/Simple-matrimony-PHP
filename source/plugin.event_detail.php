<!-- ********* TITLE START HERE *********-->

 <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 midle_title"><span><?= $tile_new ?></span></div>
     <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    </div>
    

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
 <div class="new_city">       
<div class="eventaddress"><?= $location ?></div>
<div class="eventdate"><?= $eventdate ?> - <?= $event_time ?></div>

<div id="slideshow">
<div id="slideshow1">
<?
if($imagenm!=''){?>
<img src='<?= $sitepath ?>uploadfiles/<?= $imagenm ?>' border="0"></div>

<? }else{?>
<img src='<?= $sitepath ?>uploadfiles/femalenoimage.png' border="0"></div>
<? }?>


</div>
<p align="center"><?= $dress_code ?></p>
</div>
<div class="texter_part">



<p align="left"><?=$short_description ?></p>


<!-- <?= $categoryid ?> -->
<div class="eventdescription"><P><?= $event_description ?></P></div>


</div>
<? if (($req_register =="Y") &&($archive == "N")){ ?>
<div class="regis_ters">
<div class="auto_middle">
<form name="frm_event_attend" method="post" action="<?=$sitepath ?>event_attend.php?b=<?= $id ?>">
<fieldset>
<h3><?= $eventregisterhead ?></h3>
<div class="form-group"><label><?= $eventregistername ?></label><input type="text" name="name" class="form-control" size="35" /></div>
<div class="form-group"><label><?= $eventregisteremail ?></label><input type="text" name="email" class="form-control" size="35" /></div>
<div class="form-group"><label><?= $eventregisterphone ?></label><input type="text" name="phone" class="form-control" size="35" /></div>
<div class="form-group smbt_none"><label>&nbsp;</label><div class="formbtn_outer"><input type="submit" class="formbtn" onclick="MM_validateForm('name','','R','email','','RisEmail','phone','','R');return document.MM_returnValue" value="<?= $eventregisterbtn ?>" /></div></div>
</fieldset>

</form>
</div>
</div>
<? } ?>

		<!-- ********* CONTENT END HERE *********-->
		</div>