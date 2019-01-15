<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
$Description = "";	
$PackageTypeId =0;	
$Price = "";	
$Days = "";	
$display_price = "";	
$display_price_curr_code = "";	
$formattypeid =0;	
$languageid= 0;
$templateid = 0;
$locationid = 0;
$no_of_contact_display = "";
$sms_qty = "";
$default_type = "";
$allow_messanger = "";
$order_by ='';
$note = "";
$parentid ="";
$package_feature='';
$packagefeaturearray=array();
$packageimg='';
$help='';
$taxtype='';
$small_note= "";
$big_note=  "";
$smallimg='';
$express_count='';
$ecard_count='';

$filename ="packageinsert";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$pkg_mgmnt_pm_1 = pkg_mgmnt_pm_1();
	$pkg_mgmnt_pm_2 = pkg_mgmnt_pm_2();
	$pkg_mgmnt_pm_4 = pkg_mgmnt_pm_4();
	$pkg_mgmnt_pm_5 = pkg_mgmnt_pm_5();
} else {	
	$pkg_mgmnt_pm_1 = "N";
	$pkg_mgmnt_pm_2 = "N";
	$pkg_mgmnt_pm_4 = "N";
	$pkg_mgmnt_pm_5 = "N";
}
if($pkg_mgmnt_pm_1 == 'Y' || $pkg_mgmnt_pm_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select Description,PackageTypeId,Price,Days,formattypeid ,display_price,display_price_curr_code,no_of_contact_display, sms_qty,default_type,allow_messenger,note,parentid,order_by,package_feature,image,hsncode,small_note,big_note,smallimg,express_count,ecard_count from tbldatingpackagemaster where CurrentStatus in (0,2) and PackageId=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$Description = $rs[0];
		$PackageTypeId = $rs[1];
		$Price= $rs[2];
		$Days = $rs[3];
		$formattypeid = $rs[4];
		$display_price = $rs[5];
		$display_price_curr_code= $rs[6];
		$no_of_contact_display = $rs[7];
		$sms_qty = $rs['sms_qty'];
		$default_type = $rs['default_type'];
		$allow_messanger = $rs['allow_messenger'];
		$note = $rs['note'];
		$parentid = $rs['parentid'];
		$order_by = $rs['order_by'];
		$package_feature = $rs['package_feature'];
		$packagefeaturearray=explode(',',$package_feature);
		$packageimg= $rs['image'];
		$taxtype= $rs['hsncode'];
		$small_note= $rs['small_note'];
		$big_note= $rs['big_note'];
		$smallimg=$rs['smallimg'];
		$express_count=$rs['express_count'];
		$ecard_count=$rs['ecard_count'];
		
		
		
	}
	freeingresult($result);
}


if(isset($_GET['c']) && $_GET['c']!='')
{
	$c=$_GET['c'];
}else{$c='';}



$help='';
$helptext='';
$helpaction='';

function get_help($helpaction){
$get_help = getdata("select fldval from tbldatingsettingmaster where settingid='".$helpaction."'  and category='PackageForm_Help' and currentstatus=1");
$rs_help= mysqli_fetch_array($get_help);
$helptext=$rs_help['fldval'];
       
	    if($helptext!=''){
		$help=$helptext;
		}else{
		$help='';
		}
		 
    return $help;
}


?>



<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; 
charset=utf-8">
<link rel="stylesheet" href="<?=$sitepath?>/js/selectbox/prism.css">
<link rel="stylesheet" href="<?=$sitepath?>/js/selectbox/chosen.css">


<script>
		  function  get_featureblock(val)
		  {
			  	if(val==0.0)
				{
					alert('select any type');
				}
		
				if(val==3)
				{
					$("#enahncement_sel").show();
					$("#sms_blck").hide();
					
					$("#enhanceblock1").show();
					$("#enhanceblock2").show();
				}
				else if(val==1 || val==2)
				{
					$("#sms_blck").show();
					$("#enahncement_sel").hide();
					
					$("#enhanceblock1").hide();
					$("#enhanceblock2").hide();
				}
				else
				{
					$("#sms_blck").hide();
					$("#enahncement_sel").hide();
					
					$("#enhanceblock1").hide();
					$("#enhanceblock2").hide();
				}
		
		
		
			  
			$.post('get_package_typehelp.php',
			{
				id:val
			}, function (data)
			{
				$("#packagetype_help").show();
			 	$("#packagetype_help").html(data);
			   //location.reload();
			})	
			  
			  if(val==1 ||  val==2)
			  {
				  $("#package_featureblock").show();
			  }
			  else
			  {
				  $("#package_featureblock").hide();
			  }
	}
