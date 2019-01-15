<? include("commonfile.php");
$location ='';
$id = "";
$eventdate ='';
$event_time ='';
$imagenm ='';
$tile_new='Event';
 
$dress_code ='';
$short_description ='';
$event_description ='';
$req_register ='';
$id = find_querystr_array_id("b");
//if(!is_numeric($id)){
//$id = $_GET['b'];
//}
if ($id != "")
{
 $result1 = getdata("select eventid,title,location,date_format(eventdate,'%W, %M %d, %Y'),imagenm,req_register,categoryid,description,short_description,archive,dress_code,event_time from tbl_event_master where eventid=$id and currentstatus=0 ");
 while($rs= mysqli_fetch_array($result1))
 { 
 $eventid = $rs[0];
	$title = $rs[1];
	$location = $rs[2];
	$eventdate= $rs[3];
	$imagenm= $rs[4];
	$req_register = $rs[5];
	if ($req_register == "")
		$req_register ="Y";
	if ($imagenm == "")
		$imagenm ="noimage_event.gif";
	$categoryid = $rs[6];
	if ($categoryid != "")
		$categoryid = getonefielddata("select title from tbl_event_category_master where categoryid=$categoryid");
		
	$event_description = $rs[7];
	$short_description= $rs[8];
	$archive= $rs[9];
	$dress_code=$rs[10];
	$event_time=$rs[11];	
 }
 	freeingresult($result1);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.event_detail.php");?>
    </div>
   
</div>
</div>


<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>