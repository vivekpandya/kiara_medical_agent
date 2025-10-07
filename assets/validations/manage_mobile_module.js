var ManageModules = function () {
    jQuery.validator.addMethod("checkRadio", function (value, element) {
        if ($('[name="' + element.name + '"]:checked').length > 0) {
            return true;
        }
        else {
            return false;
        }
    });
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Letters and spaces only please");
    Host = $('#admin_base_url').val();
    var handleDetails = function () {
        $('.manage_module_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                mod_mobile_name: {
                    required: true,
                    remote: Host + "/mobile_modules/check_duplicate",
                    lettersonly: true
                },
                mod_comment: {
                    maxlength: '1000'
                },
                mod_status: {
                    checkRadio: true
                }
            }, messages: {
                mod_mobile_name: {
                    required: "Module Name can not be left blank",
                    remote: "Module name already exists",
                    lettersonly: "Entered Module name is invalid"
                },
                mod_status: {
                    checkRadio: "Status can not be left blank"
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_module_form')).hide();
                $('.alert-error', $('.manage_module_form')).show();
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
                var formData = new FormData($('#mobilemodelview')[0]);
                $.ajax({
                    type: 'POST',
                    url: Host + "/mobile_modules/saveModuleData",
                    data: formData,
                     cache : false,
                     contentType : false,
                     processData : false,
                    success: function (data) {
                        if (data == "success") {
                            loadDataByPage(1);
                            $('#manageMobileModuleContent').modal('hide');
                            if ($('#mod_id').val() > 0) {
                                showToastMsg("success", "Mobile Module updated successfully");
                            } else {
                                showToastMsg("success", "Mobile Module added successfully");
                            }
                        }
                    }
                });
            }
        });

        $('.manage_module_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_module_form').validate().form()) {
                    $.ajax({
                        type: 'POST',
                        url: Host + "/mobile_modules/saveModuleData",
                        data: $('.manage_module_form').serialize(),
                        success: function (data) {
                            if (data == "success") {
                                loadDataByPage(1);
                                $('#manageMobileModuleContent').modal('hide');
                                if ($('#mod_id').val() > 0) {
                                    showToastMsg("success", "Mobile Module updated successfully");
                                } else {
                                    showToastMsg("success", "Mobile Module added successfully");
                                }
                            }
                        }
                    });
                }
                return false;
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleDetails();
        }

    };
}();
