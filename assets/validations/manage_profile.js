var ManageProfile = function () {
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");

    jQuery.validator.addMethod('einvalidate', function (value, element) {
        return this.optional(element) || /^\d{2}-\d{7}$/.test(value);
    }, "Please enter a valid EIN. ex. **-*******");

    Host = $('#admin_base_url').val();
    var handleDetails = function () {
        $('.update_profile_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                sa_first_name: {
                    required: true,
                    lettersonly: true
                },
                sa_last_name: {
                    required: true,
                    lettersonly: true
                },
                sa_display_name: {
                    required: true,
                },
                sa_office_phone: {
                    required: true,
                    usPhone: true,
                    minlength: '10',
                    maxlength: '10',
                },
                sa_cell_number: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12',
                },
                sa_email: {
                    required: true,
                    email: true,
                    remote: Host + "/Home/check_duplicate"
                },
                sa_address1: {
                    required: true,
                    maxlength: '300'
                },
                sa_address2: {
                    maxlength: '300'
                },
                sa_country: {
                    required: true,
                },
                sa_state: {
                    required: true,
                },
                sa_city: {
                    required: true,
                },
                sa_zip: {
                    required: true,
                    minlength: '4',
                    maxlength: '8',
                    digits: true
                },
                sa_ein: {
                    einvalidate : true,
                    maxlength: '10',
                    minlength: '10'
                },
                sa_npi:{
                    number : true,
                    maxlength : "10",
                    minlength : "10"
                }
            }, messages: {
                sa_email: {
                    required: "Email can not be left blank",
                    remote: "Email already taken",
                    email: "Invalid Email Address format. Please try again"
                },
                sa_first_name: {
                    required: "First Name can not be left blank",
                    lettersonly: "Entered First Name is invalid"
                },
                sa_last_name: {
                    required: "Last Name can not be left blank",
                    lettersonly: "Entered Last Name is invalid"
                },
                sa_display_name: {
                    required: "Display Name can not be left blank"
                },
                sa_office_phone: {
                    required: "Office phone number can not be left blank",
                    usPhone: "Entered Office Number is invalid",
                    minlength: "Mobile Number should be of 10 digits",
                    maxlength: "Mobile Number should be of 10 digits"

                },
                sa_cell_number: {
                    usPhone: "Entered Cell Number is invalid",
                    minlength: "Mobile Number should be of 10 digits",
                    maxlength: "Mobile Number should be of 10 digits",
                },
                sa_address1: {
                    required: "Address 1 can not be left blank"
                },
                sa_country: {
                    required: "Country can not be left blank"
                },
                sa_state: {
                    required: "State can not be left blank"
                },
                sa_city: {
                    required: "City can not be left blank"
                },
                sa_zip: {
                    required: "Zip Code can not be left blank",
                    digits: "Entered Zip Code is invalid",
                    minlength: "Zip Code should be of 4 digits",
                    maxlength: "Zip Code should be of 8 digits"
                },
                sa_ein: {
                    einvalidate : "Please enter a valid EIN. ex. **-*******",
                    maxlength: "EIN should be of 9 digits",
                    minlength: "EIN should be of 9 digits"
                },
                sa_npi:{
                    number : "NPI number should be numeric",
                    maxlength : "NPI number should be of 10 digits",
                    minlength : "NPI number should be of 10 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.update_profile_form')).hide();
                $('.alert-error', $('.update_profile_form')).show();
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
                    url: Host + "/Home/saveProfileData",
                    data: $('.update_profile_form').serialize(),
                    success: function (data) {
                        showToastMsg("success", "SuperAdmin profile updated successfully");
                    }
                });
            }
        });

        $('.update_profile_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.update_profile_form').validate().form()) {
                    $.ajax({
                        type: 'POST',
                        url: Host + "/Home/saveProfileData",
                        data: $('.update_profile_form').serialize(),
                        success: function (data) {
                            showToastMsg("success", "SuperAdmin profile updated successfully");
                        }
                    });
                }
                return false;
            }
        });
    }
    var handlePassword = function () {
        $.validator.addMethod('passwordValidation', function (value) {
            return /^.*(?=.*[A-Z])(?=.*[!@#^$%&*(<%>+=~{`\[\]}"'|,_.\-:;\\></?)]).*$/.test(value);
        }, 'Password should be minimum 8 characters long and must<br> contain at least 1 upper case and 1 special character');
        $('.manage_password_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                old_password: {
                    required: true,
                    remote: Host + "/Home/check_old_password"
                },
                new_password: {
                    required: true,
                    passwordValidation: true,
                    maxlength: '20'
                },
                confirm_password: {
                    required: true,
                    equalTo: '#new_password'
                }
            }, messages: {
                old_password: {
                    required: "Old Password field can not be left blank",
                    remote: "Old Password is not matching. Please try again"
                },
                new_password: {
                    required: "New Password field can not be left blank. Please try again"
                },
                confirm_password: {
                    required: "Password field is empty. Please try again.",
                    equalTo: "Password and confirm password field does not match, Please try again"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_password_form')).hide();
                $('.alert-error', $('.manage_password_form')).show();
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
                    url: Host + "/Home/saveProfileData",
                    data: $('.manage_password_form').serialize(),
                    success: function (data) {
                        $('#resetPassword').modal('hide');
                        showToastMsg("success", "Password updated successfully");
                    }
                });
            }
        });

        $('.manage_password_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_password_form').validate().form()) {
                    $.ajax({
                        type: 'POST',
                        url: Host + "/Home/saveProfileData",
                        data: $('.manage_password_form').serialize(),
                        success: function (data) {
                            $('#resetPassword').modal('hide');
                            showToastMsg("success", "Password updated successfully");
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
            handlePassword();
        }

    };
}();
