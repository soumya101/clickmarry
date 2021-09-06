<?php
$personal_attitude_and_behavior = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'personal_attitude_and_behavior');
$personal_attitude_and_behavior_data = json_decode($personal_attitude_and_behavior, true);
?>
<div class="direct-chat-contacts">
    <ul class="contacts-list">
        <div class="pt-3 pb-2 text-center" style="border-bottom: 1px solid rgba(0, 0, 0, .15); margin: 0; width: 90% !important; margin-left: 5%;">
            <h4 class="card-inner-title c-base-1"><i class="fa fa-users"></i> <?php echo translate('contact_details')?></h4>
        </div>
        <li>Primary Contact: <?=$this->db->get_where('member', array('member_id' => $this->session->userdata('member_id')))->row()->mobile ?></li>
        <li>Alternate Contact: <?=$personal_attitude_and_behavior_data[0]['religious_service']?></li>
        <li>Whom to Contact: <?=$this->Crud_model->get_type_name_by_id('whom_contact', $personal_attitude_and_behavior_data[0]['affection']);?></li>
        <li>Contact Person: <?=$personal_attitude_and_behavior_data[0]['humor']?></li>
        <li>Convenient Time: <?php echo translate('Convenient_time')?></li>
    </ul>
</div>