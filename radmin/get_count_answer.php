<? 
require_once("commonfileadmin.php");
//$count_ans=0;
//echo "hello"; exit;
$count_ans = $_POST['count_ans'];
	//echo $count_ans;
	//exit;
//$state='';
$answer= "";



if(isset($_POST['count_ans']) && $_POST['count_ans']!=''){
	$count_ans = $_POST['count_ans'];
	
}
if(isset($_POST['stype']) && $_POST['stype']!=''){
	$count1 = $_POST['stype'];
}


 for ($j=1; $j<=($count_ans); $j++){ 
 

 
echo "<tr valign='top'><th scope='row' width='20%' >Answer ".$j." :</th><br/>
<td width='1000px'><input type='text' name='answer".$j."' id='answer' value='' style='width:100%'></td></tr>"; 
}
