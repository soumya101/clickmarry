<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?=$this->db->get_where('general_settings', array('general_settings_id' => 24))->row()->value?>">
        <meta name="keywords" content="<?=$this->db->get_where('general_settings', array('general_settings_id' => 25))->row()->value?>">
        <meta name="author" content="<?=$this->db->get_where('general_settings', array('general_settings_id' => 26))->row()->value?>">
        <meta name="revisit-after" content="<?=$this->db->get_where('general_settings', array('general_settings_id' => 54))->row()->value?> day(s)">
        <title><?=$this->system_title?></title>
        <!-- Page loader -->
        <script src="<?=base_url()?>template/front/vendor/pace/js/pace.min.js"></script>
        <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/pace/css/pace-minimal.css" type="text/css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        <!-- Plugins -->
        <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/swiper/css/swiper.min.css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/hamburgers/hamburgers.min.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/animate/animate.min.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/lightgallery/css/lightgallery.min.css">
        <!-- Icons -->
        <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/ionicons/css/ionicons.min.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/line-icons/line-icons.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/line-icons-pro/line-icons-pro.css" type="text/css">
        <!-- Linea Icons -->
        <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/linea/arrows/linea-icons.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/linea/basic/linea-icons.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/linea/ecommerce/linea-icons.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/linea/software/linea-icons.css" type="text/css">
        <!-- Global style (main) -->
        <?php
            $theme_color = $this->db->get_where('frontend_settings', array('type' => 'theme_color'))->row()->value;
            if ($theme_color == 'default-color') { ?>
                <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style.css" rel="stylesheet" media="screen">
            <?php
            } elseif ($theme_color == 'pink') { ?>
                <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-pink.css" rel="stylesheet" media="screen">
            <?php
            } elseif ($theme_color == 'purple') { ?>
                <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-purple.css" rel="stylesheet" media="screen">
            <?php
            } elseif ($theme_color == 'light-blue') { ?>
                <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-light-blue.css" rel="stylesheet" media="screen">
            <?php
            } elseif ($theme_color == 'green') { ?>
                <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-green.css" rel="stylesheet" media="screen">
            <?php
            } elseif ($theme_color == 'dark') { ?>
                <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-dark.css" rel="stylesheet" media="screen">
            <?php
            } elseif ($theme_color == 'super-dark') { ?>
                <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-super-dark.css" rel="stylesheet" media="screen">
            <?php
            }
            elseif ($theme_color == 'orange') { ?>
                <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-orange.css" rel="stylesheet" media="screen">
            <?php
            }
            elseif ($theme_color == 'red') { ?>
        		<link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-red.css" rel="stylesheet" media="screen">
        	<?php
        	}
        	elseif ($theme_color == 'black') { ?>
        		<link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-black.css" rel="stylesheet" media="screen">
        	<?php
        	}
            elseif ($theme_color == 'blue') { ?>
        		<link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-blue.css" rel="stylesheet" media="screen">
        	<?php
        	}
        	elseif ($theme_color == 'ightseagreen') { ?>
        		<link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-ightseagreen.css" rel="stylesheet" media="screen">
        	<?php
        	}
        ?>
        <!-- Custom style - Remove if not necessary -->
        <link type="text/css" href="<?=base_url()?>template/front/css/custom-style.css" rel="stylesheet">
        <!-- Favicon -->
        <script src="<?=base_url()?>template/front/vendor/jquery/jquery.min.js"></script>

        <?php
            $favicon = $this->db->get_where('frontend_settings', array('type' => 'favicon'))->row()->value;
            $favicon = json_decode($favicon, true);
            if (!empty($favicon) && file_exists('uploads/favicon/'.$favicon[0]['image'])) {
        ?>
                <link href="<?=base_url()?>uploads/favicon/<?=$favicon[0]['image']?>" rel="icon" type="image/png">
        <?php
            }
            else {
        ?>
                <link href="<?=base_url()?>uploads/favicon/default_image.png" rel="icon" type="image/png">
        <?php
            }
        ?>

    </head>
    <body>
        <?php include 'preloader.php';?>
        <?php include_once 'header/header.php';?>
        <?php
            $registration_image = $this->db->get_where('frontend_settings', array('type' => 'registration_image'))->row()->value;
            $registration_image_data = json_decode($registration_image, true);

        ?>
        <section class="slice-lg has-bg-cover bg-size-cover" style="background-image: url(<?=base_url()?>uploads/registration_image/<?=$registration_image_data[0]['image']?>); background-position: bottom bottom;">
            <span class="mask mask-dark--style-2"></span>
            <div class="container">
                <div class="row cols-xs-space align-items-center text-center text-md-left">
                    <div class="col-lg-6 col-md-10 ml-auto mr-auto">
                        <div class="form-card form-card--style-2 z-depth-3-top">
                            <div class="form-body">
                               <div class="text-center px-2">
                               <h5 class="control-label font_light">You have successfully registered with Click Marry.</h5>
                               <h5 class="control-label font_light">Your Membership ID is : <?=$profile_id ?></h5>
                                </div>
                                <div class="text-center px-2">
                                    <h5 class="control-label font_light"><?=translate('Verify_Your_mobile_number')?> </h5>
                                    <label class="control-label font_light">You will receive 6-digit confirmation code vis SMS to <?=$mobile_no?> ( <a href="#" id="edit_mobile"><?=(!empty($mobile_error)? 'Cancel' : 'Edit')?></a> )</lable>
                                </div>
                                  
                                <div class="row justify-content-center edit_mobile <?=(!empty($mobile_error)? '' : 'd-none')?>">
                                    <p style="color: red" class="text-center">
                                                <?php
                                                    if (!empty($mobile_error)){
                                                        echo $mobile_error;
                                                    }
                                                ?>
                                    </p> 
                                <div class="clearfix w-100"></div>                   
                                <form class="form-default mt-1" id="alt_mobile_form" method="post" action="<?=base_url()?>home/edit_mobile">                               
                                <?php 
                                    $hash_name = $this->security->get_csrf_token_name();
                                    $hash_value = $this->security->get_csrf_hash();
                                ?>
                                <input type="hidden" name="<?= $hash_name;?>" value="<?= $hash_value;?>">
                                    <div class="form-inline">                                                                          
                                        <input  class="form-control form-control-sm" name="new_mobile" placeholder="Enter 10 digit Mobile Number" value="<?php if(!empty($form_contents)){echo $form_contents['new_mobile'];}?>" type="tel" pattern="^\d{10}$" required  autofocus>
                                        <button type="submit" class="btn btn-styled btn-xs btn-base-1 z-depth-2-bottom ml-2">
                                            <?php echo translate('Change_mobile_number')?>
                                        </button>
                                    </div>
                                </form>                                        
                                </div>
                                       
                                
                                <form class="form-default mt-4" id="otp_form" method="post" action="<?=base_url()?>home/validate_otp">
                                <?php 
                                    $hash_name = $this->security->get_csrf_token_name();
                                    $hash_value = $this->security->get_csrf_hash();
                                ?>
                                <input type="hidden" name="<?= $hash_name;?>" value="<?= $hash_value;?>">
                                <div class="row <?=(!empty($mobile_error)? 'd-none' : '')?>" id="validate_otp">
                                        <span class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label font_light"><?php echo ('Check Your SMS For the OTP')?></label>
                                                <input type="password" class="form-control form-control-sm" name="otp_entered" value="<?php if(!empty($form_contents)){echo $form_contents['otp_entered'];}?>" required autofocus>
                                            </div>
                                            <label class="control-label font_light">Did not received code yet? ( <span id="countdown"></span> )</label>
                                        
                                        <p style="color: red">
                                        <?php
                                            if (!empty($otp_error)){
                                                echo $otp_error;
                                            }
                                        ?>
                                    </p>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-styled btn-sm btn-base-1 z-depth-2-bottom mt-2" style="width: 100%">
                                            <?php echo translate('validate_OTP')?>
                                        </button>                                        
                                    </div>
                                </div>                            
                                </form>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FOOTER -->
		<?php include_once'footer/footer.php';?>
        <!-- SCRIPTS -->
        <a href="#" class="back-to-top btn-back-to-top"></a>
        <!-- Core -->
        <script src="<?=base_url()?>template/front/vendor/popper/popper.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>template/front/js/vendor/jquery.easing.js"></script>
        <script src="<?=base_url()?>template/front/js/ie10-viewport-bug-workaround.js"></script>
        <script src="<?=base_url()?>template/front/js/slidebar/slidebar.js"></script>
        <script src="<?=base_url()?>template/front/js/classie.js"></script>
        <!-- Bootstrap Extensions -->
        <script src="<?=base_url()?>template/front/vendor/bootstrap-dropdown-hover/js/bootstrap-dropdown-hover.js"></script>
        <script src="<?=base_url()?>template/front/vendor/bootstrap-notify/bootstrap-growl.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/scrollpos-styler/scrollpos-styler.js"></script>
        <!-- Plugins -->
        <script src="<?=base_url()?>template/front/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/footer-reveal/footer-reveal.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/sticky-kit/sticky-kit.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/swiper/js/swiper.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/paraxify/paraxify.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/viewport-checker/viewportchecker.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/milestone-counter/jquery.countTo.js"></script>
        <script src="<?=base_url()?>template/front/vendor/countdown/js/jquery.countdown.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/typed/typed.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/instafeed/instafeed.js"></script>
        <script src="<?=base_url()?>template/front/vendor/gradientify/jquery.gradientify.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/nouislider/js/nouislider.min.js"></script>
        <!-- Isotope -->
        <script src="<?=base_url()?>template/front/vendor/isotope/isotope.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <!-- Light Gallery -->
        <script src="<?=base_url()?>template/front/vendor/lightgallery/js/lightgallery.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/lightgallery/js/lg-thumbnail.min.js"></script>
        <script src="<?=base_url()?>template/front/vendor/lightgallery/js/lg-video.js"></script>
        <!-- App JS -->
        <script src="<?=base_url()?>template/front/js/wpx.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.top_bar_right').load('<?php echo base_url(); ?>home/top_bar_right');
            });

            var timeleft = 10;
            var downloadTimer = setInterval(function(){
            document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
            timeleft -= 1;
            if(timeleft <= 0){
            clearInterval(downloadTimer);
            document.getElementById("countdown").innerHTML = '<a href="<?=base_url()?>home/resend_otp">Resend Code</a>';
            }
            }, 1000);           
        </script>

        <script>
            $("#edit_mobile").click(function(){
                s = $(this);
                s.html(s.text() == 'Edit' ? 'Cancel' : 'Edit');
                $(".edit_mobile").toggleClass('d-none');
                $("#validate_otp").toggleClass('d-none');
            });
        </script>
    </body>
</html>
