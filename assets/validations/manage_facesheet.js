var ManageFacesheet = function () {
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z,"'"," ",#/-]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("alphSpace", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Only alphabetical characters");

    $.validator.addMethod("alphanumber", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s0-9\w(\w)\w,\w-\w'\w#\w/]+$/);
    }, "Only alphabetical characters");
    
    // File size validation method using MAX_FILE_SIZE constant
    $.validator.addMethod("fileSize", function(value, element) {
        if (this.optional(element)) {
            return true;
        }
        var file = element.files[0];
        if (file && file.size) {
            // MAX_FILE_SIZE is in KB, convert to bytes for comparison
            var maxSize = 25600 * 1024; // 25.6 MB in bytes
            return file.size <= maxSize;
        }
        return true;
    }, "File size must be less than 25.6 MB");
    var handleFacesheet = function () {
        $('#edit_client_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                cli_name:{
                  required: true,
                  alphanumber : true
                },
                cli_dob_show:{
                  required: function(){($("#cli_dob").val() != "" && $("#cli_dob").val() != "0000-00-00")}
                },
                cli_material_status:{
                  required: true
                },
                cli_email: {
                    email: true
                },
                cli_security_show: {
                    minlength: '11',
                    maxlength: '11'
                },
                cli_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                cli_cell_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                cli_medical_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                cli_dcc_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                },
                cli_mem_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                },
                cli_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                },
                cli_zip_plus_4: {
                    digits: true,
                    minlength: '4',
                    maxlength: '4'
                },
                
                cli_signature_pin: {
                    required: function(){return $('#is_sign_btn_clicked').val() != ""}
                },
                cli_mltss_manager_ext: {
                    digits: true,
                    minlength: '0',
                    maxlength: '6'
                },
                cli_timecard_pin:{
                    
                    remote: 
                    {
                      url: Host + "clients/check_duplicate_timecard_pin",
                      type: "post",
                      data:
                      {
                          cli_id: function()
                          {
                              return $('#cli_id').val();
                          }
                      }
                    },
                    digits: true,
                    minlength: '6',
                    maxlength: '6'
                },
                cli_ss_img: {
                    fileSize: true
                },
                cli_photo_id: {
                    fileSize: true
                },
                cli_medicaid_img: {
                    fileSize: true
                }
            }, messages: {
                cli_name:{
                  required: "Client Name is required"  
                },
                cli_dob_show:{
                  required: "Date of Birth is required"  
                },
                cli_material_status:{
                  required: "Marital Status is required"  
                },
                cli_email: {
                    email: "Email is invalid"
                },
                cli_security_show: {
                    minlength: "Security Number must be of 9 digits e.g. 999-99-9999",
                    maxlength: "Security Number must be of 9 digits e.g. 999-99-9999"
                },
                cli_phone: {
                    usPhone: "Phone Number must be of 10 digits e.g. 999-99-9999",
                    minlength: "Phone Number must be of 10 digits e.g. 999-99-9999",
                    maxlength: "Phone Number must be of 10 digits e.g. 999-99-9999"
                },
                cli_cell_phone: {
                    usPhone: "Phone Number must be of 10 digits e.g. 999-99-9999",
                    minlength: "Phone Number must be of 10 digits e.g. 999-99-9999",
                    maxlength: "Phone Number must be of 10 digits e.g. 999-99-9999"
                },
                cli_medical_phone: {
                    usPhone: "Phone Number must be of 10 digits e.g. 999-99-9999",
                    minlength: "Phone Number must be of 10 digits e.g. 999-99-9999",
                    maxlength: "Phone Number must be of 10 digits e.g. 999-99-9999"
                },
                cli_dcc_zip: {
                    digits: "Zip must be of 5 digits",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                },
                cli_mem_zip: {
                    digits: "Zip must be of 5 digits",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                },
                cli_zip: {
                    digits: "Zip must be of 5 digits",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                },
                cli_zip_plus_4: {
                    digits: "Zip plus must be of 5 digits",
                    minlength: "Zip plus must be of 4 digits",
                    maxlength: "Zip plus must be of 4 digits"
                },
                cli_signature_pin: {
                    required: "Please Enter Signature PIN"
                },
                cli_mltss_manager_ext: {
                    digits: "Extention should be numbers only.",
                    minlength: "Extention must be of minimum 1 digit",
                    maxlength: "Extention must be of maximum 6 digit"
                },
                cli_timecard_pin: {
                    
                    remote: "Time And Attendance PIN already exists",
                    digits: "Entered Time And Attendance PIN is invalid",
                    minlength: "Time And Attendance PIN must be of 6 digits",
                    maxlength: "Time And Attendance PIN must be of 6 digits"
                },
                cli_ss_img: {
                    fileSize: "Social Security image file size must be less than 25.6 MB"
                },
                cli_photo_id: {
                    fileSize: "Photo ID image file size must be less than 25.6 MB"
                },
                cli_medicaid_img: {
                    fileSize: "Medicaid image file size must be less than 25.6 MB"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.edit_client_form')).hide();
                $('.alert-error', $('.edit_client_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.input-append').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.input-append').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
            },
            submitHandler: function (form) {
                if (!$(form).valid()) {
                    showToastMsg("error", "Please fill all the required fields");
                    return false;
                }
                var cliId = $('#cli_id').length ? $.trim($('#cli_id').val()) : '';
                if (cliId === '' || cliId === '0') {
                    var payload = {
                        cli_id: cliId || '0',
                        cli_first_name: $('#cli_first_name').val(),
                        cli_last_name: $('#cli_last_name').val(),
                        cli_dob: $('#cli_dob_date').val() || $('#cli_dob').val(),
                        cli_security: $('input[name="cli_security"]').val()
                    };
                    $.ajax({
                        type: 'POST',
                        url: Host + 'clients/check_duplicate_client',
                        data: payload,
                        success: function (resp) {
                            if ($.trim(resp) == 'true') {
                                $('#duplicateClientCancel').off('click.dup').on('click.dup', function(){
                                    $('#duplicateClientModal').modal('hide');
                                });
                                $('#duplicateClientConfirm').off('click.dup').on('click.dup', function(){
                                    $('#duplicateClientModal').modal('hide');
                                    $('#bypass_duplicate_check').val('1');
                                    setTimeout(function () { form.submit(); }, 200);
                                });
                                $('#duplicateClientModal').modal({backdrop: 'static', keyboard: false}).modal('show');
                            } else {
                                setTimeout(function () { form.submit(); }, 200);
                            }
                        }
                    });
                } else {
                    setTimeout(function () { form.submit(); }, 200);
                }
            }
        });

        $('.edit_client_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.edit_client_form').validate().form()) {
                    setTimeout(function () {
                        form.submit();
                    }, 1000);
                }
                else {
                    showToastMsg("error", "Please fill all the required fields");
                    return false;
                }
            }
        });
    }
    var handleContact = function () {
        $('.manage_contact_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                emc_phone1: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                emc_phone2: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                emc_email: {
                    required: true,
                    email: true,
                    remote: {
                    param: {
                        url: Host + "/user/checkUserName",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#emc_email").val();
                            },
                            user_id: function() {
                                return $("#caregiver_user_id").val(); // hidden field
                            }
                        }
                    },
                    depends: function() {
                        return $("input[name='existing_user']:checked").val() === "No";
                    }
                }
                },
                emc_ext_day_phone: {
                    digits: true,
                    minlength: '0',
                    maxlength: '6'
                },
                emc_ext_eve_phone: {
                    digits: true,
                    minlength: '0',
                    maxlength: '6'
                },
                usr_password: {
                    required: {
                        depends: function() {
                            return $("input[name='existing_user']:checked").val() === "No";
                        }
                    }
                },
                usr_password_confirm: {
                    required: {
                        depends: function() {
                            return $("input[name='existing_user']:checked").val() === "No";
                        }
                    },
                    equalTo: "#usr_password"
                },
                payment_frequency: {
                    required: {
                        depends: function() {
                            return $("input[name='existing_user']:checked").val() === "No";
                        }
                    }
                },
                unit: {
                    required: {
                        depends: function() {
                            return $("input[name='existing_user']:checked").val() === "No";
                        }
                    }
                },
                unit_type: {
                    required: {
                        depends: function() {
                            return $("input[name='existing_user']:checked").val() === "No";
                        }
                    }
                },
                unit_price: {
                    required: {
                        depends: function() {
                            return $("input[name='existing_user']:checked").val() === "No";
                        }
                    }
                },
            }, messages: {
                usr_password: {
                    required: "Password is required for new users"
                },
                usr_password_confirm: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                emc_phone1: {
                    usPhone: "Phone Number is invalid",
                    minlength: "Phone Number must be of 10 digits",
                    maxlength: "Phone Number must be of 10 digits"
                },
                emc_phone2: {
                    usPhone: "Phone Number is invalid",
                    minlength: "Phone Number must be of 10 digits",
                    maxlength: "Phone Number must be of 10 digits"
                },
                emc_email: {
                    required: "Email must be required",
                    email: "Email is invalid",
                    remote: "This email is already in use."
                },
                emc_ext_day_phone: {
                    digits: "Extention should be numbers only.",
                    minlength: "Extention must be of minimum 1 digit",
                    maxlength: "Extention must be of maximum 6 digit"
                },
                emc_ext_eve_phone: {
                    digits: "Extention should be numbers only.",
                    minlength: "Extention must be of minimum 1 digit",
                    maxlength: "Extention must be of maximum 6 digit"
                },
                payment_frequency: {
                    required: "Payment frequency is required"
                },
                unit: {
                    required: "Unit is required"
                },
                unit_type: {
                    required: "Unit type is required"
                },
                unit_price: {
                    required: "Unit price is required"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_contact_form')).hide();
                $('.alert-error', $('.manage_contact_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.input-append').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.input-append').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
            },
            submitHandler: function (form) {
                setTimeout(function () {

                    /*check priority already assign or not*/

                    
                    /*Validate caremanager user*/

                    var contact_type = $('#emc_contact_type').val();
                    var manager = "General";
                    if(contact_type == "Care Manager"){
                        var manager = $("#emc_caremanager_user").val();
                        if(manager == ""){
                            showToastMsg("error", "Please select care manager user");                            
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: Host + "clients/check_assign_priority_contact",
                                data: $('.manage_contact_form').serialize(),
                                success: function (data) {
                                    if (data == 1) {
                                        showToastMsg("error", "Selected priority already assign to someone.");
                                    }else{
                                        $.ajax({
                                            type: 'POST',
                                            url: Host + "clients/savecontacts",
                                            data: $('.manage_contact_form').serialize(),
                                            success: function (data) {
                                                if (data == "success") {
                                                    $('#manageEmergencyContent').modal('hide');
                                                    cntload(1);
                                                    if ($('#emc_id').val() > 0) {
                                                        showToastMsg("success", "Data updated successfully");
                                                    } else {
                                                        showToastMsg("success", "Data added successfully");
                                                    }
                                                }
                                            }
                                        });
                                    }
                                }
                            });
                            /*$.ajax({
                                type: 'POST',
                                url: Host + "clients/savecontacts",
                                data: $('.manage_contact_form').serialize(),
                                success: function (data) {
                                    if (data == "success") {
                                        $('#manageEmergencyContent').modal('hide');
                                        cntload();
                                        if ($('#emc_id').val() > 0) {
                                            showToastMsg("success", "Data updated successfully");
                                        } else {
                                            showToastMsg("success", "Data added successfully");
                                        }
                                    }
                                }
                            });*/
                        }
                    }else if(contact_type == "Care Giver"){

                        /*Validate caregiver user*/

                        var manager = $("#emc_caregiver_user").val();
                        var existing_user = $("input[name='existing_user']:checked").val();
                        
                        if(manager == "" && existing_user == 'Yes'){
                            showToastMsg("error", "Please select care giver user");
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: Host + "clients/check_assign_caregiver_user",
                                data: $('.manage_contact_form').serialize(),
                                success: function (data) {
                                    if (data == "1") {
                                        showToastMsg("error", "Selected user already assign to someone.");
                                    }else{
                                        $.ajax({
                                            type: 'POST',
                                            url: Host + "clients/check_assign_priority_contact",
                                            data: $('.manage_contact_form').serialize(),
                                            success: function (data) {
                                                if (data == 1) {
                                                    showToastMsg("error", "Selected priority already assign to someone.");
                                                }else{
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: Host + "clients/savecontacts",
                                                        data: $('.manage_contact_form').serialize(),
                                                        success: function (data) {
                                                            if (data == "success") {
                                                                $('#manageEmergencyContent').modal('hide');
                                                                cntload(1);
                                                                if ($('#emc_id').val() > 0) {
                                                                    showToastMsg("success", "Data updated successfully");
                                                                } else {
                                                                    showToastMsg("success", "Data added successfully");
                                                                }
                                                            }
                                                        }
                                                    });
                                                }
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: Host + "clients/check_assign_priority_contact",
                            data: $('.manage_contact_form').serialize(),
                            success: function (data) {
                                if (data == 1) {
                                    showToastMsg("error", "Selected priority already assign to someone.");
                                }else{
                                    $.ajax({
                                        type: 'POST',
                                        url: Host + "clients/savecontacts",
                                        data: $('.manage_contact_form').serialize(),
                                        success: function (data) {
                                            if (data == "success") {
                                                $('#manageEmergencyContent').modal('hide');
                                                cntload(1);
                                                if ($('#emc_id').val() > 0) {
                                                    showToastMsg("success", "Data updated successfully");
                                                } else {
                                                    showToastMsg("success", "Data added successfully");
                                                }
                                            }
                                        }
                                    });
                                }
                            }
                        });
                        /*$.ajax({
                            type: 'POST',
                            url: Host + "clients/savecontacts",
                            data: $('.manage_contact_form').serialize(),
                            success: function (data) {
                                if (data == "success") {
                                    $('#manageEmergencyContent').modal('hide');
                                    cntload();
                                    if ($('#emc_id').val() > 0) {
                                        showToastMsg("success", "Data updated successfully");
                                    } else {
                                        showToastMsg("success", "Data added successfully");
                                    }
                                }
                            }
                        });*/
                    }
                }, 1000);
            }
        });

        $('.manage_contact_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_contact_form').validate().form()) {
                    setTimeout(function () {
                        $.ajax({
                            type: 'POST',
                            url: Host + "clients/savecontacts",
                            data: $('.manage_contact_form').serialize(),
                            success: function (data) {
                                if (data == "success") {
                                    $('#manageEmergencyContent').modal('hide');
                                    cntload(1);
                                    if ($('#emc_id').val() > 0) {
                                        showToastMsg("success", "Data updated successfully");
                                    } else {
                                        showToastMsg("success", "Data added successfully");
                                    }
                                }
                            }
                        });
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handlePhysician = function () {
        $('.manage_physician_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                phd_name : {
                    required : true
                },
                phd_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                phd_ext_no: {
                    digits: true,
                    minlength: '0',
                    maxlength: '6'
                },
                phd_fax: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                phd_npi: {
                    required : true,
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
            }, messages: {
                phd_name : {
                    required : "Physician name can not left blank"
                },
                phd_phone: {
                    usPhone: "Phone Number is invalid",
                    minlength: "Phone Number must be of 10 digits",
                    maxlength: "Phone Number must be of 10 digits"
                },
                phd_ext_no: {
                    digits: "Extention should be numbers only.",
                    minlength: "Extention must be of minimum 1 digit",
                    maxlength: "Extention must be of maximum 6 digit"
                },
                phd_fax: {
                    usPhone: "Fax Number is invalid",
                    minlength: "Fax Number must be of 10 digits",
                    maxlength: "Fax Number must be of 10 digits"
                },
                phd_npi: {
                    required : "NPI Number can not left blank",
                    usPhone: "NPI Number is invalid",
                    minlength: "NPI Number must be of 10 digits",
                    maxlength: "NPI Number must be of 10 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_physician_form')).hide();
                $('.alert-error', $('.manage_physician_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.input-append').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.input-append').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
            },
            submitHandler: function (form) {
                showloader();
                $(".physicianform-submit-popup").prop("disabled","true");
                setTimeout(function () {
                    $.ajax({
                        type: 'POST',
                        url: Host + "clients/savephysician",
                        async:false,
                        data: $('.manage_physician_form').serialize(),
                        success: function (data) {
                            if (data == "success") {
                                $('#managePhysicianContent').modal('hide');
                                $(".physicianform-submit-popup").prop("disabled","false");
                                hideloader();
                                phyload();
                                getclientmainData();
                                if ($('#cpd_id').val() > 0) {
                                    showToastMsg("success", "Data updated successfully");
                                } else {
                                    showToastMsg("success", "Data added successfully");
                                }
                            }
                        }
                    });
                }, 1000);
            }
        });

        $('.manage_physician_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_physician_form').validate().form()) {
                    setTimeout(function () {
                        $.ajax({
                            type: 'POST',
                            url: Host + "clients/savephysician",
                            async:false,
                            data: $('.manage_physician_form').serialize(),
                            success: function (data) {
                                if (data == "success") {
                                    $('#managePhysicianContent').modal('hide');
                                    phyload();
                                    getclientmainData();
                                    if ($('#cpd_id').val() > 0) {
                                        showToastMsg("success", "Data updated successfully");
                                    } else {
                                        showToastMsg("success", "Data added successfully");
                                    }
                                }
                            }
                        });
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handlePharmacist = function () {
        $('.manage_pharmacist_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                /*pha_name: {
                    alphSpace: true,
                    required:true
                },*/
                pha_store_name: {
                    lettersonly: true,
                    required:true
                },
                pha_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                phd_fax: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                pha_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }, pha_npi: {
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
            }, messages: {
                /*pha_name: {
                    alphSpace: "Pharmacist Name is invalid",
                    required:"Name is required"
                },*/
                pha_store_name: {
                    lettersonly: "Store Name is invalid",
                    required:"Name is required"
                },
                pha_phone: {
                    usPhone: "Phone Number is invalid",
                    minlength: "Phone Number must be of 10 digits",
                    maxlength: "Phone Number must be of 10 digits"
                },
                phd_fax: {
                    usPhone: "Fax Number is invalid",
                    minlength: "Fax Number must be of 10 digits",
                    maxlength: "Fax Number must be of 10 digits"
                },
                pha_zip: {
                    usPhone: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                }, pha_npi: {
                    usPhone: "NPI is invalid",
                    minlength: "NPI must be of 10 digits",
                    maxlength: "NPI must be of 10 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_pharmacist_form')).hide();
                $('.alert-error', $('.manage_pharmacist_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.controls').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.controls').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('mobNo').insertAfter(element.closest('.controls'));
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.controls'));
            },
            submitHandler: function (form) {
                setTimeout(function () {
                    $.ajax({
                        type: 'POST',
                        url: Host + "Clients/save_pharmacist_data",
                        async:false,
                        data: $('.manage_pharmacist_form').serialize(),
                        success: function (data) {
                            if (data == "success") {
                                $('#managePharmacistContent').modal('hide');
                                phaload();
                                getclientmainData();
                                if ($('#cpd_id').val() > 0) {
                                    showToastMsg("success", "Data updated successfully");
                                } else {
                                    showToastMsg("success", "Data added successfully");
                                }
                            }
                            
                        }
                    });
                }, 1000);
            }
        });

        $('.manage_pharmacist_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_pharmacist_form').validate().form()) {
                    setTimeout(function () {
                        $.ajax({
                            type: 'POST',
                            url: Host + "Clients/save_pharmacist_data",
                            async:false,
                            data: $('.manage_pharmacist_form').serialize(),
                            success: function (data) {
                                if (data == "success") {
                                    $('#managePharmacistContent').modal('hide');
                                    phaload();
                                    getclientmainData();
                                    if ($('#cpd_id').val() > 0) {
                                        showToastMsg("success", "Data updated successfully");
                                    } else {
                                        showToastMsg("success", "Data added successfully");
                                    }
                                }
                                
                               
                            }
                        });
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handleHospital = function () {
        $('.manage_hospital_form_cli').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                pha_name: {
                    alphSpace: true,
                    required:true
                },
                pha_store_name: {
                    lettersonly: true,
                    required:true
                },
                pha_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                phd_fax: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                pha_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }, pha_npi: {
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
            }, messages: {
                pha_name: {
                    alphSpace: "hospital Name is invalid",
                    required:"Name is required"
                },
                pha_store_name: {
                    lettersonly: "Store Name is invalid",
                    required:"Name is required"
                },
                pha_phone: {
                    usPhone: "Phone Number is invalid",
                    minlength: "Phone Number must be of 10 digits",
                    maxlength: "Phone Number must be of 10 digits"
                },
                phd_fax: {
                    usPhone: "Fax Number is invalid",
                    minlength: "Fax Number must be of 10 digits",
                    maxlength: "Fax Number must be of 10 digits"
                },
                pha_zip: {
                    usPhone: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                }, pha_npi: {
                    usPhone: "NPI is invalid",
                    minlength: "NPI must be of 10 digits",
                    maxlength: "NPI must be of 10 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_hospital_form_cli')).hide();
                $('.alert-error', $('.manage_hospital_form_cli')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.controls').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.controls').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('mobNo').insertAfter(element.closest('.controls'));
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.controls'));
            },
            submitHandler: function (form) {
                setTimeout(function () {
                    $.ajax({
                        type: 'POST',
                        url: Host + "Clients/save_hospital_data",
                        async:false,
                        data: $('.manage_hospital_form_cli').serialize(),
                        success: function (data) {
                            if (data == "success") {
                                $('#managePharmacistContent').modal('hide');
                                hospitalload();
                                getclientmainData();
                                if ($('#cpd_id').val() > 0) {
                                    showToastMsg("success", "Data updated successfully");
                                } else {
                                    showToastMsg("success", "Data added successfully");
                                }
                            }
                            
                        }
                    });
                }, 1000);
            }
        });

        $('.manage_hospital_form_cli input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_hospital_form_cli').validate().form()) {
                    setTimeout(function () {
                        $.ajax({
                            type: 'POST',
                            url: Host + "Clients/save_hospital_data",
                            async:false,
                            data: $('.manage_hospital_form_cli').serialize(),
                            success: function (data) {
                                if (data == "success") {
                                    $('#managePharmacistContent').modal('hide');
                                    hospitalload();
                                    getclientmainData();
                                    if ($('#cpd_id').val() > 0) {
                                        showToastMsg("success", "Data updated successfully");
                                    } else {
                                        showToastMsg("success", "Data added successfully");
                                    }
                                }
                                
                               
                            }
                        });
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handleScheduleAppointment = function () {
        $('#schedule_appointment').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {                
                startTime: {
                    required:true
                },
                endTime: {
                    required:true
                },
                eventTitle: {
                    required:true
                },
                staff_member_id: {
                   required:true
                },
            }, messages: {
                startTime: {
                    required:"Start time is required"
                },
                endTime: {
                    required:"End time is required"
                },
                eventTitle: {
                     required:"Title is required"
                },
                staff_member_id: {
                   required:"Care team member is required"
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('#schedule_appointment')).hide();
                $('.alert-error', $('#schedule_appointment')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-control').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-control').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('mobNo').insertAfter(element.closest('.form-control'));
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.form-control'));
            },
            submitHandler: function (form) {
                showloader();
                setTimeout(function () {
                    $.ajax({
                        type: 'POST',
                        url: Host + "task_management/save_facesheet_appointment",
                        async:false,
                        data: $('#schedule_appointment').serialize(),
                        success: function (data) {
                            hideloader();
                            var response = JSON.parse(data);
                            if(response.status == 200)
                            {
                                showToastMsg('success',response.message);
                                $('#manageAppointmentModal').hide();
                                $('.modal-backdrop').remove();
                            }
                            else
                            {
                                showToastMsg('error','something went wrong');
                            }
                        }
                    });
                }, 1000);
            }
        });

        $('#schedule_appointment input').keypress(function (e) {
            if (e.which == 13) {
                if ($('#schedule_appointment').validate().form()) {
                    setTimeout(function () {
                        $.ajax({
                            type: 'POST',
                            url: Host + "task_management/save_facesheet_appointment",
                            async:false,
                            data: $('#schedule_appointment').serialize(),
                            success: function (data) {
                                hideloader();
                                var response = JSON.parse(data);
                                if(response.status == 200)
                                {
                                    showToastMsg('success',response.message);
                                    $('#manageAppointmentModal').hide();
                                    $('.modal-backdrop').remove();
                                }
                                else
                                {
                                    showToastMsg('error','something went wrong');
                                }
                            }
                        });
                    }, 1000);
                }
                return false;
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handleFacesheet();
            handleContact();
            handlePhysician();
            handlePharmacist();
            handleHospital();
            handleScheduleAppointment();
        }
    };
}();
