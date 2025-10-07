var ManageLobbyRooms = function () {
    Host = $('#base_url').val();
    var handleDetails = function () {
        $('.manage_lobby_rooms_form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                room_name: {
                    required: true
                }
            }, messages: {
                room_name: {
                    required: "Room Name can not be left blank"
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit  
                $('.alert-error1', $('.manage_lobby_rooms_form')).hide();
                $('.alert-error', $('.manage_lobby_rooms_form')).show();
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
                $.ajax({
                    type: 'POST',
                    url: Host + "Profile/saveLobbyRoomData",
                    data: $('.manage_lobby_rooms_form').serialize(),
                    success: function (data) {
                        if (data == "success") {
                            manageLobby();
                            $('#manageRoomLobbyContent').modal('hide');
                            if ($('#room_id').val() > 0) {
                                showToastMsg("success", "Lobby Room updated successfully");
                            } else {
                                showToastMsg("success", "Lobby Room added successfully");
                            }
                        }
                    }
                });
            }
        });

        $('.manage_lobby_rooms_form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.manage_module_form').validate().form()) {
                    $.ajax({
                        type: 'POST',
                        url: Host + "Profile/saveLobbyRoomData",
                        data: $('.manage_lobby_rooms_form').serialize(),
                        success: function (data) {
                            if (data == "success") {
                                manageLobby();
                                $('#manageRoomLobbyContent').modal('hide');
                                if ($('#room_id').val() > 0) {
                                    showToastMsg("success", "Lobby Room updated successfully");
                                } else {
                                    showToastMsg("success", "Lobby Room added successfully");
                                }
                            }
                        }
                    });
                }
                return false;
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleDetails();
        }

    };
}();
