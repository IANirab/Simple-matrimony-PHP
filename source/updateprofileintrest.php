<?php include("commonfile.php");

if(file_exists("source/".$sitethemefolder.".updateprofileintrest.php")){	
	include($sitethemefolder.".updateprofileintrest.php");
} else {
	include("default.updateprofileintrest.php");
}