
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
                <?php echo translate('Mobile')?>
            </th>
            <th>
                <?php echo translate('contacted')?>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $new_contacted_members = array();
            if(!empty($contacted_members)){
                foreach ($contacted_members as $member) {
                    if ($member->is_closed =='no') {
                        $new_contacted_members[] = $member;
                    }
                }
            }
            if ($new_contacted_members == NULL) {
        ?>
            <tr>
                <td align="center" colspan="7"><?=translate('no_result_found!')?></td>
            </tr>
        <?php
        }
        else{
            // foreach ()
            // print_r($new_contacted_members);
            foreach ($new_contacted_members as $data): ?>
                <?php
                    $member_id = $data->member_id;
                    $image = json_decode($data->profile_image, true);
                    $education_and_career = json_decode($data->education_and_career, true);
                    $present_address = json_decode($data->present_address, true);
                    $language = json_decode($data->language, true);
                    // print_r($array_total_contacts);
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
                                <?=$data->mobile ?>
                    </td>
                    <td>
                        <p>
                        <?php
                            foreach ($array_total_contacts as $total_contact) {
                                if ($total_contact['id'] == $member_id) {
                                    echo (date('d/m/Y H:i:s', $total_contact['time']));
                                }
                            //    print_r($total_contact['time']);
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