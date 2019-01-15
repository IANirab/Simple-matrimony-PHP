<?
//include("commonfileadmin.php");
class sms {
var $usr = "treobiz";
var $pwd = "treo927";
var $sender = "treo";
/*var $message = "text";
var $mobile = "1234567890";*/


		function get_details(){
		if(isset($_SESSION['action']) && $_SESSION['action']!=""){
			$action = $_SESSION['action'];
		} else {
			$action = getonefielddata("SELECT max(sd_id) from tbl_sms_detail");
		}
		
		//$rs = getdata("SELECT message_text, to_number, message_type from tbl_sms_master WHERE sms_id='".$action."'");
		$rs = getdata("SELECT message_text, to_number, message_type from tbl_sms_detail WHERE sd_id='".$action."'");
		$get_data = mysqli_fetch_array($rs);
				$message = $get_data['message_text'];
				$mobile = $get_data['to_number'];
				$type = $get_data['message_type'];				
				//return $message.".".$mobile."details";
				return $message.".".$mobile;				
		}
		
		function user_details(){
			$url = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=102 AND fldnm='sms_url'");
			$user = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=103 AND fldnm='sms_user'");
			$password = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=100 AND fldnm='sms_password'");
			$sender = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=101 AND fldnm='sms_sender'");
			return $url."_".$user."_".$password."_".$sender;
		}
	
		function sms($mobile,$message)
		{			
			$usr_data = $this->user_details();			
			$user_dat = explode("_",$usr_data);
			$url = $user_dat[0];
			$user = $user_dat[1];
			$password = $user_dat[2];
			$sender = $user_dat[3];
		
			/*$data = $this->get_details();
			$dat = explode(".",$data);
			$message = $dat[0];
			$mobile = $dat[1];
			$mob_no = explode(",",$mobile);*/
			
				//$this->_sendURL = "http://smpp2.routesms.com:8080/bulksms/bulksms?username=$this->usr&password=$this->pwd&type=0&dlr=1&destination=$mobile&source=$this->sender&message=$message";				
				/*echo "http://".$url."/bulksms/bulksms?username=$user&password=$password&type=0&dlr=1&destination=$mobile&source=$sender&message=$message";
				exit;*/
				$this->_sendURL = "http://".$url."/bulksms/bulksms?username=$user&password=$password&type=0&dlr=1&destination=$mobile&source=$sender&message=$message";
				$this->sending_method = "fopen";		
		}
		
		function send()
		{
			$msg = $this->get_details();
			$data = explode(".",$msg);			
			$text =$data[0];
			$to = $data[1];
			
			
			//$from = "treo";
					
			/*$text = $this->message;
			$to=$this->mobile;*/
			$from=$this->sender;			
			$text = stripslashes($text);
			$text = str_replace("\r", "", $text);  			
			/*if(strlen($text) > 161) {
			  die("message too long");
			}*/ 
			if (empty ($to)) {
			  die ("You do not specify destination address (TO)!");
			}
			$cleanup_chr = array ("+", " ", "(", ")", "\r", "\n", "\r\n");			
			$to = str_replace($cleanup_chr, "", $to);     
			
			
			  /*$comm = sprintf($this->_sendURL,
			  $this->usr,
			  $this->pwd,
			  $text,
			  rawurlencode($to),  
			  rawurlencode($from));*/
			  
			  $comm = $this->_sendURL;
			  /*echo $comm;			  
			  exit;*/
			  return $this->_parse_send($this->_execgw($comm));
		}
			
		function _execgw($command)
		{		  
		  if ($this->sending_method == "fopen")		  
		  return $this->_fopen($command);
			  die ("Unsupported sending method!");
		}
	
		function _fopen($command) 
		  {		  
		  $result = '';
		  $command = str_replace(" ","",$command);	
		  echo $command;
		  exit;	  
		  $handler = @fopen($command, 'r');		  		  
		  if ($handler) {
			  while ($line = @fgets($handler,1024)) {
			  $result .= $line;
		  	  }		  		
			  fclose ($handler);
			  return $result;
		  } 
		  else 
		  {
			  die ("Error: Message is not proper");
		  }
	    }	
		
		function _parse_send ($result) {
		  	return $result;
	    }	
		/*You received card from GYC.<br>
http://localhost/gycdubai/english/card_preview.php<br>
Code : 231912813*/	
}
?>