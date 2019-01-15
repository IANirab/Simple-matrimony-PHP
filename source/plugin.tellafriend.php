  <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $tellafriendpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
</div>
		<!-- ********* TITLE START HERE *********-->
		
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
		<form ENCTYPE="multipart/form-data" name =frmdocument method=post action ="<?= $filenm ?>" onSubmit="MM_validateForm('YourName','','R','YourEmail','','RisEmail','FriendName1','','R','FriendEmail1','','RisEmail');return document.MM_returnValue">
<div align="center">
<table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" class="grborder">
<tr valign="top">
<td class="gritem" ><?= $tellafriendfrndyournm ?><br />
<input type="text" name="YourName"  class="form"  size=35  ></td>
<td class="gritem" ><?= $tellafriendfrndyouremail ?><br />

<input type="text" name="YourEmail"  class="form" size=35 ></td>
</tr>

<tr>
<td class="grhead" width="50%"><?= $tellafriendfrndnm ?></td>
<td class="grhead"><?= $tellafriendfrndmail ?></td>
</tr>
<?
for($i=1;$i<=7;$i++)
{
?>
<tr valign="top">
<td class="gritem" ><input type="text" name="FriendName<?= $i ?>"  class="form" title="<?= $tellafriendfrndnm ?>" alt="<?= $tellafriendfrndnm ?>" size=35  ></th>
<td class="gritem" ><input type="text" name="FriendEmail<?= $i ?>"  class="form" title="<?= $tellafriendfrndmail ?>" alt="<?= $tellafriendfrndmail ?>" size=35 ></td>
</tr>
<?
}
?>
</table>
</table>

<br />
<div class="formbtn_outer">
<input name="Submit" type="submit" title="<?= $tellafriendsubmit ?>" class="formbtn" value="<?= $tellafriendsubmit ?>" alt="<?= $tellafriendsubmit ?>">
<input name="Reset" type="reset"  value="<?= $tellafriendreset ?>" class="formbtn" title="<?= $tellafriendreset ?>" alt="<?= $tellafriendreset ?>">
</div>
</div>
</form>	
		
		<!-- ********* CONTENT END HERE *********-->
		</div>
		