
<!-- <div class="row">
    <div class="large-12 columns"> -->
    <div class="owl-carousel owl-theme">
    <?php 
    // print_r(count($get_all_members));
    // $get_all_members_reverse = array_reverse($get_all_members);
    if ($get_all_members) {
        foreach ($get_all_members as $member) {
            $image_array='';
            $img_url=base_url();
            $image = json_decode($member->profile_image, true);
            $member_name = $member->first_name ." ".$member->last_name;
           
    ?>
     <?php
        if (file_exists('uploads/profile_image/'.$image[0]['thumb'])) {
        ?>
            <div class="item" id="member_id">
            <a href="<?=base_url()?>home/member_profile/<?= $member->member_id ?>" style="color: #55595c" target="_blank"><img src="<?=base_url()?>uploads/profile_image/<?=$image[0]['thumb']?>"><p class="c-base-1" style="font-size: 13px;"><?=$member_name?></p></a>
            </div>  
    <?php }?>
        <?php }
    } ?>
    </div>
    
    <!-- </div>
</div> -->