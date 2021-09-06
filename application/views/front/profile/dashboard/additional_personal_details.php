<?php 
    $additional_personal_details = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'additional_personal_details');
    $additional_personal_details_data = json_decode($additional_personal_details, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_additional_personal_details">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('additional_family_details')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_additional_personal_details" <?php if ($privacy_status_data[0]['additional_personal_details'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('additional_personal_details')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <!-- <button type="button" id="hide_additional_personal_details" <?php if ($privacy_status_data[0]['additional_personal_details'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('additional_personal_details')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button> -->
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('additional_personal_details')">
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
                                <span><?php echo translate('No._of_Brothers')?></span>
                            </td>
                            <td>
                                <!-- <?=$additional_personal_details_data[0]['home_district']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $additional_personal_details_data[0]['home_district'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('Brothers_Married')?></span>
                            </td>
                            <td>
                                <!-- <?=$additional_personal_details_data[0]['family_residence']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $additional_personal_details_data[0]['family_residence'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate("No._of_Sisters")?></span>
                            </td>
                            <td>
                                <!-- <?=$additional_personal_details_data[0]['fathers_occupation']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $additional_personal_details_data[0]['fathers_occupation'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('Sisters_Married')?></span>
                            </td>
                            <td>
                                <!-- <?=$additional_personal_details_data[0]['special_circumstances']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $additional_personal_details_data[0]['special_circumstances'])?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_additional_personal_details" style="display: none;">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('additional_family_details')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('additional_personal_details')"><i class="ion-checkmark" title="Save"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('additional_personal_details')"><i class="ion-close" title="Close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_additional_personal_details" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="home_district" class="text-uppercase c-gray-light"><?php echo translate('No._of_Brothers')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="home_district" value="<?=$additional_personal_details_data[0]['home_district']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'home_district', 'name', 'edit', 'form-control form-control-sm selectpicker', $additional_personal_details_data[0]['home_district'], 'custom_field', 'BRO_SIS', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="family_residence" class="text-uppercase c-gray-light"><?php echo translate('Brothers_Married')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="family_residence" value="<?=$additional_personal_details_data[0]['family_residence']?>"> -->
                        <?php                                                  
                            echo $this->Crud_model->select_html('custom_decision', 'family_residence', 'name', 'edit', 'form-control form-control-sm selectpicker', $additional_personal_details_data[0]['family_residence'], 'custom_field', 'BRO_SIS', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="fathers_occupation" class="text-uppercase c-gray-light"><?php echo translate("No._of_Sisters")?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="fathers_occupation" value="<?=$additional_personal_details_data[0]['fathers_occupation']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'fathers_occupation', 'name', 'edit', 'form-control form-control-sm selectpicker', $additional_personal_details_data[0]['fathers_occupation'], 'custom_field', 'BRO_SIS', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="special_circumstances" class="text-uppercase c-gray-light"><?php echo translate('Sisters_Married')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="special_circumstances" value="<?=$additional_personal_details_data[0]['special_circumstances']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'special_circumstances', 'name', 'edit', 'form-control form-control-sm selectpicker', $additional_personal_details_data[0]['special_circumstances'], 'custom_field', 'BRO_SIS', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function(){
    
    // $('select[name="family_residence"]').on('change', function(){  
    //     alert($('select[name="family_residence"]').val());
    //     if ($(this).val() > $('select[name="home_district"]').val()) 
    //     {
    //         alert('gggg');
    //     }else {
    //         alert('ffff');
    //     }        
    // });

});
</script>