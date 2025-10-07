var ManageDriver = function () {
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
    var handleDriver = function () {
        $('.manage_driver_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                supp_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                supp_office_no: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                supp_first_name: {
                    lettersonly: true
                },
                supp_last_name: {
                    lettersonly: true
                },
                supp_email: {
                    email: true
                },
                supp_service_name: {
                    alphSpace: true
                },
                supp_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }
            }, messages: {
                supp_phone: {
                    usPhone: "Mobile Number is invalid",
                    minlength: "Mobile Number must be of 10 digits",
                    maxlength: "Mobile Number must be of 10 digits"
                },
                supp_office_no: {
                    usPhone: "Office Number is invalid",
                    minlength: "Office Number must be of 10 digits",
                    maxlength: "Office Number must be of 10 digits"
                },
                supp_first_name: {
                    lettersonly: "First Name is invalid",
                },
                supp_last_name: {
                    lettersonly: "Last Name is invalid",
                },
                supp_email: {
                    email: "Email is invalid"
                },
                supp_service_name: {
                    alphSpace: "Service Name is invalid"
                },
                supp_zip: {
                    digits: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_driver_form')).hide();
                $('.alert-error', $('.manage_driver_form')).show();
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
                if ($('#supp_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.manage_driver_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_driver_form').validate().form()) {
                    if ($('#supp_id').val() > 0) {
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
            handleDriver();
        }

    };
}();
$('#driver_expire_date').datepicker({
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
    var supp_first_name = $('#search_driver').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Driver/driver_list",
        data: "page=" + page + "&status=" + status + "&driver_name=" + supp_first_name + "&sort=" + sort + "&colname=" + colname,
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
$(function () {
    var cache = {};
    $("#search_driver").autocomplete({
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
            $.getJSON(Host + "Driver/search_driver", request, function (data, status, xhr) {
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
$('#search_driver').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_driver').val(unescape(thisValue));
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
        url: Host + "Driver/delete_driver",
        data: "supp_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "Driver deleted successfully");
        }
    });
}
