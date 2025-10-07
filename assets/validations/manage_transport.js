var Host = $('#base_url').val();
$(document).ready(function () {
    loadDataLog(1);
    $('#cli_pick_time, #cli_drop_time,#pick_log_startTime,#pick_log_endTime,#drop_log_startTime,#drop_log_endTime,#ft_log_start_time,#ft_log_end_time').blur(function () {
        var validTime = $(this).val().match(/^(0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/);
        if (!validTime) {
            $(this).val('').focus().css('background', '#fdd');
        } else {
            $(this).css('background', 'transparent');
        }
    });
});
function sortTable(elem, columnName) {
    var colName = $("#colname_pick_up").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort_pick_up").val();
    if (colName != columnName)
    {
        $("#sort_pick_up").val('asc');
    } else {
        if (sort == 'asc')
            $("#sort_pick_up").val("desc");
        else
            $("#sort_pick_up").val('asc');
//                                                }
        $("#colname_pick_up").val(columnName);
        $("#col_pick_up").val(col);
        loadDataByPage_pick_up(1);
    }
}

function loadDataByPage_inspection(page,type) {
    showloader();
    var sort = "ASC";
    var colname = "trans_date";
    var col = $("#col_pick_up").val();
    var inspection_date = $("#inspection_date").val();
    if($("#inspection_date").val() === undefined){
        inspection_date = $("#pre_trans_date").val();
    }
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/inspection_list",
        data: "type="+type+"&page=" + page + "&sort=" + sort + "&colname=" + colname + "&trans_route=" + $('#trans_route').val() + "&trans_shift=" + $('#trans_shift').val() + "&driver_id=" + $('#inspection_driver_id').val() + "&inspection_date=" + inspection_date,
        success: function (data) {
            $('#transport_dynamic_div').html(data);
            hideloader();
        }
    });
}

function loadDataByPage_pick_up(page) {
    showloader();
    var sort = $("#sort_pick_up").val();
    var colname = $("#colname_pick_up").val();
    var col = $("#col_pick_up").val();
    $('.sorting_pick_up').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/schedule_list",
        data: "page=" + page + "&sort=" + sort + "&colname=" + colname + "&trans_route=" + $('#trans_route').val() + "&trans_shift=" + $('#trans_shift').val() + "&driver_id=" + $('#driver_id').val() + "&trans_date=" + $('#schedule_date').val(),
        success: function (data) {
            $('#pick_up_schedule_tab_section').html(data);
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


function assignDriver() {
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/assign_driver",
        data: "cancel_reason=" + $('textarea#cancel_comment').val() + "&new_driver_id=" + $('#cancel_driver_id').val() + "&trip_type=" + $('#trip_type').val() + "&trans_route=" + $('#trans_route').val(),
        success: function (data) {
            if (data == "success") {
                showToastMsg('success', "Driver assigned successfully");
                loadDataByPage_pick_up(1);
            } else {
                showToastMsg('success', data);
            }
            $('#showPhysicalDeleteModal').modal('hide');
        }
    });
}
$('#schedule_date').datepicker({
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm/dd/yy',
    showButtonPanel: true,
        selectCurrent: true,
    onSelect: function (dateText, inst) {
        loadDataByPage_pick_up(1);
    }
});




function sortTable_drop(elem, columnName) {
    var colName = $("#colname_drop").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort_drop").val();
    if (colName != columnName){
        $("#sort_drop").val('asc');
    } else {
        if (sort == 'asc'){
            $("#sort_drop").val("desc");
        }else{
            $("#sort_drop").val('asc');
        }
        $("#colname_drop").val(columnName);
        $("#col_drop").val(col);
        loadDataByPage_drop(1);
    }
}
function loadDataByPage_drop(page) {
    showloader();
    var sort = $("#sort_drop").val();
    var colname = $("#colname_drop").val();
    var col = $("#col_drop").val();
    $('.sorting_drop').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/schedule_list_drop",
        data: "page=" + page + "&sort=" + sort + "&colname=" + colname + "&trans_route=" + $('#trans_route_drop').val() + "&trans_shift=" + $('#trans_shift_drop').val() + "&driver_id=" + $('#driver_id_drop').val() + "&trans_date=" + $('#schedule_date_drop').val(),
        success: function (data) {
            $('#drop_off_schedule_tab_section').html(data);
            if (sort == 'asc'){
                $("table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-up');
            }else {
                $("table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-down');
            }
            hideloader();
        }
    });
}
function assignDriver_drop() {
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/assign_driver",
        data: "cancel_reason=" + $('textarea#cancel_comment_drop').val() + "&new_driver_id=" + $('#cancel_driver_id_drop').val() + "&trip_type=" + $('#trip_type_drop').val() + "&trans_route=" + $('#trans_route_drop').val(),
        success: function (data) {
            if (data == "success") {
                showToastMsg('success', "Driver assigned successfully");
                loadDataByPage_drop(1);
            } else {
                showToastMsg('success', data);
            }
            $('#showPhysicalDeleteModal').modal('hide');
        }
    });
}
$('#schedule_date_drop').datepicker({
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm/dd/yy',
    showButtonPanel: true,
        selectCurrent: true,
    onSelect: function (dateText, inst) {
        loadDataByPage_drop(1);
    }
});

