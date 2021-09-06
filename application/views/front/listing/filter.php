
<script src="<?=base_url()?>template/front/js/jquery.inputmask.bundle.min.js"></script>
<div class="col-lg-4 size-sm">
    <div class="sidebar">
        <div class="">
            <div class="card">
                <div class="card-title b-xs-bottom">
                <div class="row">
                        <div class="col-sm-6"> <h3 class="heading heading-sm text-uppercase">
                            <?php echo translate('search')?></h3>
                        </div>    
                        <div class="col-sm-6">
                            <small><a class="c-base-1  float-right" data-toggle="collapse" href="#advancesearch"  aria-expanded="false" aria-controls="advancesearch">
                                        Advance Search
                                </a>
                            </small>     
                        </div>
                </div>
                   
                    
                </div>
                <div class="card-body">
                    <form class="form-default" id="filter_form" data-toggle="validator" role="form">
                    <?php 
                        $hash_name = $this->security->get_csrf_token_name();
                        $hash_value = $this->security->get_csrf_hash();
                    ?>
                    <input type="hidden" name="<?= $hash_name;?>" value="<?= $hash_value;?>">
                        <?php if (!empty($this->session->userdata['member_id'])) { ?>
                        <!-- display none -->
                            <div class="row d-none">
                                <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('looking_for')?></label>
                                        <div class="radio radio-primary">
                                            <?php $member_gender = $this->db->get_where('member',array('member_id'=>$this->session->userdata['member_id']))->row()->gender; ?>
                                            <?php if($member_gender == '2') { ?>
                                                <input type="radio" name="gender" id="groom" value="1" <?php if(!empty($home_gender==1)){ ?>checked<?php }?>>
                                                <label for="groom"><?=translate('groom')?></label>

                                            <?php } elseif ($member_gender == '1') { ?>
                                                <input type="radio" name="gender" id="bride" value="2" <?php if(!empty($home_gender==2)){ ?>checked<?php }?>>
                                                <label for="bride" class="pr-3"><?=translate('bride')?></label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('looking_for')?></label>
                                        <div class="radio radio-primary">
                                            <input type="radio" name="gender" id="bride" value="2" <?php if(!empty($home_gender==2)){ ?>checked<?php }?>>
                                            <label for="bride" class="pr-3"><?=translate('bride')?></label>
                                            <input type="radio" name="gender" id="groom" value="1" <?php if(!empty($home_gender==1)){ ?>checked<?php }?>>
                                            <label for="groom"><?=translate('groom')?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group has-feedback">                                
                                    <label for="" class="text-uppercase"><?php echo translate('member_id')?></label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Search by ID" name="member_id" id="filter_member_id" value="<?php if(isset($member_id)){echo $member_id;}?>">
                                    <div class="help-block with-errors">
                                    </div>
                                </div>
                            </div>                            
                        </div> 
                        <div class="collapse" id="advancesearch">      
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                    <label for="" class="text-uppercase"><?php echo translate('age_from')?></label>
                                    <!-- <input type="number" class="form-control form-control-sm" name="aged_from" id="filter_aged_from" value="<?php if(isset($aged_from)){echo $aged_from;}?>"> -->
                                    <?php 
                                        if(!isset($aged_from)){
                                            $aged_from='';
                                        }
                                        echo $this->Crud_model->select_html('preference_decision', 'aged_from', 'name', 'edit', 'form-control form-control-sm selectpicker filter_aged_from', $aged_from, 'custom_field', 'AGE', '');
                                    ?>
                                    <div class="help-block with-errors">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                    <label for="" class="text-uppercase"><?php echo translate('to')?></label>
                                    <!-- <input type="number" class="form-control form-control-sm" name="aged_to" id="filter_aged_to" value="<?php if(isset($aged_to)){echo $aged_to;}?>"> -->
                                    <?php 
                                        if(!isset($aged_to)){
                                            $aged_to='';
                                        }
                                        echo $this->Crud_model->select_html('preference_decision', 'aged_to', 'name', 'edit', 'form-control form-control-sm selectpicker filter_aged_to', $aged_to, 'custom_field', 'AGE', '');
                                    ?>
                                </div>
                                <div class="help-block with-errors">
                                </div>
                            </div>
                        </div>
                       
                      
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('min_height')?></label>
                                        <!-- <input type="text" class="form-control form-control-sm height_mask" name="min_height" id="min_height" value="<?php if($min_height != ""){echo $min_height;}else{echo '0.00';}?>"> -->
                                        <?php 
                                            if(!isset($min_height)){
                                                $min_height='';
                                            }
                                            echo $this->Crud_model->select_html('custom_decision', 'min_height', 'name', 'edit', 'form-control form-control-sm selectpicker min_height', $min_height, 'custom_field', 'HEIGHT', '');
                                        ?>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('max_height')?></label>
                                        <!-- <input type="text" class="form-control form-control-sm height_mask" name="max_height" id="max_height" value="<?php if($max_height != ""){echo $max_height;}else{echo '8.00';}?>"> -->
                                        <?php 
                                            if(!isset($max_height)){
                                                $max_height='';
                                            }
                                            echo $this->Crud_model->select_html('custom_decision', 'max_height', 'name', 'edit', 'form-control form-control-sm selectpicker max_height', $max_height, 'custom_field', 'HEIGHT', '');
                                        ?>
                                    </div>
                                    <div class="help-block with-errors">
                                    </div>
                                </div>
                            </div>            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('marital_status')?></label>
                                        <?php
                                        //echo('dd'.$marital_status);
                                         if(!isset($marital_status)){
                                            $marital_status='';
                                        }
                                        ?>
                                        <?=$this->Crud_model->select_html('marital_status', 'marital_status', 'name', 'edit', 'form-control form-control-sm selectpicker marital_status', $marital_status, '', '', ''); ?>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                    <?php
                                    if ($this->db->get_where('frontend_settings', array('type' => 'language'))->row()->value == "yes") {
                                    ?>
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('mother_tongue')?></label>
                                        <?= $this->Crud_model->select_html_option_group('language', 'language', 'name', 'edit', 'demo-cs-multiselect-optgroups', $home_language, '', '', 'multi'); ?>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                <?php
                                    if ($this->db->get_where('frontend_settings', array('type' => 'spiritual_and_social_background'))->row()->value == "yes") {
                                    ?>
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('religion')?></label>
                                        <?= $this->Crud_model->select_html('religion', 'religion', 'name', 'edit', 'form-control form-control-sm selectpicker s_religion', $home_religion, '', '', ''); ?>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('caste')  ?></label>
                                        <?= $this->Crud_model->select_html_option_group('caste', 'caste', 'caste_name', 'edit', 'demo-cs-multiselect-optgroups', $home_caste, '','', 'multi'); ?>    
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group has-feedback" id="">
                                        <label for="" class="text-uppercase"><?php echo translate('sub_caste')?></label>

                                        <select class="form-control form-control-sm selectpicker s_sub_caste" name="sub_caste">
                                            <option value="<?= $home_sub_caste ?>"><?php echo translate('choose_a_caste_first')?></option>
                                        </select>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div> -->
                                    <?php
                                    }
                                    ?>  
                                     <?php
                                    if ($this->db->get_where('frontend_settings', array('type' => 'present_address'))->row()->value == "yes") {
                                    ?>
                                        <div class="form-group has-feedback">
                                            <label for="" class="text-uppercase"><?php echo translate('country')?></label>
                                            <?= $this->Crud_model->select_html_any_multi_with_class_without_any_option('country', 'country', 'name', 'edit', 'demo-cs-multiselect-optgroups country_select', $home_country, '', '', 'multi'); ?>
                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="" class="text-uppercase"><?php echo translate('state')?></label>
                                            <?php if (!empty($home_country) || $home_country != "") { ?>                                            
                                            <?= $this->Crud_model->select_html_any_multi_with_class_without_any_option('state', 'state', 'name', 'edit', 'demo-cs-multiselect-optgroups state_select', $home_state, 'country_id',$home_country, '', 'multi'); ?>
                                            <?php } else { ?>
                                                <select class="demo-cs-multiselect-optgroups state_select" name="state[]" multiple="multiple" onChange="check_select_any(this)">
                                                    <!-- <option value="0" selected><?php echo translate('Any')?></option> -->
                                                </select>

                                            <?php } ?>
                                            <!-- <select class="form-control form-control-sm selectpicker s_state" name="state">
                                                <option value=""><?php echo translate('choose_a_country_first')?></option>
                                            </select> -->
                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group has-feedback">
                                            <label for="" class="text-uppercase"><?php echo translate('city')?></label>
                                            <select class="form-control form-control-sm selectpicker s_city" name="city">
                                                <option value=""><?php echo translate('choose_a_state_first')?></option>
                                            </select>
                                            <div class="help-block with-errors">
                                            </div>
                                        </div> -->
                                    <?php
                                    }
                                    ?>        
                                </div>
                            </div>
                           
                            <div class="row">

                                <div class="col-sm-12">       
                                    <?php
                                    if ($this->db->get_where('frontend_settings', array('type' => 'education_and_career'))->row()->value == "yes") {
                                    ?>
                                     <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('education')?></label>
                                        <!-- <input type="text" class="form-control form-control-sm" name="profession" id="filter_profession" value="<?php if(isset($profession)){echo $profession;}?>"> -->
                                        <?php 
                                            if(!isset($education)){
                                                $education='';
                                            }
                                            echo $this->Crud_model->select_html_option_group('education', 'education', 'name', 'edit', 'demo-cs-multiselect-optgroups', '', '', '', 'multi');
                                        ?>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('profession')?></label>
                                        <!-- <input type="text" class="form-control form-control-sm" name="profession" id="filter_profession" value="<?php if(isset($profession)){echo $profession;}?>"> -->
                                        <?php 
                                            if(!isset($profession)){
                                                $profession='';
                                            }
                                            echo $this->Crud_model->select_html_option_group('occupation', 'profession', 'name', 'edit', 'demo-cs-multiselect-optgroups', '', '', '', 'multi');
                                        ?>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                   
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('employed_in')?></label>
                                        <?= $this->Crud_model->select_html('custom_decision', 'employed_in', 'name', 'edit', 'form-control form-control-sm selectpicker', '', 'custom_field', 'EMPLOYED_IN', ''); ?>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                            <?php
                            if ($this->db->get_where('frontend_settings', array('type' => 'physical_attributes'))->row()->value == "yes") {
                            ?>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('min_annual_income')?></label>
                                        <!-- <input type="text" class="form-control form-control-sm height_mask" name="min_height" id="min_height" value="<?php if($min_height != ""){echo $min_height;}else{echo '0.00';}?>"> -->
                                        <?php 
                                            if(!isset($min_income)){
                                                $min_income='';
                                            }
                                            echo $this->Crud_model->select_html('annual_income', 'min_income', 'name', 'edit', 'form-control form-control-sm min_income', $min_income, '', '', '','');
                                        ?>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('max_annual_income')?></label>
                                        <!-- <input type="text" class="form-control form-control-sm height_mask" name="max_height" id="max_height" value="<?php if($max_height != ""){echo $max_height;}else{echo '8.00';}?>"> -->
                                        <?php 
                                            if(!isset($max_income)){
                                                $max_income='';
                                            }
                                            echo $this->Crud_model->select_html('annual_income', 'max_income', 'name', 'edit', 'form-control form-control-sm max_income', $max_income, '', '', '','');
                                        ?>
                                    </div>
                                    <div class="help-block with-errors">
                                    </div>
                                </div>
                               </div>
                               <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('raasi')?></label>
                                        <?= $this->Crud_model->select_html_option_group('astrology', 'sun_sign', 'rassi', 'edit', 'demo-cs-multiselect-optgroups','', '', '', 'multi'); ?>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="" class="text-uppercase"><?php echo translate('manglik')?></label>
                                        <?= $this->Crud_model->select_html('manglik_decision', 'manglik', 'name', 'edit', 'form-control form-control-sm selectpicker', '', '', '', ''); ?>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                            </div>
                               <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group has-feedback">                                      
                                        <div class="radio radio-primary">
                                         <?php
                                          if(!isset($with_photo)){
                                                $with_photo='';
                                            }
                                          ?>  
                                            <input type="radio" name="with_photo" id="photo_yes" value="Yes" <?php if(!empty($with_photo=="Yes")){ ?>checked<?php }?>>
                                            <label for="bride" class="pr-3"><?=translate('With_Photo')?></label>
                                            <input type="radio" name="with_photo" id="photo_no" value="No" <?php if(!empty($with_photo=="No")){ ?>checked<?php }?>>
                                            <label for="groom"><?=translate('Without_photo')?></label>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <?php
                            }
                            ?>
                        
                        
                        <div class="pt-0">
                            <div class="card-title b-xs-bottom">
                                <h3 class="heading heading-sm text-uppercase"><?php echo translate('member_type')?></h3>
                            </div>
                            <div class="card-body">
                                <div class="filter-radio">
                                    <div class="radio radio-primary">
                                        <input type="radio" name="search_member_type" id="s_all_members" value="all" <?php if(!empty($search_member_type=="all")){?>checked<?php }?>>
                                        <label for="s_all_members"><?php echo translate('all_members')?></label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="search_member_type" id="s_premium_members" value="premium_members" <?php if(!empty($search_member_type=="premium_members")){?>checked<?php }?>>
                                        <label for="s_premium_members"><?php echo translate('premium_members')?></label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="search_member_type" id="s_free_members" value="free_members" <?php if(!empty($search_member_type=="free_members")){?>checked<?php }?>>
                                        <label for="s_free_members"><?php echo translate('free_members')?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <button type="button" class="btn btn-block btn-base-1 mt-2 z-depth-2-bottom" onclick="filter_members('0','search')"><?php echo translate('search')?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-lg-4 size-sm-btn mb-4">
    <button type="button" class="btn btn-block btn-base-1 mt-2 z-depth-2-bottom" onclick="adv_search()"><?php echo translate('advanced_search')?></button>
</div> -->
