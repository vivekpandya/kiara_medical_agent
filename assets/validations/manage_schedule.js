var Host = $('#base_url').val();
/*Shift schedule part starts her*/
function sortTable(elem, columnName) {
    var colName = $("#colname").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort").val();
    if (colName != columnName)
    {
        $("#sort").val('asc');
    } else {
        if (sort == 'asc')
            $("#sort").val("desc");
        else
            $("#sort").val('asc');
    }
    $("#colname").val(columnName);
    $("#col").val(col);
    loadDataByPage(1);
}
function loadDataByPage(page, tab = "") {
    setTimeout(function () {
        showloader();
        var schedule_date = $('#schedule_date').val();
        var status = $('#shiftEthen').val();
        var shiftTiming = $('#shiftTiming').val();
        var sort = $("#sort").val();
        var colname = $("#colname").val();
        var col = $("#col").val();
        $('.sorting').attr('id', '');
        unsetval_session_issue('shift');
        $.ajax({
            type: 'POST',
            url: Host + "Schedule/shift_list",
            data: "page=" + page + "&status=" + status + "&schedule_date=" + schedule_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&client_dob=" + $('#client_dob').val() + "&client_schedule=" + $('#client_schedule').val() + "&client_name=" + $('#client_name').val() + "&client_id=" + $('#client_id').val() + "&tab=" + tab,
            success: function (data) {
                $('#shitScedulingDiv').html(data);
                if (sort == 'asc')
                {
                    $("table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-up');
                } else {
                    $("table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-down');
                }
                hideloader();
            }
        });
    }, 1000);
    hideloader();
}
$('#schedule_date').datepicker({
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm/dd/yy',
    showButtonPanel: true,
    selectCurrent: true,
    onSelect: function (dateText, inst) {
        loadDataByPage(1);
    }
});

$('#weekly_from_shift_date').datepicker({
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm/dd/yy',
    showButtonPanel: true,
    selectCurrent: true,
    maxDate: new Date(),
    beforeShowDay: function(dt)
      {
        return [dt.getDay() == 0, ""];
      }
});
$('#schedule_from_shift_date').datepicker({
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm/dd/yy',
    showButtonPanel: true,
    selectCurrent: true,
    minDate: new Date(),
    beforeShowDay: function(dt)
      {
        return [dt.getDay() == 0, ""];
      }
});
//weekdays();
function weekdays()
{
    var from_date = $("#weekly_from_shift_date").val();
    var todate = $.datepicker.formatDate('mm/dd/yy', new Date(new Date(from_date).getTime() +
                                           6*24*60*60*1000));
    $("#weekly_to_shift_date").val(todate);

    var next_from_date = $("#schedule_from_shift_date").val();
    var next_todate = $.datepicker.formatDate('mm/dd/yy', new Date(new Date(next_from_date).getTime() +
                                           6*24*60*60*1000));
    $("#schedule_to_shift_date").val(next_todate);
}
$('#weekly_from_shift_date').change(function(){
    var from_date = $("#weekly_from_shift_date").val();
    var todate = $.datepicker.formatDate('mm/dd/yy', new Date(new Date(from_date).getTime() +
                                           6*24*60*60*1000));
    $("#weekly_to_shift_date").val(todate);
});

$('#schedule_from_shift_date').change(function(){
    var from_date = $("#schedule_from_shift_date").val();
    var todate = $.datepicker.formatDate('mm/dd/yy', new Date(new Date(from_date).getTime() +
                                           6*24*60*60*1000));
    $("#schedule_to_shift_date").val(todate);
});
$('#previous_shift_date').datepicker({
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm/dd/yy',
    showButtonPanel: true,
    selectCurrent: true,
});
$('#client_dob').datepicker({
    format: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm/dd/yy',
    showButtonPanel: true,
    selectCurrent: true,
    onSelect: function (dateText, inst) {
        loadDataByPage(1);
    }
});
$("#applyToall").click(function () {
    $(".gridIndex").prop('checked', $(this).prop('checked'));
});
function updateScheduleComment(shift_id, cli_id) {
    var shift_comment = $('textarea#shift_comment_' + shift_id + '_' + cli_id).val();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_shift_comment",
        data: "shift_comment=" + shift_comment + "&shift_id=" + shift_id + "&cli_id=" + cli_id + "&shift_date=" + $('#schedule_date').val(),
        success: function (data) {
            if (data === "success") {
                loadDataByPage(1);
            }
        }
    });
}
function repeat_shift() {
    setTimeout(function () {
        showloader();
        $.ajax({
            type: 'POST',
            url: Host + "Schedule/repeat_shift",
            async: true,
            data: "schedule_date=" + $('#schedule_date').val() + "&previous_shift_date=" + $('#previous_shift_date').val(),
            success: function (data) {
                hideloader();
                if (data === "created") {
                    showToastMsg('Success', "Shift copied from previous day successfully");
                    loadDataByPage(1);
                } else if (data === "none") {
                    showToastMsg('error', "No previous shift data available");
                } else {
                    showToastMsg('error', "Please create shift for this day first");
                }
                $('#CancelContentModal').modal('hide');
            }
        });
    })
}

