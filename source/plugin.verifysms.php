	<!-- ********* TITLE START HERE *********-->
		<div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>Verify your mobile no </span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div> 

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
	
		<div class="errorbox" >	<? if(checkerror()!= ''){
			$hide="";
		}else{
		$hide="style='display:none'";
		}
			?><div class="error" <?=$hide?>><?php checkerror(); ?></div></div>
			
<form ENCTYPE="multipart/form-data" class="update_form" name ='form1' id='form1' method='post' action ="<?= $filename ?>.php" onSubmit="MM_validateForm('code','','R');return document.MM_returnValue;">


<fieldset>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $emailverifyhead ?></label>
<div class="col-lg-8">
<input type="text" name="code" class="form-control" size=35 value="<?= $code ?>">
</div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8">
<div class="formbtn_outer">
<input name="Submit" type="submit" class="formbtn"  value="<?= $emailverifysubmit ?>"> &nbsp; <input name="Reset" type="reset"  value="<?= $emailverifyreset ?>" class="resetbtn">
</div>
</div>
</div>
</fieldset>
</form>
<div class="smsmessage">
<div class="form-group">
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8">
<a href="resendsms.php">Resend Verificationcode</a></div>
</div>
</div>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>