<!-- ********* TITLE START HERE *********-->
		<div class="pagetitle"><h1><?= $referal_user_addpgtitle ?></h1></div>
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
        <form ENCTYPE="multipart/form-data" name =frmdocument method=post action ="<?= $filenm ?>" onSubmit="MM_validateForm('Name1','','R','Email1','','RisEmail','Subject','','R');return document.MM_returnValue">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="formborder">
<tr>
<td class="grhead" width="50%"><?= $referal_user_add_nm ?></td>
<td class="grhead"><?= $referal_user_add_email ?></td>
</tr>
<?
for($i=1;$i<=$total_refer_email_ctrl;$i++)
{
?>
<tr valign="top">
<td class="formcont" ><input type="text" name="Name<?= $i ?>"  class="form" title="<?= $referal_user_add_nm ?>" alt="<?= $referal_user_add_nm ?>" size=35  ></th>
<td class="formcont" ><input type="text" name="Email<?= $i ?>"  class="form" title="<?= $referal_user_add_email ?>" alt="<?= $referal_user_add_email ?>" size=35 ></td>
</tr>
<?
}
?>
</table>

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
<tr valign="top">
<td class="formcont" ><strong><?= $referal_user_addmsg ?> : </strong><br />
<textarea name="Message"  title="<?= $referal_user_addmsg ?>" style="width:99%" class="form" alt="<?= $referal_user_addmsg ?>" cols=35 rows=10 ></textarea></td>
</tr>
<tr valign="top">
<td class="formcont" style="text-align:center" ><input name="Submit" type="submit" title="<?= $referal_user_addsubmit ?>" class="formbtn" value="<?= $referal_user_addsubmit ?>" alt="<?= $referal_user_addsubmit ?>">
</td>
</tr>
</table>
</form>	
<br />
<div align="center" class="note"><?= $referal_user_add_duplicate_message ?></div>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>