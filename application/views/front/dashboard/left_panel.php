<style>.lg-outer #lg-download {display: none!important;}</style>
<div class="sidebar sidebar-inverse sidebar--style-1 bg-base-1 z-depth-2-top light-gallery">
    <div class="sidebar-object mb-0">
        <!-- Profile picture -->
        <div class="profile-picture profile-picture--style-2">
            <div>
            <?php
                $profile_image = $get_member[0]->profile_image;
                $images = json_decode($profile_image, true);
                if (file_exists('uploads/profile_image/'.$images[0]['thumb'])) {
                    $pic_privacy = $get_member[0]->pic_privacy;
                    $pic_privacy_data = json_decode($pic_privacy, true);
                    $is_premium = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'membership');
                    if($pic_privacy_data[0]['profile_pic_show']=='only_me'){
                ?>
                 <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/default.jpg)"></div>
                    </div>
                <?php }elseif ($pic_privacy_data[0]['profile_pic_show']=='premium' and $is_premium==2) {
                ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                    <a target="_blank" href="<?=base_url()?>uploads/profile_image/<?=$images[0]['profile_image']?>" class="item">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>)"></div>
                        <img src="<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>" class="img-fluid rounded" style="height: 68px; display:none;">
                    </a>    
                    </div>
                <?php }elseif ($pic_privacy_data[0]['profile_pic_show']=='premium' and $is_premium==1) {
                ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/default.jpg)"></div>
                    </div>
                <?php }elseif ($pic_privacy_data[0]['profile_pic_show']=='all') {
                ?>
                <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                <a target="_blank" href="<?=base_url()?>uploads/profile_image/<?=$images[0]['profile_image']?>" class="item">
                    <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>)"></div>
                     <img src="<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>" class="img-fluid rounded" style="height: 68px; display:none;">
                </a>    
                </div>
                <?php }else{
                    ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/default.jpg)"></div>
                    </div>
                    <?php }
                } else {
                ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/default_image.png)"></div>
                    </div>
                <?php
                }
            ?>
            </div>
        </div>
        <!-- galery -->
                <!-- Profile connected accounts -->
        <div class="profile-useful-links clearfix mb-5">
            <?php
                $get_gallery = $this->db->get_where("member", array("member_id" => $get_member[0]->member_id))->row()->gallery;
                $gallery_data = json_decode($get_gallery, true);
                if (!empty($gallery_data)) {
                    $is_premium = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'membership');
             $pic_privacy = $get_member[0]->pic_privacy;
                    $pic_privacy_data = json_decode($pic_privacy, true);
                    $is_premium = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'membership');
                    if($pic_privacy_data[0]['gallery_show']=='only_me'){
                ?>
                 <div class="container">
                    <!-- <div class="profile-details">
                        <h3 class="heading heading-6 strong-400 profile-occupation mt-3"><?=translate('gallery')?></h3>
                    </div> -->
                    <div class="row ml-auto mr-auto">
                        <p class="pt-2 ml-auto mr-auto">
                            <span style="font-weight: 300;font-size: 0.75rem;color: #ffffffcc;">
                                <?=translate('you_are_not_allowed_to_view_the_gallery!')?>
                            </span>
                        </p>
                    </div>
                </div>
                <?php }elseif ($pic_privacy_data[0]['gallery_show']=='premium' and $is_premium==2) {
                ?>
                    <div class="container">
                        <!-- <div class="profile-details">
                            <h3 class="heading heading-6 strong-400 profile-occupation mt-3"><?=translate('gallery')?></h3>
                        </div> -->
                        <div class="row">
                            <div class="col-12">
                                <div >
                                    <div class="row">
                                        <?php
                                            foreach ($gallery_data as $value) {
                                                if (file_exists('uploads/gallery_image/'.$value['image'])) {
                                                ?>
                                                    <div class="col-sm-4 mt-4">
                                                        <a target="_blank" href="<?=base_url()?>uploads/gallery_image/<?=$value['image']?>" class="item">
                                                            <img src="<?=base_url()?>uploads/gallery_image/<?=$value['image']?>" class="img-fluid rounded" style="height: 68px;">
                                                        </a>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="col-sm-4 mt-4">
                                                        <a target="_blank" href="<?=base_url()?>uploads/gallery_image/default_image.png" class="item">
                                                            <img src="<?=base_url()?>uploads/gallery_image/default_image.png" class="img-fluid rounded" style="height: 68px;">
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }elseif ($pic_privacy_data[0]['gallery_show']=='premium' and $is_premium==1) {
                ?>
                    <div class="container">
                            <!-- <div class="profile-details">
                                <h3 class="heading heading-6 strong-400 profile-occupation mt-3"><?=translate('gallery')?></h3>
                            </div> -->
                            <div class="row ml-auto mr-auto">
                                <p class="pt-2 ml-auto mr-auto">
                                    <span style="font-weight: 300;font-size: 0.75rem;color: #ffffffcc;">
                                        <?=translate('you_are_not_allowed_to_view_the_gallery!')?>
                                    </span>
                                </p>
                            </div>
                        </div>
                <?php }elseif ($pic_privacy_data[0]['gallery_show']=='all') {
                ?>
                        <div class="container">
                            <!-- <div class="profile-details">
                                <h3 class="heading heading-6 strong-400 profile-occupation mt-3"><?=translate('gallery')?></h3>
                            </div> -->
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="row">
                                            <?php
                                                foreach ($gallery_data as $value) {
                                                    if (file_exists('uploads/gallery_image/'.$value['image'])) {
                                                    ?>
                                                        <div class="col-sm-4 mt-4">
                                                            <a target="_blank" href="<?=base_url()?>uploads/gallery_image/<?=$value['image']?>" class="item">
                                                                <img src="<?=base_url()?>uploads/gallery_image/<?=$value['image']?>" class="img-fluid rounded" style="height: 68px;">
                                                            </a>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="col-sm-4 mt-4">
                                                            <a target="_blank" href="<?=base_url()?>uploads/gallery_image/default_image.png" class="item">
                                                                <img src="<?=base_url()?>uploads/gallery_image/default_image.png" class="img-fluid rounded" style="height: 68px;">
                                                            </a>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
            ?>
        </div>
        <!--gllery -->
        <!-- Profile details -->
        <div class="profile-details">
            <h2 class="heading heading-3 strong-500 profile-name"><?=$get_member[0]->first_name." ".$get_member[0]->last_name?></h2>
            <h3 class="heading heading-6 strong-400 profile-occupation mt-3">
                <?=$this->Crud_model->get_type_name_by_id('occupation', $education_and_career_data[0]['occupation'])?>            
            </h3>
          
        </div>
        <!-- Profile connect -->
        <div class="profile-connect mt-2">
            <div class="row">

                <div class="col-sm-12 size-sm mb-2">
                    <a class="btn btn-styled btn-block btn-md btn-white z-depth-2-bottom" id="my_profile_<?=$get_member[0]->member_id?>" href="<?= base_url();?>home/profile" target="_blank">
                        <span id="interest_text">
                            <i class="fa fa-user"></i> <?= translate('edit_profile');?>
                        </span>
                    </a>
                </div>

                <div class="col-sm-12 size-sm mb-2">
                    <a class="btn btn-styled btn-block btn-md btn-white z-depth-2-bottom" id="my_interest_<?=$get_member[0]->member_id?>" onclick="profile_load('my_interests')">
                        <span id="interest_text">
                            <i class="fa fa-heart"></i> <?= translate('my_interests');?>
                        </span>
                    </a>
                </div>

                <div class="col-sm-12 size-sm mb-2">
                    <a class="btn btn-styled btn-block btn-md btn-white z-depth-2-bottom" id="interests_on_me_<?=$get_member[0]->member_id?>" onclick="profile_load('interests_on_me')">
                        <span id="interest_text">
                            <i class="fa fa-heart"></i> <?= translate('interests_on_me');?>
                        </span>
                    </a>
                </div>

                <div class="col-sm-12 size-sm mb-2">
                    <a class="btn btn-styled btn-block btn-md btn-white z-depth-2-bottom" id="contact_list_<?=$get_member[0]->member_id?>" onclick="profile_load('contact_list')">
                        <span id="interest_text">
                            <i class="fa fa-list-ul"></i> <?= translate('viewed');?>
                        </span>
                    </a>
                </div>

                <div class="col-sm-12 size-sm mb-2">
                    <a class="btn btn-styled btn-block btn-md btn-white z-depth-2-bottom" id="short_list_<?=$get_member[0]->member_id?>" onclick="profile_load('short_list')">
                        <span id="interest_text">
                            <i class="fa fa-list-ul"></i> <?= translate('short_list');?>
                        </span>
                    </a>
                </div>
                <div class="col-sm-12 size-sm mb-2">
                    <a class="btn btn-styled btn-block btn-md btn-white z-depth-2-bottom" id="followed_users_<?=$get_member[0]->member_id?>" onclick="profile_load('followed_users')">
                        <span id="interest_text">
                            <i class="fa fa-star"></i> <?= translate('super_like');?>
                        </span>
                    </a>
                </div>

                <div class="col-sm-12 size-sm mb-2">
                    <a class="btn btn-styled btn-block btn-md btn-white z-depth-2-bottom" id="messaging_<?=$get_member[0]->member_id?>" onclick="profile_load('messaging')">
                        <span id="interest_text">
                            <i class="fa fa-comments-o"></i> <?= translate('messaging');?>
                        </span>
                    </a>
                </div>

                <div class="col-sm-12 size-sm mb-2">
                    <a class="btn btn-styled btn-block btn-md btn-white z-depth-2-bottom" id="ignored_list_<?=$get_member[0]->member_id?>" onclick="profile_load('ignored_list')">
                        <span id="interest_text">
                            <i class="fa fa-ban"></i> <?= translate('ignored_list');?>
                        </span>
                    </a>
                </div>

            </div>
        </div>
        
        <div class="profile-stats clearfix mt-2">
            <div class="stats-entry" style="width: 100%">
                <span class="stats-count" id="follower"><?=$get_member[0]->follower?></span>
                <span class="stats-label text-uppercase"><?php echo translate('super_like');?></span>
            </div>
        </div>
        <!-- Profile stats -->
        <div class="profile-stats clearfix mt-2">
            <div class="stats-entry">
                <span class="stats-label text-uppercase text-left pl-2"><?php echo translate('age');?></span>
                <span class="stats-label text-uppercase text-left pl-2"><?php echo translate('mother_tongue');?></span>
                <span class="stats-label text-uppercase text-left pl-2"><?php echo translate('religion');?></span>
                <span class="stats-label text-uppercase text-left pl-2"><?php echo translate('caste');?></span>
                <span class="stats-label text-uppercase text-left pl-2"><?php echo translate('height');?></span>
                <span class="stats-label text-uppercase text-left pl-2"><?php echo translate('location');?></span>
            </div>

            <div class="stats-entry">
                <span class="stats-label text-uppercase text-left pl-2"> <?=$calculated_age = (date('Y') - date('Y', $get_member[0]->date_of_birth));?>&nbsp</span>
                <span class="stats-label text-uppercase text-left pl-2"><?=$this->Crud_model->get_type_name_by_id('language', $language_data[0]['mother_tongue']);?>&nbsp</span>
                <span class="stats-label text-uppercase text-left pl-2"><?=$this->Crud_model->get_type_name_by_id('religion', $spiritual_and_social_background_data[0]['religion']);?>&nbsp</span>
                <span class="stats-label text-uppercase text-left pl-2">
                <?php
                if (!empty($spiritual_and_social_background_data[0]['caste'])){
                   $cast=$this->db->get_where('caste', array('caste_id'=>$spiritual_and_social_background_data[0]['caste']))->row()->caste_name;
                   echo($cast);
                }
                ?>&nbsp</span>
                <span class="stats-label text-uppercase text-left pl-2"><?=$this->Crud_model->get_type_name_by_id('custom_decision', $get_member[0]->height)?>&nbsp</span>
                <span class="stats-label text-uppercase text-left pl-2"><?php if($present_address_data[0]['country']){echo $this->Crud_model->get_type_name_by_id('state', $present_address_data[0]['state']).', '.$this->Crud_model->get_type_name_by_id('city', $present_address_data[0]['city']);}?>&nbsp</span>
            </div>
        </div>
        
    </div>
</div>

<script>
    var isloggedin = "<?=$this->session->userdata('member_id')?>";
    var profile_percentage="<?=$this->Crud_model->get_profile_percentage($this->session->userdata['member_id'])?>";

    var rem_interests = parseInt("<?=$this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'express_interest')?>");
    var rem_messages = parseInt("<?=$this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'direct_messages')?>");
    var rem_contacts = parseInt("<?=$this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'contacts')?>");
    //alert(rem_contacts);
    function confirm_contact(id) {
        // alert(id);
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in')?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_view_contact_details_of_this_member')?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?=translate('close')?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in')?></a>");
        }
        else {
            if (rem_contacts <= 0) {
                $("#active_modal").modal("toggle");
                $("#modal_header").html("<?php echo translate('buy_premium_packages')?>");
                $("#modal_body").html("<p class='text-center'><b>Remaining Contact View(s): "+rem_contacts+" times</b><br><?php echo translate('please_buy_packages_from_the_premium_plans.')?></p>");
                $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?=translate('close')?></button> <a href='<?=base_url()?>home/plans' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('premium_plans')?></a>");
            }
            else {
                $("#active_modal").modal("toggle");
                $("#modal_header").html("<?php echo translate('confirm_view_contact')?>");
                $("#modal_body").html("<p class='text-center'><b><?php echo translate('remaining_contact_view(s): ')?>"+rem_contacts+" <?php echo translate('times')?></b><br><span style='color:#DC0330;font-size:11px'>**N.B. <?php echo translate('view_contact_will_cost_1_from_your_remaining_contacts')?>**</span></p>");
                $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?=translate('close')?></button> <a href='#' id='confirm_contact' class='btn btn-sm btn-base-1 btn-shadow' onclick='return do_view_contact("+id+")' style='width:25%'><?php echo translate('confirm')?></a>");
            }
        }
        return false;
    }
    
    function do_view_contact(id) {
        // alert(id);
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in')?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_view_contact_details_of_this_member')?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close')?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in')?></a>");
        }
        else {
            //$("#confirm_interest").removeAttr("onclick");
            
            $("#contact_a_"+id).attr("onclick","view_contact("+id+")");   
             $("#contact_a_"+id).addClass("li_active");
               
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/add_view_contact/"+id,
                    dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    //alert(data);
                    //rem_contacts = rem_contacts - 1;
                    //$("#active_modal").modal("toggle");
                    $("#modal_header").html("<?php echo translate('Contact_Details')?>");
                    $("#modal_body").html(data);
                    $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close')?></button>");
                    
                },
                error: function(e) {
                    console.log(e)
                }
                });           
        }       
    }

    function view_contact(id) {
        // alert(id);
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in')?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_view_contact_details_of_this_member')?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close')?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in')?></a>");
        }
        else {
                     
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/view_contact/"+id,
                    dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    //alert(data);
                    $("#active_modal").modal("toggle");
                    $("#modal_header").html("<?php echo translate('Contact_Details')?>");
                    $("#modal_body").html(data);
                    $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close')?></button>");
                    
                },
                error: function(e) {
                    console.log(e)
                }
                });           
        }       
    }


    function confirm_interest(id) {
        // alert(id);
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in');?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_express_your_interest_on_this_member');?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in');?></a>");
        }
        else {
            if(profile_percentage < 80){
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('Your_Profile_Score: ')?>"+profile_percentage+" %");
            $("#modal_body").html("<p class='text-center'>You need more than 80% for express interest.</p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?=translate('close')?></button>");
            }
            else if (rem_interests <= 0) {
                $("#active_modal").modal("toggle");
                $("#modal_header").html("<?php echo translate('buy_premium_packages');?>");
                $("#modal_body").html("<p class='text-center'><b><?php echo translate('remaining_express_interest(s): ');?>"+rem_interests+" <?php echo translate('times');?></b><br><?php echo translate('please_buy_packages_from_the_premium_plans.');?></p>");
                $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/plans' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('premium_plans');?></a>");
            }
            else {
                $("#active_modal").modal("toggle");
                $("#modal_header").html("<?php echo translate('confirm_express_interest');?>");
                $("#modal_body").html("<p class='text-center'><b><?php echo translate('remaining_express_interest(s):');?> "+rem_interests+" <?php echo translate('times');?></b><br><span style='color:#DC0330;font-size:11px'>**N.B. <?php echo translate('expressing_an_interest_will_cost_1_from_your_remaining_interests');?>**</span></p>");
                $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='#' id='confirm_interest' class='btn btn-sm btn-base-1 btn-shadow' onclick='return do_interest("+id+")' style='width:25%'><?php echo translate('confirm');?></a>");
            }
        }
        return false;
    }

    function do_interest(id) {
        // alert(id);
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in');?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_ignore_this_member');?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in');?></a>");
        }
        else {
            $("#interest_a_"+id).addClass("li_active");
            $("#confirm_interest").removeAttr("onclick");
            $("#confirm_interest").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('processing');?>..");
            $("#interest_a_"+id).removeAttr("onclick");
            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/add_interest/"+id,
                    cache: false,
                    success: function(response) {
                        $("#active_modal .close").click();
                        $("#interest_text").html("<i class='fa fa-heart'></i> <?php echo translate('interest_expressed');?>");
                        $("#interest_a_"+id).css("cssText", "");
                        $("#success_alert").show();
                        $(".alert-success").html("<?php echo translate('you_have_expressed_an_interest_on_this_member!');?>");
                        $('#danger_alert').fadeOut('fast');
                        setTimeout(function() {
                            $('#success_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    },
                    fail: function (error) {
                        alert(error);
                    }
                });
            }, 500); // <-- time in milliseconds
        }
        return false;
    }

    function confirm_message(id) {
        // alert(id);
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in');?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_enable_messaging');?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in');?></a>");
        }
        else {
            if (rem_messages <= 0) {
                $("#active_modal").modal("toggle");
                $("#modal_header").html("<?php echo translate('buy_premium_packages');?>");
                $("#modal_body").html("<p class='text-center'><b><?php echo translate('remaining_direct_message(s):');?>"+rem_messages+" <?php echo translate('times');?></b><br><?php echo translate('please_buy_packages_from_the_premium_plans');?></p>");
                $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/plans' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('premium_plans');?></a>");
            }
            else {
                $("#active_modal").modal("toggle");
                $("#modal_header").html("<?php echo translate('confirm_enable_messaging');?>");
                $("#modal_body").html("<p class='text-center'><b><?php echo translate('remaining_direct_message(s):');?>"+rem_messages+" <?php echo translate('times');?></b><br><span style='color:#DC0330;font-size:11px'>**N.B. <?php echo translate('enable_messaging_will_cost_1_from_your_remaining_direct_messages');?>**</span></p>");
                $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='#' id='confirm_message' class='btn btn-sm btn-base-1 btn-shadow' onclick='return enable_message("+id+")' style='width:25%'><?php echo translate('confirm');?></a>");
            }
        }
        return false;
    }

    function enable_message(id) {
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in');?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_enable_messaging');?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in');?></a>");
        }
        else {
            $("#message_a_"+id).addClass("li_active");
            $("#confirm_message").removeAttr("onclick");
            $("#confirm_message").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('processing');?>..");
            $("#message_a_"+id).removeAttr("onclick");
            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/enable_message/"+id,
                    cache: false,
                    success: function(response) {
                        $("#active_modal .close").click();
                        $("#message_text").html("<i class='fa fa-comments-o'></i><?php echo translate('message_enabled');?>");
                        $("#message_a_"+id).css("cssText", "");
                        $("#success_alert").show();
                        $(".alert-success").html("<?php echo translate('you_have_enable_messaging_with_this_member!');?>");
                        $('#danger_alert').fadeOut('fast');
                        setTimeout(function() {
                            $('#success_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    },
                    fail: function (error) {
                        alert(error);
                    }
                });
            }, 500); // <-- time in milliseconds
        }
        return false;
    }

    function do_shortlist(id) {
        // alert(id);
        if (isloggedin == "") {
            // $('#myModal').modal();
            alert("Please Log in");
        }
        else {
            $("#shortlist_a_"+id).addClass("li_active");
            $("#shortlist_a_"+id).removeAttr("onclick");
            $("#shortlist_text").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('shortlisting');?>..");
            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/add_shortlist/"+id,
                    cache: false,
                    success: function(response) {
                        $("#shortlist_text").html("<i class='fa fa-list-ul'></i> <?php echo translate('shortlisted');?>");
                        $("#shortlist_a_"+id).attr("onclick","return remove_shortlist("+id+")");
                        $("#shortlist_a_"+id).css("cssText", "");
                        $("#success_alert").show();
                        $(".alert-success").html("<?php echo translate('you_have_shortlisted_this_member!');?>");
                        $('#danger_alert').fadeOut('fast');
                        setTimeout(function() {
                            $('#success_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    },
                    fail: function (error) {
                        alert(error);
                    }
                });
            }, 500); // <-- time in milliseconds
        }
        return false;
    }

    function remove_shortlist(id) {
        // alert(id);
        if (isloggedin == "") {
            // $('#myModal').modal();
            alert("Please Log in");
        }
        else {
            $("#shortlist_a_"+id).removeAttr("onclick");
            $("#shortlist_text").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('removing');?>..");
            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/remove_shortlist/"+id,
                    cache: false,
                    success: function(response) {
                        $("#shortlist_text").html("<i class='fa fa-list-ul'></i> <?php echo translate('shortlist');?>");
                        $("#shortlist_a_"+id).attr("onclick","return do_shortlist("+id+")");
                        $("#shortlist_a_"+id).css("cssText", "");
                        $("#shortlist_a_"+id).removeClass("li_active");
                        $("#danger_alert").show();
                        $(".alert-danger").html("<?php echo translate('you_have_removed_this_member_from_shortlist!');?>");
                        $('#success_alert').fadeOut('fast');
                        setTimeout(function() {
                            $('#danger_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    },
                    fail: function (error) {
                        alert(error);
                    }
                });
            }, 500); // <-- time in milliseconds
        }
        return false;
    }

    var follower = parseInt("<?=$this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'follower')?>");
    function do_follow(id) {
        // alert(id);

        if (isloggedin == "") {
            // $('#myModal').modal();
            alert("Please Log in");
        }
        else {
            $("#followed_a_"+id).addClass("li_active");
            $("#followed_a_"+id).removeAttr("onclick");
            $("#followed_text").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('following');?>..");
            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/add_follow/"+id,
                    cache: false,
                    success: function(response) {
                        $("#followed_text").html("<i class='fa fa-star'></i> <?php echo translate('unfollow');?>");
                        $("#followed_a_"+id).attr("onclick","return do_unfollow("+id+")");
                        $("#followed_a_"+id).css("cssText", "");
                        $("#success_alert").show();
                        $(".alert-success").html("<?php echo translate('you_have_followed_this_member!');?>");
                        $('#danger_alert').fadeOut('fast');
                        setTimeout(function() {
                            $('#success_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                    },
                    fail: function (error) {
                        alert(error);
                    }
                });
            }, 500); // <-- time in milliseconds
        }
        return false;
    }

    function do_unfollow(id) {
        // alert(id);
        if (isloggedin == "") {
            // $('#myModal').modal();
            alert("Please Log in");
        }
        else {
            $("#followed_a_"+id).removeAttr("onclick");
            $("#followed_text").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('unfollowing');?>..");
            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/add_unfollow/"+id,
                    cache: false,
                    success: function(response) {
                        $("#followed_text").html("<i class='fa fa-star'></i> <?php echo translate('follow');?>");
                        $("#followed_a_"+id).attr("onclick","return do_follow("+id+")");
                        $("#followed_a_"+id).css("cssText", "");
                        $("#followed_a_"+id).removeClass("li_active");
                        $("#danger_alert").show();
                        $(".alert-danger").html("<?php echo translate('you_have_unfollowed_this_member!');?>");
                        $('#success_alert').fadeOut('fast');
                        setTimeout(function() {
                            $('#danger_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                        follower = follower - 1;
                        $('#follower').html(follower);
                    },
                    fail: function (error) {
                        alert(error);
                    }
                });
            }, 500); // <-- time in milliseconds
        }
        return false;
    }

    function confirm_ignore(id) {
        // alert(id);
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in');?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_ignore_this_member');?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in');?></a>");
        }
        else {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('confirm_ignore');?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('are_you_sure_that_you_want_to_ignore_this_member?');?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='#' id='confirm_ignore' class='btn btn-sm btn-base-1 btn-shadow' onclick='return do_ignore("+id+")' style='width:25%'><?php echo translate('confirm');?></a>");
        }
        return false;
    }

    function do_ignore(id) {
        // alert(id);
        if (isloggedin == "") {
            $("#active_modal").modal("toggle");
            $("#modal_header").html("<?php echo translate('please_log_in');?>");
            $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_ignore_this_member');?></p>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in');?></a>");
        }
        else {
            $("#confirm_ignore").removeAttr("onclick");
            $("#confirm_ignore").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('processing');?>..");
            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/add_ignore/"+id,
                    cache: false,
                    success: function(response) {
                        $("#danger_alert").show();
                        $(".alert-danger").html("<?php echo translate('you_have_ignored_this_member!');?>");
                        $('#success_alert').fadeOut('fast');
                        setTimeout(function() {
                            $('#danger_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                        setTimeout(function() {
                            window.location.href = "<?=base_url()?>home/listing";
                        }, 2000); // <-- time in milliseconds
                    },
                    fail: function (error) {
                        alert(error);
                    }
                });
            }, 500); // <-- time in milliseconds
        }
        return false;
    }

    function do_report(id) {
        // alert(id);

        if (isloggedin == "") {
            // $('#myModal').modal();
            alert("Please Log in");
        }
        else {
            $("#report_a_"+id).addClass("li_active");
            $("#report_a_"+id).removeAttr("onclick");
            $("#report_text").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('reporting');?>..");
            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>home/add_report/"+id,
                    cache: false,
                    success: function(response) {
                        $("#report_text").html("<i class='fa fa-odnoklassniki'></i> <?php echo translate('reported');?>");
                        $("#report_a_"+id).css("cssText", "");
                        $("#success_alert").show();
                        $(".alert-success").html("<?php echo translate('you_have_reported_this_member!');?>");
                        $('#danger_alert').fadeOut('fast');
                        setTimeout(function() {
                            $('#success_alert').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                        follower = follower + 1;
                        $('#follower').html(follower);
                    },
                    fail: function (error) {
                        alert(error);
                    }
                });
            }, 500); // <-- time in milliseconds
        }
        return false;
    }
    function is_reported(id) {

        $("#active_modal").modal("toggle");
        $("#modal_header").html("<?php echo translate('report_profile')?>");
        $("#modal_body").html("<p class='text-center'><span style='color:#DC0330;font-size:11px'>** <?php echo translate('you_already_reported_this_persion')?> **</span></p>");

        return false;
    }
    function not_a_paid_member(id) {
        $("#active_modal").modal("toggle");
        $("#modal_header").html("<?php echo translate('super_like')?>");
        $("#modal_body").html("<p class='text-center'><span style='color:#DC0330;font-size:11px'>** <?php echo translate('to_like_this_profile_you_should_be_a_paid_member')?> **</span></p>");
        return false;
    }

    // for dashboard mod:dt:11/07/2020 //
    function profile_load(page,sp){
        // alert('here');
        if (typeof message_interval !== 'undefined') {
            clearInterval(message_interval);
        }
        if(page !== ''){
            $.ajax({
                url: "<?=base_url()?>home/profile/"+page,
                success: function(response) {
                    $("#profile_load").html(response);
                    if(page == 'messaging'){
                        $('body').find('#thread_'+sp).click();
                    }
                    // window.scrollTo(0, 0);
                    if (sp != 'no') {
                        $(".btn-back-to-top").click();
                    }
                    $("#profile_load").css('visibility','visible');
                    $('#dashboard_matching_members,#dashboard_interest_no_me,#dashboard_recent_views').hide();
                }
            });
            $('.p_nav').removeClass("active");
            $('.l_nav').removeClass("li_active");
            $('.m_nav').removeClass("m_nav_active");

            if (page!='gallery'||page!='happy_story'||page!='my_packages'||page!='payments' ||page=='change_pass'||page=='picture_privacy') {
                $('.'+page).addClass("active");
                $('.m_'+page).addClass("m_nav_active");
            } 
            if (page=='gallery'||page=='happy_story'||page=='my_packages'||page=='payments' ||page=='change_pass'||page=='picture_privacy') {
                $('.'+page).addClass("li_active");
            }
            
        }
    }

