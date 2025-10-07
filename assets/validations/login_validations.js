var Host = $('#admin_base_url').val();
var doLoginValidate = function () {
    if (!isValid("sa_user_name", "", "blank", "")) {
        showToastMsg("error", "User name can not be left blank.");
        return false;
    }
    if (!isValid("login_password", "", "blank", "")) {
        showToastMsg("error", "Password can not be left blank.");
        return false;
    }

    var sa_user_name = $("#sa_user_name").val();
    var password = $("#login_password").val();
    var remember_me = $("#remember_me").is(":checked");
    $('#btn_login_spin').show();
    $('#btn_login').hide();
    $.ajax({
        type: 'post',
        url: Host + "/auth/doLogin",
        data: "sa_user_name=" + sa_user_name + "&password=" + password + "&remember_me=" + remember_me,
        success: function (msg)
        {
            msg = $.trim(msg);
            if (msg === 'success')
            {
                location.href = Host + "/dashboard";
            }
            else if (msg === 'support')
            {
                location.href = Host + "/ticket_system";
            }
            else if (msg == 'inactive')
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "The user is inactive. Please contact DCC");
                return false;
            }
            else
            {
                $('#btn_login_spin').hide();
                $('#btn_login').show();
                showToastMsg("error", "User name or Password is incorrect.");
                return false;
            }
        }
    });
}
var doLoginForgot= function () {
    if (!isValid("forgot_email", "", "blank", "")) {
        showToastMsg("error", "Email ID can not be left blank.");
        return false;
    }
    if (!isValid("forgot_email", "", "email", "")) {
        showToastMsg("error", "Entered Email Id is invalid.");
        return false;
    }
	/* if (!isValid("forgot_username", "", "blank", "")) {
        showToastMsg("error", "User name field is empty. Please try again.");
        return false;
    } */
    var email = $("#forgot_email").val();
	//var username = $("#forgot_username").val();
    $.ajax({
        type: 'post',
        url: Host + "/auth/forgot_password",
        data: "email=" + email,  //+"&username=" + username
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
			else if(msg == "not_exists")
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
$('#login_password').keypress(function (e) {
    if (e.which == 13) {
        doLoginValidate();
    }
});