<div id="info_astronomic_information">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
            <?php echo translate('astronomic_information')?>
        </h3>
    </div>
    <div class="table-full-width">
        <div class="table-full-width">
            <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                <tbody>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('rassi')?></span>
                        </td>
                        <td>
                            <!-- <?=$astronomic_information_data[0]['sun_sign']?> -->
                            <?=$this->Crud_model->get_type_name_by_id('astrology', $astronomic_information_data[0]['sun_sign'],'rassi')?>
                        </td>
                        <td class="td-label">
                            <span><?php echo translate('nakshatra')?></span>
                        </td>
                        <td>
                            <!-- <?=$astronomic_information_data[0]['moon_sign']?> -->
                            <?php echo ((!empty($astronomic_information_data[0]['moon_sign']) and (is_numeric($astronomic_information_data[0]['moon_sign']) )) ? $this->db->get_where('nakshatra',array('nakshatra_id'=>$astronomic_information_data[0]['moon_sign']))->row()->nakshatra_name :'') ?>
                        </td>
                    </tr>
                    <tr>                        
                        <td class="td-label">
                            <span><?php echo translate('city_of_birth')?></span>
                        </td>
                        <td>
                            <?=$astronomic_information_data[0]['city_of_birth']?>
                        </td>
                        <td class="td-label">
                            <span><?php echo translate('Gothram')?></span>
                        </td>
                        <td>
                            <?=$astronomic_information_data[0]['time_of_birth']?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>