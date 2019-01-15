<?
function getcmslinks($linklocationid)
{
	  global $sitelanguageid,$sitepath;	
      $returnlinks = '';
	  $result = getdata("select Title,cmsid,staticlink from tblcmsmaster where LocationId  = $linklocationid and CurrentStatus=0 and languageid=$sitelanguageid order by orderby ");
	  $i=0;
	  while($r =mysqli_fetch_array($result))
	  {
	  	$staticlink = $r[2];
		
		if ($staticlink != "")
		$link = $staticlink;
		else
		$link = makecmslink($r[0],$r[1]);
		if($linklocationid==3){
			$link = "<span class=\"bottom_link\"><a style=\"\" href=\"$link\">".$r[0]."</a></span>  ";
		} else {
			$link = "<li><a style=\"text-decoration:none\" href=\"$link\">".$r[0]."</a></li>";
		}
		if (($linklocationid == '2') || ($linklocationid == '4'))
			$returnlinks .= "$link";
		else
		{
			if($i!=0)
  	    	$returnlinks .= '<!--|-->';
			$returnlinks .= "$link";
		}
		$i++;
	}
	freeingresult($result);
return $returnlinks;
}
function makecmslink($title,$id)
 {
	if ($title != "")
	{
		global $sitepath;
		$title = str_replace(" ","_",$title);
		$title = str_replace("&","_",$title);
		$title = str_replace("\\","_",$title);
		$title = str_replace("/","_",$title);
		$title = str_replace("'","_",$title);
		$title = str_replace("\"","_",$title);
		return $sitepath . "cms/$id". "_$title";
	}
 }
?>