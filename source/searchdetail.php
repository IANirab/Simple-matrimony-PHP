<?
include("commonfile.php");
include("adminsearchcommon.php");
$sitemeta  = "";
$title = "";
$retids = findids("b");
$searchid = $retids["id"];
$Pgnm = $retids["pgno"];
$srch_title='';
//$Pgnm = getsimpleid("pgnm");
$searchquery = "";
$searchque_fil ='';
$filter_searchquery='';
//$searchid = find_querystr_array_id("b");
if ($searchid != ""){
$searchid_arr = explode("_",$searchid);
$searchid = $searchid_arr[0];

$result = getdata("select title,metatag FROM tbldatingadminsearchmaster where  currentstatus=0 and searchid=$searchid");
if(mysqli_num_rows($result)>0){
while($rs= mysqli_fetch_array($result)){
	$title = $rs[0];
	$srch_title = $rs[0];
	$sitemeta=$rs[1];
	$searchquery = findadminsearchquery($searchid);	
}
freeingresult($result);
}
}

$display_cms_seo_title=findsettingvalue("cms_seo");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include('topjs.php'); ?>
<? if($display_cms_seo_title=='Y'){?>
<?= $sitemeta ?>   
<? }else{ ?>
<?= $sitetitle ?>
<? } ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript">
function open_box(userid){
	return parent.GB_showCenter('Zoom', "<?=$sitepath?>imagegb.php?b="+userid, 470, 515);
}
function checkrightclick(imgid){	
	$('#srsimg'+imgid).bind('contextmenu', function(e) {
    return false;
});
}
</script>
<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>




<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.searchdetail.php");?>
    </div>

</div>

<div class="wrapper_blank">
	<div class="container">
    	 <div col-lg-9 col-md-9 col-sm-9 col-xs-12>
    			<div class="leftcms">
		 &nbsp;
    </div>
    </div>
    <div col-lg-3 col-md-3 col-sm-3 col-xs-12>
    			<div class="rightcms">
		 &nbsp;
    </div>
    </div>
    </div>
</div>

<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>