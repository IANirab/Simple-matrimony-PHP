<? 
include_once("commonfile.php");
checklogin($sitepath);
//$private_contact_enable = findsettingvalue("private_contact_details");

$filename ="behaviouralquestionsinsert";

?>

<div class="profilestoplinks"><?php include("profilestoplinks.php") ?></div>
		<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>Behavioural Questions</span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
        
        
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->

		<form style="margin:0px" class="update_form contactus_forms" ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post action ="<?=$sitepath ?>behaviouralquestionsinsert.php">
<div class="errorbox"><span><?php checkerror(); ?></span></div>
<fieldset>

<?
 

$i=1;
$question_data = getdata("select id,question from tbl_question_master where typeid=3 and currentstatus=0");
while($row =mysqli_fetch_array($question_data))
{
	$id = $row['id'];
	$question = $row['question'];
	
$count_answer = getonefielddata("select count(id) from tbl_answer_master where currentstatus=0 ANd typeid=1
 AND questionid=$id");

$select_data_answer= getonefielddata("select answerid from tbldatinguser_answer_data_master where
 questionid=$id and currentstatus=0 and userid=$curruserid  ");

?>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$question?></label>
<div class="col-lg-8">
<input type="hidden" name="questionid<?=$i?>" value="<?=$id?>"  /
<input type="hidden" name="typeid<?=$i?>" value="1"  />


<select name="answerid<?=$i?>" class="form-control">

<? fillcombo("select id,answer  from   tbl_answer_master where currentstatus=0 ANd typeid=3 AND questionid=$id ",
$select_data_answer,"select") ?>
</select>	
</div></div>
<? 
$i++;
} 
 ?>
 <input type="hidden" name="count" value="<?=$i?>"  />


<!--<div class="form-group">
 <label class="col-lg-4 control-label"><?= $question ?>:</label>
  <div class="col-lg-8">
 <select name="txtanswer" id="txtanswer"   class="form-control form_mobile_code form_city7">
 <? $answer=getdata("select id,answer from tbl_answer_master where questionid=".$id); ?>
 <? while($rs1= mysqli_fetch_array($answer))
 {
	 $ansid=$rs1[0];
	 $ans=$rs1[1];
	 ?> 
 <option id="txtanswer_<?=$ansid ?>" value="<?=$ansid  ?>"><?=$ans  ?></option><? } freeingresult($answer); ?>
  </select>
     
   </div>
 </div>-->


<div class="form-group">
 <label class="col-lg-4 control-label">&nbsp;</label>
    <div class="col-lg-8"><div class="formbtn_outer"><input name="Submit" type="submit"  class='formbtn' value="<?= $updatecontactprofiledsubmit ?>"> <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updatecontactprofiledreset ?>"></div>
</div>
</div>

</fieldset>


</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>
        </div>