/*var ManagePrintForm = function () {
     jQuery.validator.addMethod("formsname", function (value, elem, param) {
        if ($(".formname:checkbox:checked").length > 0) {
            return true;
        } else {
            return false;
        }
    }, "You must select at least one form!");
    var handlePrintForm  = function () {
        var checkboxes = $('.formname');
	var checkbox_names = $.map(checkboxes, function(e, i) {
		return $(e).attr("name")
	}).join(" ");
        $('#print_form_email').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                formprint_email:{
                  required: true,
                  email: true  
                },
                'formprint_adm[]':{
                   formsname: true
                }
            },
            groups: {
                checkboxes: checkbox_names
            },
            messages: {
                formprint_email:{
                  required: "Email is required", 
                  email: "Email is invalid"
                },
                'formprint_adm[]':{
                   formsname: "You must select at least one form!"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('#print_form_email')).hide();
                $('.alert-error', $('#print_form_email')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.input-append').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.input-append').addClass('success').removeClass('error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                var type = $(element).attr("type");
//                if (type === "checkbox")
//                    error.addClass('help-small no-left-padding marginleft').insertAfter(element.closest('.input-append'));
//                else    
                    error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
            },
            submitHandler: function (form) {
                setTimeout(function () {
                        showloader();
                        $.ajax({
                            type: 'POST',
                            url: Host + "clients/save_printform",
                            data: $('#print_form_email').serialize(),
                            async: false,
                            success: function (data) {
                                hideloader();
                                if (data == 'success'){
                                    showToastMsg("success", "Email sent Successfully");
                                     $('#print_form_email').trigger("reset");
                                }
                                return false;
                            }
                        });
                    }, 1000);
                    return false;
            }
        });

        $('#print_form_email input').keypress(function (e) {
            if (e.which == 13) {
                if ($('#print_form_email').validate().form()) {
                    setTimeout(function () {
                        showloader();
                        $.ajax({
                            type: 'POST',
                            url: Host + "clients/save_printform",
                            data: $('#print_form_email').serialize(),
                            async: false,
                            success: function (data) {
                                hideloader();
                                if (data == 'success'){
                                    showToastMsg("success", "Email sent Successfully");
                                    $('#print_form_email').trigger("reset");
                                } else if( data == 'failed_to_send_email'){
                                    showToastMsg("error", "Email Failed, Try again");
                                } 
                                return false;
                            }
                        });
                    }, 1000);
                    return false;
                }
                return false;
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handlePrintForm();
        }

    };
}();
*/