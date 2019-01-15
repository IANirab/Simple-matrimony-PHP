<!-- ********* TITLE START HERE *********-->
		 <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 midle_title"><span><?= $eventspgtitle ?></span></div>
     <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    </div>
            </div>
        
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		<?
			$FileNm = $sitepath . "events";
			$searchque = "archive='N' and ";
			include("eventgrid.php");
		?>
		<!-- ********* CONTENT END HERE *********-->
		</div>