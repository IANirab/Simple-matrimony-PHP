<? 
require_once("commonfile.php");
if(isset($_POST['cat']) && $_POST['cat']=='insert'){
	$comment = $_POST['comm'];
	$select = $_POST['sel'];
	$id = $_POST['id'];
	execute("UPDATE tbldatingshortlistmaster SET sel_id='".$select."', comment='".$comment."' WHERE ShortlistId=".$id);
	echo 'success';
}
if(isset($_POST['cat']) && $_POST['cat']=='show'){	
	$id = $_POST['sid'];
	$data = getdata("SELECT sel_id, comment from tbldatingshortlistmaster WHERE ShortlistId=".$id);	
	$rs = mysqli_fetch_array($data);
	$sel_id = $rs[0];
	$comment = $rs[1];
	echo $sel_id."<br>".$comment;
}
if(isset($_POST['cate']) && $_POST['cate']=='update'){	
	$id = $_POST['id'];
	$data = getdata("SELECT sel_id, comment from tbldatingshortlistmaster WHERE ShortlistId=".$id);	
	$rs = mysqli_fetch_array($data);
	$sel_id = $rs[0];
	$comment = $rs[1];
	echo $sel_id."<br>'".$comment;
}
?>