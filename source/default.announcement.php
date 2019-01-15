<?
echo find_announcement(1);

function find_announcement($typeid)
{
global $sitelanguageid;
$description="";
$announcementid = getonefielddata("select max(announcementid) FROM tbldatingannouncementmaster where languageid=$sitelanguageid and currentstatus=0 and typeid=$typeid");
if ($announcementid != "")
{
	$annimage = getonefielddata("SELECT img_path from tbldatingannouncementmaster WHERE languageid=$sitelanguageid AND announcementid=$announcementid");
	
	$description .= getonefielddata("select description FROM tbldatingannouncementmaster where languageid=$sitelanguageid and announcementid=$announcementid");
	$annlink = getonefielddata("SELECT announcement_link from tbldatingannouncementmaster WHERE languageid=$sitelanguageid and announcementid=$announcementid");
	if($annlink!='')
	{
		$description .= '<a target="_blank" href="'.$annlink.'">More</a>';
	}
}

return $description;	
}
?>



<? 
	$LocationId = 11;
	 $select = getdata("select Title,Description,cmsid,ImgNm from  tblcmsmaster where LocationId=".$LocationId ." AND currentstatus=0 Limit 1"); 
	while($row = mysqli_fetch_array($select))
	{
		$title = $row[0];
		$description = $row[1];
		$description1 =  substr($description,0,800);
	    $cmsid = $row[2];
		$ImgNm = $row['ImgNm'];
	}
		?>
<h2><?=$announcementhead ?></h2>
<div class="annonncement_wrapper">
<img src="<?= $uploadfilepath.$ImgNm?>">
<b class="homeannounce_main">








        <h1 class="sr_title"><?=$title;?> </h1>
        <?=$description1;?>
    <a target="_blank" href="<?= $sitepath ?>cmsdisplay.php?b=<? echo  $cmsid ?>">More</a>   
 
<? ?>&nbsp;</b>
</div>
	