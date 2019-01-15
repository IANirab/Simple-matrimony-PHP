<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;


$title = "";	
$note = "";
$hsncode = "";
$igst = "";
$cgst = "";;
$sgst = "";
$cess1 = "";
$cess2 = "";
$fromdate = "";
$todate = "";
$currentstatus= "";



	
$filename ="taxinsert";


if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,note,hsncode,igst,cgst,sgst,cess1,cess2,fromdate,todate,currentstatus from tbldatingtaxmaster where currentstatus in (0,1) and id=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title = $rs[0];			
		$note =$rs[1];
		$hsncode =$rs[2];
		$igst =$rs[3];
		$cgst =$rs[4];
		$sgst =$rs[5];
		$cess1 =$rs[6];
		$cess2 =$rs[7];
		$fromdate =$rs[8];
		$todate =$rs[9];
		$currentstatus=$rs[10];
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-----take this for datepicker------------->
<script src="../jquery/jquery.js"></script>
<script>
  $( function() {
    $( "#from_date" ).datepicker();
  } );
  
  $( function() {
    $( "#to_date" ).datepicker();
  } );
  </script>
<!-----take this for datepicker------------->

</head>
<body>

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">Add Tax</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>


     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>" class="form-horizontal ">
 
		  
          	<p>* All tax value should be in % </p>
            
            <br/>
          
          
          	<div class="form-group singleline_class">
            
		      <div class="widhtsetr"> 
              <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" class="form-control" size=35 value ="<?= $title  ?>" required>
              </div>
              </div>
              
              <div class="widhtsetr">
              <div class="form-group">
              <label>HSN Code</label>
              <input type="text" name="hsncode" class="form-control" value ="<?= $hsncode  ?>">
              </div>
              </div>
              
              </div>
              
               <div class="form-group"><label>Note</label>
               <textarea  name="note" class="form-control" ><?= $note  ?></textarea>
              </div>
              
               
               <? if($enable_tax_module=='Y'){ ?>
                <div class="form-group singleline_class">
                        <div class="widhtsetr">
                            <div class="form-group"><label>IGST</label>
                            <input type="text" name="igst" class="form-control" value ="<?= $igst  ?>">
                            </div>
                       </div>
                        
                        <div class="widhtsetr">
                                <div class="form-group"><label>CGST</label>
                                <input type="text" name="cgst" class="form-control" value ="<?= $cgst  ?>">
                                </div>
                         </div>
                        
                        <div class="widhtsetr control-label_25">
                                <div class="form-group"><label>SGST</label>
                                <input type="text" name="sgst" class="form-control" value ="<?= $sgst  ?>">
                                </div> 
                        </div>
              </div>
              <? } ?>
               
             <div class="form-group singleline_class"> 
                     <!--<div class="widhtsetr"> 
                              <div class="form-group"><label>CESS 1</label>
                              <input type="text" name="cess1" class="form-control" value ="<?= $cess1  ?>">
                              </div>
                      </div>-->
                          <? if($International_selling=='Y'){ ?>
                     <div class="widhtsetr"> 
                              <div class="form-group"><label>Tax</label>
                              <input type="text" name="cess2" class="form-control" value ="<?= $cess2  ?>">
                              </div>
                      </div>
              		<? } ?>
              </div>
               
              
              <div class="form-group singleline_class">
                        <div class="widhtsetr">
                                <div class="form-group"><label>From date</label>
                                <input type="text" name="from_date" id="from_date" class="form-control" value ="<?=$fromdate?>">
                                </div>
                       </div>
                        
                        <div class="widhtsetr">
                                <div class="form-group"><label>To date</label>
                                <input type="text" name="to_date"  id="to_date" class="form-control" value ="<?=$todate?>"
                                </div>
                         </div>
                       
              </div>
             </div>
              
              
      <div class="form-group common_button">
         <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form>     

<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $countrymaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	</div>
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->

   <!-----take this for datepicker------------->
   <link rel="stylesheet" href="jquery/date/jquery-ui.css">
   <script src="jquery/date/jquery-1.12.4.js"></script>
   <script src="jquery/date/jquery-ui.js"></script>
   <!-----take this for datepicker------------->
</div>
</div>
</body>
</html>
