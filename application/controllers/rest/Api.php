<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata"); 
    }
     
    function test_post(){
        $this->response([
            'status'=>true,
            'message'=> 'Data tested successfully .'
        ], REST_Controller::HTTP_OK);
    }


    // SignIn mod:dt:28/04/2021
    function checkLogin_post(){
        try{
            $username = $this->post('email');
            $password = sha1($this->post('password'));
            $result = $this->Crud_model->check_login('member', $username, $password);
            
	        $data = array();
	        if($result)
	        {
                // print_r($result);exit;
                if ($result->is_blocked == "no") {
                    if($result->is_otp_validated==0){
                        //-------------genetate OTP-----------------------------
                        $data1['member_otp'] = mt_rand(100000, 999999);
                        $data1['otp_member_id']=$result->member_id;
                        $data1['mobile_no']=$result->mobile;
                        $data1['profile_id']=$result->member_profile_id;
                        $this->session->set_userdata($data1);
                        $message="your OTP For Click Marry : ".$data1['member_otp'];
                        //echo($this->session->userdata('member_otp'));
                        $this->Sms_model->send_sms_via_sms7($message,$result->mobile);
                        //-----------------------------------------------------
                                       
                        $this->response([
                            'status'=>true,
                            'message'=> 'OTP sent successfully.',
                            'data'=>$data1
                        ], REST_Controller::HTTP_OK);

                    }else{
                        
                            $data['login_state'] = 'yes';
                            $data['member_id'] = $result->member_id;
                            $data['member_name'] = $result->first_name;
                            $data['member_email'] = $result->email;
                            $expaired= $this->Crud_model->check_package_expairy($result->member_id);
                            if($expaired=='Yes'){
                                $data['membership']=1;
                                // print "<script type=\"text/javascript\">alert('Your Package has expaired!');</script>";                              
                            }else{
                                $data['membership']=$result->membership;
                            }
                            
                            $this->Crud_model->update_last_login($result->member_id);
                            
                            $data['profile_percentage']=$this->Crud_model->get_profile_percentage($result->member_id);
                            // print_r($profile_percentage);exit;
                            $this->response([
                                'status'=>true,
                                'message'=> 'Success data.',
                                'data'=>$data
                            ], REST_Controller::HTTP_OK);
                        }
                }elseif ($result->is_blocked == "yes") {
                    $this->response([
                        'status'=>false,
                        'message'=> 'Your account is blocked.Contact to administrator !'
                    ], REST_Controller::HTTP_OK);
                }
            }else {
	            $this->response([
                    'status'=>false,
                    'message'=> 'Something went wrong.Try again !'
                ], REST_Controller::HTTP_OK);
	        }


        }catch (Exception $e) {
            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    // end of signIn 


    function package_get(){
        try{

            $data = $this->Api_model->getAllpackages();
            if($data){                    
                $this->response([
                    'status'=>true,
                    'message'=> 'Data Found successfully.',
                    'data'=>$data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>false,
                    'message'=> 'No Record Found !'
                ], REST_Controller::HTTP_OK);
            }

        }catch (Exception $e){

            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);

        } 
    }
    function happystory_get(){
        try{

            $data = $this->Api_model->getAllhappystories();
            if($data){                    
                $this->response([
                    'status'=>true,
                    'message'=> 'Data Found successfully.',
                    'data'=>$data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>false,
                    'message'=> 'No Record Found !'
                ], REST_Controller::HTTP_OK);
            }

        }catch (Exception $e){

            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);

        } 
    }
    function homePremiumMembers_get($id=""){
        try{

            $data = $this->Api_model->getHomeMembers($id);
            $profile = $this->Api_model->getProfilePercentage($id);
            if($data){                    
                $this->response([
                    'status'=>true,
                    'message'=> 'Data Found successfully.',
                    'profile'=>$profile,
                    'data'=>$data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>false,
                    'message'=> 'No Record Found !'
                ], REST_Controller::HTTP_OK);
            }

        }catch (Exception $e){

            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);

        } 
    }
    function onBehalf_get(){
        try{

            $data = $this->Api_model->getAllOnBehalf();
            if($data){                    
                $this->response([
                    'status'=>true,
                    'message'=> 'Data Found successfully.',
                    'data'=>$data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>false,
                    'message'=> 'No Record Found !'
                ], REST_Controller::HTTP_OK);
            }

        }catch (Exception $e){

            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);

        } 
    }
    function gender_get(){
        try{

            $data = $this->Api_model->getAllGender();
            if($data){                    
                $this->response([
                    'status'=>true,
                    'message'=> 'Data Found successfully.',
                    'data'=>$data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>false,
                    'message'=> 'No Record Found !'
                ], REST_Controller::HTTP_OK);
            }

        }catch (Exception $e){

            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);

        } 
    }
    function maritalStatus_get(){
        try{

            $data = $this->Api_model->getAllMaritalStatus();
            if($data){                    
                $this->response([
                    'status'=>true,
                    'message'=> 'Data Found successfully.',
                    'data'=>$data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>false,
                    'message'=> 'No Record Found !'
                ], REST_Controller::HTTP_OK);
            }

        }catch (Exception $e){

            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);

        } 
    }

    function registration_post(){

        try{

            $username = $this->post('email');
            $mobile = $this->post('mobile'); 
            if($username && $mobile){
                $result = $this->Api_model->check_mail_mobile('member', $username,$mobile);
                if(!$result){
                    // ------------------------------------Profile Image------------------------------------ //
                    $profile_image[] = array('profile_image'    =>  $this->post('gender') != 1 ? 'female.png' : 'male.png',
                                                'thumb'         =>  $this->post('gender') != 1 ? 'female_thumb.png' : 'male_thumb.png'
                                );
                    $profile_image = json_encode($profile_image);
                    // ------------------------------------Profile Image------------------------------------ //

                    // ------------------------------------Basic Info------------------------------------ //
                    $basic_info[] = array('age'                 => '',
                                        'marital_status'        => $this->post('marital_status'),
                                        'number_of_children'    => '',
                                        'area'                  => '',
                                        'on_behalf'             => $this->post('on_behalf')
                                        );
                    $basic_info = json_encode($basic_info);
                    // ------------------------------------Basic Info------------------------------------ //

                    // ------------------------------------Present Address------------------------------------ //
                    $present_address[] = array('country'        => '',
                                        'city'                  => '',
                                        'state'                 => '',
                                        'postal_code'           => ''
                                        );
                    $present_address = json_encode($present_address);
                    // ------------------------------------Present Address------------------------------------ //

                    // ------------------------------------Education & Career------------------------------------ //
                    $education_and_career[] = array('highest_education' => '',
                                        'education_details'             => '',
                                        'occupation'                    => '',
                                        'occupation_details'            => '',
                                        'employed_in'                   => '',                                           
                                        'annual_income'                 => ''
                                        );
                    $education_and_career = json_encode($education_and_career);
                    // ------------------------------------Education & Career------------------------------------ //

                    // ------------------------------------ Physical Attributes------------------------------------ //
                    $physical_attributes[] = array('weight'     => '',
                                        'eye_color'             => '',
                                        'hair_color'            => '',
                                        'complexion'            => '',
                                        'blood_group'           => '',
                                        'body_type'             => '',
                                        'body_art'              => '',
                                        'any_disability'        => ''
                                        );
                    $physical_attributes = json_encode($physical_attributes);
                    // ------------------------------------ Physical Attributes------------------------------------ //

                    // ------------------------------------ Language------------------------------------ //
                    $language[] = array('mother_tongue'         => '',
                                        'language'              => '',
                                        'speak'                 => '',
                                        'read'                  => ''
                                        );
                    $language = json_encode($language);
                    // ------------------------------------ Language------------------------------------ //

                    // ------------------------------------Hobbies & Interest------------------------------------ //
                    $hobbies_and_interest[] = array('hobby'     => '',
                                        'interest'              => '',
                                        'music'                 => '',
                                        'books'                 => '',
                                        'movie'                 => '',
                                        'tv_show'               => '',
                                        'sports_show'           => '',
                                        'fitness_activity'      => '',
                                        'cuisine'               => '',
                                        'dress_style'           => ''
                                        );
                    $hobbies_and_interest = json_encode($hobbies_and_interest);
                    // ------------------------------------Hobbies & Interest------------------------------------ //

                    // ------------------------------------ Personal Attitude & Behavior------------------------------------ //
                    $personal_attitude_and_behavior[] = array('affection'   => '',
                                        'humor'                 => '',
                                        'political_view'        => '',
                                        'religious_service'     => ''
                                        );
                    $personal_attitude_and_behavior = json_encode($personal_attitude_and_behavior);
                    // ------------------------------------ Personal Attitude & Behavior------------------------------------ //

                    // ------------------------------------Residency Information------------------------------------ //
                    $residency_information[] = array('birth_country'    => '',
                                        'residency_country'     => '',
                                        'citizenship_country'   => '',
                                        'grow_up_country'       => '',
                                        'immigration_status'    => ''
                                        );
                    $residency_information = json_encode($residency_information);
                    // ------------------------------------Residency Information------------------------------------ //

                    // ------------------------------------Spiritual and Social Background------------------------------------ //
                    $spiritual_and_social_background[] = array('religion'   => '',
                                        'caste'                 => '',
                                        'sub_caste'             => '',
                                        'ethnicity'             => '',
                                        'u_manglik'             => '',
                                        'personal_value'        => '',
                                        'family_value'          => '',
                                        'community_value'       => '',
                                        'family_status'         =>  ''
                                        );
                    $spiritual_and_social_background = json_encode($spiritual_and_social_background);
                    // ------------------------------------Spiritual and Social Background------------------------------------ //

                    // ------------------------------------ Life Style------------------------------------ //
                    $life_style[] = array('diet'                => '',
                                        'drink'                 => '',
                                        'smoke'                 => '',
                                        'living_with'           => ''
                                        );
                    $life_style = json_encode($life_style);
                    // ------------------------------------ Life Style------------------------------------ //

                    // ------------------------------------ Astronomic Information------------------------------------ //
                    $astronomic_information[] = array('sun_sign'    => '',
                                        'moon_sign'                 => '',
                                        'time_of_birth'             => '',
                                        'city_of_birth'             => ''
                                        );
                    $astronomic_information = json_encode($astronomic_information);
                    // ------------------------------------ Astronomic Information------------------------------------ //

                    // ------------------------------------Permanent Address------------------------------------ //
                    $permanent_address[] = array('permanent_country'    => '',
                                        'permanent_city'                => '',
                                        'permanent_state'               => '',
                                        'permanent_postal_code'         => ''
                                        );
                    $permanent_address = json_encode($permanent_address);
                    // ------------------------------------Permanent Address------------------------------------ //

                    // ------------------------------------Family Information------------------------------------ //
                    $family_info[] = array('father'             => '',
                                        'mother'                => '',
                                        'brother_sister'        => ''
                                        );
                    $family_info = json_encode($family_info);
                    // ------------------------------------Family Information------------------------------------ //

                    // --------------------------------- Additional Personal Details--------------------------------- //
                    $additional_personal_details[] = array('home_district'  => '',
                                        'family_residence'              => '',
                                        'fathers_occupation'            => '',
                                        'special_circumstances'         => ''
                                        );
                    $additional_personal_details = json_encode($additional_personal_details);
                    // --------------------------------- Additional Personal Details--------------------------------- //

                    // ------------------------------------ Partner Expectation------------------------------------ //
                    $partner_expectation[] = array('general_requirement'    => '',
                                        'partner_age_from'                  => '',
                                        'partner_age_to'                    => '',
                                        'partner_height_from'               => '',
                                        'partner_height_to'                 => '',
                                        'partner_weight'                    => '',
                                        'partner_marital_status'            => '',
                                        'with_children_acceptables'         => '',
                                        'partner_country_of_residence'      => '',
                                        'partner_religion'                  => '',
                                        'partner_caste'                     => '',
                                        'partner_sub_caste'                 => '',
                                        'partner_complexion'                => '',
                                        'partner_education'                 => '',
                                        'partner_profession'                => '',
                                        'partner_drinking_habits'           => '',
                                        'partner_smoking_habits'            => '',
                                        'partner_diet'                      => '',
                                        'partner_body_type'                 => '',
                                        'partner_personal_value'            => '',
                                        'manglik'                           => '',
                                        'partner_any_disability'            => '',
                                        'partner_mother_tongue'             => '',
                                        'partner_family_value'              => '',
                                        'prefered_country'                  => '',
                                        'prefered_state'                    => '',
                                        'prefered_status'                   => '',
                                        'prefered_status1'                   => ''
                                        );
                    $partner_expectation = json_encode($partner_expectation);
                    // ------------------------------------ Partner Expectation------------------------------------ //

                    // ------------------------------------Privacy Status------------------------------------ //
                    $privacy_status[] = array(
                                        'present_address'                 => 'yes',
                                        'education_and_career'            => 'yes',
                                        'physical_attributes'             => 'yes',
                                        'language'                        => 'yes',
                                        'hobbies_and_interest'            => 'yes',
                                        'personal_attitude_and_behavior'  => 'yes',
                                        'residency_information'           => 'yes',
                                        'spiritual_and_social_background' => 'yes',
                                        'life_style'                      => 'yes',
                                        'astronomic_information'          => 'yes',
                                        'permanent_address'               => 'yes',
                                        'family_info'                     => 'yes',
                                        'additional_personal_details'     => 'yes',
                                        'partner_expectation'             => 'yes'
                                        );
                    $privacy_status = json_encode($privacy_status);
                    // ------------------------------------Privacy Status------------------------------------ //

                    // ------------------------------------Pic Privacy Status------------------------------------ //
                    $pic_privacy[] = array(
                                        'profile_pic_show'        => 'all',
                                        'gallery_show'            => 'all'

                                        );
                    $data_pic_privacy = json_encode($pic_privacy);
                    // ------------------------------------Pic Privacy Status------------------------------------ //

                    // --------------------------------- Additional Personal Details--------------------------------- //
                    $package_info[] = array('current_package'   => $this->Crud_model->get_type_name_by_id('plan', '1'),
                                            'package_price'     => $this->Crud_model->get_type_name_by_id('plan', '1', 'amount'),
                                            'payment_type'      => 'None',
                                        );
                    $package_info = json_encode($package_info);
                    // --------------------------------- Additional Personal Details--------------------------------- //

                    $data['first_name'] = $this->post('first_name');
                    $data['last_name'] = $this->post('last_name');
                    $data['gender'] = $this->post('gender');
                    $data['email'] = $this->post('email');
                    $data['date_of_birth'] = strtotime($this->post('date_of_birth'));
                    $data['height'] = 0.00;
                    $data['mobile'] = $this->post('mobile');
                    $data['password'] = sha1($this->post('password'));
                    $data['profile_image'] = $profile_image;
                    $data['introduction'] = '';
                    $data['basic_info'] = $basic_info;
                    $data['present_address'] = $present_address;
                    $data['family_info'] = $family_info;
                    $data['education_and_career'] = $education_and_career;
                    $data['physical_attributes'] = $physical_attributes;
                    $data['language'] = $language;
                    $data['hobbies_and_interest'] = $hobbies_and_interest;
                    $data['personal_attitude_and_behavior'] = $personal_attitude_and_behavior;
                    $data['residency_information'] = $residency_information;
                    $data['spiritual_and_social_background'] = $spiritual_and_social_background;
                    $data['life_style'] = $life_style;
                    $data['astronomic_information'] = $astronomic_information;
                    $data['permanent_address'] = $permanent_address;
                    $data['additional_personal_details'] = $additional_personal_details;
                    $data['partner_expectation'] = $partner_expectation;
                    $data['view_contacts'] = '[]';
                    $data['interest'] = '[]';
                    $data['short_list'] = '[]';
                    $data['followed'] = '[]';
                    $data['ignored'] = '[]';
                    $data['ignored_by'] = '[]';
                    $data['gallery'] = '[]';
                    $data['happy_story'] = '[]';
                    $data['package_info'] = $package_info;
                    $data['payments_info'] = '[]';
                    $data['interested_by'] = '[]';
                    $data['follower'] = 0;
                    $data['notifications'] = '[]';
                    $data['membership'] = 1;
                    $data['is_closed'] = 'no';
                    $data['profile_status'] = 1;
                    $data['member_since'] = date("Y-m-d h:m:s");
                    $data['contacts'] = $this->db->get_where('plan', array('plan_id'=> 1))->row()->view_contacts;
                    $data['express_interest'] = $this->db->get_where('plan', array('plan_id'=> 1))->row()->express_interest;
                    $data['direct_messages'] = $this->db->get_where('plan', array('plan_id'=> 1))->row()->direct_messages;
                    $data['photo_gallery'] = $this->db->get_where('plan', array('plan_id'=> 1))->row()->photo_gallery;
                    $data['profile_completion'] = 0;
                    $data['is_blocked'] = 'no';
                    $data['privacy_status'] = $privacy_status;
                    $data['pic_privacy'] = $data_pic_privacy;

                    $this->db->insert('member', $data);
                    $insert_id = $this->db->insert_id();
                    $member_profile_id='CL'.sprintf("%'06d", $insert_id) ;   
                    $this->db->where('member_id', $insert_id);
                    $this->db->update('member', array('member_profile_id' => $member_profile_id));
                    recache();

                    $successData = array('id'=>$insert_id,'member_id'=>$member_profile_id);
                    // $msg = 'done';
                    if ($this->Email_model->account_opening('member', $data['email'], $this->input->post('password')) == false) {
                        //$msg = 'done_but_not_sent';
                        $this->response([
                            'status'=>true,
                            'message'=> 'Member created successfully but mail not send .',
                            'data'=>$successData
                        ], REST_Controller::HTTP_OK);  
                    } else {                  
                        $this->response([
                            'status'=>true,
                            'message'=> 'Member created successfully.',
                            'data'=>$successData
                        ], REST_Controller::HTTP_OK);   
                    }
                    
                }else{
                    $this->response([
                        'status'=>false,
                        'message'=> 'User already exists.Try again !'
                    ], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response([
                    'status'=>false,
                    'message'=> 'Invalid mail or mobile.Try again !'
                ], REST_Controller::HTTP_OK);
            }


        }catch(Exception $e){

            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);

        }        
    }

    function listing_get($type="",$id="",$page=""){
        try{

            $data = $this->Api_model->getListing($type,$id,5,$page);
            $profile = $this->Api_model->getProfilePercentage($id);
            if($data){                    
                $this->response([
                    'status'=>true,
                    'message'=> 'Data Found successfully.',
                    'profile'=>$profile,
                    'data'=>$data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status'=>false,
                    'message'=> 'No Record Found !'
                ], REST_Controller::HTTP_OK);
            }

        }catch (Exception $e){

            $this->response([
                'status'=>false,
                'message'=> $e->getMessage()
            ], REST_Controller::HTTP_NOT_FOUND);

        } 
    }
 

}

?>

