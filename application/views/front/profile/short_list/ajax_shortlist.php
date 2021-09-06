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
            <th width="100">
                <?php echo translate('options')?>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $new_express_shortlist_members = array();
            if(!empty($express_shortlist_members)){
                foreach ($express_shortlist_members as $member) {
                    if ($member->is_closed =='no') {
                        $new_express_shortlist_members[] = $member;
                    }
                }
            }
            if ($new_express_shortlist_members == NULL) {
        ?>
            <tr>
                <td align="center" colspan="7"><?=translate('no_result_found!')?></td>
            </tr>
        <?php
        }
        else{
            foreach ($new_express_shortlist_members as $member): ?>
            <?php 
                //$member = $this->db->get_where("member", array("member_id" => $member_id))->result();
                $image = json_decode($member->profile_image, true);
                $basic_info = json_decode($member->basic_info, true);
                $education_and_career = json_decode($member->education_and_career, true);
                $present_address = json_decode($member->present_address, true);
                $language = json_decode($member->language, true);
            ?>
            <tr id="member_<?=$member->member_id?>">
                <td>
                    <a href="<?=base_url()?>home/member_profile/<?php echo $member->member_id;?>" >
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
                    <a href="<?=base_url()?>home/member_profile/<?=$member->member_id?>" style="color: #55595c">
                        <?=$member->first_name." ".$member->last_name?>
                    </a>
                </td>
                <td>
                    <?=(date('Y') - date('Y', $member->date_of_birth))?>
                </td>
                
                <td>
                    <?php if($present_address[0]['country']){ echo $this->Crud_model->get_type_name_by_id('state', $present_address[0]['state']).', '.$this->Crud_model->get_type_name_by_id('country', $present_address[0]['country']);}?>
                </td>
                <td>
                    <?=$this->Crud_model->get_type_name_by_id('education', $education_and_career[0]['highest_education']).' , '. $this->Crud_model->get_type_name_by_id('occupation', $education_and_career[0]['occupation']);?>
                </td>
                <td>
                    <?=$this->Crud_model->get_type_name_by_id('annual_income', $education_and_career[0]['annual_income']);?>
                </td>
                <td>
                    <div class="row pl-2">
                        <?php
                            $interests = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'interest');
                            $interest = json_decode($interests, true);
                            if (in_assoc_array($member->member_id, 'id', $interest)) {
                            ?>
                                <button type="button" id="interest_a_<?=$member->member_id?>" class="btn btn-dark btn-sm btn-icon-only btn-shadow" data-toggle="tooltip" data-placement="top" title="<?=translate('interest_expressed')?>">
                                    <span id="interest_<?=$member->member_id?>"><i class="fa fa-heart"></i></span>
                                </button>
                            <?php
                            }
                            else {
                            ?>
                                <button type="button" id="interest_a_<?=$member->member_id?>" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow" data-toggle="tooltip" data-placement="top" title="<?=translate('express_interest')?>" onclick="return confirm_interest(<?=$member->member_id?>)">
                                    <span id="interest_<?=$member->member_id?>"><i class="fa fa-heart"></i></span>
                                </button>
                            <?php
                            }   
                        ?>
                        <button type="button" id="remove_a_<?=$member->member_id?>" class="btn btn-danger btn-sm btn-icon-only btn-shadow ml-1" data-toggle="tooltip" data-placement="top" title="<?=translate('remove')?>" onclick="return confirm_remove(<?=$member->member_id?>)"><i class="ion-close"></i></button>
                    </div>
                </td>
            </tr>
        <?php endforeach;
        }?>
        </tbody>
    </table>


    <div id="pseudo_pagination" style="display: none;">
    <?= $this->ajax_pagination->create_links();?>
</div>
<script type="text/javascript">
    $('#pagination').html($('#pseudo_pagination').html());
</script>