</script>



          <script>
		  function show_smspck(id)
		  {
			  if(id=='Y')
			  {
		  		$("#chk_sms").val('N');
				$("#sms_pck").hide();
			  }
			  if(id=='N')
			  {
		  		$("#chk_sms").val('Y');
				$("#sms_pck").show();
			  }
			  
		  }
		  </script>

<link rel="stylesheet" href="../jquery/tooltip/bubble-tooltip.css" type="text/css" />
<script type='text/javascript' src='../jquery/tooltip/bubble-tooltip.js'></script>

</head>
<body onLoad="start()">
<!--<div id="bubble_tooltip" class="packagem">
    <div class="bubble_top"><span></span></div>
    <div class="bubble_middle"><span id="bubble_tooltip_content">&nbsp;</span></div>
    <div class="bubble_bottom"></div>
  </div>-->
  
  
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
			<h1 class="pagetitle">Add Package</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="package_added Choosan_Form">
            <div class="common-form">
<!-- ********* CONTENT START HERE *********-->

   


<? $br= '".<br/>."'?>


<?= checkerroradmin()?>


<script>
function validate_package()
{
	  var txttitle=$("#txttitle").val();
	  var cmbpackagetype=$("#cmbpackagetype").val();
	  var txtprice=$("#txtprice").val();
	  var txtdays=$("#txtdays").val();
	  
	  if(txttitle=='')
	  {
		  error_add('notify_danger','<strong>Please enter title</strong>','txttitle','red');
		  error_remove('notify_danger',5000);
		  return false;
	  }
	  
	  if(cmbpackagetype==0.0)
	  {
		  error_add('notify_danger','<strong>Please select package type </strong>','cmbpackagetype','red');
		  error_remove('notify_danger',5000);
		  return false;
	  }
	  
	  if(txtprice=='')
	  {
		  error_add('notify_danger','<strong>Please enter price</strong>','txtprice','red');
		  error_remove('notify_danger',5000);
		  return false;
	  }
	  
	  if(txtdays=='')
	  {
		  error_add('notify_danger','<strong>Please enter days</strong>','txtdays','red');
		  error_remove('notify_danger',5000);
		  return false;
	  }
	  
	  return true;
}
</script>

