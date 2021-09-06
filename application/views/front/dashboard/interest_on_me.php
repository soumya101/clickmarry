
<!-- <div class="row">
    <div class="large-12 columns"> -->
        <div class="owl-carousel owl-theme">
            <?php
            // print_r($express_interest_members);
            if ($express_interest_members) {
                foreach ($express_interest_members as $member) {
                    $image_array='';
                    $img_url=base_url();
                    $image = json_decode($member->profile_image, true);
                    $member_name = $member->first_name ." ".$member->last_name;
            ?>
            <?php
            if (file_exists('uploads/profile_image/'.$image[0]['thumb'])) {
            ?>
            <div class="item">
            <a href="<?=base_url()?>home/member_profile/<?= $member->member_id ?>" style="color: #55595c" target="_blank"><img src="<?=base_url()?>uploads/profile_image/<?=$image[0]['thumb']?>"><p class="c-base-1" style="font-size: 13px;"><?=$member_name?></p></a>
            </div>
        <?php } 
        }
    } ?>
        </div>
    <!-- </div>
</div> -->
