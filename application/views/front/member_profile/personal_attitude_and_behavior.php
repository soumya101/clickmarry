<div id="info_personal_attitude_and_behavior">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
            <?php echo translate('personal_attitude_and_behavior');?>
        </h3>
    </div>
    <div class="table-full-width">
        <div class="table-full-width">
            <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                <tbody>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('Whom_to_contact');?></span>
                        </td>
                        <td>
                            <!-- <?=$personal_attitude_and_behavior_data[0]['affection']?> -->
                            <?=$this->Crud_model->get_type_name_by_id('whom_contact', $personal_attitude_and_behavior_data[0]['affection']);?>
                        </td>
                        <td class="td-label">
                            <span><?php echo translate('contact_person_name');?></span>
                        </td>
                        <td>
                            <?=$personal_attitude_and_behavior_data[0]['humor']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('Convenient_time');?></span>
                        </td>
                        <td>
                            <?=$personal_attitude_and_behavior_data[0]['political_view']?>
                        </td>
                        <td class="td-label">
                            <span><?php echo translate('Alternet_mobile_No');?></span>
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