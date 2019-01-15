<?php /*?><script src="<?= $sitepath ?>jquery/jquery.js"></script><?php */?>
<script type="text/javascript">  
function update_accrodingto_religion(community_ctrl_nm,religion_ctrl_nm,divnm_loading)
{
  var religionid = document.getElementById(religion_ctrl_nm).options[document.getElementById(religion_ctrl_nm).selectedIndex].value;
  
  document.getElementById(community_ctrl_nm).length = 0;  
  
  document.getElementById(divnm_loading).innerHTML = "<img src='<?= $sitepath ?>jquery/indicator.gif' style='height:2px; width:8px;'>";
   document.getElementById(community_ctrl_nm).style.visibility="hidden";
  $.post("<?= $sitepath ?>community_finder.php",
  {txtreligionid:religionid},
  function(data)
  {
	/*if(data==''){		
		document.getElementById('homecastid').style.display = 'none';			
	}*/
  	document.getElementById(divnm_loading).innerHTML ="";
	var theOption = new Option;
	theOption.text = "<?= $searchincludecountrycombotitle ?>";
	theOption.value = "0.0";
	document.getElementById(community_ctrl_nm).options[0] = theOption;
	 document.getElementById(community_ctrl_nm).style.visibility="visible";
 	if (data != "")
	{
		var result_arr = data.split(",");
		for(i = 1; i < result_arr.length; i++)
		{
			if (result_arr[i] != "") 
			{
				var option_data = result_arr[i];
				var option_data_arr = option_data.split("-");
				var theOption = new Option;
				theOption.text = option_data_arr[0];
				theOption.value = option_data_arr[1];
				document.getElementById(community_ctrl_nm).options[i] = theOption;
			}
		}
	}
  }
  );
}
</script>