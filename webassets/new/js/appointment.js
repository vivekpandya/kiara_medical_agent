var Appointment = function () { 
  var handleRecord = function () {
      $('.appointment-form').validate({
          errorElement: 'label',
          errorClass: 'help-inline',
          focusInvalid: false,
            rules: {
                booking_name: {
                    required : true
                },
                booking_email: {
                    required : true,
                    email : true
                }
            },
            messages: {
                booking_name: {
                    required: "Name must be required"
                },
                booking_email: {
                    required: "Email must be required",
                    email: "Invalid email"
                },
            },
          invalidHandler: function (event, validator) {
          },
          highlight: function (element) { // hightlight error inputs
              $(element).closest('.inputtext').addClass('error'); // set error class to the form group
          },
          success: function (label) {
              label.closest('.inputtext').removeClass('error');
              label.remove();
          },
          errorPlacement: function (error, element) {
              error.addClass('text-danger').insertAfter(element.closest('.inputtext'));
          },
          submitHandler: function (form) {

            grecaptcha.ready(function() {
                    grecaptcha.execute('6Le7rJ8jAAAAAKuuoiuqj-P8Ig3BhLtAtYVakRN5', {
                        action: 'create_comment'
                    }).then(function(token) {
                        $('.appointment-form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                        var formData = new FormData(form);
                        $('.form-element').attr('disabled', true);
                        var Host = $("#host").val();
                        var URL = Host + "webHome_new/book_appointment_submit";
                        $("#request_booking").html('PLEASE WAIT...');
                        $.ajax({
                            type: 'post',
                            url:URL, 
                            data: formData,
                            success: function (msg){
                                if (msg == 'added') {
                                    var urlr = "<?php echo base_url() ?>appointment-booking-thankyou";
                                    window.location.href = urlr;
                                } else {
                                    $("#loader_test").hide();
                                    $("#error_message").html('Please enter valid capcha.');
                                    $("#error_message").show();
                                    $(".custom-blue-btn").show();
                                }

                                $("#request_booking").html('REQUEST BOOKING');
                                //toastr.success('Your Appointment booking request submit successfully');
                                //window.location.href = Host + 'appointment-booking-thankyou';
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                  });
            });
          }
      });
  }

  return {
      init: function () {
          handleRecord();
      }
  };
}();

$('.appointment-form').keypress(function (e) {
  if (e.which == 13)
      return false;
});