<? 
require_once("commonfileadmin.php");


$dir=$abspath."uploadfiles/document/";


if (is_dir($dir))
{
  	if ($dh = opendir($dir))
  	{
		while (($file = readdir($dh)) !== false)
		{
			
			 $find_file=strpos($file,".");
			 if($file!='.' && $file!='..' && $file!='Thumbs.db' && $find_file>0)
			 {
   				if (file_exists($dir."/".$file))
				 {
					unlink($dir."/".$file);
				 }		
			}
		}
   }
}


?>