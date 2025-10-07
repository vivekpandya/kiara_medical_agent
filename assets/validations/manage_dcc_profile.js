var ManageDccDetails = function () {
    jQuery.validator.addMethod("checkRadio", function (value, element) {
        if ($('[name="' + element.name + '"]:checked').length > 0) {
            return true;
        }
        else {
            return false;
        }
    });
    jQuery.validator.addMethod("lettersonly", function (value, element)
    {
        return this.optional(element) || /^[a-z,"'"," "]+$/i.test(value);
    }, "Letters and spaces only please");
    jQuery.validator.addMethod("alphSpace", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Only alphabetical characters");
    jQuery.validator.addMethod("usPhone", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Only digits and  - allowed");
    jQuery.validator.addMethod("roles", function (value, elem, param) {
        if ($(".roles:checkbox:checked").length > 0) {
            return true;
        } else {
            return false;
        }
    }, "You must select at least one!");

    jQuery.validator.addMethod('einvalidate', function (value, element) {
        return this.optional(element) || /^\d{2}-\d{7}$/.test(value);
    }, "Please enter a valid EIN. ex. **-*******");

    var handleDetails = function () {
        $('.dcc_detail_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            ignore:[],
            rules: {
                dcc_name: {
                    required: true,
                   // lettersonly: true,
                    minlength: '2',
                    maxlength: '45'
                },
                dcc_logo:{
                    extension: "jpg|jpeg|png|ico|bmp|gif|webp"
                },
                dcc_medical_dir_ins_image:{
                    extension: "jpg|jpeg|png|ico|bmp|gif|webp"
                },
                cus_timezone: {
                    required: true,
                },
                dcc_phone_number: {
                    required: true,
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12',
                },
                dcc_email: {
                    required: true,
                    email: true,
                    remote: Host + "Profile/check_duplicate"
                },
                dcc_website: {
                    //                    required: true
                },
                // dcc_licensecapacity: {
                //     required: true,
                //     digits: true,
                //     minlength: '1',
                //     maxlength: '3'
                // },
                dcc_prim_man_name: {
                    required: true,
                    lettersonly: true,
                    minlength: '2',
                    maxlength: '30'
                },
                dcc_prim_phone_number: {
                    required: true,
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12',
                },
                dcc_sec_man_name: {
                    minlength: '2',
                    maxlength: '30'
                }, dcc_sec_phone_number: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12',
                }, dcc_address_one: {
                    required: true,
                    //                    maxlength: '200'
                }, dcc_address_two: {
                    //                    required: true,
                    //                    maxlength: '200'
                }, cus_country: {
                    required: true,
                }, cus_state: {
                    required: true,
                }, cus_city: {
                    required: true,
                }, cus_zip: {
                    required: true,
                    digits: true,
                    minlength: '5',
                    maxlength: '5'
                }, dcc_description: {
                    //                    required: true,
                    //                    maxlength: '1000'
                },
                dcc_status: {
                    checkRadio: true
                },
                dcc_npi: {
                    digits: true,
                    minlength: '10',
                    maxlength: '10'
                },
                dcc_liab_contact_no: {
//                    usPhone: true,
//                    minlength: '12',
//                    maxlength: '12',
                },
                dcc_liab_contact_phone_no: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12',
                },
                dcc_fire_phone_no: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12',
                },
                dcc_health_phone_no: {
                    usPhone: true,
                    minlength: '12',
                    maxlength: '12',
                },
                dcc_liab_contact_email: {
                    email: true
                },
                dcc_meal_serve: {
                    required: true,
                },
                dcc_fed_tax_id: {
                    einvalidate : true,
                    maxlength: '10',
                    minlength: '10'
                }
                // other rules for other fields...
            }, messages: {
                dcc_name: {
                    required: "DCC Name can not be left blank",
                   
                }, cus_timezone: {required: "Time zone can not be left blank"
                },
                dcc_phone_number: {
                    required: "Phone number can not be left blank",
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_sec_phone_number: {
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits",
                    digits: "Entered Phone number  is invalid",
                },
                dcc_email: {
                    required: "Email can not be left blank",
                    email: "Entered Primary Email Id is invalid",
                    remote: "Entered Email Id  is Already registered, please enter different email id"
                },
                dcc_website: {
                    required: "Website can not be left blank"
                },
                dcc_licensecapacity: {
                    required: "License Capacity can not be left blank",
                    digits: "Entered License Capacity is invalid",
                    minlength: 'License Capacity should be minimum of 1 digit',
                    maxlength: 'License Capacity should be maximum of 3 digits'},
                dcc_prim_man_name: {
                    required: "Primary manager name can not be left blank",
                    lettersonly: "Entered Primary Manager Name  is invalid'",
                },
                dcc_prim_phone_number: {
                    required: "Primary manager phone number can not be left blank",
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_address_one: {
                    required: "Address 1 can not be left blank"
                },
                dcc_address_two: {
                    required: "Address 2 can not be left blank"
                },
                cus_country: {
                    required: "Country can not be left blank"
                },
                cus_city: {
                    required: "City can not be left blank"
                },
                cus_state: {
                    required: "State can not be left blank"
                },
                cus_zip: {
                    required: "Zip Code can not be left blank",
                    digits: "Entered Zip Code is invalid",
                    minlength: "Zip Code should be of 5 digits",
                    maxlength: "Zip Code should be of 5 digits"
                },
                dcc_description: {
                    required: "Description can not be left blank"
                },
                dcc_status: {
                    checkRadio: "Status can not be left blank"
                },
                dcc_npi: {
                    digits: "Entered NPI is invalid",
                    minlength: "NPI should be of 10 digits",
                    maxlength: "NPI should be of 10 digits"
                },
                dcc_liab_contact_no: {
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_liab_contact_phone_no: {
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_fire_phone_no: {
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_health_phone_no: {
                    usPhone: "Entered Phone number  is invalid",
                    minlength: "Mobile number should be of 10 digits",
                    maxlength: "Mobile number should be of 10 digits"
                },
                dcc_liab_contact_email: {
                    email: "Entered Primary Email Id is invalid",
                },
                dcc_meal_serve: {
                    required: "Meal served can not be left blank"
                },
                dcc_fed_tax_id: {
                    einvalidate : "Please enter a valid TAX ID. ex. **-*******",
                    maxlength: "TAX ID should be of 9 digits",
                    minlength: "TAX ID should be of 9 digits"
                }
                // other error messages...
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.dcc_detail_form')).hide();
                $('.alert-error', $('.dcc_detail_form')).show();
                // Highlight the fieldset and legend containing the error
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var $fieldsetWithError = $(validator.errorList[0].element).closest('fieldset');
                    $fieldsetWithError.addClass('error');
                    $fieldsetWithError.find('legend').addClass('error');

                    // Scroll to the legend
                    $('html, body').animate({
                        scrollTop: $fieldsetWithError.find('legend').offset().top - 50 // Adjust as needed
                    }, 500);
                }
            },
            highlight: function(element) {
                // Highlight error inputs
                $(element).closest('.input-append').addClass('error'); // set error class to the control group

                // Also highlight the fieldset and legend
                var $fieldsetWithError = $(element).closest('fieldset');
                $fieldsetWithError.addClass('error');
                $fieldsetWithError.find('legend').addClass('error');
            },
            success: function (label) {
                label.closest('.input-append').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                if (element.hasClass('select2-hidden-accessible')) {
                    console.log('234324');
                    error.addClass('help-small no-left-padding select_error').insertAfter(element.closest('.controls'));
                } else {
                    console.log('fdsfsfd');
                    error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-append'));
                }
            },
            showErrors: function (errorMap, errorList) {
                var errors = this.numberOfInvalids();
                var error_label = [];
                $.each(errorMap, function (key, value) {
                    //console.log("KEY", key);
                    
                    
                });
                this.defaultShowErrors();
                //showErrorPopup(error_label);
            },
            submitHandler: function (form) {
                showloader();
                setTimeout(function () {
                    var errorcount = checkform_count();
                   
                    if (errorcount > 0) { 
                        showToastMsg("error", "Please add correct details in 'Forms Per Month Per Client' section.");
                    } else{
                        form.submit();
                        showToastMsg("success", "Profile details has been updated successfully");
                    }
                    hideloader();
                }, 1000);
            }
        });

        $('.dcc_detail_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.dcc_detail_form').validate().form()) {
                    showloader();
                    showToastMsg("success", "Profile details has been updated successfully");
                    setTimeout(function () {
                        var errorcount = checkform_count();
                   
                        if (errorcount > 0) { 
                            showToastMsg("error", "Please add correct details in 'Forms Per Month Per Client' section.");
                        } else{
                            form.submit();
                        }
                        hideloader();
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handleImageUpload = function()
    {
        $('#other_doc_upload_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {  
                doc_title:{
                    required:true
                },              
                doc_attach_document:{
                    required: function(element) {
                        var doc_id = $('#doc_id').val();;
                        if(doc_id == 0)
                        {
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    },
                    extension: "jpeg|jpg|png|pdf|doc|docx|odt|txt"
                }
            }, messages: {
                doc_attach_document: {
                    extension: "Please upload valid file, allow types are jpeg|jpg|png|pdf|doc|docx|odt|txt",
                   
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.dcc_detail_form')).hide();
                $('.alert-error', $('.dcc_detail_form')).show();
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
                var coming_from = $('#coming_from').val();
                //console.log("SUBMIT HANDLER",coming_from);
                showloader();
                var formData = new FormData(form);
                $.ajax({
                    type: 'post',
                    url: Host + "Profile/attach_other_document_upload",
                    data: formData,
                    success: function (data)
                    {
                        hideloader();
                        $('#manageOtherDocumentContent').modal('hide');
                        if(coming_from == 'admin')
                        {
                            manageDocuments(1,'admin');
                        }
                        else
                        {
                            otherDocumentload();
                        }
                        
                        if (data === 'DocumentAdd') {
                            showToastMsg("success", "Document for DCC has been added successfully");
                        }
                        else if (data === 'DocumentUpdate') {
                            showToastMsg("success", "Document for DCC has been updated successfully");
                        }                       
                        
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handleDetails();
            handleImageUpload();
        }

    };
}();
function getStateList(country_id, type) {
    $.ajax({
        type: 'POST',
        url: Host + "Profile/getStateList",
        data: "country_id=" + country_id,
        success: function (data) {
            if (type == 'dccDetail') {
                $('#selState').html(data);
            } else {
                $('#bil_state').html(data);
            }
        }
    });
}
function getCityList(state_id, type) {
    $.ajax({
        type: 'POST',
        url: Host + "Profile/getCityList",
        data: "state_id=" + state_id,
        success: function (data) {
            if (type == 'dccDetail') {
                $('#selCity').html(data);
            } else {
                $('#bil_city').html(data);
            }
        }
    });
}
function manageModules() {
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "profile/modules",
        data: "",
        success: function (data) {
            hideloader();
            $('#manageModules').html(data);
        }
    });
}

function manageLobby() {
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Profile/lobby_list",
        data: "",
        success: function (data) {
            hideloader();
            $('#manageLobby').html(data);
        }
    });
}
function manageDocuments(page,coming_from) {
    showloader();
     //var search_document_title = $('#search_document_title').attr('data-value');
    var search_document_title = $('#search_document_title').val();
    // alert(search_document_title)
     var sort = $("#sortdoc").val();
     var per_page = $('#per_page').val();
    var colname = $("#colnamedoc").val();
    //alert(sort);
    var col = $("#coldoc").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Profile/getDccDocuments",
        data: "coming_from="+coming_from+"&page="+page+"&per_page="+per_page+"&doc_type=" + $('#doc_type').val() + "&share_with_caregiver=" + $('#share_with_caregiver').val() + "&search_document_title=" + search_document_title+ "&sort=" + sort + "&colname=" + colname,
        success: function (data) {
            hideloader();
            //console.log("COMING FROM",coming_from);
            if(coming_from == 'admin')
            {
                $('#document_admin_list_data').html(data);
            }
            else
            {
                $('#manageDocuments').html(data);
            }
            
            if (sort == 'asc')
            {
                $("table thead tr:eq(1) th:eq(" + col + ")").attr('id', 'arrow-up');
            } else {
                $("table thead tr:eq(1) th:eq(" + col + ")").attr('id', 'arrow-down');
            }
        }
    });
}

function updateInsurance() {
    if ($('[name="gridIndex[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one insurance company!");
        return false;
    }
    var checkedClients = $('.gridIndex:checkbox:checked').map(function () {
        return this.value;
    }).get();
    var cliArr = checkedClients.join(",");
    $.ajax({
        type: 'POST',
        url: Host + "Profile/save_dcc_insurance",
        data: "ins_id_arr=" + cliArr,
        success: function (data) {
            if (data == "success") {
                manageInsurance();
            }
        }
    });
}
function attach_other_document(docId,coming_from) {
    $("#other_doc_upload_form").trigger('reset');
    $('#OtherDocumentModalLabel').html('Upload Document');
    $.ajax({
        type: 'POST',
        url: Host + "Profile/add_other_documents",
        data: "doc_id=" + docId+"&coming_from="+coming_from,
        success: function (data) {
            $('#OtherDocumentModalcontent').html(data);
            $('#manageOtherDocumentContent').modal('show');
            if (docId == '0') {
                $("#doc_title").val('');
                $("#imgContainer").hide();
            } else {
                $('#doc_id').val(docId);
            }
        }
    });
}

  function uploadImage() {
        //console.log("UploadImage");

        
    }
function uploadImage_backup() {
    if (typeof FormData !== 'undefined') {
        var doc_title = $('#doc_title').val();
        var att_document = $('#doc_att_document').val();
        var doc_id = $('#doc_id').val();
        
        if(doc_title !=''){
            if(att_document !='' || doc_id == '0'){
                // send the formData
                showloader();
                var formData = new FormData($("#other_doc_upload_form")[0]);
                $.ajax({
                    url: Host + "Profile/attach_other_document_upload",
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        hideloader();
                        $('#manageOtherDocumentContent').modal('hide');
                        otherDocumentload();
                        if (data === 'DocumentAdd') {
                            showToastMsg("success", "Document for DCC has been added successfully");
                        }
                        else if (data === 'DocumentUpdate') {
                            showToastMsg("success", "Document for DCC has been updated successfully");
                        }
                    }
                });
            } else {
                showToastMsg("error", "Please attach document");
            }
        } else {
             showToastMsg("error", "Please enter document title");
        }
    } else {
        message("Your Browser Don't support FormData API! Use IE 10 or Above!");
    }
}
function otherDocumentload() {
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Profile/getDccDocuments",
        data: "",
        success: function (data) {
            $('#manageDocuments').html(data);
            hideloader();
        }
    });
}
function remove_document(doc_id) {
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Profile/remove_document",
        data: "doc_id=" + doc_id,
        success: function (data) {
            $('#deleteContentModal').modal('hide');
            otherDocumentload();
            hideloader();
        }
    });
}
$('#dcc_npi_expiration_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_medical_exp_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_fire_expiration_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_health_expiration_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_npi_issued_on').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_npi_effective_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_liab_effective_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_health_effective_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_fire_effective_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_liab_expiration_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_medical_dir_effective_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_medical_dir_expiration_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_worker_effective_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('#dcc_worker_expiration_date').datepicker({
    format: "mm/dd/yyyy",
    dateFormat: 'mm/dd/yy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
    pickerPosition: "bottom-left",
    showButtonPanel: true,
        selectCurrent: true
});
$('.select2').select2();
/*
 $('#emp_cons_expiration_date').datepicker({
 format: "mm/dd/yyyy",
 dateFormat: 'mm/dd/yy',
 changeMonth: true,
 changeYear: true,
 autoclose: true,
 minDate: new Date(new Date().getTime() + (2 * 24 * 60 * 60 * 1000)),
 pickerPosition: "bottom-left",
 beforeShow: function (input, inst) {
 var newclass = 'calendar-base showDates';
 var p = inst.dpDiv.parent();
 if (!p.hasClass('calendar-base'))
 inst.dpDiv.wrap('<div class="' + newclass + '"></div>');
 else
 p.removeClass('hideDates').addClass('showDates');
 },
 onSelect: function (dateText, instance) {
 var monthCnt = 30;
 var period = $('#lic_sub_duration :selected').val();
 if (period == '30') {
 monthCnt = 1;
 } else {
 monthCnt = 12;
 }
 date = $.datepicker.parseDate(instance.settings.dateFormat, dateText, instance.settings);
 date.setMonth(date.getMonth() + monthCnt);
 $("#emp_cons_expiration_date").datepicker("setDate", date);
 }
 });
 */ 

function checkform_count(){
    var errorcount = 0;
 $('.forms_pair_row').each(function () {
     const $select = $(this).find('select[name="formId[]"]');
     const $input = $(this).find('input[name="formCount[]"]');
     
     
    const inputval = $input.val();
    if(inputval !== null && inputval !== undefined && inputval.toString().trim() !== '' && parseInt(inputval) !== 0)
    {inputbool = "true";} else {inputbool = "false";}
 
    const selectval = $select.val();
     if(selectval !== null && selectval !== undefined && selectval.toString().trim() !== ''){
        selectbool = "true";} else {selectbool = "false";}
   
    if((inputbool == "false" && selectbool != "false") || (inputbool != "false" && selectbool == "false")){
       
        errorcount++;
    } 
        
     
 });
  return errorcount;
}