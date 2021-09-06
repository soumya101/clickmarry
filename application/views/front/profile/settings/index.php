<div class="row justify-content-md-center">
<div class="col-md-8  mb-2">

<div class="card-body">
    <div class="row">
       
        <div class="col-md-8 mb-2">
            <!-- DIRECT CHAT -->
            <div id="profile_message_box">
                <?php include 'message_box.php'; ?>
            </div>
            <!--/.direct-chat -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
            <div id="messaging_member_list">
                <?php include 'member_setting.php'; ?>
            </div>
        </div>
   
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function(e) {
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='contact_no']:checked").val();
            if(radioValue!=''){
                $('.mob').prop("disabled", false);
                
            }
        });

        $('#mobile').keyup(function(e) {
        if (validatePhone('mobile')) {
            $('.edit_mob').prop("disabled", false);
        }
        else {
            $('.edit_mob').prop("disabled", true);
        }
    });

    function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /[1-9]{1}[0-9]{9}/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}

     $(".edit_mob").click(function(){
         //alert("fdf");
         $.ajax({
            type: "POST",
            url: "<?=base_url()?>home/change_mobile",
            cache: false,
            data: $('#setting_form').serialize(),
            success: function(response) {
               // alert(response);
                 if(response!=''){
                    $('.otp').removeClass('d-none');
                    $('.mob').addClass('d-none');
                    $('.direct-chat-messages').addClass('d-none');
                 }
                
                }
            });
        });

      $(".check_otp").click(function(){
        // alert("check_otp");
         $.ajax({
            type: "POST",
            url: "<?=base_url()?>home/validate_otp_change_mobile",
            cache: false,
            data: $('#setting_form').serialize(),
            success: function(response) {
               
                  if(response.trim()=="P"){
                      alert("Your Primary Contact number updated Successfully!");
                      location.reload();
                  };
                  if(response.trim()=="A"){
                      alert("Your Alternate Contact number updated Successfully!");
                      location.reload();
                  };
                  if(response.trim()=="I"){
                      alert("Invalid OTP Entered!");
                    //  location.reload();
                  };
             }
                
                
            });
        });  

    });
</script>