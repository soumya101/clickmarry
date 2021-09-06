<?php
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Email_model extends CI_Model {
      

        function __construct() {
            parent::__construct();
        }

        function password_reset_email($account_type = '', $id = '', $pass = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $query = $this->db->get_where($account_type, array($account_type . '_id' => $id));

            if ($query->num_rows() > 0) {

                $sub = $this->db->get_where('email_template', array('email_template_id' => 1))->row()->subject;
                $to = $query->row()->email;
                if ($account_type == 'member') {
                    $to_name = $query->row()->first_name . ' ' . $query->row()->last_name;
                } else {
                    $to_name = $query->row()->name;
                }
                $email_body = $this->db->get_where('email_template', array('email_template_id' => 1))->row()->body;
                $email_body = str_replace('[[to]]', $to_name, $email_body);
                $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                $email_body = str_replace('[[password]]', $pass, $email_body);
                $email_body = str_replace('[[from]]', $from_name, $email_body);

                $send_mail = $this->do_email($protocol,$from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function status_email($account_type = '', $id = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $query = $this->db->get_where($account_type, array($account_type . '_id' => $id));

            if ($query->num_rows() > 0) {
                $sub = $this->db->get_where('email_template', array('email_template_id' => 2))->row()->subject;
                $to = $query->row()->email;
                if ($account_type == 'user') {
                    $to_name = $query->row()->firstname . ' ' . $query->row()->lastname;
                } else {
                    $to_name = $query->row()->name;
                }
                if ($query->row()->status == 'approved') {
                    $status = "Approved";
                } else {
                    $status = "Postponed";
                }
                $email_body = $this->db->get_where('email_template', array('email_template_id' => 2))->row()->body;
                $email_body = str_replace('[[to]]', $to_name, $email_body);
                $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                $email_body = str_replace('[[email]]', $to, $email_body);
                $email_body = str_replace('[[status]]', $status, $email_body);
                $email_body = str_replace('[[from]]', $from_name, $email_body);

                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function account_opening($account_type = '', $email = '', $pass = '',$profile_id='') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $to = $email;
            $query = $this->db->get_where($account_type, array('email' => $email));

            if ($query->num_rows() > 0) {

                if ($account_type == 'member') {
                    $sub = $this->db->get_where('email_template', array('email_template_id' => 4))->row()->subject;
                    $to_name = $query->row()->first_name . ' ' . $query->row()->last_name;
                    $profile_id=$query->row()->member_profile_id;
                    $url = base_url()."home/login";
                    $email_body = $this->db->get_where('email_template', array('email_template_id' => 4))->row()->body;
                    $email_body = str_replace('[[to]]', $to_name, $email_body);
                    $email_body = str_replace('[[sitename]]', $from_name, $email_body);
                    $email_body = str_replace('[[profile_id]]', $profile_id, $email_body);
                    $email_body = str_replace('[[email]]', $to, $email_body);
                    $email_body = str_replace('[[password]]', $pass, $email_body);
                    $email_body = str_replace('[[url]]', $url, $email_body);
                    $email_body = str_replace('[[from]]', $from_name, $email_body);
                }
                elseif ($account_type == 'admin') {
                    $sub = $this->db->get_where('email_template', array('email_template_id' => 5))->row()->subject;
                    $to_name = $query->row()->name;
                    $role_type = $this->Crud_model->get_type_name_by_id('role', $query->row()->role);
                    $url = base_url()."admin/login";

                    $email_body = $this->db->get_where('email_template', array('email_template_id' => 5))->row()->body;
                    $email_body = str_replace('[[to]]', $to_name, $email_body);
                    $email_body = str_replace('[[sitename]]', $from_name, $email_body);
                    $email_body = str_replace('[[role_type]]', $role_type, $email_body);
                    $email_body = str_replace('[[email]]', $to, $email_body);
                    $email_body = str_replace('[[password]]', $pass, $email_body);
                    $email_body = str_replace('[[url]]', $url, $email_body);
                    $email_body = str_replace('[[from]]', $from_name, $email_body);
                }

                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function staff_account_add($account_type = '', $email = '', $pass = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $to = $email;
            $query = $this->db->get_where($account_type, array('email' => $email));

            if ($query->num_rows() > 0) {
                $sub = $this->db->get_where('email_template', array('email_template_id' => 4))->row()->subject;
                if ($account_type == 'member') {
                    $to_name = $query->row()->first_name . ' ' . $query->row()->last_name;
                    $url = base_url()."home/login";

                    $email_body = $this->db->get_where('email_template', array('email_template_id' => 4))->row()->body;
                    $email_body = str_replace('[[to]]', $to_name, $email_body);
                    $email_body = str_replace('[[sitename]]', $from_name, $email_body);
                    $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                    $email_body = str_replace('[[email]]', $to, $email_body);
                    $email_body = str_replace('[[password]]', $pass, $email_body);
                    $email_body = str_replace('[[url]]', $url, $email_body);
                    $email_body = str_replace('[[from]]', $from_name, $email_body);
                }

                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function subscruption_email($account_type = '', $member_id = '', $plan_id = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $to = $this->db->get_where('member', array('member_id' => $member_id))->row()->email;
            $package = $this->db->get_where('plan', array('plan_id' => $plan_id))->row()->name;
            $amount = $this->db->get_where('plan', array('plan_id' => $plan_id))->row()->amount;
            $query = $this->db->get_where('member', array('email' => $to));

            if ($query->num_rows() > 0) {
                $sub = $this->db->get_where('email_template', array('email_template_id' => 2))->row()->subject;
                if ($account_type == 'member') {

                    $to_name = $query->row()->first_name . ' ' . $query->row()->last_name;

                    $email_body = $this->db->get_where('email_template', array('email_template_id' => 2))->row()->body;
                    $email_body = str_replace('[[to]]', $to_name, $email_body);
                    $email_body = str_replace('[[sitename]]', $from_name, $email_body);
                    $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                    $email_body = str_replace('[[email]]', $to, $email_body);
                    $email_body = str_replace('[[package]]', $package, $email_body);
                    $email_body = str_replace('[[amount]]', $amount, $email_body);
                    $email_body = str_replace('[[from]]', $from_name, $email_body);
                }
                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function newsletter($title = '', $text = '', $email = '', $from = '') {
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $this->do_email($from, $from_name, $email, $title, $text);
        }

        /* ***custom email sender*** */
        function profile_report($from = '', $from_name ='', $reported_person = '',$from_id = '')
        {

            $this->load->database();
            $to = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            $sub = 'Profile report';
            $member_type = $this->db->get_where('member',array('member_id'=>$reported_person))->row()->membership;
            if($member_type == 1)
            {
                $type = 'free_members';
            }
            else
            {
                $type = 'premium_members';
            }

            $from_member_id = $this->db->get_where('member', array('member_id' => $from_id))->row()->member_profile_id;
            $reported_member_id = $this->db->get_where('member', array('member_id' => $reported_person))->row()->member_profile_id;
            $reported_member_first_name = $this->db->get_where('member', array('member_id' => $reported_person))->row()->first_name;
            $reported_member_last_name = $this->db->get_where('member', array('member_id' => $reported_person))->row()->last_name;
            $reported_member_name = $reported_member_first_name.' '. $reported_member_last_name;

            $link = base_url()."admin".'/members/'.$type.'/view_member'.'/'.$reported_person;
            $email_body = $from_name.' ('. $from_member_id .')'.' '.'reported to '.$reported_member_name.'('.$reported_member_id.')'.' '.$link;
            $cc = 'helpdesk@clickmarry.in';
            $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body,$cc);
            return $send_mail;

        }

        // Accept/Decline mail send 
        function accept_mail_send($member_id,$senders_id,$sender_email = '', $sender_name = '', $to = '', $sub = '')
        {
            $msg_body = "";
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }
            $account_type = 'member';
            $query = $this->db->get_where($account_type, array('email' => $to));

            if ($query->num_rows() > 0) {
           
            // receiver details //
            $receiver_member_id = $this->db->get_where('member', array('member_id' => $member_id))->row()->member_profile_id;
            $receiver_last_name = $this->db->get_where('member', array('member_id' => $member_id))->row()->last_name;
            $receiver_first_name = $this->db->get_where('member', array('member_id' => $member_id))->row()->first_name;
            // End of receiver details //
            // sender details //
            $sender_image = json_decode($this->db->get_where('member', array('email' => $sender_email))->row()->profile_image);
            $sender_member_id = $this->db->get_where('member', array('email' => $sender_email))->row()->member_profile_id;
            $sender_first_name = $this->db->get_where('member', array('email' => $sender_email))->row()->first_name;
            $sender_last_name = $this->db->get_where('member', array('email' => $sender_email))->row()->last_name;
            $sender_age = $this->db->get_where('member', array('member_id' => $senders_id))->row()->date_of_birth;
            $sender_height_code = $this->db->get_where('member', array('member_id' => $senders_id))->row()->height;
            $sender_height = $this->Crud_model->get_type_name_by_id('custom_decision', $sender_height_code);  
            $spiritual_and_social_background = json_decode($this->db->get_where('member', array('member_id' => $senders_id))->row()->spiritual_and_social_background);         
            $caste_code = '';
            foreach ($spiritual_and_social_background as $obj) {
                $caste_code = $obj->caste;
            }
            $sender_caste = $this->db->get_where('caste', array('caste_id'=>$caste_code))->row()->caste_name;
            $sender_present_address = json_decode($this->Crud_model->get_type_name_by_id('member', $senders_id, 'present_address'));
            $country_code = '';
            $state_code = '';
            $city_code = '';
            foreach ($sender_present_address as $loc_obj) {
                $state_code = $loc_obj->state;
                $country_code = $loc_obj->country;
                $city_code = $loc_obj->city;
            }
            $sender_education_and_career = json_decode($this->Crud_model->get_type_name_by_id('member',$senders_id, 'education_and_career'));
            // End of sender details //
            $edu_code = '';
            $occupation_code = ''; 
            foreach ($sender_education_and_career as $edu_obj) {
                $edu_code = $edu_obj->highest_education;
                $occupation_code = $edu_obj->occupation;
            }
          
            $profile_image = [] ;
            if ($sender_image) {
                $profile_image = ''. base_url() .'uploads/profile_image/'. $sender_image[0]->profile_image .'';
            } else {               
                $profile_image = ''.base_url() .'uploads/profile_image/default.jpg'.'';
            }
            // $mail->isHTML(true);
            $msg_body = "<table width='400' border='0' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; border:1px solid #999; padding:10px; '>
                    <tr>
                    <td colspan='2'>
                    <h4 style='margin:0 0 8px 0; padding:0;'>Dear ". $receiver_first_name ." ". $receiver_last_name ." (".$receiver_member_id.")</h4>
                    Your match ". $sender_first_name ." ". $sender_last_name ." is a accepted your request. Get a quicker response by contacting now!
                    </td>
                    <tr>
                    <td colspan='2' height='5px'></td></tr>
                    </tr>
                    <tr>
                        <td valign='top'><img src=". $profile_image ." width='90' /></td>
                        <td valign='top' style='font-weight:normal;' ><h3 style='margin-bottom:2px; margin-top:2px;'>". $sender_first_name ." ". $sender_last_name ." (".$sender_member_id.")</h3>
                        <p style='line-height:22px;'>". (date('Y') - date('Y',$sender_age)) ." Yrs. ". $sender_height ." | ". $sender_caste .",
                    Location: ". $this->Crud_model->get_type_name_by_id('city', $city_code) .", ". $this->Crud_model->get_type_name_by_id('state', $state_code) .". ". $this->Crud_model->get_type_name_by_id('country', $country_code) ."
                    Education: ". $this->Crud_model->get_type_name_by_id('education', $edu_code) ." | Occupation : ". $this->Crud_model->get_type_name_by_id('occupation',$occupation_code) ."
                    </p>
                    
                        </td>
                    </tr>
                    <tr>
                    <td colspan='2'><button style='background:green; float:right; color:#fff; -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px; border:none; padding:5px ; margin-bottom:5px; margin-right:10%;'>Accepted</button>
                    </td>
                    </tr>
                    <tr>
                    <td colspan='2' style='border-top:1px solid #7c786d; padding-top:5px;'>Team - ". $from_name ." Matrimony,<br />
                    For Happy Marriages
                    </td>
                    
                    </tr>
                    </table>";
                $send_mail = $this->do_accept_email($from, $from_name, $to, $sub, $msg_body);
                return $send_mail;
            } else {
                return false;
            }

            
        }
        // End of  Accept/Decline mail send

        // Express intrest mail send 
        function express_intrest_mail_send($member_id,$senders_id,$sender_email = '', $sender_name = '', $to = '', $sub = '')
        {
            $msg_body = "";
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }
            $account_type = 'member';
            $query = $this->db->get_where($account_type, array('email' => $to));

            if ($query->num_rows() > 0) {
        
            // receiver details //
            $receiver_member_id = $this->db->get_where('member', array('member_id' => $member_id))->row()->member_profile_id;
            $receiver_last_name = $this->db->get_where('member', array('member_id' => $member_id))->row()->last_name;
            $receiver_first_name = $this->db->get_where('member', array('member_id' => $member_id))->row()->first_name;
            // End of receiver details //
            // sender details //
            $sender_image = json_decode($this->db->get_where('member', array('email' => $sender_email))->row()->profile_image);
            $sender_member_id = $this->db->get_where('member', array('email' => $sender_email))->row()->member_profile_id;
            $sender_first_name = $this->db->get_where('member', array('email' => $sender_email))->row()->first_name;
            $sender_last_name = $this->db->get_where('member', array('email' => $sender_email))->row()->last_name;
            $sender_age = $this->db->get_where('member', array('member_id' => $senders_id))->row()->date_of_birth;
            $sender_height_code = $this->db->get_where('member', array('member_id' => $senders_id))->row()->height;
            $sender_height = $this->Crud_model->get_type_name_by_id('custom_decision', $sender_height_code);  
            $spiritual_and_social_background = json_decode($this->db->get_where('member', array('member_id' => $senders_id))->row()->spiritual_and_social_background);         
            $caste_code = '';
            foreach ($spiritual_and_social_background as $obj) {
                $caste_code = $obj->caste;
            }
            $sender_caste = $this->db->get_where('caste', array('caste_id'=>$caste_code))->row()->caste_name;
            $sender_present_address = json_decode($this->Crud_model->get_type_name_by_id('member', $senders_id, 'present_address'));
            $country_code = '';
            $state_code = '';
            $city_code = '';
            foreach ($sender_present_address as $loc_obj) {
                $state_code = $loc_obj->state;
                $country_code = $loc_obj->country;
                $city_code = $loc_obj->city;
            }
            $sender_education_and_career = json_decode($this->Crud_model->get_type_name_by_id('member',$senders_id, 'education_and_career'));
            // End of sender details //
            $edu_code = '';
            $occupation_code = ''; 
            foreach ($sender_education_and_career as $edu_obj) {
                $edu_code = $edu_obj->highest_education;
                $occupation_code = $edu_obj->occupation;
            }
        
            $profile_image = [] ;
            if ($sender_image) {
                $profile_image = ''. base_url() .'uploads/profile_image/'. $sender_image[0]->profile_image .'';
            } else {               
                $profile_image = ''.base_url() .'uploads/profile_image/default.jpg'.'';
            }
            // $mail->isHTML(true);
            $msg_body = "<table width='400' border='0' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; border:1px solid #999; padding:10px; '>
                    <tr>
                    <td colspan='2'>
                    <h4 style='margin:0 0 8px 0; padding:0;'>Dear ". $receiver_first_name ." ". $receiver_last_name ." (".$receiver_member_id.")</h4>
                    Your match ". $sender_first_name ." ". $sender_last_name ." is expressed intrest on your profile. Get a quicker response by accepting request now!
                    </td>
                    <tr>
                    <td colspan='2' height='5px'></td></tr>
                    </tr>
                    <tr>
                        <td valign='top'><img src=". $profile_image ." width='90' /></td>
                        <td valign='top' style='font-weight:normal;' ><h3 style='margin-bottom:2px; margin-top:2px;'>". $sender_first_name ." ". $sender_last_name ." (".$sender_member_id.")</h3>
                        <p style='line-height:22px;'>". (date('Y') - date('Y',$sender_age)) ." Yrs. ". $sender_height ." | ". $sender_caste .",
                    Location: ". $this->Crud_model->get_type_name_by_id('city', $city_code) .", ". $this->Crud_model->get_type_name_by_id('state', $state_code) .". ". $this->Crud_model->get_type_name_by_id('country', $country_code) ."
                    Education: ". $this->Crud_model->get_type_name_by_id('education', $edu_code) ." | Occupation : ". $this->Crud_model->get_type_name_by_id('occupation',$occupation_code) ."
                    </p>
                    
                        </td>
                    </tr>
                    <tr>
                    <td colspan='2'><button style='background:red; float:right; color:#fff; -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px; border:none; padding:5px ; margin-bottom:5px; margin-right:6%;' onclick='".base_url().'home/login'."'>Decline</button><button style='background:green; float:right; color:#fff; -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px; border:none; padding:5px ; margin-bottom:5px; margin-right:4%;' onclick='".base_url().'home/login'."'>Accept</button>
                    </td>
                    </tr>
                    <tr>
                    <td colspan='2' style='border-top:1px solid #7c786d; padding-top:5px;'>Team - ". $from_name ." Matrimony,<br />
                    For Happy Marriages
                    </td>
                    
                    </tr>
                    </table>";
            
                $send_mail = $this->do_accept_email($from, $from_name, $to, $sub, $msg_body);
                return $send_mail;
            } else {
                return false;
            }              
        }
        // End of  Express intrest mail send

        //send contact_us mail
        function contactUs_mail_send($from = '', $from_name ='', $subject = '',$msg = '')
        {
            $this->load->database();
            $to = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            $to_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $sub = $from.'('. $subject .')';
            $send_mail = $this->do_email($to, $to_name, $to, $sub, $msg);
            return $send_mail;
            
        }
        // end of contact_us mail

        function do_email($protocol='',$from = '', $from_name = '', $to = '', $sub = '', $msg = '',$cc = '') {
            
            // print_r($msg);exit;
            $this->load->library('email');
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype("html");
            // $this->email->set_charset("iso-8859-1");
            $this->email->from($from, $from_name);
            $this->email->to($to);
            $this->email->bcc($cc);
            $this->email->subject($sub);
            $this->email->message($msg);
           
            if ($this->email->send()) {
                return true;
            } else {
                //echo $this->email->print_debugger();
                return false;
            }
            // echo $this->email->print_debugger();
        }
        function do_accept_email($from = '', $from_name = '', $to = '', $sub = '', $msg = '') {
            // print_r($msg);
            $this->load->library('email');
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype("html");
            $this->email->from($from, $from_name);
            $this->email->to($to); 
            $this->email->subject($sub);
            $this->email->message($msg);           
            
            if ($this->email->send()) {
                return true;
            } else {
                //echo $this->email->print_debugger();
                return false;
            }
            //echo $this->email->print_debugger();
        }

    }
