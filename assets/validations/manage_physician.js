var ManagePhysician = function () {
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    var handlePhysician = function () {
        $('.manage_physician_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                /*phd_name : {
                    required : true,
                    remote: {
                        url: Host + "Physician/check_duplicate_physician",
                        type: "POST",
                        data: {
                            phd_name: function () {
                                var phd_name = $("#phd_name").val();
                                return phd_name;
                            },
                            phd_id: function () {
                                var phd_id = $("#phd_id").val();
                                return phd_id;
                            },
                            phd_status: function () {
                                var phd_status = $( "input[name='phd_status']:checked" ).val();
                                return phd_status;
                            }
                        }
                    }
                },*/
                phd_name: {
                   required : true
                },
                phd_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                phd_ext_no: {
                    usPhone: true,
                    minlength: '0',
                    maxlength: '6'
                },
                phd_fax: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                phd_npi: {
                    required : true,
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
                phd_email: {
                    email: true
                },
                phd_city: {
                   required: {
                        depends: function(element) {
                            return $('input[name="phd_defalut_address"]:checked').val() === 'ONE';
                        }
                    }
                },
                phd_two_city: {
                   required: {
                        depends: function(element) {
                            return $('input[name="phd_defalut_address"]:checked').val() === 'TWO';
                        }
                    }
                },
                phd_three_city: {
                   required: {
                        depends: function(element) {
                            return $('input[name="phd_defalut_address"]:checked').val() === 'THREE';
                        }
                    }
                },
                phd_state: {
                   required: {
                        depends: function(element) {
                            return $('input[name="phd_defalut_address"]:checked').val() === 'ONE';
                        }
                    }
                },
                phd_two_state: {
                    required: {
                        depends: function(element) {
                            return $('input[name="phd_defalut_address"]:checked').val() === 'TWO';
                        }
                    }
                },
                phd_three_state: {
                   required: {
                        depends: function(element) {
                            return $('input[name="phd_defalut_address"]:checked').val() === 'THREE';
                        }
                    }
                },
            }, messages: {
                phd_name : {
                    required : "Physician name can not left blank",
                },
                phd_phone: {
                    usPhone: "Phone Number is invalid",
                    minlength: "Phone Number must be of 10 digits",
                    maxlength: "Phone Number must be of 10 digits"
                },
                phd_ext_no: {
                    digits: "Extention should be numbers only.",
                    minlength: "Extention must be of minimum 1 digit",
                    maxlength: "Extention must be of maximum 6 digit"
                },
                phd_fax: {
                    usPhone: "Fax Number is invalid",
                    minlength: "Fax Number must be of 10 digits",
                    maxlength: "Fax Number must be of 10 digits"
                },
                phd_npi: {
                    required : "NPI# Number can not left blank",
                    usPhone: "NPI# Number is invalid",
                    minlength: "NPI# Number must be of 10 digits",
                    maxlength: "NPI# Number must be of 10 digits"
                },
                phd_email: {
                    email: "Entered email is invalid",
                },
                phd_city: {
                    required: "Address 1 city can not left blank",
                },
                phd_two_city : {
                    required : "Address 2 city can not left blank",
                },
                phd_three_city : {
                    required : "Address 3 city can not left blank",
                },
                phd_state : {
                    required : "Address 1 state can not left blank",
                },
                phd_two_state : {
                    required : "Address 2 state can not left blank",
                },
                phd_three_state : {
                    required : "Address 3 state can not left blank",
                }

            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_physician_form')).hide();
                $('.alert-error', $('.manage_physician_form')).show();
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
                if ($('#cpd_id').val() > 0) {
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

        $('.manage_physician_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_physician_form').validate().form()) {
                    if ($('#cpd_id').val() > 0) {
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
            handlePhysician();
        }
    };
}();
$('#phd_npi_expiration').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
function getCityList(state_id, type) {
    $.ajax({
        type: 'POST',
        url: Host + "User/getCityList",
        data: "state_id=" + state_id,
        success: function (data) {
            if (type == 'one') {
                $('#phd_city').html(data);
            } else if (type == 'two') {
                $('#phd_two_city').html(data);
            } else {
                $('#phd_three_city').html(data);
            }
        }
    });
}