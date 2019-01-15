<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();


if (isset($_POST['id']) && $_POST['id']!='')
{

    	  $result = getdata("select TypeHelp from tbldatingpackagetypemaster where CurrentStatus=0 
		  and PackageTypeId='".$_POST['id']."'");
          $rs = mysqli_fetch_array($result);
		  echo $TypeHelp=$rs['TypeHelp'];
	 
}

?>