// end of dashboard //

</script>
<style>
    /* xs */
    .size-sm {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .size-smtr {
        padding-left: 0px !important;
        padding-right: 0px !important;
        padding-top: .50rem!important;
    }
    .size-smtl {
        padding-left: 0px !important;
        padding-right: 0px !important;
        padding-top: .50rem!important;
    }
    .size-smr {
        padding-left: 0px !important;
        padding-right: 0px !important;
        padding-top: 0px !important;
    }
    .size-sml {
            padding-left: 0px !important;
            padding-right: 0px !important;
            padding-top: .50rem!important;
        }
    /* sm */
    @media (min-width: 768px) {
        .size-sm {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        .size-smtr {
            padding-left: 0px !important;
            padding-right: .25rem!important;
            padding-top: .50rem!important;
        }
        .size-smtl {
            padding-left: .25rem!important;
            padding-right: 0px !important;
            padding-top: .50rem!important;
        }
        .size-smr {
            padding-left: 0px !important;
            padding-right: .25rem!important;
            padding-top: 0px !important;
        }
        .size-sml {
            padding-left: .25rem!important;
            padding-right: 0px !important;
            padding-top: 0px !important;
        }
    }
    /* md */
    @media (min-width: 992px) {
        .size-sm {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        .size-smtr {
            padding-left: 0px !important;
            padding-right: .25rem!important;
            padding-top: .50rem!important;
        }
        .size-smtl {
            padding-left: .25rem!important;
            padding-right: 0px !important;
            padding-top: .50rem!important;
        }
        .size-smr {
            padding-left: 0px !important;
            padding-right: .25rem!important;
            padding-top: 0px !important;
        }
        .size-sml {
            padding-left: .25rem!important;
            padding-right: 0px !important;
            padding-top: 0px !important;
        }
    }
    /* lg */
    @media (min-width: 1200px) {
        .size-sm {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        .size-smtr {
            padding-left: 0px !important;
            padding-right: .25rem!important;
            padding-top: .50rem!important;
        }
        .size-smtl {
            padding-left: .25rem!important;
            padding-right: 0px !important;
            padding-top: .50rem!important;
        }
        .size-smr {
            padding-left: 0px !important;
            padding-right: .25rem!important;
            padding-top: 0px !important;
        }
        .size-sml {
            padding-left: .25rem!important;
            padding-right: 0px !important;
            padding-top: 0px !important;
        }
    }
</style>
