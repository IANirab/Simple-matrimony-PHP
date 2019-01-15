<?php $action='0' 
?>

<script language="javascript" type="text/javascript">
	function search_office(value){	
	if(value.length>=3){		
		
		document.getElementById('loader').style.display = 'block';		
		$.post("plugin.office_location_search_callback.php",{
			search_keyword:value
		}, function(data){
			//alert(data);
			//document.getElementById('search_keyword').blur();
			document.getElementById('maintable').style.display = 'block';
			document.getElementById('loader').style.display = 'none';
			$("#maintable").html(data);
			
			});
		}
	}
        </script>

<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#maintable").hide();
    });
    $("#show").click(function(){
        $("#maintable").show();
    });
});
</script>

<script>
function btnclose() {
    //document.getElementById("maintable").innerHTML = "Hello World";
	document.getElementById('maintable').style.display = 'none';
}
</script>




<form name =formsearchofficelocation method=post action="#" 
enctype="application/x-www-form-urlencoded">


<input name="fieldtxtsearchoffice" id="fieldtxtsearchoffice" type="text" size="10" maxlength="10" title="search keyword" alt="search keyword" value="" onKeyUp="search_office(this.value)"  class="form-control"/>

</form>



<div id="loader" style="display:none;">
	<img src="uploadfiles/loader.gif" />
</div>
<div id="maintable" class="maintable_edit"></div>

<div class="frc_search_block">
	<img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/franchiseesearch_Image.jpg"/>
</div>

