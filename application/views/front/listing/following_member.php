<!-- followed member of logined useer -->
<link rel="stylesheet" href="<?php echo base_url() ?>template/front/css/style.css">
<?php 
    $total_followed_list = json_decode($this->Crud_model->get_follow_name_by_id('member', $this->session->userdata('member_id'), 'following_member'), true);
    $count_following_members = json_decode($this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'following_member'), true);

    if (count($total_followed_list) != 0) {
            $followed_members_data = $this->db->from('member')->where_in('member_id', $total_followed_list)->limit($config['per_page'], $para1)->get()->result();
        }
        else {
            $followed_members_data = NULL;
        }
        
    ?>
    
        <?php 
            $new_followed_members_data = array();
            if(!empty($followed_members_data)){
                foreach ($followed_members_data as $member) {
                    if ($member->is_closed =='no') {
                        $new_followed_members_data[] = $member;
                    }
                }
            } 
            // print_r(count($count_following_members));
            if ($new_followed_members_data) { ?>
            <h2 class="heading heading-5 strong-500 mb-3 c-base-1"><?php echo translate('super_like')?></h2>
            <ul id="flexiselDemo3" class="">
            <?php            
            foreach ($new_followed_members_data as $member) {
                // print_r($member->first_name);     
                $image = json_decode($member->profile_image, true);
                $member_name = $member->first_name ." ".$member->last_name;
                $followed_member_id = $member->member_id;
            ?>
        
            <?php
                if (file_exists('uploads/profile_image/'.$image[0]['thumb'])) {
                ?>
                <li><a href="<?=base_url()?>home/member_profile/<?=$followed_member_id?>" style="color: #55595c" target="_blank"><img src="<?=base_url()?>uploads/profile_image/<?=$image[0]['thumb']?>"><p class="c-base-1"><?=$member_name?></p></a></li>
                <?php
                }
                else {
                ?>
                <li><a href="<?=base_url()?>home/member_profile/<?=$followed_member_id?>" style="color: #55595c" target="_blank"><img src="<?=base_url()?>uploads/profile_image/default_image.png"><p class="c-base-1"><?=$member_name?></p></a></li>
            <?php
            }
            ?>    
            <?php }?>
        </ul>  
        <?php } else { if ($count_following_members != 0) { ?>        
            <div class="mb-3" align="center" style="color:green"><i class="fa fa-star sm"></i> <?= translate(count($count_following_members)."_members_has_super_liked_your_profile_to_view_them_be_a_paid_member");?></div>        
        <?php } } ?>
        <script src="<?php echo base_url() ?>template/front/js/jquery.flexisel.js"></script>
        <script type="text/javascript">
            $("#flexiselDemo3").flexisel({
                visibleItems: 6,
                itemsToScroll: 1,         
                autoPlay: {
                    enable: false,
                    interval: 5000,
                    pauseOnHover: true
                }        
            });
        </script>
        
        <div class="clearfix"></div>
        <!-- End of followed logined user -->