<?php 
    $astronomic_information = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'astronomic_information');
    $astronomic_information_data = json_decode($astronomic_information, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_astronomic_information">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('astrological_information')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_astronomic_information" <?php if ($privacy_status_data[0]['astronomic_information'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('astronomic_information')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <!-- <button type="button" id="hide_astronomic_information" <?php if ($privacy_status_data[0]['astronomic_information'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('astronomic_information')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button> -->
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('astronomic_information')">
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
                                <span><?php echo translate('raasi')?></span>
                            </td>
                            <td>
                                <!-- <?=$astronomic_information_data[0]['sun_sign']?> -->
                                <?=$this->Crud_model->get_type_name_by_id('astrology', $astronomic_information_data[0]['sun_sign'],'rassi')?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('nakshatra')?></span>
                            </td>
                            <td>
                                <?php echo (!empty($astronomic_information_data[0]['moon_sign']) ? $this->db->get_where('nakshatra',array('nakshatra_id'=>$astronomic_information_data[0]['moon_sign']))->row()->nakshatra_name :'') ?>
                                <!-- <?=$astronomic_information_data[0]['moon_sign']?> -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td class="td-label">
                                <span><?php echo translate('Gothram')?></span>
                            </td>
                            <td>
                                <?=$astronomic_information_data[0]['time_of_birth']?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('city_of_birth')?></span>
                            </td>
                            <td>
                                <?=$astronomic_information_data[0]['city_of_birth']?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_astronomic_information" style="display: none;">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('astrological_information')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('astronomic_information')"><i class="ion-checkmark" title="Save"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('astronomic_information')"><i class="ion-close" title="Close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_astronomic_information" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="sun_sign" class="text-uppercase c-gray-light"><?php echo translate('raasi')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="sun_sign" value="<?=$astronomic_information_data[0]['sun_sign']?>"> -->
                        <?php 
                            echo $this->Crud_model->select_html('astrology', 'sun_sign', 'rassi', 'edit', 'form-control form-control-sm selectpicker present_sun_sign_edit', $astronomic_information_data[0]['sun_sign'], '', '', '');
                             ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="moon_sign" class="text-uppercase c-gray-light"><?php echo translate('nakshatra')?> </label>
                        <!-- <input type="text" class="form-control no-resize" name="moon_sign" value="<?=$astronomic_information_data[0]['moon_sign']?>"> -->
                        <?php
                            if (!empty($astronomic_information_data[0]['sun_sign'])) {
                                echo $this->Crud_model->select_html('nakshatra', 'moon_sign', 'nakshatra_name', 'edit', 'form-control form-control-sm selectpicker present_moon_sign_edit', $astronomic_information_data[0]['moon_sign'], 'astro_id', $astronomic_information_data[0]['sun_sign'], '');   
                            } else {
                            ?>
                                <select class="form-control form-control-sm selectpicker present_moon_sign_edit" name="moon_sign">
                                    <option value=""><?php echo translate('choose_a_rassi_first')?></option>
                                </select>
                            <?php
                            }
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="time_of_birth" class="text-uppercase c-gray-light"><?php echo translate('Gothram')?></label>
                        <input type="text" class="form-control no-resize" name="time_of_birth" value="<?=$astronomic_information_data[0]['time_of_birth']?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="city_of_birth" class="text-uppercase c-gray-light"><?php echo translate('city_of_birth')?></label>
                        <input type="text" class="form-control no-resize" name="city_of_birth" value="<?=$astronomic_information_data[0]['city_of_birth']?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
   $(".present_sun_sign_edit").change(function(){
        var astro_id = $(".present_sun_sign_edit").val();
        if (astro_id == "") {
            $(".present_moon_sign_edit").html("<option value=''><?php echo translate('choose_a_rassi_first')?></option>");
           
        } else {
            //alert(astro_id);
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_caste/nakshatra/astro_id/"+astro_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".present_moon_sign_edit").html(data);
                   // $(".present_sub_caste_edit").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });
</script>