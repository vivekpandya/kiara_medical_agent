var Managegenerateforms = function () {
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z,0-9," "]+$/i.test(value);
    }, "Alphabets, Numbers and spaces only please");
    var handlegenerateform = function () {
        $('.manage_generate_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                gf_name: {
                    required: true,
                    lettersonly: true
                },
                gf_type: {
                    required: true
                }
            }, messages: {
                gf_type: {
                    required: "Module Type can not be left blank"
                },
                gf_name: {
                    required: "Form Name can not be left blank"                    
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_generate_form')).hide();
                $('.alert-error', $('.manage_generate_form')).show();
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
                save_generateform();
            }
        });

        $('.manage_generate_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_generate_form').validate().form()) {
                    //save_generateform();
                    return false;
                }
                return false;
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handlegenerateform();
        }

    };
}();
var count = 0;
$("#addLeftValues").click(function () {
    count++;
    var $clone = $('#leftvalues_clone_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#addLink_0').remove();
    $clone.find(".removeClone").remove();
    $clone.find("label").text("");
    $clone.find('#gf_col_name_0').attr("id", "gf_col_name_" + count).attr("style", "");
    $clone.attr('id', "leftvalues_clone_" + (count));
    $('.left_clone:last').after($clone);
});

function save_generateform(){
    
    var error = 0;
    $("input[name^='gf_col_name[]']").each(function () {
        var current_val = $(this).val();
        var letters = /^[0-9 a-zA-Z]+$/;
        if(current_val.match(letters))
        {
            
        } else {
            error++;
        }
    });

    if(error<=0){
        $.ajax({
            url: Host + "GenerateForms/save_data",
            type: "POST",
            async: false,
            data: $("#manage_generate_form").serialize(),
            success: function (data) {
                if (data == 'success'){
                    //showToastMsg("success", "Form data are added successfully");
                    //location.reload();
                    window.open(HOST+"generateforms", '_self');
                    
                }else {
                    
                    showToastMsg("error", "Error in adding form, check all values are uniquely entered or size should be less than 55 Characters.and try again");
                }
                return false;
            },
            statusCode: {
                500: function() {
                  showToastMsg("error", "Error in adding form, check all values are uniquely entered or size should be less than 55 Characters.and try again");
                }
            }
        });
    } else {
        showToastMsg("error", "Error in adding form! Only Alphabets, Numbers and spaces are allowed for Left Values.");
    }
}