function weekly_repeat_shift() {
    setTimeout(function () {
        showloader();
        $.ajax({
            type: 'POST',
            url: Host + "Schedule/weekly_repeat_shift",
            async: true,
            data: "schedule_from_shift_date=" + $('#schedule_from_shift_date').val() + "&schedule_to_shift_date=" + $('#schedule_to_shift_date').val() + "&weekly_from_shift_date=" + $('#weekly_from_shift_date').val() + "&weekly_to_shift_date=" + $('#weekly_to_shift_date').val(),
            success: function (data) {
                hideloader();
                if (data === "created") {
                    showToastMsg('Success', "Shift copied from previous day successfully");
                    loadDataByPage(1);
                } else if (data === "none") {
                    showToastMsg('error', "No previous shift data available");
                } else {
                    showToastMsg('error', "Please create shift for this day first");
                }
                $('#WeeklyContentModal').modal('hide');
            }
        });
    })
}
function updateAllShifts() {
    var checkedClients = $('.gridIndex:checkbox:checked').map(function () {
        return this.id;
    }).get();
    var cliArr = checkedClients.join(",");
    var checkedShifts = $('.gridIndex:checkbox:checked').map(function () {
        if (this.value) {
            return this.value;
        }
    }).get();
    if ($('[name="gridIndex[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    if (checkedShifts.length > 0) {
        $('#addClientModal').modal('show');
        return false;
    }
    var shiftArr = checkedShifts.join(",");
    var shift_timings = $('#shiftAllTypes').val();
    var shift_confirm = $('#shiftAllConfirm').val();
    var schedule_date = $('#schedule_date').val();
    var start_time = $('#start_time').val();
    var end_time = $('#end_time').val();
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_client_schedule",
        data: "shift_timings=" + shift_timings + "&shift_confirm=" + shift_confirm + "&schedule_date=" + schedule_date + "&cli_id_arr=" + cliArr + "&shift_id_arr=" + shiftArr + "&start_time=" + start_time + "&end_time=" + end_time,
        success: function (data) {
            var current_page_shift = '';
            current_page_shift = $("#current_page_shift").val();
            if (current_page_shift == null) {
                current_page_shift = 1;
            }
            if (data === "success") {
                //window.location.reload();
                showToastMsg('success', 'Data Updated Successfully!!')
                loadDataByPage(current_page_shift);
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}
function updateAllShiftsPopup() {
    $('#addClientModal').modal('hide');
    var checkedClients = $('.gridIndex:checkbox:checked').map(function () {
        return this.id;
    }).get();
    var cliArr = checkedClients.join(",");
    var checkedShifts = $('.gridIndex:checkbox:checked').map(function () {
        if (this.value) {
            return this.value;
        }
    }).get();
    if ($('[name="gridIndex[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    var shiftArr = checkedShifts.join(",");
    var shift_timings = $('#shiftAllTypes').val();
    var shift_confirm = $('#shiftAllConfirm').val();
    var schedule_date = $('#schedule_date').val();
    var start_time = $('#start_time').val();
    var end_time = $('#end_time').val();
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_client_schedule",
        data: "shift_timings=" + shift_timings + "&shift_confirm=" + shift_confirm + "&schedule_date=" + schedule_date + "&cli_id_arr=" + cliArr + "&shift_id_arr=" + shiftArr + "&start_time=" + start_time + "&end_time=" + end_time,
        success: function (data) {
            var current_page_shift = '';
            current_page_shift = $("#current_page_shift").val();
            if (current_page_shift == null) {
                current_page_shift = 1;
            }
            if (data === "success") {
                //window.location.reload();
                showToastMsg('success', 'Data Updated Successfully!!')
                loadDataByPage(current_page_shift);
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}
function shiftPrint() {
    showloader();
    var page = '1';
    var schedule_date = $('#schedule_date').val();
    var status = $('#shiftEthen').val();
    var shiftTiming = $('#shiftTiming').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/shift_print",
        data: "page=" + page + "&status=" + status + "&schedule_date=" + schedule_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&cli_dob=" + $('#client_dob').val() + "&client_schedule=" + $('#client_schedule').val() + "&client_name=" + $('#client_name').val() + "&client_id=" + $('#client_id').val(),
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
function shiftExport() {
    showloader();
    var page = '1';
    var schedule_date = $('#schedule_date').val();
    var status = $('#shiftEthen').val();
    var shiftTiming = $('#shiftTiming').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/shift_export",
        data: "page=" + page + "&status=" + status + "&schedule_date=" + schedule_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&cli_dob=" + $('#client_dob').val() + "&client_schedule=" + $('#client_schedule').val() + "&client_name=" + $('#client_name').val() + "&client_id=" + $('#client_id').val(),
        success: function (data) {
            hideloader();
            if (data != "No_Data")
                window.open(data, "_self");
            else
                showToastMsg("error", "Sorry! No data found.");
        }
    });
}
/*Shift schedule part ends here*/

/*Transporation schedule part starts here*/
function sortTableTrans(elem, columnName) {
    var colName = $("#colnamePick").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sortPick").val();
    if (colName != columnName)
    {
        $("#sortPick").val('asc');
    } else {
        if (sort == 'asc')
            $("#sortPick").val("desc");
        else
            $("#sortPick").val('asc');
    }
    $("#colnamePick").val(columnName);
    $("#colPick").val(col);
    loadDataTransport(1);
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
    unsetval_session_issue('trans_pick');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/transport_list",
        data: "page=" + page + "&status=" + status + "&trans_date=" + trans_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_namePick').val() + "&client_id=" + $('#trans_client_idPick').val() + "&client_dob=" + $('#trans_client_dob').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#transportaionSchedulingDiv').html(data);
            if (col) {
                $("#transportaionSchedulingDiv table thead tr:eq(0) th:not(" + col + ")").attr('id', '');
            }
            if (sort == 'asc')
            {
                $("#transportaionSchedulingDiv table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-up');
            } else
            {
                $("#transportaionSchedulingDiv table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-down');
            }
            get_pu_calculation();
        }
    });
}
function updateAllTransport() {
    var checkedRoute = $('.gridIndexTrans:checkbox:checked').map(function () {
        if ($(this).attr('trans_route_no') > 0) {
            return $(this).attr('trans_route_no');
        }
    }).get();
    if ($('[name="gridIndexTrans[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    if (checkedRoute.length === 0) {
        if ($('#transRouteIdPick').val() == "") {
            showToastMsg('error', "Please select route no!");
            return false;
        }
    }
    var checkedClients = $('.gridIndexTrans:checkbox:checked').map(function () {
        return this.id;
    }).get();
    var cliArr = checkedClients.join(",");
    var checkedTrans = $('.gridIndexTrans:checkbox:checked').map(function () {
        return this.value;
    }).get();
    var cliOrderNo = $('.pick_oder_no_cls').map(function () {
        if (!$(this).is(":disabled")) {
            return this.value;
        }
    }).get();
    var cliIDOrderNo = $('.pick_oder_no_cls').map(function () {
        if (!$(this).is(":disabled")) {
            return this.id;
        }
    }).get();

    var transArr = checkedTrans.join(",");
    var trans_pick = $('#transPickDriverPick').val();
    var trans_drop = $('#transDropdriverPick').val();
    var trans_date = $('#trans_datePick').val();


    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_client_tranport",
        data: "trans_date=" + trans_date + "&cli_id_arr=" + cliArr + "&trans_id_arr=" + transArr + "&trans_pick=" + trans_pick + "&trans_drop=" + trans_drop + "&trans_route=" + $('#transRouteId').val() + "&vehicle_no=" + $('#transPickVehicle').val() + "&estimated_pick_time=" + $('#estimated_pickup_time').val() + "&new_vehicle_no=" + $('#vehicle_no').val() + "&cli_order_value=" + cliOrderNo + "&cliIDOrderNo=" + cliIDOrderNo + "&trans_pick_wheel_chair=" + $('#pick_wheel_chair_main').val(),
        success: function (data) {
            var current_page_trans_pickup = '';
            current_page_trans_pickup = $("#current_page_trans_pickup").val();
            if (current_page_trans_pickup == null) {
                current_page_trans_pickup = 1;
            }
            if (data === "success") {
                loadDataTransport(current_page_trans_pickup);
                showToastMsg('success', 'Data Updated Successfully!!');
                get_pu_calculation();
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}

function updateAllTransportDropdownwise() {
    var checkedTrans = $('.gridIndexTrans:checkbox').map(function () {
        return this.value;
    }).get();
    var transArr = checkedTrans.join(",");

    var checkedroute = $('select[name="routes_dd[]"]').map(function () {
        return this.value;
    }).get();

    var checkeddriver = $('select[name="driver_dd[]"]').map(function () {
        return this.value;
    }).get();

    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_client_tranport_dropdown",
        data: "trans_cli_route=" + checkedroute + "&trans_id_arr=" + transArr + "&trans_driver=" + checkeddriver,
        success: function (data) {
            var current_page_trans_pickup = '';
            current_page_trans_pickup = $("#current_page_trans_pickup").val();
            if (current_page_trans_pickup == null) {
                current_page_trans_pickup = 1;
            }
            if (data === "success") {
                loadDataTransport(current_page_trans_pickup);
                showToastMsg('success', 'Data Updated Successfully!!')
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}
function updateAllTransportDropDropdownwise() {
    var checkedTrans = $('.gridIndexTransDrop:checkbox').map(function () {
        return this.value;
    }).get();
    var transArr = checkedTrans.join(",");

    var checkedroute = $('select[name="routes_drop_dd[]"]').map(function () {
        return this.value;
    }).get();

    var checkeddriver = $('select[name="driver_drop_dd[]"]').map(function () {
        return this.value;
    }).get();

    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_client_tranportDrop_dropdown",
        data: "trans_cli_route=" + checkedroute + "&trans_id_arr=" + transArr + "&trans_driver=" + checkeddriver,
        success: function (data) {
            /*if (data === "success") {
             loadDataTransport(1);
             }
             hideloader();
             showToastMsg('success', 'Data Updated Successfully!!')*/
            var current_page_trans_drop = '';
            current_page_trans_drop = $("#current_page_trans_drop").val();
            if (current_page_trans_drop == null) {
                current_page_trans_drop = 1;
            }
            if (data === "success") {
                loadDataDropTransport(current_page_trans_drop);
                showToastMsg('success', 'Data Updated Successfully!!')
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}

function route_optimization_map() {
    showloader();
    var trans_date = $('#trans_datePick').val();
    var status = $('#transEthenPick').val();
    var shiftTiming = $('#transTimingPick').val();
    var routeLists = $('#routeListsPick').val();
    var pickDriverLists = $('#trans_PickDriverPick').val();
    var sort = $("#sortPick").val();
    var colname = $("#colnamePick").val();
    var col = $("#colPick").val();
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/route_optimization_map",
        data: "status=" + status + "&trans_date=" + trans_date + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_namePick').val() + "&client_id=" + $('#trans_client_idPick').val() + "&client_dob=" + $('#trans_client_dob').val(),
        success: function (data) {
            if (data === "success") {
                loadDataTransport(1);
                showToastMsg('success', 'Data Updated Successfully!!');

            } else if (data === "error") {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.');
            } else {
                hideloader();
                showToastMsg('error', data);
            }
        }
    });
    hideloader();
}

function transPrint() {
    showloader();
    var trans_date = $('#trans_datePick').val();
    var status = $('#transEthenPick').val();
    var shiftTiming = $('#transTimingPick').val();
    var routeLists = $('#routeListsPick').val();
    var pickDriverLists = $('#trans_PickDriverPick').val();
    var sort = $("#sortPick").val();
    var colname = $("#colnamePick").val();
    var col = $("#colPick").val();
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/trans_print",
        data: "page=" + page + "&status=" + status + "&trans_date=" + trans_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_namePick').val() + "&client_id=" + $('#trans_client_idPick').val() + "&client_dob=" + $('#trans_client_dob').val(),
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
function transExport() {
    showloader();
    var trans_date = $('#trans_datePick').val();
    var status = $('#transEthenPick').val();
    var shiftTiming = $('#transTimingPick').val();
    var routeLists = $('#routeListsPick').val();
    var pickDriverLists = $('#trans_PickDriverPick').val();
    var sort = $("#sortPick").val();
    var colname = $("#colnamePick").val();
    var col = $("#colPick").val();
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/trans_export",
        data: "page=" + page + "&status=" + status + "&trans_date=" + trans_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_namePick').val() + "&client_id=" + $('#trans_client_idPick').val() + "&client_dob=" + $('#trans_client_dob').val(),
        success: function (data) {
            hideloader();
            if (data != "No_Data")
                window.open(data, "_self");
            else
                showToastMsg("error", "Sorry! No data found.");
        }
    });
}
/*Transporation schedule part ends here*/
/*Transportation Drop part starts here */

function sortTableTransDrop(elem, columnName) {
    var colName = $("#colDropname").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sortDrop").val();
    if (colName != columnName)
    {
        $("#sortDrop").val('asc');
    } else {
        if (sort == 'asc')
            $("#sortDrop").val("desc");
        else
            $("#sortDrop").val('asc');
    }
    $("#colDropname").val(columnName);
    $("#colDrop").val(col);
    loadDataDropTransport(1);
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
    unsetval_session_issue('trans_drop');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/transport_list",
        data: "page=" + page + "&order_type=" + order_type + "&status=" + status + "&trans_date=" + trans_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_nameDrop').val() + "&client_id=" + $('#trans_client_idDrop').val() + "&client_dob=" + $('#trans_client_dobDrop').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#transportaionDropSchedulingDiv').html(data);
            $("#transportaionDropSchedulingDiv table thead tr:eq(0) th:eq(" + col + ")").attr('id', '');
            if (sort == 'asc')
            {
                $("#transportaionDropSchedulingDiv table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-up');
            } else
            {
                $("#transportaionDropSchedulingDiv table thead tr:eq(0) th:eq(" + col + ")").attr('id', 'arrow-down');
            }
            get_pu_drop_calculation();
        }
    });
}
function updateAllTransportDrop() {
    var checkedRoute = $('.gridIndexTransDrop:checkbox:checked').map(function () {
        if ($(this).attr('trans_route_no') > 0) {
            return $(this).attr('trans_route_no');
        }
    }).get();
    if ($('[name="gridIndexTransDrop[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    if (checkedRoute.length === 0) {
        if ($('#transRouteIdDrop').val() == "") {
            showToastMsg('error', "Please select route no!");
            return false;
        }
    }
    var checkedClients = $('.gridIndexTransDrop:checkbox:checked').map(function () {
        return this.id;
    }).get();
    var cliArr = checkedClients.join(",");
    var checkedTrans = $('.gridIndexTransDrop:checkbox:checked').map(function () {
        return this.value;
    }).get();

    var cliOrderNo = $('.pick_oder_no_clsDrop').map(function () {
        if (!$(this).is(":disabled")) {
            return this.value;
        }
    }).get();

    var cliIDOrderNo = $('.pick_oder_no_clsDrop').map(function () {
        if (!$(this).is(":disabled")) {
            return this.id;
        }
    }).get();

    var transArr = checkedTrans.join(",");
    var trans_pick = $('#transPickDriverDrop').val();
    var trans_drop = $('#transDropdriverDrop').val();
    var trans_date = $('#trans_dateDrop').val();
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_client_tranportDrop",
        data: "trans_date=" + trans_date + "&cli_id_arr=" + cliArr + "&trans_id_arr=" + transArr + "&trans_pick=" + trans_pick + "&trans_drop=" + trans_drop + "&trans_route=" + $('#transRouteIdDrop').val() + "&vehicle_no=" + $('#transDropVehicle').val() + "&estimated_drop_time=" + $('#estimated_drop_time').val() + "&new_vehicle_no=" + $('#vehicle_no').val() + "&cli_order_value=" + cliOrderNo + "&cliIDOrderNo=" + cliIDOrderNo + "&trans_drop_wheel_chair=" + $('#drop_wheel_chair_main').val(),
        success: function (data) {
            var current_page_trans_drop = '';
            current_page_trans_drop = $("#current_page_trans_drop").val();
            if (current_page_trans_drop == null) {
                current_page_trans_drop = 1;
            }
            if (data === "success") {
                loadDataDropTransport(current_page_trans_drop);
                showToastMsg('success', 'Data Updated Successfully!!')
                get_pu_calculation();
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}
function transPrintDrop() {
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
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/trans_print",
        data: "page=" + page + "&order_type=" + order_type + "&status=" + status + "&trans_date=" + trans_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_nameDrop').val() + "&client_id=" + $('#trans_client_idDrop').val() + "&client_dob=" + $('#trans_client_dob').val(),
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

function transExportDrop() {
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
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/trans_export",
        data: "page=" + page + "&order_type=" + order_type + "&status=" + status + "&trans_date=" + trans_date + "&sort=" + sort + "&colname=" + colname + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_nameDrop').val() + "&client_id=" + $('#trans_client_idDrop').val() + "&client_dob=" + $('#trans_client_dob').val(),
        success: function (data) {
            hideloader();
            if (data != "No_Data")
                window.open(data, "_self");
            else
                showToastMsg("error", "Sorry! No data found.");
        }
    });
}

function route_optimization_drop_map() {

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
    var page = '1';

    $.ajax({
        type: 'POST',
        url: Host + "Schedule/route_optimization_drop_map",
        data: "status=" + status + "&trans_date=" + trans_date + "&shift_timings=" + shiftTiming + "&trans_route=" + routeLists + "&pickDriverLists=" + pickDriverLists + "&client_name=" + $('#trans_client_nameDrop').val() + "&client_id=" + $('#trans_client_idDrop').val() + "&client_dob=" + $('#trans_client_dob').val(),
        success: function (data) {
            if (data === "success") {
                loadDataDropTransport(1);
                showToastMsg('success', 'Data Updated Successfully!!');

            } else if (data === "error") {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.');
            } else {
                hideloader();
                showToastMsg('error', data);
            }
        }
    });
    hideloader();
}

/*Transportation Drop part ends here */
/*Field Trip schedule part starts here*/
function loadDataFieldTrip(page, tab = "") {
    showloader();
    var ft_date = $('#ft_date').val();
    var fieldTrips = $('#fieldTrips').val();
    var fieldEthen = $('#fieldEthen').val();
    var fieldTiming = $('#fieldTiming').val();
    var fieldRouteLists = $('#fieldRouteLists').val();
    var fieldMealLists = $('#fieldMealLists').val();
    var sort = $("#field_trip_sort").val();
    var colname = $("#field_trip_colname").val();
    var col = $("#field_trip_col").val();
    $('.sorting').attr('id', '');
    unsetval_session_issue('field_trip');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/field_trip_list",
        data: "page=" + page + "&fieldTrips=" + fieldTrips + "&ft_date=" + ft_date + "&sort=" + sort + "&colname=" + colname + "&fieldTiming=" + fieldTiming + "&fieldRouteLists=" + fieldRouteLists + "&fieldEthen=" + fieldEthen + "&fieldMealLists=" + fieldMealLists + "&client_name=" + $('#ft_client_name').val() + "&client_id=" + $('#ft_client_id').val() + "&client_dob=" + $('#ft_client_dob').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#fieldTripSchedulingDiv').html(data);
            if (sort == 'asc')
            {
                $(".transSortCol").attr('id', 'arrow-up');
            } else {
                $(".transSortCol").attr('id', 'arrow-down');
            }
        }
    });
}
function sortTableField(elem, columnName) {
    var colName = $("#field_trip_colname").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#field_trip_sort").val();
    if (colName != columnName)
    {
        $("#field_trip_sort").val('asc');
    } else {
        if (sort == 'asc')
            $("#field_trip_sort").val("desc");
        else
            $("#field_trip_sort").val('asc');
    }
    $("#field_trip_colname").val(columnName);
    $("#field_trip_col").val(col);
    loadDataFieldTrip(1);
}
function create_field_trip() {
    if ($('[name="gridIndexField[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    var checkedLoc = $('.gridIndexField:checkbox:checked').map(function () {
        if ($(this).attr('ft_loc_id') > 0) {
            return $(this).attr('ft_loc_id');
        }
    }).get();
    var checkedStaff = $('.gridIndexField:checkbox:checked').map(function () {
        if ($(this).attr('ft_staff_id') > 0) {
            return $(this).attr('ft_staff_id');
        }
    }).get();
    var checkedMeal = $('.gridIndexField:checkbox:checked').map(function () {
        if ($(this).attr('ft_meal_id') > 0) {
            return $(this).attr('ft_meal_id');
        }
    }).get();
    var checkedRoute = $('.gridIndexField:checkbox:checked').map(function () {
        if ($(this).attr('ft_route_id') > 0) {
            return $(this).attr('ft_route_id');
        }
    }).get();
    if (checkedStaff.length === 0) {
        if ($('#fieldStaff').val() == "") {
            showToastMsg('error', "Please assign staff member to trip!");
            return false;
        }
    }
    /*if (checkedMeal.length === 0) {
     if ($('#fieldMeal').val() == "") {
     showToastMsg('error', "Please assign meal to trip!");
     return false;
     }
     }*/
    if (checkedLoc.length === 0) {
        if ($('#fieldLocation').val() == "") {
            showToastMsg('error', "Please assign location to trip!");
            return false;
        }
    }
    if (checkedRoute.length === 0) {
        if ($('#fieldRouteId').val() == "") {
            showToastMsg('error', "Please select route no!");
            return false;
        }
    }
    var checkedClients = $('.gridIndexField:checkbox:checked').map(function () {
        return this.id;
    }).get();
    var cliArr = checkedClients.join(",");
    var cliIdArr = $('.gridIndexField:checkbox:checked').map(function () {
        return $(this).val();
    }).get();
    var ftArr = cliIdArr.join(",");
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/create_field_trip",
        data: "ft_date=" + $('#ft_date').val() + "&cli_id_arr=" + cliArr + "&fieldTripDriver=" + $('#fieldTripDriver').val() + "&fieldStaff=" + $('#fieldStaff').val() + "&fieldMeal=" + $('#fieldMeal').val() + "&fieldLocation=" + $('#fieldLocation').val() + "&fieldRoute=" + $('#fieldRouteId').val() + "&ft_id_arr=" + ftArr,
        success: function (data) {
            /*if (data === "success") {
             showToastMsg('Success', "Data updated successfully");
             loadDataFieldTrip(1);
             }*/
            var current_page_field_trip = '';
            current_page_field_trip = $("#current_page_field_trip").val();
            if (current_page_field_trip == null) {
                current_page_field_trip = 1;
            }
            if (data === "success") {
                loadDataFieldTrip(current_page_field_trip);
                showToastMsg('success', 'Data Updated Successfully!!')
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}
function create_field_tripDropdownwise() {
    var checkedTrans = $('.gridIndexField:checkbox').map(function () {
        return this.value;
    }).get();
    var transArr = checkedTrans.join(",");
    //alert(checkedTrans);

    var checkedroute = $('select[name="field_routes_dd[]"]').map(function () {
        return this.value;
    }).get();
    //alert(checkedroute);

    var checkeddriver = $('select[name="field_driver_dd[]"]').map(function () {
        return this.value;
    }).get();
    //alert(checkeddriver);
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/create_field_trip_dropdown",
        data: "ft_id_arr=" + transArr + "&ft_route_arr=" + checkedroute + "&ft_driver_arr=" + checkeddriver,
        success: function (data) {
            /*if (data === "success") {
             hideloader();
             showToastMsg('Success', "Data updated successfully");
             loadDataFieldTrip(1);
             }*/
            var current_page_field_trip = '';
            current_page_field_trip = $("#current_page_field_trip").val();
            if (current_page_field_trip == null) {
                current_page_field_trip = 1;
            }
            if (data === "success") {
                loadDataFieldTrip(current_page_field_trip);
                showToastMsg('success', 'Data Updated Successfully!!')
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
//    $.ajax({
//        type: 'POST',
//        url: Host + "Schedule/update_all_client_tranportDrop_dropdown",
//        data: "trans_cli_route=" + checkedroute + "&trans_id_arr=" + transArr + "&trans_driver=" + checkeddriver,
//        success: function (data) {
//            if (data === "success") {
//                loadDataTransport(1);
//            }
//            hideloader();
//            showToastMsg('success', 'Data Updated Successfully!!')
//        }
//    });
//    var checkedClients = $('.gridIndexField:checkbox:checked').map(function () {
//        return this.id;
//    }).get();
//    var cliArr = checkedClients.join(",");
//    var cliIdArr = $('.gridIndexField:checkbox:checked').map(function () {
//        return $(this).val();
//    }).get();
//    var ftArr = cliIdArr.join(",");
//    $.ajax({
//        type: 'POST',
//        url: Host + "Schedule/create_field_trip",
//        data: "ft_date=" + $('#ft_date').val() + "&cli_id_arr=" + cliArr + "&fieldTripDriver=" + $('#fieldTripDriver').val() + "&fieldStaff=" + $('#fieldStaff').val() + "&fieldMeal=" + $('#fieldMeal').val() + "&fieldLocation=" + $('#fieldLocation').val() + "&fieldRoute=" + $('#fieldRouteId').val() + "&ft_id_arr=" + ftArr,
//        success: function (data) {
//            if (data === "success") {
//                showToastMsg('Success', "Data updated successfully");
//                loadDataFieldTrip(1);
//            }
//        }
//    });
}
function fieldPrint() {
    showloader();
    var ft_date = $('#ft_date').val();
    var fieldTrips = $('#fieldTrips').val();
    var fieldEthen = $('#fieldEthen').val();
    var fieldTiming = $('#fieldTiming').val();
    var fieldRouteLists = $('#fieldRouteLists').val();
    var fieldMealLists = $('#fieldMealLists').val();
    var sort = $("#field_trip_sort").val();
    var colname = $("#field_trip_colname").val();
    var col = $("#field_trip_col").val();
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/field_print",
        data: "page=" + page + "&fieldTrips=" + fieldTrips + "&ft_date=" + ft_date + "&sort=" + sort + "&colname=" + colname + "&fieldTiming=" + fieldTiming + "&fieldRouteLists=" + fieldRouteLists + "&fieldEthen=" + fieldEthen + "&fieldMealLists=" + fieldMealLists + "&client_name=" + $('#ft_client_name').val() + "&client_id=" + $('#ft_client_id').val() + "&client_dob=" + $('#ft_client_dob').val(),
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
/*Field Trip schedule part ends here*/
/*Nurse schedule part starts here*/
function sortTableNurse(elem, columnName) {
    var colName = $("#colname").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort").val();
    if (colName != columnName)
    {
        $("#sort").val('asc');
    } else {
        if (sort == 'asc')
            $("#sort").val("desc");
        else
            $("#sort").val('asc');
    }
    $("#colname").val(columnName);
    $("#col").val(col);
    loadDataNurse(1);
}
function loadDataNurse(page, tab = "") {
    showloader();
    var nurse_date = $('#nurse_date').val();
    var nurseTiming = $('#nurseTiming').val();
    var nurseList = $('#nurseList').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    unsetval_session_issue('nursing');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/nurse_list",
        data: "page=" + page + "&nurse_date=" + nurse_date + "&sort=" + sort + "&colname=" + colname + "&nurseTiming=" + nurseTiming + "&nurseList=" + nurseList + "&client_name=" + $('#ns_client_name').val() + "&client_id=" + $('#ns_client_id').val() + "&client_dob=" + $('#ns_client_dob').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#nursingSchedulingDiv').html(data);
            if (sort == 'asc')
            {
                $(".transSortCol").attr('id', 'arrow-up');
            } else {
                $(".transSortCol").attr('id', 'arrow-down');
            }
        }
    });
}
function updateAllNurse() {
    if ($('[name="gridIndexNurse[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    if ($('#assignNurse').val() == "") {
        showToastMsg('error', "Please assign nurse to shift!");
        return false;
    }
    var checkedClients = $('.gridIndexNurse:checkbox:checked').map(function () {
        return this.id;
    }).get();
    var cliArr = checkedClients.join(",");
    var checkedTrans = $('.gridIndexNurse:checkbox:checked').map(function () {
        return this.value;
    }).get();
    var checkedFood = checkedTrans.join(",");
    var assignNurse = $('#assignNurse').val();
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_nurse_shift",
        data: "nurse_id=" + assignNurse + "&cli_id_arr=" + cliArr + "&ns_id_arr=" + checkedFood + "&ns_date=" + $('#nurse_date').val(),
        success: function (data) {
            /*if (data === "success") {
             loadDataNurse(1);
             }
             hideloader();
             showToastMsg('success', 'Data Updated Successfully!!')*/
            var current_page_nurse = '';
            current_page_nurse = $("#current_page_nurse").val();
            if (current_page_nurse == null) {
                current_page_nurse = 1;
            }
            if (data === "success") {
                loadDataNurse(current_page_nurse);
                showToastMsg('success', 'Data Updated Successfully!!')
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}
function nursePrint() {
    showloader();
    var nurse_date = $('#nurse_date').val();
    var nurseTiming = $('#nurseTiming').val();
    var nurseList = $('#nurseList').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/nurse_print",
        data: "page=" + page + "&nurse_date=" + nurse_date + "&sort=" + sort + "&colname=" + colname + "&nurseTiming=" + nurseTiming + "&nurseList=" + nurseList + "&client_name=" + $('#ns_client_name').val() + "&client_id=" + $('#ns_client_id').val() + "&client_dob=" + $('#ns_client_dob').val(),
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
function nurseExport() {
    showloader();
    var nurse_date = $('#nurse_date').val();
    var nurseTiming = $('#nurseTiming').val();
    var nurseList = $('#nurseList').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/nurse_export",
        data: "page=" + page + "&nurse_date=" + nurse_date + "&sort=" + sort + "&colname=" + colname + "&nurseTiming=" + nurseTiming + "&nurseList=" + nurseList + "&client_name=" + $('#ns_client_name').val() + "&client_id=" + $('#ns_client_id').val() + "&client_dob=" + $('#ns_client_dob').val(),
        success: function (data) {
            hideloader();
            if (data != "No_Data")
                window.open(data, "_self");
            else
                showToastMsg("error", "Sorry! No data found.");
        }
    });
}
/*Nurse schedule part ends here*/
/*Activity schedule part starts here*/
function sortTableAct(elem, columnName) {
    var colName = $("#colname").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort").val();
    if (colName != columnName)
    {
        $("#sort").val('asc');
    } else {
        if (sort == 'asc')
            $("#sort").val("desc");
        else
            $("#sort").val('asc');
    }
    $("#colname").val(columnName);
    $("#col").val(col);
    loadDataActivity(1);
}
function loadDataActivity(page, tab) {
    showloader();
    var act_date = $('#act_date').val();
    var act_shift = $('#act_shift').val();
    //var activityId = $('#coomonActivityId').val();
    var activityId = $("input[name=active_id_for_load_tab]").val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    unsetval_session_issue('activities');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/activity_list",
        data: "page=" + page + "&act_date=" + act_date + "&sort=" + sort + "&colname=" + colname + "&act_shift=" + act_shift + "&activityId=" + activityId + "&staffId=" + $('#staffId').val() + "&client_name=" + $('#act_client_name').val() + "&client_id=" + $('#act_client_id').val() + "&client_dob=" + $('#act_client_dob').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#activitiesSchedulingDiv').html(data);
            if (sort == 'asc')
            {
                $(".transSortCol").attr('id', 'arrow-up');
            } else {
                $(".transSortCol").attr('id', 'arrow-down');
            }
        }
    });
}

function updateAllActivity() {
    if ($('[name="gridIndexActivity[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    if ($('#activityStaff').val() == "") {
        showToastMsg('error', "Please assign staff for activity!");
        return false;
    }
    var checkedClients = $('.gridIndexAct:checkbox:checked').map(function () {
        return this.id;
    }).get();
    var cliArr = checkedClients.join(",");
    var checkedTrans = $('.gridIndexAct:checkbox:checked').map(function () {
        return this.value;
    }).get();
    var checkedFood = checkedTrans.join(",");
    var activityStaff = $('#activityStaff').val();
    var activityId = $('#activityId').val();
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_act_shift",
        data: "staff_id=" + activityStaff + "&activityId=" + activityId + "&cli_id_arr=" + cliArr + "&act_id_arr=" + checkedFood + "&act_date=" + $('#act_date').val(),
        success: function (data) {
            /*if (data === "success") {
             loadDataActivity(1);
             }
             hideloader();
             showToastMsg('success', 'Data Updated Successfully!!')*/
            var current_page_activity = '';
            current_page_activity = $("#current_page_activity").val();
            if (current_page_activity == null) {
                current_page_activity = 1;
            }
            if (data === "success") {
                loadDataActivity(current_page_activity);
                showToastMsg('success', 'Data Updated Successfully!!')
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}
function actPrint() {
    showloader();
    var act_date = $('#act_date').val();
    var act_shift = $('#act_shift').val();
    //var activityId = $('#coomonActivityId').val();
    var activityId = $("input[name=active_id_for_load_tab]").val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    var page = '1';
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/activity_print",
        data: "page=" + page + "&act_date=" + act_date + "&sort=" + sort + "&colname=" + colname + "&act_shift=" + act_shift + "&activityId=" + activityId + "&staffId=" + $('#staffId').val() + "&client_name=" + $('#act_client_name').val() + "&client_id=" + $('#act_client_id').val() + "&client_dob=" + $('#act_client_dob').val(),
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
function actExport() {
    showloader();
    var act_date = $('#act_date').val();
    var act_shift = $('#act_shift').val();
    //var activityId = $('#coomonActivityId').val();
    var activityId = $("input[name=active_id_for_load_tab]").val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    var page = '1';
    $('.sorting').attr('id', '');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/activity_export",
        data: "page=" + page + "&act_date=" + act_date + "&sort=" + sort + "&colname=" + colname + "&act_shift=" + act_shift + "&activityId=" + activityId + "&staffId=" + $('#staffId').val() + "&client_name=" + $('#act_client_name').val() + "&client_id=" + $('#act_client_id').val() + "&client_dob=" + $('#act_client_dob').val(),
        success: function (data) {
            hideloader();
            if (data != "No_Data")
                window.open(data, "_self");
            else
                showToastMsg("error", "Sorry! No data found.");
        }
    });
}
/*Activity schedule part ends here*/
/*Food schedule part starts here*/
function sortTableFood(elem, columnName) {
    var colName = $("#colname").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#sort").val();
    if (colName != columnName)
    {
        $("#sort").val('asc');
    } else {
        if (sort == 'asc')
            $("#sort").val("desc");
        else
            $("#sort").val('asc');
    }
    $("#colname").val(columnName);
    $("#col").val(col);
    loadDataFood(1);
}
function loadDataFood(page, tab = "") {
    showloader();
    var food_date = $('#food_date').val();
    var food_shift = $('#food_shift').val();
    var food_staff_id = $('#food_staff_id').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    unsetval_session_issue('food');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/food_list",
        data: "page=" + page + "&food_date=" + food_date + "&sort=" + sort + "&colname=" + colname + "&food_shift=" + food_shift + "&food_staff_id=" + food_staff_id + "&meal_id=" + $('#food_schedule_meal').val() + "&client_name=" + $('#food_client_name').val() + "&client_id=" + $('#food_client_id').val() + "&client_dob=" + $('#food_client_dob').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#foodSchedulingDiv').html(data);
            if (sort == 'asc')
            {
                $(".transSortCol").attr('id', 'arrow-up');
            } else {
                $(".transSortCol").attr('id', 'arrow-down');
            }
        }
    });
}

function updateAllFood() {
    var foodStaffId = $('#foodStaffId').val();
    var activityId = $('#activityId').val();
    var checkedStaff = $('.gridIndexTrans:checkbox:checked').map(function () {
        return $(this).attr('food_staff_id');
        if ($(this).attr('food_staff_id') > 0) {
        }
    }).get();
    var checkedMeal = $('.gridIndexTrans:checkbox:checked').map(function () {
        if ($(this).attr('food_meal_id') > 0) {
            return $(this).attr('food_meal_id');
        }
    }).get();
    if ($('[name="gridIndexFood[]"]:checked').length > 0 == false) {
        showToastMsg('error', "Please select atleast one client!");
        return false;
    }
    if (checkedMeal.length === 0) {
        if ($('#foodScheduleMeal').val() == "") {
            showToastMsg('error', "Please assign meal for clients!");
            return false;
        }
    }
    if (checkedStaff.length === 0) {
        if ($('#foodStaffId').val() == "") {
            showToastMsg('error', "Please assign staff for clients!");
            return false;
        }
    }

    var checkedClients = $('.gridIndexTrans:checkbox:checked').map(function () {
        return this.id;
    }).get();
    var cliArr = checkedClients.join(",");
    var checkedTrans = $('.gridIndexTrans:checkbox:checked').map(function () {
        return this.value;
    }).get();
    var checkedFood = checkedTrans.join(",");
    var checkedVals = $('.food_meal_type:checkbox:checked').map(function () {
        return this.value;
    }).get();
    var foodType = checkedVals.join(",");
    showloader();
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/update_all_food_shift",
        data: "&staff_id=" + foodStaffId + "&cli_id_arr=" + cliArr + "&food_id_arr=" + checkedFood + "&food_date=" + $('#food_date').val() + "&food_meal_type=" + foodType + "&food_meal_id=" + $('#foodScheduleMeal').val() + "&fodd_assistant=" + $('#foodAssistId').val(),
        success: function (data) {
            /*if (data === "success") {
             loadDataFood(1);
             }
             hideloader();
             showToastMsg('success', 'Data Updated Successfully!!')*/
            var current_page_food = '';
            current_page_food = $("#current_page_food").val();
            if (current_page_food == null) {
                current_page_food = 1;
            }
            if (data === "success") {
                loadDataFood(current_page_food);
                showToastMsg('success', 'Data Updated Successfully!!')
            } else {
                hideloader();
                showToastMsg('error', 'Something was wrong, Please try again after sometime.')
            }
        }
    });
}
function foodPrint() {
    showloader();
    var food_date = $('#food_date').val();
    var food_shift = $('#food_shift').val();
    var food_staff_id = $('#food_staff_id').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/food_print",
        data: "page=" + page + "&food_date=" + food_date + "&sort=" + sort + "&colname=" + colname + "&food_shift=" + food_shift + "&food_staff_id=" + food_staff_id + "&meal_id=" + $('#food_schedule_meal').val() + "&client_name=" + $('#food_client_name').val() + "&client_id=" + $('#food_client_id').val() + "&client_dob=" + $('#food_client_dob').val(),
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
function foodExport() {
    showloader();
    var food_date = $('#food_date').val();
    var food_shift = $('#food_shift').val();
    var food_staff_id = $('#food_staff_id').val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    var page = '1';
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/food_export",
        data: "page=" + page + "&food_date=" + food_date + "&sort=" + sort + "&colname=" + colname + "&food_shift=" + food_shift + "&food_staff_id=" + food_staff_id + "&meal_id=" + $('#food_schedule_meal').val() + "&client_name=" + $('#food_client_name').val() + "&client_id=" + $('#food_client_id').val() + "&client_dob=" + $('#food_client_dob').val(),
        success: function (data) {
            hideloader();
            if (data != "No_Data")
                window.open(data, "_self");
            else
                showToastMsg("error", "Sorry! No data found.");
        }
    });
}
function getVehicleList(route_id) {
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/get_viehicle_list",
        data: "route_id=" + route_id,
        success: function (data) {
            $('#transPickVehicle').html(data);
        }
    });
}
function getVehicleListDrop(route_id) {
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/get_viehicle_list",
        data: "route_id=" + route_id,
        success: function (data) {
            $('#transDropVehicle').html(data);
        }
    });
}
function addVehicle() {
    if ($('#transVehicleNo').val() == "new") {
        $('#vehicle_no').show();
    } else {
        $('#vehicle_no').hide();
        $('#new_vehicle_no').val("");
    }
}
function validateDate(testdate) {
    var date_regex = /^\d{2}\/\d{2}\/\d{4}$/;
    return date_regex.test(testdate);
}
function searchClients() {
    if (validateDate($('#client_dob').val())) {
        loadDataByPage(1);
    } else {
        showToastMsg('error', 'Please insert DOB in mm/dd/yyyy format only!!');
        return false;
    }

}
/*Food schedule part ends here*/
function initInviteData() {
    $("#ui-id-1").css("z-index", "999999");
}

