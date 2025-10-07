var ManageDccDetails = function () {
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
        return this.optional(element) || /^[a-z,"'"," ",#/-]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("alphSpace", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Only alphabetical characters");
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    Host = $('#admin_base_url').val();
    var handleDetails = function () {
        $('.dcc_detail_form').validate({
            errorElement: 'label',
            errorClass: 'error',
            focusInvalid: true,
            rules: {
                compnay_name: {
                    required: true
                },
                dcc_name: {
                    required: true,
                    minlength: '2',
                    maxlength: '40'
                },
                cus_timezone: {
                    required: true,
                },
                dcc_phone_number: {
                    required: true,
                    minlength: '12',
                    maxlength: '12',
                    usPhone: true
                },
                dcc_email: {
                    required: true,
                    email: true,
                    remote: Host + "/Dcc/check_duplicate"
                },
                dcc_prim_man_name: {
                    required: true,
                    lettersonly: true,
                    minlength: '2',
                    maxlength: '30'
                },
                dcc_prim_phone_number: {
                    required: true,
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                dcc_sec_man_name: {
                    minlength: '2',
                    maxlength: '30'
                }, dcc_sec_phone_number: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                }, dcc_address_one: {
                    required: true
                }, cus_country: {
                    required: true
                }, cus_state: {
                    required: true
                }, cus_city: {
                    required: true
                }, cus_zip: {
                    required: true,
                    number: true,
                    minlength: '5',
                    maxlength: '5'
                },
                dcc_status: {
                    checkRadio: true
                },
                dcc_npi: {
                    number: true,
                    minlength: '10',
                    maxlength: '10'
                },
                dcc_liab_contact_phone_no: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                dcc_fire_phone_no: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                dcc_health_phone_no: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                dcc_liab_contact_email: {
                    email: true
                },
                dcc_meal_serve: {
                    required: true
                },
                dcc_fed_tax_id: {
                    //einvalidate : true,
                    maxlength: '10',
                    minlength: '10'
                },
                dcc_assment_days: {
                    digits: true,
                    minlength: '0',
                    maxlength: '3'
                }
            }, messages: {
                compnay_name: {
                    required: "Company Name can not be left blank"
                },
                dcc_name: {
                    required: "Home care agency Name can not be left blank",
                    minlength: '2',
                    maxlength: '45'
                },
                cus_timezone: {
                    required: "Time zone can not be left blank"
                },
                dcc_phone_number: {
                    required: "Phone number can not be left blank",
                    usPhone: "Entered Phone number is invalid",
                    minlength: "Mobile number should be of 12 digits",
                    maxlength: "Mobile number should be of 12 digits"
                },
                dcc_sec_phone_number: {
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits",
                    usPhone: "Entered Phone number is invalid"
                },
                dcc_email: {
                    required: "Email can not be left blank",
                    email: "Entered Primary Email Id is invalid",
                    remote: "Entered Email Id  is Already registered, please enter different email id"
                },
                dcc_website: {
                    required: "Website can not be left blank"
                },
                dcc_prim_man_name: {
                    required: "Primary manager name can not be left blank",
                    lettersonly: "Entered Primary Manager Name  is invalid'"
                },
                dcc_prim_phone_number: {
                    required: "Primary manager phone number can not be left blank",
                    usPhone: "Entered Phone number is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_address_one: {
                    required: "Address 1 can not be left blank"
                },
                dcc_address_two: {
                    required: "Address 2 can not be left blank"
                },
                cus_country: {
                    required: "Country can not be left blank"
                },
                cus_city: {
                    required: "City can not be left blank 123"
                },
                cus_state: {
                    required: "State can not be left blank"
                },
                cus_zip: {
                    required: "Zip Code can not be left blank",
                    digits: "Entered Zip Code is invalid",
                    minlength: "Zip Code should be of 5 digits",
                    maxlength: "Zip Code should be of 5 digits"
                },
                dcc_description: {
                    required: "Description can not be left blank"
                },
                dcc_status: {
                    checkRadio: "Status can not be left blank"
                },
                dcc_Admin_name: {
                    lettersonly: "Admin name is invalid"
                },
                dcc_npi: {
                    digits: "Entered NPI is invalid",
                    minlength: "NPI should be of 10 digits",
                    maxlength: "NPI should be of 10 digits"
                },
                dcc_liab_contact_no: {
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_liab_contact_phone_no: {
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_fire_phone_no: {
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_health_phone_no: {
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_liab_contact_email: {
                    email: "Entered Primary Email Id is invalid"
                },
                dcc_meal_serve: {
                    required: "Meal served can not be left blank"
                },
                dcc_fed_tax_id: {
                    //einvalidate : "Please enter a valid TAX ID. ex. **-*******",
                    maxlength: "TAX ID should be of 9 digits",
                    minlength: "TAX ID should be of 9 digits"
                },
                dcc_assment_days: {
                    digits: "Please enter a valid Number",
                    minlength: "Please enter minimum 0 Number",
                    maxlength: "Please enter maximum 365 Number"
                }
            },
            invalidHandler: function (event, validator) {
                $('.alert-error1', $('.dcc_detail_form')).hide();
                $('.alert-error', $('.dcc_detail_form')).show();
            },
            highlight: function (element) {
                $(element).closest('.input-append').addClass('error');
            },
            success: function (label) {
                label.closest('.input-append').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
            },
            submitHandler: function (form) {
                showToastMsg("success", "Home Care Agency details has been updated successfully");
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.dcc_detail_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.dcc_detail_form').validate().form()) {
                    showToastMsg("success", "Home Care Agency details has been updated successfully");
                    setTimeout(function () {
                        form.submit();
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handleLicense = function () {
        jQuery.validator.addMethod("greaterEnd", function (value, element, params) {
            return this.optional(element) || new Date(value) <= new Date($(params).val());
        }, 'Selected Start date is invalid');
        jQuery.validator.addMethod("greaterStart", function (value, element, params) {
            return this.optional(element) || new Date(value) >= new Date($(params).val());
        }, 'Selected End date is invalid');
        jQuery.validator.addMethod("dollarsscents", function (value, element) {
            return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
        }, "You must include two decimal places");
        $('.dccLicense').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                dcc_license_start_date: {
                    required: true,
//                    greaterEnd: '#dcc_license_end_date'
                },
                dcc_license_end_date: {
                    required: true,
//                    greaterStart: '#dcc_license_start_date'
                },
                dcc_license_active_user: {
                    required: true,
                    digits: true
                },
                dcc_license_min_active_user: {
                    required: true,
                    digits: true,
                },
                dcc_license_status: {
                    checkRadio: true
                }, lic_sub_name: {
                    required: true
                }, lic_sub_comment: {
//                    required: true
                }, lic_sub_price: {
                    required: true,
                    dollarsscents: true,
                }, lic_purchase_order: {
//                    required: true,
                    maxlength: 15
                }, lic_sales_tax: {
//                    required: true,
                    dollarsscents: true,
                }
            }, messages: {
                dcc_license_start_date: {
                    required: "Start Date field can not be left blank"
                },
                dcc_license_end_date: {
                    required: "End Date field can not be left blank"
                },
                dcc_license_active_user: {
                    required: "Number of active users field can not be left blank",
                    digits: "Entered number of active users is invalid"
                },
                dcc_license_min_active_user: {
                    required: "Minimum number of active users field can not be left blank",
                    digits: "Entered minimum number of active users is invalid"
                },
                dcc_license_status: {
                    checkRadio: "Status can not be left blank"
                },
                lic_sub_name: {
                    required: "Subscription Name can not be left blank"
                },
                lic_sub_comment: {
                    required: "Subscription Comment can not be left blank"
                },
                lic_sub_price: {
                    required: "Unit Price can not be left blank",
                    dollarsscents: "Entered Unit Price is invalid"
                },
                lic_purchase_order: {
                    maxlength: "Purchase Order can not more than 15 characters",
                }, lic_sales_tax: {
//                    required: "Sales Tax can not be left blank",
                    dollarsscents: "Entered Sales Tax is invalid"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.dccLicense')).hide();
                $('.alert-error', $('.dccLicense')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.input-append').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.input-append').removeClass('error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
            },
            submitHandler: function (form) {
                var dcc_name = $('#dcc_license_name').val();
                showToastMsg("success", "Subscription details for " + dcc_name + " is successfully saved");
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.dccLicense input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.dccLicense').validate().form()) {
                    var dcc_name = $('#dcc_license_name').val();
                    showToastMsg("success", "Subscription details for " + dcc_name + " is successfully saved");
                    setTimeout(function () {
                        form.submit();
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handleBilling = function () {
        jQuery.validator.addMethod("alphSpace", function (value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");
        $.validator.addMethod("alphaNumeric", function (value, element) {
            return this.optional(element) || /^[a-z0-9\-]+$/i.test(value);
        }, "Username must contain only letters, numbers, or dashes.");
        $('.dcc_blling_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                bil_address1: {
                    required: true,
                    maxlength: '200'
                },
                bil_address2: {
//                    required: true,
                    maxlength: '200'
                },
                bil_country: {
                    required: true
                },
                bil_state1: {
                    required: true
                },
                bil_city: {
                    required: true
                },
                bil_zip: {
                    required: true,
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                },
                bil_email: {
//                    required: true,
                    email: true,
//                    remote: Host + "/Dcc/checkDccEmail"
                },
                bil_phone: {
//                    required: true,
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                ccd_card_digits: {
//                    required: true,
                    digits: true,
                    minlength: '4',
                    maxlength: '4'
                },
                ccd_card_holder_name: {
//                    required: true,
                    alphSpace: true,
                    minlength: '2',
                    maxlength: '30'
                },
                bil_invoice_sent_method: {
                    required: true,
                },
                ccd_expiry_date: {
//                    required: true,
                },
                bil_purchase_order: {
                    alphaNumeric: true,
                    maxlength: '15'
                },
                bil_billing_cycle: {
                    required: true,
                },
                bil_sp_id: {
                    required: true,
                },
                bil_sp_comission: {
                    required: true,
                }
            }, messages: {
                bil_address1: {
                    required: "Address 1 can not be left blank"
                },
                bil_address2: {
                    required: "Address 2 Date can not be left blank"
                },
                bil_country: {
                    required: "Country can not be left blank"
                },
                bil_state1: {
                    required: "State can not be left blank"
                },
                bil_city: {
                    required: "City can not be left blank"
                },
                bil_zip: {
                    required: "Zip Code can not be left blank",
                    digits: "Entered postal code is invalid",
                    minlength: "Zip Code should be of 5 digits",
                    maxlength: "Zip Code should be of 5 digits"
                },
                bil_email: {
                    required: "Email Id can not be left blank",
                    email: "Invalid Email Address format. Please try again"
                },
                bil_phone: {
                    required: "Phone Number can not be left blank",
                    usPhone: "Entered Phone number is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits",
                },
                ccd_card_digits: {
                    required: "Card number can  not be left blank",
                    digits: "Entered last 4 card digits are invalid",
                    minlength: "Entered last 4 card digits are invalid",
                    maxlength: "Entered last 4 card digits are invalid",
                },
                ccd_card_holder_name: {
                    required: "Card holder name can  not be left blank",
                    alphSpace: "Entered card holder name is invalid"
                },
                ccd_expiry_date: {
                    required: "Card expiry date can  not be left blank",
                    digits: "Entered last 4 card digits are invalid",
                    minlength: "Entered last 4 card digits are invalid",
                    maxlength: "Entered last 4 card digits are invalid"
                },
                bil_purchase_order: {
                    alphaNumeric: "PO# should be of max 15 alphanumeric value",
                    maxlength: "PO# should be of max 15 alphanumeric value",
                },
                bil_invoice_sent_method: {
                    required: "Perferred send invoice method field can not be left blank"
                },
                bil_billing_cycle: {
                    required: "Billing Cycle field can not be left blank"
                },
                bil_sp_id: {
                    required: "Please select a SalesPerson.",
                },
                bil_sp_comission: {
                    required: "Sales Commission(%) field can not be left blank",
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.dcc_blling_form')).hide();
                $('.alert-error', $('.dcc_blling_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.input-append').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.input-append').removeClass('error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
            },
            submitHandler: function (form) {
                showToastMsg("success", "Day care center Billing details successfully created");
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.dcc_blling_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.dcc_blling_form').validate().form()) {
                    showToastMsg("success", "Day care center Billing details successfully created");
                    setTimeout(function () {
                        form.submit();
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handleTiming = function () {
        $('.dcc_timing_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                dcc_timing_shift: {
                    required: true
                },
                min_work_hours: {
                    digits: true
                },
                end_work_timing: {
                    required: true
                },
                start_work_timing: {
                    required: true
                },
            }, messages: {
                dcc_timing_shift: {
                    required: "Shift Timings can not be left blank"
                },
                min_work_hours: {
                    digits: "Invalid Min working hours"
                },
                start_work_timing: {
                    required: "Start work time can not be left blank"
                },
                end_work_timing: {
                    required: "End work time can not be left blank"
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.dcc_timing_form')).hide();
                $('.alert-error', $('.dcc_timing_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.input-append').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.input-append').removeClass('error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
            },
            submitHandler: function (form) {
                showToastMsg("success", "Timing details are successfully saved");
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.dcc_timing_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.dccLicense').validate().form()) {
                    showToastMsg("success", "Timing details are successfully saved");
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
            handleLicense();
            handleBilling();
            handleTiming();
        }

    };
}();
function updateInsurance() {
    if ($('[name="gridIndex[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one insurance company!");
        return false;
    }
    var checkedClients = $('.gridIndex:checkbox:checked').map(function () {
        return this.value;
    }).get();
    var cliArr = checkedClients.join(",");
    $.ajax({
        type: 'POST',
        url: Host + "/Dcc/save_dcc_insurance",
        data: "ins_id_arr=" + cliArr+"&dcc_id="+$('#ins_dccc_id').val(),
        success: function (data) {
            if (data == "success") {
                manageInsurance();
            }
        }
    });
}


