<?php 
    $partner_expectation = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'partner_expectation');
    $partner_expectation_data = json_decode($partner_expectation, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_partner_expectation">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('partner_expectation')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_partner_expectation" <?php if ($privacy_status_data[0]['partner_expectation'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('partner_expectation')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <!-- <button type="button" id="hide_partner_expectation" <?php if ($privacy_status_data[0]['partner_expectation'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('partner_expectation')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button> -->
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('partner_expectation')">
                <i class="ion-edit" title="Edit"></i>
                </button>
            </div>
        </div>
        <div class="table-full-width">
            <div class="table-full-width">
                <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                    <tbody>
                        <tr>   
                            <td class="td-label">
                                <span><?php echo translate('age_in_Yr')?></span>
                            </td>
                            <td>
                            <?=$this->Crud_model->get_type_name_by_id('preference_decision', $partner_expectation_data[0]['partner_age_from'])?> To <?=$this->Crud_model->get_type_name_by_id('preference_decision', $partner_expectation_data[0]['partner_age_to'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('height')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $partner_expectation_data[0]['partner_height_from'])?> To <?=$this->Crud_model->get_type_name_by_id('custom_decision', $partner_expectation_data[0]['partner_height_to'])?>                                
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('marital_status')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id_array('marital_status', $partner_expectation_data[0]['partner_marital_status'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('Physical_Status')?></span>
                            </td>
                            <td>                               
                                <?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation_data[0]['partner_any_disability']);?>
                            </td>
                        </tr>
                        <tr>                            
                            <td class="td-label">
                                <span><?php echo translate('mother_tongue')?></span>
                            </td>
                            <td>                               
                                <?=$this->Crud_model->get_type_name_by_id_array('language', $partner_expectation_data[0]['partner_mother_tongue']);?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('religion')?></span>
                            </td>
                            <td>
                                
                                <?=$this->Crud_model->get_type_name_by_id_array('religion', $partner_expectation_data[0]['partner_religion'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('caste')?></span>
                            </td>
                            <td>
                                                            
                                <?=$this->Crud_model->get_type_name_by_id_array('caste', $partner_expectation_data[0]['partner_caste'],'caste_name')?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('sub_caste')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id_array('sub_caste', $partner_expectation_data[0]['partner_sub_caste'],'sub_caste_name')?>                                
                            </td>
                            
                        </tr>
                        <tr>
                        <td class="td-label">
                                <span><?php echo translate('with_children_acceptables')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation_data[0]['with_children_acceptables'])?>
                            </td>
                            
                            <td class="td-label">
                                <span><?php echo translate('complexion')?></span>
                            </td>
                            <td>
                                <!-- <?=$partner_expectation_data[0]['partner_complexion']?> -->
                                <?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation_data[0]['partner_complexion']);?>
                            </td>
                           
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('diet')?></span>
                            </td>
                            <td>                               
                                <?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation_data[0]['partner_diet'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('body_type')?></span>
                            </td>
                            <td>                               
                                <?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation_data[0]['partner_body_type'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('drinking_habits')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation_data[0]['partner_drinking_habits'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('smoking_habits')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation_data[0]['partner_smoking_habits'])?>
                            </td>
                        </tr>
  
                       
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('personal_value')?></span>
                            </td>
                            <td>                               
                                <?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation_data[0]['partner_personal_value']);?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('manglik')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('manglik_decision', $partner_expectation_data[0]['manglik'])?>
                                <!-- <?php $manglik=$partner_expectation_data[0]['manglik'];

                                    if($manglik == 1){
                                        echo "Yes";
                                    }elseif($manglik == 2){
                                        echo "No";
                                    }
                                    elseif($manglik == 3){
                                        echo "I don't know";
                                    }else{
                                        echo " ";
                                    }
                                ?> -->
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('family_value')?></span>
                            </td>
                            <td>
                                <!-- <?=$partner_expectation_data[0]['partner_family_value']?> -->
                                <?=$this->Crud_model->get_type_name_by_id_array('family_value', $partner_expectation_data[0]['partner_family_value']);?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('prefered_country')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id_array('country', $partner_expectation_data[0]['prefered_country'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('prefered_state')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id_array('state', $partner_expectation_data[0]['prefered_state'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('prefered_status')?></span>
                            </td>
                            <td>
                                <?php if(!empty($partner_expectation_data[0]['prefered_status']) and !empty($partner_expectation_data[0]['prefered_status1'])){ ?>
                                <?=$this->Crud_model->get_type_name_by_id('annual_income', $partner_expectation_data[0]['prefered_status']).' To '. $this->Crud_model->get_type_name_by_id('annual_income', $partner_expectation_data[0]['prefered_status1'])?>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('education')?></span>
                            </td>
                            <td>                                
                                <?=$this->Crud_model->get_type_name_by_id_array('education', $partner_expectation_data[0]['partner_education'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('profession')?></span>
                            </td>
                            <td>                                
                                <?=$this->Crud_model->get_type_name_by_id_array('occupation', $partner_expectation_data[0]['partner_profession'])?>
                            </td>
                        </tr>
                        
                       
                       
                        <!-- <tr>
                        <td class="td-label">
                                <span><?php echo translate('country_of_residence')?></span>
                            </td>
                            <td>                                
                                <?=$this->Crud_model->get_type_name_by_id_array('country', $partner_expectation_data[0]['partner_country_of_residence']);?>
                            </td>
                            <td></td>
                            <td></td>
                        </tr> -->
                        <tr>                            
                            <!-- <td class="td-label">
                                <span><?php echo translate('weight')?></span>
                            </td>
                            <td>
                                <?=$partner_expectation_data[0]['partner_weight']?>
                            </td> -->
                            <td class="td-label">
                                <span><?php echo translate('general_requirement')?></span>
                            </td>
                            <td colspan="3">
                                <?=nl2br($partner_expectation_data[0]['general_requirement'])?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_partner_expectation" style="display: none;">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('partner_expectation')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('partner_expectation')"><i class="ion-checkmark" title="Save"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('partner_expectation')"><i class="ion-close" title="Close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_partner_expectation" class="form-default" role="form">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group has-feedback">
                        <label for="partner_age" class="text-uppercase c-gray-light"><?php echo translate('age_from')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_age_from" value="<?=$partner_expectation_data[0]['partner_age_from']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('preference_decision', 'partner_age_from', 'name', 'edit', 'form-control form-control-sm partner_age_from', $partner_expectation_data[0]['partner_age_from'], 'custom_field', 'AGE', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-feedback">
                        <label for="partner_age" class="text-uppercase c-gray-light"><?php echo translate('to')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_age_to" value="<?=$partner_expectation_data[0]['partner_age_to']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('preference_decision', 'partner_age_to', 'name', 'edit', 'form-control form-control-sm partner_age_to', $partner_expectation_data[0]['partner_age_to'], 'custom_field', 'AGE', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-feedback">
                        <label for="partner_height" class="text-uppercase c-gray-light"><?php echo translate('height_from')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_height_from" value="<?=$partner_expectation_data[0]['partner_height_from']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'partner_height_from', 'name', 'edit', 'form-control form-control-sm partner_height_from', $partner_expectation_data[0]['partner_height_from'], 'custom_field', 'HEIGHT', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-feedback">
                        <label for="partner_height" class="text-uppercase c-gray-light"><?php echo translate('to')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_height_to" value="<?=$partner_expectation_data[0]['partner_height_to']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'partner_height_to', 'name', 'edit', 'form-control form-control-sm partner_height_to', $partner_expectation_data[0]['partner_height_to'], 'custom_field', 'HEIGHT', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_marital_status" class="text-uppercase c-gray-light"><?php echo translate('marital_status')?> *</label>
                        
                        <?php                           
                            echo $this->Crud_model->select_html_any_multi('marital_status', 'partner_marital_status', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_marital_status'], '', '', 'multi');
                        ?> 
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_any_disability" class="text-uppercase c-gray-light"><?php echo translate('Physical_Status')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_any_disability" value="<?=$partner_expectation_data[0]['partner_any_disability']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_any_multi('custom_decision', 'partner_any_disability', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_any_disability'], 'custom_field', 'PHYSICAL_STATUS', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                            <label for="partner_mother_tongue" class="text-uppercase c-gray-light"><?php echo translate('mother_tongue')?> *</label>
                            <!-- <?php 
                                echo $this->Crud_model->select_html('language', 'partner_mother_tongue', 'name', 'edit', 'form-control form-control-sm selectpicker', $partner_expectation_data[0]['partner_mother_tongue'], '', '', '');
                            ?> -->

                            <?php 
                                echo $this->Crud_model->select_html_any('language', 'partner_mother_tongue', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_mother_tongue'], '', '', 'multi');
                            ?>  
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="religion" class="text-uppercase c-gray-light"><?php echo translate('religion')?> *</label>
                        <?php 
                            echo $this->Crud_model->select_html_any('religion', 'partner_religion', 'name', 'edit', 'demo-cs-multiselect prefered_religion_edit', $partner_expectation_data[0]['partner_religion'], '', '', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="caste" class="text-uppercase c-gray-light"><?php echo translate('caste')?> *</label>
                        <?php
                            if (!empty($partner_expectation_data[0]['partner_religion'])) {
                                echo $this->Crud_model->select_html_any_multi('caste', 'partner_caste', 'caste_name', 'edit', 'demo-cs-multiselect prefered_caste_edit', $partner_expectation_data[0]['partner_caste'], 'religion_id', $partner_expectation_data[0]['partner_religion'], 'multi');   
                            } else {
                            ?>
                                <select class="demo-cs-multiselect prefered_caste_edit" name="partner_caste[]" multiple="multiple" onChange="check_select_any(this)">
                                    <option value="0"><?php echo translate('choose_a_religion_first')?></option>
                                </select>
                            <?php
                            }
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="sub_caste" class="text-uppercase c-gray-light"><?php echo translate('sub_caste')?> </label>
                        <?php
                            if (!empty($partner_expectation_data[0]['partner_caste'])) {
                                echo $this->Crud_model->select_html_any_multi('sub_caste', 'partner_sub_caste', 'sub_caste_name', 'edit', 'demo-cs-multiselect prefered_sub_caste_edit', $partner_expectation_data[0]['partner_sub_caste'], 'caste_id', $partner_expectation_data[0]['partner_caste'], 'multi');  
                            } else {
                            ?>
                                <select class="demo-cs-multiselect prefered_sub_caste_edit" name="partner_sub_caste[]" multiple="multiple" onChange="check_select_any(this)">
                                    <option value=""><?php echo translate('choose_a_caste_first')?></option>
                                </select>
                            <?php
                            }
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
                       
             <div class="row">                
             <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="with_children_acceptables" class="text-uppercase c-gray-light"><?php echo translate('with_children_acceptables')?></label>
                        <?php 
                            echo $this->Crud_model->select_html('decision', 'with_children_acceptables', 'name', 'edit', 'form-control form-control-sm selectpicker', $partner_expectation_data[0]['with_children_acceptables'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_complexion" class="text-uppercase c-gray-light"><?php echo translate('complexion')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_complexion" value="<?=$partner_expectation_data[0]['partner_complexion']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_any_multi('custom_decision', 'partner_complexion', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_complexion'], 'custom_field', 'COMPLEXION', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_diet" class="text-uppercase c-gray-light"><?php echo translate('diet')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_diet" value="<?=$partner_expectation_data[0]['partner_diet']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_any_multi('custom_decision', 'partner_diet', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_diet'], 'custom_field', 'DIET', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_body_type" class="text-uppercase c-gray-light"><?php echo translate('body_type')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_body_type" value="<?=$partner_expectation_data[0]['partner_body_type']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_any_multi('custom_decision', 'partner_body_type', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_body_type'], 'custom_field', 'BODY_TYPE', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>                       
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_drinking_habits" class="text-uppercase c-gray-light"><?php echo translate('drinking_habits')?> </label>
                        <?php 
                            echo $this->Crud_model->select_html('decision', 'partner_drinking_habits', 'name', 'edit', 'form-control form-control-sm selectpicker', $partner_expectation_data[0]['partner_drinking_habits'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_smoking_habits" class="text-uppercase c-gray-light"><?php echo translate('smoking_habits')?> </label>
                        <?php 
                            echo $this->Crud_model->select_html('decision', 'partner_smoking_habits', 'name', 'edit', 'form-control form-control-sm selectpicker', $partner_expectation_data[0]['partner_smoking_habits'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>                        

           
           
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_personal_value" class="text-uppercase c-gray-light"><?php echo translate('personal_value')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_personal_value" value="<?=$partner_expectation_data[0]['partner_personal_value']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_any_multi('custom_decision', 'partner_personal_value', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_personal_value'], 'custom_field', 'FAMILY_TYPE', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="manglik" class="text-uppercase c-gray-light"><?php echo translate('manglik')?> </label>

                        <?php 
                            echo $this->Crud_model->select_html('manglik_decision', 'manglik', 'name', 'edit', 'form-control form-control-sm selectpicker', $partner_expectation_data[0]['manglik'], '', '', '');
                        ?>
                        <!-- <select name="manglik" class="form-control form-control-sm selectpicker" data-placeholder="Choose a manglik" tabindex="2" data-hide-disabled="true">
                            <option value="">Choose one</option>
                            <option value="1" <?php if($manglik==1){ echo 'selected';} ?>>Yes</option>
                            <option value="2" <?php if($manglik==2){ echo 'selected';} ?>>No</option>
                            <option value="3" <?php if($manglik==3){ echo 'selected';} ?>>I don't know</option>
                        </select> -->
                        
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_family_value" class="text-uppercase c-gray-light"><?php echo translate('family_value')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_family_value" value="<?=$partner_expectation_data[0]['partner_family_value']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_any_multi('family_value', 'partner_family_value', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_family_value'], '', '', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="prefered_country" class="text-uppercase c-gray-light"><?php echo translate('prefered_country')?> </label>
                        
                         <?php 
                            echo $this->Crud_model->select_html_any_multi('country', 'prefered_country', 'name', 'edit', 'demo-cs-multiselect prefered_country_edit', $partner_expectation_data[0]['prefered_country'], '', '', 'multi');
                        ?>
                       
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="prefered_state" class="text-uppercase c-gray-light"><?php echo translate('prefered_state')?> </label>
                        <?php
                            if (!empty($partner_expectation_data[0]['prefered_country'])) {
                                echo $this->Crud_model->select_html_any_multi('state', 'prefered_state', 'name', 'edit', 'demo-cs-multiselect prefered_state_edit', $partner_expectation_data[0]['prefered_state'], 'country_id', $partner_expectation_data[0]['prefered_country'], 'multi');  
                            } else {
                            ?>
                                <select class="demo-cs-multiselect prefered_state_edit" name="prefered_state[]" multiple="multiple" onChange="check_select_any(this)">
                                    <option value="0" selected><?php echo translate('Any')?></option>
                                </select>
                            <?php
                            }
                        ?>

                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-feedback">
                        <label for="prefered_status" class="text-uppercase c-gray-light"><?php echo translate('prefered_status')?> From </label>
                        <!-- <input type="text" class="form-control no-resize" name="prefered_status" value="<?=$partner_expectation_data[0]['prefered_status']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('annual_income', 'prefered_status', 'name', 'edit', 'form-control form-control-sm income_from', $partner_expectation_data[0]['prefered_status'], '', '', '','');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-feedback">
                        <label for="prefered_status" class="text-uppercase c-gray-light"> To </label>
                        <!-- <input type="text" class="form-control no-resize" name="prefered_status" value="<?=$partner_expectation_data[0]['prefered_status']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('annual_income', 'prefered_status1', 'name', 'edit', 'form-control form-control-sm income_to', $partner_expectation_data[0]['prefered_status1'], '', '', '','');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_education" class="text-uppercase c-gray-light"><?php echo translate('education')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_education" value="<?=$partner_expectation_data[0]['partner_education']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_option_group('education', 'partner_education', 'name', 'edit', 'demo-cs-multiselect-optgroups', $partner_expectation_data[0]['partner_education'], '', '', 'multi');
                        ?>
                        
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_profession" class="text-uppercase c-gray-light"><?php echo translate('profession')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="partner_profession" value="<?=$partner_expectation_data[0]['partner_profession']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_option_group('occupation', 'partner_profession', 'name', 'edit', 'demo-cs-multiselect-optgroups', $partner_expectation_data[0]['partner_profession'], '', '', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
           
            
            
            <!-- <div class="row">
            <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_country_of_residence" class="text-uppercase c-gray-light"><?php echo translate('country_of_residence')?></label>
                        <?php 
                            echo $this->Crud_model->select_html_any('country', 'partner_country_of_residence', 'name', 'edit', 'demo-cs-multiselect', $partner_expectation_data[0]['partner_country_of_residence'], '', '', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div> -->
            <div class="row">               
               <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label for="general_requirement" class="text-uppercase c-gray-light"><?php echo translate('general_requirement')?></label>
                        <textarea  class="form-control no-resize" name="general_requirement" rows="5"><?=$partner_expectation_data[0]['general_requirement']?></textarea>                       
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="partner_weight" class="text-uppercase c-gray-light"><?php echo translate('weight')?></label>
                        <input type="text" class="form-control no-resize" name="partner_weight" value="<?=$partner_expectation_data[0]['partner_weight']?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div> -->
            </div>
        </form>
    </div>
</div>
<script>
   

function checkValue(value,arr){
    var status = 'No'; 
    for(var i=0; i<arr.length; i++){
        var name = arr[i];
        if(name == value){
        status = 'Yes';
        break;
        }
    }

  return status;
}

       $(".partner_age_from").change(function(){
            var from = parseInt($(".partner_age_from").val());
            var to = parseInt($(".partner_age_to").val());
            if (to < from) {
                var to = $(".partner_age_to").val(from);
            }
        });
        $(".partner_age_to").change(function(){
            var from = parseInt($(".partner_age_from").val());
            var to = parseInt($(".partner_age_to").val());
            if (to < from) {
                var to = $(".partner_age_to").val(from);
            }
        });

         $(".partner_height_from").change(function(){
            var from = parseInt($(".partner_height_from").val());
            var to = parseInt($(".partner_height_to").val());
            if (to < from) {
                var to = $(".partner_height_to").val(from);
            }
        });
        $(".partner_height_to").change(function(){
            var from = parseInt($(".partner_height_from").val());
            var to = parseInt($(".partner_height_to").val());
            if (to < from) {
                var to = $(".partner_height_to").val(from);
            }
        });

         $(".income_from").change(function(){
            
            var from1 = parseInt($(".income_from").val());
            var to1 = parseInt($(".income_to").val());           
            if (to1 < from1) {                
                var to1 = $(".income_to").val(from1);
            }
        });
        $(".income_to").change(function(){
            var from1 = parseInt($(".income_from").val());
            var to1 = parseInt($(".income_to").val());
            if (to1 < from1) {
                var to1 = $(".income_to").val(from1);
            }
        });

    $(".prefered_religion_edit").change(function(){
        var religion_id = $(".prefered_religion_edit").val();
       // alert(religion_id);
      //  alert(checkValue(0 ,religion_id));
      if (religion_id!=null){
                if ((checkValue(0 ,religion_id)=='Yes')) {
                    //alert("dd");
                    $(".prefered_caste_edit").html("<option value='0' selected><?php echo translate('Any')?></option>");
                    $(".prefered_caste_edit").multiselect('rebuild');
                    $(".prefered_sub_caste_edit").html("<option value='0' selected><?php echo translate('Any')?></option>");
                    $(".prefered_sub_caste_edit").multiselect('rebuild');
                } else {
                    var religion_id = $(".prefered_religion_edit").val();
                //  alert(religion_id);
                console.log(religion_id);
                    $.ajax({
                        url: "<?=base_url()?>home/get_dropdown_by_id_caste_array/caste/religion_id/", // form action url
                        type: 'POST',     // form submit method get/post
                        data:{ids:religion_id},
                        dataType: 'html', // request type html/json/xml
                        cache       : false,
                        //contentType : false,
                        //processData : false,
                        
                        success: function(data) {
                            $(".prefered_caste_edit").html(data);
                            $('.prefered_caste_edit').multiselect('rebuild');
                            $(".prefered_sub_caste_edit").html("<option value='0' selected><?php echo translate('Any')?></option>");
                            $('.prefered_sub_caste_edit').multiselect('rebuild');
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                }
      }else{
        $(".prefered_religion_edit").multiselect('deselectAll', false);
        $(".prefered_religion_edit").multiselect('refresh');
        $(".prefered_caste_edit").html("<option value='0' selected><?php echo translate('Any')?></option>");
        $(".prefered_caste_edit").multiselect('rebuild');
        $(".prefered_sub_caste_edit").html("<option value='0' selected><?php echo translate('Any')?></option>");
        $(".prefered_sub_caste_edit").multiselect('rebuild');
        $(".prefered_caste_edit").multiselect('deselectAll', false);
        $(".prefered_caste_edit").multiselect('refresh');
        $(".prefered_sub_caste_edit").multiselect('deselectAll', false);
        $(".prefered_sub_caste_edit").multiselect('refresh');
      }
    });
    $(".prefered_caste_edit").change(function(){
         var caste_id = $(".prefered_caste_edit").val();
         if ((checkValue(0 ,caste_id)=='Yes') || (caste_id=null)) {
            $(".prefered_sub_caste_edit").html("<option value='0' selected><?php echo translate('Any')?></option>");
            $(".prefered_sub_caste_edit").multiselect('rebuild');
        } else {  
            var caste_id = $(".prefered_caste_edit").val();
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_caste_array/sub_caste/caste_id/", // form action url
                type: 'POST', // form submit method get/post
                data:{ids:caste_id},
                dataType: 'html', // request type html/json/xml
                cache       : false,
                //contentType : false,
                //processData : false,
                success: function(data) {
                    $(".prefered_sub_caste_edit").html(data);
                    $(".prefered_sub_caste_edit").multiselect('rebuild');
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });

     $(".prefered_country_edit").change(function(){        
        var country_ids = $(".prefered_country_edit").val();
        //alert(country_ids);
        if (country_ids!=null){
                if ((checkValue(0 ,country_ids)=='Yes')) {
                    $(".prefered_state_edit").html("<option value='0' selected><?php echo translate('Any')?></option>");            
                    $(".prefered_state_edit").multiselect('rebuild');
                    
                } else {
                    var country_ids = $(".prefered_country_edit").val();                   
                    $.ajax({
                        url: "<?=base_url()?>home/get_dropdown_by_id_country_array/state/country_id/", // form action url
                        //url: "<?=base_url()?>home/get_dropdown_by_id_caste_array/caste/religion_id/", // form action url
                        type: 'POST', // form submit method get/post
                        data:{ids:country_ids},
                        dataType: 'html', // request type html/json/xml
                        cache       : false,
                        //contentType : false,
                    // processData : false,
                        success: function(data) {
                            $(".prefered_state_edit").html(data);
                            $(".prefered_state_edit").multiselect('rebuild');
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                }
        }else{
            $(".prefered_country_edit").multiselect('deselectAll', false);
            $(".prefered_country_edit").multiselect('refresh');
        }
    });
</script>