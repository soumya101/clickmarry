<div class="fluid">
	<div class="fixed-fluid">
		<div class="fluid">
			<div class="panel">
				<div class="panel-body">

					<!--Dark Panel-->
			        <!--===================================================-->
					<?php 
					$loginedType = $this->db->where('admin_id',$_SESSION['admin_id'])->get('admin')->row()->role;
					// print_r($loginedType);
					if($loginedType==1){
					?>
			        <div class="pull-right">
						<button data-target='#delete_modal' data-toggle='modal' class='btn btn-danger btn-sm btn-labeled fa fa-trash' data-toggle='tooltip' data-placement='top' title='".translate('delete_member')."' onclick='delete_member("<?=$value->member_id?>")'><?php echo translate('delete')?></i></button>
						<!-- <a href="<?=base_url()?>admin/members/<?=$parameter?>/edit_member/<?=$value->member_id?>" class="btn btn-primary btn-sm btn-labeled fa fa-edit" type="button"><?php echo translate('edit')?></a> -->
					</div>
					<?php }?>
			        <div class="text-left">
			        	<h4>Member ID - <?=$value->member_profile_id?></h4>
			        </div>

			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('introduction')?></h3>
			            </div>
			            <div class="panel-body">
			                <p><?=$value->introduction?></p>
			            </div>
			        </div>

			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('basic_information')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table table-condenced">
							<tr>
								<td>
									<b><?php echo translate('first_name')?></b>
								</td>
								<td>
									<?=$value->first_name?>
								</td>
								<td>
									<b><?php echo translate('last_name')?></b>
								</td>
								<td>
									<?=$value->last_name?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('gender')?></b>
								</td>
								<td>
                            		<?=$this->Crud_model->get_type_name_by_id('gender', $value->gender)?>
								</td>
								<td>
									<b><?php echo translate('email')?></b>
								</td>
								<td>
									<?=$value->email?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('age')?></b>
								</td>
								<td>
									<?=$calculated_age = (date('Y') - date('Y', $value->date_of_birth));?>
								</td>
								<td>
									<b><?php echo translate('marital_status')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('marital_status', $basic_info[0]['marital_status'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('number_of_children')?></b>
								</td>
								<td>
									<?=$basic_info[0]['number_of_children']?>
								</td>
								<td>
									<b><?php echo translate('area')?></b>
								</td>
								<td>
									<?=$basic_info[0]['area']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('mobile')?></b>
								</td>
								<td>
									<?=$value->mobile?>
								</td>
								<td>
									<b><?php echo translate('onbehalf')?></b>
								</td>
								<td>
									 <?= (!empty($basic_info[0]['on_behalf']) ? $this->Crud_model->get_type_name_by_id('on_behalf', $basic_info[0]['on_behalf']) : '') ?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('date_of_birth')?></b>
								</td>
								<td>
									<?=date('d/m/Y', $value->date_of_birth)?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
					<?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'physical_attributes'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('physical_attributes')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('height')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $value->height)?>
								
								</td>
								<td>
									<b><?php echo translate('weight')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes[0]['weight'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('eye_color')?></b>
								</td>
								<td>
								 <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes[0]['eye_color'])?>
								</td>
								<td>
									<b><?php echo translate('hair_color')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes[0]['hair_color'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('complexion')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes[0]['complexion'])?>
								</td>
								<td>
									<b><?php echo translate('blood_group')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes[0]['blood_group'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('body_type')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes[0]['body_type'])?>
								</td>
								<td>
									<b><?php echo translate('body_art')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes[0]['body_art'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('any_disability')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes[0]['any_disability'])?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
					<!-- religion information -->
					<?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'spiritual_and_social_background'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('spiritual_&_social_background')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('religion')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('religion', $spiritual_and_social_background[0]['religion']);?>
								</td>
								<td>
									<b><?php echo translate('caste_/_sect')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('caste', $spiritual_and_social_background[0]['caste'], 'caste_name');?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('sub-Caste')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('sub_caste', $spiritual_and_social_background[0]['sub_caste'], 'sub_caste_name');?>
								</td>
								<td>
									<b><?php echo translate('ethnicity')?></b>
								</td>
								<td>
									<?php if(is_numeric($spiritual_and_social_background[0]['ethnicity'])){ ?>
									<?=$this->Crud_model->get_type_name_by_id('custom_decision', $spiritual_and_social_background[0]['ethnicity'])?>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('personal_value')?></b>
								</td>
								<td>
								<?php if(is_numeric($spiritual_and_social_background[0]['personal_value'])){ ?>
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $spiritual_and_social_background[0]['personal_value'])?>
                                <?php } ?>
								</td>
								<td>
									<b><?php echo translate('family_value')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('family_value', $spiritual_and_social_background[0]['family_value']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('community_value')?></b>
								</td>
								<td>
									<?=$spiritual_and_social_background[0]['community_value']?>
								</td>
								<td>
									<b><?php echo translate('family_status')?></b>
								</td>
								<td>
									<?= (!empty($spiritual_and_social_background[0]['family_status']) ? $this->Crud_model->get_type_name_by_id('family_status', $spiritual_and_social_background[0]['family_status']) : '')?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('manglik')?></b>
								</td>
								<td>
								<?php 
                             		 $u_manglik=(!empty($spiritual_and_social_background[0]['u_manglik'])? $spiritual_and_social_background[0]['u_manglik'] : "0" ) ;
										if(is_numeric($u_manglik)) {
											if($u_manglik == 1){
												echo "Fully Manglik";
											}elseif($u_manglik == 2){
												echo "Partial Manglik";
											}
											elseif($u_manglik == 3){
												echo "Non Manglik";
											}else{
												echo " ";
											}
										}
                                ?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
					<!-- end of religion information -->

					<!-- astrological information -->
					<?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'astronomic_information'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('astronomic_information')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('rassi')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('astrology', $astronomic_information[0]['sun_sign'],'rassi')?>
								</td>
								<td>
									<b><?php echo translate('nakshatra')?></b>
								</td>
								<td>
								<?php echo ((!empty($astronomic_information[0]['moon_sign']) and (is_numeric($astronomic_information[0]['moon_sign']) )) ? $this->db->get_where('nakshatra',array('nakshatra_id'=>$astronomic_information[0]['moon_sign']))->row()->nakshatra_name :'') ?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('city_of_birth')?></b>
								</td>
								<td>
								<?=$astronomic_information[0]['city_of_birth']?>
								</td>
								<td>
									<b><?php echo translate('Gothram')?></b>
								</td>
								<td>
								<?=$astronomic_information[0]['time_of_birth']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
					<!-- end of astrological information -->

					<!-- present address -->
			        <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'present_address'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?=($this->Crud_model->get_type_name_by_id('gender', $value->gender)== 'Male' ? "Groom's " :"Bride's ")?><?php echo translate('present_address')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('country')?></b>
								</td>
								<td>							
                            		<?=$this->Crud_model->get_type_name_by_id('country', $present_address[0]['country']);?>
								</td>
								<td>
									<b><?php echo translate('state')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('state', $present_address[0]['state']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('city')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('city', $present_address[0]['city']);?>
								</td>
								<td>
									<b><?php echo translate('postal-Code')?></b>
								</td>
								<td>
									<?=$present_address[0]['postal_code']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
					<!-- end of present address -->

					<!-- education and career -->
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'education_and_career'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('education_&_career')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('highest_education')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('education', $education_and_career[0]['highest_education'])?>
								</td>
								<td>
									<b><?php echo translate('occupation')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('occupation', $education_and_career[0]['occupation'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('annual_income')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('annual_income', $education_and_career[0]['annual_income'])?>
								</td>
								<td>
									<b><b><?php echo translate('employed_in')?></b></b>
								</td>
								<td>
								<?=(isset($education_and_career[0]['employed_in']) ? $this->Crud_model->get_type_name_by_id('custom_decision', $education_and_career[0]['employed_in']) :'')?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                   <!-- end of education and career -->

				   <!-- family location -->
				   <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'permanent_address'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title">							
							<?php echo translate('permanent_address')?>
							</h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $permanent_address[0]['permanent_country']);?>
								</td>
								<td>
									<b><?php echo translate('state')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('state', $permanent_address[0]['permanent_state']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('city')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('city', $permanent_address[0]['permanent_city']);?>
								</td>
								<td>
									<b><?php echo translate('postal-Code')?></b>
								</td>
								<td>
									<?=$permanent_address[0]['permanent_postal_code']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
				   <!-- end of family location -->

				   <!-- additional family details -->
				   <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'family_information'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('family_information')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('father_status')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $family_info[0]['father'])?>
								</td>
								<td>
									<b><?php echo translate('mother_status')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $family_info[0]['mother'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('About_our_Family')?></b>
								</td>
								<td>
								<?=nl2br($family_info[0]['brother_sister'])?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
				   <!-- end of additional  family details -->
					
					<!-- additional family details -->
					<?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'additional_personal_details'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('additional_family_details')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('No._of_Brothers')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $additional_personal_details[0]['home_district'])?>
								</td>
								<td>
									<b><?php echo translate('Brothers_Married')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $additional_personal_details[0]['family_residence'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate("No._of_Sisters")?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $additional_personal_details[0]['fathers_occupation'])?>
								</td>
								<td>
									<b><?php echo translate('Sisters_Married')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $additional_personal_details[0]['special_circumstances'])?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
					<!-- end of additional family details -->

                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'language'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('language')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('mother_tongue')?></b>
								</td>
								<td>
								    <?=$this->Crud_model->get_type_name_by_id('language', $language[0]['mother_tongue']);?>									
								</td>
								<td>
									<b><?php echo translate('language_Known')?></b>
								</td>
								<td>									
									<?=$this->Crud_model->get_type_name_by_id_array('language', $language[0]['language']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('speak')?></b>
								</td>
								<td>
								  <?=$this->Crud_model->get_type_name_by_id_array('language', $language[0]['speak']);?>
								</td>
								<td>
									<b><?php echo translate('read')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('language', $language[0]['read']);?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>

					<!-- life style -->
					<?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'life_style'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('life_style')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('diet')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('custom_decision', $life_style[0]['diet'])?>
									
								</td>
								<td>
									<b><?php echo translate('drink')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $life_style[0]['drink'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('smoke')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('custom_decision', $life_style[0]['smoke'])?>
								</td>
								<!-- <td>
									<b><?php echo translate('living_with')?></b>
								</td>
								<td>
									<?=$life_style[0]['living_with']?>
								</td> -->
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
					<!-- end of life style -->
					
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'hobbies_and_interests'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('hobbies_&_interest')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('hobby')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('hobby', $hobbies_and_interest[0]['hobby']);?>
								
								</td>
								<td>
									<b><?php echo translate('Favourite_music')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('hobby', $hobbies_and_interest[0]['interest']);?>
								
								</td>
							</tr>
							<!-- <tr>
								<td>
									<b><?php echo translate('music')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['music']?>
								</td>
								<td>
									<b><?php echo translate('books')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['books']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('movie')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['movie']?>
								</td>
								<td>
									<b><?php echo translate('TV_show')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['tv_show']?>
								</td>
							</tr> -->
							<tr>
								<td>
									<b><?php echo translate('sports_show')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('sports', $hobbies_and_interest[0]['sports_show']);?>
								</td>
								<td>
									<b><?php echo translate('dress_style')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('dress', $hobbies_and_interest[0]['dress_style']);?>
                        </td>
								</td>
							</tr>
							<!-- <tr>
								<td>
									<b><?php echo translate('cuisine')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['cuisine']?>
								</td>
								<td>
									<b><?php echo translate('dress_style')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['dress_style']?>
								</td>
							</tr> -->
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'personal_attitude_and_behavior'))->row()->value == "yes") {
                    ?>
			        <!-- <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('personal_attitude_&_behavior')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('affection')?></b>
								</td>
								<td>
									<?=$personal_attitude_and_behavior[0]['affection']?>
								</td>
								<td>
									<b><?php echo translate('humor')?></b>
								</td>
								<td>
									<?=$personal_attitude_and_behavior[0]['humor']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('political_view')?></b>
								</td>
								<td>
									<?=$personal_attitude_and_behavior[0]['political_view']?>
								</td>
								<td>
									<b><?php echo translate('religious_service')?></b>
								</td>
								<td>
									<?=$personal_attitude_and_behavior[0]['religious_service']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div> -->
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'residency_information'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('residency_information')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('birth_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['birth_country']);?>
								</td>
								<td>
									<b><?php echo translate('residency_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['residency_country']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('citizenship_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['citizenship_country']);?>
								</td>
								<td>
									<b><?php echo translate('grow_up_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['grow_up_country']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('immigration_status')?></b>
								</td>
								<td>
									<?=$residency_information[0]['immigration_status']?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                   
			                                                                 
                   
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'partner_expectation'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('partner_expectation')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('general_requirement')?></b>
								</td>
								<td>
								<?=nl2br($partner_expectation[0]['general_requirement'])?>
								</td>
								<td>
									<b><?php echo translate('age_in_Yr')?></b>
								</td>
								<td>
								<?php if ((isset($partner_expectation[0]['partner_age_from']))and (isset($partner_expectation[0]['partner_age_to']))){ ?>
                            <?=$this->Crud_model->get_type_name_by_id('preference_decision', $partner_expectation[0]['partner_age_from'])?> To <?=$this->Crud_model->get_type_name_by_id('preference_decision', $partner_expectation[0]['partner_age_to'])?>
                            <?php } ?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('height')?></b>
								</td>
								<td>
								<?php if ((isset($partner_expectation[0]['partner_height_from']))and (isset($partner_expectation[0]['partner_height_to']))){ ?>
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $partner_expectation[0]['partner_height_from'])?> To <?=$this->Crud_model->get_type_name_by_id('custom_decision', $partner_expectation[0]['partner_height_to'])?> 
                            <?php } ?> 
								</td>
								<td>
									<b><?php echo translate('marital_status')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('marital_status', $partner_expectation[0]['partner_marital_status'])?>
								</td>
							</tr>
							<tr>
								
								<td>
									<b><?php echo translate('with_children_acceptables')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['with_children_acceptables'])?>
								</td>
								<td class="td-label">
                                <span><?php echo translate('Physical_Status')?></span>
                            </td>
                            <td>                               
                                <?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation[0]['partner_any_disability']);?>
                            </td>
							</tr>
							<tr>
							<td class="td-label">
                                <span><?php echo translate('complexion')?></span>
                            </td>
                            <td>                              
                                <?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation[0]['partner_complexion']);?>
                            </td>
								<td>
									<b><?php echo translate('diet')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation[0]['partner_diet'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('body_type')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation[0]['partner_body_type'])?>
								</td>
								<td>
									<b><?php echo translate('drinking_habits')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['partner_drinking_habits'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('smoking_habits')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['partner_smoking_habits'])?>
								</td>
								<td>
									<b><?php echo translate('mother_tongue')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('language', $partner_expectation[0]['partner_mother_tongue']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('religion')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('religion', $partner_expectation[0]['partner_religion'])?>
								</td>
								<td>
									<b><?php echo translate('caste')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('caste', $partner_expectation[0]['partner_caste'],'caste_name')?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('sub_caste')?></b>
								</td>
								<td>
								<?php if(isset($partner_expectation[0]['partner_sub_caste'])) { ?>
                                  <?=$this->Crud_model->get_type_name_by_id_array('sub_caste', $partner_expectation[0]['partner_sub_caste'],'sub_caste_name')?>         
                                <?php } ?>   
								</td>
								<td>
									<b><?php echo translate('personal_value')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation[0]['partner_personal_value']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('manglik')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['manglik'])?>
								</td>
								<td class="td-label">
                                <span><?php echo translate('family_value')?></span>
                            </td>
                            <td>
                                <!-- <?=$partner_expectation_data[0]['partner_family_value']?> -->
                                <?=$this->Crud_model->get_type_name_by_id_array('family_value', $partner_expectation[0]['partner_family_value']);?>
                            </td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('prefered_country')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('country', $partner_expectation[0]['prefered_country'])?>
                            </td>
								</td>
								<td>
									<b><?php echo translate('prefered_state')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('state', $partner_expectation[0]['prefered_state'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('prefered_status')?></b>
								</td>
								<td>
								<?php if(!empty($partner_expectation[0]['prefered_status']) and !empty($partner_expectation[0]['prefered_status1'])){ ?>
                                <?=$this->Crud_model->get_type_name_by_id('annual_income', $partner_expectation[0]['prefered_status']).' To '.$this->Crud_model->get_type_name_by_id('annual_income', $partner_expectation[0]['prefered_status1'])?>
                                <?php } ?>
								</td>
								<td>
									<b><?php echo translate('education')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('education', $partner_expectation[0]['partner_education'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('profession')?></b>
								</td>
								<td>
								<?=$this->Crud_model->get_type_name_by_id_array('occupation', $partner_expectation[0]['partner_profession'])?>
								</td>
								<td>
									<b><?php echo translate('prefered_status')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['prefered_status']?>
								</td>
							</tr>
							
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function delete_member(id){
	    $("#delete_member").val(id);
	}

	function deleteAMember() {
		$.ajax({
		    url: "<?=base_url()?>admin/member_delete/"+$("#delete_member").val(),
		    success: function(response) {
				window.location.href = "<?=base_url()?>admin/members/<?=$parameter?>";
		    },
			fail: function (error) {
			    alert(error);
			}
		});
	}
</script>

<div class="modal fade" id="delete_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_delete')?></h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
            	<p><?php echo translate('are_you_sure_you_want_to_delete_this_data?')?></p>
            	<div class="text-right">
            		<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close')?></button>
                	<button class="btn btn-danger btn-sm" id="delete_member" onclick="deleteAMember()"value=""><?php echo translate('delete')?></button>
            	</div>
            </div>

        </div>
    </div>
</div>