function searchTransClients() {
    if (validateDate($('#trans_client_dob').val())) {
        loadDataTransport(1);
    } else {
        showToastMsg('error', 'Please insert DOB in mm/dd/yyyy format only!!');
        return false;
    }
}
function searchTransClientsDrop() {
    if (validateDate($('#trans_client_dobDrop').val())) {
        loadDataTransport(1);
    } else {
        showToastMsg('error', 'Please insert DOB in mm/dd/yyyy format only!!');
        return false;
    }
}
function searchFtClients() {
    if (validateDate($('#ft_client_dob').val())) {
        loadDataFieldTrip(1);
    } else {
        showToastMsg('error', 'Please insert DOB in mm/dd/yyyy format only!!');
        return false;
    }
}
function searchFoodClients() {
    if (validateDate($('#food_client_dob').val())) {
        loadDataFood(1);
    } else {
        showToastMsg('error', 'Please insert DOB in mm/dd/yyyy format only!!');
        return false;
    }
}
function searchActClients() {
    if (validateDate($('#act_client_dob').val())) {
        loadDataActivity(1);
    } else {
        showToastMsg('error', 'Please insert DOB in mm/dd/yyyy format only!!');
        return false;
    }
}
function searchNSClients() {
    if (validateDate($('#ns_client_dob').val())) {
        loadDataNurse(1);
    } else {
        showToastMsg('error', 'Please insert DOB in mm/dd/yyyy format only!!');
        return false;
    }
}

