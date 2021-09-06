<?php

class Api_model extends CI_Model{

    function check_mail_mobile($table, $username,$mobile)
    {
        $this->db->select('*');
        $this->db->from($table);

        $where="(email='".$username."' or mobile='".$mobile."')";

        $this->db->where($where);
       
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    function getAllpackages(){
        $result = $this->db->get("plan")->result();
        return $result;
    }
    function getAllhappystories(){
        $max_story_num = $this->db->get_where('frontend_settings', array('type' => 'max_story_num'))->row()->value;        
        $result = $this->db->get_where('happy_story', array('approval_status' => 1), $max_story_num)->result();
        return $result;
    }
    function getHomeMembers($id=""){
        if($id){

            $max_premium_member_num = $this->db->get_where('frontend_settings', array('type' => 'max_premium_member_num'))->row()->value;
            $get_member_gender = $this->db->get_where('member',array('member_id'=>$id))->row()->gender;
                if($get_member_gender == '2') {
                    $member_gender = '1';
                }
                if($get_member_gender == '1') {
                    $member_gender = '2';
                }
            $result = $this->db->order_by('rand()')->get_where('member', array('membership' => 2, 'is_blocked' => 'no','is_closed' => 'no','gender'=>$member_gender), $max_premium_member_num)->result();
            
        }else{
            $page_male_profile = $this->db->order_by('member_id','DESC')->get_where('member', array('membership' => 2, 'is_blocked' => 'no','is_closed' => 'no','gender' => 2),5)->result();
            $page_female_profile = $this->db->order_by('member_id','DESC')->get_where('member', array('membership' => 2, 'is_blocked' => 'no','is_closed' => 'no','gender' => 1),5)->result();
            $result = array_merge($page_male_profile, $page_female_profile);
        }

        return $result;
    }
    function getProfilePercentage($id=""){
        if($id){
            $result = $this->Crud_model->get_profile_percentage($id);
        }else{
            $result = [];
        }
        
        return $result;
    }
    function getAllOnBehalf(){
        $result = $this->db->get("on_behalf")->result();
        return $result;
    }
    function getAllGender(){
        $result = $this->db->get("gender")->result();
        return $result;
    }
    function getAllMaritalStatus(){
        $result = $this->db->get("marital_status")->result();
        return $result;
    }
    function getListing($type="",$id="",$limit="",$offset=""){

        $pageOffset = $offset=="" || $offset == 0 ? 5: (($offset+1) * 5);
        
        $member_id = $id;
        if (!empty($member_id))
        {
            $get_member_gender = $this->db->get_where('member',array('member_id'=>$member_id))->row()->gender;
        
            if($get_member_gender == '2') {
                $member_gender = '1';
            }
            if($get_member_gender == '1') {
                $member_gender = '2';
            }
        }

        if($type=="premium_members"){
                        
            //For Ignored Members                 
            $ignored_ids = $this->Crud_model->get_type_name_by_id('member', $member_id, 'ignored');
            $ignored_ids = json_decode($ignored_ids, true);
            $ignored_by_ids = $this->Crud_model->get_type_name_by_id('member', $member_id, 'ignored_by');
            $ignored_by_ids = json_decode($ignored_by_ids, true);
            if (empty($ignored_by_ids)) {
                array_push($ignored_by_ids, 0);
            }
            if (!empty($ignored_ids)) {
                $this->db->where('gender', $member_gender);
                $get_all_members = $this->db->order_by("last_logined", "desc")->where_not_in('member_id', $ignored_ids)->where_not_in('member_id', $ignored_by_ids)->get_where('member', array('membership' => 2, 'member_id !=' => $member_id, 'is_blocked' => 'no','is_closed' => 'no'),$limit,$pageOffset)->result();
            }
            else {
                $this->db->where('gender', $member_gender);
                $get_all_members = $this->db->order_by("last_logined", "desc")->where_not_in('member_id', $ignored_by_ids)->get_where('member', array('membership' => 2, 'member_id !=' => $member_id, 'is_blocked' => 'no','is_closed' => 'no'),$limit,$pageOffset)->result();
            }

            $result =  $get_all_members;

        }elseif($type=="free_members"){

            if($id){
                $ignored_ids = $this->Crud_model->get_type_name_by_id('member', $member_id, 'ignored');
                $ignored_ids = json_decode($ignored_ids, true);
                $ignored_by_ids = $this->Crud_model->get_type_name_by_id('member', $member_id, 'ignored_by');
                $ignored_by_ids = json_decode($ignored_by_ids, true);
                if (empty($ignored_by_ids)) {
                    array_push($ignored_by_ids, 0);
                }
                if (!empty($ignored_ids)) {
                    $this->db->where('gender', $member_gender);
                    $get_all_members = $this->db->order_by("last_logined", "desc")->where_not_in('member_id', $ignored_ids)->where_not_in('member_id', $ignored_by_ids)->get_where('member', array('membership' => 1, 'member_id !=' => $member_id, 'is_blocked' => 'no','is_closed' => 'no'),$limit,$pageOffset)->result();
                }
                else {
                    $this->db->where('gender', $member_gender);
                    $get_all_members = $this->db->order_by("last_logined", "desc")->where_not_in('member_id', $ignored_by_ids)->get_where('member', array('membership' => 1, 'member_id !=' => $member_id, 'is_blocked' => 'no','is_closed' => 'no'),$limit,$pageOffset)->result();
                }    
            }else{              
                $get_all_members = ""; 
            }
            // echo $this->db->last_query();exit;
            $result = $get_all_members;

        }elseif($type=="home_search"){
            if($id){
                $partner_expectation = $this->Crud_model->get_type_name_by_id('member',$id, 'partner_expectation');             
                $partner_expectation_data = json_decode($partner_expectation, true);
                // print_r($partner_expectation_data);exit;

                $page_data['home_gender'] = "";  
                $page_data['home_sub_caste'] = "";
                $page_data['home_language'] = "";
                $page_data['aged_from'] = $partner_expectation_data[0]['partner_age_from'];
                $page_data['aged_to'] = $partner_expectation_data[0]['partner_age_to'];
                $page_data['min_height'] = $partner_expectation_data[0]['partner_height_from'];
                $page_data['max_height'] = $partner_expectation_data[0]['partner_height_to'];               
                if(isset($partner_expectation_data[0]['partner_marital_status'][0])){
                    $page_data['marital_status'] = $partner_expectation_data[0]['partner_marital_status'][0];
                    }else{
                        $page_data['marital_status'] ="";    
                    }
                if(isset($partner_expectation_data[0]['partner_marital_status'][0])){
                    $page_data['home_religion'] = $partner_expectation_data[0]['partner_religion'][0];
                    }else{
                        $page_data['home_religion'] ="";    
                }  
                if(isset($partner_expectation_data[0]['partner_caste'][0])){
                    $page_data['home_caste'] = $partner_expectation_data[0]['partner_caste'][0];
                    }else{
                        $page_data['home_caste'] ="";    
                }
            }else{            
                $page_data['home_gender'] = "";
                $page_data['home_religion'] = "";
                $page_data['home_caste'] = "";
                $page_data['home_sub_caste'] = "";
                $page_data['home_language'] = "";
                $page_data['min_height'] = "";
                $page_data['max_height'] = "";
                $page_data['marital_status']="";  
                $page_data['aged_from'] = ""; 
                $page_data['aged_to'] = ""; 
            }

            // $result = $page_data;
            $all_result = array();

            $ignored_ids = $this->Crud_model->get_type_name_by_id('member', $member_id, 'ignored');
            $ignored_ids = json_decode($ignored_ids, true);
            $ignored_by_ids = $this->Crud_model->get_type_name_by_id('member', $member_id, 'ignored_by');
            $ignored_by_ids = json_decode($ignored_by_ids, true);
            if (empty($ignored_by_ids)) {
                array_push($ignored_by_ids, 0);
            }
            if (!empty($ignored_ids)) {
                $this->db->where('gender', $member_gender);
                $all_id = $this->db->select('member_id')->where_not_in('member_id', $ignored_ids)->where_not_in('member_id', $ignored_by_ids)->get_where('member', array('member_id !=' => $member_id, 'is_blocked' => 'no','is_closed' => 'no'))->result();
            }
            else {
                $this->db->where('gender', $member_gender);
                $all_id = $this->db->select('member_id')->where_not_in('member_id', $ignored_by_ids)->get_where('member', array('member_id !=' => $member_id, 'is_blocked' => 'no','is_closed' => 'no'))->result();
            }

            foreach ($all_id as $row) {
                $all_result[] = $row->member_id;
            }

            if (!empty($page_data['aged_from'])) {
                $aged_from=$this->Crud_model->get_type_name_by_id('preference_decision',$page_data['aged_from']);
                $sql_aged_from = strtotime(date('Y-m-d', strtotime("-".$aged_from." years")));
            }
            if (!empty($page_data['aged_to'])) {
                $aged_to=$this->Crud_model->get_type_name_by_id('preference_decision', $page_data['aged_to']);
                $sql_aged_to = strtotime(date('Y-m-d', strtotime("-".$aged_to." years")));
            }
            if (isset($sql_aged_from) && isset($sql_aged_to)) {
                $by_ages = $this->db->select('member_id')->get_where('member',array('date_of_birth <=' => $sql_aged_from, 'date_of_birth >=' => $sql_aged_to))->result();
               // print_r($by_ages); exit;
                foreach ($by_ages as $by_ages) {
                    $by_age[] = $by_ages->member_id;
                }
            } else {
                $by_age = $all_result;
            }
            if (isset($page_data['home_gender']) && $page_data['home_gender'] != "") {
                $by_genders = $this->db->select('member_id')->get_where('member', array('gender' => $page_data['home_gender']))->result();
                foreach ($by_genders as $by_genders) {
                    $by_gender[] = $by_genders->member_id;
                }
            } else {
                $by_gender = $all_result;
            }
           
            if (isset($page_data['home_caste']) && $page_data['home_caste'] != "") {
                $this->db->select('member_id')->like('spiritual_and_social_background','"caste":"'.$page_data['home_caste'].'"','both');
                $by_castes = $this->db->get('member')->result();
                foreach ($by_castes as $by_castes) {
                    $by_caste[] = $by_castes->member_id;
                }
            } else {
                $by_caste = $all_result;
            }
            if (isset($page_data['marital_status']) && $page_data['marital_status'] != "") {
                $this->db->select('member_id')->like('basic_info','"marital_status":"'.$page_data['marital_status'].'"','both');
                $by_marital_statuss = $this->db->get('member')->result();
                foreach ($by_marital_statuss as $by_marital_statuss) {
                    $by_marital_status[] = $by_marital_statuss->member_id;
                }
            } else {
                $by_marital_status = $all_result;
            }
            if (isset($page_data['home_religion']) && $page_data['home_religion'] != "") {
                $this->db->select('member_id')->like('spiritual_and_social_background','"religion":"'.$page_data['home_religion'].'"','both');
                $by_religions = $this->db->get('member')->result();
                foreach ($by_religions as $by_religions) {
                    $by_religion[] = $by_religions->member_id;
                }
            } else {
                $by_religion = $all_result;
            }
            if (isset($page_data['home_sub_caste']) && $page_data['home_sub_caste'] != "") {
                $this->db->select('member_id')->like('present_address','"sub_caste":"'.$page_data['home_sub_caste'].'"','both');
                $by_sub_caste = $this->db->get('member')->result();
                foreach ($by_sub_caste as $by_sub_caste) {
                    $by_sub_caste[] = $by_sub_caste->member_id;
                }
            } else {
                $by_sub_caste = $all_result;
            }
            if (isset($page_data['home_language']) && $page_data['home_language'] != "") {
                foreach($page_data['home_language'] as $value) {
                    $this->db->select('member_id')->like('language','"mother_tongue":"'.$value.'"','both');
                    $by_languages = $this->db->get('member')->result();
                    // print_r($by_languages);
                    foreach ($by_languages as $by_languages) {
                        $by_language[] = $by_languages->member_id;
                    }
                }
            } else {
                $by_language = $all_result;
            }
            if (!empty($page_data['min_height']) && !empty($page_data['max_height'])) {
                $by_heights = $this->db->select('member_id')->get_where('member',array('height >=' => $page_data['min_height'], 'height <=' => $page_data['max_height']))->result();
                foreach ($by_heights as $by_heights) {
                    $by_height[] = $by_heights->member_id;
                }
            } else {
                $by_height = $all_result;
            }
            $all_array = array_intersect($by_gender,$by_age,$by_caste,$by_marital_status,$by_religion,$by_sub_caste,$by_language,$by_height);
            // print_r($all_array);exit;
            // $all_array = ['439', '447', '485', '631', '755', '759', '763', '828', '856', '925', '997', '2134', '2137', '2560', '2561', '2563', '2587', '3039'];
            if (!empty($all_array)) {
                $this->db->where_in('member_id', $all_array);
                $cond = array('is_blocked' =>'no','is_closed' =>'no');
                if($limit==$pageOffset)
                $get_all_members = $this->db->order_by("last_logined", "desc")->where($cond)->get('member',$limit)->result();
                else
                $get_all_members = $this->db->order_by("last_logined", "desc")->where($cond)->limit($limit,$pageOffset)->get('member')->result();
            } else {
                $cond = array('is_blocked' =>'no','is_closed' =>'no','member_id !='=> $member_id);
                if($limit==$pageOffset)
                $get_all_members = $this->db->order_by("last_logined", "desc")->where($cond)->get('member',$limit)->result();
                else
                $get_all_members = $this->db->order_by("last_logined", "desc")->where($cond)->get('member',$limit,$pageOffset)->result();
           
            }
            // echo $this->db->last_query();exit;
            $result =  $get_all_members;
        }

        return $result;
    }


}

?>