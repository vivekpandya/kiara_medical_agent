var ManageDiagnosiss = function () {
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z,"'"," ",#/-]+$/i.test(value);
    }, "Letters and spaces only please");
    var handleDetails = function () {
        $('.diagnosisServices').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                dia_name: {
                    required: true,
//                    remote: Host + "/Diagnosis/check_duplicate",
//                    lettersonly: true
                },
                sub_comment: {
                    maxlength: '1000'
                },
                dia_idc_code: {
                    required: true,
                    remote:{
                        url: Host + "/diagnosis/check_duplicate_dia_idc_code",
                        type: "post",
                        data: { 
                            dia_id: function () {
                                return $("#dia_id").val();
                            },
                            dia_idc_code: function () {
                                return $("#dia_idc_code").val();
                            },
                        }
                    },
                }
            }, messages: {
                dia_name: {
                    required: "Diagnosis Name can not be left blank",
//                    remote: "Diagnosis name already exists",
//                    lettersonly: "Entered Diagnosis name is invalid"
                },
                sub_duration: {
                    required: "Diagnosis duration can not be left blank"
                },
                dia_idc_code: {
                    required: "Diagnosis IDC code can not be left blank",
                    remote : "Diagnosis ICD code already exists"
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
                showToastMsg("success", "Diagnosis details added successfully");
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.subscriptionServices input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.subscriptionServices').validate().form()) {
                    showToastMsg("success", "Diagnosis details added successfully");
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
