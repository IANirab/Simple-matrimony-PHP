<?
$script_filename =  $_SERVER['SCRIPT_FILENAME'];

$updateprofilepersonalsearch = strstr($script_filename,"updateprofilepersonal.php");
$updateprofileinterestsearch = strstr($script_filename,"updateprofileintrest.php");
$updateprofile2search = strstr($script_filename,"updateprofile2.php");
$updateprofilecontactsearch = strstr($script_filename,"updateprofilecontact.php");
$updateprofile3search = strstr($script_filename,"updateprofile3.php");
$updateprofile4search = strstr($script_filename,"updateprofile4.php");
$updateprofilepicturesearch = strstr($script_filename,"updateprofilepicture2.php");
$updateprofileextrasearch = strstr($script_filename,"updateprofileextra.php");
$partnerprofilesearch = strstr($script_filename,"partnerprofile.php");

 ?>
 <div class="table-responsive">
<table width="100%" border="0" cellspacing="2" cellpadding="0" class="profilesnav">
<tr>
<td width=""><a href='<?= $sitepath ?>updateprofilepersonal.php'><div class="<?= $profiletoplinkpersonal_css_classs ?>"><?= $profilenumber1 ?></div><?= $profiletoplinkpersonal ?></a></td>

<td width=""><a href='<?= $sitepath ?>updateprofileintrest.php'><div class="<?= $profiletoplinkinterest_css_classs ?>"><?= $profilenumber2 ?></div> <?= $profiletoplinkinterest ?></a></td>

<td width=""><a href='<?= $sitepath ?>updateprofile2.php'><div class="<?= $profiletoplinksocial_css_classs ?>"><?= $profilenumber3 ?></div> <?= $profiletoplinksocial ?></a></td>

<td width=""><a href='<?= $sitepath ?>updateprofilecontact.php'><div class="<?= $profiletoplinkcontact_css_classs ?>"><?= $profilenumber4 ?></div> <?= $profiletoplinkcontact ?></a></td>

<td width=""><a href='<?= $sitepath ?>updateprofile3.php'><div class="<?= $profiletoplinkeducation_css_classs ?>"><?= $profilenumber5 ?></div> <?= $profiletoplinkeducation ?></a></td>

<td width=""><a href='<?= $sitepath ?>updateprofile4.php'><div class="<?= $profiletoplinklifestyle_css_classs ?>"><?= $profilenumber6 ?></div> <? //$profiletoplinklifestyle ?><?=$profiletoplinkinteresthobbies?></a></td>

<?php /*?><td width="11%"><a href='<?= $sitepath ?>updateprofilepicture.php'><div class="<?= $profiletoplinkpicture_css_classs ?>"><?= $profilenumber7 ?></div> <?= $profiletoplinkpicture ?></a></td>
<?php */?>

<td width=""><a href='<?= $sitepath ?>updateprofilepicture2.php'><div class="<?= $profiletoplinkpicture_css_classs ?>"><?= $profilenumber7 ?></div> <?= $profiletoplinkpicture ?></a></td>

<?php /*?><td width="11%"><a href='<?= $sitepath ?>updateprofilepicture.php'><div class="<?= $profiletoplinkpicture_css_classs ?>"><?= $profilenumber7 ?></div> <?= $profiletoplinkpicture ?></a></td><?php */?>

<?php /*?><td width=""><a href='<?= $sitepath ?>updateprofileextra.php'><div class="<?= $profiletoplinkother_css_classs ?>"><?= $profilenumber8 ?></div> <?= $profiletoplinkother ?></a></td>
<?php */?>
<td width=""><a href='<?= $sitepath ?>partnerprofile.php'><div class="<?= $profiletoplinkpartner_css_classs ?>"><?= $profilenumber8 ?></div> <?= $profiletoplinkpartner ?></a></td>

<td width=""><a href='<?= $sitepath ?>advance_family.php'>
<div class="<?= $profiletoplinkadvancefly_css_classs ?>">
<?= $profilenumber9 ?></div> <?= $profiletoplinkadvancefly ?></a></td>


</tr>
</table>
</div>