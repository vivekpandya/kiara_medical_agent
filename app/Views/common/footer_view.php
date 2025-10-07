<a style="right: 2%; position: fixed; z-index: 999;display:none;font-size:20px;" title="Scroll Top" href="javascript:void(0);" id="scrollToTop" onclick="scrolltop();"><i class="icon-arrow-up"></i></a>

<?php if (session()->get('user_id') > 0) { ?>
    <div class="footer" style="position: relative;width: 100%;bottom: 0;">
        <div class="footer-inner">
            <div class="container-fuild px-3">
                <div class="row">
                    <div class="span12">
                        &copy; <?php echo date('Y'); ?>
                        <!--<a href="<?php echo base_url(); ?>">-->
                        <?php echo DISPLAY_FOOTER_APP_NAME; ?>
                        <!--</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<input type="hidden" name="base_url" id="base_url" value="<?php echo ROOT_WWW; ?>">

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logoutModalContent">
    Launch demo modal
</button> -->
<!-- Session Expired Modal -->
<div id="sessionExpired" class="modal hide fade cust-modal-setting-m_n" tabindex="-1" role="dialog" aria-labelledby="sessionExpiredLabel" aria-hidden="true" data-backdrop="static" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="sessionExpiredLabel"><i class="icon-warning-sign"></i> Oops!</h3>
    </div>
    <div class="modal-body">
        <p>Your session has been expired. Please log in again.</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" onclick="javascript:session_expired();">OK</button>
    </div>
</div>
<!-- Modal -->
<div class="modal hide fade" id="logoutModalContent" tabindex="-1" aria-labelledby="logoutModalContentLabel" aria-hidden="true" style="position: absolute!important;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="logoutModalContentLabel">LogOut</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -25px;">×</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to end the session?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo ROOT_WWW; ?>logout" class="btn btn-success">OK</a>
                <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- <div id="logoutModalContent" class="modal hide fade cust-modal-setting-m_n" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">LogOut</h3>
    </div>
    <div class="modal-body cust-modal-body_n" id="logout_modal_body">
        <p>Are you sure you want to log out?</p>
    </div>
    <div class="modal-footer">
        <a href="<?php //echo base_url(); 
                    ?>auth/logout" class="btn btn-success">OK</a>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div> -->
<div id="manageSettingContent" class="modal hide fade cust-modal-setting_n" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;padding: 10px;" data-backdrop="static">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 id="SettingModalLabel"></h3>
    </div>
    <div class="modal-body cust-modal-body_n" id="SettingModalcontent">

    </div>
    <div class="modal-footer">
        <div class="ts_continue_button">
            <button type="button" id="not_privacy" onclick="saveExportSetting()" class="btn btn-success">Save</button>
            <button type="button" class="btn" onClick="$('#manageSettingContent').modal('hide');">Cancel</button>
        </div>
    </div>
</div>
<!-- Daily timcard detail Modal -->
<div id="daily_timecard" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="timcardLabel" aria-hidden="true" data-backdrop="static">
    <form class="daily-timecard-form" id="daily-timecard-form" action="" method="post">
        <div class="modal-header">
            <h3 id="forgotPasswordLabel"> Punching Log Details</h3>
        </div>
        <input type="hidden" id="user_id_hdn" name="user_id_hdn" value="">
        <input type="hidden" id="timecarddate" name="timecarddate" value="">

    </form>
</div>
<!-- Online Seminar Modal -->

<div id="onlineseminar" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;padding: 10px; overflow:hidden!important;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="seminar_close()" aria-hidden="true" style="margin-top:-10px!important;">x</button>
    </div>
    <div class="modal-body">
        <div class="container-fuild">
            <form id="seminar_popup_form" action="" method="post" autocomplete="off" novalidate="novalidate" style="margin:0px!important;">
                <input type="hidden" name="sr_seminar_id" value="<?php echo session()->get('display_seminar_data'); ?>">
                <input type="hidden" name="sr_dcc_name" value="<?php echo session()->get('usr_dcc_id'); ?>">
                <input type="hidden" name="sr_name" value="<?php echo session()->get('user_id'); ?>">
                <div class="w-100">
                    <h3 id="eventContentTitle"><?php echo session()->get('se_title'); ?></h3>
                    <p style="font-size: 20px; text-align: center;">
                        Join us for a complimentary webinar
                    </p>
                    <p class="second"><?php if (!empty(session()->get('se_seminar_date'))) {
                                            echo date('m/d/Y', strtotime(session()->get('se_seminar_date')));
                                        } ?> , <?php if (!empty(session()->get('se_start_time'))) {
                                                    echo session()->get('se_start_time');
                                                } ?> , <?php if (!empty(session()->get('se_timezone'))) {
                                                                                                                                                                                echo session()->get('se_timezone');
                                                                                                                                                                            } ?> </p>
                    <div id="panel">
                        <?php echo session()->get('se_seminar_desc'); ?>
                    </div>
                </div>
                <div class="w-100" style="text-align:center;">
                    <button type="button" onclick="seminar_save()" class="button btn custbtn">Save my seat!</button>
                </div>
                <div class="text-right" id="flip">
                    <b>Read more <i class="icon-caret-down"></i></b>
                </div>

            </form>
        </div>
    </div>
</div>
<div id="licenseExpireModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="top:50%!important;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 id="SettingModalLabel"> License Expiration !!! </h3>
    </div>
    <div class="modal-body">
        <p>Your license has expired or is expiring soon. Please check and update it.</p>
    </div>
    <div class="modal-footer">
        <div class="ts_continue_button">
            <a class="btn btn-success" href="<?php echo ROOT_WWW;?>my_profile?r=loadUserLiceInfo">Continue</a>
            <button type="button" class="btn" onClick="$('#licenseExpireModal').modal('hide');">Cancel</button>
        </div>
    </div>
</div>
<!-- Online Seminar Modal END -->
<style>
    .main-inner {
        min-height: 600px;
    }
</style>
<script>
    var Host = "<?php echo base_url() ?>";

    function manageCancelButton(fromQC)
    {
        var from_qa = '<?php echo isset($from_qa) ? $from_qa : "NO";?>';
        console.log("from_qa",from_qa);
        $('#manageVisitQuarterlyAssessmentContent').modal('hide');
        if(fromQC == 'NO')
        {
            if(from_qa == 'YES')
            {
                window.location.href='<?php echo base_url(); ?>quality_check?tab=visit';
            }
            else
            {
                window.location.href='<?php echo base_url(); ?>appointment/appointment_list';
            }            
        }
        else
        {

            window.location.href='<?php echo base_url(); ?>quality_check';
        }        
    }
    function session_expired() {
        showloader();
        window.location.href = Host + 'login';
    }

    function showNewSetting(report_type,purpose = '') {
        var dcc_id = '<?php session()->get('usr_dcc_id'); ?>';
        var lable = '';
        if (report_type == 'TIMECARD_SCHEDULE') {
            lable = 'Timecard Schedule';
        } else if (report_type == 'CLINICAL_VITAL') {
            lable = "Clinical Vital";
        } else if (report_type == 'CLINICAL_MARS') {
            lable = "Clinical MARS";
        } else if (report_type == 'CLINICAL_ADLS') {
            lable = "Clinical ADLs";
        } else if (report_type == 'CLINICAL_CAREPLAN') {
            lable = "Clinical Careplan";
        } else if (report_type == 'CLINICAL_CAREPLAN_CHECKLIST') {
            lable = "Clinical Careplan Checklist";
        } else if (report_type == 'CLINICAL_CUSTOM_CAREPLAN') {
            lable = "Clinical Custom Careplan";
        } else if (report_type == 'CLINICAL_SPECIAL_CARE') {
            lable = "Clinical Special Care";
        } else if (report_type == 'ACTIVITY_ADLS') {
            lable = "Activity ADLs";
        } else if (report_type == 'ACTIVITY_NAME') {
            lable = "Activities Name";
        } else if (report_type == "ACTIVITY_SCHEDULE") {
            lable = "Activity Schedule";
        } else if (report_type == "FOOD_SERVED") {
            lable = "Food Served";
        } else if (report_type == "FOOD_SCHEDULE") {
            lable = "Food Schedule";
        } else if (report_type == "FOOD_DIET_PLAN") {
            lable = "Diet Plan";
        } else if (report_type == "FOOD_DIET_MENU") {
            lable = "Diet Menu";
        } else if (report_type == "ADMIN_FOOD") {
            lable = "Food Schedule";
        } else if (report_type == "ADMIN_NURSING") {
            lable = "Nursing Schedule";
        } else if (report_type == "ADMIN_ACTIVITY") {
            lable = "Activity Schedule";
        } else if (report_type == "TRANSPORTATION_PICKUP_SCHEDULE") {
            lable = "Transportation Pickup Schedule";
        } else if (report_type == "TRANSPORTATION_DROPOFF_SCHEDULE") {
            lable = "Transportation Dropoff Schedule";
        } else if (report_type == "TRANSPORTATION_PICKUP_INSPECTION") {
            lable = "Transportation Pickup Inspection";
        } else if (report_type == "TRANSPORTATION_DROPOFF_INSPECTION") {
            lable = "Transportation Dropoff Inspection";
        } else if (report_type == "TRANSPORTATION_FIELD_TRIP_LOG") {
            lable = "Transportation Field Trip Log";
        } else if (report_type == "TRANSPORTATION_FIELD_TRIP_SCHEDULE") {
            lable = "Transportation Field Trip Schedule";
        } else if (report_type == "TRANSPORT_LOG") {
            lable = "Transportation Log";
        } else if (report_type == "CLIENT_IMMUNIZATION") {
            lable = "Client Immunization";
        } else if (report_type == "CLIENT_NOTES") {
            lable = "Client Notes";
        } else if (report_type == "CLIENT_CAREPLAN") {
            lable = "Client Careplan";
        } else if (report_type == "CLIENT_ASSESSMENT") {
            lable = "Client Assessment";
        } else if (report_type == "CLIENT_VITAL") {
            lable = "Client Vitals";
        } else if (report_type == "CLIENT_MARS") {
            lable = "Client Mars";
        } else if (report_type == "CLIENT_ADLS") {
            lable = "Client Adls";
        } else if (report_type == "CLIENT_DOCUMENTS") {
            lable = "Client Document";
        } else if (report_type == "CLIENT_INCIDENT") {
            lable = "Client Incident";
        } else if (report_type == "CLIENT_ORDERS") {
            lable = "Client Orders";
        } else if (report_type == "CLIENT_ATTENDANCE") {
            lable = "Client Attendance";
        } else if (report_type == "FACESHEET_CONTACTS") {
            lable = "Emergency Contact";
        } else if (report_type == "FACESHEET_PHARMACIST") {
            lable = "Pharmacist";
        } else if (report_type == "FACESHEET_PHYSICIAN") {
            lable = "Physician";
        } else if (report_type == "FACESHEET_ELIGIBILITY") {
            lable = "Eligibilities and Prior Authorizations";
        } else if (report_type == "REPORT_ACTIVITY_LOG") {
            lable = "Activity Log Report";
        } else if (report_type == "REPORT_ADMISSION") {
            lable = "Admission Report";
        } else if (report_type == "REPORT_ADMISSION_CLINICAL_PRO_MISSING") {
            lable = "Admission Clinical Profile Missing Report";
        } else if (report_type == "REPORT_ADMISSION_MISSING_NOTES") {
            lable = "Admission Missing Notes Report";
        } else if (report_type == "USER_DOCUMENTS") {
            lable = "User Document";
        } else if(report_type == 'REFERRAL_NOTES_DUE_REPORT'){
            lable = "Referral Notes";
        } else if(report_type == 'MARS_PROFILE'){
            lable = "Mars Profile";
        } else if(report_type == 'REPORT_SUSPENSION'){
            lable = "Suspension Report";
        } else if(report_type == 'CARETEAM_CLIENT_DETAILS_REPORT'){
            lable = "CareTeam Client Details";
        } else if(report_type == 'REPORT_REFERRAL_ADMITTED'){
            lable = "Referral Admitted";
        } else if(report_type == 'APPOINTMENT_VISIT_REPORT'){
            lable = "Appointment Visit Report";
        } else if(report_type == 'REPORT_CARETEAM_ATTENDANCE'){
            lable = "Care Team Attendance Report";
        } else if(report_type == 'REPORT_CAREGIVER_MISSING_CARENOTE'){
            lable = "Caregiver Missing Care Log Report";
        }
        $('#SettingModalLabel').html(lable + ' Settings');
        $.ajax({
            type: 'POST',
            url: Host + "common/showExportPrintSettings",
            data: "dcc_id=" + dcc_id + "&reportType=" + report_type+"&purpose="+purpose,
            success: function(data) {
                $('#SettingModalcontent').html(data);
                $('#manageSettingContent').modal('show');
                
                // Initialize CKEDITOR after modal is shown
                setTimeout(function() {
                    if (typeof CKEDITOR !== 'undefined' && purpose != 'EXPORT' && purpose != 'COLUMN') {
                        // Destroy existing instances first
                        for (var instance in CKEDITOR.instances) {
                            CKEDITOR.instances[instance].destroy();
                        }
                        
                        // Initialize new instances
                        if (CKEDITOR.replace) {
                            CKEDITOR.replace('footer_description', {
                                fullPage: false,
                                allowedContent: true,
                                enterMode: CKEDITOR.ENTER_BR
                            });
                            CKEDITOR.replace('header_description', {
                                fullPage: false,
                                allowedContent: true,
                                enterMode: CKEDITOR.ENTER_BR
                            });
                        }
                    }
                }, 100);
            }
        });
    }

    function saveExportSetting() {
        var report_type = $('#manageSettingContent #report_type').val();
        var purpose = $('#manageSettingContent #purpose').val();
        var errorcount = 0;
        if(purpose != 'EXPORT' && purpose != 'COLUMN')
        {            
            if (($('#logo').val()) != "") {
                if ($('#p_fps_logo').html() != "") {
                    errorcount++;
                }
            }
        }
        if (($(".tas_column_settings").length >0 && $(".tas_column_settings:checked").length > 0) || $(".tas_column_settings").length == 0) {
            if (errorcount <= 0) {
                showloader();
                // Check if CKEDITOR is available before using it
                if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances) {
                    for (instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }
                }
                if (typeof FormData !== 'undefined') {
                    // send the formData
                    var formData1 = new FormData($("#exportSettingFormData")[0]);
                    $.ajax({
                        type: "POST",
                        url: Host + 'common/saveExportPrintSettings',
                        data: formData1,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(msg) {
                            hideloader();
                            console.log("report_type",report_type);
                            showToastMsg('success', 'Settings Updated Successfully!!')
                            $('#manageSettingContent').modal('hide');
                            if (report_type == 'TIMECARD_SCHEDULE') {
                                $('#schedule_sort').val(formData1.sorting_type);
                                $('#schedule_colname').val(formData1.default_sorting);
                                loadScheduleDataByPage(1);
                            } else if (report_type == 'TRANSPORTATION_PICKUP_INSPECTION') {
                                $('#sort').val(formData1.sorting_type);
                                $('#colname').val(formData1.default_sorting);
                                loadDataByPage_inspection(1);
                            } else if (report_type == 'TRANS_FIELD_TRIP_LOG') {
                                $('#sort_ft_log').val(formData1.sorting_type);
                                $('#colname_ft_log').val(formData1.default_sorting);
                                loadDataField(1);
                            } else if (report_type == 'TRANS_FIELD_TRIP_SCHEDULE') {
                                $('#sort_ft_log').val(formData1.sorting_type);
                                $('#colname_ft_log').val(formData1.default_sorting);
                                loadDataFieldTrip(1);
                            } else if (report_type == 'TRANSPORT_LOG') {
                                $('#sort_log').val(formData1.sorting_type);
                                $('#colname_log').val(formData1.default_sorting);
                                loadDataLog(1);
                            }else if (report_type == 'CARE_TEAM_PAYMENT_REPORT') {
                                var sorting_type= formData1.get('sorting_type');
                                var default_sorting= formData1.get('default_sorting');
                                $('#sort_careteam').val(sorting_type);
                                $('#colname_careteam').val(default_sorting);
                                loadCareTeamDataByPage(1);
                            }else if (report_type == 'REPORT_CAREGIVER_PAYMENT') {
                                var sorting_type= formData1.get('sorting_type');
                                var default_sorting= formData1.get('default_sorting');
                                $('#sort').val(sorting_type);
                                $('#colname').val(default_sorting);
                                loadDataByPage(1);
                            }else if (report_type == 'REPORT_CARETEAM_ATTENDANCE') {
                                var sorting_type= formData1.get('sorting_type');
                                var default_sorting= formData1.get('default_sorting');
                                $('#careteam_sort').val(sorting_type);
                                $('#careteam_colname').val(default_sorting);
                                // Reload data to reflect any settings changes (column visibility, sorting, etc.)
                                loadDataByPage(1);
                            }else if (report_type == 'REFERRAL_NOTES_DUE_REPORT') {
                                loadDueReferralNotes(1);
                            }else if (report_type == 'MARS_PROFILE') {
                                getlatestMarsList(1);
                            }else if(report_type == 'CARENOTE_ASSESSMENT'){
                                loadDataCareNoteByPage(1);
                            }
                            else if(report_type == 'CLIENT_IADL_ASSESSMENT'){
                                getIADLList(1,'Weekly')
                            }
                            else if(report_type == 'CLIENT_BA_ASSESSMENT'){
                                getBAList(1,'Weekly')
                            }else if (report_type == 'APPOINTMENT_VISIT_REPORT') {
                                loadDataByPage(1);
                            }else if (report_type == 'REPORT_CAREGIVER_MISSING_CARENOTE') {
                                loadDataByPage(1);
                            }else if (report_type == 'REPORT_ADMISSION') {
                                loadadmissionDataByPage(1);
                            }else if (report_type == 'REPORT_DISCHARGE') {
                                loadDischargeDataByPage(1);
                            }
                        }
                    });
                } else {
                    showToastMsg("error", "Your Browser Don't support FormData API! Use IE 10 or Above!");
                }
            } else {
                showToastMsg("error", "Please upload Proper Logo");
            }
        } else {
            showToastMsg("error", "Please Select atlease one column");
        }
        //}
    }
    var Host = "<?php echo ROOT_WWW ?>";

    function seminar_close() {
        var Host = "<?php echo ROOT_WWW ?>";
        $('#onlineseminar').hide();
        $.ajax({
            type: 'POST',
            url: Host + "Auth/seminar_close",
            data: $('#seminar_popup_form').serialize(),
            success: function(data) {
                //$('#showRemovePayerModal').modal('hide');
                //hideloader();
                return false;
            }
        });
    }

    function seminar_save() {
        showloader();
        $('#onlineseminar').hide();
        $.ajax({
            type: 'POST',
            url: Host + "Auth/seminar_save",
            data: $('#seminar_popup_form').serialize(),
            success: function(data) {
                //$('#showRemovePayerModal').modal('hide');
                hideloader();
                return false;
            }
        });
    }

    setTimeout(function() {
        seminarData()
    }, 3000);

    function seminarData() {
        //console.log("HERE");
        var seminarData = '<?php echo session()->get('seminar_data') ?>';
        //console.log("seminarData", seminarData);
        <?php
        //echo "<pre>"; print_r($_SESSION['SEMINARDATA']); 
        if (session()->get('seminar_data') == 'Yes') {
        ?>
            $('#onlineseminar').show();
        <?php  }
        ?>
    }
</script>