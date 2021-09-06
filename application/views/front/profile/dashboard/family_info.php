<?php 
    $family_info = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'family_info');
    $family_info_data = json_decode($family_info, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_family_info">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('family_information')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_family_info" <?php if ($privacy_status_data[0]['family_info'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('family_info')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <!-- <button type="button" id="hide_family_info" <?php if ($privacy_status_data[0]['family_info'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('family_info')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button> -->
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('family_info')">
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
                                <span><?php echo translate('father_status')?></span>
                            </td>
                            <td>
                                <!-- <?=$family_info_data[0]['father']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $family_info_data[0]['father'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('mother_status')?></span>
                            </td>
                            <td>
                                <!-- <?=$family_info_data[0]['mother']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $family_info_data[0]['mother'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('About_our_family')?></span>
                            </td>
                            <td colspan="3"> 
                                <?=nl2br($family_info_data[0]['brother_sister'])?>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_family_info" style="display: none;">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('family_information')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('family_info')"><i class="ion-checkmark" title="Save"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('family_info')"><i class="ion-close" title="Close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_family_info" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="father" class="text-uppercase c-gray-light"><?php echo translate('father_status')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="father" value="<?=$family_info_data[0]['father']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'father', 'name', 'edit', 'form-control form-control-sm selectpicker', $family_info_data[0]['father'], 'custom_field', 'FATHER_STATUS', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="mother" class="text-uppercase c-gray-light"><?php echo translate('mother_status')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="mother" value="<?=$family_info_data[0]['mother']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'mother', 'name', 'edit', 'form-control form-control-sm selectpicker', $family_info_data[0]['mother'], 'custom_field', 'MOTHER_STATUS', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label for="brother_sister" class="text-uppercase c-gray-light"><?php echo translate('About_our_family')?></label>
                        <textarea class="form-control no-resize" name="brother_sister" rows="5" placeholder="Some Words about my Family"><?=$family_info_data[0]['brother_sister']?></textarea>
                       
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

