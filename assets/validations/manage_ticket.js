var Host = $("#admin_base_url").val();
var cus_id = $('#tc_cus_id').val();
$("#tc_type,#tc_status,#tc_priority,#tc_assigned_to,#tc_module").select2();
$("#tc_cus_id").select2({
    width: "820px"
});
$("#tc_dcc_id").select2({
    width: "820px"
});
CKEDITOR.replace('tc_desc', {
    fullPage: true,
    scayt_autoStartup: true,
    scayt_maxSuggestions: 3,
    allowedContent: true,
    width: "960px",
    height: "200px",
    filebrowserUploadUrl: Host + "/ticket_system/uploadFile",
    filebrowserUploadMethod: 'form'
});
$("#tc_phone").mask("999-999-9999");
$('#tc_created_on, #tc_completion_date').datepicker({
    dateFormat: 'mm/dd/yy',
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'mm/dd/yy',
    yearRange: "-100:+100",
    selectCurrent: true
});

$("#tc_start_date").datepicker({
        format: "mm/dd/yy",
        dateFormat: 'mm/dd/yy',
        autoclose: true,
        onSelect: function(selected) {
            var dt1 = new Date(selected);
            dt1.setDate(dt1.getDate());
            $("#tc_end_date").datepicker("option", "minDate", dt1);
        }
    });

$("#tc_end_date").datepicker({
    format: "mm/dd/yy",
    dateFormat: 'mm/dd/yy',
    autoclose: true,
    onSelect: function(selected) {
        var dt2 = new Date(selected);
        dt2.setDate(dt2.getDate());
        $("#tc_start_date").datepicker("option", "maxDate", dt2);
    }
});

$("#tc_actual_start_date").datepicker({
        format: "mm/dd/yy",
        dateFormat: 'mm/dd/yy',
        autoclose: true,
        onSelect: function(selected) {
            var dt1 = new Date(selected);
            dt1.setDate(dt1.getDate());
            $("#tc_actual_end_date").datepicker("option", "minDate", dt1);
        }
    });

$("#tc_actual_end_date").datepicker({
    format: "mm/dd/yy",
    dateFormat: 'mm/dd/yy',
    autoclose: true,
    onSelect: function(selected) {
        var dt2 = new Date(selected);
        dt2.setDate(dt2.getDate());
        $("#tc_actual_start_date").datepicker("option", "maxDate", dt2);
    }
});

var ManageTicket = function () {
    jQuery.validator.addMethod("hoursfrmt", function (value, element) {
        return this.optional(element) || /^(\d{0,3}).?([0-5]\d)$/i.test(value);
    }, "Only hours format - allowed");
    $.validator.addMethod("alphanumber", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s0-9\w(\w)\w,\w.\w&\w?\w%\w$\w#\w+\w^\w!\w@\w>\w=\w-\w#\w&\w_\w:\w;\w<\w-\w(\w)\w*\w/]+$/);
    }, "Only alphabetical characters, Apostrophe not allowed.");
    var handleTicket = function () {
        $('#ticketsystem').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                tc_cus_id: {
                    required: true
                },
                tc_subject: {
                    required: true,
                    alphanumber: true

                },
                tc_status: {
                    required: true
                },
                tc_type: {
                    required: true
                },
                tc_priority: {
                    required: true
                },
                tc_email: {
                    email: true
                },
                tc_total_hrs: {
                    hoursfrmt: true,
                },
                tc_created_on: {
                    required: true
                }
            }, messages: {
                tc_cus_id: {
                    required: "Customer is required"
                },
                tc_subject: {
                    required: "Subject is required",
                    alphanumber: "Only AlphaNumeric Characters allowed, Apostrophe not allowed."
                },
                tc_status: {
                    required: "Status is required"
                },
                tc_type: {
                    required: "Type is required"
                },
                tc_priority: {
                    required: "Priority is required"
                },
                tc_email: {
                    email: "Enter correct Email Address"
                },
                tc_total_hrs: {
                    hoursfrmt: "Enter hours and minutes in proper format eg. 32.30",
                },
                tc_created_on: {
                    required: "Request date is required"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('#ticketsystem')).hide();
                $('.alert-error', $('#ticketsystem')).show();
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
    }
    var handleActivity = function () {
        $('#activity_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                act_name: {
                    required: true,
                    alphanumber: true,
                    minlength: '3',
                },
                act_total_hrs: {
                    hoursfrmt: true,
                }
            }, messages: {
                act_name: {
                    required: "Activity is required",
                    alphanumber: "Only alphabets and numbers allowed.",
                    minlength: "Minimum 3 letters required",
                },
                act_total_hrs: {
                    hoursfrmt: "Enter hours and minutes in proper format eg. 32.30",
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('#activity_form')).hide();
                $('.alert-error', $('#activity_form')).show();
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
                    var formData = new FormData($('#activity_form')[0]);
                    showloader();
                    $('#manageactivityContent').modal('hide');
                    $.ajax({
                        url: Host + "/ticket_system/activity_save",
                        type: 'POST',
                        data : formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            data = data.split('@@#@@');
                            if (data[0] === 'ActivityAdd') {
                            showToastMsg("success", "Activity has been added successfully");
                            } else if (data[0] === '') {
                                showToastMsg("success", "Activity has been updated successfully");
                            } else if(data[0] !="") {
                                showToastMsg("error", data);
                            }
                            if(data[3] == "Yes"){
                                showEmailOrderDivActivity(data[4]);
                            }
                            loadActivities();
                            $('#tc_balance_hrs').val(data[1]);
                            $('#tc_actual_hrs').val(data[2]);
                            $('#tc_qa_hrs').val(data[5]);
                            hideloader();
                            $('#activityModalcontent').html('');
                        }
                    });
                    hideloader();
                }, 1000);
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handleTicket();
            handleActivity();
        }
    };
}();

