<link rel="stylesheet" href="<?=base_url()?>template/front/css/owl.carousel.min.css">

<style>    
.owl-prev,
.owl-next {
 position: absolute;
 top: 50%;
 transform: translateY(-50%);
}

.owl-prev {
 left: -2rem;
}

.owl-next {
 right: -2rem;
}

.owl-carousel .owl-nav button.owl-prev { font-size:55px !important; color: #E91E63 !important;}
.owl-carousel .owl-nav button.owl-next { font-size:55px !important; color: #E91E63 !important;}

.owl-carousel .owl-item img{
    border: 3px solid #E91E63 !important;
    border-radius: 50%;
    height:100px;
    width:100px;
}

.imgcarousel {
    padding: 0.8rem 0.8rem;
    border: 2px solid #E91E63 !important; 
    /* background-image: url('<?= base_url()?>uploads/png2.jpg'); */
    background: #D3D3D3 !important; 
    /* background: linear-gradient(to right, rgb(255, 175, 189), rgb(255, 195, 160)); */
    /* background: linear-gradient(to right, rgb(67, 198, 172), rgb(248, 255, 174)); */
}
.carouseltitle {
    color: white !important;
}
</style>

<section class="slice sct-color-2">
    <div class="profile">
        <div class="container">
            <div class="row cols-md-space cols-sm-space cols-xs-space">
                <!-- Alerts for Member actions -->
                <div class="col-lg-3 col-md-4" id="success_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
                    <div class="alert alert-success fade show" role="alert">
                        <!-- Success Alert Content -->
                        <!-- You have <b>Successfully</b> Edited your Profile! -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-4" id="danger_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
                    <div class="alert alert-danger fade show" role="alert">
                        <!-- Success Alert Content -->
                        <!-- You have <b>Successfully</b> Edited your Profile! -->
                    </div>
                </div>
                <!-- Alerts for Member actions -->
                <?php 
                    // Leading Json data
                    $basic_info = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'basic_info');
                    $basic_info_data = json_decode($basic_info, true);

                    $present_address = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'present_address');
                    $present_address_data = json_decode($present_address, true);

                    $education_and_career = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'education_and_career');
                    $education_and_career_data = json_decode($education_and_career, true);

                    $physical_attributes = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'physical_attributes');
                    $physical_attributes_data = json_decode($physical_attributes, true);

                    $language = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'language');
                    $language_data = json_decode($language, true);

                    $hobbies_and_interest = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'hobbies_and_interest');
                    $hobbies_and_interest_data = json_decode($hobbies_and_interest, true);

                    $personal_attitude_and_behavior = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'personal_attitude_and_behavior');
                    $personal_attitude_and_behavior_data = json_decode($personal_attitude_and_behavior, true);

                    $residency_information = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'residency_information');
                    $residency_information_data = json_decode($residency_information, true);

                    $spiritual_and_social_background = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'spiritual_and_social_background');
                    $spiritual_and_social_background_data = json_decode($spiritual_and_social_background, true);

                    $life_style = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'life_style');
                    $life_style_data = json_decode($life_style, true);

                    $astronomic_information = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'astronomic_information');
                    $astronomic_information_data = json_decode($astronomic_information, true);

                    $permanent_address = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'permanent_address');
                    $permanent_address_data = json_decode($permanent_address, true);

                    $family_info = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'family_info');
                    $family_info_data = json_decode($family_info, true);

                    $additional_personal_details = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'additional_personal_details');
                    $additional_personal_details_data = json_decode($additional_personal_details, true);

                    $partner_expectation = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'partner_expectation');
                    $partner_expectation_data = json_decode($partner_expectation, true);

                    $privacy_status = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'privacy_status');
                    $privacy_status_data = json_decode($privacy_status, true);
                ?>
               
                <div class="col-lg-4">
                    <?php include_once APPPATH.'views/front/dashboard/left_panel.php';?>
                </div>
                <div class="col-lg-8">
                	<div class="row">
                    <div class="col-lg-12">

                    <!-- <b class="c-base-1"><?php echo translate('matching_profiles')?></b>
                    <div class="clearfix"></div> -->

                    <?php if ($get_all_members) { ?>
                   
                    <div class="feature feature--boxed-border feature--bg-1 mb-4 z-depth-2-top imgcarousel" id="dashboard_matching_members">
                        <div class="block-title">
                            <h3 class="heading heading-6 strong-500 pull-left mb-2 pl-2 c-base-1">
                                <b><?php echo translate('matching_profiles')?></b>
                            </h3>
                        </div>
                        <div class="clearfix"></div>
                        <div class="block-content">
                            <div class="table-full-width">
                                <div class="table-full-width">                                   
                                    <?php include_once APPPATH.'views/front/dashboard/matching_members.php';?>
                                </div>
                            </div>
                        </div>
                           
                    </div>
                    <?php }?>

                    <!-- <b class="c-base-1"><?php echo translate('recent_view')?></b>
                    <div class="clearfix"></div> -->

                    <?php if ($recent_view_list) { ?>
                  
                    <div class="feature feature--boxed-border feature--bg-1 mb-4 z-depth-2-top imgcarousel" id="dashboard_recent_views">
                            <div class="block-title">
                                <h3 class="heading heading-6 strong-500 pull-left mb-2 pl-2 c-base-1">
                                    <b><?php echo translate('recent_view')?></b>
                                </h3>
                            </div>
                        <div class="clearfix"></div>
                        <div class="block-content">
                            <div class="table-full-width">
                                <div class="table-full-width">                                   
                                    <?php include_once APPPATH.'views/front/dashboard/recent_view.php';?>
                                </div>
                            </div>
                        </div>
                           
                    </div>
                    <?php } ?>
                    <!-- <b class="c-base-1"><?php echo translate('interest_on_me')?></b>
                    <div class="clearfix"></div> -->
                    
                    <?php if ($express_interest_members) { ?>
                   
                    <div class="feature feature--boxed-border feature--bg-1 mb-4 z-depth-2-top imgcarousel" id="dashboard_interest_no_me">
                            <div class="block-title">
                                <h3 class="heading heading-6 strong-500 pull-left mb-2 pl-2 c-base-1">
                                    <b><?php echo translate('interest_on_me')?></b>
                                </h3>
                            </div>
                        <div class="clearfix"></div>
                        <div class="block-content">
                            <div class="table-full-width">
                                <div class="table-full-width">                                   
                                    <?php include_once APPPATH.'views/front/dashboard/interest_on_me.php';?>
                                </div>
                            </div>
                        </div>
                           
                    </div>
                    <?php }?>
                   
                    <div class="widget">
                        <div class="card z-depth-2-top" id="profile_load">
                            <div class="card-title">
                                <h3 class="heading heading-6 strong-500 pull-left">
                                    <b>Matching Profiles</b>                                   
                                </h3>
                            </div>                            
                            <div class="card-body" style="padding: 1.5rem 0.5rem;">
                               <!-- body section to display data -->                               
                            </div>
                        </div>                        
                    </div>

                </div>                
            </div>           
        </div>
        
    </div>
   


</section>

<script src="<?=base_url()?>template/front/js/owl.carousel.min.js"></script>


<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
            items: 3,
            nav: true
            },
            600: {
            items: 3,
            nav: false
            },
            1000: {
            items: 5,
            nav: true,
            loop: false, 
            dots:false,
            margin: 20
            }
        }
        })
        $("#profile_load").css('visibility','hidden');
    })
</script>