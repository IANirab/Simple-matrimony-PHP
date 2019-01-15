<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$filenm = "../uploadfiles/user_bulk.csv";
copy($_FILES['img']['tmp_name'],$filenm);
$handle = fopen ("$filenm","r");
while ($data = fgetcsv ($handle, 1000, ",")){		
	echo $data[1];
}
?>