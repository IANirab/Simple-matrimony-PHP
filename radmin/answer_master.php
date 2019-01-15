<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$answer="";
$typeid="";
$questionid="";

//$filename ="tbl_answer_master_insert";





$filename ="answer_insert";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select typeid,questionid,answer from tbl_answer_master where id=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		
$typeid=$rs[0];
$questionid=$rs[1];
$answer=$rs[2];

//$question= getonefielddata("select typeid from tbl_question_master where id=".$questionid);
	}
	freeingresult($result);
}

//$sql=getdata("select type_id,question,count_ans from tbl_question_master where currentstatus=0");

?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById("").value==""){alert("Plese Enter "); document.getElementById("").focus(); return false;}else {return true;}	
}
$(function() {		
	$("#to_date").datepicker({
		dateFormat: 'dd-mm-yy',			
		changeMonth: true,
		changeYear: true			
	});
});
</script>

<script type="text/javascript">




function get_que_data(val){
	//alert(val)
	if(val!='0.0')	{
		$.post("get_question.php",{
		typeid:val,
		stype:"typeid"},
			function (data){
				//alert(data)
				if(data!=''){							
						$("#questionid").html(data);
				}
			}
		)	
	}
}
</script>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">
<div align="center" id="pagealign">
<div align="center" id="container">
<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
	<div id="content-wrap">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<div id="pagetitle"><h1>answer master</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<div class="errorbox"><?= checkerroradmin()?></div>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" onSubmit="return validate();">
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
  	 
<tr valign="top"><th scope="row" width="40%" <?= admintdclass ?>>Type :</th><td <?= admintdclass ?>><select name="typeid" id="typeid" onChange="get_que_data(this.value)"><? fillcombo("select id,title from tbl_question_type_master where currentstatus=0 order by title ",$typeid,"Select"); ?></select></td></tr>
<tr valign="top"><th scope="row" width="40%" <?= admintdclass ?>>Question :</th><td <?= admintdclass ?>><select name="questionid" id="questionid">><? fillcombo("select typeid,question,count_ans from tbl_question_master where currentstatus=0 and typeid=",$questionid,"Select"); ?></select></td></tr>

<tr valign="top"><th scope="row" width="40%" <?= admintdclass ?>>Answer :</th>
<? for($i=1;$i<=$count_ans;$i++){ ?>
<td <?= admintdclass ?>><input type="text" name="answer.$i" id="answer" value="<?=$answer?>"></td>
<? } ?>
</tr>
     <tr valign="top">
     <th scope="row" <?= adminthclass ?>>&nbsp;</th>
     <td <?= admintdclass ?>><input name="Submit" type="submit" <?= adminbuttonclass ?> title="Submit" value="Submit" alt="Submit">
     <input name="Reset" type="reset" <?= adminbuttonclass ?> value="Reset" title="Reset" alt="Reset">
	</td>
    </tr>
    </table>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>

	