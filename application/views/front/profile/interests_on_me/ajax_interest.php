
    <table class="table table-sm table-striped table-hover table-bordered table-responsive">
        <thead>
        <tr>
            <th>
                <?php echo translate('image')?>
            </th>
            <th>
                <?php echo translate('name')?>
            </th>
            <th>
                <?php echo translate('age')?>
            </th>
            <th>
                <?php echo translate('location')?>
            </th>
            <th>
                <?php echo translate('education_&_occupation')?>
            </th>
            <th>
                <?php echo translate('annual_Income')?>
            </th>
            <th>
                <?php echo translate('status')?>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php 
        // print_r($express_interest_members);
            $new_express_interest_members = array();
            if(!empty($express_interest_members)){
                foreach ($express_interest_members as $member) {
                    if ($member->is_closed =='no') {
                        $new_express_interest_members[] = $member;
                    }
                }
            }
            if ($new_express_interest_members == NULL) {
        ?>
            <tr>
                <td align="center" colspan="7"><?=translate('no_result_found!')?></td>
            </tr>
        <?php
        }
        else{
            foreach ($new_express_interest_members as $data): ?>
                <?php
                    $member_id = $data->member_id;
                    $image = json_decode($data->profile_image, true);
                    $education_and_career = json_decode($data->education_and_career, true);
                    $present_address = json_decode($data->present_address, true);
                    $language = json_decode($data->language, true);
                ?>
                <tr id="member_<?=$member_id?>">
                    <td>
                        <a href="<?=base_url()?>home/member_profile/<?=$member_id?>" target="_blank">
                            <?php
                                if (file_exists('uploads/profile_image/'.$image[0]['thumb'])) {
                                ?>
                                <img src="<?=base_url()?>uploads/profile_image/<?=$image[0]['thumb']?>" alt="" style="height: 50px">
                                <?php
                                }
                                else {
                                ?>
                                <img src="<?=base_url()?>uploads/profile_image/default_image.png" alt="" style="height: 50px">
                            <?php
                            }
                            ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?=base_url()?>home/member_profile/<?=$member_id?>" style="color: #55595c"  target="_blank">
                            <?=$data->first_name." ".$data->last_name?>
                        </a>
                    </td>
                    <td>
                        <?=(date('Y') - date('Y', $data->date_of_birth))?>
                    </td>
                    <td>
                        <?php if($present_address[0]['country']){ echo $this->Crud_model->get_type_name_by_id('state', $present_address[0]['state']).', '.$this->Crud_model->get_type_name_by_id('country', $present_address[0]['country']);}?>
                    </td>
                    <td>
                        <?php if(!empty( $education_and_career[0]['highest_education'])){ ?>    
                        <?=$this->Crud_model->get_type_name_by_id('education', $education_and_career[0]['highest_education']).' , '. $this->Crud_model->get_type_name_by_id('occupation', $education_and_career[0]['occupation']);?>
                        <?php } ?>
                         
                    </td>
                    <td>
                         <?php if(!empty( $education_and_career[0]['annual_income'])){ ?> 
                        <?=$this->Crud_model->get_type_name_by_id('annual_income', $education_and_career[0]['annual_income']);?>
                        <?php } ?>
                    </td>
                    <td>
                        <p>
                        <?php
                            foreach ($array_total_interests as $total_interest) {
                                if ($total_interest['id'] == $member_id) {
                                    if ($total_interest['status'] == 'pending') {
                                    ?>
                                        <button type="button" class="btn btn-sm btn-primary pt-0 pb-0"  onclick="confirm_accept(<?=$total_interest['id']?>)"><?php echo translate('accept')?></button>
                                        <button type="button" class="btn btn-sm btn-danger pt-0 pb-0"   onclick="confirm_reject(<?=$total_interest['id']?>)"><?php echo translate('decline')?></button>
                                        <!-- <span class="badge badge-md badge-pill bg-dark"><?php // echo translate('pending')?></span> -->
                                    <?php
                                    } elseif ($total_interest['status'] == 'accepted') {
                                    ?>
                                        <span class="badge badge-md badge-pill bg-success"><?php echo translate('accepted')?></span>
                                    <?php
                                    } elseif ($total_interest['status'] == 'rejected') {
                                    ?>
                                        <span class="badge badge-md badge-pill bg-danger"><?php echo translate('Declined')?></span>
                                    <?php
                                    }
                                }
                            }
                        ?>        
                        </p>
                    </td>
                </tr>
            <?php endforeach;
            }
            ?>
        </tbody>
    </table>

<div id="pseudo_pagination" style="display: none;">
    <?= $this->ajax_pagination->create_links();?>
</div>
<script type="text/javascript">
    $('#pagination').html($('#pseudo_pagination').html());
</script>