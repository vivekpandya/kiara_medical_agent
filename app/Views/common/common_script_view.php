<script type="text/javascript" src="<?php echo ROOT_WWW ?>assets/js/jquery-1.7.2.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.4.1.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="<?php echo ROOT_WWW ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo ROOT_WWW ?>assets/js/all.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT_WWW ?>assets/js/base.js"></script>
<script type="text/javascript" src="<?php echo ROOT_WWW ?>assets/plugins/toastr-master/build/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/select2/dist/js/select2.full.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/multiselect/bootstrap-multiselect.js"></script>
<script type="text/javascript">
    var HOST = '<?php echo ROOT_WWW ?>';

    toastr.options = {
        closeButton: true,
        timeOut: 5000,
    };

    $(document).ready(function() {
        setPageTitle();
        alertMsg();
        setTimeout(function() {}, 1000);
    });

    function alertMsg() {
        var alert_message = '<?php echo session()->get('alert_message_toast') ?>';
        var alert_type = '<?php echo session()->get('alert_message_toast_type') ?>';
        if (alert_message != "") {
            showToastMsg(alert_type, alert_message);
            <?php
            session()->set('alert_message_toast', "");
            session()->set('alert_message_toast_type', "");
            ?>
        }
    }

    function setPageTitle() {
        var page_title = '<?php echo DISPLAY_SUPERADMIN_APP_NAME; ?>&nbsp;:&nbsp;<?php echo $page_title; ?>';
        $('#page_title').html(page_title);
    }

    function showToastMsg(typ, msg, duration = 0) {
        toastr.remove();
        if (duration > 0) {
            toastr.options = {
                timeOut: duration, // Duration in milliseconds
                extendedTimeOut: 2000, // Time before it fades out when hovered
                closeButton: true, // Show close button
                progressBar: true // Show progress bar
            };
        }
        if (typ == "warning") {
            toastr.warning(msg);
        } else if (typ == "error") {
            toastr.error(msg);
        } else {
            toastr.success(msg);
        }
    }
    // function expand_form_sign(large_button_element, small_button_element, signature_element) {
    //       //console.log("Expanding signature box:", signature_element);
    //       $("#" + small_button_element).show();
    //       $("#" + large_button_element).hide();
    //       $("#" + signature_element).jSignature('destroy');
    //       $("#" + signature_element).jSignature({ width: 1000,height: 252 });
    //       $("#" + signature_element).css('width','1000px');
    //   }
    function expand_form_sign(large_button_element, small_button_element, signature_element) {
        // Show/hide buttons
        /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING VIVEK AS IT IS USED AT MULTIPLE PLACES*/
        $("#" + small_button_element).show();
        $("#" + large_button_element).hide();

        // Destroy existing signature pad
        $("#" + signature_element).jSignature('destroy');

        // Get screen width
        const screenWidth = window.innerWidth;
        let width, height;

        if (screenWidth <= 768) {
            // Mobile
            width = height = 315;
        } else if (screenWidth > 768 && screenWidth <= 1024) {
            // Tablet
            width = 700;
            height = 300;
        } else {
            // Desktop
            width = 1000;
            height = 252;
        }

        // Re-initialize signature pad
        $("#" + signature_element).jSignature({
            width,
            height
        });

        // Force correct dimensions with CSS
        $("#" + signature_element).css({
            width: width + 'px',
            //height: height + 'px'
        });
    }



    function small_form_sign(large_button_element, small_button_element, signature_element) {
        //console.log("Shrinking signature box:", signature_element);

        /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING VIVEK AS IT IS USED AT MULTIPLE PLACES*/
        $("#" + small_button_element).hide();
        $("#" + large_button_element).show();
        $("#" + signature_element).jSignature('destroy');
        $("#" + signature_element).jSignature({
            width: 250,
            height: 63
        });
        $("#" + signature_element).css('width', '250px');
    }

    function currentSignatureClear(hide_element, show_element, hidden_element, signature_element, date_element = '', sign_liberty = true) {
        /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING VIVEK AS IT IS USED AT MULTIPLE PLACES*/
        $('.' + hide_element).hide();
        $('.' + show_element).show();
        $("#" + signature_element).jSignature('destroy');
        $("#" + signature_element).jSignature({
            width: 250,
            height: 63
        });
        $("#" + signature_element).css('width', '250px');
        if (!sign_liberty) {
            $("#" + signature_element).jSignature("disable");
        }

        $('#' + hidden_element).val('');
        if (date_element != '') {
            $('#' + date_element).val('');
        }
    }

    function addsigndate(id) {
        /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING VIVEK AS IT IS USED AT MULTIPLE PLACES*/
        var existing_date = $("#" + id).val();
        if (existing_date === '') {
            // alert(id);
            var todayDate = '<?php echo date('m/d/Y', strtotime(TODAY_DATE)); ?>';
            //alert(todayDate);
            $("#" + id).val(todayDate);
            $("#" + id).datepicker("setDate", todayDate);
        }
    }

    function checkSignLiberty(select_element, signature_pad_element, signature_pin_element, signature_date_element, large_button_element, small_button_element, clear_button_element, clear_button_class = '') {

        /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING VIVEK AS IT IS USED AT MULTIPLE PLACES*/

        var usr_id = '<?php echo session()->get('user_id'); ?>';

        var caregiver_login = '<?php echo session()->get('caregiver_login'); ?>';

        var selected_user_id = $("#" + select_element).val();

        if (caregiver_login == 'YES')

        {

            selected_user_id = $("#" + select_element + " option:selected").attr('user_id');

        }

        //console.log("caregiver_login",caregiver_login);

        //console.log("selected_user_id",selected_user_id);

        //console.log("usr_id",usr_id);

        if (selected_user_id != usr_id || (selected_user_id == null)) {

            $("#" + signature_pad_element).jSignature("disable");

            $("#" + signature_pin_element).prop('disabled', true);

            $("#" + signature_date_element).prop('readonly', true);

            $('#' + signature_date_element).datepicker('destroy');

            $('#' + large_button_element).hide();

            $('#' + small_button_element).hide();

            $('#' + clear_button_element).hide();

            $('.' + clear_button_class).hide();

            return false;

        } else {

            $("#" + signature_pad_element).jSignature("enable");

            $("#" + signature_pin_element).prop('disabled', false);

            $("#" + signature_date_element).prop('readonly', false);

            $("#" + signature_date_element).datepicker({

                format: "mm/dd/yy",

                changeMonth: true,

                changeYear: true,

                showButtonPanel: true,

                yearRange: "-100:+2",

                selectCurrent: true

            });

            $('#' + large_button_element).show();

            $('#' + small_button_element).hide();

            $('#' + clear_button_element).show();

            $('.' + clear_button_class).show();

            return true;

        }

    }

    function checkSignLibertyCareNote(user_id, signature_pad_element, signature_pin_element, button_element, clear_button_element, required_hidden_element = '', signature_element = '', signature_date_element = '', show_clear = '') {
        var usr_id = '<?php echo session()->get('user_id'); ?>';
        /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING SUJATA AS IT IS USED FOR CARE NOTE*/
        var caregiver_login = '<?php echo session()->get('caregiver_login'); ?>';
        var selected_user_id = $("#" + user_id).val();
        if (caregiver_login == 'YES') {
            selected_user_id = $("#" + user_id + " option:selected").attr('user_id');

        }
        if (selected_user_id != usr_id) {
            $("#" + signature_pad_element).jSignature("disable");
            $("#" + signature_pin_element).prop('disabled', true);
            $("#" + signature_date_element).prop('readonly', true);
            $('#' + signature_date_element).datepicker('destroy');
            $('#' + button_element).hide();
            $('#' + clear_button_element).hide();
            if (required_hidden_element != '') {
                $('#' + required_hidden_element).val('NO');
            }
            if (show_clear === 'Yes') {

                $('#' + clear_button_element).show();
            }
        } else {
            $("#" + signature_pad_element).jSignature("enable");
            $("#" + signature_pin_element).prop('disabled', false);
            $("#" + signature_date_element).prop('readonly', false);
            $("#" + signature_date_element).datepicker({
                format: "mm/dd/yy",
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                yearRange: "-100:+2",
                selectCurrent: true
            });
            $('#' + button_element).show();
            $('#' + clear_button_element).show();
            if (required_hidden_element != '') {
                $('#' + required_hidden_element).val('YES');
            }
            if (signature_element != '') {
                if ($('#' + signature_element).val() != '' && $('#' + signature_element).val() != undefined) {
                    $('#' + button_element).hide();
                }
            }

        }
    }
    function currentSignatureClearCarenote(signature_element, digitalSignexists_hide_element,digitalSignRowshow_element,pin_element,error_element,hidden_element,date_element,SavedSign_element,sign_pin_element,large_box_element,small_box_element,selected_user_id='',ini_type='')
      {
         /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING SUJATA AS IT IS USED FOR CARE NOTE*/
        var usr_id = '<?php echo session()->get('user_id');?>';
        var caregiver_login = '<?php echo session()->get('caregiver_login');?>';
        var selected_user_id1 = $("#"+selected_user_id).val();
        if(caregiver_login == 'YES')
        {
           selected_user_id1 = $("#"+selected_user_id+" option:selected").attr('user_id');
        }

        if (selected_user_id1 != usr_id && caregiver_login != 'YES') {
            $("#" + signature_element).jSignature('disable');
            $('#' + large_box_element).hide();

        } else {
            $("#" + signature_element).jSignature('destroy');
            if(ini_type == 'INITIALS')
            {
                $("#" + signature_element).jSignature({ width: 257,height: 80 });
            }
            else
            {
                $("#" + signature_element).jSignature({ width: 257,height: 80 });
            }
            $("#" + signature_element).css('width','257px');  
            $('#'+large_box_element).show();

        }
        
        $('#'+digitalSignexists_hide_element).hide();
        $('#'+digitalSignRowshow_element).show();
        $('#'+pin_element).val('');
        $('#'+error_element).html('');
       $('#'+hidden_element).val('');
       if(ini_type !== 'INITIALS' && date_element !== ''){
           $('#'+date_element).val('');
       }
        $('#'+SavedSign_element).hide();
        $('#'+sign_pin_element).show();
        $('#'+small_box_element).hide();
        
    }

    function small_form_signcarenote(large_button_element, small_button_element, signature_element, hidden_element) {
        //console.log("Shrinking signature box:", signature_element);

        /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING SUJATA AS IT IS USED FOR CARE NOTE*/

        $("#" + signature_element).jSignature('destroy');
        $("#" + signature_element).jSignature({
            width: 257,
            height: 80
        });
        $("#" + signature_element).css('width', '257px');
        $("#" + small_button_element).hide();
        $("#" + large_button_element).show();
        $('#' + hidden_element).val('');
    }

    function expand_form_signcarenote(large_button_element, small_button_element, signature_element, hidden_element) {
        // Show/hide buttons
        /*IMPORTANT DO NOT MAKE CHANGES WITHOUT INFORMING SUJATA AS IT IS USED AT MULTIPLE PLACES*/
        $("#" + small_button_element).show();
        $("#" + large_button_element).hide();

        // Destroy existing signature pad
        $("#" + signature_element).jSignature('destroy');

        // Get screen width
        const screenWidth = window.innerWidth;
        let width, height;

        if (screenWidth <= 768) {
            // Mobile
            width = height = 315;
        } else if (screenWidth > 768 && screenWidth <= 1024) {
            // Tablet
            width = 700;
            height = 300;
        } else {
            // Desktop
            width = 1000;
            height = 252;
        }

        // Re-initialize signature pad
        $("#" + signature_element).jSignature({
            width,
            height
        });

        // Force correct dimensions with CSS
        $("#" + signature_element).css({
            width: width + 'px',
            //height: height + 'px'
        });
        $('#' + hidden_element).val('');
    }

    function isValid(fieldID1, fieldID2, chk_typ, msg) {
        var validflag = 0;
        if (chk_typ == 'blank') {
            if ($.trim($('#' + fieldID1).val()) == '') {
                validflag = 1;
            }
        }
        if (chk_typ == 'name') {
            var regname = /^[A-Za-z']{3,}$/;
            //var regname = /^[\u0621-\u064AA-Za-z']+( [\u0621-\u064AA-Za-z']+){0,2}$/;
            if (!$.trim($('#' + fieldID1).val()).match(regname)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'nameSpecial') {
            var regname = /^[A-Za-z',.& ]+( [A-Za-z',.& ]+)*$/;
            //var regname = /^[\u0621-\u064AA-Za-z']+( [\u0621-\u064AA-Za-z']+){0,2}$/;
            if (!$.trim($('#' + fieldID1).val()).match(regname)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'nameSpace') {
            var regname = /^[A-Za-z']+( [A-Za-z' ]+)*$/;
            //var regname = /^[\u0621-\u064AA-Za-z']+( [\u0621-\u064AA-Za-z']+){0,2}$/;
            if (!$.trim($('#' + fieldID1).val()).match(regname)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'email') {
            var regemail = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
            if (!$.trim($('#' + fieldID1).val()).match(regemail)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'amt') {
            var regamt = /^\d+(\.\d{1,2})?$/;
            if (!$.trim($('#' + fieldID1).val()).match(regamt)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'postal_code') {
            var postalReg = /^\d{5}$/;;
            //var postalReg = /^[0-9]+$/;
            if (!$.trim($('#' + fieldID1).val()).match(postalReg) || $('#' + fieldID1).val() == '00000') {
                validflag = 1;
            }
        }
        if (chk_typ == 'num') {
            var numReg = /^[0-9]+$/;
            if (!$.trim($('#' + fieldID1).val()).match(numReg)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'pin') {
            var numReg = /^\d{4}$/;
            if (!$.trim($('#' + fieldID1).val()).match(numReg) || $('#' + fieldID1).val() == '0000') {
                validflag = 1;
            }
        }
        if (chk_typ == 'percentage') {
            var numReg = /^(100(\.0{1,2})?|[0-9]{0,2}(\.\d{1,2})?)$/;
            if (!$.trim($('#' + fieldID1).val()).match(numReg)) {
                validflag = 1;
            }
        }

        if (chk_typ == 'website_url') {
            var url_regexp = /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/;
            if (!$.trim($('#' + fieldID1).val()).match(url_regexp)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'phone_num') {
            var phoneNoReg = /^[0-9-]{12}$/;
            //var phoneNoReg = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s.]{0,1}[0-9]{3}[-\s.]{0,1}[0-9]{4}$/;

            if (!$.trim($('#' + fieldID1).val()).match(phoneNoReg)) {
                validflag = 1;
            }

        }
        if (chk_typ == 'phone_num_multiple') {
            var phoneNoReg = /^[+]{0,1}[0-9, ]{6,70}$/;
            //var phoneNoReg = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s.]{0,1}[0-9]{3}[-\s.]{0,1}[0-9]{4}$/;

            if (!$.trim($('#' + fieldID1).val()).match(phoneNoReg)) {
                validflag = 1;
            }

        }
        if (chk_typ == 'password') {
            var passwordReg = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$/;
            if (!$.trim($('#' + fieldID1).val()).match(passwordReg)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'chkpwd') {
            if ($.trim($('#' + fieldID1).val()) != $.trim($('#' + fieldID2).val())) {
                validflag = 1;
            }
        }
        if (chk_typ == 'purchase_order') {
            var poReg = /^[\w]{1,15}$/;
            if (!$.trim($('#' + fieldID1).val()).match(poReg)) {
                validflag = 1;
            }
        }
        if (chk_typ == 'chkbox') {
            var chk_terms = $('.' + fieldID1).is(":checked");
            if (chk_terms == false) {
                validflag = 1;
            }
        }
        if (chk_typ == 'radio_by_name') {
            var ans = $('input[name=' + fieldID1 + ']').is(':checked');
            if (ans == false) {
                validflag = 1;
            }
        }
        if (chk_typ == 'checkbox_by_name') {
            var checkVal = document.getElementsByName(fieldID1 + '[]');
            var actual_val = '';
            for (var i = 0; i < checkVal.length; i++) {
                if (checkVal[i].checked) {
                    actual_val += checkVal[i].value + ",";
                }
            }
            if (actual_val == '') {
                validflag = 1;
            }
        }
        if (chk_typ == 'matrix_checkbox') {
            var checkVal = document.getElementsByName(fieldID1 + '[]');
            var actual_val = '';
            for (var i = 0; i < checkVal.length; i++) {
                if (checkVal[i].checked) {
                    actual_val += checkVal[i].value + ",";
                }
            }
            if (actual_val == '') {
                validflag = 2;
            }
        }
        if (chk_typ == 'matrix_radio') {
            var ans = $('input[name=' + fieldID1 + ']').is(':checked');
            if (ans == false) {
                validflag = 2;
            }
        }

        if (chk_typ == 'image') {
            var img_sel = document.getElementById(fieldID1);
            console.log(img_sel + "==");
            if (img_sel.value.length < 4) {
                validflag = 1;
            }
        }

        if (chk_typ == 'validImagesize') {

            var image = $("#" + fieldID1)[0].files[0].size;
            if (image > 100000) {
                validflag = 1;
            }
        }
        if (chk_typ == 'validImageextension') {
            var image = document.getElementById(fieldID1).value;
            var allowedExtension = ["jpg", "jpeg", "gif", "png", "bmp"];
            var srcChunks = image.split('.');
            var fileExtension = srcChunks[srcChunks.length - 1].toLowerCase();
            var isValidFile = false;
            for (var index in allowedExtension) {
                if (fileExtension === allowedExtension[index]) {
                    isValidFile = true;
                    break;
                }
            }
            if (!isValidFile) {
                validflag = 1;
            }
        }

        if (validflag == 1) {
            $('#p_' + fieldID1).show();
            $('#p_' + fieldID1).html(msg);
            if (fieldID1 != 'bil_activation_date' && fieldID1 != 'ccd_expiry_date')
                $('#' + fieldID1).focus();
            return false;
        } else if (validflag == 2) {
            $('#p_' + fieldID2).show();
            $('#p_' + fieldID2).html(msg);
            $('#' + fieldID1).focus();
            return false;
        } else {
            $('#p_' + fieldID1).hide();
            $('#p_' + fieldID1).html('');
            if (fieldID2 !== "") {
                $('#p_' + fieldID2).hide();
                $('#p_' + fieldID2).html('');
            }
            return true;
        }
    }

    function validImagedimention(fieldID1, callback) {
        var reader = new FileReader();
        var validflag = 0;
        reader.readAsDataURL($("#" + fieldID1)[0].files[0]);
        reader.onload = function(e) {
            var image = new Image();
            image.src = e.target.result;
            image.onload = function() {
                console.log("Img height", this.height);
                console.log("Img width", this.width);
                if (this.height != 100) {
                    validflag = 1;
                }
                if (this.width != 100) {
                    validflag = 1;
                }
                console.log("validflag", validflag);
                callback(validflag)
                return false;
            };

        };
    }

    function getMainContent(rootUrl) {
        showloader();
        $.ajax({
            type: "POST",
            url: '<?php echo ROOT_WWW; ?>' + rootUrl + '',
            //data: "email=" + encodeURIComponent(email) + "&pwd=" + encodeURIComponent(pwd),
            timeout: 100000, //100 secs
            success: function(msg) {
                $('.cls_main_content').html(msg);
                hideloader();
            },
            error: function(request, status, err) {
                hideloader();
            }
        });
    }

    function checkpercentage(pervalue, fieldID1, msg) {

        var val = pervalue;
        if (val.indexOf(',') > -1) {
            val = val.replace(',', '.');
        }
        var num = parseFloat(val);
        var num = num.toFixed(2);
        if (isNaN(num)) {
            $('#p_' + fieldID1).show();
            $('#p_' + fieldID1).html(msg);
            $('#' + fieldID1).focus();
            num = pervalue;
        }
        return num;
    }

    function validImagedimentionCheckIn(fieldID1, callback) {
        var reader = new FileReader();
        var validflag = 0;
        reader.readAsDataURL($("#" + fieldID1)[0].files[0]);
        reader.onload = function(e) {
            var image = new Image();
            image.src = e.target.result;
            if (fieldID1 == 'logo') {
                image.onload = function() {
                    if (this.height != 100) {
                        validflag = 1;
                    }
                    if (this.width != 100) {
                        validflag = 1;
                    }
                    callback(validflag)
                    return false;
                };
            } else {
                image.onload = function() {
                    if (this.height != 100) {
                        validflag = 1;
                    }
                    if (this.width != 150) {
                        validflag = 1;
                    }
                    callback(validflag)
                    return false;
                };
            }
        };
    }

    $(document).ready(function() {
        <?php if (session()->get('user_id') > 0) { ?>
            getMessageCount1();
        <?php } ?>
    });

    function getMessageCount1() {
        $.ajax({
            type: 'POST',
            url: Host + "Release_version_alerts/getAlerts",
            async: false,
            data: 10,
            success: function(response) {
                $('#alertsfrommydb').html(response);
            }
        });
    }

    function handleAjaxResponse(event, xhr, settings) {
        // Your logic to process the AJAX response here
        //console.log("Received AJAX response:", xhr.responseJSON || xhr.responseText);
        // Check if the Content-Type header indicates JSON data
        var contentType = xhr.getResponseHeader("Content-Type");
        var isJsonResponse = contentType && contentType.indexOf("application/json") !== -1;

        if (isJsonResponse) {
            // Response is JSON
            try {
                var jsonResponse = JSON.parse(xhr.responseText);
                if (jsonResponse.status == 401) {
                    // Close all open Bootstrap modals
                    $('.modal').modal('hide');
                    $('#sessionExpired').modal({
                        keyboard: false,
                    }, 'show');
                }
            } catch (error) {
                // console.error("Failed to parse JSON response:", error);
            }
        } else {
            // Response is not JSON (you can handle other types of responses here)
            // console.log("Received non-JSON response:", xhr.responseText);
        }
    }
    $(document).ajaxComplete(handleAjaxResponse);

    function check_uncheck_all(ele) {
        var attribute = $(ele).attr('attr');
        if ($(ele).is(':checked')) {
            var total_checkbox = $('input[attribute=' + attribute + ']').length;
            if (total_checkbox == 0) {
                toastr.error('No logs present to update.', '<h4>Oops</h4>');
                $(ele).attr('checked', false);
                $('#daily_logs_update_btn').hide();
                $('span[attr="log_disp"]').show();
                $('input[attr="log_updt"]').hide();
                return false;
            } else {
                $('input[attribute=' + attribute + ']').attr('checked', true);
                $('#daily_logs_update_btn').show();
                $('span[attr="log_disp"]').hide();
                $('input[attr="log_updt"]').show();
                $('input[id^="updt_in_date_"]').datepicker();
                $('input[id^="updt_out_date_"]').datepicker();

                $('input[id^="updt_in_time_"]').timepicker({
                    timeFormat: 'HH:mm',
                    use24hours: false,
                    showMeridian: true,
                    interval: 60,
                    dynamic: false,
                    dropdown: true,
                    defaultTime: false,
                    scrollbar: true
                });
                $('input[id^="updt_out_time_"]').timepicker({
                    timeFormat: 'HH:mm',
                    use24hours: false,
                    showMeridian: true,
                    interval: 60,
                    dynamic: false,
                    dropdown: true,
                    defaultTime: false,
                    scrollbar: true
                });
            }
        } else {
            $('input[attribute=' + attribute + ']').attr('checked', false);
            $('#daily_logs_update_btn').hide();
            $('span[attr="log_disp"]').show();
            $('input[attr="log_updt"]').hide();
        }
    }

    function check_for_all(ele) {
        var attribute = $(ele).attr('attribute');
        var total_checkbox = $('input[attribute=' + attribute + ']').length;
        var checked_checkbox = $('input[attribute=' + attribute + ']:checked').length;
        if (total_checkbox == checked_checkbox) {
            $('#daily_logs_all').attr('checked', true);
        } else {
            $('#daily_logs_all').attr('checked', false);
        }

        if (checked_checkbox > 0) {
            $('#daily_logs_update_btn').show();
        } else {
            $('#daily_logs_update_btn').hide();
        }

        str_arr = $(ele).attr('id').split('daily_logs_');
        var stream = str_arr[1];
        if ($(ele).is(':checked')) {
            $('#disp_in_date_' + stream).hide();
            $('#updt_in_date_' + stream).show();

            $('#disp_in_time_' + stream).hide();
            $('#updt_in_time_' + stream).show();

            $('#disp_out_date_' + stream).hide();
            $('#updt_out_date_' + stream).show();

            $('#disp_out_time_' + stream).hide();
            $('#updt_out_time_' + stream).show();

            $('input[id^="updt_in_date_"]').datepicker();
            $('input[id^="updt_out_date_"]').datepicker();

            $('input[id^="updt_in_time_"]').timepicker({
                timeFormat: 'HH:mm',
                use24hours: false,
                showMeridian: true,
                interval: 60,
                dynamic: false,
                dropdown: true,
                defaultTime: false,
                scrollbar: true
            });
            $('input[id^="updt_out_time_"]').timepicker({
                timeFormat: 'HH:mm',
                use24hours: false,
                showMeridian: true,
                interval: 60,
                dynamic: false,
                dropdown: true,
                defaultTime: false,
                scrollbar: true
            });
        } else {
            $('#disp_in_date_' + stream).show();
            $('#updt_in_date_' + stream).hide();

            $('#disp_in_time_' + stream).show();
            $('#updt_in_time_' + stream).hide();

            $('#disp_out_date_' + stream).show();
            $('#updt_out_date_' + stream).hide();

            $('#disp_out_time_' + stream).show();
            $('#updt_out_time_' + stream).hide();
        }
    }

    function update_daily_logs_hours(section) {
        var all_valid = true;
        $('input[attribute="daily_logs"]:checked').each(function() {
            var chk_id = $(this).attr('id');
            str_arr = chk_id.split('daily_logs_');
            var part_id = str_arr[1];
            if ($('#updt_in_date_' + part_id).val() == '' || $('#updt_in_time_' + part_id).val() == '' || $('#updt_out_date_' + part_id).val() == '' || $('#updt_out_time_' + part_id).val() == '') {
                all_valid = false;
            }
        });

        if (!all_valid) {
            toastr.error('Date or time are invalid or missing.', '<h4>Oops</h4>');
        } else {
            showloader();
            $.ajax({
                type: "POST",
                url: Host + 'attending-care/update_approval_daily_logs',
                data: $("#approval_daily_logs").serialize(),
                success: function(msg) {
                    if (msg == 'session_timeout') {
                        hideloader();
                        $('#sessionExpired').modal({
                            keyboard: false,
                        }, 'show');
                    } else {
                        if (section == 'approval') {
                            loadApprovalDailyLogsData();
                        } else {
                            loadData();
                        }
                    }
                }
            });
        }
    }
</script>