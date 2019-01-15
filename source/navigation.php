<?

	if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!=""){

		$que = "AND orderby!=10";

	} else {

		$que = "AND orderby!=11 AND orderby!=9";

	}

	//$que = "";	

	$result = getdata("select cmsid, Title, Description, staticlink from tblcmsmaster WHERE LocationId=1 AND orderby!='' AND currentstatus=0 $que order by orderby");

	$topnmrows = mysqli_num_rows($result);

	 ?>
	 
     

			<? 

			$i=1;

			while($rs=mysqli_fetch_array($result)) { 

				$cmsid = $rs[0];

				$title = $rs[1];

				$description = $rs[2];

				$link = $rs[3];

				if($link!=""){

					$lnk = $link;

				} else {

					$lnk = $sitepath."cmsdisplay.php?b=".$cmsid;

				}				

			?>

			<li><a href="<?=$lnk?>" class="hvr-sweep-to-right"><?=$title?></a>
            	<? 	
				
							
				$childresult = getdata("select cmsid, Title, Description, staticlink from tblcmsmaster WHERE LocationId=1 AND parentid=$cmsid AND currentstatus=0 order by orderby");
				if(mysqli_num_rows($childresult)){?>
			
                	
                    
				<?	
				}
				?>
            </li>

			<? 

				$i++;

			} ?>

