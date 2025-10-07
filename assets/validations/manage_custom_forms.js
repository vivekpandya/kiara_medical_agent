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
                'rpm_questions[0]':{
                    required: true
                }
                /*'rpm_disciple[]': {
                    required: true
                }*/
            }, messages: {
                rpm_template_name: {
                    required: "Template Name can not be left blank",
                    lettersonly: "Please use digits, leters and Space only"
                },
                'rpm_questions[0]':{
                    required: "Need atleast one question"
                }/*,
                'rpm_disciple[]': {
                    required: "Disciple can not be left blank"
                }*/
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
    var handleReferralQuestions = function()
    {
        $('.manage_referral_question').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                rpm_template_name: {
                    required: true,
                    lettersonly: true
                },
                'rpm_questions[0]':{
                    required: true
                }
            }, messages: {
                rpm_template_name: {
                    required: "Template Name can not be left blank",
                    lettersonly: "Please use digits, leters and Space only"
                },
                'rpm_questions[0]':{
                    required: "Need atleast one question"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_referral_question')).hide();
                $('.alert-error', $('.manage_referral_question')).show();
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
                saveReferralForm();
            }
        });
        $('.manage_referral_question input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_referral_question').validate().form()) {
                    saveReferralForm();
                    return false;
                }
                return false;
            }
        });
    }
    var handleAdlQuestions = function()
    {
        $('.manage_adl_question').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                rpm_template_name: {
                    required: true,
                    lettersonly: true
                },
                'rpm_questions[0]':{
                    required: true
                }
            }, messages: {
                rpm_template_name: {
                    required: "Template Name can not be left blank",
                    lettersonly: "Please use digits, leters and Space only"
                },
                'rpm_questions[0]':{
                    required: "Need atleast one question"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_adl_question')).hide();
                $('.alert-error', $('.manage_adl_question')).show();
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
                saveAdlForm();
            }
        });
        $('.manage_adl_question input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_adl_question').validate().form()) {
                    saveAdlForm();
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
            handleReferralQuestions();
            handleAdlQuestions();
        }
    };
}();
$("#addQuestions").click(function () {
    count++;
    var checkboxval=0;
    var $clone = $('#questions_clone_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#addQuestions_0').remove();
    $clone.find("#status_dropdown0").attr("id", "status_dropdown" + count);
    $clone.find("#status_textbox0").attr("id", "status_textbox" + count);
    $clone.find("#activities_task_subject_drop0").attr("id", "activities_task_subject_drop" + count).attr("name", "rpm_questions[" + count + "]");
    $clone.find("#activities_task_subject_text0").val('').attr("id", "activities_task_subject_text" + count).attr("name", "rpm_questions[" + count + "]");
    $clone.find("#subject_textbox_show0").attr("id", "subject_textbox_show" + count).attr("onclick", "subject_textbox_show('" + count + "')");
    ;
    $clone.find("#subject_dropdown_show0").attr("id", "subject_dropdown_show" + count).attr("onclick", "subject_dropdown_show('" + count + "')");
    ;
    $clone.find("input[name='grq_id[0]']").attr("name", "grq_id[" + count + "]").val('');
    $clone.find("input[name='rpm_yes[0]']").attr("name", "rpm_yes[" + count + "]");
    $clone.find("input[name='rpm_no[0]']").attr("name", "rpm_no[" + count + "]");
    $clone.find("input[name='rpm_nr[0]']").attr("name", "rpm_nr[" + count + "]");
    $clone.find("input[name='rpm_text[0]']").attr("name", "rpm_text[" + count + "]");
    $clone.find("input[name='rpm_notes[0]']").attr("name", "rpm_notes[" + count + "]");
    $clone.find("input[name='rpm_checkbox[0]']").attr("name", "rpm_checkbox[" + count + "]").prop('checked', false).attr('onchange',"showhidelabel('"+count+"');");
    $clone.find("#grc_checkbox_labels0").attr("id", "grc_checkbox_labels" + count);
    $clone.find("#status_checkboxlabel_0").attr("id", "status_checkboxlabel_" + count).hide();
    $clone.find("#addLables_0").find('#addLables').attr("onclick","checkboxclone('"+count+"')");
    $clone.find("#addLables_0").attr("id","addLables_"+count);
    
    $clone.find('.checkbox_clone_0').attr('class','checkbox_clone_'+count).html('');
    $clone.find("input[name='grc_id[0][0]']").attr("name","grc_id["+count+"]["+checkboxval+"]").html('');
    $clone.find("input[name='grc_id[" + count + "]["+checkboxval+"]").val("");
   // $clone.find("input[name='grc_id["+count+"]["+checkboxval+"]']").val("");
    $clone.find("input[name='ckecboxval[0][0]']").attr("name","ckecboxval["+count+"]["+checkboxval+"]").attr('id', "ckecboxval_" + (count));
    $clone.find("input[name='grc_checkbox_labels[0][0]']").attr("name", "grc_checkbox_labels[" + count + "][" + checkboxval + "]");
    $clone.attr('id', "questions_clone_" + (count));
    $('.questions_clone:last').after($clone);

    //checkboxval++;
    $('#ckecboxval_'+count).val(checkboxval);

});

