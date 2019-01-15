<!-- ********* TITLE START HERE *********-->
		<div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $searchcrieteriapgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div> 
 
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
<form method='post' name='frmmodify'><input type='hidden' name='hidid'></form>
<div class="errorbox"><span><?php checkerror(); ?></span></div>
<div class="table-responsive grlink">
<table border=0 width="100%" align="center" cellpadding="0" cellspacing="0"  class="grborder">
<thead>
<tr>
<th class="grhead"><?= $searchcrieteriahead0 ?></th>
<th class="grhead"><?= $searchcrieteriahead1 ?></th>
<th class="grhead" width="20%" align="center"><?= $searchcrieteriahead3 ?></th>
</tr>
</thead>
<tbody>
<?
$FileNm = $sitepath . "search_crieteria_manager.php";
if (isset($_GET["pgnm"]))
	$Pgnm = $_GET["pgnm"];
else
	$Pgnm = 1;
			
$fromqry = "from tbl_user_search_criteria_master where currentstatus =0 and userid=$curruserid order by criteria_id DESC ";
			
$totalnorecord = getonefielddata( "select count(criteria_id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm ."?",$searchcrieteriamngrltnext,$searchcrieteriamngrltback);
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select criteria_id, date_format(createdate,'$date_format'),title $fromqry $NoOfRecord");
while($rs= mysqli_fetch_array($result))
{
 $criteria_id = $rs[0] ;
 $createdate =$rs[1];
 $title=$rs[2];
?>
 <tr>
<td class="gritem"><?= $title?>&nbsp;</td>
<td class="gritem"><?= $createdate?>&nbsp;</td>
<td align="center" class="gritem existing_dummy">
<a href='<?= $sitepath ?>search_criteria_query.php?b=<?= $criteria_id?>'><div class="mrcrg"><img align="absmiddle" src="<?= $siteimagepath ?>images/Msearch_icon.png" border="0" alt="" /></div><?= $searchcrieteriaaction4 ?></a><br /><a href='<?= $sitepath ?>search_criteria_delete.php?b=<?= $criteria_id?>'><div class="mrcrg"><img align="absmiddle" src="<?= $siteimagepath ?>images/deleteicon.png" border="0" alt="" /></div><span class="deletelink"><?= $searchcrieteria_delete ?></span></a>
</td></tr>
<?
}
freeingresult($result);
?>
</tbody>
</table>	
</div>
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<div class="nexttext"><?= $NextStr ?></div>
</div>

		</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>