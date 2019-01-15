<?
session_start();
require_once("commonfileadmin.php");
$religionid = $_POST['religionid']; 
?>
<label>Caste :</label>
<select name="cast" id="cast" class="form-control"><?=fillcombo("select id,title from tbldatingcastmaster where currentstatus=0 and religianid=".$religionid." order by title","","Any")?></select>
