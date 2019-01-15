<!-- ********* TITLE START HERE *********-->
		 <div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span> <?= $testimonialtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div> 
        

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent testmonialscode">
		<!-- ********* CONTENT START HERE *********-->
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="testi1">
<?
$Pgnm = getsimpleid("pgnm");
if (! is_numeric($Pgnm))
$Pgnm =1;
$FileNm ="testimonialdetail.php?";
$fromqry = "FROM tbldatingtestimonialmaster where currentstatus=0  and languageid=$sitelanguageid ";

if ($Pgnm == "")
	$Pgnm = 1;
$totalnorecord = getonefielddata( "select count(testimonialid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,$searchgridtnext,$searchgridback,"N");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str = $arrval['PageStr'];
	
$result = getdata("select title,description,image,testimonialid $fromqry order by testimonialid desc $NoOfRecord");
while($rs= mysqli_fetch_array($result))
{
	$title = $rs[0];
	$description = $rs[1];
	$image = $rs[2];
	if ($image == "")
		$image = "noimagetestimonial.gif";
?>	

<tr>
<td class="testi2" valign="top"><img src='<?= $sitepath ?>uploadfiles/<?=$image ?>'></td>
<td class="testi3"><h3><?=$title ?></h3><?=$description ?></td>
</tr>



	
<? } 
freeingresult($result);
?>
</table>
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<div class="nexttext"><?= $NextStr ?></div>
</div>
<!-- ********* CONTENT END HERE *********-->
</div>