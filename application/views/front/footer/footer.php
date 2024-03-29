                        <footer id="footer" class="footer">
                            <div class="footer-top">
                                <div class="container">
                                    <div class="row cols-xs-space cols-sm-space cols-md-space">
                                        <?php
                                            $footer_logo_info = $this->db->get_where('frontend_settings', array('type' => 'footer_logo'))->row()->value;
                                            $footer_logo = json_decode($footer_logo_info, true);
                                            $footer_logo_position = $this->db->get_where('frontend_settings', array('type' => 'footer_logo_position'))->row()->value;
                                            $footer_text = $this->db->get_where('frontend_settings', array('type' => 'footer_text'))->row()->value;
                                            if ($footer_logo_position == 'left') {
                                            ?>
                                                <div class="col-md-3 col-lg-3">
                                                    <div class="col">
                                                        <a class="navbar-brand" href="#">
                                                            <?php
                                                                if (file_exists('uploads/footer_logo/'.$footer_logo[0]['image'])) {
                                                                ?>
                                                                    <img src="<?=base_url()?>uploads/footer_logo/<?=$footer_logo[0]['image']?>" class="img-responsive" width="100%">
                                                                <?php
                                                                }
                                                                else {
                                                                ?>
                                                                    <img src="<?=base_url()?>uploads/footer_logo/default_image.png" class="img-responsive" width="100%">
                                                                <?php
                                                                }
                                                            ?>
                                                        </a>
                                                        <div class="text-center"><small><?=$footer_text?></small></div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        ?>
                                        <div class="col-md-3 col-lg-3 d-none d-lg-block d-md-block">
                                            <div class="col">
                                                <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                                                <?php echo translate('main_menu')?></h4>
                                                <ul class="footer-links">
                                                    <li>
                                                    <a href="<?=base_url()?>home" title="Home">
                                                    <?php echo translate('home')?></a>
                                                    </li>
                                                    <li>
                                                    <a href="<?=base_url()?>home/plans" title="Premium Plans">
                                                    <?php echo translate('premium_plans')?></a>
                                                    </li>
                                                    <li>
                                                    <a href="<?=base_url()?>home/stories" title="Happy Stories">
                                                    <?php echo translate('happy_stories')?></a>
                                                    </li>
                                                    <li>
                                                    <a href="<?=base_url()?>home/contact_us" title="Contact Us">
                                                    <?php echo translate('contact_us')?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 d-none d-lg-block d-md-block">
                                            <div class="col">
                                                <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                                                <?php echo translate('quick_search')?></h4>
                                                <ul class="footer-links">
                                                    <li>
                                                    <a href="<?=base_url()?>home/listing" title="All Members">
                                                    <?php echo translate('all_members')?></a>
                                                    </li>
                                                    <li>
                                                    <a href="<?=base_url()?>home/listing/premium_members" title="Premium Members">
                                                    <?php echo translate('premium_members')?></a>
                                                    </li>
                                                    <li>
                                                    <a href="<?=base_url()?>home/listing/free_members" title="Free Members">
                                                    <?php echo translate('free_members')?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <div class="col">
                                                <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                                                <?php echo translate('useful_links')?></h4>
                                                <ul class="footer-links">
                                                    <li>
                                                    <a href="<?=base_url()?>home/faq" title="FAQ">
                                                    FAQ </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?=base_url()?>home/terms_and_conditions" title="Terms & Conditions">
                                                    <?php echo translate('terms_&_conditions')?></a>
                                                    </li>
                                                    <li>
                                                    <a href="<?=base_url()?>home/privacy_policy" title="Prvacy Policy">
                                                    <?php echo translate('privacy_policy')?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                            if ($footer_logo_position == 'right') {
                                            ?>
                                                <div class="col-md-3 col-lg-3">
                                                    <div class="col">
                                                        <a class="navbar-brand" href="#">
                                                            <?php
                                                                if (file_exists('uploads/footer_logo/'.$footer_logo[0]['image'])) {
                                                                ?>
                                                                    <img src="<?=base_url()?>uploads/footer_logo/<?=$footer_logo[0]['image']?>" class="img-responsive" width="100%">
                                                                <?php
                                                                }
                                                                else {
                                                                ?>
                                                                    <img src="<?=base_url()?>uploads/footer_logo/default_image.png" class="img-responsive" width="100%">
                                                                <?php
                                                                }
                                                            ?>
                                                        </a>
                                                        <div class="text-center"><small><?=$footer_text?></small></div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-bottom py-1">
                                <div class="container">
                                    <div class="row row-cols-xs-spaced flex flex-items-xs-middle">
                                        <div class="col col-sm-7 col-xs-12">
                                            <div class="copyright text-xs-center text-sm-left mt-2">
                                                 <?=translate('copyright')?> &copy; <?=date("Y")?> <a href="<?=base_url()?>" class="c-base-1" target="_blank" title="RKF INFOSERVICES">
                                                <strong class="strong-400"><?=$this->system_name?></strong>
                                                </a> - <?php echo translate('all_rights_reserved')?>
                                            </div>
                                        </div>
                                        <div class="col col-sm-5 col-xs-12">
                                            <div class="copyright text-xs-center text-sm-right mt-2">
                                            <!-- <a href="http://rkfinfoservices.com" class="c-base-1" target="_blank" title="RKF INFOSERVICES"><?=translate('Design_and_developed_by_RKF_INFOSERVICES')?> </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
            <!-- END: st-pusher -->
        </div>
        <!-- END: st-pusher -->
    </div>
    <!-- END: st-container -->
</div>
<!-- END: body-wrap --> 