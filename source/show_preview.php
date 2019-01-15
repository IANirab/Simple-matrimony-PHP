<? include("commonfile.php"); ?>

<?
$packageid=0;
if(isset($_POST['b']) && $_POST['b']!='')
{
	$packageid=$_POST['b'];
}


if($packageid>0)
{ 
	$result = getdata("select Description,small_note,big_note,image 
	from tbldatingpackagemaster where CurrentStatus=0  and PackageId='".$packageid."' ");
	if(mysqli_num_rows($result)>0) 
	{	
		while($rs= mysqli_fetch_array($result))
		{
			 $Description = $rs[0] ;
		 	 $small_note = $rs[1];
			 $big_note = $rs[2];
			 $image = $rs[3];
		
		  if($image!='')
			{
				echo "<figure><img src=".$siteuploadfilepath_new.$image."></figure>"; 
			}
		
			echo "<h3>".$Description."</h3>";
			echo "<p>".$big_note."</p>";
			
			exit;
		}

	}
}

?>

