<style type="text/css">
    #fade {
        display: none;
        /* Hidden as default */
        background: #000;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        filter: alpha(opacity=50);
        opacity: .50;
        z-index: 9;
    }

    .alertBlock {
        color: #FF0000;
        font-size: 14px;
        margin-top: 10px;
        display: none;
        margin-bottom: 0px;
    }

    #scrollToTop {
        width: 40px;
        line-height: 40px;
        overflow: hidden;
        z-index: 999;
        display: none;
        cursor: pointer;
        position: fixed;
        bottom: 40px;
        right: 0;
        background-color: #4d647b;
        color: #CCC;
        text-align: center;
        font-size: 30px;
        text-decoration: none;
    }

    #scrollToTop:hover {
        width: 40px;
        line-height: 40px;
        overflow: hidden;
        z-index: 999;
        display: none;
        cursor: pointer;
        position: fixed;
        bottom: 40px;
        right: 0;
        background-color: #122867;
        color: #fff;
        text-align: center;
        font-size: 30px;
        text-decoration: none;
    }

    #loader_text_div span.claimb {
        color: #000 !important;
    }
</style>

<div id="loader" class="loaderwrap loginloader" style="display:none;">
    <div class="loader"></div>
    <div class="logowrap">
        <img src="<?php echo ROOT_WWW; ?>assets/img/ajax-loader.png" />
    </div>
</div>
<div id="loader_text_div" class="loader_text_div" style="position: fixed; top: 60%; left: 38%; z-index: 999999; display:none;">
    <span class="claimb" style="font-size: 18px;color: #FFF;font-weight: bold;" id="loader_text"></span>
</div>
<div id="timer_loader" class="loaderwrap" style="display:none;">
    <div class="loader"></div>
    <div class="logowrap">
        <img src="<?php echo ROOT_WWW; ?>assets/img/ajax-loader.png" />
        <br>
        <div id="timer_text" style="width: 250px;margin-top: 10px;text-align: center; font-size: 18px;color: #000;font-weight: bold;"></div>
    </div>
</div>
<div id="fade"></div>

<script type="text/javascript">
    function showloader() {
        $('#fade').show();
        $('#loader').show();
    }

    function hideloader() {
        $('#fade').hide();
        $('#loader').hide();
    }

    function showtimerloader(text) {
        $('#fade').show();
        $('#timer_loader').show();
        $("#timer_text").html(text);
    }

    function hidetimerloader() {
        $('#fade').hide();
        $('#timer_loader').hide();
        $("#timer_text").html('');
    }

    function showloadertext(text) {
        $('#fade').show();
        $('#loader_text_div').show();
        $("#loader_text_div").show();
        $("#loader_text").html(text);
    }

    function hideloadertext() {
        $('#fade').hide();
        $('#loader_text_div').hide();
        $("#loader_text").html("");
    }

    $(document).ready(function() {
        <?php if (session()->get('usr_type')) { ?>
            //getMessageCount1();
        <?php } ?>
        $(window).scroll(function() {
            if ($(window).scrollTop() > 100) {
                $('#scrollToTop').fadeIn();
            } else {
                $('#scrollToTop').fadeOut();
            }
        });
    });

    function scrolltop() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    }

    function generateRPMLOGurl(ref_tab, tab, cli_id, shiftdate) {
        showloader();
        var Host = "<?php echo ROOT_WWW; ?>";
        var url = "";
        var reftab = ref_tab;
        var shift_date = shiftdate;
        shift_date = shift_date.replace("/", "-");
        shift_date = shift_date.replace("/", "-");
        if (tab == "assmnts") {
            url = HOST + "rpmlog?cli_name=" + cli_id + "&ref=" + reftab + "&tab=" + tab + "&date=" + shift_date;
        } else {
            url = HOST + "rpmlog?cli_name=" + cli_id + "&ref=" + reftab + "&tab=" + tab + "&date=" + shift_date;
        }
        hideloader();
        window.location.href = url;
    }

    function getMessageCount1() {
        $.ajax({
            type: 'POST',
            url: HOST + "/Release_version_alerts/getAlerts",
            async: false,
            data: 10,
            success: function(response) {
                $('#alertsfrommydb').html(response);
            }
        });
    }

     <?php
        if (session()->get('usr_license_expire') == 'Yes') { 
            ?>
            $('#licenseExpireModal').modal('show');
            <?php 
        }  
        session()->remove('usr_license_expire');
    ?>
</script>
</body>

</html>