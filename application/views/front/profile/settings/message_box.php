<div class="card direct-chat direct-chat-warning">
    <div class="card-header with-border">
        <h3 class="card-inner-title pull-left c-base-1">
            <i class="fa fa-comments-o"></i> <span id="msg_box_header"><?php echo translate('edit_contact_number')?></span>
        </h3>
        <div class="pull-right">
            <small id="msg_refresh">
            </small>
        </div>
    </div>
    <form class="form-default" id="setting_form">
    <div class="card-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages" id="msg_body" style="height: 150px">
           <p class="font-dark rad"><input type="radio" name="contact_no" value="primary"> Primary Contact Number </p>
           <p class="font-dark rad"><input type="radio" name="contact_no" value="alternate"> Alternate Contact Number </p>
        </div>
        <!-- Contacts are loaded here -->
    </div>
    <div class="card-footer" style="padding: 8px;">
      
           
            <div class="input-group mob" style="width:45%">
                <input type="tel" pattern="^\d{10}$" id="mobile" name="new_contact" placeholder="Enter Mobile Number" value="" class="form-control mob" style="z-index: 2;" disabled>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-base-1 btn-flat enterer edit_mob" id="edit_mob" style="width: 60px" disabled><?php echo translate('save')?></button>
                </span>
            </div>
            <div class="input-group otp d-none" style="width:45%">
                <input type="text" id="message_text" name="otp_entered" placeholder="Enter OTP" value="" class="form-control" style="z-index: 2;">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-base-1 btn-flat enterer check_otp" id="check_otp" style="width: 80px" ><?php echo translate('Validate')?></button>
                </span>
            </div>
           
    </div>
    </form>
</div>

