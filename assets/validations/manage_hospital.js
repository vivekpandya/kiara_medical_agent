var Host = $('#base_url').val();
var ManageHospital = function () {
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
    var handleHospital = function () {
        $('.manage_hospital_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                hospital_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                hospital_npi: {
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
                hospital_name: {
                    alphSpace: true,
                    required:true
                },
                hospital_store_name: {
                    alphSpace: true,
                    required:true
                },
                hospital_email: {
                    email: true
                },
                hospital_fax: {
                    usPhone: true
                },
                hospital_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }
            }, messages: {
                hospital_phone: {
                    usPhone: "Mobile Number is invalid",
                    minlength: "Mobile Number must be of 10 digits",
                    maxlength: "Mobile Number must be of 10 digits"
                },
                hospital_npi: {
                    digits: "NPI is invalid",
                    minlength: "NPI must be of 10 digits",
                    maxlength: "NPI must be of 10 digits"
                },
                hospital_name: {
                    alphSpace: "Pharmascist Name is invalid",
                    required:"Name is required"
                },
                hospital_store_name: {
                    alphSpace: "Pharmacy Name is invalid",
                    required:"Name is required"

                },
                hospital_email: {
                    email: "Email is invalid"
                },
                hospital_fax: {
                    usPhone: "Fax is invalid"
                },
                hospital_zip: {
                    digits: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_hospital_form')).hide();
                $('.alert-error', $('.manage_hospital_form')).show();
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
                if ($('#hospital_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.manage_hospital_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_hospital_form').validate().form()) {
                    if ($('#hospital_id').val() > 0) {
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
            handleHospital();
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
    var hospital_name = $('#search_hospital').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "hospital/hospital_list",
        data: "page=" + page + "&status=" + status + "&hospital_name=" + hospital_name + "&sort=" + sort + "&colname=" + colname,
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

function hospitalPrint() {
    showloader();
    var hospital_name = $('#search_hospital').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
        $.ajax({
            type: 'POST',
            url: Host + "hospital/hospitalListPrint",
            data: "status=" + status + "&hospital_name=" + hospital_name + "&sort=" + sort + "&colname=" + colname,
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
    $("#search_hospital").autocomplete({
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
            $.getJSON(Host + "hospital/search_hospital", request, function (data, status, xhr) {
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
$('#search_hospital').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_hospital').val(unescape(thisValue));
    setTimeout("$('.ui-autocomplete').hide();", 200);
    loadDataByPage(1);
}
function showDeleteModal(id) {
    $('#showPhysicalDeleteModal #deletePhysicianModal').removeAttr('onclick');
    $('#showPhysicalDeleteModal #deletePhysicianModal').attr('onClick', 'deleteHospital(' + id + ');');
    $('#showPhysicalDeleteModal').modal('show');
}
function deleteHospital(id) {
    $.ajax({
        type: 'POST',
        url: Host + "hospital/delete_hospital",
        data: "hospital_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "Hospital deleted successfully");
        }
    });
}
function getStateList(country_id) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getStateList",
        data: "country_id=" + country_id,
        success: function (data) {
            $('#hospital_state').html(data);
        }
    });
}
function getCityList(state_id, type) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getCityList",
        data: "state_id=" + state_id,
        success: function (data) {
            $('#hospital_city').html(data);
        }
    });
}