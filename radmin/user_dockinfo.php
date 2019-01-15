<? session_start();
 require_once("commonfileadmin.php");
 checkadminlogin();

if(isset($_POST['b']) && $_POST['b']!='')
{
	 $userid=$_POST['b'];
	 $curruserid=$_POST['b'];
}else{
	$userid=0;
	$curruserid=0;
}
if(isset($_POST['d']) && $_POST['d']!='')
{
    $dockid=$_POST['d']; 
}else{
	$dockid='';
}

$file=getonefielddata("SELECT image from   tbldating_userdoc WHERE id='".$dockid."' "); 
 

 

if($file!='')
{
	 // copy image start 
	$source_path1=$securepath;
	$des_path1=$abspath."uploadfiles/document/";
	$des_path2='../uploadfiles/document/';
	
	$old1=$source_path1.$file;
	$des1=$des_path1.$file;
	if(file_exists($old1))
	{
		copy($old1, $des1);
	}
	// copy image end 
}



 
 
//$allowed_ip=getonefielddata("SELECT allowed_ip from  tbldatingadminloginmaster WHERE LoginId='1' ");
//
//if($_SERVER['REMOTE_ADDR']!=$allowed_ip)
//{
//	echo "<br><br><h2 style='text-align:center'>You are not authorized to view this page</h2>";
//	exit;
//}





$image_ext_array=array("png","jpeg","","jpg","gif");


$doc_image=getonefielddata("SELECT image from   tbldating_userdoc WHERE id='".$dockid."' ");
$doc_refno=getonefielddata("SELECT refno from   tbldating_userdoc WHERE id='".$dockid."' ");


$chk_documenttype_ext=explode(".",$doc_image);
	
//get dock details
$result_doc_data = getdata("select docid,typeid,currentstatus from tbldating_userdoc where currentstatus in (0,1,2) and id='".$dockid."'");       
$rsdock_data= mysqli_fetch_array($result_doc_data);
$d_dockid=$rsdock_data['docid'];
$d_typeid=$rsdock_data['typeid'];
$d_currentstatus=$rsdock_data['currentstatus'];

  $imp_data=getonefielddata("SELECT imp_data from tbldating_doct_detail WHERE id='".$d_dockid."' and type='".$d_typeid."' ");
 

$name=getonefielddata("SELECT name from  tbldatingusermaster WHERE userid='".$userid."' ");
$Badgename =getonefielddata("SELECT title from  tbldating_docmaster WHERE id='".$d_dockid."' ");
$Badgeimage =getonefielddata("SELECT image from  tbldating_docmaster WHERE id='".$d_dockid."' ");
$documetname =getonefielddata("SELECT title from  tbldating_doct_detail WHERE id='".$d_typeid."' ");
 
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="BadgesADetails">
  <h2> Badges Details </h2>
    <?=$Badgename?>&nbsp;&nbsp;(<?=$documetname?>) </h4> <br/>
   <img src="../assets/<?=$sitethemefolder?>/images/<?=$Badgeimage?>" height="100" width="100">
   </div>
</div>
 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">  
 	<div class="UserADetails">
     <h2> User Details </h2>
   <h4><strong>User name </strong>  <br />  <?=$name?></h4> <br/>
<?
if($imp_data!=''){
     $doc_data=explode(",",$imp_data);
	 for ($x = 0; $x <= count($doc_data)-1; $x++) {
		
		   $fetchdocdata=getonefielddata("SELECT $doc_data[$x] from tbldatingusermaster WHERE userid='".$userid."' and currentstatus in (0,1)");
		  $chk_type=explode(".",$fetchdocdata);


          ?>    
		 
				   <? if(isset($chk_type[1]) && in_array($chk_type[1],$image_ext_array) ){?>
                   <figure><img src="../uploadfiles/<?=$fetchdocdata?>"></figure><br/>
                   <? }else{?>
					   
					     <span class="DataU"><?=$fetchdocdata?></span>
                                
                   <? }?>
          
		  <?
			
    }

}
?>
</div>
</div>
  

  


 <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">  
    <div class="DocunentADetails">
    <h2> Document  Details </h2>
       <? if($doc_image!=''){?>
    <figure>
    
					<? if($chk_documenttype_ext[1]=='png' || $chk_documenttype_ext[1]=='jpeg' ||$chk_documenttype_ext[1]=='jpg' || $chk_documenttype_ext[1]=='gif'){?>
                    <img src="<?=$des_path2.$doc_image?>">
                    <? }else if($chk_documenttype_ext[1]=='pdf' || $chk_documenttype_ext[1]=='txt'){?>
                    <a href="<?=$des_path2.$doc_image?>" target="_blank">View Document</a>
                    <? }else{ ?>
                    <a href="<?=$des_path2.$doc_image?>">View Document</a>
                    <? }?>
       
    </figure>
  <? } ?><br>
  <p style="text-align:center">Referance Link / Number</p>
  <?=$doc_refno?>
    </div>

</div>



<br/><br/><br/>

<script>
function doc_approve(status,id){
	
	$("#disappove_block").hide();
	
	  $.post('documentapprove.php',{
			id:id,
			status:status	
			
		}, function (data){
			     $("#docerror").show();
			   	 $("#docerror").html(data);
				  setTimeout(function() {
							$('#docerror').fadeOut('fast');
							}, 1000);
	  })
}





function doc_disapprove(){
	
		$("#disappove_block").show();
}



function doc_disapprovesubmit(status,id){
	
	$("#disappove_block").show();
	
	var id=$("#id").val();
	var status=$("#status").val();
	var note=$("#note").val();
	
	    $.post('documentapprove.php',{
			id:id,
			status:status,
			note:note	
			
		}, function (data){
			   $("#docerror").show();
			   $("#docerror").html(data);
			    setTimeout(function() {
							$('#docerror').fadeOut('fast');
							}, 1000);
							$("#note").val("");
							$("#disappove_block").hide();
							
		})
	

}
</script>


 <div class="alert alert-success" id="docerror" style="display:none"></div>
<div class="form-group btn_outer">
<? if($d_currentstatus==1 || $d_currentstatus==2){?>
<input type="button" value="Approve" class="btn btn-success" onClick="doc_approve(0,<?=$dockid?>);">
<? } ?>
<? if($d_currentstatus==0 || $d_currentstatus==1){?>
<input type="button" value="Dis Approve" class="btn btn-danger" onClick="doc_disapprove();">
<? }?>
</div>




<div id="disappove_block" style="display:none">
 <form>
 
              <div class="form-group"><label>Note</label>
              <input type="text" name="note" id="note"class="form-control" size=35 value ="">
              </div>
              
              <input type="hidden" name="status" id="status" value="2"/>
              <input type="hidden" name="id" id="id" value="<?=$dockid?>"/>
              <input type="button" value="Submit" class="btn" onClick="doc_disapprovesubmit()">

</form>
<div>



            
	
