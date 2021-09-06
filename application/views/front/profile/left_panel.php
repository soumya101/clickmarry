<div class="sidebar sidebar-inverse sidebar--style-1 bg-base-1 z-depth-2-top">
    <?php if($this->db->get_where("member", array("member_id" => $this->session->userdata('member_id')))->row()->is_closed == 'yes'){?>
        <a class="badge-corner badge-corner-red" style="right: 15px;border-top: 90px solid  #DC0330;border-left: 90px solid transparent;">
            <span style="-ms-transform: rotate(45deg);/* IE 9 */-webkit-transform: rotate(45deg);/* Chrome, Safari, Opera */transform: rotate(45deg);font-size: 14px;margin-left: -24px;margin-top: -16px;"><?=translate('closed')?></span>
        </a>
    <?php }?>
    <div class="sidebar-object mb-0">
        <!-- Profile picture -->
        <div class="profile-picture profile-picture--style-2">
            <?php
                $profile_image = $get_member[0]->profile_image;
                $images = json_decode($profile_image, true);
                if (file_exists('uploads/profile_image/'.$images[0]['thumb'])) {
                ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>)"></div>
                    </div>
                    <?php if($images[0]['thumb']!='default_thumb.jpg'){ ?> 
                    <label class="d-block text-center mt-3">
                    <a class="c-white ml-2" onclick="return confirm_profile_photo_delete()">
                        <i class="fa fa-trash"></i>
                    </a>    
                    </label>
                    <?php } ?>
                <?php
                }
                else {
                ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/default_image.png)"></div>
                    </div>
                <?php
                }
            ?>
            <div class="profile-connect mt-1 mb-0" id="save_button_section" style="display: none">
                <button type="button" class="btn btn-styled btn-xs btn-base-2" id="save_image" ><?php echo translate('save_image')?></button>
            </div>
            <label class="btn-aux" for="profile_image" style="cursor: pointer;">
                <i class="ion ion-edit"></i>
            </label>
           
            <form action="<?=base_url()?>home/profile/update_image" method="POST" id="profile_image_form" enctype="multipart/form-data">
                <input type="file" style="display: none;" id="profile_image" name="profile_image"/>
                <span id="file_error"></span>
            </form>
            <!-- <a href="#" class="btn-aux">
                <i class="ion ion-edit"></i>
            </a> -->
        </div>
        <!-- Profile details -->
        <div class="profile-details">
            <h2 class="heading heading-3 strong-500 profile-name"><?=$get_member[0]->first_name." ".$get_member[0]->last_name?></h2>
            <?php
                $education_and_career = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'education_and_career');
                $education_and_career_data = json_decode($education_and_career, true);
            ?>
            <h3 class="heading heading-6 strong-400 profile-occupation mt-3">
            <?=$this->Crud_model->get_type_name_by_id('occupation', $education_and_career_data[0]['occupation'])?>
            </h3>
            <?php
                $package_info = json_decode($get_member[0]->package_info, true);
            ?>
            <div class="profile-stats clearfix mt-2">
                <div class="stats-entry" style="width: 100%">
                    <span class="stats-count"><?=$get_member[0]->follower?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('followers')?></span>
                </div>
            </div>
            <!-- Profile connect -->
            <div class="profile-connect mt-5">
                <!-- <a href="#" class="btn btn-styled btn-block btn-circle btn-sm btn-base-5">Follow</a>
                <a href="#" class="btn btn-styled btn-block btn-circle btn-sm btn-base-2">Send message</a> -->
                <h2 class="heading heading-5 strong-400"><?php echo translate('package_informations')?></h2>
                <small> <?=(($get_member[0]->exp_date > 0) ? "Expaired on : ". date('d/m/Y', $get_member[0]->exp_date) : "")?></small>	
            </div>
            <div class="profile-stats clearfix mt-0">
                <div class="stats-entry">
                    <span class="stats-count"><?=$package_info[0]['current_package']?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('current_package')?></span>
                </div>
                <div class="stats-entry">
                    <span class="stats-count"><?=currency($package_info[0]['package_price'])?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('package_price')?></span>
                </div>
            </div>
            <div class="profile-stats clearfix mt-2">
                <div class="stats-entry">
                    <span class="stats-count"><?=$get_member[0]->contacts?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('remaining_contacts')?></span>
                </div>
                <div class="stats-entry">
                    <span class="stats-count"><?=$get_member[0]->express_interest?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('remaining_interest')?></span>
                </div>
            </div>
            <div class="profile-stats clearfix mt-2">
                <div class="stats-entry">
                    <span class="stats-count"><?=$get_member[0]->direct_messages?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('remaining_message')?></span>
                </div>
                <div class="stats-entry">
                    <span class="stats-count"><?=$get_member[0]->photo_gallery?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('photo_gallery')?></span>
                </div>
            </div>
        </div>
        <!-- Profile stats -->
        <div class="profile-useful-links clearfix">
            <div class="useful-links">
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 gallery l_nav" onclick="profile_load('gallery')">
                    <b style="font-size: 12px"><?php echo translate('gallery')?></b>
                </a>
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 happy_story l_nav" onclick="profile_load('happy_story')">
                    <b style="font-size: 12px"><?php echo translate('happy_story')?></b>
                </a>
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 my_packages l_nav" onclick="profile_load('my_packages')">
                    <b style="font-size: 12px"><?php echo translate('My_package')?></b>
                </a>
                <!-- <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 payments l_nav" onclick="profile_load('payments')">
                    <b style="font-size: 12px"><?php echo translate('payment_informations')?></b>
                </a> -->
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 picture_privacy l_nav" onclick="profile_load('picture_privacy')">
                    <b style="font-size: 12px"><?php echo translate('picture_privacy')?></b>
                </a>

                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 change_pass l_nav" onclick="profile_load('change_pass')">
                    <b style="font-size: 12px"><?php echo translate('change_password')?></b>
                </a>

                <div class="text-center pt-3 pb-0">
                    <?php if($this->db->get_where("member", array("member_id" => $this->session->userdata('member_id')))->row()->is_closed == 'yes'){?>
                        <a onclick="profile_load('reopen_account')">
                        <i class="fa fa-unlock"></i>
                        <?php echo translate('re-open_account?')?>
                    </a>
                    <?php }else{?>
                        <a onclick="profile_load('close_account')">
                            <i class="fa fa-lock"></i>
                            <?php echo translate('close_account')?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#profile_image").change(function () {
        readURL(this);
    });

    function confirm_profile_photo_delete(){
        $("#active_modal").modal("toggle");
            $("#modal_header").html("Confirm Delete");
            $("#modal_body").html("<p class='text-center'><?php echo translate('are_you_sure_that_you_want_to_delete_this_image')?>?</p><span style='color:#DC0330;font-size:11px'>");
            $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'>Close</button> <a href='#' id='confirm_delete_profile' class='btn btn-sm btn-base-1 btn-shadow' onclick='return delete_profile_img()' style='width:25%'>Confirm</a>");
    }

    function delete_profile_img(){
        $("#confirm_delete_profile").removeAttr("onclick");
        $("#confirm_delete_profile").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('processing')?>..");
        setTimeout(function() {
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>home/delete_profile_img/",
                cache: false,
                success: function(response) { 
                    $("#active_modal .close").click();                   
                    $("#success_alert").show();
                    $(".alert-success").html("<?php echo translate('you_have_deleted_the_image')?>!");
                    $('#danger_alert').fadeOut('fast');
                    setTimeout(function() {
                        $('#success_alert').fadeOut('fast');
                        $("#show_img").css({
                        "background-image" : "url(<?=base_url()?>uploads/profile_image/default_thumb.jpg)"
                });
                    }, 5000); // <-- time in milliseconds
                },
                fail: function (error) {
                    alert(error);
                }
            });
        }, 500); // <-- time in milliseconds

    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_img").css({
                    "background-image" : "url("+ e.target.result +")"
                });
            }
            reader.readAsDataURL(input.files[0]);
            $("#file_error").html("");
            $("#save_button_section").show();
        }
    }
    $("#save_image").click(function(e) {
        $("#file_error").html("");
        var file_size = $('#profile_image')[0].files[0].size;
      //  alert(file_size);
	if(file_size>2097152) {
		$("#file_error").html("File size should not be greater than 2MB");
		//$(".demoInputBox").css("border-color","#FF0000");
		return false;
	} else{
        e.preventDefault();
       // alert('asdas');
        $("#profile_image_form").submit();
    }
    })
</script>
