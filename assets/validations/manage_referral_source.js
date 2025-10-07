var ManageReferralSource = function () {
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    var handleReferralSource = function () {
        $('.manage_referral_source_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                source_name : {
                    required : true,
                    remote: {
                        url: Host + "referral_source/check_duplicate_referral_source",
                        type: "POST",
                        data: {
                            source_name: function () {
                                var source_name = $("#source_name").val();
                                return source_name
                                ;
                            },
                            source_dcc_id: function () {
                                var source_dcc_id = $("#source_dcc_id").val();
                                return source_dcc_id;
                            },
                            source_id: function () {
                                var source_id = $("#source_id").val();
                                return source_id;
                            }
                        }
                    }
                }
            }, messages: {
                source_name : {
                    required : "Referral source can not left blank",
                    remote: "Referral source already exist, please enter different",
                }

            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_referral_source_form')).hide();
                $('.alert-error', $('.manage_referral_source_form')).show();
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
                if ($('#source_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                showloader();
                $(".physicianform-submit-popup").prop("disabled","true");
                setTimeout(function () {
                    form.submit();
                    $(".physicianform-submit-popup").prop("disabled","false");
                    hideloader();
                }, 1000);
            }
        });

        $('.manage_referral_source_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_referral_source_form').validate().form()) {
                    if ($('#source_id').val() > 0) {
                        showToastMsg("success", "Data updated successfully");
                    } else {
                        showToastMsg("success", "Data added successfully");
                    }
                    setTimeout(function () {
                        form.submit();
                    }, 1000);
                }
                return false;
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handleReferralSource();
        }
    };
}();
