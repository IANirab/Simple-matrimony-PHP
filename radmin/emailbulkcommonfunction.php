<?
function findsettingemailbulk($fldnm)
{
	return getonefielddata("select fldval from tblemaillbulksettingmaster where fldnm='$fldnm'");
}
function find_que_send_email($newsletter_subsciber)
{
	if ($newsletter_subsciber != "A")
		return "news_letter_subscribe ='$newsletter_subsciber' and ";
	
}
?>