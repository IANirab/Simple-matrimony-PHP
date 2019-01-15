<?php

ob_start();
require_once('commonfile.php');
$que = "";
$daysreq ="N";
$days ="";
$withphoto = "";
if(isset($_POST['with_photo']) && $_POST['with_photo']=='Y'){
	$withphoto = $_POST['with_photo'];
}
if (isset($_POST["radsearchbase"])){
	if ($_POST["radsearchbase"] == "D"){
	$daysreq = "Y";
	if (isset($_POST["txtprofiledays"]))
		if ($_POST["txtprofiledays"] != "")
			$days = $_POST["txtprofiledays"];
	}
}
if(isset($_POST['radsearchbase']) && $_POST['radsearchbase']=='B'){
	$result = getdata("select genderid,agefrom,ageto,castid, subcast,gotra,occupation,education,maritalstatus,
	location,religianid,heightfrom,heightto,dietids,smokeids,drinkids,states,pg_education,industry,functional_area,
	religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id from tbldatingpartnerprofilemaster 
	where userid =$curruserid");
	$rs = mysqli_fetch_array($result);	
	$gender = $rs[0];	
	$agefrom = $rs[1];
	$ageto = $rs[2];
	$castid = $rs[3];
	$religianid = $rs[10];
	$que = '';
	if($gender>0){
		$que .= " tbldatingusermaster.genderid=" . $gender . " and";	
	}
	if ($rs[1] != ""){
		$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= " . $rs[1] . " and";
	} if ($rs[2] != ""){
		$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <= " . $rs[2] . " and";
	}
	if ($rs[3] != 0){
		$cast_arr = explode(",",$rs[3]);
		$cqry = ' (';
		for($i=0; $i<count($cast_arr); $i++){
			$cqry .= "tbldatingusermaster.castid = ".$cast_arr[0]." OR ";
		}
		$cqry = substr($cqry,0,-4);		
		$que .= $cqry.") and ";
	}
	if ($rs[10]!="0" && $rs[10]!=''){
		$que .= " tbldatingusermaster.religianid in($rs[10]) and  ";
	}
	if($withphoto=='Y'){
		$que .= " tbldatingusermaster.imagenm!='' AND ";	
	}
} else {
	$que = findpartnerprofilequery($days,$daysreq,$curruserid,$withphoto);
}
$_SESSION[$session_name_initital . "searchquery"] = $que;
$_SESSION[$session_name_initital . "searchquery_original"] =$que;
header("location:searchresult.php");
ob_flush();
?>