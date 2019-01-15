<?
//readxmlfile_xml_parser("http://90.0.0.150/AfricanConnect/uploadfiles/google.xml");
function readxmlfile_xml_parser($url)
{
$fetchdata = '';
if ($url != "")
{
$totaltobefetchdata = 10;
$parser = xml_parser_create();
@xml_set_element_handler($parser,'xml_parser_el_start','xml_parser_el_end');
@xml_set_character_data_handler($parser,'xml_parser_charinfo');
$fh = @fopen($url,"r");
while ($xmlcontent = @fread($fh,1024)) {
        @xml_parse($parser,$xmlcontent,feof($fh));
}
global $arr_portlate;
if (is_array($arr_portlate))
{
$total =0;
$fetchdata  ="";
for ($i=3;$i<=count($arr_portlate);$i++)
{
$fetchdata = $fetchdata . $arr_portlate[$i] . "<br>";
$total = $total +1;
}
}

	echo($fetchdata);
}
}

function xml_parser_el_start($parser,$name,$attrib) {
        global $intitle;
        global $second;
        global $portlatefetchdata;
		global $data_token; 
		$data_token ="";
        if ($name == "TITLE")
		{
       	$intitle = 1;
		$data_token ="T";
		}
		if ($name == "LINK")
		{
        	$intitle = 1;
			$data_token ="L";
		}
		if ($name == "DESCRIPTION")
		{
        	$intitle = 1;
			$data_token ="D";
		}
        }
function xml_parser_el_end($parser,$name) {
        global $intitle;
        global $second;
        global $portlatefetchdata;
		global $data_title,$data_link;
		global $data_token; 
        if ($name == "TITLE") {
			$data_link = "Y";
                $intitle = 0;
                $second = 1;
                }
		if ($name == "LINK") {
                $intitle = 0;
				$data_title ="Y";
            }
		if ($name == "DESCRIPTION") {
                $intitle = 0;
				$data_title ="Y";
            }
        }
 
function xml_parser_charinfo($parser,$info) {
        global $intitle;
        global $portlatefetchdata;
		global $calc;
		global $data_token; 
		global $feed_data_title,$feed_data_link,$feed_data_description,$portlateinnertemplate;
		global $arr_portlate;	
		if ($calc == "")
			$calc = 1;
        if ($intitle) 
		{
		if ($data_token == "T")
			$feed_data_title = $info;
		if ($data_token == "L")
			$feed_data_link = $info;
		if ($data_token == "D")
		{
			$feed_data_description = $info;
		}	
		//$portlatefetchdata .= $info . "<";
		
		
		$calc = $calc +1;
		}
		if ($calc == 4)
		{
			//$portlateinnertemplate_temp = "<div class=feedbox><div class=feedtitle><a href='$feed_data_link'>" . $feed_data_title . "</a></div>";
			$portlateinnertemplate_temp ="";
			if (($feed_data_title != "") && ($feed_data_link != "") && ($feed_data_link != "&"))
			$portlateinnertemplate_temp = "<a href='$feed_data_link'>" . $feed_data_title . "</a>";
			//$portlateinnertemplate_temp .= "<br><div class=feeddescription>" . $feed_data_description;
			$image ="";
			if ($image != "")
			$portlateinnertemplate_temp .= "<br><img src='$image.'>";
			$calc ="";
			$feed_data_title = "";
			$feed_data_link = "";
			$feed_data_description = "";
			if ($portlateinnertemplate_temp != "")
			$arr_portlate[count($arr_portlate)+1] = $portlateinnertemplate_temp;
		}
		
}
?>