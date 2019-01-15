 <?  include("commonfile.php");?>   
    <?
    if(isset($_GET['a']) && $_GET['a']!='')
	{
		$chk=$_GET['a'];
		if($chk=='delete')
		{
			$get_thumbnil_image=getonefielddata("Select thumbnil_image 
			from  tbldatingusermaster where userid='".$curruserid."' ");
			
			$get_main_image=getonefielddata("Select imagenm 
			from  tbldatingusermaster where userid='".$curruserid."' ");
			
			unlink("uploadfiles/".$get_thumbnil_image);
			unlink("uploadfiles/".$get_main_image);
			
			execute("UPDATE tbldatingusermaster SET thumbnil_image='',imagenm=''  WHERE userid='".$curruserid."' ");
		}
		header("location:updateprofilepicture2.php");
	}
	?>
    		 