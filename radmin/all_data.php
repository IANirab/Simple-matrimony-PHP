<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$title_head='';
if(isset($_GET['b']) && $_GET['b']!=''){
	$action = $_GET['b'];	
}
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>
<?= $admintitle ?>
</title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="jquery/jquery.js"></script>

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
      <?
      if($action==1)
	  {
		$title_head='Gender';	 
		$tblnm='tbldatingendermaster';
		$fetch_fld='genderid,gender';
		$ordrby='gender';
		$null='';
	  }
	  elseif($action==2)
	  {
		$title_head='Country';	 
		$tblnm='tbldatingcountrymaster';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  elseif($action==3)
	  {
		$title_head='State';	 
		$tblnm=' tbldating_state_master';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  elseif($action==4)
	  {
		$title_head='City';	 
		$tblnm=' tbldating_city_master';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	    elseif($action==5)
	  {
		$title_head='Marital Status';	 
		$tblnm='tbldatingmaritalstatusmaster';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	    elseif($action==6)
	  {
		$title_head='Height';	 
		$tblnm='tbldatingheightmaster';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	    elseif($action==7)
	  {
		$title_head='Weight';	 
		$tblnm='tbldatingweightmaster';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	    elseif($action==8)
	  {
		$title_head='Religian';	 
		$tblnm='tbldatingreligianmaster';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  elseif($action==9)
	  {
		$title_head='Cast';	 
		$tblnm='tbldatingcastmaster';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  elseif($action==10)
	  {
		$title_head='Community';	 
		$tblnm='tbldatingmothertonguemaster';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  elseif($action==11)
	  {
		$title_head='Education';	 
		$tblnm=' tbl_education_master';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  elseif($action==12)
	  {
		$title_head='Occupation';	 
		$tblnm=' tbldatingoccupationmaster';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  elseif($action==13)
	  {
		$title_head='Currency';	 
		$tblnm='  tbldating_annual_income_currancy_master';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  elseif($action==14)
	  {
		$title_head='Income';	 
		$tblnm='  tbldating_annual_income_master';
		$fetch_fld='id,title';
		$ordrby='title';
		$null=' and title!="" ';
	  }
	  
	  
	  ?>
      
      
        <div id="center-in">
              <h1 class="pagetitle"><?=$title_head?> Manager</h1>       
              <div class="errorbox"></div>
              
          <div id="pagecontent">

            	<div class="Data_resu">
                	<ul>
                        <li class="col-md-6 Data_resu_left Data_head">
                            <strong>ID</strong><span>Title</span>
                        </li>
                        <li class="col-md-6 Data_resu_right Data_head">
                            <strong>ID</strong><span>Title</span>
                        </li>
                        	<?
						$i=1;
                        $searchqry = "";
                        $fromqry = " from ".$tblnm." where currentstatus in (0) ".$null." ";
                        $fromqry .= $searchqry;
                        
                        $result = getdata("select ".$fetch_fld." ". $fromqry ." order by ".$ordrby." asc ");
                        while($rs= mysqli_fetch_array($result))
                        {
                            $id=$rs[0];
                            $title=$rs[1];
							if($i%2==0)
							{
								$cls_li='col-md-6 Data_resu_left';
							}
							if($i%2!=0)
							{
								$cls_li='col-md-6 Data_resu_right';
							}
							
                        ?>
                           
                        <li class="<?=$cls_li?>">
                            <strong><?=$id?></strong><span><?=$title?></span>
                        </li>
                        <? $i++; } ?>
                        
                    </ul>
                                
                   
                </div>

            
            
            
          </div>
        
      </div>
    </div>
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
