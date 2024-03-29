<?php 
    $language = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'language');
    $language_data = json_decode($language, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_language">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('language')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_language" <?php if ($privacy_status_data[0]['language'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('language')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <!-- <button type="button" id="hide_language" <?php if ($privacy_status_data[0]['language'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('language')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button> -->
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('language')">
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
                                <span><?php echo translate('mother_tongue')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('language', $language_data[0]['mother_tongue']);?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('language_Known')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id_array('language', $language_data[0]['language']);?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('speak')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id_array('language', $language_data[0]['speak']);?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('read')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id_array('language', $language_data[0]['read']);?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>

    <div id="edit_language" style="display: none">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('language')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('language')"><i class="ion-checkmark" title="Save"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('language')"><i class="ion-close" title="Close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_language" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="mother_tongue" class="text-uppercase c-gray-light"><?php echo translate('mother_tongue')?> *</label>
                        <?php 
                            echo $this->Crud_model->select_html('language', 'mother_tongue', 'name', 'edit', 'form-control form-control-sm selectpicker', $language_data[0]['mother_tongue'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="language" class="text-uppercase c-gray-light"><?php echo translate('language_known')?> </label><br>
                        <?php                           
                            echo $this->Crud_model->select_html('language', 'language', 'name', 'edit', 'demo-cs-multiselect', $language_data[0]['language'], '', '', 'multi');
                        ?>                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="speak" class="text-uppercase c-gray-light"><?php echo translate('speak')?> </label>
                        <?php 
                            echo $this->Crud_model->select_html('language', 'speak', 'name', 'edit', 'demo-cs-multiselect', $language_data[0]['speak'], '', '', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="read" class="text-uppercase c-gray-light"><?php echo translate('read')?> </label>
                        <?php 
                            echo $this->Crud_model->select_html('language', 'read', 'name', 'edit', 'demo-cs-multiselect', $language_data[0]['read'], '', '', 'multi');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>