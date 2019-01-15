<?
 
include("commonfile.php");
if(file_exists("source/".$sitethemefolder.".insta.php")){	
	include($sitethemefolder.".insta.php");
} else {
	include("default.insta.php");
}