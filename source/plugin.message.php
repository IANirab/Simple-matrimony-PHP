<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-2 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-8 midle_title"><span><?= $messagepgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-2 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>


		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="alerttable">
	<tr>
	<td class="alerticon"><img src="<?= $siteimagepath ?>images/alerticon.gif" alt=""></td>
	<td>
		<div class="error1" align="center" class=""><p style="color:#fff;text-transform:capitalize"><? if($message!='') { ?><?= $message ?><? } ?></p></div>
		<br />
		<br /><br />
		
		<div align="center" class="boldtext extralink1">
        <? if($errid==75){ ?>
        	<a href="<?= $sitepath ?>searchresult.php" class="link"><?= $messagesearchresult ?></a> &nbsp;&nbsp;|
        <? } ?>
		<a href="<?= $sitepath ?>advancesearch.php" class="link"><?= $messageextralink1 ?></a> &nbsp;&nbsp;|&nbsp;&nbsp; 
        <a href="<?= $sitepath ?>dashboard.php" class="link"><?= $messageextralink2 ?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
         <a href="javascript:history.go(-1)" class="link"><?= $messageextralink3 ?></a>  &nbsp;&nbsp;|&nbsp;&nbsp; 
		
		<? if ($Update_profile_Pages_design_setting == "D") { ?>
<a class="link" href="<?= $sitepath ?>updateprofilepersonal.php"><?= $leftlinkprofile ?></a>
<? } ?>
<? if ($Update_profile_Pages_design_setting == "S") { ?><a class="link" href="<?= $sitepath ?>registration2.php">
<?= $leftlinkprofile ?></a><? } ?>

		</div>
	</td>
	</tr>
	</table>
<br><br><br><br>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>