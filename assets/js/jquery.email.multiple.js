/**
 * Created by Malal91 and Haziel
 * Select multiple email by jquery.email_multiple
 * **/

(function($){

    $.fn.email_multiple = function(options) {

        let defaults = {
            reset: false,
            fill: false,
            data: null
        };

        let settings = $.extend(defaults, options);
        let email = "";

        return this.each(function()
        {
            $(this).after("<div class=\"all-mail\"></div>\n" +
                "<input type=\"text\" name=\"email\" class=\"enter-mail-id\" placeholder=\"Enter Email ...\" />");
            let $orig = $(this);
            let $element = $('.enter-mail-id');

            // type email press tab
            $element.keydown(function (e) {
                $element.css('border', '');
                if (e.keyCode === 13 || e.keyCode === 32 || e.keyCode === 9) {
                    e.preventDefault();
                    add_multiple_input();
                }
            });

            // type email click on page and direct submit without press tab
            $element.on('focusout', function (e) {
                e.preventDefault();
                add_multiple_input();
            });
            //----------------------------------------------------------

            function add_multiple_input(){
                let getValue = $element.val();
                if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/.test(getValue)){
                    $('.all-mail').append('<span class="email-ids"><div class="bill-email" style="float: left;">' + getValue + '</div><span class="cancel-email">x</span></span>');
                    $element.val('');

                    email += getValue + ';'
                    update_email_hidden();
                } else {
                    $element.css('border', '1px solid red')
                }
                $orig.val(email.slice(0, -1))
            }

            $(document).on('click','.cancel-email',function(){
                $(this).parent().remove();
                update_email_hidden();
            });

            if(settings.data){
                $.each(settings.data, function (x, y) {
                    if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/.test(y)){
                        $('.all-mail').append('<span class="email-ids"><div class="bill-email" style="float: left;">' + y + '</div><span class="cancel-email">x</span></span>');
                        $element.val('');
                        email += y + ';'
                        update_email_hidden();
                    } else {
                        $element.css('border', '1px solid red');
                        update_email_hidden();
                    }
                })
                $orig.val(email.slice(0, -1))
            }
            if(settings.reset){
                $('.email-ids').remove()
            }
            return $orig.hide()
        });
    };
})(jQuery);

function update_email_hidden(){
    var email_string = '';
    $(".bill-email").each(function( index ) {
            email_string += $( this ).text()+',';
    });
    email_string = email_string.replace(/,\s*$/, "");
    $("input[name=bil_sent_emails]").val(email_string);
}