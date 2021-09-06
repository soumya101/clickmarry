<div id="info_additional_personal_details">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
            <?php echo translate('additional_family_details')?>
        </h3>
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
