<?
$NoofPages  = "";
$ordby ="eventid desc";

$fromqry = "from tbl_event_master where $searchque languageid=$sitelanguageid and ". eventwhereque() . " order by $ordby ";

if ($Pgnm == "")
	$Pgnm = 1;
	
	$totalnorecord = getonefielddata( "select count(eventid) $fromqry ");
		
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,$searchgridtnext,$searchgridback,"Y");
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];
		$page_no_str = $arrval['PageStr'];
		$result = getdata("select eventid, title,location,date_format(eventdate,'%W, %M %d, %Y'),imagenm,substring(short_description,1,150) as short_description $fromqry $NoOfRecord");
		while($rs= mysqli_fetch_array($result))
		{
		 $eventid = $rs[0];
		$title = $rs[1];
		$location = $rs[2];
		$eventdate= $rs[3];
		$imagenm= $rs[4];
		if ($imagenm == "")
			$imagenm ="noimage_event.gif";
		$short_description = $rs[5];
		$link = generatelink($title,$eventid,"event_detail")
		?>
	<div class="eventgridblock eventgridblock_5">
	<div class="lefter_mgers"><img src='<?= $sitepath ?>uploadfiles/<?= $imagenm ?>' /></div>
    <div class="matri_header">
	<h3><a href='<?= $link ?>'><?= $title?></a></h3>
	<p><strong><?= $eventdate ?></strong>
    <br /><span class="newyork"><?=  $location ?></span>
    <br /><br />
	<?=	$short_description ?></p>
    </div>
	</div>
<? } 
	freeingresult($result);
?>
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pgnumber">
<tr>
<td align="center"><?= $page_no_str ?></td>
</tr>
</table>
<div class="nexttext"><?= $NextStr ?></div>
</div>