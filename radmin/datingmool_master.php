<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$title="";
$languageid="";
$subcasteid="";

//$filename ="tbldatingmool_master_insert";



if(isset($_SESSION["title"]) && $_SESSION["title"] != "") {
		$title = $_SESSION["title"];
		}

$filename ="datingmool_insert";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,languageid,subcasteid from tbldatingmool_master where id=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title=$rs[0];
$languageid=$rs[1];
$subcasteid=$rs[2];

	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById("title").value==""){alert("Plese Enter title"); document.getElementById("title").focus(); return false;}else {return true;}	
}
</script>
<title>
<?= $admintitle ?>
</title>
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
          <div id="pagetitle">
            <h1>mool master</h1>
          </div>
          <!-- ********* TITLE END HERE *********-->
          <div id="pagecontent"> 
            <!-- ********* CONTENT START HERE *********-->
                          
			  <?php  if(isset($_SESSION["adminerror"]) && $_SESSION["adminerror"]!='') {?>
              <?php echo $_SESSION["adminerror"]; ?>
              <?php unset($_SESSION["adminerror"]); ?>
              <?php } ?>
            
            <form name="frmdocument" method="post" action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" onSubmit="return validate();">
              <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="formborder">
                
                <tr valign="top">
                  <th scope="row" width="40%" <?= admintdclass ?>>language :</th>
                  <td <?= admintdclass ?>><select name="languageid" id="languageid">
                      >
                      <? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
                    </select></td>
                </tr>
                <tr valign="top">
                  <th scope="row" width="40%" <?= admintdclass ?>>subcaste :</th>
                  <td <?= admintdclass ?>><select name="subcasteid" id="subcasteid">
                      >
                      <? fillcombo("select id,title from tbldatingsubcastmaster where currentstatus=0 order by title ",$subcasteid,"Select"); ?>
                    </select></td>
                </tr>
                <tr valign="top">
                  <th scope="row" width="40%" <?= admintdclass ?>>title :</th>
                  <td <?= admintdclass ?>><input type="text" name="title" id="title" value="<?=$title?>"></td>
                </tr>
                <tr valign="top">
                  <th scope="row" <?= adminthclass ?>>&nbsp;</th>
                  <td <?= admintdclass ?>><input name="Submit" type="submit" <?= adminbuttonclass ?> title="Submit" value="Submit" alt="Submit">
                    <input name="Reset" type="reset" <?= adminbuttonclass ?> value="Reset" title="Reset" alt="Reset"></td>
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
