<style>
    @media (max-width: 576px) {
        .listing-image {
            height: 330px !important;
        }
    }

</style>
<section class="page-title page-title--style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h2 class="heading heading-3 strong-400 mb-0"><?php echo translate('active_members')?></h2>
            </div>
        </div>
    </div>
</section>

<section class="slice sct-color-1">
<div class="container"> 
<div class="row">    
    <div class="container">   
        <div class="row">
            <div class="col-lg-12 d-none d-sm-block">
            
            <?php 
                include_once'following_member.php';
                ?> 
            </div>
			<?php  $advance_search_position = $this->db->get_where('frontend_settings', array('type' => 'advance_search_position'))->row()->value; ?>            
            <?php if($advance_search_position=='left'){
                include_once'filter.php';       
            ?>     

            <div class="col-lg-8">                         

                <input type="hidden" id="member_type" value="<?php if(!empty($member_type)){echo $member_type;}?>">
                <div class="block-wrapper" id="result">
                    <!-- Loads List Data with Ajax Pagination -->
                </div>
                <div id="pagination" style="float: right;">
                    <!-- Loads Ajax Pagination Links -->
                </div>
            </div>
            <?php }else{ ?>
             <div class="col-lg-8">
               
                <input type="hidden" id="member_type" value="<?php if(!empty($member_type)){echo $member_type;}?>">
                <div class="block-wrapper" id="result">
                    <!-- Loads List Data with Ajax Pagination -->
                </div>
                <div id="pagination" style="float: right;">
                    <!-- Loads Ajax Pagination Links -->
                </div>
            </div>
            <?php include_once'filter.php'; } ?>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>
<script>
    $(document).ready(function(){
        $(".filter_aged_from").change(function(){
           // alert("dd");
            var from = parseInt($(".filter_aged_from").val());
            var to = parseInt($(".filter_aged_to").val());
            if (to < from) {
                var to = $(".filter_aged_to").val(from);
            }
        });
        $(".filter_aged_to").change(function(){
            var from = parseInt($(".filter_aged_from").val());
            var to = parseInt($(".filter_aged_to").val());
            if (to < from) {
                var to = $(".filter_aged_to").val(from);
            }
        });


         $(".min_height").change(function(){
           // alert("dd");
            var from = parseInt($(".min_height").val());
            var to = parseInt($(".max_height").val());
            if (to < from) {
                var to = $(".max_height").val(from);
            }
        });
        $(".max_height").change(function(){
            var from = parseInt($(".min_height").val());
            var to = parseInt($(".max_height").val());
            if (to < from) {
                var to = $(".max_height").val(from);
            }
        });


        $(".min_income").change(function(){
           // alert("dd");
            var from = parseInt($(".min_income").val());
            var to = parseInt($(".max_income").val());
            if (to < from) {
                var to = $(".max_income").val(from);
            }
        });
        $(".max_income").change(function(){
            var from = parseInt($(".min_income").val());
            var to = parseInt($(".max_income").val());
            if (to < from) {
                var to = $(".max_income").val(from);
            }
        });

    });

     $('.demo-cs-multiselect-optgroups').multiselect(
            {                
                enableClickableOptGroups: true,
                maxHeight: 400 ,  
                numberDisplayed: 1,
            }                           
    );
