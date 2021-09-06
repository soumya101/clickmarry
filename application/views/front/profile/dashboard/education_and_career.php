<?php 
    $education_and_career = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'education_and_career');
    $education_and_career_data = json_decode($education_and_career, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_education_and_career">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('education_and_career')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_education_and_career" <?php if ($privacy_status_data[0]['education_and_career'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('education_and_career')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <!-- <button type="button" id="hide_education_and_career" <?php if ($privacy_status_data[0]['education_and_career'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('education_and_career')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button> -->
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('education_and_career')">
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
                                <span><?php echo translate('highest_education')?></span>
                            </td>
                            <td>
                                <!-- <?=$education_and_career_data[0]['highest_education']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('education', $education_and_career_data[0]['highest_education'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('education_details')?></span>
                            </td>
                            <td>
                                <?=$education_and_career_data[0]['education_details']?>                               
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('occupation')?></span>
                            </td>
                            <td>
                                <!-- <?=$education_and_career_data[0]['occupation']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('occupation', $education_and_career_data[0]['occupation'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('occupation_details')?></span>
                            </td>
                            <td>
                                <?=$education_and_career_data[0]['occupation_details']?>                                
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('annual_income')?></span>
                            </td>
                            <td>
                                <!-- <?=$education_and_career_data[0]['annual_income']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('annual_income', $education_and_career_data[0]['annual_income'])?>
                            </td>
                            <td class="td-label">
                            <span><?php echo translate('employed_in')?></span>
                            </td>
                            <td>
                            <?=$this->Crud_model->get_type_name_by_id('custom_decision', $education_and_career_data[0]['employed_in'])?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_education_and_career" style="display: none;">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('education_and_career')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('education_and_career')"><i class="ion-checkmark" title="Save"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('education_and_career')"><i class="ion-close" title="Close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_education_and_career" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="highest_education" class="text-uppercase c-gray-light"><?php echo translate('highest_education')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="highest_education" value="<?=$education_and_career_data[0]['highest_education']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_disable('education', 'highest_education', 'name', 'edit', 'form-control form-control-sm selectpicker', $education_and_career_data[0]['highest_education'], '', '', '','','Yes');
                             ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="education_details" class="text-uppercase c-gray-light"><?php echo translate('education_details')?></label>
                        <input type="text" class="form-control no-resize" name="education_details" value="<?=$education_and_career_data[0]['education_details']?>">
                        
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <div class="row">                
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="occupation" class="text-uppercase c-gray-light"><?php echo translate('occupation')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="occupation" value="<?=$education_and_career_data[0]['occupation']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html_disable('occupation', 'occupation', 'name', 'edit', 'form-control form-control-sm selectpicker', $education_and_career_data[0]['occupation'], '', '', '','','Yes');
                             ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="occupation_details" class="text-uppercase c-gray-light"><?php echo translate('occupation_details')?></label>
                        <input type="text" class="form-control no-resize" name="occupation_details" value="<?=$education_and_career_data[0]['occupation_details']?>">                        
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="annual_income" class="text-uppercase c-gray-light"><?php echo translate('annual_income')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="annual_income" value="<?=$education_and_career_data[0]['annual_income']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('annual_income', 'annual_income', 'name', 'edit', 'form-control form-control-sm selectpicker', $education_and_career_data[0]['annual_income'], '', '', '','');
                             ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="employed_in" class="text-uppercase c-gray-light"><?php echo translate('employed_in')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="annual_income" value="<?=$education_and_career_data[0]['annual_income']?>"> -->
                           <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'employed_in', 'name', 'edit', 'form-control form-control-sm selectpicker', $education_and_career_data[0]['employed_in'], 'custom_field', 'EMPLOYED_IN', '');
                             ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>