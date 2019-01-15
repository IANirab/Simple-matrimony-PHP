<title>City Update</title>
<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if(isset($_POST['submit']) && $_POST['submit']=='Submit'){	
	$city_id = '';
	for($i=0; $i<count($_POST['chkbx']); $i++){
		$city_id .= $_POST['chkbx'][$i].",";
	}
	$city_id = substr($city_id,0,-1);
	$upd_sql = "UPDATE tbldating_city_master SET state_id=".$_POST['state']." WHERE id IN (".$city_id.")";
	execute($upd_sql);	
}
?>
<form name="city_update" action="" method="post">
<table>
	<tr>
    	<td>
        	<select name="state" id="state">            	
            	<? fillcombo("SELECT id, title from tbldating_state_master WHERE currentstatus=0","","Select"); ?>
            </select><input type="submit" name="submit" value="Submit">
        </td>        
    </tr>    
    <tr>
    	<td>
        <table>
        	<tr>
        <? 
			$result = getdata("SELECT id,title from tbldating_city_master WHERE currentstatus=0 AND state_id is NULL");
			$i=1;
			while($rs = mysqli_fetch_array($result)){				
		?>
        	
            	<td>
        			<input type="checkbox" name="chkbx[]" value="<?=$rs[0]?>"><?=$rs[1] ?><br>
            	</td>
                <?
                if($i % 5 == 0){ ?>
					</td><tr>
                 <?   	
				}
				?>
            
        <? $i++;
		} ?>
        	</tr>
        </table>
        </td>
    </tr>
    <tr>
    	<td></td>
    </tr>
</table>
	
</form>