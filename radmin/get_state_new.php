<?php 
session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
checkadminlogin();


if(!empty($_POST["country"]) && isset($_POST["country"])) {

	 $sql =getdata("SELECT id,title FROM tbldating_state_master WHERE country_id ='".$_POST["country"]."'");
?>
	
	<div class="widhtsetr control-label_25" >
                 <label>state :</label>
                  <select name="stateid" id="stateid" class="form-control" onchange="show_city(this.value)">
                    
	<option value="Select">Select</option>
<?php
	while ($rs = mysqli_fetch_array($sql))
	{ ?>
	<option value="<?=$rs[0]?>"><?=$rs[1]?></option>
<?php } ?>
				</select>
                    </div>
<? } ?>