
<div class="searchgridtopoptions sortby_sect">
<?php /*?><span class="error"><?=  $totalnorecord  ?> <?= $searchgrid_total_profile_found  ?> </span><?php */?>
<?
if ($sitethemefolder =="galaxymatrimony")
{
	$st = 'style="display:none;"';
}
else
{
	$st ='';
}
?>

<?
$sel_sort='';
if(isset($_SESSION[$session_name_initital . "filter_sortby"]) && $_SESSION[$session_name_initital . "filter_sortby"]!='')
{
	 $sel_sort=$_SESSION[$session_name_initital . "filter_sortby"];
}
?>

<div class="searchgridtopoptions1" <?=$st?> >
<form name="frmsearchgridsortby" method="post" action="<?= $sitepath ?>searchsort.php">
<?php /*?><?= $searchgridsortbytext ?><?php */?>
<select name="searchgridsortby" onChange="sortbysubmit()" class="formsmall">
<option value="0.0">Sort by</option>
<option value="n"  <? if($sel_sort=='n'){?> selected="selected"<? } ?>>
<?=$advancesearchsortsearchresultnew ?></option>
<option value="a"  <? if($sel_sort=='a'){?> selected="selected"<? } ?>>
<?=$advancesearchsortsearchresultmostactive ?></option>
<option value="p"  <? if($sel_sort=='p'){?> selected="selected"<? } ?>>
<?=$advancesearchsortsearchresultmostpopular ?></option>
<option value="r"  <? if($sel_sort=='r'){?> selected="selected"<? } ?>>
<?=$advancesearchsortsearchresultrelavance ?></option>
</select>
<input type="hidden" name="searchgridfilenmsort" value="<?= $FileNm ?>">

</form>
</div>
</div>
<script language="JavaScript">
function sortbysubmit()
{
document.frmsearchgridsortby.submit();
}
function displaybysubmit()
{
document.frmsearchgriddisplayby.submit();
}
</script>