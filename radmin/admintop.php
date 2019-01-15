<? 
$curr_url=$_SERVER['PHP_SELF'];

if(findsettingvalue('redirect_ssl')=='Y')
{
	if($_SERVER['HTTPS']=='')
	{
		header("location:".findsettingvalue('redirect_right')."$curr_url");
	}
}

if($_SERVER['HTTP_HOST']==findsettingvalue('redirect_false'))
{
    header("location:".findsettingvalue('redirect_right')."$curr_url");
}

?>


<!-- TOP START ######################## -->

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link href="<?=$sitepath?>assets/<?=$sitethemefolder?>/font-awesome.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href="css/animatebutton.css" rel="stylesheet" type="text/css">
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<?
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$logo_image_nm = findsettingvalue("Logo_filenm");
//$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
//$adm_name = getonefielddata("SELECT name from tbldatingadminloginmaster WHERE LoginId=".$login_id);
$logo_sitename = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=6 AND fldnm='CompanyName'");
?>


<div class="header_wrapper">
	<div  class="container container_top">
    <div class="left_welcome">
         <!-- <img src="images/adminclientlogo.png" />
    -->      
          <? if ($logo_image_nm != "") { ?> <img src='../uploadfiles/site_<?=$sitethemefolder;?>/<?= $logo_image_nm ?>' align="absmiddle" style="vertical-align:middle"><? } ?>
          </br>
          <span><?=$logo_sitename?>
		  <!--adm_name--></span>
          
       </div>
    
		<div class="headerlink">
        	<ul>
            	<li><a href="dashboard.php" class="hvr-rectangle-out"> <i class="fa fa-home"></i> Home</a></li>
                <li><a href="settingmanager.php" class="hvr-rectangle-out"> <i class="fa fa-cog"></i> Setting</a></li>
                <li><a href="homepagemanager.php" class="hvr-rectangle-out"><i class="fa fa-picture-o" aria-hidden="true"></i> Page</a></li>
                <li><a href="logout.php" title="Logout" class="hvr-rectangle-out"><i class="fa fa-sign-out"></i> Logout</a></li>
             
                
            </ul>
        
        </div>
       
        
        
        
        
        
       <? 
	   if(isset($_SESSION[$session_name_initital.'adminlogin']) && $_SESSION[$session_name_initital.'adminlogin']!=''){
	   $unapproved_count = getonefielddata("select count(tbldatingusermaster.userid) from tbldatingusermaster where tbldatingusermaster.currentstatus in (1)");
	   $unapproved_albums = 0;
			$albumdata=getdata("select DISTINCT(CreateBy) from tbldatingalbummaster where currentstatus=1");
			$albumcreateby="";
			while($album=mysqli_fetch_array($albumdata)){
				$albumcreateby .=$album[0].",";
			}if($albumcreateby!=''){
				$albumcreateby=substr($albumcreateby,0,-1);
			}
			if($albumcreateby!=''){
				$album_create_arr = explode(",",$albumcreateby);
				$unapproved_albums = count($album_create_arr);
			}
		 $unclear_invoices = getonefielddata("select count(paymentid) from tbldatingpaymentmaster,tbldatingusermaster where tbldatingpaymentmaster.currentstatus in (0) and clear='N' and tbldatingusermaster.userid=tbldatingpaymentmaster.CreateBy
		  and tbldatingpaymentmaster.paymenttypeid!='' order by paymentid desc");	
		 $unapproved_profileimages = getonefielddata("SELECT count(userid) from tbldatingusermaster WHERE imagenm!='' AND currentstatus IN (0,1) AND image_approval='N'");
		 $last7day_inq=getonefielddata("SELECT count(id) from tbl_dating_inquiry_master 
		 WHERE  to_days(curdate()) - to_days(createdate) < 7 ");
	   ?>
    
        
	   <? 
	   }
         ?>
         
         
         
         
         
        
        </div>
	</div>
</div>
<!-- TOP END ######################## -->
<script language="javascript">
function start()
{
}
</script>




	<!--------------------------------- new error msg start --------------------------------->    


<script>
function error_add(divid,msg,focusid,focuscolor)
{
	if(focusid!='')
	{
		$('#'+focusid).addClass(focuscolor);
	}
	if(focuscolor!='')
	{
		document.getElementById(focusid).focus();
	}
	
	
	$('#'+divid).addClass('alertPozition');
	$('#'+divid+'_txt').html(msg);
	
	setTimeout(function() {
    			$('#'+focusid).removeClass(focuscolor);
		}, 5000);
		
}

function error_remove(divid,seconds)
{
		setTimeout(function() {
    	$("#"+divid).removeClass('alertPozition');
		}, seconds);	
	
}

</script>

<div class="alert alert-success"  id="notify_sucess" > 
<i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
<span id="notify_sucess_txt"> </span></strong>
<a  class="close" onclick="error_notify_remove('notify_sucess',100);" title="close">x</a>
</div>



<div class="alert alert-danger"  id="notify_danger">
 <i class="fa fa-close" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
 <span id="notify_danger_txt"> </span></strong>
  <a class="close" onclick="error_notify_remove('notify_danger',100);" title="close">x</a> 
 </div>


<div class="alert alert-info"  id="notify_info" >
  <i class="fa fa-life-ring" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
   <span id="notify_info_txt"> </span></strong>
   <a class="close" onclick="error_notify_remove('notify_info',100);" title="close">x</a> 
</div>

<div class="alert alert-warning"  id="notify_warning" >
  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
   <span id="notify_warning_txt"> </span></strong>
  <a class="close" onclick="error_notify_remove('notify_warning',100);" title="close">x</a> 
</div>


	<!--------------------------------- new error msg end --------------------------------->   