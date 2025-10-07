var Host = $('#base_url').val();
var ManagePAPolicy = function () {
    
    var handlePAPolicy = function () {
        $('.dcc_pa_policy_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                year: {
                    required:true
                },
                alternative_placement_allowed: {
                    required:true,
                    digits: true
                },
                medical_leave_allowed: {
                    required:true,
                    digits: true
                },
                non_medical_leave_allowed: {
                    required:true,
                    digits: true
                }

            },
            messages: {
                year: {
                    required:"Please select year"
                },
                alternative_placement_allowed: {
                    required:"This field is required",
                    digits: "Please enter only numbers"
                },
                medical_leave_allowed: {
                    required:"This field is required",
                    digits: "Please enter only numbers"
                },
                non_medical_leave_allowed: {
                    required:"This field is required",
                    digits: "Please enter only numbers"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.dcc_pa_policy_form')).hide();
                $('.alert-error', $('.dcc_pa_policy_form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-control').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-control').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.form-control'));
            },
            submitHandler: function (form) {                
                showloader(); 
                var update_for_clients = $('#update_for_clients').val();               
                $.ajax({
                    type: 'POST',
                    url: Host + "Profile/save_pa_policy_data",
                    async:false,
                    data: $('#dcc_pa_policy_form').serialize(),
                    success: function (data) {
                        hideloader();
                        var response = JSON.parse(data);
                        if(update_for_clients == 'YES')
                        {
                            $('#manageDCCClients').modal('show');
                        }
                        else
                        {                            
                            if(response.status == 200)
                            {
                                showToastMsg('success',response.message);
                            }
                            else
                            {
                                showToastMsg('error','something went wrong');
                            }
                        }
                    }
                });               
            }
        });

        $('.dcc_pa_policy_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.dcc_pa_policy_form').validate().form()) {                    
                    setTimeout(function () {
                        form.submit();
                    }, 1000);
                }
                return false;
            }
        });
    }
    var handleDCCClients = function(){        
        $('#manage_dcc_clients').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
            },
            messages: {
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('#manage_dcc_clients')).hide();
                $('.alert-error', $('#manage_dcc_clients')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-control').addClass('error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-control').addClass('success');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.form-control'));
            },
            submitHandler: function (form) {                
                showloader();                 
                setTimeout(function(){
                    //alert("HERE");
                    $.ajax({
                        type: 'POST',
                        url: Host + "Profile/save_pa_policy_client_dcc_data",
                        async:false,
                        data: $('#manage_dcc_clients').serialize(),
                        success: function (data) {
                            hideloader();
                            var response = JSON.parse(data);
                                                      
                            if(response.status == 200)
                            {
                                showToastMsg('success',response.message);
                                $('#manageDCCClients').modal('hide');
                            }
                            else
                            {
                                showToastMsg('error','something went wrong');
                            }
                        }
                    });               
                },1500);
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handlePAPolicy();
            handleDCCClients();
        }

    };
}();