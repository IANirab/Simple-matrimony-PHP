<? require_once("commonfile.php");
checklogin($sitepath);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>

<style type="text/css">
    span {
        color:black !important;
    }
</style>
</head>

<body onload="setTimeout_notify_mng()">
<div id="notify_loading_overlay_id" class="notify_loading_overlay">
     <div class="loading_icone">
         <span>
            <i class="fa fa-spinner faa-spin animated"></i>
         </span>
         <p><?=$notify_loading?></p>
     </div>     
</div>



<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 midle_title"><span><?=$dash_analytic?></span></div>
     <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    </div>
            </div>
			        

<div class="backanly">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="src1_keyword">
        <div id="src1_keyword" >     	
            <form name="frmsearchbyprofile" action="adavancesearchsubmit.php" method="post">
            </form>
		<form name="frmsearchbyprofile" action="adavancesearchsubmit.php" method="post">
		<div class="dashboardpartnersearch0">
				<h3><?=$dashboardSeachByKeyword?></h3>
                <span>

<input type="text" name="advkeyword" placeholder="<?=$dashboardSeachByKeyword?>" class="formsmalldb" size="7" 
style="width:266px;" value="">
				</span>
		<br /><br />
		<span class="checkers"><input type="checkbox" name="with_photo" id="with_photo" value="Y" />&nbsp;&nbsp;
		<?= $dashborad_stats2_withphoto ?></span>
				<input type="hidden" name="raddispresult" value="d" />
				<input type="submit" value="<?= $searchbyprofileidsubmit ?>" class="formsmallbtn"></div>
                </form>
                
            

 <!-------------------- searchbypartnerprofile.php data----------------------------------------------------->       
<div class="dashboardpartnersearch">
<div class="dashboardpartnersearch1 dash_sixer">
<form name="frmsearchbyprofile" action="<?= $sitepath ?>searchbypartnerprofilesubmit.php" method="post">
<h3><?= $searchbypartnerprofilesearchtext1 ?></h3>

<input type="radio" name="radsearchbase" value="B" checked="checked" /> <?=$searchbypaertnerprofilebasic ?> <br />
<input type="radio" name="radsearchbase" value="E" /> <?= $searchbypaertnerprofileentire ?> 
<br />
<input type="radio" name="radsearchbase" value="D"  /> <?= $searchbypaertnerprofileselecteddays ?>

<input type="text" name="txtprofiledays" class="formsmall" size="10" style="margin-left:16px;" value="<?= $preffered_partner_match_default_days ?>">
<?= $searchbypartnerprofilesearchtext2 ?><br />
<input type="checkbox" name="with_photo" value="Y" /> <?=$searchbupartnerprofilewithphoto ?>
<input type="submit" value="<?= $searchbypaertnerprofileidsubmit ?>" class="formsmallbtn">
</form>
<div align="center" class="set_partner"><!--<a href="<?= $sitepath ?>partnerprofile.php" class="link1"><img src="<?= $siteimagepath ?>images/partnerpreference.gif" alt="<?= $searchbypartnerprofilesearchtext3 ?>" border="0" /></a>--></div>
</div>

</div>
 
<!---------------------------------------- --------end--------------------------------------------------------->
 
        
 <!---------------------------------------- searcgbyprofileid.php data---------------------------------------->      
        <div class="dashboardidsearch">

<div class="dashboardidsearch1">

<div><h3 style="margin-top:0px;"><?= $searchbyprofileid. "Profile ID" ?></h3></div>
<form name="frmsearchbyprofile" action="<?= $sitepath ?>searchbyprofilesubmit.php" method="post">

<?
if (findsettingvalue("ProfileIdInitials_method") == "M") { ?>
<select name="cmbalph" class="formsmall">
<? for ($i=65;$i<91;$i++) { 
	$chr = chr($i);
	?>
   	<option value="<?= $chr ?>"><?= $chr ?></option>
<? } ?>
</select>
<? } else
		{ ?>
 <?= findsettingvalue("ProfileIdInitials") ?>
<? } ?>
 - 
<input type="text" name="txtprofileid" class="formsmall" size="7" maxlength="<?= $textbox_character_max_length ?>">
<input type="submit" value="<?= $searchbyprofileidsubmit ?>" class="formsmallbtn">
</form>

<br />

 <div class="dashboardidsearch1_1">
<a href="<?= $sitepath ?>searchquick.php" class="link1"><?= $searchbyprofileid4 ?></a>  <a href="<?= $sitepath ?>advancesearch.php" class="link1db">| <?= $searchbyprofileid3 ?></a> 
</div>

</div>

</div>
        
<!--------------------------------------------------end---------------------------------------------------------->        
        
        
        
        
      </div>  	
      </div>
</div>
	
<? ///////////////////////////// Search By  Page End///////////////////////////////////////////////////////?>	
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="backanly-counter">
  <!--  <h3>Analytics</h3>-->
    <ul class="list-group">
            <li class="list-group-item">
                <span class="lable"><?=$leftlinkexpressireceived?> </span>
            	<span class="badge badge-default badge-pill"><?=notify_analytics(1,$curruserid)?></span>
            </li>
            
            <li class="list-group-item">

           <span class="lable"> <?=$notifyecard?> <?=$recived?> </span>
            	<span class="badge badge-default badge-pill"><?=notify_analytics(3,$curruserid)?></span>
                <span></span>
            </li>
            
            <li class="list-group-item">
            
           		<span class="lable"> <?=$imagerequest?> <?=$recived?></span>
            	<span class="badge badge-default badge-pill"><?=notify_analytics(4,$curruserid)?></span>
                <span></span>
            </li>
            
            
            <li class="list-group-item">
         
           		<span class="lable"><?=$favouritemember?></span>
            	<span class="badge badge-default badge-pill"><?=total_shortlist_member($curruserid)?></span>
                <span></span>
            </li>
            
            <?
			
			$genid=findgender($curruserid);
			$msg_3_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where  tbldatingprofilehistorymaster.touserid=$curruserid and  tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingprofilehistorymaster.fromuserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!='".$genid."'  group by touserid order by historyid DESC");
			$msg_3 = mysqli_num_rows($msg_3_result);
			
			
			?>
            
             <li class="list-group-item">
            
           		<span class="lable"><?=$viewedmyprofile_listviewedmyprofile?></span>
            	<span class="badge badge-default badge-pill"><?=$msg_3?></span>
                <span></span>
            </li>
            
             <li class="list-group-item">
            
           		<span class="lable"><?=$preferdpartnermatch?></span>
            	<span class="badge badge-default badge-pill"><?=total_partner_profile_match($curruserid)?></span>
                <span></span>
            </li>
            
    </ul>
        
        
          
           </div>
         

 </div>
   
</div>

</div>

</div>
<script>
	function setTimeout_notify_mng()
	{
		setTimeout(function(){
			$('#notify_loading_overlay_id').fadeOut();	 
		}, 1500);
	}
</script>
<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>

</body>
</html>


