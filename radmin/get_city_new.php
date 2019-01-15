<?php 
session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
checkadminlogin();


if(!empty($_POST["state"]) && isset($_POST["state"])) {

	 $sql =getdata("SELECT id,title FROM tbldating_city_master WHERE state_id ='".$_POST["state"]."'");
?>
	
	  <div class="widhtsetr" id="h_city">
                <label>city :</label>
                <select name="cityid" id="cityid" class="form-control">
                 <option value="">Select</option> 
                    
<?php
	while ($rs = mysqli_fetch_array($sql))
	{ ?>
	<option value="<?=$rs[0]?>"><?=$rs[1]?></option>
<?php } ?>
				</select>
                    </div>
<? } ?>