<?php ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$ip = getip();
$action = $curruserid;

$type='';
$name='';
$married_to='';
$ds_of='';
$education='';
$occupation='';
$no='';
$ftype='';
$qtype='';





if(isset($_POST['ftype']) && $_POST['ftype']!='')
{
	$ftype=$_POST['ftype'];
}

if($ftype=='p')
{
	if(isset($_POST['type1']) && $_POST['type1']!='0.0')
	{
		$type=$_POST['type1'];
	}
}elseif($ftype=='m')
{
	if(isset($_POST['type2']) && $_POST['type2']!='0.0')
	{
	$type=$_POST['type2'];
	}
}elseif($ftype=='f')
{
	if(isset($_POST['type3']) && $_POST['type3']!='0.0')
	{
	$type=$_POST['type3'];
	}
}








if(isset($_POST['name']) && $_POST['name']!='')
{
	$name=$_POST['name'];
}


if(isset($_POST['married_to']) && $_POST['married_to']!='')
{
	$married_to=$_POST['married_to'];
}

if(isset($_POST['ds_of']) && $_POST['ds_of']!='')
{
	$ds_of=$_POST['ds_of'];
}


if(isset($_POST['edu_arr']) && $_POST['edu_arr']!='')
{
	 $education=implode(",",$_POST['edu_arr']);
}


if(isset($_POST['occ_arr']) && $_POST['occ_arr']!='')
{
	$occupation=implode(",",$_POST['occ_arr']);
}

 //$education = getcheckboxids("tbl_education_master","education");
  //$occupation = getcheckboxids("tbldatingoccupationmaster","occupation"); 


if($_POST['uid'] && $_POST['uid']!='')
{
	$uid=$_POST['uid'];
}else{$uid='';}

if($uid==0)
{
    
    
	$no = getonefielddata("select count(id) from tbldating_advancefamily where 
currentstatus =0 and userid=$curruserid and type=$type group by type ");
$no=$no+1;

execute("INSERT INTO `tbldating_advancefamily`(`userid`, `name`, `education`, `occupation`, `married_to`, `d/s_of`, `type`, `no`, `createip`, `createdate`,`ftype`) 
VALUES ('".$curruserid."','".$name."','".$education."','".$occupation."','".$married_to."','".$ds_of."',
'".$type."','".$no."','".$ip."','curdate()','".$ftype."')");


    // $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    // $sql = "INSERT INTO tbldating_advancefamily(userid,name,education,occupation,married_to,d/s_of,type,no,createip,ftype) VALUES('$curruserid','$name','$education','$occupation','$married_to','$ds_of','$type','$no,'$ip','$ftype'";
    // $result = $db->query($sql);


}


else
{
	
	if($_POST['no'] && $_POST['no']!='')
	{
	$no=$_POST['no'];
	}
	
	if($_POST['pid'] && $_POST['pid']!='')
	{
	$pid=$_POST['pid'];
	}
	

	execute("UPDATE `tbldating_advancefamily` SET `name`='".$name."',`education`='".$education."',`occupation`='".$occupation."',`married_to`='".$married_to."',`d/s_of`='".$ds_of."'
 WHERE userid='".$curruserid."' and id='".$pid."' ");

}


		header("location:advance_family.php");
exit;

?>