<? 
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$filename ="insertfeatured";
$userid1 = '';
$userid2 = '';
$userid3 = '';
$action=0;
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){
	$user_mnager_umof_1 = user_mnager_umof_1();
	$user_mnager_umof_2 = user_mnager_umof_2();
	$user_mnager_umof_3 = user_mnager_umof_3();	
} else {
	$user_mnager_umof_1 = "N";	
	$user_mnager_umof_2 = "N";
	$user_mnager_umof_3 = "N";	
}


if($user_mnager_umof_3 == 'Y' || $user_mnager_umof_3 == 'N') {
		
	
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">

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
			<h1 class="pagetitle">Configure Featured Users</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
            <!-- ********* CONTENT START HERE *********-->
            <?= checkerroradmin()?>
            
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#fp1">Featured Profile (A)</a></li>
                <li><a data-toggle="tab" href="#fp2">Featured Profile (B)</a></li>
                <li><a data-toggle="tab" href="#fp3">Featured Profile (C)</a></li>
              </ul>
            
              <div class="tab-content">
                
                <div id="fp1" class="tab-pane fade in active ">
                 
                <?
                $section1= "FM";
                
                $result1 = getdata("select userid from tbldatindatigadminfeaturedusermaster where currentstatus =0 and section='".$section1."'");
                while ($rs1 = mysqli_fetch_array($result1))
                {
                if ($userid1 != "")
                    $userid1 .= ';';
                $userid1 .= $rs1[0];
                }
                freeingresult($result1);
                ?>
                  <form name=frmdocument method=post action ="<?= $filename ?>.php" class="form-horizontal" >
            <div class="form-group">
            <label>User Id:</label>
            
            <input type="hidden" name="section1" value="<?= $section1 ?>">
            <textarea name="userid1" class="form-control" title="Featured Id" style="width:100%;" rows="3" alt="Featured Id" ><?= $userid1  ?></textarea>
            <note>[ Separated by ;]</note>
                          </div>
                      
                      <div class="form-group common_button">
                      <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
                          <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
                        </div>
                    </form>
                  
                </div>
                
                <div id="fp2" class="tab-pane fade">
                 
                  <?
                $section2= "MM";
                
                $result2 = getdata("select userid from tbldatindatigadminfeaturedusermaster where currentstatus =0 and section='".$section2."'");
                while ($rs2 = mysqli_fetch_array($result2))
                {
                if ($userid2 != "")
                    $userid2 .= ';';
                $userid2 .= $rs2[0];
                }
                freeingresult($result2);
                ?>
                  <form name=frmdocument method=post action ="<?= $filename ?>.php" class="form-horizontal" >
            <div class="form-group">
            <label>User Id:</label>
            
            <input type="hidden" name="section2" value="<?= $section2 ?>">
            <textarea name="userid2" class="form-control" title="Featured Id" style="width:100%;" rows="3" alt="Featured Id" ><?= $userid2 ?></textarea>
            <note>[ Separated by ;]</note>
                          </div>
                      
                      <div class="form-group common_button">
                      <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
                          <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
                        </div>
                    </form>
                </div>
                
                <div id="fp3" class="tab-pane fade">
                 
                 
                   <?
                $section3= "WM";
                
                $result3 = getdata("select userid from tbldatindatigadminfeaturedusermaster where currentstatus =0 and section='".$section3."'");
                while ($rs3 = mysqli_fetch_array($result3))
                {
                if ($userid3 != "")
                    $userid3 .= ';';
                $userid3 .= $rs3[0];
                }
                freeingresult($result3);
                ?>
                  <form name=frmdocument method=post action ="<?= $filename ?>.php" class="form-horizontal" >
            <div class="form-group">
            <label>User Id:</label>
            
            <input type="hidden" name="section3" value="<?= $section3 ?>">
            <textarea name="userid3" class="form-control" title="Featured Id" style="width:100%;" rows="3" alt="Featured Id" ><?= $userid3  ?></textarea>
            <note>[ Separated by ;]</note>
                          </div>
                      
                      <div class="form-group common_button">
                      <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
                          <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
                        </div>
                    </form>
                
                 
                </div>
                
              </div>
                
            <!-- ********* CONTENT END HERE *********-->
            </div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $addfeatured_help ?></div>
			<br style="clear:both">
            
            
            
            
            
    



            
            
            
		</div>
		<!-- CENTER END ######################## -->
        
        
        
        
        

        
        
        
	</div>
    </div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>

</body>
</html>
<? } else { 
	header("location:dashboard.php?msg=no");
} ?>