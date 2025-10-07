var Host = $('#base_url').val();
var ManageRestaurant = function () {
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
    var handleRestaurant = function () {
        $('.manage_restaurant_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                rest_phone: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12'
                },
                rest_name: {
                    lettersonly: true
                },
                rest_contact_name: {
                    lettersonly: true
                },
                rest_email: {
                    email: true
                },
                rest_type: {
                    alphSpace: true
                },
                rest_zip: {
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }
            }, messages: {
                rest_phone: {
                    usPhone: "Phone Number is invalid",
                    minlength: "Phone Number must be of 10 digits",
                    maxlength: "Phone Number must be of 10 digits"
                },
                rest_name: {
                    lettersonly: "Restaurant Name is invalid",
                },
                rest_contact_name: {
                    lettersonly: "Contact Name is invalid",
                },
                rest_email: {
                    email: "Email is invalid"
                },
                rest_type: {
                    alphSpace: "Restaurant Name is invalid"
                },
                rest_zip: {
                    digits: "Zip is invalid",
                    minlength: "Zip must be of 5 digits",
                    maxlength: "Zip must be of 5 digits"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_restaurant_form')).hide();
                $('.alert-error', $('.manage_restaurant_form')).show();
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
                if ($('#rest_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.manage_restaurant_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_restaurant_form').validate().form()) {
                    if ($('#rest_id').val() > 0) {
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
            handleRestaurant();
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
    var rest_name = $('#search_restaurant').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Restaurant/restaurant_list",
        data: "page=" + page + "&status=" + status + "&rest_name=" + rest_name + "&sort=" + sort + "&colname=" + colname,
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
    $("#search_restaurant").autocomplete({
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
            $.getJSON(Host + "Restaurant/search_restaurant", request, function (data, status, xhr) {
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
$('#search_restaurant').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_restaurant').val(unescape(thisValue));
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
        url: Host + "Restaurant/delete_restaurant",
        data: "rest_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "Restaurant deleted successfully");
        }
    });
}
function getStateList(country_id) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getStateList",
        data: "country_id=" + country_id,
        success: function (data) {
            $('#rest_state').html(data);
        }
    });
}
function getCityList(state_id, type) {
    $.ajax({
        type: 'POST',
        url: Host + "Home/getCityList",
        data: "state_id=" + state_id,
        success: function (data) {
            $('#rest_city').html(data);
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
$("#btnfile_one").click(function () {
    $('#uploadLogoError_one').hide();
    $("#uploadfile_one").click();
});
$("#btnfile_two").click(function () {
    $('#uploadLogoError_two').hide();
    $("#uploadfile_two").click();
});
var _URL_ONE = window.URL || window.webkitURL;
$("#uploadfile_one").change(function (e) {
    var fileOne, imgOne;
    if ((fileOne = this.files[0])) {
        imgOne = new Image();
        imgOne.src = _URL_ONE.createObjectURL(fileOne);
        imgOne.onload = function () {
            $('#dcc_logo_one').attr('src', imgOne.src);
            /* if (this.width > 150 && this.height > 100) {
             $('#btnSave').prop("disabled", true);
             $('#uploadLogoError_one').show();
             $("#dcc_logo_one").attr("src", "<?php echo base_url() . DEFAULT_PLACEHOLDER_IMAGE; ?>");
             return false;
             } else {
             $('#btnSave').prop("disabled", false);
             $('#dcc_logo_one').attr('src', imgOne.src);
             }*/
        };
    }
});
var _URL_TWO = window.URL || window.webkitURL;
$("#uploadfile_two").change(function (e) {
    var fileTwo, imgTwo;
    if ((fileTwo = this.files[0])) {
        imgTwo = new Image();
        imgTwo.src = _URL_TWO.createObjectURL(fileTwo);
        imgTwo.onload = function () {
            $('#dcc_logo_two').attr('src', imgTwo.src);
            /*if (this.width > 150 && this.height > 100) {
             $('#btnSave').prop("disabled", true);
             $('#uploadLogoError_two').show();
             $("#dcc_logo_two").attr("src", "<?php echo base_url() . DEFAULT_PLACEHOLDER_IMAGE; ?>");
             return false;
             } else {
             $('#btnSave').prop("disabled", false);
             $('#dcc_logo_two').attr('src', imgTwo.src);
             }*/
        };
    }
});