<div id="info_introduction">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
        <?php echo translate('About')?> <?=($this->Crud_model->get_type_name_by_id('gender', $get_member[0]->gender)== 'Male' ? "Groom's " :"Bride's ")?>
            
        </h3>
    </div>
    <div class="table-full-width">
        <div class="table-full-width">
            <table class="table table-profile table-responsive table-slick">
                <tbody>
                    <tr>
                        <td class="">
                            <?=nl2br($get_member[0]->introduction)?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>