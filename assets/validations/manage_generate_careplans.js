var Managegeneratecareplans = function () {
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z,0-9," "]+$/i.test(value);
    }, "Alphabets, Numbers and spaces only please");
    var handlegenerateform = function () {
        $('.manage_generate_careplan').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                gcp_template_name: {
                    required: true,
                    lettersonly: true
                },
                gcp_disciple: {
                    required: true
                }
            }, messages: {
                gcp_template_name: {
                    required: "Template Name can not be left blank" ,
                    lettersonly: "Please use digits, leters and Space only"
                },
                gcp_disciple: {
                    required: "Disciple can not be left blank"
                }                
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_generate_careplan')).hide();
                $('.alert-error', $('.manage_generate_careplan')).show();
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
                save_generatecareplans();
            }
        });

        $('.manage_generate_careplan input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_generate_careplan').validate().form()) {
                    //save_generatecareplans();
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
$("#addProblems").click(function () {
    count++;
    var $clone = $('#problems_clone_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#addProblems_0').remove();
    //$clone.find("label").text("");
    $clone.find('#gcp_problems_0').attr("id", "gcp_problems_" + count).attr("style", "");
    $clone.attr('id', "problems_clone_" + (count));
    $clone.find('input[name=problems_question_0]').attr("name", "problems_question_" + count);
    $('.problems_clone:last').after($clone);
});

var goalscount = 0;
$("#addgoals").click(function () {
    goalscount++;
    var $clone = $('#goals_clone_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#addgoals_0').remove();
    //$clone.find("label").text("");
    $clone.find('#gcp_goals_0').attr("id", "gcp_goals_" + goalscount).attr("style", "");
    $clone.attr('id', "goals_clone_" + (goalscount));
    $clone.find('input[name=ccp_goals_question_0]').attr("name", "ccp_goals_question_" + goalscount);
    $('.goals_clone:last').after($clone);
});

var interventionscount = 0;
$("#addinterventions").click(function () {
    interventionscount++;
    var $clone = $('#interventions_clone_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#addinterventions_0').remove();
    $clone.find("label").text("");
    $clone.find('#gcp_interventions_0').attr("id", "gcp_interventions_" + interventionscount).attr("style", "");
    $clone.attr('id', "interventions_clone_" + (interventionscount));
    $('.interventions_clone:last').after($clone);
});

function save_generatecareplans(){
    $.ajax({
        url: Host + "generate_care_plan/save_data",
        type: "POST",
        async: false,
        data: $("#manage_generate_careplan").serialize(),
        success: function (data) {
            if (data == 'success'){
                window.open(HOST+"generate_care_plan", '_self');

            }else {
                showToastMsg("error", "Error in adding care plan and try again.");
            }
            return false;
        },
        statusCode: {
            500: function() {
              showToastMsg("error", "Error in adding care plan and try again.");
            }
        }
    });
}
