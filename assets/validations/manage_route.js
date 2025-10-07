var ManageRoute = function () {
    jQuery.validator.addMethod("alphanum", function (value, element) {
        return this.optional(element) || /^[a-zA-Z0-9\-\s]+$/i.test(value);
    }, "Only alphabetical characters");
    var handleLocation = function () {
        $('.manage_gift_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                route_no: {
                    required: true,
  //                  alphanum: true,
//                    minlength: 4,
                    maxlength: 40
                }
            }, messages: {
                route_no: {
                    required: "Route No can not be left blank",
     //               alphanum: "Route No can not be special character",
//                    minlength: "Route No should be minimum 4 digits",
                    maxlength: "Route No should be maximum 40 characters.",
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
    var gift_address = $('#search_route').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Routes/route_list",
        data: "page=" + page + "&status=" + status + "&route_no=" + gift_address + "&sort=" + sort + "&colname=" + colname + "&is_global=" + $('#globalSearch').val(),
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
    $("#search_route").autocomplete({
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
            $.getJSON(Host + "Routes/search_route", request, function (data, status, xhr) {
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
$('#search_route').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_route').val(unescape(thisValue));
    setTimeout("$('.ui-autocomplete').hide();", 200);
    loadDataByPage(1);
}
function showDeleteModal(id, is_assigned) {
    $('#showPhysicalDeleteModal #deletePhysicianModal').removeAttr('onclick');
    $('#showPhysicalDeleteModal #deletePhysicianModal').attr('onClick', 'deletePhysician(' + id + ');');
    if (is_assigned === "route_assigned") {
        $('#showRouteDeleteModal').modal('show');
    } else {
        $('#showPhysicalDeleteModal').modal('show');
    }
}
function deletePhysician(id) {
    $.ajax({
        type: 'POST',
        url: Host + "Routes/delete_route",
        data: "route_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "Route deleted successfully");
        }
    });
}