function sortTableImportSchedule(elem, columnName) {
    var colName = $("#import_colname").val();
    var col = $(elem).parent().children().index($(elem));
    var sort = $("#import_sort").val();
    if (colName != columnName)
    {
        $("#import_sort").val('asc');
    } else {
        if (sort == 'asc')
            $("#import_sort").val("desc");
        else
            $("#import_sort").val('asc');
    }
    $("#import_colname").val(columnName);
    $("#import_col").val(col);
    loadDataImportSchedule(1);
}

function loadDataImportSchedule(page) {
    showloader();
    var import_date = $('#import_date').val();
    var import_sort = $("#import_sort").val();
    var import_colname = $("#import_colname").val();
    var import_col = $("#import_col").val();
    $('.sorting').attr('id', '');
    unsetval_session_issue('nursing');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/import_schedule_list",
        data: "page=" + page + "&import_date=" + import_date + "&import_sort=" + import_sort + "&import_colname=" + import_colname,
        success: function (data) {
            hideloader();
            $('#ImportScheduleDiv').html(data);
            /*if (import_sort == 'asc')
             {
             $(".transSortCol").attr('id', 'arrow-up');
             }
             else {
             $(".transSortCol").attr('id', 'arrow-down');
             }*/
        }
    });
}

function loadDataExportSchedule(page) {
    showloader();
    var import_date = $('#import_date').val();
    var import_sort = $("#import_sort").val();
    var import_colname = $("#import_colname").val();
    var import_col = $("#import_col").val();
    $('.sorting').attr('id', '');
    unsetval_session_issue('nursing');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/export_schedule_list",
        data: "page=" + page + "&import_date=" + import_date + "&import_sort=" + import_sort + "&import_colname=" + import_colname,
        success: function (data) {
            hideloader();
            $('#ExportScheduleDiv').html(data);
        }
    });
}