<?
if($pkg_mgmnt_pm_2 == 'Y' || $pkg_mgmnt_pm_2 == 'N') { ?>
<form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>&c=<?=$c?>" 
 ENCTYPE="multipart/form-data" class="form-horizontal " onSubmit="return validate_package();">













 


      <div class="form-group">
                <label>title : <? if(get_help(182)!='') { ?>
             <a href="#" class="Mytooltipa" data-toggle="tooltip" title="<?=get_help(182)?>"> <img   src="images/help.png" ></a>
             <!---<img id="helptab" src="images/help.png" onMouseOver="showToolTip(event,'<?=get_help(182)?>');return false" onMouseOut="hideToolTip()">---> 
			 
			 <? } ?> </label>
			  <input type="text" name="txttitle" id="txttitle" value="<?= $Description ?>" class="form-control" >

       </div>
          
       
         
         
         
   <? if($enable_tax_module == 'Y' || $International_selling=='Y'){ ?>       
         
    <div class="form-group">
            <div class="widhtsetr">
                <label>Order By :</label>
			    <input type="text" name="order_by" class="form-control" value="<?=$order_by?>">
              </div>
            
            <div class="widhtsetr control-label_25 ">
                <label>Tax  :</label>
                <select name="taxtype" class="form-control">
                <? fillcombo("SELECT id, title from tbldatingtaxmaster WHERE currentstatus=0",$taxtype,"Select"); ?>
                </select>
            </div>
    </div>
         
      <? }?>   
         
         
         
         
         
		
          
         <div class="form-group">
                <label>note :</label>
             
			  <textarea name="txtnote" rows="2"  class="form-control" cols="30"   ><?= $note ?></textarea>
              </div> 
          <?
		  if($PackageTypeId==1)
			{
				$parent  ='';
			}
			else
			{
				$parent = 'style="display:none;"';
			}
		  ?>
          
          
        
          
          
          
          
          
	<div class="form-group">
                <div class="widhtsetr"><label>package type : <? if(get_help(183)!='') { ?>
           <? } ?></label>
               
              <select name="cmbpackagetype" id="cmbpackagetype" class="form-control" onChange="get_featureblock(this.value)" >
              <option value="0.0">Select</option>
<? fillcombo("select PackageTypeId,Description from tbldatingpackagetypemaster where CurrentStatus=0 order by Description ",$PackageTypeId,""); ?>
</select>
              </div>
            
              
         <div class="widhtsetr control-label_25 " id="frmt_parent" <? //$parent?>>
         <label>Description :</label>
                   <p id="packagetype_help" style="display:none"></p>
          </div>
              </div>
              <!-- <select name="parentid" class="form-control">
<? fillcombo("select PackageId,Description from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId='1' and parentid='' OR parentid='0.0'  order by Description   ",$parentid,"Select"); ?>
</select> -->
             
              
           
           <?php
		   if($PackageTypeId==1 || $PackageTypeId==2){
			  $package_featureblock_st='style="display:block"';
			   
		   }else{
			  $package_featureblock_st='style="display:none"'; 
		   }
		   ?>
           
            
     
          <div  id="package_featureblock" <?=$package_featureblock_st?>>
          <div class="form-group">
          <div class="widhtsetr">
            <label>Package Feature :</label>
            <div class="select2-wrapper MYseletion">
                <select data-placeholder="Select Package Feature" class="form-control form-control select2-multiple select2-hidden-accessible" multiple tabindex="4" name="package_feature[]" id="package_feature">
                      
                   <option value="0.0" disabled>Select </option>
          <?  $qry = getdata("select id,title from tbldatingpackagefeaturedmaster where CurrentStatus=0 order by id");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"  <? if(in_array($rs[0],$packagefeaturearray)){ echo "selected"; } ?>><?=$rs[1]?></option> 
             <? } ?>        
   	</select>
	    </div>
        </div>
        </div>
     
     <div class="form-group singleline_class">
     	<div class="widhtsetr">
                <label>Contact Count:</label>
			<input type="text" name="no_of_contact_display"   class="form-control"value="<?= $no_of_contact_display ?>">
          
         </div>
        <div class="widhtsetr">
                  <label>Express Interest Count</label>
                  <input type="text"  class="form-control" name="excnt" id="excnt" value="<?=$express_count?>"/>
                </div>
        <div class="widhtsetr control-label_25 ">
                  <label>Ecard Count</label>
                  <input type="text"  class="form-control" name="ecardcnt" id="ecardcnt" value="<?=$ecard_count?>"/>
                </div>
     </div>
          
             
       
                
		        
      
    
          
          
              
          
              
         
              
                
              
               </div>
              
		   <div class="form-group">
                <div class="widhtsetr"><label> Price :</label>
              <input type="text" name="txtprice" id="txtprice" class="form-control"    value="<?= $Price ?>"
              <? if($action==28){?> readonly <? } ?> >
              
              </div>
		 
                <div class="widhtsetr control-label_25 "><label>Days :</label>
              <input type="text" name="txtdays" id="txtdays"  class="form-control"   value="<?= $Days ?>">
             
              </div>
              </div>
	
      <?
         if($PackageTypeId==1 || $PackageTypeId==2)
		 {
			$sms_style='style="display:block"';	
		 }else{$sms_style='style="display:none"';	}
		 ?>	  
    
    <div id="sms_blck" <?=$sms_style?>>
     <div class="form-group"> 
     	<div class="widhtsetr">    
	<checkbox>
     Enable SMS &nbsp;&nbsp;
    <label class="switch">         
  <input type="checkbox" id="chk_sms" onChange="show_smspck(this.value)"    
	<? if($sms_qty!=''){?> checked value="Y" <? }else{ ?> value="N"<? } ?> >
  <div class="slider round"></div>  
     </label> 
     </checkbox>
     </div>
     	<div class="widhtsetr control-label_25 ">
        	<? if($sms_qty!='')
            {
                $sms_style='style="display:block"';
            }else{$sms_style='style="display:none"';}
             ?>
			<div id="sms_pck"  class="form-group" <?=$sms_style?>>
                <label>SMS Count  :</label>
               <input type="text" name="sms_qty" class="form-control"    value="<?= $sms_qty?>">
           </div>   
        </div>
    </div>
			
	
    	 
            
              		
	</div>
    
    
     <?
         if($PackageTypeId==3)
		 {
			$enh_style='style="display:block"';	
		 }else{$enh_style='style="display:none"';	}
		 ?>

            <div class="form-group" id="enahncement_sel" <?=$enh_style?>>
             <div class="widhtsetr">
            	<label>Select Enhancement :</label>
              <select name="cmbformat" class="form-control">
