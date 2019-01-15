<?
$totalfiles = 0;
$sitemapfilenm="sitemap";
$sitemapgeneratefoldername="../sitemap";
$prioritynmvalue="0.5";
$changefrequntlyvalue="monthly";
$lastmodifyvalue=date("Y-m-d");
$maxurlonefile=100;
$websitename="https://www.promotionalcalendarssource.com/";
$sitemapfoldername="sitemap";


function writexmlsitemapfile($url)
{
 
  global $sitemapfilenm;
  global $totalfiles;
  $totalfiles = $totalfiles + 1;
  $template ="";
  $file = fopen("../dbinclude/templatesitemap.txt","r");
  $template = fread($file,filesize("../dbinclude/templatesitemap.txt"));
  $template = str_replace("[--urltags--]",$url,$template);
	fclose($file);
  writexmlfile($sitemapfilenm.$totalfiles.".xml" ,$template);
}




function writexmlsitemapindexfile()
{
  global $totalfiles;
  global $sitemapfilenm,$websitename,$sitemapfoldername,$lastmodifyvalue;
  $url = "";
  for ($i=1;$i<=$totalfiles;$i++)
  {
  	$url .= "<sitemap>\n";
	 $url .= "<loc>$websitename$sitemapfoldername/$sitemapfilenm$i.xml</loc>\n"; 
    $url .= "<lastmod>" . $lastmodifyvalue . "</lastmod>\n";
    $url .= "</sitemap>\n";
  }
  $template ="";
  $file = fopen("../dbinclude/templateindexsitemap.txt","r");
  $template = fread($file,filesize("../dbinclude/templateindexsitemap.txt"));
  $template = str_replace("[--sitemapurl--]",$url,$template);
  fclose($file);
  writexmlfile($sitemapfilenm . ".xml" ,$template);
}




function writexmlfile($filename,$content)
{
	global $sitemapgeneratefoldername;
	$filename = $sitemapgeneratefoldername . "/" . $filename;
	
    if (!$handle = fopen($filename, 'w')) {
         echo "Cannot open file ($filename)";
         exit;
    }
    if (fwrite($handle, $content) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }
    fclose($handle);
}



?>