function unsetval_session_issue(tab_name) {
    if (tab_name == 'shift') {
        // Client Name
        //$("#client_name").val('');
        $("#trans_client_namePick").val('');
        $("#trans_client_nameDrop").val('');
        $("#ft_client_name").val('');
        $("#food_client_name").val('');
        $("#ns_client_name").val('');
        $("#act_client_name").val('');

        //$("#client_id").val('');
        $("#trans_client_idPick").val('');
        $("#trans_client_idDrop").val('');
        $("#ft_client_id").val('');
        $("#food_client_id").val('');
        $("#ns_client_id").val('');
        $("#act_client_id").val('');

        //$("#client_dob").val('');
        $("#trans_client_dob").val('');
        $("#trans_client_dobDrop").val('');
        $("#ft_client_dob").val('');
        $("#food_client_dob").val('');
        $("#ns_client_dob").val('');
        $("#act_client_dob").val('');

        //$("#schedule_date").val();
        $("#trans_datePick").val('');
        $("#trans_dateDrop").val('');
        $("#ft_date").val('');
        $("#food_date").val('');
        $("#nurse_date").val('');
        $("#act_date").val('');

    } else if (tab_name == 'trans_pick') {
        $("#client_name").val('');
        //$("#trans_client_namePick").val('');
        $("#trans_client_nameDrop").val('');
        $("#ft_client_name").val('');
        $("#food_client_name").val('');
        $("#ns_client_name").val('');
        $("#act_client_name").val('');

        $("#client_id").val('');
        //$("#trans_client_idPick").val('');
        $("#trans_client_idDrop").val('');
        $("#ft_client_id").val('');
        $("#food_client_id").val('');
        $("#ns_client_id").val('');
        $("#act_client_id").val('');

        $("#client_dob").val('');
        //$("#trans_client_dob").val('');
        $("#trans_client_dobDrop").val('');
        $("#ft_client_dob").val('');
        $("#food_client_dob").val('');
        $("#ns_client_dob").val('');
        $("#act_client_dob").val('');

        $("#schedule_date").val('');
        //$("#trans_datePick").val('');
        $("#trans_dateDrop").val('');
        $("#ft_date").val('');
        $("#food_date").val('');
        $("#nurse_date").val('');
        $("#act_date").val('');

    } else if (tab_name == 'trans_drop') {
        $("#client_name").val('');
        $("#trans_client_namePick").val('');
        //$("#trans_client_nameDrop").val('');
        $("#ft_client_name").val('');
        $("#food_client_name").val('');
        $("#ns_client_name").val('');
        $("#act_client_name").val('');

        $("#client_id").val('');
        $("#trans_client_idPick").val('');
        //$("#trans_client_idDrop").val('');
        $("#ft_client_id").val('');
        $("#food_client_id").val('');
        $("#ns_client_id").val('');
        $("#act_client_id").val('');

        $("#client_dob").val('');
        $("#trans_client_dob").val('');
        //$("#trans_client_dobDrop").val('');
        $("#ft_client_dob").val('');
        $("#food_client_dob").val('');
        $("#ns_client_dob").val('');
        $("#act_client_dob").val('');

        $("#schedule_date").val('');
        $("#trans_datePick").val('');
        //$("#trans_dateDrop").val('');
        $("#ft_date").val('');
        $("#food_date").val('');
        $("#nurse_date").val('');
        $("#act_date").val('');

    } else if (tab_name == 'field_trip') {
        $("#client_name").val('');
        $("#trans_client_namePick").val('');
        $("#trans_client_nameDrop").val('');
        //$("#ft_client_name").val('');
        $("#food_client_name").val('');
        $("#ns_client_name").val('');
        $("#act_client_name").val('');

        $("#client_id").val('');
        $("#trans_client_idPick").val('');
        $("#trans_client_idDrop").val('');
        //$("#ft_client_id").val('');
        $("#food_client_id").val('');
        $("#ns_client_id").val('');
        $("#act_client_id").val('');

        $("#client_dob").val('');
        $("#trans_client_dob").val('');
        $("#trans_client_dobDrop").val('');
        //$("#ft_client_dob").val('');
        $("#food_client_dob").val('');
        $("#ns_client_dob").val('');
        $("#act_client_dob").val('');

        $("#schedule_date").val('');
        $("#trans_datePick").val('');
        $("#trans_dateDrop").val('');
        //$("#ft_date").val('');
        $("#food_date").val('');
        $("#nurse_date").val('');
        $("#act_date").val('');

    } else if (tab_name == 'food') {
        $("#client_name").val('');
        $("#trans_client_namePick").val('');
        $("#trans_client_nameDrop").val('');
        $("#ft_client_name").val('');
        //$("#food_client_name").val('');
        $("#ns_client_name").val('');
        $("#act_client_name").val('');

        $("#client_id").val('');
        $("#trans_client_idPick").val('');
        $("#trans_client_idDrop").val('');
        $("#ft_client_id").val('');
        //$("#food_client_id").val('');
        $("#ns_client_id").val('');
        $("#act_client_id").val('');

        $("#client_dob").val('');
        $("#trans_client_dob").val('');
        $("#trans_client_dobDrop").val('');
        $("#ft_client_dob").val('');
        //$("#food_client_dob").val('');
        $("#ns_client_dob").val('');
        $("#act_client_dob").val('');

        $("#schedule_date").val('');
        $("#trans_datePick").val('');
        $("#trans_dateDrop").val('');
        $("#ft_date").val('');
        //$("#food_date").val('');
        $("#nurse_date").val('');
        $("#act_date").val('');

    } else if (tab_name == 'nursing') {
        $("#client_name").val('');
        $("#trans_client_namePick").val('');
        $("#trans_client_nameDrop").val('');
        $("#ft_client_name").val('');
        $("#food_client_name").val('');
        //$("#ns_client_name").val('');
        $("#act_client_name").val('');

        $("#client_id").val('');
        $("#trans_client_idPick").val('');
        $("#trans_client_idDrop").val('');
        $("#ft_client_id").val('');
        $("#food_client_id").val('');
        //$("#ns_client_id").val('');
        $("#act_client_id").val('');

        $("#client_dob").val('');
        $("#trans_client_dob").val('');
        $("#trans_client_dobDrop").val('');
        $("#ft_client_dob").val('');
        $("#food_client_dob").val('');
        //$("#ns_client_dob").val('');
        $("#act_client_dob").val('');

        $("#schedule_date").val('');
        $("#trans_datePick").val('');
        $("#trans_dateDrop").val('');
        $("#ft_date").val('');
        $("#food_date").val('');
        //$("#nurse_date").val('');
        $("#act_date").val('');

    } else if (tab_name == 'activities') {
        $("#client_name").val('');
        $("#trans_client_namePick").val('');
        $("#trans_client_nameDrop").val('');
        $("#ft_client_name").val('');
        $("#food_client_name").val('');
        $("#ns_client_name").val('');
        //$("#act_client_name").val('');

        $("#client_id").val('');
        $("#trans_client_idPick").val('');
        $("#trans_client_idDrop").val('');
        $("#ft_client_id").val('');
        $("#food_client_id").val('');
        $("#ns_client_id").val('');
        //$("#act_client_id").val('');

        $("#client_dob").val('');
        $("#trans_client_dob").val('');
        $("#trans_client_dobDrop").val('');
        $("#ft_client_dob").val('');
        $("#food_client_dob").val('');
        $("#ns_client_dob").val('');
        //$("#act_client_dob").val('');

        $("#schedule_date").val('');
        $("#trans_datePick").val('');
        $("#trans_dateDrop").val('');
        $("#ft_date").val('');
        $("#food_date").val('');
        $("#nurse_date").val('');
        //$("#act_date").val('');

    }
}

function loadDataRoutes(page, tab) {
    showloader();
    var act_date = $('#act_date').val();
    var act_shift = $('#act_shift').val();
    //var activityId = $('#coomonActivityId').val();
    var activityId = $("input[name=active_id_for_load_tab]").val();
    var sort = $("#sort").val();
    var colname = $("#colname").val();
    var col = $("#col").val();
    $('.sorting').attr('id', '');
    unsetval_session_issue('activities');
    $.ajax({
        type: 'POST',
        url: Host + "Schedule/getTransActiveRoutes",
        data: "page=" + page + "&act_date=" + act_date + "&sort=" + sort + "&colname=" + colname + "&act_shift=" + act_shift + "&activityId=" + activityId + "&staffId=" + $('#staffId').val() + "&client_name=" + $('#act_client_name').val() + "&client_id=" + $('#act_client_id').val() + "&client_dob=" + $('#act_client_dob').val() + "&tab=" + tab,
        success: function (data) {
            hideloader();
            $('#activeRoutesDiv').html(data);
            if (sort == 'asc')
            {
                $(".transSortCol").attr('id', 'arrow-up');
            } else {
                $(".transSortCol").attr('id', 'arrow-down');
            }
        }
    });
}