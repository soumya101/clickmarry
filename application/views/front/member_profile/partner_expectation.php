<div id="info_partner_expectation">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
            <?php echo translate('partner_expectation');?>
        </h3>
    </div>
    <div class="table-full-width">
        <div class="table-full-width">
            <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                <tbody>
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
                        <tr>   
                            <td class="td-label">
                                <span><?php echo translate('age_in_Yr')?></span>
                            </td>
                            <td>
                            <?php if ((isset($partner_expectation_data[0]['partner_age_from']))and (isset($partner_expectation_data[0]['partner_age_to']))){ ?>
                            <?=$this->Crud_model->get_type_name_by_id('preference_decision', $partner_expectation_data[0]['partner_age_from'])?> To <?=$this->Crud_model->get_type_name_by_id('preference_decision', $partner_expectation_data[0]['partner_age_to'])?>
                            <?php } ?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('height')?></span>
                            </td>
                            <td>
                            <?php if ((isset($partner_expectation_data[0]['partner_height_from']))and (isset($partner_expectation_data[0]['partner_height_to']))){ ?>
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $partner_expectation_data[0]['partner_height_from'])?> To <?=$this->Crud_model->get_type_name_by_id('custom_decision', $partner_expectation_data[0]['partner_height_to'])?> 
                            <?php } ?>                                   
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
                                <span><?php echo translate('with_children_acceptables')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation_data[0]['with_children_acceptables'])?>
                            </td>
                        </tr>

                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('Physical_Status')?></span>
                            </td>
                            <td>                               
                                <?=$this->Crud_model->get_type_name_by_id_array('custom_decision', $partner_expectation_data[0]['partner_any_disability']);?>
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
                                <?php if(isset($partner_expectation_data[0]['partner_sub_caste'])) { ?>
                                  <?=$this->Crud_model->get_type_name_by_id_array('sub_caste', $partner_expectation_data[0]['partner_sub_caste'],'sub_caste_name')?>         
                                <?php } ?>                       
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
                                <?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation_data[0]['manglik'])?>
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
                                <?= $this->Crud_model->get_type_name_by_id_array('state', $partner_expectation_data[0]['prefered_state']) ?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('prefered_status')?></span>
                            </td>
                            <td>
                                <!-- <?=$partner_expectation_data[0]['prefered_status']?> -->
                                <?php if(!empty($partner_expectation_data[0]['prefered_status']) and !empty($partner_expectation_data[0]['prefered_status1'])){ ?>
                                <?=$this->Crud_model->get_type_name_by_id('annual_income', $partner_expectation_data[0]['prefered_status']).' To '.$this->Crud_model->get_type_name_by_id('annual_income', $partner_expectation_data[0]['prefered_status1'])?>
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
                        
                </tbody>
            </table>
        </div>
    </div>
</div>