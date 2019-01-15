<? require_once("commonfile.php");
checklogin($sitepath);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript">
function enable_comment(id,cat){
		if(cat=='open'){
			document.getElementById('exist'+id).style.display = 'none';
			document.getElementById(id).style.display = 'block';
			$.post("comment_insert.php",
				{cate:'update',
				 id:id},
				 function (data){
				 	var str = data;
					var str_arr = str.split("<br>'");
					var sel = str_arr[0];
					var comment = str_arr[1];
					document.getElementById('sel'+id).value = sel;
					document.getElementById('comment'+id).value = comment;
				 }	
				)
		}	
		if(cat=='close'){
			document.getElementById('exist'+id).style.display = 'block';
			document.getElementById('comment'+id).value = '';
			document.getElementById('sel'+id).value = '';
 			document.getElementById(id).style.display = 'none';
		}
	}
	function save_comment(val){
		var comment = document.getElementById('comment'+val).value;
		var sel = document.getElementById('sel'+val).value;
		if(comment==''){
			alert("Please Enter Comment");
			document.getElementById('comment'+val).focus;
			return false;
		} else {
		$.post("comment_insert.php",
				{cat:'insert',
				comm:comment,
				 sel:sel,
				 id:val},
				 function (data){
				 	if(data='success'){
						alert("Comment posted successfully");
						document.getElementById(val).style.display = 'none';
						show_comment(val);
					}
				 }
			)
		}	
	}
	function show_comment(val){
		$.post("comment_insert.php",
			{cat:'show',
			 sid:val},
			 function (data){
			 	document.getElementById('show'+val).innerHTML = data;
				document.getElementById('show'+val).style.display = 'block';
			 }
		)
	}

</script>



<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("manager.favorite.php");?>
    </div>
   
</div>




</div>
<div class="wrapper_blank">
	<div class="container">
    	 <div col-lg-9 col-md-9 col-sm-9 col-xs-12>
    			<div class="leftcms">
		 &nbsp;
    </div>
    </div>
    <div col-lg-3 col-md-3 col-sm-3 col-xs-12>
    			<div class="rightcms">
		 &nbsp;
    </div>
    </div>
    </div>
</div>

<div class="UpgradePopupAll modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog animated">    
      <!-- Modal content-->
      <div class="modal-content">
      <button type="button" class="close" id="close_contact_popup" data-dismiss="modal">&times;</button>           
          <div class="modal-body" id="show_contact_info" style="display:none">                 
          </div>      
      </div>
  </div>
</div>

<script>
function send_contactreq(id)
{
		$.ajax({
		type: "GET",
		url: "<?=$sitepath?>phonerequest.php",
		data:'b='+id,
		success: function(data)
		{
			
				$("#show_contact_info").show(); 
				$("#show_contact_info").html(data); 
		}
		});

}
</script>
<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>