function transportationDropSchedulePrint() {
    showloader();
    var sort = $("#sort_drop").val();
    var colname = $("#colname_drop").val();
    var col = $("#col_drop").val();
    $('.sorting_drop').attr('id', '');

    $.ajax({
        type: 'POST',
        url: Host + "Transportation/schedule_print_drop",
        data: "sort=" + sort + "&colname=" + colname + "&trans_route=" + $('#trans_route_drop').val() + "&trans_shift=" + $('#trans_shift_drop').val() + "&driver_id=" + $('#driver_id_drop').val() + "&trans_date=" + $('#schedule_date_drop').val(),
        success: function (data) {
            hideloader();
            if (typeof data != 'object')
                {
                    window.open(data, '_blank');
                    return false;
                } 
        }
    });
}









$('#log_date').datepicker({
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm/dd/yy',
    showButtonPanel: true,
        selectCurrent: true,
    onSelect: function (dateText, inst) {
        loadDataLog(1);
    }
});
function sortTableLog(elem, columnName) {
    var colName = $("#colname_log").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort_log").val();
    if (colName != columnName)
    {
        $("#sort_log").val('asc');
    } else {
        if (sort == 'asc')
            $("#sort_log").val("desc");
        else
            $("#sort_log").val('asc');
    }
    $("#colname_log").val(columnName);
    $("#col_log").val(col);
    loadDataLog(1);
}
function sortTableField(elem, columnName) {
    var colName = $("#colname_log").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort_log").val();
    if (colName != columnName)
    {
        $("#sort_log").val('asc');
    } else {
        if (sort == 'asc')
            $("#sort_log").val("desc");
        else
            $("#sort_log").val('asc');
    }
    $("#colname_log").val(columnName);
    $("#col_log").val(col);
    loadDataField(1);
}
function loadDataLog(page) {
    showloader();
    var sort = $("#sort_log").val();
    var colname = $("#colname_log").val();
    var col = $("#col_log").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/log_list",
        async: false,
        data: "page=" + page + "&sort=" + sort + "&colname=" + colname + "&log_date=" + $('#log_date').val() + "&log_shift=" + $('#log_shift').val() + "&log_route=" + $('#log_route').val() + "&driver_id=" + $('#log_driver_id').val() + "&log_ride_status=" + $('#log_ride_status').val(),
        success: function (data) {
            $('#transport_dynamic_div').html(data);
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



function transportationSchedulePrint() {
    showloader();
    var sort = $("#sort_log").val();
    var colname = $("#colname_log").val();
    var col = $("#col_log").val();
    $('.sorting').attr('id', '');

    $.ajax({
        type: 'POST',
        url: Host + "Transportation/schedule_print",
        data: "sort=" + sort + "&colname=" + colname + "&trans_route=" + $('#trans_route').val() + "&trans_shift=" + $('#trans_shift').val() + "&driver_id=" + $('#driver_id').val() + "&trans_date=" + $('#schedule_date').val(),
        success: function (data) {
            hideloader();
            if (typeof data != 'object')
                {
                    window.open(data, '_blank');
                    return false;
                } 
        }
    });
}
    
    
    
function loadDataField(page) {
    showloader();
    var sort = $("#sort_ft_log").val();
    var colname = $("#colname_ft_log").val();
    var col = $("#ft_col_log").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/field_trip_log_list",
        data: "page=" + page + "&sort=" + sort + "&colname=" + colname + "&ft_date=" + $('#ft_log_date').val() + "&ft_shift=" + $('#ft_log_shift').val() + "&ft_route=" + $('#ft_log_route').val() + "&ft_driver_id=" + $('#ft_log_driver_id').val(),
        success: function (data) {
            $('#transport_dynamic_div').html(data);
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


    
function loadDataFieldTrip(page) {
    showloader();
    var sort = $("#sort_ft_log").val();
    var colname = $("#colname_ft_log").val();
    var col = $("#ft_col_log").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/field_trip_list",
        data: "page=" + page + "&sort=" + sort + "&colname=" + colname + "&ft_date=" + $('#ft_log_date').val() + "&ft_shift=" + $('#ft_log_shift').val() + "&ft_route=" + $('#ft_log_route').val() + "&ft_driver_id=" + $('#ft_log_driver_id').val(),
        success: function (data) {
            $('#transport_dynamic_div').html(data);
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
    
    
function editTimeLog(id, pick_time, drop_time, pick_status, drop_status) {
    $('#cli_pick_time').val("");
    $('#cli_drop_time').val("");
//    $('#pickup_status').val("");
//    $('#dropoff_status').val("");
    $('#trans_id').val(id);
    $('#cli_pick_time').val(pick_time);
    $('#cli_drop_time').val(drop_time);
    $('#pickup_status').val(pick_status);
    $('#dropoff_status').val(drop_status);
    $('#pickDiv').show();
    $('#dropDiv').show();
    $('#TimeCardContent').modal('show');
}
function updateLogTime() {
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/update_log_time",
        data: "trans_id=" + $('#trans_id').val() + "&cli_pick_time=" + $('#cli_pick_time').val() + "&cli_drop_time=" + $('#cli_drop_time').val() + "&pickup_status=" + $('#pickup_status').val() + "&dropoff_status=" + $('#dropoff_status').val(),
        success: function (data) {
            showToastMsg('success', "Time updated successfully");
            $('#TimeCardContent').modal('hide');
            loadDataLog(1);
        }
    });
}
function updateTripTime(type) {
    var start_time = $('#ft_log_start_time').val();
    var end_time = $('#ft_log_end_time').val();
    if ($('#ft_log_' + type + '_time').val() == "") {
        showToastMsg('error', type + "can not be blank");
        return false;
    }
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/update_field_trip_log",
        data: "start_time=" + start_time + "&end_time=" + end_time + "&ft_date=" + $('#ft_log_date').val() + "&ft_route=" + $('#ft_log_route').val() + "&ft_shift=" + $('#ft_log_shift').val(),
        success: function (data) {
            loadDataField(1);
        }
    });
}
function updateLogPickTime() {
    var start_time = $('#pick_log_startTime').val();
    var end_time = $('#pick_log_endTime').val();
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/update_log",
        data: "start_time=" + start_time + "&end_time=" + end_time + "&log_date=" + $('#log_date').val() + "&log_route=" + $('#log_route').val() + "&log_shift=" + $('#log_shift').val() + "&trip_type=pick",
        success: function (data) {
            loadDataLog(1);
        }
    });
} 
function updateLogDropTime() {
    var start_time = $('#drop_log_startTime').val();
    var end_time = $('#drop_log_endTime').val();
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/update_log",
        data: "start_time=" + start_time + "&end_time=" + end_time + "&log_date=" + $('#log_date').val() + "&log_route=" + $('#log_route').val() + "&log_shift=" + $('#log_shift').val() + "&trip_type=drop",
        success: function (data) {
            loadDataLog(1);
        }
    });
}
function updatetranslogPickDropStatus(type){  
    if ($('[name="transloggridIndex[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    showloader();
    var checkedClients = $('input[name="transloggridIndex[]"]:checkbox:checked').map(function () {
        return this.value;
    }).get();

    var checkedTransId = $('input[name="transloggridIndex[]"]:checkbox:checked').map(function () {
        return $(this).attr('data-attr');
    }).get();
    if(type == 'pickup'){
        var alldata = "checkedClients=" + checkedClients + "&transId="+ checkedTransId+ "&tc_pickup_time=" +  $('#trans_log_pickup_time').val();
    }else if(type == 'dropoff'){
        var alldata = "checkedClients=" + checkedClients + "&transId="+ checkedTransId+ "&tc_dropoff_time=" + $('#trans_log_dropoff_time').val();
    }
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/update_allclient_logStatus",
        data: alldata,
        success: function (data) {
            if (data === "success") {
                loadDataLog(1);
            }
            hideloader();
            showToastMsg('success', 'Data Updated Successfully!!')
        }
    });
}
function loadTodaySchedule(page) {
    showloader();
    var sort = $("#sort_ft_log").val();
    var colname = $("#colname_ft_log").val();
    var col = $("#col_log").val();
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/today_schedule_list",
        data: "page=" + page + "&sort=" + sort + "&colname=" + colname + "&ft_date=" + $('#ft_log_date').val() + "&ft_shift=" + $('#ft_log_shift').val() + "&ft_route=" + $('#ft_log_route').val() + "&ft_driver_id=" + $('#ft_log_driver_id').val(),
        success: function (data) {
            $('#transport_dynamic_div').html(data);
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
function getRouteDetails(route_id, shift, type) {
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/get_route_details",
        data: "route_id=" + route_id + "&shift=" + shift + "&type=" + type,
        success: function (data) {
            $('#routeDetails').html(data);
            $('#routeDetailsDiv').modal('show');
            hideloader();
        }
    });
}

