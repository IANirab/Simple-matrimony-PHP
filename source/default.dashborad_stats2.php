<?
$genid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$curruserid);
$intrest_member_accepted_by_me = getonefielddata("select count(id) from tbldatingexpressintrestmaster where currentstatus =0 and touserid=$curruserid and accepted='A' ");

$intrest_member_waiting_my_response = getonefielddata("select count(id) from tbldatingexpressintrestmaster,tbldatingusermaster where accepted ='W' and tbldatingexpressintrestmaster.createby=tbldatingusermaster.userid and tbldatingexpressintrestmaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingexpressintrestmaster.touserid=$curruserid order by id");

$intrest_member_i_do_not_intrest = getonefielddata("select count(tbldatingexpressintrestmaster.id) from tbldatingexpressintrestmaster,tbldatingusermaster where tbldatingexpressintrestmaster.fromuserid=tbldatingusermaster.userid and tbldatingexpressintrestmaster.currentstatus =0 and tbldatingexpressintrestmaster.touserid=$curruserid and tbldatingexpressintrestmaster.accepted='D'");

$intrest_member_who_accepted_me = getonefielddata("select count(tbldatingexpressintrestmaster.id) from tbldatingexpressintrestmaster,tbldatingusermaster where tbldatingexpressintrestmaster.touserid=tbldatingusermaster.userid and tbldatingexpressintrestmaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingexpressintrestmaster.createby=$curruserid and accepted='A' ");

$intrest_member_who_yet_no_response = getonefielddata("select count(tbldatingexpressintrestmaster.id) from tbldatingexpressintrestmaster,tbldatingusermaster where tbldatingexpressintrestmaster.currentstatus =0 and tbldatingexpressintrestmaster.createby=$curruserid and tbldatingexpressintrestmaster.accepted='W' and tbldatingexpressintrestmaster.fromuserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus in (0,1) ");

$intrest_member_member_not_intrest_in_me = getonefielddata("select count(id) from tbldatingexpressintrestmaster where currentstatus =0 and createby=$curruserid and accepted='D' ");

$intrest_member_accepted_by_me = getonefielddata("select count(tbldatingexpressintrestmaster.id) from tbldatingexpressintrestmaster,tbldatingusermaster where tbldatingexpressintrestmaster.currentstatus =0 and tbldatingexpressintrestmaster.touserid=$curruserid and tbldatingexpressintrestmaster.accepted='A' AND tbldatingexpressintrestmaster.fromuserid=tbldatingusermaster.userid AND tbldatingusermaster.currentstatus in (0,1) ");

$intrest_member_who_accepted_me = getonefielddata("select count(tbldatingexpressintrestmaster.id) from tbldatingexpressintrestmaster,tbldatingusermaster where tbldatingexpressintrestmaster.touserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus in (0,1) and tbldatingexpressintrestmaster.currentstatus =0 and tbldatingexpressintrestmaster.createby=$curruserid and tbldatingexpressintrestmaster.accepted='A'");

$intrest_member_who_yet_no_response = getonefielddata("select count(tbldatingexpressintrestmaster.id) from tbldatingexpressintrestmaster,tbldatingusermaster where tbldatingexpressintrestmaster.currentstatus =0 and tbldatingexpressintrestmaster.createby=$curruserid and tbldatingexpressintrestmaster.accepted='W' AND tbldatingexpressintrestmaster.touserid=tbldatingusermaster.userid AND tbldatingusermaster.currentstatus in (0,1) ");
?>





