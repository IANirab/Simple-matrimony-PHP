<?  session_start();
require_once("commonfileadmin.php");
include('../dbinclude/sitemap_function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sitemap</title>
</head>
<body>
	
   
	<?
		$k=0;
		$url2='';
		
		// popular search 
	    $type='popular_search';
    	$cnt=getonefielddata("select count(searchid) from tbldatingadminsearchmaster where currentstatus=0  ");
		$sql = getdata("select searchid,title from tbldatingadminsearchmaster where currentstatus=0  ");	
		$link_t="populardetail/[id]_[title]";	
		generate_sitemap_fun($k,$url2,$cnt,$sql,$link_t,$type);
		
		// CMS
		$type='cms';
    	$cnt=getonefielddata("select count(cmsid) from  tblcmsmaster where currentstatus=0  ");
		$sql = getdata("select cmsid,Title,staticlink from tblcmsmaster where currentstatus=0  ");	
		$link_t="cms/[id]_[title]";	
		generate_sitemap_fun($k,$url2,$cnt,$sql,$link_t,$type); 
 		
		// Directory
		$type='directory';
    	$cnt=getonefielddata("select count(categoryid) from  tbl_directory_category_master where currentstatus=0  ");
		$sql = getdata("select categoryid,title from tbl_directory_category_master where currentstatus=0  ");	
		$link_t="directory_category/[id]_[title]";	
		generate_sitemap_fun($k,$url2,$cnt,$sql,$link_t,$type); 
		
		// Event
		$type='event';
    	$cnt=getonefielddata("select count(eventid) from  tbl_event_master where currentstatus=0  ");
		$sql = getdata("select eventid,title from tbl_event_master where currentstatus=0  ");	
		$link_t="event_detail/[id]_[title]";	
		generate_sitemap_fun($k,$url2,$cnt,$sql,$link_t,$type); 
		
		// User Profile
		$type='user_profile';
    	$cntu=getonefielddata("select count(userid) from tbldatingusermaster where currentstatus in (0,1) ");
		$sql = getdata("select userid,name from tbldatingusermaster where currentstatus in (0,1)  ");	
		$link_t="displayprofiles/[id]";	
		generate_sitemap_fun($k,$url2,$cnt,$sql,$link_t,$type); 
	?>
    
    <?
			    ///////////////////////////   Static Pages start /////////////////////////////////
		$type='static_page';
    	$static_pg = findsettingvalue('sitemap_page');	
		$static_pg_arr=explode(',',$static_pg);
		$cnt=count($static_pg_arr);

		for($j=0;$j<$cnt;$j++)
		{
			$url2.=create_url_tag($websitename.$static_pg_arr[$j]);
			$k++;
			if ($k == $maxurlonefile)
			{
				writexmlsitemapfile($url2);
				$url2 = "";
				$k =0;
			 }
		}

		if($cnt < $maxurlonefile) 
		{ 			
			if ($url2 != "")
			{
				writexmlsitemapfile($url2);
			}
		}	

				    ///////////////////////////   Static Pages end /////////////////////////////////
	?>
    
   
	<?
	writexmlsitemapindexfile();  
	?>
    <?

	function generate_sitemap_fun($k,$url2,$cnt,$sql,$link_t,$type)
	{
			global $maxurlonefile,$websitename;
			while($rs= mysqli_fetch_array($sql))
			{
				$id= $rs[0];
				$title=$rs[1]; 
				$title=filter_title($title);
				
					if($type=='cms')
					{
						if($rs[2]!='')
						{
							$link=$rs[2];	
						}else
						{
							$link=str_replace('[id]',$id,$link_t);
							$link=str_replace('[title]',$title,$link);
							$link=$websitename.$link;	
						}
					}else
					{
						$link=str_replace('[id]',$id,$link_t);
						$link=str_replace('[title]',$title,$link);		
						$link=$websitename.$link;	
					}
					$url2.=create_url_tag($link);
	
				$k++;
				if ($k == $maxurlonefile)
				{
					writexmlsitemapfile($url2);
					$url2 = "";
					$k =0;
				 }
			}
			
			if(count($cnt) < $maxurlonefile) 
			{ 			
				if ($url2 != "")
				{
					writexmlsitemapfile($url2);
				}
			}	
	}
	
	function filter_title($title)
	{
		$title = str_replace(" ","_",$title);
		$title = str_replace("&","&amp;",$title);
		$title = str_replace("'","&apos;",$title);
		$title = str_replace('"','&quot;',$title);
		$title = str_replace(">","&gt;",$title);
		$title = str_replace("<","&lt;",$title);	
		return $title;
	}
	
	function create_url_tag($link)
	{
		$url='';
		global $lastmodifyvalue,$changefrequntlyvalue,$prioritynmvalue;
		
		$url .= "<url>\n";
		$url .="<loc>".$link."</loc>\n";
		$url .= "<lastmod>" . $lastmodifyvalue . "</lastmod>\n";
		$url .= "<changefreq>" . $changefrequntlyvalue . "</changefreq>\n";
		$url .= "<priority>" . $prioritynmvalue . "</priority>\n";
		$url .= "</url>\n";	
		return $url;
	}
	
	?>		
</body>
</html>