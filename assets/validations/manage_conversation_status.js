var ManageConversationStatus = function () {
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    var handleConversationStatus = function () {
        $('.manage_conversation_status_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                status_name : {
                    required : true,
                    remote: {
                        url: Host + "conversation_status/check_duplicate_conversation_status",
                        type: "POST",
                        data: {
                            status_name: function () {
                                var status_name = $("#status_name").val();
                                return status_name
                                ;
                            },
                            status_dcc_id: function () {
                                var status_dcc_id = $("#status_dcc_id").val();
                                return status_dcc_id;
                            },
                            status_id: function () {
                                var status_id = $("#status_id").val();
                                return status_id;
                            }
                        }
                    }
                }
            }, messages: {
                status_name : {
                    required : "Referral status can not left blank",
                    remote: "Referral status already exist, please enter different",
                }

            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_conversation_status_form')).hide();
                $('.alert-error', $('.manage_conversation_status_form')).show();
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
                if ($('#status_id').val() > 0) {
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

        $('.manage_conversation_status_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_conversation_status_form').validate().form()) {
                    if ($('#status_id').val() > 0) {
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
            handleConversationStatus();
        }
    };
}();
