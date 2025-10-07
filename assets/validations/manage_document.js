var ManageDocument = function () {
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
    var handleDocument = function () {
        $('.manage_document_form').validate({
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
                $('.alert-error1', $('.manage_document_form')).hide();
                $('.alert-error', $('.manage_document_form')).show();
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

        $('.manage_document_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_document_form').validate().form()) {
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
            handleDocument();
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
    var supp_first_name = $('#search_document').val();
    var status = $('#StatusSearch').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "document/document_list",
        data: "page=" + page + "&status=" + status + "&supp_name=" + supp_first_name + "&sort=" + sort + "&colname=" + colname,
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
    $("#search_document").autocomplete({
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
            $.getJSON(Host + "document/search_document", request, function (data, status, xhr) {
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
$('#search_document').keypress(function (e) {
    if (e.which == 13) {
        setTimeout("$('.ui-autocomplete').hide();", 200);
        loadDataByPage(1);
    }
});
function fill(thisValue) {
    $('#search_document').val(unescape(thisValue));
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
        url: Host + "document/delete_document",
        data: "supp_id=" + id,
        success: function (data) {
            $('#showPhysicalDeleteModal').modal('hide');
            loadDataByPage(1);
            showToastMsg("success", "Document deleted successfully");
        }
    });
}
function manageDocument() {
    var dt_share_caregiver = $("input[name=dt_share_caregiver]:checked").val();
    var dt_caregiver_tab = $("input[name=dt_caregiver_tab]:checked").val();
    
    $.ajax({
        type: 'POST',
        url: Host + "document/save_data",
        data: "dt_id=" + $('#dt_id').val() + "&dt_doc_type=" + $('#dt_doc_type').val() + "&dt_doc_comment=" + $('#dt_doc_comment').val() + "&dt_share_caregiver=" + dt_share_caregiver + "&dt_caregiver_tab=" + dt_caregiver_tab,
        success: function (data) {
            $('#manageDocumentModal').modal('hide');
            loadDataByPage(1);
            if (data == "update") {
                showToastMsg("success", "Document details updated successfully");

            } else {
                showToastMsg("success", "Document details added successfully");
            }
        }
    });
}
