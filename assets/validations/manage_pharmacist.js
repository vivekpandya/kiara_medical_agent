var Host = $('#base_url').val();
var ManagePharmacist = function () {
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
    var handlePharmacist = function () {
        $('.manage_pharmacist_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                pharma_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                pharma_npi: {
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
                // pharma_name: {
                //     alphSpace: true,
                //     required:true
                // },
                pharma_store_name: {
                    alphSpace: true,
                    required:true,
                    remote: {
                        url: Host + "Pharmacist/check_duplicate_pharmacist",
                        type: "POST",
                        data: {
                            pharma_store_name: function () {
                                var pharma_store_name = $("#pharma_store_name").val();
                                return pharma_store_name;
                            },
                            pharma_id: function () {
                                var pharma_id = $("#pharma_id").val();
                                return pharma_id;
                            }
                        }
                    }
                },
                pharma_email: {
                    email: true
                },
                pharma_fax: {
                    usPhone: true
                },
                pharma_state:{
                    required:true,
                },
                pharma_city:{
                    required:true,
                },
                pharma_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }
            }, messages: {
                pharma_phone: {
                    usPhone: "Mobile Number is invalid",
                    minlength: "Mobile Number must be of 10 digits",
                    maxlength: "Mobile Number must be of 10 digits"
                },
                pharma_npi: {
                    digits: "NPI is invalid",
                    minlength: "NPI must be of 10 digits",
                    maxlength: "NPI must be of 10 digits"
                },
                pharma_name: {
                    alphSpace: "Pharmascist Name is invalid",
                    required:"Name is required"
                },
               /* pharma_store_name: {
                    alphSpace: "Pharmacy Name is invalid",
                    required:"Name is required",
                    remote: "Pharmacy name already exist, please enter different"
                },*/
                pharma_email: {
                    email: "Email is invalid"
                },
                pharma_fax: {
                    usPhone: "Fax is invalid"
                },
                pharma_zip: {
                    digits: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_pharmacist_form')).hide();
                $('.alert-error', $('.manage_pharmacist_form')).show();
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
                if ($('#pharma_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.manage_pharmacist_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_pharmacist_form').validate().form()) {
                    if ($('#pharma_id').val() > 0) {
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
            handlePharmacist();
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
    var pharma_name = $('#search_pharmacy').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "pharmacy/pharmacist_list",
        data: "page=" + page + "&status=" + status + "&pharma_name=" + pharma_name + "&sort=" + sort + "&colname=" + colname,
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

function pharmacyPrint() {
    showloader();
    var pharma_name = $('#search_pharmacy').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
        $.ajax({
            type: 'POST',
            url: Host + "pharmacy/pharmacyListPrint",
            data: "status=" + status + "&pharma_name=" + pharma_name + "&sort=" + sort + "&colname=" + colname,
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
    $("#search_pharmacy").autocomplete({
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
            $.getJSON(Host + "pharmacy/Pharmacist/search_pharmacist", request, function (data, status, xhr) {
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
$('#search_pharmacy').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_pharmacy').val(unescape(thisValue));
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
        url: Host + "Pharmacist/delete_pharmacist",
        data: "pharma_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "Pharmacist deleted successfully");
        }
    });
}
function getStateList(country_id) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getStateList",
        data: "country_id=" + country_id,
        success: function (data) {
            $('#pharma_state').html(data);
        }
    });
}
function getCityList(state_id, type) {
    $.ajax({
        type: 'POST',
        url: Host + "User/getCityList",
        data: "state_id=" + state_id,
        success: function (data) {
            $('#pharma_city').html(data);
        }
    });
}
$('#pharma_busi_exp').datepicker({
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
$('#pharma_sani_exp').datepicker({
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