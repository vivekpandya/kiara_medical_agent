var ManageOrganization = function () {
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    var handleOrganization = function () {
        $('.manage_organization_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                organization_name : {
                    required : true,
                    remote: {
                        url: Host + "organization/check_duplicate_organization",
                        type: "POST",
                        data: {
                            organization_name: function () {
                                var organization_name = $("#organization_name").val();
                                return organization_name
                                ;
                            },
                            organization_dcc_id: function () {
                                var organization_dcc_id = $("#organization_dcc_id").val();
                                return organization_dcc_id;
                            },
                            organization_id: function () {
                                var organization_id = $("#organization_id").val();
                                return organization_id;
                            }
                        }
                    }
                }
            }, messages: {
                organization_name : {
                    required : "Organization can not left blank",
                    remote: "Organization already exist, please enter different",
                }

            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_organization_form')).hide();
                $('.alert-error', $('.manage_organization_form')).show();
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
                if ($('#organization_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                showloader();
                $(".orgform-submit-popup").prop("disabled","true");
                setTimeout(function () {
                    form.submit();
                    $(".orgform-submit-popup").prop("disabled","false");
                    hideloader();
                }, 1000);
            }
        });

        $('.manage_organization_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_organization_form').validate().form()) {
                    if ($('#organization_id').val() > 0) {
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
            handleOrganization();
        }
    };
}();
