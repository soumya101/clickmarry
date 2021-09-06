<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

    class Export_model extends CI_Model {

        public function exportexcel($memberType) {
			$query = $this->db->select('member_profile_id,CONCAT(first_name, " '.' ", last_name) AS name,email,mobile')->where('membership',$memberType)->get('member');
			return $query->result_array();	
        }
        
    }
?>