<? fillcombo("select FormatTypeId,Description from tbldatingpackageformattypemaster where CurrentStatus=0 order by Description ",$formattypeid,"Select"); ?>
</select>
			</div>
              </div>
              
            
              
               <?php
		   if($PackageTypeId==3){
			  $enhanceblock1_st='style="display:block"';
			  $enhanceblock2_st='style="display:block"';
		   }else{
			  $enhanceblock1_st='style="display:none"'; 
			  $enhanceblock2_st='style="display:none"';
		   }
		   ?>
              
              
          
                 <div class="form-group">
                        <div class="widhtsetr">
                            <label>Preview Image</label>
                            <input type="file" name="packageimg" id="packageimg" value=""/><br>
                            <? if ($packageimg  != "") { ?>
                            <img  src="../uploadfiles/site_<?=$sitethemefolder?>/<?= $packageimg ?>" height=80 width=80 align="absmiddle">
                            <? } ?>
                         </div>
                 
                            <div class="widhtsetr control-label_25" id="enhanceblock1" <?=$enhanceblock1_st?>>
                            <label>Small Image</label>
                            <input type="file" name="smallimg" id="smallimg" value=""/><br>
                            <? if ($smallimg  != "") { ?>
                            <img  src="../uploadfiles/site_<?=$sitethemefolder?>/<?= $smallimg ?>" height=80 width=80 align="absmiddle">
                            <? } ?>
                            </div>
                  </div>
          
        
                
				
                <div class="form-group" id="enhanceblock2" <?=$enhanceblock2_st?>>
                  <div class="widhtsetr">
                   <label>One line Description</label>
                <textarea name="small_note" id="small_note" rows="2"  class="form-control" ><?=$small_note?></textarea>
                  </div>
		 
                   <div class="widhtsetr control-label_25 ">
                     <label>Preview Description</label>
                   <textarea name="big_note" id="big_note" rows="4"  class="form-control" ><?=$big_note?></textarea>     
                    </div>
               </div>                                               
          
          
          
         <div class="form-group common_button">
         <input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
   
    </form>
	<? } ?>      
<!-- ********* CONTENT END HERE *********-->
			
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $packagemaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
    
    </div>
</div>
	
    
 
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->

  
  	<!------------- form chosne js start --------------->
<link href='<?=$sitepath?>2018js/chosen/multi_seletion.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?=$sitepath?>2018js/chosen/select2.full.js"></script> 
				<!------------- form chosne js end --------------->
  
  
                  
<script>
	$( ".select2-single, .select2-multiple" ).select2( {
		theme: "bootstrap",
		//placeholder: "Select a State",
		maximumSelectionSize: 20,
		containerCssClass: ':all:'
	} );

	$( ":checkbox" ).on( "click", function() {
		$( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
	});
</script>
  

  

</body>
</html>
<? } else {
	header("location:dashboard.php?msg=no");
	exit;

} ?>