function checkboxclone(tcclone){
    var checkboxcount  = $('#ckecboxval_'+tcclone).val(); 
        checkboxcount++;
    var $clone = $('#status_checkboxlabel_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#addLables_0').remove();
    $clone.find("input[name='grc_id[0][0]").attr("name", "grc_id[" + tcclone + "]["+checkboxcount+"]").show();
    $clone.find("input[name='grc_id[" + tcclone + "]["+checkboxcount+"]").val("");
    //$clone.find("#grc_checkbox_labels0").attr("name", "grc_checkbox_labels[" + tcclone + "][]").show();
    $clone.find("input[name='grc_checkbox_labels[0][0]").attr("name", "grc_checkbox_labels[" + tcclone + "]["+checkboxcount+"]").show();
    $clone.attr('id', "").attr("class","span12 status_checkboxlabel_child").show();
    $('.checkbox_clone_'+tcclone).append($clone);
    $('#ckecboxval_'+tcclone).val(checkboxcount);
}


function showhidelabel(paramno){
    if ($("input[name='rpm_checkbox["+paramno+"]']").is(":checked")) {
        $('#status_checkboxlabel_'+paramno).show();
    }else {
        $('#status_checkboxlabel_'+paramno).hide();
        $('.checkbox_clone_'+paramno).html('');
    }
}
function showloader(){
    $('#fade').show();
    $('#loader').show();
}

