var ManageEmployees = function () {
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("password", function (value, element)
    {
        return this.optional(element) || /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$/i.test(value);
    }, "Atleast One Capital, One Numeric and One Special Character required.");
    Host = $('#admin_base_url').val();
    var handleDetails = function () {
        $('.manage_employees_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                sa_user_name: {
                    required: true,
                    remote:{
                        url: Host + "/Employees/checkAdminName",
                        type: "post",
                        data: { 
                            sa_admin_name: function () {
                                return $("#sa_user_name").val();
                            },
                            sa_id: function () {
                                return $("#sa_id").val();
                            }
                        }
                    },
                    lettersonly: true
                },
                sa_role_id: {
                  required: true,  
                },
                sa_office: {
                    maxlength: '12',
                    minlength: '12'
                },
                sa_phone: {
                    maxlength: '12',
                    minlength: '12'
                },
                sa_email:{
                    required: true,
                  email:true
                  
                },
                sa_first_name:{
                     required: true,
                     lettersonly: true
                },
                sa_last_name:{
                     required: true,
                     lettersonly: true
                },
                sa_display_name:{
                     required: true,
                     lettersonly: true
                },
                sa_zip: {
                   digits: true,
                    minlength: '5',
                    maxlength: '5'
                },
                sa_password: {
                    required: true,                    
                     minlength: '8',
                    maxlength: '20',
                    password: true
                },
                sa_password_confirm: {
                    required: true,
                     minlength: '8',
                    maxlength: '20',
                    equalTo : '[name="sa_password"]',
                    password: true
                }
            }, messages: {
                sa_user_name: {
                    required: "Login Name can not be left blank",
                    remote: "Login name already exists",
                    lettersonly: "Entered Login name is invalid"
                },
                sa_role_id: {
                  required: "Role is required.",  
                },
                sa_office: {
                    maxlength: 'Please enter 10 digit number',
                    minlength: 'Please enter 10 digit number'
                },
                sa_phone: {
                    maxlength: 'Please enter 10 digit number',
                    minlength: 'Please enter 10 digit number'
                },
                sa_email: {
                    required: 'Please enter Email',
                    email: 'Please enter correct Email'
                },
                 sa_first_name:{
                     required: 'First Name is required',
                     lettersonly: 'First Name is invalid.'
                },
                sa_last_name:{
                     required: 'Last Name is required',
                     lettersonly: 'Last Name is invalid.'
                },
                sa_display_name:{
                     required: 'Display Name is required',
                     lettersonly: 'Display Name is invalid.'
                },
                sa_zip: {
                    digits: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                },
                
                sa_password: {
                    required: "Password is required.",
                    minlength: "Minimum required length is 8",
                    maxlength: "Maximum required length is 20",
                    password: "Password security criteria’s are not met. Please re-enter."
                },
                sa_password_confirm: {
                    required: "Confirm Password is required.",
                     minlength: "Minimum required length is 8",
                     maxlength: "Maximum required length is 20",
                    equalTo: "Password and Confirm Password must be same.",
                    password: "Password security criteria’s are not met. Please re-enter."
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_employees_form')).hide();
                $('.alert-error', $('.manage_employees_form')).show();
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
                        form.submit();
                    }, 1000);
            }
        });

        $('.manage_employees_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_employees_form').validate().form()) {
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
