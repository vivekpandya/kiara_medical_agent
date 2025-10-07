var ManageGift = function () {
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
    var handleLocation = function () {
        $('.manage_gift_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                gift_name: {
                    required: true,
                    lettersonly: true
                },
                gift_type: {
                    lettersonly: true
                },
                gift_activity: {
                    lettersonly: true
                }
            }, messages: {
                gift_name: {
                    required: "Gift name can not be left blank",
                    lettersonly: "Gift name is invalid",
                },
                gift_type: {
                    lettersonly: "Gift type landmark is invalid",
                },
                gift_activity: {
                    lettersonly: "Gift activity landmark is invalid",
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_gift_form')).hide();
                $('.alert-error', $('.manage_gift_form')).show();
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
                if ($('#gift_id').val() > 0) {
                    showToastMsg("success", "Data updated successfully");
                } else {
                    showToastMsg("success", "Data added successfully");
                }
                setTimeout(function () {
                    form.submit();
                }, 1000);
            }
        });

        $('.manage_gift_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_gift_form').validate().form()) {
                    if ($('#gift_id').val() > 0) {
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
            handleLocation();
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
    var gift_address = $('#search_gift').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Gift/gift_list",
        data: "page=" + page + "&status=" + status + "&gift_name=" + gift_address + "&sort=" + sort + "&colname=" + colname,
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
    $("#search_gift").autocomplete({
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
            $.getJSON(Host + "Gift/search_gift", request, function (data, status, xhr) {
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
$('#search_gift').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_gift').val(unescape(thisValue));
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
        url: Host + "Gift/delete_gift",
        data: "gift_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "Gift deleted successfully");
        }
    });
}