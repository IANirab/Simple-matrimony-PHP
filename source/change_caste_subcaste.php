<? include("commonfile.php"); ?>
<?
//if(isset($_POST['religionid']) && $_POST['religionid']!='0.0'){
if(isset($_POST['religionid'])){
	$religianid = $_POST['religionid'];

if($religianid!='0.0'){
	$religsearch = " AND religianid=".$religianid."";
} else {
	$religsearch = "";	
}
$i =1;
if($religianid==4)
{
	$cast_st='style=display:none';
	$subcast_st='style=display:none';
}else{
	$cast_st='style=display:block';
	$subcast_st='style=display:block';
}

  ?>
<div <?=$cast_st?>>
<table >
    <tr>
  	<td class="formhead" valign="top"><?= $advancesearchcast ?></td>
	<td class="formcont"><div class="checks">
	<input type="checkbox" name="" value="" checked="checked" /> <?= $partnerprofileany ?>
<? 
if($religianid!='0.0'){
	$religsearch = " AND religianid=".$religianid."";
} else {
	$religsearch = "";	
}
$i =1;
$result = getdata("select id,title from tbldatingcastmaster where currentstatus=0 and languageid=$sitelanguageid ".$religsearch."  order by title");
$cast_list = "";
while ($rs = mysqli_fetch_array($result))
{ 
$cast_list .= $rs[0].",";
$chk = @findcheckedornot($castid,$rs[0]);
?>
<span><input type="checkbox" name="chkcast<?= $rs[0] ?>" value="<?= $rs[0] ?>" <?= $chk  ?> /> <?= $rs[1] ?></span>
<? 
}
freeingresult($result);
$cast_list = substr($cast_list,0,-1);
?>
</div>
</td></tr></table>
</div>

~
<div <?=$subcast_st?>>
<table >
<tr>
<td class="formhead" valign="top"><?= $change_caste_subcaste_sub ?><?= $advancesearchcast ?></td>
<td class="formcont"><div class="checks">
<? if(@$subcast==''){ 
	$subcheck = 'checked="checked"';
} else {
	$subcheck = '';
}
  ?>
<input type="checkbox" name="" value="" <?=$subcheck?> /> <?= $partnerprofileany ?>
<? 
if($cast_list!=''){
$i =1;
$result = getdata("select id,title from tbldatingsubcastmaster where currentstatus=0 and languageid=$sitelanguageid AND castid IN (".$cast_list.") order by title");
while ($rs = mysqli_fetch_array($result))
{ 
$chk = @findcheckedornot($subcast,$rs[0]);
?>
<span><input type="checkbox" name="chksubcast<?= $rs[0] ?>" value="<?= $rs[0] ?>" <?= $chk  ?> /> <?= $rs[1] ?></span>
<? 
} 
freeingresult($result);
}
?>
</div>
</td></tr></table>
</div>



<?	
}
?>



