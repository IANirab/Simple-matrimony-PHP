<?php

require_once("commonfile.php");
checkadminlogin();

	
$count1 = $_POST['count']; 

$count = $count1-1;

$delete = execute("delete from tbldatinguser_answer_data_master where userid=$curruserid AND typeid='3'");
for($i=1; $i<=$count; $i++)
{
	
	
$insert_question = "Insert into tbldatinguser_answer_data_master (typeid,questionid,answerid,userid) 
values (3,'".$_POST['questionid'.$i]."','".$_POST['answerid'.$i]."',$curruserid)"; 
execute($insert_question);
}

//$_SESSION[$behaviour . "error"] = $messageerrmess8;
header("location:behaviouralquestions.php");
ob_flush();


?>