function loadDataTransport(page, tab = "") {
    showloader();
    var trans_date = $('#trans_datePick').val();
    var status = $('#transEthenPick').val();
    var shiftTiming = $('#transTimingPick').val();
    var routeLists = $('#routeListsPick').val();
    var pickDriverLists = $('#trans_PickDriverPick').val();
    var sort = $("#sortPick").val();
    var colname = $("#colnamePick").val();
    var col = $("#colPick").val();

    $('.sorting').attr('id', '');
    //unsetval_session_issue('trans_pick');
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/transport_list",
        data: "page=" + page + "&status=" + status + "&trans_date=" + trans_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_namePick').val() + "&client_id=" + $('#trans_client_idPick').val() + "&client_dob=" + $('#trans_client_dob').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#transport_dynamic_div').html(data);
            if (col) {
                $("#transport_dynamic_div table thead tr:eq(0) th:not(" + col + ")").attr('id', '');
            }
            if (sort == 'asc')
            {
                $("#transport_dynamic_div table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-up');
            } else
            {
                $("#transport_dynamic_div table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-down');
            }
            get_pu_calculation();
        }
    });
}

function loadDataDropTransport(page, tab = "") {
    showloader();

    var trans_date = $('#trans_dateDrop').val();
    var status = $('#transEthenDrop').val();
    var shiftTiming = $('#transTimingDrop').val();
    var routeLists = $('#routeListsDrop').val();
    var pickDriverLists = $('#trans_DropdriverPick').val();
    var sort = $("#sortDrop").val();
    var colname = $("#colDropname").val();
    var col = $("#colDrop").val();
    var order_type = 'dropoff';
    $('.sortingDrop').attr('id', '');
//    unsetval_session_issue('trans_drop');
    $.ajax({
        type: 'POST',
        url: Host + "Transportation/transport_list",
        data: "page=" + page + "&order_type=" + order_type + "&status=" + status + "&trans_date=" + trans_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_nameDrop').val() + "&client_id=" + $('#trans_client_idDrop').val() + "&client_dob=" + $('#trans_client_dobDrop').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#transport_dynamic_div').html(data);
            $("#transport_dynamic_div table thead tr:eq(0) th:eq(" + col + ")").attr('id', '');
            if (sort == 'asc')
            {
                $("#transport_dynamic_div table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-up');
            } else
            {
                $("#transport_dynamic_div table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-down');
            }
            get_pu_drop_calculation();
        }
    });
}

function update_per_page_dropoff(per_page){
    $.ajax({
        type: 'POST',
        url: Host + "clients/update_per_page",
        data: "&per_page=" + per_page,
        success: function (data) {
            loadDataDropTransport(1);
        }
    });
}

function update_per_page_pickup(per_page){
    $.ajax({
        type: 'POST',
        url: Host + "clients/update_per_page",
        data: "&per_page=" + per_page,
        success: function (data) {
            loadDataTransport(1);
        }
    });
}



showloader();
$("#applyToall").click(function () {
    $(".gridIndex").prop('checked', $(this).prop('checked'));
});
//loadDataByPage(1);


