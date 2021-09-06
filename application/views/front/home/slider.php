<?php
    $home_slider_image = $this->db->get_where('frontend_settings', array('type' => 'home_slider_image'))->row()->value;
    $home_searching_heading = $this->db->get_where('frontend_settings', array('type' => 'home_searching_heading'))->row()->value;

    $slider_image = json_decode($home_slider_image, true);

    // for slider dynamic margin
    $found = 0;
    if ($this->db->get_where('frontend_settings', array('type' => 'spiritual_and_social_background'))->row()->value != "yes") { $found++; }
    if ($this->db->get_where('frontend_settings', array('type' => 'language'))->row()->value != "yes") { $found++; };
?>
<style>
    @media (max-width: 576px) {
        .outer-search {
            top: auto !important; bottom: 0px; margin-left: 0px !important;
        }
        .btn-search {
            margin-top: 0px !important;
        }
    }
    @media (min-width: 567px) and (max-width: 991px) {
        .outer-search {
            position: absolute; top: auto !important; bottom: 0px !important; z-index: 1;<?php if ($found == 1) {?>margin-left: -25px !important;<?php } elseif ($found == 2) { ?> margin-left: 40px !important;<?php } else { ?> margin-left: -25px !important;<?php } ?>
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .outer-search {
            position: absolute; top: 45% !important; z-index: 1;<?php if ($found == 1) {?>margin-left: 8.5% !important;<?php } elseif ($found == 2) { ?> margin-left: 15% !important;<?php } else { ?> margin-left: 1.5% !important;<?php } ?>
        }
    }
    .s-search label {
        white-space: nowrap;
    }
    .outer-search {
        position: absolute; top: 45%; z-index: 1;<?php if ($found == 1) {?>margin-left: 165px;<?php } elseif ($found == 2) { ?> margin-left: 240px;<?php } else { ?> margin-left: 95px;<?php } ?>
    }
    .btn-search {
        border-radius: 3px !important;
    }
</style>
<div class="col-lg-12">
    <div style="position: relative;">
        <div class="swiper-js-container background-image-holder">
            <div class="swiper-container" data-swiper-autoplay="true" data-swiper-effect="coverflow" data-swiper-items="1" data-swiper-space-between="0">
                <div class="swiper-wrapper">
                    <!-- Slide -->
                    <?php foreach ($slider_image as $image): ?>
                        <div class="swiper-slide" data-swiper-autoplay="10000">
                            <div class="slice px-3 holder-item holder-item-light has-bg-cover bg-size-cover same-height" data-same-height="#div_properties_search" style="height: 650px; background-size: cover; background-position: center; background-image: url(<?=base_url()?>uploads/home_page/slider_image/<?=$image['img']?>); background-position: bottom bottom;">
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button swiper-button-next">
                </div>
                <div class="swiper-button swiper-button-prev">
                </div>
            </div>
        </div>
        
</div>