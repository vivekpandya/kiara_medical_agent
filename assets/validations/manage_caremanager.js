var Host = $('#base_url').val();
var ManageCareManager = function () {
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
    var handleCareManager = function () {
        $('.manage_caremanager_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                caremanager_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                caremanager_phone_no: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                caremanager_phone_no_ext: {
                    number : true
                },
                caremanager_npi: {
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
                caremanager_name: {
                    alphSpace: true,
                    required:true
                },
                caremanager_store_name: {
                    alphSpace: true,
                    required:true
                },
                caremanager_email: {
                    email: true
                },
                caremanager_fax: {
                    usPhone: true
                },
                caremanager_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }
            }, messages: {
                caremanager_phone: {
                    usPhone: "Mobile Number is invalid",
                    minlength: "Mobile Number must be of 10 digits",
                    maxlength: "Mobile Number must be of 10 digits"
                },
                caremanager_npi: {
                    digits: "NPI is invalid",
                    minlength: "NPI must be of 10 digits",
                    maxlength: "NPI must be of 10 digits"
                },
                caremanager_name: {
                    alphSpace: "Care Manager Name is invalid",
                    required:"Name is required"
                },
                caremanager_store_name: {
                    alphSpace: "Care Manager Name is invalid",
                    required:"Name is required"

                },
                caremanager_email: {
                    email: "Email is invalid"
                },
                caremanager_fax: {
                    usPhone: "Fax is invalid"
                },
                caremanager_zip: {
                    digits: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_caremanager_form')).hide();
                $('.alert-error', $('.manage_caremanager_form')).show();
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
                if ($('#caremanager_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.manage_caremanager_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_caremanager_form').validate().form()) {
                    if ($('#caremanager_id').val() > 0) {
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
            handleCareManager();
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
    var caremanager_name = $('#search_caremanager').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "caremanager/caremanager_list",
        data: "page=" + page + "&status=" + status + "&caremanager_name=" + caremanager_name + "&sort=" + sort + "&colname=" + colname,
        success: function (data) {
            $('#caremanagerlist').html(data);
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

function caremanagerPrint() {
    showloader();
    var caremanager_name = $('#search_caremanager').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
        $.ajax({
            type: 'POST',
            url: Host + "caremanager/caremanagerListPrint",
            data: "status=" + status + "&caremanager_name=" + caremanager_name + "&sort=" + sort + "&colname=" + colname,
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
    $("#search_caremanager").autocomplete({
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
            $.getJSON(Host + "caremanager/search_caremanager", request, function (data, status, xhr) {
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
$('#search_caremanager').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_caremanager').val(unescape(thisValue));
    setTimeout("$('.ui-autocomplete').hide();", 200);
    loadDataByPage(1);
}
function showDeleteModal(id) {
    $.ajax({
        type: 'POST',
        url: Host + "caremanager/caremanagerCheck",
        data: "manager_id=" + id,
        success: function (data) {
            if(data == 'no'){
                $('#showPhysicalDeleteModal #deletePhysicianModal').removeAttr('onclick');
                $('#showPhysicalDeleteModal #deletePhysicianModal').attr('onClick', 'deletePhysician(' + id + ');');
                $('#showPhysicalDeleteModal').modal('show');
            }else{
                //already use
                $('#showPhysicalDeleteModalCheck').modal('show');
            }
        }
    });
}
function deletePhysician(id) {
    $.ajax({
        type: 'POST',
        url: Host + "caremanager/delete_caremanager",
        data: "caremanager_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "CareManager deleted successfully");
        }
    });
}
function getStateList(country_id) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getStateList",
        data: "country_id=" + country_id,
        success: function (data) {
            $('#caremanager_state').html(data);
        }
    });
}
function getCityList(state_id, type) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getCityList",
        data: "state_id=" + state_id,
        success: function (data) {
            $('#caremanager_city').html(data);
        }
    });
}
$('#caremanager_busi_exp').datepicker({
    format: "mm/yy",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
        selectCurrent: true,
    dateFormat: 'mm/yy',
    minDate: 'm',
    monthNamesShort: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
    onClose: function (dateText, inst) {
        // set the date accordingly
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(year, month, 1));
        $(this).blur();
    },
    beforeShow: function (input, inst) {
        var newclass = 'calendar-base hideDates';
        var p = inst.dpDiv.parent();
        if (!p.hasClass('calendar-base'))
            inst.dpDiv.wrap('<div class="' + newclass + '"></div>');
        else
            p.removeClass('showDates').addClass('hideDates');
        if ((datestr = $(this).val()).length > 0) {
            year = datestr.substring(datestr.length - 4, datestr.length);
            month = jQuery.inArray(datestr.substring(0, datestr.length - 5), $(this).datepicker('option', 'monthNamesShort'));
            $(this).datepicker('option', 'defaultDate', new Date(year, month, 1));
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    }
});
$('#caremanager_sani_exp').datepicker({
    format: "mm/yy",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
        selectCurrent: true,
    dateFormat: 'mm/yy',
    minDate: 'm',
    monthNamesShort: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
    onClose: function (dateText, inst) {
        // set the date accordingly
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(year, month, 1));
        $(this).blur();
    },
    beforeShow: function (input, inst) {
        var newclass = 'calendar-base hideDates';
        var p = inst.dpDiv.parent();
        if (!p.hasClass('calendar-base'))
            inst.dpDiv.wrap('<div class="' + newclass + '"></div>');
        else
            p.removeClass('showDates').addClass('hideDates');
        if ((datestr = $(this).val()).length > 0) {
            year = datestr.substring(datestr.length - 4, datestr.length);
            month = jQuery.inArray(datestr.substring(0, datestr.length - 5), $(this).datepicker('option', 'monthNamesShort'));
            $(this).datepicker('option', 'defaultDate', new Date(year, month, 1));
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    }
});