function hideloader(){
    $('#fade').hide();
    $('#loader').hide();
}
function save_generateform(){
    
        showloader();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $.ajax({
            url: Host + "custom_forms/save_data",
            type: "POST",
            async: false,
            data: $("#manage_generate_rpm").serialize(),
            success: function (data) {
                hideloader();
                if (data == 'success'){
                    showToastMsg("success", "Form has been saved successfully");
                    setTimeout(function(){
                        window.open(HOST+"custom_forms", '_self');
                    },2000);
                    
                }else {
                    showToastMsg("error", "Error in adding form, try again");
                }
                return false;
            },
            statusCode: {
                500: function() {
                    hideloader();
                  showToastMsg("error", "Error in adding form, try again");
                }
            }
        });
    
}
function saveReferralForm()
{
    showloader();
    $.ajax({
        url: Host + "referral_question/save_data",
        type: "POST",
        async: false,
        data: $("#manage_referral_question").serialize(),
        success: function (data) {
            hideloader();
            if (data == 'success'){
                showToastMsg("success", "Referral template has been saved successfully");
                setTimeout(function(){
                    window.open(HOST+"referral_questions", '_self');
                },2000);
                
            }else {
                showToastMsg("error", "Error in adding template, try again");
            }
            return false;
        },
        statusCode: {
            500: function() {
                hideloader();
              showToastMsg("error", "Error in adding template, try again");
            }
        }
    });
}
function saveAdlForm()
{
    showloader();
    $.ajax({
        url: Host + "adl_question/save_data",
        type: "POST",
        async: false,
        data: $("#manage_adl_question").serialize(),
        success: function (data) {
            hideloader();
            if (data == 'success'){
                showToastMsg("success", "Adl template has been saved successfully");
                setTimeout(function(){
                    window.open(HOST+"adl_questions", '_self');
                },2000);
                
            }else {
                showToastMsg("error", "Error in adding template, try again");
            }
            return false;
        },
        statusCode: {
            500: function() {
                hideloader();
              showToastMsg("error", "Error in adding template, try again");
            }
        }
    });
}
$("#adladdQuestions").click(function () {
    count++;
    var checkboxval=0;
    var $clone = $('#adlquestions_clone_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#adladdQuestions_0').remove();
    $clone.find("#status_dropdown0").attr("id", "status_dropdown" + count);
    $clone.find("#status_textbox0").attr("id", "status_textbox" + count);
    $clone.find("#activities_task_subject_drop0").attr("id", "activities_task_subject_drop" + count).attr("name", "rpm_questions[" + count + "]");
    $clone.find("#activities_task_subject_text0").val('').attr("id", "activities_task_subject_text" + count).attr("name", "rpm_questions[" + count + "]");
    $clone.find("#subject_textbox_show0").attr("id", "subject_textbox_show" + count).attr("onclick", "subject_textbox_show('" + count + "')");
    ;
    $clone.find("#subject_dropdown_show0").attr("id", "subject_dropdown_show" + count).attr("onclick", "subject_dropdown_show('" + count + "')");
    ;
    $clone.find("input[name='grq_id[0]']").attr("name", "grq_id[" + count + "]").val('');
    $clone.find("input[name='rpm_yes[0]']").attr("name", "rpm_yes[" + count + "]");
    $clone.find("input[name='rpm_no[0]']").attr("name", "rpm_no[" + count + "]");
    $clone.find("input[name='rpm_nr[0]']").attr("name", "rpm_nr[" + count + "]");
    $clone.find("input[name='rpm_text[0]']").attr("name", "rpm_text[" + count + "]");
    $clone.find("input[name='rpm_notes[0]']").attr("name", "rpm_notes[" + count + "]");
    $clone.find("input[name='rpm_response_date[0]']").attr("name", "rpm_response_date[" + count + "]");
    $clone.find("input[name='rpm_response_date_range[0]']").attr("name", "rpm_response_date_range[" + count + "]");
    $clone.find("input[name='rpm_checkbox[0]']").attr("name", "rpm_checkbox[" + count + "]").prop('checked', false).attr('onchange',"showhidelabeladl('"+count+"');");
    $clone.find("#grc_checkbox_labels0").attr("id", "grc_checkbox_labels" + count);
    $clone.find("#adlstatus_checkboxlabel_0").attr("id", "adlstatus_checkboxlabel_" + count).hide();
    $clone.find("#adladdLables_0").find('#adladdLables').attr("onclick","checkboxcloneadl('"+count+"')");
    $clone.find("#adladdLables_0").attr("id","adladdLables_"+count);
    
    $clone.find('.adlcheckbox_clone_0').attr('class','adlcheckbox_clone_'+count).html('');
    $clone.find("input[name='grc_id[0][0]']").attr("name","grc_id["+count+"]["+checkboxval+"]").html('');
    $clone.find("input[name='grc_id[" + count + "]["+checkboxval+"]").val("");
   // $clone.find("input[name='grc_id["+count+"]["+checkboxval+"]']").val("");
    $clone.find("input[name='ckecboxval[0][0]']").attr("name","ckecboxval["+count+"]["+checkboxval+"]").attr('id', "adlckecboxval_" + (count));
    $clone.find("input[name='grc_checkbox_labels[0][0]']").attr("name", "grc_checkbox_labels[" + count + "][" + checkboxval + "]");
    $clone.attr('id', "adlquestions_clone_" + (count));
    $('.adlquestions_clone:last').after($clone);

    //checkboxval++;
    $('#adlckecboxval_'+count).val(checkboxval);

});
function checkboxcloneadl(tcclone){
    var checkboxcount  = $('#adlckecboxval_'+tcclone).val(); 
        checkboxcount++;
    var $clone = $('#adlstatus_checkboxlabel_0').clone();
    $clone.find("input[type='text']").val("");
    $clone.find('#adladdLables_0').remove();
    $clone.find("input[name='grc_id[0][0]").attr("name", "grc_id[" + tcclone + "]["+checkboxcount+"]").show();
    $clone.find("input[name='grc_id[" + tcclone + "]["+checkboxcount+"]").val("");
    //$clone.find("#grc_checkbox_labels0").attr("name", "grc_checkbox_labels[" + tcclone + "][]").show();
    $clone.find("input[name='grc_checkbox_labels[0][0]").attr("name", "grc_checkbox_labels[" + tcclone + "]["+checkboxcount+"]").show();
    $clone.attr('id', "").attr("class","span12 status_checkboxlabel_child").show();
    $('.adlcheckbox_clone_'+tcclone).append($clone);
    $('#adlckecboxval_'+tcclone).val(checkboxcount);
}


function showhidelabeladl(paramno){
    if ($("input[name='rpm_checkbox["+paramno+"]']").is(":checked")) {
        $('#adlstatus_checkboxlabel_'+paramno).show();
    }else {
        $('#adlstatus_checkboxlabel_'+paramno).hide();
        $('.adlcheckbox_clone_'+paramno).html('');
    }
}