

<div class="profileid">
<span class="spanclose" onclick="setvisiblity1();">
<img src="uploadfiles/Close.png" style="height:11px; width:11px;"  /></span>
<form class="search_h" name="frmsearchbyprofile" action="searchbyprofilesubmit.php" method="post">
<h5 class="search_tittel"><?= $searchbyprofileid ?></h5>
<span>
<? if (findsettingvalue("ProfileIdInitials_method") == "M") { ?>
<select name="cmbalph" class="formsmalll">
<? for ($i=65;$i<91;$i++) { 
$chr = chr($i);
?>
<option value="<?= $chr ?>"><?= $chr ?></option>
<? } ?>
</select><? } else
{ ?>
<?= findsettingvalue("ProfileIdInitials") ?> 
<? } ?>
- 
<input type="text" name="txtprofileid" class="formsmall" size="7"></span>

<input type="submit" value="<?= $searchbyprofileidsubmit ?>" class="formsmallbtn">
</form></div>
<? 
$str = $_SERVER['PHP_SELF'];
$stri = strstr($str,"index.php");
//if($stri == "") {
?>
<?php /*?><a href="#" onclick="change_search('kwd')">Search by Keyword</a><?php */?>
<? //} ?>