</script>
<script>
    $(document).ready(function(){
        $(".height_mask").inputmask({
            mask: "9.99",
            greedy: false,
            definitions: {
                '*': {
                    validator: "[0-9]"
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        var home_search = "<?=$home_search?>";
        var home_religion = "<?=$home_religion?>";

        var home_caste = "<?=$home_caste?>";
        var home_sub_caste = "<?=$home_sub_caste?>";
        if (home_caste != null) {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_caste/caste/religion_id/"+home_religion+"/"+home_caste, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {

                    $(".s_caste").html(data);
                    $("#sub_caste").css("display", "none");

                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        if (home_sub_caste != null) {

             $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_sub_caste/sub_caste/caste_id/"+home_caste+"/"+home_sub_caste, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,

                success: function (data) {

                    if(data == false ){

                       $("#sub_caste").css("display", "none");
                    } else {
                      $(".s_sub_caste").html(data);
                       $("#sub_caste").css("display", "block");
                    };
               },
                error: function(e) {
                    console.log(e)
                }
            });
        }

        // country_advance_search();
        if (home_search == "false") {
            filter_members('0');
        }
        if (home_search == "true") {
            filter_members('0', 'search');
        }
     

    });

    function filter_members(page, type){
    //    alert(type);
        if (type == 'search')
        {
            var url = '<?php echo base_url(); ?>home/ajax_member_list/'+page+'/'+type;
        }
        else {
            var member_type = "";
            if ($("#member_type").val() != "") {
                member_type = $("#member_type").val();
            }
            // alert($("#member_type").val());
            // alert(page);
            //var url = form.attr('action')+page+'/';
            var url = '<?php echo base_url(); ?>home/ajax_member_list/'+page+'/'+member_type;
        }
        var form = $('#filter_form');
        var place = $('#result');
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);	
        if (!isMobile) {
            $(".btn-back-to-top").click();
        }
        
        $.ajax({
            url: url, // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(), // serialize form data
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
                place.html("");
                place.html("<div class='text-center pt-5 pb-5' id='payment_loader'><i class='fa fa-refresh fa-5x fa-spin'></i><p>Please Wait...</p></div>").fadeIn();
            },
            success: function(data) {
                // var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                // if (width <= 768) {
                //     $(".size-sm").css("display", "none");
                //     $(".size-sm-btn").css("display", "block");
                // }
                
                setTimeout(function(){
                    place.html(data);// fade in response data
                }, 20);
                setTimeout(function(){
                    place.fadeIn(); // fade in response data
                }, 30);
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function adv_search(){
        $(".size-sm").css("display", "block");
        $(".size-sm-btn").css("display", "none");
    }

    $(".s_country").change(function(){
        var country_id = $(".s_country").val();
        //alert(country_id);
        if (country_id == "") {
            $(".s_state").html("<option value=''><?php echo translate('choose_a_country_first')?></option>");
            $(".s_city").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id/state/country_id/"+country_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".s_state").html(data);
                    $(".s_city").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });

    $(".s_state").change(function(){
        var state_id = $(".s_state").val();
        if (state_id == "") {
            $(".s_city").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id/city/state_id/"+state_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".s_city").html(data);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });

    $(".s_religion").change(function(){
        var religion_id = $(".s_religion").val();
        if (religion_id == "") {
            $(".s_caste").html("<option value=''><?php echo translate('choose_a_religion_first')?></option>");
            $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_caste/caste/religion_id/"+religion_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {

                    $(".s_caste").html(data);
                    $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });

    $(".s_caste").change(function(){
        var caste_id = $(".s_caste").val();
        if (caste_id == "") {
            $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_sub_caste/sub_caste/caste_id/"+caste_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function (data) {
                    if(data == false ){
                        $(".s_sub_caste").html("<option value=''><?php echo translate('none')?></option>");
                    } else {
                        $(".s_sub_caste").html(data);
                    };
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });
   
    function checkValue(value,arr){
        var status = 'No'; 
        for(var i=0; i<arr.length; i++){
            var name = arr[i];
            if(name == value){
            status = 'Yes';
            break;
            }
        }

    return status;
    }

    function check_select_any(optionname){
          var deselected='No';
          $('option:selected', $(optionname)).each(function(element) {
               //alert($(this).val()); 
               if(deselected=='Yes'){
               //if($(this).val())
               $(this).removeAttr('selected').prop('selected', false);
               }
               if($(this).val()==0){
                deselected='Yes';  
               }
            });
            $(optionname).multiselect('refresh');
           
    }

    $(".country_select").change(function(){        
        country_advance_search();
    });

    function country_advance_search(){
        var country_ids = $(".country_select").val();
        
        if (country_ids != null){
            // alert(country_ids);
            // console.log(country_ids);
                if ((checkValue(0 ,country_ids)=='Yes')) {            
                    $(".state_select").multiselect('rebuild');
                    
                } else {
                    var country_ids = $(".country_select").val();
                    $.ajax({
                        url: "<?=base_url()?>home/get_advance_filteration_by_id_country_array/state/country_id/", // form action url
                        type: 'POST', // form submit method get/post
                        data:{ids:country_ids},
                        dataType: 'html', // request type html/json/xml
                        cache       : false,
                        //contentType : false,
                    // processData : false,
                        success: function(data) {
                            $(".state_select").html(data);
                            $(".state_select").multiselect('rebuild');
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                }
        }else{
            $(".country_select").multiselect('deselectAll', false);
            $(".country_select").multiselect('refresh');
        }
    }
</script>

<style>
    /* xs */
    /* .size-sm {
        display: none;
    }
    .size-sm-btn {
        display: block;
    } */
    /* sm */
    /* @media (min-width: 768px) {
        .size-sm {
            display: none;
        }
        .size-sm-btn {
            display: block;
        }
    } */
    /* md */
    /* @media (min-width: 992px) {
        .size-sm {
            display: block;
        }
        .size-sm-btn {
            display: none;
        }
    } */
    /* lg */
    /* @media (min-width: 1200px) {
        .size-sm {
            display: block;
        }
        .size-sm-btn {
            display: none;
        }
    } */


</style>
