<? 
if(isset($_POST['b']) && $_POST['b']!='')
{
	require_once("commonfileadmin.php");
	$userid=$_POST['b'];
	$curruserid=$_POST['b'];
}
else{$userid=0;$curruserid=0;}

?>
<? $chk = getonefielddata("SELECT count(id) from  tbl_activity_log WHERE userid='".$userid."' "); ?>
<? if($chk>0) {?>

<form  method="post">
<div class="form-group">
	<div class="widhtsetr">       
            <label>From Date :</label>
             <input type="text" name="sdate" id="sdate" value="<?=date('m/d/Y')?>" class="form-control" >
      
        </div>
       <div class="widhtsetr control-label_25"> 
            <label>To Date :</label>
             <input type="text" name="tdate" id="tdate" class="form-control" value="<?=date('m/d/Y')?>">
        </div>
    </div>
    
    <div class="form-group common_button">
		<input type="button" value="Search" class="btn" onClick="search_log()">
	</div>
    <input type="hidden" name="userid" id="userid" value="<?=$userid?>">
</form>

<script>
function search_log()
{
	
	 var userid = $("#userid").val();	
	 var sdate = $("#sdate").val();	
	 var tdate = $("#tdate").val();	
	 $("#loader_img").show();
	 $("#hide_log").hide();
	 $("#show_log").hide();
	  
		$.ajax({
		type: "POST",
		url: "user_log_search.php",
		data:'sdate='+sdate+'&b='+userid+'&tdate='+tdate,
		success: function(data)
		{
			setTimeout(function()
			{ 
					$("#loader_img").hide();
					$("#hide_log").hide();
					$("#show_log").show();
					$("#show_log").html(data);
			}, 3000);
			
		}
		});

}
</script>

<script>
  $( function() {
    $( "#sdate" ).datepicker();
  } );
  
  $( function() {
    $( "#tdate" ).datepicker();
  } );
  </script>
<div id="loader_img" style="display:none"><img src="images/loaderp.gif"></div>
<div id="hide_log">
<table class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>IP</th>
      <th>Session</th>
      <th>Date & Time</th>
      <th>Activity</th>
      <th>Info</th>
    </tr>
  </thead>
  <tbody>
   <?
   
   
   
	   $searchqry=" and sdate between '".date('Y-m-d')."' and '".date('Y-m-d')."' ";
		$orderby=' order by id asc ';
	
   
   $frmqry=" FROM `tbl_activity_log` WHERE userid='".$userid."' $searchqry $orderby ";
   
   
   $i=1;
   $sql=getdata(" SELECT `sessionid`, `sdate`, `stime`, `type`, `note`,`createip` $frmqry ");
	while($rs=mysqli_fetch_array($sql))
	{
		$session_info=$rs[0];
		$sdate=$rs[1];
		$stime=$rs[2];
		$type=$rs[3];
		$note=$rs[4];
		$createip=$rs[5];
		
		$sdate=date_create($sdate);
	 	$sdate=date_format($sdate,"M d, Y");
		
		if($type==1)
		{
			$activity='<button class="btn btn-info" type="button">Login</button>';
		}
		if($type==2)
		{
			$activity='<button class="btn btn-danger" type="button">logout</button>';
		}
		
   ?> 
    <tr>
      <th scope="row" width="5%"><?=$i++?></th>
      <td width="10%"><?=$createip?></td>
      <td width="28%"><?=$session_info?></td>
      <td width="20%"><?=$sdate." ".$stime?></td>
      <td width="10%"><?=$activity?></td>
      <td width="30%"><?=$note?></td>
    </tr>
    <? } ?>
  </tbody>
</table>
</div>
<div id="show_log"></div>
<? }else{ ?>
 <h4 class="no_log">No activity log found</h2>
<? } ?>
