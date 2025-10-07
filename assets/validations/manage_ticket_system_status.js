var ManageTicketStatus = function () {
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
        $('.manage_status_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                tst_name: {
                    required: true,
                    remote: Host + "/ticket_system/check_duplicate"
                },
                tst_description: {
                    maxlength: '1000'
                },
                tst_status: {
                    checkRadio: true
                }
            }, messages: {
                tst_name: {
                    required: "Ticket Status Name can not be left blank",
                    remote: "Ticket Status name already exists"
                },
                tst_status: {
                    checkRadio: "Status can not be left blank"
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_status_form')).hide();
                $('.alert-error', $('.manage_status_form')).show();
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
                $.ajax({
                    type: 'POST',
                    url: Host + "/ticket_system/saveStatusData",
                    data: $('.manage_status_form').serialize(),
                    success: function (data) {
                        if (data == "success") {
                            loadDataByPage(1);
                            $('#manageTicketStatusContent').modal('hide');
                            if ($('#tst_id').val() > 0) {
                                showToastMsg("success", "Ticket Status updated successfully");
                            } else {
                                showToastMsg("success", "Ticket Status added successfully");
                            }
                        }
                    }
                });
            }
        });

        $('.manage_status_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_status_form').validate().form()) {
                    $.ajax({
                        type: 'POST',
                        url: Host + "/ticket_system/saveStatusData",
                        data: $('.manage_status_form').serialize(),
                        success: function (data) {
                            if (data == "success") {
                                loadDataByPage(1);
                                $('#manageTicketStatusContent').modal('hide');
                                if ($('#tst_id').val() > 0) {
                                    showToastMsg("success", "Ticket Status updated successfully");
                                } else {
                                    showToastMsg("success", "Ticket Status added successfully");
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
