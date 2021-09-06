<!-- MAIN WRAPPER -->
<div class="body-wrap">
    <div id="st-container" class="st-container">
        <div class="st-pusher">
            <div class="st-content">
                <div class="st-content-inner">
					<!-- Navbar -->
					<div id="myHeader">
						<div class="top-navbar align-items-center">
						    <div class="container">
						        <div class="row align-items-center py-1" style="padding-bottom: 0px !important">
						            <div class="col-lg-4 col-md-5">
	                                    <nav class="top-navbar-menu" style="margin:0px !important;">
										<span class="c-base-1 strong-300">&nbsp;<?php echo translate('Customer_Care_Number:_+91-9178980260')?></span>
	                                    </nav>
									</div>
						            <div class="col-lg-8 col-md-7">
						                <nav class="top-navbar-menu">
							                <ul class="float-right top_bar_right">

							                </ul>
						                </nav>
						            </div>
						        </div>
						    </div>
						</div>
						<nav class="navbar navbar-expand-lg navbar-light bg-default navbar--link-arrow navbar--uppercase">
						    <div class="container navbar-container">
						        <!-- Brand/Logo -->
						        <a class="navbar-brand" href="<?=base_url()?>home/">
						        	<?php
						        		$header_logo_info = $this->db->get_where('frontend_settings', array('type' => 'header_logo'))->row()->value;
	                                    $header_logo = json_decode($header_logo_info, true);
	                                    if (file_exists('uploads/header_logo/'.$header_logo[0]['image'])) {
	                                    ?>
	                                        <img src="<?=base_url()?>uploads/header_logo/<?=$header_logo[0]['image']?>" class="img-responsive" height="100%">
	                                    <?php
	                                    }
	                                    else {
	                                    ?>
	                                        <img src="<?=base_url()?>uploads/header_logo/default_image.png" class="img-responsive" height="100%">
	                                    <?php
	                                    }
	                                ?>
						        </a>
						        <div class="d-inline-block">
						            <!-- Navbar toggler  -->
						            <button class="navbar-toggler hamburger hamburger-js hamburger--spring" type="button" data-toggle="collapse" data-target="#navbar_main" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
						            <span class="hamburger-box">
						            <span class="hamburger-inner"></span>
						            </span>
						            </button>
						        </div>
						        <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbar_main">
						            <!-- Navbar links -->
						            <ul class="navbar-nav" data-hover="dropdown">
						                <li class="custom-nav">						                
						                <?php if($get_profile_percentage > 80) {?>
											<a class="nav-link <?php if($page == 'home'){?>nav_active<?php }?>" href="<?=base_url()?>home/dashboard/<?= $this->session->userdata['member_id']?>" aria-haspopup="true" aria-expanded="false"><?php  echo translate('dashboard')?></a>
										<?php } else {?>
											<a class="nav-link <?php if($page == 'home'){?>nav_active<?php }?>" href="<?=base_url()?>home" aria-haspopup="true" aria-expanded="false"><?php  echo translate('home')?></a>
										<?php } ?>										
						                </li>
						                <li class="custom-nav dropdown">
						                <a class="nav-link <?php if($page == 'listing' || $page == 'member_profile'){?>nav_active<?php }?>" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						                <?php echo translate('active_members')?></a>
						                <ul class="dropdown-menu" style="border: 1px solid #f1f1f1 !important;">
						                    <li class="dropdown dropdown-submenu">
						                    <li>
						                    <a class="dropdown-item <?php if(!empty($nav_dropdown)){if($nav_dropdown == 'all_members'){?>nav_active_dropdown<?php }}?>" href="<?=base_url()?>home/listing/">
						                    <?=((!empty($this->session->userdata['member_id'])) ? translate('matching_members'):translate('all_members'))?></a>
						                    </li>
						                    <li>
						                    <a class="dropdown-item <?php if(!empty($nav_dropdown)){if($nav_dropdown == 'premium_members'){?>nav_active_dropdown<?php }}?>" href="<?=base_url()?>home/listing/premium_members">
						                    <?php echo translate('premium_members')?></a>
						                    </li>
						                    <li>
						                    <a class="dropdown-item <?php if(!empty($nav_dropdown)){if($nav_dropdown == 'free_members'){?>nav_active_dropdown<?php }}?>" href="<?=base_url()?>home/listing/free_members">
						                    <?php echo translate('free_members')?></a>
						                    </li>
						                </ul>
						                </li>
						                <li class="custom-nav">
						                <a class="nav-link <?php if($page == 'plans' || $page == 'subscribe'){?>nav_active<?php }?>" href="<?=base_url()?>home/plans" aria-haspopup="true" aria-expanded="false">
						                <?php echo translate('premium_plans')?></a>
						                </li>
						                <li class="custom-nav">
						                <a class="nav-link <?php if($page == 'stories' || $page == 'story_detail'){?>nav_active<?php }?>" href="<?=base_url()?>home/stories" aria-haspopup="true" aria-expanded="false">
						                <?php echo translate('happy_stories')?></a>
						                </li>
						                <li class="custom-nav">
						                <a class="nav-link <?php if($page == 'contact_us'){?>nav_active<?php }?>" href="<?=base_url()?>home/contact_us" aria-haspopup="true" aria-expanded="false">
						                <?php echo translate('contact_us')?></a>
						                </li>
						            </ul>
						        </div>
						    </div>
						</nav>
					</div>
					<div class="sticky-content">
						<?php
							$sticky_header = $this->db->get_where('frontend_settings', array('type' => 'sticky_header'))->row()->value;
							if ($sticky_header == 'yes') { ?>
							<script type="text/javascript">
								window.onscroll = function() {
								    scrollFunction();
								};
								var header = document.getElementById("myHeader");
								var sticky = header.offsetTop;

								function scrollFunction() {
								    if (window.pageYOffset > sticky) {
								        header.classList.add("sticky-header");
								    } else {
								        header.classList.remove("sticky-header");
								    }
								}
							</script>
						<?php } ?>
						<script type="text/javascript">
						    $(document).ready(function () {
						        $('.set_langs').on('click', function () {
						            var lang_url = $(this).data('href');
						            $.ajax({url: lang_url, success: function (result) {
						                    location.reload();
						                }});
						        });
						    });
						</script>
