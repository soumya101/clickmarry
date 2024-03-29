<?php 
    $physical_attributes = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'physical_attributes');
    $physical_attributes_data = json_decode($physical_attributes, true);
?>
<script src="<?=base_url()?>template/front/js/jquery.inputmask.bundle.min.js"></script>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_physical_attributes">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('physical_attributes')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_physical_attributes" <?php if ($privacy_status_data[0]['physical_attributes'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('physical_attributes')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <!-- <button type="button" id="hide_physical_attributes" <?php if ($privacy_status_data[0]['physical_attributes'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('physical_attributes')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button> -->
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('physical_attributes')">
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
                                <span><?php echo translate('height')?></span>
                            </td>
                            <td>
                                <!-- <?=$get_member[0]->height." ".translate('feet')?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $get_member[0]->height)?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('weight')?></span>
                            </td>
                            <td>
                                <!-- <?=$physical_attributes_data[0]['weight']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes_data[0]['weight'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('eye_color')?></span>
                            </td>
                            <td>
                                <!-- <?=$physical_attributes_data[0]['eye_color']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes_data[0]['eye_color'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('hair_color')?></span>
                            </td>
                            <td>
                                <!-- <?=$physical_attributes_data[0]['hair_color']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes_data[0]['hair_color'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('complexion')?></span>
                            </td>
                            <td>
                                <!-- <?=$physical_attributes_data[0]['complexion']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes_data[0]['complexion'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('blood_group')?></span>
                            </td>
                            <td>
                                <!-- <?=$physical_attributes_data[0]['blood_group']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes_data[0]['blood_group'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('body_type')?></span>
                            </td>
                            <td>
                                <!-- <?=$physical_attributes_data[0]['body_type']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes_data[0]['body_type'])?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('body_art')?></span>
                            </td>
                            <td>
                                <!-- <?=$physical_attributes_data[0]['body_art']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes_data[0]['body_art'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('Physical_Status')?></span>
                            </td>
                            <td>
                                <!-- <?=$physical_attributes_data[0]['any_disability']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('custom_decision', $physical_attributes_data[0]['any_disability'])?>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_physical_attributes" style="display: none">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('physical_attributes')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('physical_attributes')"><i class="ion-checkmark" title="Save"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('physical_attributes')"><i class="ion-close" title="Close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_physical_attributes" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="height" class="text-uppercase c-gray-light"><?php echo translate('height')?> *</label>
                        <div class="input-group">
                            <!-- <input type="text" class="form-control no-resize height_mask" aria-describedby="text-feet" name="height" value="<?=$get_member[0]->height?>"> -->
                            <!-- <div class="input-group-append">
                                <span class="input-group-text small ml-2" id="text-feet"><?=translate('feet')?></span>
                            </div> -->
                            <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'height', 'name', 'edit', 'form-control form-control-sm selectpicker', $get_member[0]->height, 'custom_field', 'HEIGHT', '');
                             ?>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="weight" class="text-uppercase c-gray-light"><?php echo translate('weight')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="weight" value="<?=$physical_attributes_data[0]['weight']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'weight', 'name', 'edit', 'form-control form-control-sm selectpicker', $physical_attributes_data[0]['weight'], 'custom_field', 'WEIGHT', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="eye_color" class="text-uppercase c-gray-light"><?php echo translate('eye_color')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="eye_color" value="<?=$physical_attributes_data[0]['eye_color']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'eye_color', 'name', 'edit', 'form-control form-control-sm selectpicker', $physical_attributes_data[0]['eye_color'], 'custom_field', 'EYE_COLOR', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="hair_color" class="text-uppercase c-gray-light"><?php echo translate('hair_color')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="hair_color" value="<?=$physical_attributes_data[0]['hair_color']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'hair_color', 'name', 'edit', 'form-control form-control-sm selectpicker', $physical_attributes_data[0]['hair_color'], 'custom_field', 'HAIR_COLOR', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="complexion" class="text-uppercase c-gray-light"><?php echo translate('complexion')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="complexion" value="<?=$physical_attributes_data[0]['complexion']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'complexion', 'name', 'edit', 'form-control form-control-sm selectpicker', $physical_attributes_data[0]['complexion'], 'custom_field', 'COMPLEXION', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="blood_group" class="text-uppercase c-gray-light"><?php echo translate('blood_group')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="blood_group" value="<?=$physical_attributes_data[0]['blood_group']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'blood_group', 'name', 'edit', 'form-control form-control-sm selectpicker', $physical_attributes_data[0]['blood_group'], 'custom_field', 'BLOOD_GROUP', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="body_type" class="text-uppercase c-gray-light"><?php echo translate('body_type')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="body_type" value="<?=$physical_attributes_data[0]['body_type']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'body_type', 'name', 'edit', 'form-control form-control-sm selectpicker', $physical_attributes_data[0]['body_type'], 'custom_field', 'BODY_TYPE', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="body_art" class="text-uppercase c-gray-light"><?php echo translate('body_art')?></label>
                        <!-- <input type="text" class="form-control no-resize" name="body_art" value="<?=$physical_attributes_data[0]['body_art']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'body_art', 'name', 'edit', 'form-control form-control-sm selectpicker', $physical_attributes_data[0]['body_art'], 'custom_field', 'LIVING_WITH', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="any_disability" class="text-uppercase c-gray-light"><?php echo translate('Physical_Status')?> *</label>
                        <!-- <input type="text" class="form-control no-resize" name="any_disability" value="<?=$physical_attributes_data[0]['any_disability']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('custom_decision', 'any_disability', 'name', 'edit', 'form-control form-control-sm selectpicker', $physical_attributes_data[0]['any_disability'], 'custom_field', 'PHYSICAL_STATUS', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <script>
    $(document).ready(function(){
        $(".height_mask").inputmask({
            mask: "9.99",
            greedy: false,
            definitions: {
                '*': {
                    validator: "[0-9]"
                }
            }
        });
    });
</script> -->