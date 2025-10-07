var ManageSubscriptions = function () {
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z,"'"," ",#/-]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("decimalVal", function (value, element) {
        return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
    }, "You must include two decimal places");
    Host = $('#admin_base_url').val();
    var handleDetails = function () {
        $('.subscriptionServices').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                sub_name: {
                    required: true,
                    remote: Host + "/Subscription/check_duplicate",
                    lettersonly: true
                },
                sub_comment: {
                    maxlength: '1000'
                },
                sub_price: {
                    required: true,
                    decimalVal: true
                },
                sub_duration: {
                    required: true
                }
            }, messages: {
                sub_name: {
                    required: "Subscription Name can not be left blank",
                    remote: "Subscription name already exists",
                    lettersonly: "Entered Subscription name is invalid"
                },
                sub_duration: {
                    required: "Subscription duration can not be left blank"
                },
                sub_price: {
                    required: "Subscription price can not be left blank",
                    decimalVal: "Entered Subscription price is invalid"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.subscriptionServices')).hide();
                $('.alert-error', $('.subscriptionServices')).show();
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
                showToastMsg("success", "Subscription details added successfully");
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.subscriptionServices input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.subscriptionServices').validate().form()) {
                    showToastMsg("success", "Subscription details added successfully");
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
            handleDetails();
        }

    };
}();
