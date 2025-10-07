var ManageLevelOfCare = function () {
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    var handleLevelOfCare = function () {
        $('.manage_level_of_care_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                level_of_care : {
                    required : true,
                    // digits: true,
                    remote: {
                        url: Host + "level_of_care/check_duplicate_level_of_care",
                        type: "POST",
                        data: {
                            level_of_care: function () {
                                var level_of_care = $("#level_of_care").val();
                                return level_of_care;
                            },
                            level_of_care_id: function () {
                                var level_of_care_id = $("#level_of_care_id").val();
                                return level_of_care_id;
                            },
                            level_of_care_for: function(){
                                var level_of_care_for = $("#myform input[type='level_of_care_for']:checked").val();
                                return level_of_care_for;
                            }
                        }
                    }
                },
                level_of_care_label : {
                    required : true,
                    remote: {
                        url: Host + "level_of_care/check_duplicate_level_of_care_label",
                        type: "POST",
                        data: {
                            level_of_care_label: function () {
                                var level_of_care = $("#level_of_care_label").val();
                                return level_of_care;
                            },
                            level_of_care_id: function () {
                                var level_of_care_id = $("#level_of_care_id").val();
                                return level_of_care_id;
                            },
                            level_of_care_for: function(){
                                var level_of_care_for = $("#myform input[type='level_of_care_for']:checked").val();
                                return level_of_care_for;
                            }
                        }
                    }
                }
            }, messages: {
                level_of_care : {
                    required : "Level of care can not left blank",
                    remote: "Level of care already exist, please enter different",
                },
                level_of_care_label : {
                    required : "Label can not left blank",
                    remote: "Label already exist, please enter different",
                },

            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_level_of_care_form')).hide();
                $('.alert-error', $('.manage_level_of_care_form')).show();
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

        $('.manage_level_of_care_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_level_of_care_form').validate().form()) {
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
            handleLevelOfCare();
        }
    };
}();
