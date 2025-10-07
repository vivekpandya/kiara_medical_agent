var Host = $('#base_url').val();
var doDCCLoginValidate = function (from_token = '') {
    if (!isValid("usr_admin_name", "", "blank", "")) {
        showToastMsg("error", "User name can not be left blank.");
        return false;
    }
    if (!isValid("usr_password", "", "blank", "")) {
        showToastMsg("error", "Password can not be left blank.");
        return false;
    }

    var usr_admin_name = $("#usr_admin_name").val();
    var usr_password = $("#usr_password").val();
    
    var remember_me = $("#remember_me").is(":checked");
    var myIP = $("#myIp").val();
    console.log("from_token",from_token);
    $('#btn_login_spin').show();
    $('#btn_login').hide();
    $.ajax({
        type: 'post',
        url: Host + "/auth/doLogin",
        //url: Host + "/home/login_submit",
        data: "usr_admin_name=" + usr_admin_name + "&usr_password=" + usr_password + "&remember_me=" + remember_me+ "&myIP=" + myIP,
        success: function (msg)
        {
            msg = $.trim(msg);
            
            if (msg == 'administration' || msg == 'client' || msg == 'administrator' || msg == 'success')
            {
                location.href = Host + "/clients";
            } 
            else if (msg == 'caregiver care note')
            {
                location.href = Host + "care_note";
            }
            else if (msg == 'appointment')
            {
                location.href = Host + "appointment/calendar";
            }
            else if (msg == 'transportation')
            {
                location.href = Host + "transport";
            }
            else if (msg == 'time card')
            {
                location.href = Host + "timecard_menu";
            }
            else if (msg == 'nursing')
            {
                location.href = Host + "nursing/index";
            }
            else if (msg == 'food')
            {
                location.href = Host + "food/index";
            }
            else if (msg == 'activity')
            {
                location.href = Host + "activities/index";
            }
            else if (msg == 'consultant')
            {
                location.href = Host + "consultant";
            }
            else if (msg == 'crm')
            {
                 location.href = Host + "crm/leadList";
            }
            else if (msg == 'billing')
            {
                 location.href = Host + "billing/clients";
            }
            else if (msg == 'shift calendar')
            {
                 location.href = Host + "shift-calendar";
            }
            else if (msg == 'document')
            {
                 location.href = Host + "document";
            }
            else if (msg == 'task management')
            {
                 location.href = Host + "task_management/dashboard";
            }
            else if (msg == 'notification')
            {
                 location.href = Host + "notification-list";
            }
            else if (msg == 'organize')
            {
                 location.href = Host + "organize";
            }
            else if (msg == 'referral')
            {
                 location.href = Host + "referral";
            }                
            else if (msg === "customeradmin") 
            {
                location.href = Host + "/customer-dashboard";
            }
            else if (msg == 'no_role') 
            {
                 location.href = Host + "profile";
            } 
            else if(msg == 'lobby_role')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "The user is having Lobby Role.");
                if(from_token == 'from_token')
                {
                    alert("The user is having Lobby Role.")
                    history.go(-1);
                }
                return false;
            }
            else if (msg == 'inactive')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "The user is inactive. Please contact AFC");
                if(from_token == 'from_token')
                {
                    alert("The user is inactive. Please contact AFC")
                    history.go(-1);
                }
                return false;
            }
            else if (msg == 'accessrights')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "Only Day Care Center Admin can login here.");
                if(from_token == 'from_token')
                {
                    alert("Only Day Care Center Admin can login here.")
                    history.go(-1);
                }
                return false;
            } 
            else if (msg == 'restricted')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "Your login is restricted by administrator, Kindly contact administrator.");
                if(from_token == 'from_token')
                {
                    alert("Your login is restricted by administrator, Kindly contact administrator.")
                    history.go(-1);
                }
                return false;
            }  
            else if (msg == 'failed')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "User name or Password is incorrect.");
                if(from_token == 'from_token')
                {
                    alert("User name or Password is incorrect.")
                    history.go(-1);
                }
                return false;
            }
            else if (msg == 'dcc-inactive')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "Day Care Center is in-active");
                if(from_token == 'from_token')
                {
                    alert("Day Care Center is in-active")
                    history.go(-1);
                }
                return false;
            }
            else if (msg == 'IP_Range_Restricted')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "IP Range is Restricted");
                if(from_token == 'from_token')
                {
                    alert("IP Range is Restricted")
                    history.go(-1);
                }
                return false;
            }
            else if (msg === "superadmin-dashboard") 
            {
                location.href = Host + "/superadmin/dashboard";
            } 
            else if (msg === "superadmin-customers") 
            {
                location.href = Host + "superadmin/customer";
            } 
            else if (msg === "superadmin-day dcare centers") 
            {
                location.href = Host + "superadmin/day-care-centers";
            } 
            else if (msg === "superadmin-users") 
            {
                location.href = Host + "superadmin/user";
            } 
            else if (msg === "superadmin-billing") 
            {
                location.href = Host + "superadmin/items";
            } 
            else if (msg === "superadmin-employees") 
            {
                location.href = Host + "superadmin/Employees";
            } 
            else if (msg === "superadmin-ticket system") 
            {
                location.href = Host + "superadmin/ticket_system";
            } 
            else if (msg == 'no_superadmin_role') 
            {
                 location.href = Host + "superadmin/profile";
            } 
            else  
            {
                location.href = Host + "profile";
            }
        }
    });
}
var doDCCLoginForgot = function () {
    if (!isValid("forgot_email", "", "blank", "")) {
        showToastMsg("error", "Email ID can not be left blank.");
        return false;
    }
    if (!isValid("forgot_email", "", "email", "")) {
        showToastMsg("error", "Entered Email Id is invalid.");
        return false;
    }
    if (!isValid("forgot_username", "", "blank", "")) {
        showToastMsg("error", "User name can not be left blank.");
        return false;
    }
    var email = $("#forgot_email").val();
    var username = $("#forgot_username").val();
    $.ajax({
        type: 'post',
        url: Host + "/auth/forgot_password",
        data: "email=" + email + "&username=" + username,
        success: function (msg)
        {
            msg = $.trim(msg);
            if (msg === 'success')
            {
                $('#loinUserDiv').show();
                $('#forgotpasswordDiv').hide();
                $('#forgot_email').val('');
                showToastMsg("success", "Reset password  link is sent to your Email Id.");
                //$('#resetSuccessDiv').show();
            }
            else if (msg == 'inactive')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "Your profile is in-active");
                return false;
            }
            else if (msg == 'nomatch')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "Email Id and Username don't match");
                return false;
            }
            else if (msg == "not_exists")
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "Email Id is not registered with us");
                return false;
            }
            else {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "Some unknown error, Please try again!! ");
                return false;
            }
        }
    });
}
$('#usr_password').keypress(function (e) {
    if (e.which == 13) {
        doDCCLoginValidate();
    }
});
/* Starts the Function for rememember me functionality Arun*/
$(function () {
    $('#remember_me').click(function () {
        if ($('#remember_me').is(':checked')) {
            $('#remember_me').attr('checked', 'checked');
            localStorage.usr_admin_name = $('#usr_admin_name').val();
            localStorage.usr_password = $('#usr_password').val();
            localStorage.checkbox = $('#remember_me').val();
        } else {
            $('#remember_me').removeAttr('checked');
            localStorage.usr_admin_name = '';
            localStorage.usr_password = '';
            localStorage.checkbox = '';
        }
    });
    if (localStorage.checkbox && localStorage.checkbox != '') {
        //$('#usr_admin_name').val(localStorage.usr_admin_name);
        //$('#usr_password').val(localStorage.usr_password);
        $('#remember_me').attr('checked', 'checked');
        $('.checkBox').addClass('checked');
    } else {
        $('#remember_me').removeAttr('checked');
        //$('#usr_admin_name').val('');
        //$('#usr_password').val('');
    }
});
/* Ends the Function for rememember me functionality*/