var Managegenerateforms = function () {

    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z,0-9," "]+$/i.test(value);
    }, "Alphabets, Numbers and spaces only please");
    var handlegenerateform = function () {
        $('.manage_generate_rpm').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                rpm_template_name: {
                    required: true,
                    lettersonly: true
                },
                'rpm_questions[0]': {
                    required: true
                },
                // 'rpm_disciple[]': {
                //     required: true
                // }
            }, messages: {
                rpm_template_name: {
                    required: "Template Name can not be left blank",
                    lettersonly: "Please use digits, leters and Space only"
                },
                'rpm_questions[0]': {
                    required: "Need atleast one question"
                },
                // 'rpm_disciple[]': {
                //     required: "Disciple can not be left blank"
                // }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_generate_rpm')).hide();
                $('.alert-error', $('.manage_generate_rpm')).show();
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

        $('.manage_generate_rpm input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_generate_rpm').validate().form()) {
                    save_generateform();
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
$("#addQuestions").click(function () {
    count++;
    var $clone = $('#questions_clone_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#addQuestions_0').remove();
    
    $clone.find("#status_dropdown0").attr("id", "status_dropdown" + count);
    $clone.find("#status_textbox0").attr("id", "status_textbox" + count);
    $clone.find("#que_title_div_0").attr("id", "que_title_div_" + count);
    $clone.find("#response_div_0").attr("id", "response_div_" + count);
    $clone.find("#chkbox_div_0").attr("id", "chkbox_div_" + count);
    $clone.find("#activities_task_subject_drop0").attr("id", "activities_task_subject_drop" + count).attr("name", "rpm_questions[" + count + "]");
    $clone.find("#activities_task_subject_text0").val('').attr("id", "activities_task_subject_text" + count).attr("name", "rpm_questions[" + count + "]");
    $clone.find("#subject_textbox_show0").attr("id", "subject_textbox_show" + count).attr("onclick", "subject_textbox_show('" + count + "')");
    $clone.find("#subject_textbox_remove0").attr("id", "subject_textbox_remove" + count).attr("onclick", "subject_textbox_remove('" + count + "')");
    $clone.find('#subject_textbox_remove' + count).show();
    ;
    $clone.find("#subject_dropdown_show0").attr("id", "subject_dropdown_show" + count).attr("onclick", "subject_dropdown_show('" + count + "')");
    $clone.find("#subject_dropdown_remove0").attr("id", "subject_dropdown_remove" + count).attr("onclick", "subject_dropdown_remove('" + count + "')").attr("style","");
    ;
    $clone.find('#subject_dropdown_remove' + count).show();
    $clone.find("input[name='grq_id[0]']").attr("name", "grq_id[" + count + "]").val('');
    $clone.find("input[name='rpm_yes[0]']").attr("name", "rpm_yes[" + count + "]");
    $clone.find("input[name='rpm_no[0]']").attr("name", "rpm_no[" + count + "]");
    $clone.find("input[name='rpm_nr[0]']").attr("name", "rpm_nr[" + count + "]");
    $clone.find("input[name='rpm_text[0]']").attr("name", "rpm_text[" + count + "]");
    $clone.find("input[name='rpm_notes[0]']").attr("name", "rpm_notes[" + count + "]");
    $clone.find("input[name='rpm_checkbox[0]']").attr("name", "rpm_checkbox[" + count + "]").prop('checked', false).attr('onchange', "showhidelabel('" + count + "');");
    $clone.find("#grc_checkbox_labels0").attr("id", "grc_checkbox_labels" + count);
    $clone.find("#status_checkboxlabel_0").attr("id", "status_checkboxlabel_" + count).hide();
    $clone.find("#addLables_0").find('#addLables').attr("onclick", "checkboxclone('" + count + "')");
    $clone.find("#addLables_0").attr("id", "addLables_" + count);
    $clone.find('.checkbox_clone_0').attr('class', 'checkbox_clone_' + count).html('');
    $clone.find("input[name='grc_checkbox_labels[0][]']").attr("name", "grc_checkbox_labels[" + count + "][]").prop('id', "grc_checkbox_labels" + count).val('');
    $clone.attr('id', "questions_clone_" + (count));
    $('.questions_clone:last').after($clone);
});


//$("#addLables").click(function () {
function checkboxclone(tcclone) {
    checkboxcount++;
    var $clone = $('#status_checkboxlabel_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#grc_removeLables0').show();

    $clone.find("#grc_removeLables0").attr("onclick", "checkboxcloneRemove('" + checkboxcount + tcclone + "')");
    $clone.find('#addLables_0').remove();
    //$clone.find("#grc_checkbox_labels0").attr("name", "grc_checkbox_labels[" + tcclone + "][]").show();
    $clone.find("input[name='grc_checkbox_labels[0][]").attr("name", "grc_checkbox_labels[" + tcclone + "][]").show();

    $clone.attr('id', "").attr("class", "span12 status_checkboxlabel_child grc_div" + checkboxcount + tcclone).show();

    $('.checkbox_clone_' + tcclone).append($clone);
}

function checkboxcloneRemove(id) {
    $(".grc_div" + id).remove();
}

function showhidelabel(paramno) {
    if ($("input[name='rpm_checkbox[" + paramno + "]']").is(":checked")) {
        $('#status_checkboxlabel_' + paramno).show();
    } else {
        $('#status_checkboxlabel_' + paramno).hide();
        $('.checkbox_clone_' + paramno).html('');
    }
}

function save_generateform() {
    CKEDITOR.instances.blank_activities_task_subject_text0.updateElement();
    $.ajax({
        url: Host + "/customForms/save_data",
        type: "POST",
        async: false,
        data: $("#manage_generate_rpm").serialize(),
        success: function (data) {
            if (data == 'success') {
                window.open(Host + "/custom_form", '_self');
            } else {
                showToastMsg("error", "Error in adding form, try again");
            }
            return false;
        },
        statusCode: {
            500: function () {
                showToastMsg("error", "Error in adding form, try again");
            }
        }
    });

}