function updateBalancehrs(tc_id) {
    showloader();

    $.ajax({
        url: Host + "/ticket_system/updateBalanceHours",
        type: 'POST',
        async: true,
        data: 'tc_id=' + tc_id + '&type=change&total_hrs=' + $('#tc_total_hrs').val(),
        success: function (data) {
            $('#tc_balance_hrs').val(data);
        }
    });
    hideloader();

}

function getcusdetails() {
    showloader();
    var cus_id = $('#tc_cus_id').val();
    $.ajax({
        type: 'POST',
        url: Host + "/ticket_system/getcusdetails",
        data: "cus_id=" + cus_id,
        success: function (data) {
            data = data.split('@@@@');
            if (data[0] != '') {
               // $('#tc_phone').val(data[0]);
            }
            if (data[1] != '') {
                //$('#tc_email').val(data[1]);
            }
        }
    });
    hideloader();
}

function getdccdetails() {
    showloader();
    var cus_id = $('#tc_cus_id').val();
    $.ajax({
        type: 'POST',
        url: Host + "/ticket_system/getDccDetails",
        data: "cus_id=" + cus_id,
        success: function (data) {
//            alert(data);
//            var toAppend = '';
//                $.each(data,function(i,o){
//                    alert(o.dcc_id);
//                toAppend += '<option>'+o.dcc_id+'</option>';
//               });
//
//              $('#tc_dcc_id').append(toAppend);
//            
            
            var options = '';
            for (var i = 0; i < data.length; i++) {
                for (var j = 0; j< data[i].length; j++){
                    options += '<option value="' + data[i][j].dcc_id + '">' + data[i][j].dcc_name + '</option>';
                }
            }
            $("#tc_dcc_id").html(options);

    
//            $('select[name="tc_dcc_id"]').empty();
//            $.each(data, function(key, value) {
//                $('select[name="tc_dcc_id"]').append('<option value="'+ key.dcc_id +'">'+ value.dcc_name +'</option>');
//            });
        }
    });
    hideloader();
}

function displayDetails() {
    var statusticket = $('#tc_status').val();
    if (statusticket != "3") {
        $('#tc_status_details').show();
    } else {
        $('#tc_status_details').hide();
    }
}

function loadDocuments() {
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "/ticket_system/getdocumentslist",
        data: "tc_id=" + $('#tc_id').val(),
        success: function (data) {
            $('#ticket_dynamic_div').html(data);
            hideloader();
        }
    });
}

function loadActivities() {

    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "/ticket_system/getactivitylist",
        data: "tc_id=" + $('#tc_id').val() + '&activity_type=' + $('#ActivitySearch').val(),
        success: function (data) {
            $('#ticket_dynamic_div').html(data);
            hideloader();
        }
    });
}

   