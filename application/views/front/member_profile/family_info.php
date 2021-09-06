<div id="info_family_info">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
            <?php echo translate('family_information')?>
        </h3>
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
                            <span><?php echo translate('About_our_Family')?></span>
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