<?php 
    $personal_attitude_and_behavior = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'personal_attitude_and_behavior');
    $personal_attitude_and_behavior_data = json_decode($personal_attitude_and_behavior, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_personal_attitude_and_behavior">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('personal_attitude_and_behavior')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_personal_attitude_and_behavior" <?php if ($privacy_status_data[0]['personal_attitude_and_behavior'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('personal_attitude_and_behavior')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <!-- <button type="button" id="hide_personal_attitude_and_behavior" <?php if ($privacy_status_data[0]['personal_attitude_and_behavior'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('personal_attitude_and_behavior')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button> -->
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('personal_attitude_and_behavior')">
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
                                <span><?php echo translate('Whom_to_contact')?></span>
                            </td>
                            <td>
                                <!-- <?=$personal_attitude_and_behavior_data[0]['affection']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('whom_contact', $personal_attitude_and_behavior_data[0]['affection']);?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('contact_person_name')?></span>
                            </td>
                            <td>
                                <?=$personal_attitude_and_behavior_data[0]['humor']?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('Convenient_time')?></span>
                            </td>
                            <td>
                                <?=$personal_attitude_and_behavior_data[0]['political_view']?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('Alternet_mobile_No')?></span>
                            </td>
                            <td>
                                <?=$personal_attitude_and_behavior_data[0]['religious_service']?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_personal_attitude_and_behavior" style="display: none">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('personal_attitude_and_behavior')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('personal_attitude_and_behavior')"><i class="ion-checkmark" title="Save"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('personal_attitude_and_behavior')"><i class="ion-close" title="Close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_personal_attitude_and_behavior" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="affection" class="text-uppercase c-gray-light"><?php echo translate('Whom_to_contact')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="affection" value="<?=$personal_attitude_and_behavior_data[0]['affection']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('whom_contact', 'affection', 'name', 'edit', 'form-control form-control-sm selectpicker present_affection_edit', $personal_attitude_and_behavior_data[0]['affection'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="humor" class="text-uppercase c-gray-light"><?php echo translate('contact_person_name')?> *</label>
                        <input type="text" class="form-control no-resize" name="humor" value="<?=$personal_attitude_and_behavior_data[0]['humor']?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="political_view" class="text-uppercase c-gray-light"><?php echo translate('Convenient_time')?></label>
                        <input type="text" class="form-control no-resize" name="political_view" value="<?=$personal_attitude_and_behavior_data[0]['political_view']?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="religious_service" class="text-uppercase c-gray-light"><?php echo translate('Alternet_mobile_No')?></label>
                        <input type="text" class="form-control no-resize" name="religious_service" value="<?=$personal_attitude_and_behavior_data[0]['religious_service']?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>