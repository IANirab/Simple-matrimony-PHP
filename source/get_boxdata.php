<? 
include("commonfile.php");
include("formjs.php");
$religionid = 0;
$type = '';
$castid = 0;
if(isset($_POST['religionid']) && $_POST['religionid']!=''){
	$religionid = $_POST['religionid'];
}
if(isset($_POST['type']) && $_POST['type']!=''){
	$type = $_POST['type'];
}
if(isset($_POST['castid']) && $_POST['castid']!=''){
	$castid = $_POST['castid'];
}
if($type=='castbox'){ ?>
<div class="col-lg-8">  
	<div class="select2-wrapper MYseletion">
<select id="searchcast_new" name="searchcasts[]" multiple="multiple" class="form-control select2-multiple" onchange="getsubcastbox(this.value)">
	<? fillcombomul("select id,title from tbldatingcastmaster where currentstatus=0 and languageid=$sitelanguageid AND religianid=$religionid order by title","","Select") ?></select>
    </div>
    </div>
<?	
} if($type=='subcastbox'){ ?>
<div class="col-lg-8">  
	<div class="select2-wrapper MYseletion">
	<select id="searchsubcast_new" name="searchsubcasts[]" multiple="multiple" class="form-control select2-multiple">
	<? fillcombomul("select title,title from tbldatingsubcastmaster where currentstatus=0 and castid IN ('".$castid."') and languageid=$sitelanguageid order by title","","Select") ?></select>
    </div>
    </div>
<?
}
?>