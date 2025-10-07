var ManageAmbulance = function () {
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z,"'"," ",#/-]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("alphSpace", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Only alphabetical characters");
    var handleAmbulance = function () {
        $('.manage_ambulance_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                ambu_comp_name: {
                    required: true,
                    lettersonly: true
                },
                ambu_phone: {
                    required: true,
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                ambu_npi: {
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
                ambu_first_name: {
                    alphSpace: true
                },
                ambu_last_name: {
                    alphSpace: true
                },
                ambu_store_name: {
                    alphSpace: true
                },
                ambu_email: {
                    email: true
                },
                ambu_com_no: {
                    usPhone: true
                },
                ambu_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }
            }, messages: {
                ambu_phone: {
                    required: "Mobile Number can not be left blank",
                    usPhone: "Mobile Number is invalid",
                    minlength: "Mobile Number must be of 10 digits",
                    maxlength: "Mobile Number must be of 10 digits"
                },
                ambu_npi: {
                    digits: "NPI is invalid",
                    minlength: "NPI must be of 10 digits",
                    maxlength: "NPI must be of 10 digits"
                },
                ambu_comp_name: {
                    required: "Company Name can not be left blank",
                    lettersonly: "First Name is invalid",
                },
                ambu_first_name: {
                    alphSpace: "First Name is invalid",
                },
                ambu_last_name: {
                    alphSpace: "Last Name is invalid",
                },
                ambu_store_name: {
                    alphSpace: "Company Name is invalid",
                },
                ambu_email: {
                    email: "Email is invalid"
                },
                ambu_com_no: {
                    usPhone: "Company Number is invalid",
                    minlength: "Company Number must be of 10 digits",
                    maxlength: "Company Number must be of 10 digits"
                },
                ambu_zip: {
                    digits: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_ambulance_form')).hide();
                $('.alert-error', $('.manage_ambulance_form')).show();
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
                $('#manageAmbulanceContent').modal('hide');
                if ($('#ambu_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.manage_ambulance_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_ambulance_form').validate().form()) {
                    $('#manageAmbulanceContent').modal('hide');
                    if ($('#ambu_id').val() > 0) {
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
            handleAmbulance();
        }

    };
}();
function sortTable(elem, columnName) {
    var colName = $("#colname").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort").val();
    if (colName != columnName)
    {
        $("#sort").val('asc');
    } else {
        if (sort == 'asc')
            $("#sort").val("desc");
        else
            $("#sort").val('asc');
    }
    $("#colname").val(columnName);
    $("#col").val(col);
    loadDataByPage(1);
}
function loadDataByPage(page) {
    showloader();
    var ambu_name = $('#search_ambulance').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "ambulance/ambulance_list",
        data: "page=" + page + "&status=" + status + "&ambu_name=" + ambu_name + "&sort=" + sort + "&colname=" + colname,
        success: function (data) {
            $('#physicianlist').html(data);
            if (sort == 'asc')
            {
                $("table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-up');
            }
            else {
                $("table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-down');
            }
            hideloader();
        }
    });
}

function ambulancePrint(){
    showloader();
    var ambu_name = $('#search_ambulance').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "ambulance/ambulance_print",
        data: "status=" + status + "&ambu_name=" + ambu_name + "&sort=" + sort + "&colname=" + colname,
        success: function (data) {
            hideloader();
            if (typeof data != 'object')
                {
                    window.open(data, '_blank');
                    return false;
                } 
        }
    });
}
$(function () {
    var cache = {};
    $("#search_ambulance").autocomplete({
        minLength: 1,
        autoFocus: true,
        source: function (request, response) {
            var term = request.term;
            var status = $('#StatusSearch').val();
            if (term in cache) {
                response(cache[ term ]);
                return;
            }
            request['status'] = status;
            $.getJSON(Host + "ambulance/search_ambulance", request, function (data, status, xhr) {
                cache[ term ] = data;
                response(data);
            });
        },
        select: function (event, ui) {
            if (ui.item) {
                fill(ui.item.value);
            }
        }
    });
});
$('#search_ambulance').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_ambulance').val(unescape(thisValue));
    setTimeout("$('.ui-autocomplete').hide();", 200);
    loadDataByPage(1);
}
function showDeleteModal(id) {
    $('#showPhysicalDeleteModal #deletePhysicianModal').removeAttr('onclick');
    $('#showPhysicalDeleteModal #deletePhysicianModal').attr('onClick', 'deletePhysician(' + id + ');');
    $('#showPhysicalDeleteModal').modal('show');
}
function deletePhysician(id) {
    $.ajax({
        type: 'POST',
        url: Host + "ambulance/delete_ambulance",
        data: "ambu_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "Ambulance deleted successfully");
        }
    });
}
function getStateList(country_id) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getStateList",
        data: "country_id=" + country_id,
        success: function (data) {
            $('#ambu_state').html(data);
        }
    });
}
function getCityList(state_id, type) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getCityList",
        data: "state_id=" + state_id,
        success: function (data) {
            $('#ambu_city').html(data);
        }
    });
}