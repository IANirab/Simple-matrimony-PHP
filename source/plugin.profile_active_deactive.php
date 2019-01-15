<!-- ********* TITLE START HERE *********-->


<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-2 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-8 midle_title"><span><?=$ProfileActiveDeactive?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-2 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>

	<!--	<div class="pagetitle"><h1><?= $messagepgtitle ?></h1></div>-->
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
        
         <div class="Activat_sect">
       <form action="profile_active_deactive_action.php?b=4" method="post">
        	<? if(isset($_GET['b']) && $_GET['b']==4 && is_numeric($_GET['b'])){
		
		?>
        	<div class="ADForms">
            	<div class="form-group">
        
        	<label class="control-label"><?=$profileactdeactive?></label>
		<textarea class="form-control" name="message" id="message" placeholder="Enter Your Reason"></textarea>
        </div>
        <div class="form-group">
	         <input class="formbtn" type="submit" value="<?=$updatepersonalprofilehiv_yes?>">
         </div>
         <div class="form-group">
             <a href="message.php?b=44"><?=$profileactdeactiveNothanks?></a>
         </div>
         </div>
         </form>
            
            <? } else { ?>   
            <?=$profiledeactivatemsg?> <br>
            <br>
            <?=$profileactivatewishmsg?><br><br>
            <?=$click?> <a href="profile_active_deactive_action.php?b=0"> <?=$here?></a>              
            <? } ?>
		</div>
		<!-- ********* CONTENT END HERE *********-->
		</div>