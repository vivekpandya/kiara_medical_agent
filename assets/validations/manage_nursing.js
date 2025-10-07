var ManageNursing = function () {
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
    var handleinitialNursing = function () {
        $('#initail_nursing_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                int_nur_cli_name: {
                    required: true
                }
            }, messages: {
                int_nur_cli_name: {
                    required: "Security Number must be of 9 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.initail_nursing_form')).hide();
                $('.alert-error', $('.initail_nursing_form')).show();
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
                showToastMsg("success", "Initial Nursing has been updated successfully");
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.initail_nursing_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.initail_nursing_form').validate().form()) {
                    showToastMsg("success", "Initial Nursing has been updated successfully");
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
            handleinitialNursing();
        }

    };
}();
