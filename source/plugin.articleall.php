<!-- ********* TITLE START HERE *********-->
	<div class="pagetitle">   
          <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $articleallpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
    </div>
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
<?
$FileNm = $sitepath . "articleall";
if (isset($_GET["pgnm"]))
$Pgnm = $_GET["pgnm"];
else
$Pgnm = 1;
$fromqry = "from tblcmsmaster where LocationId=5 and CurrentStatus=0 and languageid =$sitelanguageid order by cmsid DESC ";
$totalnorecord = getonefielddata( "select count(cmsid) $fromqry ");
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,$articleallnext,$articleallback,"Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select cmsid, Title,Description,date_format(CreateDate,'$date_format'),authorid,staticlink,ImgNm $fromqry ".$NoOfRecord);
while($r= mysqli_fetch_array($result))
{
$cmsid = $r[0];
$Title = $r[1];
$Meta_desc = $r[2];
$CreateDate = $r[3];
$imgnm = $r[6];

if($r['staticlink']==''){
	$link = makecmslink($Title,$cmsid);
} else {
	$link = $r['staticlink'];
}	
$authorid= $r[4];
if ($authorid != "")
$cmsauthorname =  getonefielddata("select name from tbldatingadminloginmaster where LoginId=$authorid");
else
$cmsauthorname="";

?>

	<div class="articlegrid">
        <div class="lockartic">            
            <div class="OtherAllDeBlock">
            	<figure>
                	<a href="<?= $link ?>">  
                    <? if($imgnm!=''){?>
                    	<img src="<?= $siteimagepath ?>../../uploadfiles/<?=$imgnm?>" />              
                    <? } else {?>
                    	<img src="<?= $siteimagepath ?>../../uploadfiles/noimage.jpg" />              
					<? } ?>        	
                    </a>
                </figure>
                <nice>	
                    <h3>
	            	<a class="articletitle" target="_blank" href='<?= $link ?>'><?= $Title?></a>
                        <span class="Date">
                        
                        <?= $cmspublishdate ?>    <i class="fa fa-calendar" aria-hidden="true"></i> <?= $CreateDate?> 
                        </span>
                    </h3>
                <div class="SomeDic">                	
                	<span class="Name">
						<i class="fa fa-user" aria-hidden="true"></i> <?= $cmsauthorname ?>
                    </span>                    
                </div>
                
            
            <span class="PreG">
	            <? echo substr($Meta_desc,0,500);?>...
            </span></nice>
            
            <div class="articlegridclear">&nbsp;</div>&nbsp;
        </div>
     </div>



<?
}
	freeingresult($result);
?>


</div>
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<!-- < ?= $objapp->NoofPages ?>-->
<div class="nexttext"><?= $NextStr ?></div>
</div>
		</form>