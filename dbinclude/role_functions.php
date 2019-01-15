<?	
	function dashboard_db_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$db_1 = getonefielddata("SELECT db_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$db_1 = "";
		}
		return $db_1;
	}
	
	function dashboard_db_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$db_2 = getonefielddata("SELECT db_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$db_2 = "";
		}
		return $db_2;
	}
	
	function dashboard_db_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$db_3 = getonefielddata("SELECT db_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$db_3 = "";
		}
		return $db_3;
	}
	
	function dashboard_db_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$db_4 = getonefielddata("SELECT db_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$db_4 = "";
		}
		return $db_4;	
	}
	
	function dashboard_db_5(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$db_5 = getonefielddata("SELECT db_5 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$db_5 = "";
		}
		return $db_5;	
	}
	
	function dashboard_db_6(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$db_6 = getonefielddata("SELECT db_6 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$db_6 = "";
		}
		return $db_6;	
	}
	
	function dashboard_db_7(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$db_7 = getonefielddata("SELECT db_7 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$db_7 = "";
		}
		return $db_7;	
	}
	
	function user_mnager_um_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_1 = getonefielddata("SELECT um_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_1 = "";
		}
		return $um_1;
	
	}
	
	function user_mnager_um_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_2 = getonefielddata("SELECT um_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_2 = "";
		}
		return $um_2;	
	}
	
	function user_mnager_um_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_3 = getonefielddata("SELECT um_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_3 = "";
		}
		return $um_3;	
	}
	
	function user_mnager_um_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_4 = getonefielddata("SELECT um_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_4 = "";
		}
		return $um_4;	
	}
	
	function user_mnager_um_5(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_5 = getonefielddata("SELECT um_5 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_5 = "";
		}
		return $um_5;	
	}
	
	function user_mnager_um_6(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_6 = getonefielddata("SELECT um_6 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_6 = "";
		}
		return $um_6;	
	}
	
	function user_mnager_um_7(){
		
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_7 = getonefielddata("SELECT um_7 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_7 = "";
		}
		return $um_7;	
	}
	
	function user_mnager_um_8(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_8 = getonefielddata("SELECT um_8 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_8 = "";
		}
		return $um_8;	
	}
	
	function user_mnager_um_9(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$um_9 = getonefielddata("SELECT um_9 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$um_9 = "";
		}
		return $um_9;	
	}
	
	function user_mnager_umof_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$umof_1 = getonefielddata("SELECT umof_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$umof_1 = "";
		}
		return $umof_1;	
	}
	
	function user_mnager_umof_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$umof_2 = getonefielddata("SELECT umof_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$umof_2 = "";
		}
		return $umof_2;	
	}
	
	function user_mnager_umof_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$umof_3 = getonefielddata("SELECT umof_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$umof_3 = "";
		}
		return $umof_3;	
	}
	
	function user_mnager_umof_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$umof_4 = getonefielddata("SELECT umof_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$umof_4 = "";
		}
		return $umof_4;	
	}
	
	function audit_msgs_am_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$am_1 = getonefielddata("SELECT am_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$am_1 = "";
		}
		return $am_1;	
	}
	
	function audit_msgs_am_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$am_2 = getonefielddata("SELECT am_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$am_2 = "";
		}
		return $am_2;	
	}
	
	function question_mgmnt_qm_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$qm_1 = getonefielddata("SELECT qm_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$qm_1 = "";
		}
		return $qm_1;	
	}
	
	function question_mgmnt_qm_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$qm_2 = getonefielddata("SELECT qm_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$qm_2 = "";
		}
		return $qm_2;	
	}
	
	function question_mgmnt_qm_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$qm_3 = getonefielddata("SELECT qm_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$qm_3 = "";
		}
		return $qm_3;	
	}
	
	function question_mgmnt_qm_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$qm_4 = getonefielddata("SELECT qm_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$qm_4 = "";
		}
		return $qm_4;	
	}
	
	function cast_mgmnt_cm_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$cm_1 = getonefielddata("SELECT cm_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$cm_1 = "";
		}
		return $cm_1;	
	}
	
	function cast_mgmnt_cm_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$cm_2 = getonefielddata("SELECT cm_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$cm_2 = "";
		}
		return $cm_2;	
	}
	
	function cast_mgmnt_cm_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$cm_3 = getonefielddata("SELECT cm_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$cm_3 = "";
		}
		return $cm_3;	
	}
	
	function cast_mgmnt_cm_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$cm_4 = getonefielddata("SELECT cm_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$cm_4 = "";
		}
		return $cm_4;	
	}
	
	function event_mgmnt_em_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$em_1 = getonefielddata("SELECT em_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$em_1 = "";
		}
		return $em_1;	
	}
	
	function event_mgmnt_em_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$em_2 = getonefielddata("SELECT em_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$em_2 = "";
		}
		return $em_2;	
	}
	
	function event_mgmnt_em_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$em_3 = getonefielddata("SELECT em_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$em_3 = "";
		}
		return $em_3;	
	}	
	
	function event_mgmnt_em_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$em_4 = getonefielddata("SELECT em_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$em_4 = "";
		}
		return $em_4;	
	}
	
	function location_mgmnt_lc_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$lc_1 = getonefielddata("SELECT lc_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$lc_1 = "";
		}
		return $lc_1;	
	}
	
	function location_mgmnt_lc_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$lc_2 = getonefielddata("SELECT lc_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$lc_2 = "";
		}
		return $lc_2;	
	}	
	
	function location_mgmnt_lc_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$lc_4 = getonefielddata("SELECT lc_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$lc_4 = "";
		}
		return $lc_4;	
	}
	
	function dir_mgmnt_dm_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$dm_1 = getonefielddata("SELECT dm_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$dm_1 = "";
		}
		return $dm_1;	
	}
	
	function dir_mgmnt_dm_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$dm_2 = getonefielddata("SELECT dm_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$dm_2 = "";
		}
		return $dm_2;	
	}
	
	function dir_mgmnt_dm_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$dm_3 = getonefielddata("SELECT dm_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$dm_3 = "";
		}
		return $dm_3;	
	}
	
	function dir_mgmnt_dmd_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$dmd_1 = getonefielddata("SELECT dmd_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$dmd_1 = "";
		}
		return $dmd_1;	
	}
	
	function dir_mgmnt_dmd_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$dmd_3 = getonefielddata("SELECT dmd_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$dmd_3 = "";
		}
		return $dmd_3;	
	}
	
	function announce_mgmnt_ama_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$ama_1 = getonefielddata("SELECT ama_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$ama_1 = "";
		}
		return $ama_1;	
	}
	
	function announce_mgmnt_ama_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$ama_2 = getonefielddata("SELECT ama_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$ama_2 = "";
		}
		return $ama_2;	
	}	
	
	function announce_mgmnt_ama_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$ama_4 = getonefielddata("SELECT ama_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$ama_4 = "";
		}
		return $ama_4;	
	}
	
	function testimonial_mgmnt_tm_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$tm_1 = getonefielddata("SELECT tm_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$tm_1 = "";
		}
		return $tm_1;	
	}
	
	function testimonial_mgmnt_tm_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$tm_2 = getonefielddata("SELECT tm_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$tm_2 = "";
		}
		return $tm_2;	
	}
	
	function testimonial_mgmnt_tm_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$tm_4 = getonefielddata("SELECT tm_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$tm_4 = "";
		}
		return $tm_4;	
	}
	
	function wink_show_ws_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$ws_1 = getonefielddata("SELECT ws_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$ws_1 = "";
		}
		return $ws_1;	
	}
	function wink_show_ws_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$ws_2 = getonefielddata("SELECT ws_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$ws_2 = "";
		}
		return $ws_2;	
	}
	function wink_show_ws_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$ws_4 = getonefielddata("SELECT ws_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$ws_4 = "";
		}
		return $ws_4;	
	}
	
	function pkg_mgmnt_pm_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$pm_1 = getonefielddata("SELECT pm_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$pm_1 = "";
		}
		return $pm_1;	
	}
	
	function pkg_mgmnt_pm_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$pm_2 = getonefielddata("SELECT pm_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$pm_2 = "";
		}
		return $pm_2;	
	}
	
	function pkg_mgmnt_pm_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$pm_4 = getonefielddata("SELECT pm_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$pm_4 = "";
		}
		return $pm_4;	
	}
	
	function pkg_mgmnt_pm_5(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$pm_5 = getonefielddata("SELECT pm_5 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$pm_5 = "";
		}
		return $pm_5;	
	}
	
	function cms_mgmnt_cmc_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$cmc_1 = getonefielddata("SELECT cmc_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$cmc_1 = "";
		}
		return $cmc_1;	
	}
	
	function cms_mgmnt_cmc_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$cmc_2 = getonefielddata("SELECT cmc_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$cmc_2 = "";
		}
		return $cmc_2;	
	}
	
	function cms_mgmnt_cmc_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$cmc_4 = getonefielddata("SELECT cmc_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$cmc_4 = "";
		}
		return $cmc_4;	
	}
	
	function banner_mgmnt_bm_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bm_1 = getonefielddata("SELECT bm_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bm_1 = "";
		}
		return $bm_1;	
	}
	
	function banner_mgmnt_bm_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bm_2 = getonefielddata("SELECT bm_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bm_2 = "";
		}
		return $bm_2;	
	}
	
	function banner_mgmnt_bm_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bm_4 = getonefielddata("SELECT bm_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bm_4 = "";
		}
		return $bm_4;	
	}
	
	function banner_mgmnt_bm_5(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bm_5 = getonefielddata("SELECT bm_5 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bm_5 = "";
		}
		return $bm_5;	
	}
	
	function banner_mgmnt_bm_6(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bm_6 = getonefielddata("SELECT bm_6 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bm_6 = "";
		}
		return $bm_6;	
	}
	
	function home_search_hp_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$hp_1 = getonefielddata("SELECT hp_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$hp_1 = "";
		}
		return $hp_1;
	}
	
	function home_search_hp_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$hp_2 = getonefielddata("SELECT hp_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$hp_2 = "";
		}
		return $hp_2;
	}
	
	function home_search_hp_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$hp_4 = getonefielddata("SELECT hp_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$hp_4 = "";
		}
		return $hp_4;
	}
	
	function emp_mgmnt_emm_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$emm_1 = getonefielddata("SELECT emm_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$emm_1 = "";
		}
		return $emm_1;
	}
	
	function emp_mgmnt_emm_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$emm_2 = getonefielddata("SELECT emm_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$emm_2 = "";
		}
		return $emm_2;
	}
	
	function emp_mgmnt_emm_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$emm_4 = getonefielddata("SELECT emm_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$emm_4 = "";
		}
		return $emm_4;
	}
	
	function bulk_email_be_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$be_1 = getonefielddata("SELECT be_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$be_1 = "";
		}
		return $be_1;
	}
	
	function bulk_email_be_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$be_2 = getonefielddata("SELECT be_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$be_2 = "";
		}
		return $be_2;
	}	
	
	
	function bulk_email_be_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$be_4 = getonefielddata("SELECT be_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$be_4 = "";
		}
		return $be_4;
	}
	
	function bulk_email_be_5(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$be_5 = getonefielddata("SELECT be_5 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$be_5 = "";
		}
		return $be_5;
	}
	
	function ban_ip_bi_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bi_1 = getonefielddata("SELECT bi_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bi_1 = "";
		}
		return $bi_1;
	}
	
	function ban_ip_bi_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bi_2 = getonefielddata("SELECT bi_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bi_2 = "";
		}
		return $bi_2;
	}
	
	function ban_ip_bi_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bi_3 = getonefielddata("SELECT bi_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bi_3 = "";
		}
		return $bi_3;
	}
	
	function ban_ip_bi_5(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$bi_5 = getonefielddata("SELECT bi_5 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$bi_5 = "";
		}
		return $bi_5;
	}
	
	function web_setting_wss_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_1 = getonefielddata("SELECT wss_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_1 = "";
		}
		return $wss_1;
	}
	
	function web_setting_wss_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_2 = getonefielddata("SELECT wss_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_2 = "";
		}
		return $wss_2;
	}
	
	function web_setting_wss_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_3 = getonefielddata("SELECT wss_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_3 = "";
		}
		return $wss_3;
	}
	
	function web_setting_wss_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_4 = getonefielddata("SELECT wss_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_4 = "";
		}
		return $wss_4;
	}
	
	function web_setting_wss_5(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_5 = getonefielddata("SELECT wss_5 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_5 = "";
		}
		return $wss_5;
	}
	
	function web_setting_wss_6(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_6 = getonefielddata("SELECT wss_6 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_6 = "";
		}
		return $wss_6;
	}
	
	function web_setting_wss_7(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_7 = getonefielddata("SELECT wss_7 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_7 = "";
		}
		return $wss_7;
	}
	
	function web_setting_wss_8(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_8 = getonefielddata("SELECT wss_8 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_8 = "";
		}
		return $wss_8;
	}
	
	function web_setting_wss_9(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_9 = getonefielddata("SELECT wss_9 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_9 = "";
		}
		return $wss_9;
	}
	
	function web_setting_wss_10(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_10 = getonefielddata("SELECT wss_10 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_10 = "";
		}
		return $wss_10;
	}
	
	function web_setting_wss_11(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$wss_11 = getonefielddata("SELECT wss_11 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$wss_11 = "";
		}
		return $wss_11;
	}
	
	function invoice_msgmnt_im_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$im_1 = getonefielddata("SELECT im_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$im_1 = "";
		}
		return $im_1;
	}
	
	
	function invoice_msgmnt_imu_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$imu_1 = getonefielddata("SELECT imu_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$imu_1 = "";
		}
		return $imu_1;
	}
	
	function invoice_msgmnt_imu_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$imu_2 = getonefielddata("SELECT imu_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$imu_2 = "";
		}
		return $imu_2;
	}
	
	function invoice_msgmnt_imu_3(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$imu_3 = getonefielddata("SELECT imu_3 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$imu_3 = "";
		}
		return $imu_3;
	}
	
	function invoice_msgmnt_imu_4(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$imu_4 = getonefielddata("SELECT imu_4 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$imu_4 = "";
		}
		return $imu_4;
	}
	
	function inq_mgmnt_imi_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$imi_1 = getonefielddata("SELECT imi_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$imi_1 = "";
		}
		return $imi_1;
	}
	
	function inq_mgmnt_imis_1(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$imis_1 = getonefielddata("SELECT imis_1 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$imis_1 = "";
		}
		return $imis_1;
	}
	
	function inq_mgmnt_imis_2(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$imis_2 = getonefielddata("SELECT imis_2 from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$imis_2 = "";
		}
		return $imis_2;
	}
	function crm_cpgn_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_cpgn_mgr = getonefielddata("SELECT crm_cpgn_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_cpgn_mgr = "";
		}
		return $crm_cpgn_mgr;
	}
	
	function crm_cpgn_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_cpgn_mas = getonefielddata("SELECT crm_cpgn_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_cpgn_mas = "";
		}
		return $crm_cpgn_mas;
	}
	
	function crm_cont_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_cont_mgr = getonefielddata("SELECT crm_cont_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_cont_mgr = "";
		}
		return $crm_cont_mgr;
	}
	
	function crm_cont_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_cont_mas = getonefielddata("SELECT crm_cont_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_cont_mas = "";
		}
		return $crm_cont_mas;
	}
	
	function crm_lead_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_lead_mgr = getonefielddata("SELECT crm_lead_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_lead_mgr = "";
		}
		return $crm_lead_mgr;
	}
	
	function crm_lead_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_lead_mas = getonefielddata("SELECT crm_lead_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_lead_mas = "";
		}
		return $crm_lead_mas;
	}
	
	function  crm_toppackages(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_toppackages = getonefielddata("SELECT crm_toppackages from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_toppackages = "";
		}
		return $crm_toppackages;
	}
	
	function crm_toprevenues(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_toprevenues = getonefielddata("SELECT crm_toprevenues from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_toprevenues = "";
		}
		return $crm_toprevenues;
	}
	
	function crm_topcampaign(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_topcampaign = getonefielddata("SELECT crm_topcampaign from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_topcampaign = "";
		}
		return $crm_topcampaign;
	}
	
	function crm_topcam_count(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_topcam_count = getonefielddata("SELECT crm_topcam_count from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_topcam_count = "";
		}
		return $crm_topcam_count;
	}
	
	
	
	function crm_topcampaignsales(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_topcampaignsales = getonefielddata("SELECT crm_topcampaignsales from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_topcampaignsales = "";
		}
		return $crm_topcampaignsales;
	}
	
	function crm_topemployee(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_topemployee = getonefielddata("SELECT crm_topemployee from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_topemployee = "";
		}
		return $crm_topemployee;
	}
	
	function crm_goalreport(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_goalreport = getonefielddata("SELECT crm_goalreport from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_goalreport = "";
		}
		return $crm_goalreport;
	}
	
	function crm_leadreport(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_leadreport = getonefielddata("SELECT crm_leadreport from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_leadreport = "";
		}
		return $crm_leadreport;
	}
	
	function crm_goal_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_goal_mgr = getonefielddata("SELECT crm_goal_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_goal_mgr = "";
		}
		return $crm_goal_mgr;
	}
	
	function crm_goal_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_goal_mas = getonefielddata("SELECT crm_goal_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_goal_mas = "";
		}
		return $crm_goal_mas;
	}
	
	function crm_status_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_status_mgr = getonefielddata("SELECT crm_status_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_status_mgr = "";
		}
		return $crm_status_mgr;
	}
	
	function crm_status_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_status_mas = getonefielddata("SELECT crm_status_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_status_mas = "";
		}
		return $crm_status_mas;
	}
	
	function crm_cat_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_cat_mgr = getonefielddata("SELECT crm_cat_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_cat_mgr = "";
		}
		return $crm_cat_mgr;
	}
	
	function crm_cat_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_cat_mas = getonefielddata("SELECT crm_cat_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_cat_mas = "";
		}
		return $crm_cat_mas;
	}
	
	function crm_type_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_type_mgr = getonefielddata("SELECT crm_type_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_type_mgr = "";
		}
		return $crm_type_mgr;
	}
	
	function crm_type_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_type_mas = getonefielddata("SELECT crm_type_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_type_mas = "";
		}
		return $crm_type_mas;
	}
	
	function crm_prty_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_prty_mgr = getonefielddata("SELECT crm_prty_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_prty_mgr = "";
		}
		return $crm_prty_mgr;
	}
	
	function crm_prty_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_prty_mas = getonefielddata("SELECT crm_prty_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_prty_mas = "";
		}
		return $crm_prty_mas;
	}
	
	function crm_cammed_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_cammed_mgr = getonefielddata("SELECT crm_cammed_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_cammed_mgr = "";
		}
		return $crm_cammed_mgr;
	}
	
	function crm_cammed_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_cammed_mas = getonefielddata("SELECT crm_cammed_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_cammed_mas = "";
		}
		return $crm_cammed_mas;
	}
	
	function crm_email_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_email_mgr = getonefielddata("SELECT crm_email_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_email_mgr = "";
		}
		return $crm_email_mgr;
	}
	
	function crm_email_mas(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_email_mas = getonefielddata("SELECT crm_email_mas from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_email_mas = "";
		}
		return $crm_email_mas;
	}
	
	function crm_salesmanager(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_salesmanager = getonefielddata("SELECT crm_salesmanager from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_salesmanager = "";
		}
		return $crm_salesmanager;
	}
	
	function crm_to_re(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_to_re = getonefielddata("SELECT crm_to_re from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_to_re = "";
		}
		return $crm_to_re;
	}
	
	function crm_todo_re(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_todo_re = getonefielddata("SELECT crm_todo_re from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_todo_re = "";
		}
		return $crm_todo_re;
	}
	
	function crm_mgr_das(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_mgr_das = getonefielddata("SELECT crm_mgr_das from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_mgr_das = "";
		}
		return $crm_mgr_das;
	}
	function crm_report(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_report = getonefielddata("SELECT crm_report from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_report = "";
		}
		return $crm_report;
	}
	function crm_leadreportsearch(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_leadreportsearch = getonefielddata("SELECT crm_leadreportsearch from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_leadreportsearch = "";
		}
		return $crm_leadreportsearch;
	}
	function crm_websitesettings(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_websitesettings = getonefielddata("SELECT crm_websitesettings from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_websitesettings = "";
		}
		return $crm_websitesettings;
	}
	function crm_changepassword(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$crm_changepassword = getonefielddata("SELECT crm_changepassword from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$crm_changepassword = "";
		}
		return $crm_changepassword;
	}
	function log_re(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$log_re = getonefielddata("SELECT log_re from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$log_re = "";
		}
		return $log_re;
	}
	
	function log_mgr(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'adminlogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$log_mgr = getonefielddata("SELECT log_mgr from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$log_mgr = "";
		}
		return $log_mgr;
	}
	
	function mydesk_access(){
		global $session_name_initital;
		$login_id = $_SESSION[$session_name_initital.'desklogin'];
		$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
		if($role_id!='0'){
			$mydesk_access  = getonefielddata("SELECT mydesk_access from tbl_employee_role_setting WHERE role_id=".$role_id);
		} else {
			$mydesk_access  = "";
		}
		return $mydesk_access ;
	}
	
	
	
	
?>
