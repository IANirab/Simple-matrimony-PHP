<? require_once("commonfileadmin.php");
	
if(isset($_POST['b']) && $_POST['b']!='')
{
	$type=$_POST['b'];	

}else{

   $type='';

}


//insert 

if(isset($_POST['title']) && $_POST['title']!='')
{
	 $title=$_POST['title'];	

}else{

   $title='';

}

if($title!='' && $type!=''){

$sSql="insert into  tbldating_doct_detail (type,title) values ('".$type."','".$title."')";
execute($sSql);

$mess="";

}else{
	
$mess="Not added";	

}



//delete


if(isset($_POST['t']) && $_POST['t']!='')
{
	 $delid=$_POST['t'];	
	 echo "update tbldating_doct_detail set CurrentStatus='3' where id=".$delid;
      execute("update tbldating_doct_detail set CurrentStatus='3' where id=".$delid);
}


?>



<?php /*?><? if($title!='' && $type!=''){?>
<div class="table-responsive" id="new11">
<table class="table table-striped" cellspacing="0" cellpadding="3" border="0" align="center">
<thead>
    <tr>
  		<th scope="col">Id</th>
	    <th scope="col">Title</th>
	</tr>
</thead>

<tbody>

<?
$searchqry = "";
$fromqry = "from tbldating_doct_detail where CurrentStatus in(0) and type='".$type."'";
$FileNm = "badge_setting.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title  ". $fromqry ." order by id desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		$id = $rs[0];
		$title = $rs[1];
		
		 ?>
       <tr valign="top"> 
 	     <td><?=$id ?></td>
	     <td><?=$title ?></td>
	  </tr>
<? }freeingresult($result); ?>
</tbody>
</table>
</div>
<? }?>
<?php */?>




<div class="form-wrapper">


<div id="error"></div>





<div class="col-lg-6 col-md-6">
<form name="frm_search_profile" class="form_first" action="" method="post"
 onsubmit="return submitbadgestitle(<?=$type?>);">
<div class="form-group">
<label>Title :</label> 
<input name="title"  id="title" class="form-control"  type="text">
<input value="Add" class="btn" id="submit_form_key1" type="submit">
</div>
</form>
</div>


</div>





<div class="table-responsive" id="hidemanager">
<table class="table table-striped" cellspacing="0" cellpadding="3" border="0" align="center">
<thead>
    <tr>
  		<th scope="col">Id</th>
	    <th scope="col">Title</th>
        <th scope="col">Action</th>
	</tr>
</thead>

<tbody>

<?
$searchqry = "";
$fromqry = "from tbldating_doct_detail where CurrentStatus in(0) and type='".$type."'";
$FileNm = "badge_setting.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,title  ". $fromqry ." order by id desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		$id = $rs[0];
		$title = $rs[1];
		
		 ?>
       <tr valign="top" id="row<?=$id ?>"> 
 	     <td><?=$id ?></td>
	     <td><?=$title ?></td>
         <td>
         <input value="Delete" class="btn btn-danger" onclick="delete_badges(<?=$id ?>);" type="button"></td>
	  </tr>
<? }freeingresult($result); ?>
</tbody>
</table>
</div>



<div id="showmanager" style="display:none">
</div>











<script>
function  submitbadgestitle(type){
	
	var title =$("#title").val();
	
    if(title==''){
		
	         alert("Please enter title") 
			 $("#title").focus();
		     return false;    
		  
	 }else{
		 
		 
				  $.post("badgedetailpop.php",{        
						title:title,
						b:type
				
					},function(data) {
							
						 badgedetailpop_show(type);
		                   	 $("#title").focus();  
					}
				
				);
		 
	 }
	return false;
	
}
</script>


            
	
<script>
function delete_badges(id){

	        $.post("badgedetailpop.php",{    
						t:id
				
					},function(data) {
						 
						   $("#row"+id). hide();
						 
							
			     	}
				
				);	
	
}

</script>