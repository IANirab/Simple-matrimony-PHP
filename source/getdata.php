<? 
include("commonfile.php");
$type = '';
if(isset($_POST['type']) && $_POST['type']!=''){
	$type = $_POST['type'];	
}
if($type=='get_cast'){
	$religionid = 0;
	if(isset($_POST['religionid']) && $_POST['religionid']!=''){
		$religionid = $_POST['religionid'];	
	}
	echo fillcombo("select id,title from  tbldatingcastmaster where religianid=$religionid and currentstatus=0 order by title ","","Select");
}
?>