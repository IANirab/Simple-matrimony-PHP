<!-- ********* TITLE START HERE *********-->
		<div class="pagetitle">
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 midle_title"><span><?= $srch_title ?></span></div>
     <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    </div>
        
		<!-- ********* TITLE END HERE *********-->
        
        <? if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){ ?>
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		<?
		$FileNm = $sitepath . "searchdetail/" . $searchid;
		if ($searchquery != ""){		
			$searchque = $searchquery;
			$searchque_fil = $searchquery;
			$design_view_id = $_SESSION[$session_name_initital . "search_grid_design_display"];
			$urltitle = $searchid . "_" . makeurlsearchengine($title);
			include("plugin.searchgrid.php");
		}
?>
<? if ($searchquery != "") { ?>
<div class="adminsearchdetailrss">
</div>
<? } ?>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>
        <? } else {?>
<div class="login_membership">
         <div class="send_frnd">
<div class="sendtofriend" align="center" >
<figure><img src="<?= $siteimagepath ?>images/AlertIconP.png" /></figure>
<a href="login.php"> <?=$login_errr_msg_serach?></a>
</div>
</div>


         </div>
         
<? } ?>