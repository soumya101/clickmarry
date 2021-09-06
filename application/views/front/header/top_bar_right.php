											<?php
												if (!empty($this->session->userdata['member_id'])) {
													if($this->db->get_where("member", array("member_id" => $this->session->userdata('member_id')))->row()->is_closed == 'yes'){ ?>
														<li class="dropdown dropdown--style-2 dropdown--animated float-left">
															<span class="badge badge-md badge-pill bg-danger" style="margin-top: 6px;">Account Closed</span>
														</li>
													<?php 
													}
												} 
											?>
											<?php
											if (!empty($this->session->userdata['member_id'])) {
												$noti_counter = 0;
												$msg_counter = 0;
												$notifications = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'notifications');
												$notification = json_decode($notifications, true);
												sort_array_of_array($notification, 'time', SORT_DESC);
											}
											
											if (!empty($this->session->userdata['member_id'])) {
											?>
												<li class="dropdown dropdown--style-2 dropdown--animated float-left">
													<a class="dropdown-icon dropdown-toggle has-notification noti_click" href="#" data-toggle="dropdown" aria-expanded="false">
													    <i class="ion-ios-bell-outline"></i>
													</a>
													<?php include 'notification.php'; ?>
							                    </li>
												<li class="dropdown dropdown--style-2 dropdown--animated float-left">
								                    <a class="dropdown-icon dropdown-toggle has-notification" href="#" data-toggle="dropdown" aria-expanded="false">
									                    <i class="ion-ios-email-outline"></i>
								                    </a>
								                    <?php include 'messages.php'; ?>
							                    </li>
							                    <li class="dropdown dropdown--style-2 dropdown--animated float-left">
								                    <a class="dropdown-toggle has-badge c-base-1" id="navbarDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								                    	<?php
								                    		$profile_image = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'profile_image');
											                $images = json_decode($profile_image, true);
											                if (file_exists('uploads/profile_image/'.$images[0]['thumb'])) {
											                ?>
											                    <div class="top_nav_img" style="background-image: url(<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>)"></div>
											                <?php
											                }
											                else {
											                ?>
											                    <div class="top_nav_img" style="background-image: url(<?=base_url()?>uploads/profile_image/default_image.png"></div>
											                <?php
											                }
											            ?>
									                    <span class="dropdown-text strong-500 d-none d-lg-inline-block d-xl-inline-block" style="margin-top: 5px"><?=$this->session->userdata['member_name']?> [ <?= $this->db->get_where("member", array("member_id" => $this->session->userdata('member_id')))->row()->member_profile_id ?> ] <i class="fa fa-caret-down"></i></span>
														
								                    </a>
													
													<?php
														if (!empty($this->session->userdata['member_id'])) {
													 ?>				
													<div class="dropdown-menu" aria-labelledby="navbarDropdown">																							   
														<a class="dropdown-item" href="<?=base_url()?>home/profile"><i class="fa fa-user-circle-o"></i> <?php echo translate('My Profile')?></a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="<?=base_url()?>home/profile/settings"><i class="fa fa-cog"></i> <?php echo translate('Settings')?></a>
														<div class="dropdown-divider"></div>														
														<a href="<?=base_url()?>home/logout" class="dropdown-item"><i class="fa fa-power-off"></i> <?php echo translate('log_out')?></a>															
													</div>
													<?php	
														}
													?>
							                    </li>
											<?php	
											}
											else {
											?>
													
											<?php
											}
											?>						                    
							                    <li class="float-left pb-1">
												<?php
												if (empty($this->session->userdata['member_id'])) {												
												?>	
		                                            <a href="<?=base_url()?>home/login" class="btn btn-styled btn-xs btn-base-1 btn-shadow"><i class="fa fa-power-off"></i> <?php echo translate('log_in')?></a>
		                                            <a href="<?=base_url()?>home/registration" class="btn btn-styled btn-xs btn-base-1 btn-shadow"><i class="fa fa-user"></i> <?php echo translate('register')?></a>
												<?php
												}
												?>
		                                        </li>

						                    <script>
											    $(document).ready(function(){
											        if (isloggedin != "") {
											            var noti_count = "<?php if (!empty($noti_counter)){echo $noti_counter;}?>";
											            if (noti_count > 0) {
											                $('.noti_counter').show();
											                $('.noti_counter').html(noti_count);
											            }
											            var msg_count = "<?php if (!empty($msg_counter)){echo $msg_counter;}?>";
											            if (msg_count > 0) {
											                $('.msg_counter').show();
											                $('.msg_counter').html(msg_count);
											            }
											        }

											        $(".noti_click").click(function(){
											            var member_id = "<?=$this->session->userdata('member_id')?>";
											            if (member_id != "") {
											                $.ajax({
											                    type: "POST",
											                    url: "<?=base_url()?>home/refresh_notification/"+member_id,
											                    cache: false,
											                    success: function(response) {
											                        $('.noti_counter').hide();
											                        // $('#test').html(response);
											                    }
											                });
											            }
											        });
											    });
											</script>