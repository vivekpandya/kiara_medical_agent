<?php

 /* echo '<pre>';
 print_r($_SESSION);die;*/
/*$accessMenu = $this->Common_model->getAccessModules();
if (!empty($accessMenu)) {
$array_menu = array();
foreach ($accessMenu as $key => $val) {
$array_menu[] = $accessMenu[$key]->name;
$array_menu_functionality_access_view[$accessMenu[$key]->name] = $accessMenu[$key]->rma_view;
$array_menu_functionality_access_edit[$accessMenu[$key]->name] = $accessMenu[$key]->rma_edit;
$array_menu_functionality_access_delete[$accessMenu[$key]->name] = $accessMenu[$key]->rma_delete;
$array_menu_functionality_access_print[$accessMenu[$key]->name] = $accessMenu[$key]->rma_print;
}
session()->set('menu_items_arr', $array_menu);
session()->set('array_menu_functionality_access_view', $array_menu_functionality_access_view);
session()->set('array_menu_functionality_access_edit', $array_menu_functionality_access_edit);
session()->set('array_menu_functionality_access_delete', $array_menu_functionality_access_delete);
session()->set('array_menu_functionality_access_print', $array_menu_functionality_access_print);
}*/
//Set permission for all tabs and form in edit client

######################################## Print ########################################

$facesheet_view = 0;
$admission_view = 0;
$nursing_view = 0;
$visit_view = 0;
$socialservice_view = 0;
$dietary_view = 0;
$h_and_p_view = 0;
$immun_view = 0;
$notes_view = 0;
$care_plans_view = 0;
$carenotetab_view = 0;
$iadltab_view = 0;
$batab_view = 0;
$assmnts_view = 0;
$vitals_view = 0;
$mars_view = 0;
$adls_view = 0;
$hospitalization_view = 0;
$documents_view = 0;
$incident_view = 0;
$appointment_tab_view = 0;
$orders_view = 0;
$attendance_view = 0;
$quiz_view = 0;
$sms_tab_view = 0;

$facesheet_edit = 0;
$admission_edit = 0;
$nursing_edit = 0;
$visit_edit = 0;
$socialservice_edit = 0;
$dietary_edit = 0;
$h_and_p_edit = 0;
$immun_edit = 0;
$notes_edit = 0;
$care_plans_edit = 0;
$carenotetab_edit = 0;
$iadltab_edit = 0;
$batab_edit = 0;
$assmnts_edit = 0;
$vitals_edit = 0;
$mars_edit = 0;
$adls_edit = 0;
$hospitalization_edit = 0;
$documents_edit = 0;
$incident_edit = 0;
$appointment_tab_edit = 0;
$orders_edit = 0;
$attendance_edit = 0;
$quiz_edit = 0;
$sms_tab_edit = 0;

$facesheet_delete = 0;
$admission_delete = 0;
$nursing_delete = 0;
$visit_delete = 0;
$socialservice_delete = 0;
$dietary_delete = 0;
$h_and_p_delete = 0;
$immun_delete = 0;
$notes_delete = 0;
$care_plans_delete = 0;
$carenotetab_delete = 0;
$iadltab_delete = 0;
$batab_delete = 0;
$assmnts_delete = 0;
$vitals_delete = 0;
$mars_delete = 0;
$adls_delete = 0;
$hospitalization_delete = 0;
$documents_delete = 0;
$incident_delete = 0;
$appointment_tab_delete = 0;
$orders_delete = 0;
$attendance_delete = 0;
$quiz_delete = 0;
$sms_tab_delete = 0;

$facesheet_print = 0;
$admission_print = 0;
$nursing_print = 0;
$visit_print = 0;
$socialservice_print = 0;
$dietary_print = 0;
$h_and_p_print = 0;
$immun_print = 0;
$notes_print = 0;
$care_plans_print = 0;
$carenotetab_print = 0;
$iadltab_print = 0;
$batab_print = 0;
$assmnts_print = 0;
$vitals_print = 0;
$mars_print = 0;
$adls_print = 0;
$hospitalization_print = 0;
$documents_print = 0;
$incident_print = 0;
$appointment_tab_print = 0;
$orders_print = 0;
$attendance_print = 0;
$quiz_print = 0;
$sms_tab_print = 0;


$facesheet_employee = 0;
$admission_employee = 0;
$nursing_employee = 0;
$visit_employee = 0;
$socialservice_employee = 0;
$dietary_employee = 0;
$h_and_p_employee = 0;
$immun_employee = 0;
$notes_employee = 0;
$care_plans_employee = 0;
$carenotetab_employee = 0;
$iadltab_employee = 0;
$batab_employee = 0;
$assmnts_employee = 0;
$vitals_employee = 0;
$mars_employee = 0;
$adls_employee = 0;
$hospitalization_employee = 0;
$documents_employee = 0;
$incident_employee = 0;
$appointment_tab_employee = 0;
$orders_employee = 0;
$attendance_employee = 0;
$quiz_employee = 0;
$sms_tab_employee = 0;

/*Transpotation start*/

$trans_log_view = 0;
$trans_inspection_view = 0;
$trans_pickUpSchedule_view = 0;
$trans_dropOffSchedule_view = 0;
$trans_field_trip_log_view = 0;
$trans_field_trip_schedule_view = 0;
$trans_import_schedule_view = 0;

$trans_log_edit = 0;
$trans_inspection_edit = 0;
$trans_pickUpSchedule_edit = 0;
$trans_dropOffSchedule_edit = 0;
$trans_field_trip_log_edit = 0;
$trans_field_trip_schedule_edit = 0;
$trans_import_schedule_edit = 0;

$trans_log_delete = 0;
$trans_inspection_delete = 0;
$trans_pickUpSchedule_delete = 0;
$trans_dropOffSchedule_delete = 0;
$trans_field_trip_log_delete = 0;
$trans_field_trip_schedule_delete = 0;
$trans_import_schedule_delete = 0;

$trans_log_print = 0;
$trans_inspection_print = 0;
$trans_pickUpSchedule_print = 0;
$trans_dropOffSchedule_print = 0;
$trans_field_trip_log_print = 0;
$trans_field_trip_schedule_print = 0;
$trans_import_schedule_print = 0;

$trans_log_employee = 0;
$trans_inspection_employee = 0;
$trans_pickUpSchedule_employee = 0;
$trans_dropOffSchedule_employee = 0;
$trans_field_trip_log_employee = 0;
$trans_field_trip_schedule_employee = 0;
$trans_import_schedule_employee = 0;

/*Transpotation end*/

/*timecard start*/
$time_check_in_view = 0;
$time_check_out_view = 0;
$time_schedule_view = 0;
$time_log_view = 0;

$time_check_in_edit = 0;
$time_check_out_edit = 0;
$time_schedule_edit = 0;
$time_log_edit = 0;

$time_check_in_delete = 0;
$time_check_out_delete = 0;
$time_schedule_delete = 0;
$time_log_delete = 0;

$time_check_in_print = 0;
$time_check_out_print = 0;
$time_schedule_print = 0;
$time_log_print = 0;

$time_check_in_employee = 0;
$time_check_out_employee = 0;
$time_schedule_employee = 0;
$time_log_employee = 0;

/*timecard end*/

/***RPM****/
$rpm_view = 0;
$rpm_edit = 0;
$rpm_delete = 0;
$rpm_print = 0;
$rpm_employee = 0;
/***RPM****/

/*WORK FLOW START*/
$admin_workflow_view = 0;
$admin_workflow_edit = 0;
$admin_workflow_delete = 0;
$admin_workflow_print = 0;
$admin_workflow_employee = 0;
/*WORK FLOW END*/

$admin_custom_form_view = 0;
$admin_custom_form_edit = 0;
$admin_custom_form_delete = 0;
$admin_custom_form_print = 0;
$admin_custom_form_employee = 0;

///
$admin_referral_questions_view = 0;
$admin_referral_questions_edit = 0;
$admin_referral_questions_delete = 0;
$admin_referral_questions_print = 0;
$admin_referral_questions_employee = 0;


$admin_referral_source_view = 0;
$admin_referral_source_edit = 0;
$admin_referral_source_delete = 0;
$admin_referral_source_print = 0;
$admin_referral_source_employee = 0;



$admin_referral_status_view = 0;
$admin_referral_status_edit = 0;
$admin_referral_status_delete = 0;
$admin_referral_status_print = 0;
$admin_referral_status_employee = 0;


$admin_conversation_status_view = 0;
$admin_conversation_status_edit = 0;
$admin_conversation_status_delete = 0;
$admin_conversation_status_print = 0;
$admin_conversation_status_employee = 0;

$admin_organization_view = 0;
$admin_organization_edit = 0;
$admin_organization_delete = 0;
$admin_organization_print = 0;
$admin_organization_employee = 0;

$admin_referral_priority_view = 0;
$admin_referral_priority_edit = 0;
$admin_referral_priority_delete = 0;
$admin_referral_priority_print = 0;
$admin_referral_priority_employee = 0;

$admin_referral_note_view = 0;
$admin_referral_note_edit = 0;
$admin_referral_note_delete = 0;
$admin_referral_note_print = 0;
$admin_referral_note_employee = 0;


///
$admin_adl_questions_view = 0;
$admin_adl_questions_edit = 0;
$admin_adl_questions_delete = 0;
$admin_adl_questions_print = 0;
$admin_adl_questions_employee = 0;

$admin_system_form_view = 0;
$admin_system_form_edit = 0;
$admin_system_form_delete = 0;
$admin_system_form_print = 0;
$admin_system_form_employee = 0;


	########################################## VIEW #######################################
	if (isset(session()->get('array_menu_functionality_access_view')['facesheet tab']) && session()->get('array_menu_functionality_access_view')['facesheet tab'] != "NO") {
		$facesheet_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['admission tab']) && session()->get('array_menu_functionality_access_view')['admission tab'] != "NO") {
		$admission_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['nursing tab']) && session()->get('array_menu_functionality_access_view')['nursing tab'] != "NO") {
		$nursing_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['visit tab']) && session()->get('array_menu_functionality_access_view')['visit tab'] != "NO") {
		$visit_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['social tab']) && session()->get('array_menu_functionality_access_view')['social tab'] != "NO") {
		$socialservice_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['dietary tab']) && session()->get('array_menu_functionality_access_view')['dietary tab'] != "NO") {
		$dietary_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['h and p tab']) && session()->get('array_menu_functionality_access_view')['h and p tab'] != "NO") {
		$h_and_p_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['immun tab']) && session()->get('array_menu_functionality_access_view')['immun tab'] != "NO") {
		$immun_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['notes tab']) && session()->get('array_menu_functionality_access_view')['notes tab'] != "NO") {
		$notes_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['care note tab']) && session()->get('array_menu_functionality_access_view')['care note tab'] != "NO") {
		$carenotetab_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['iadl tab']) && session()->get('array_menu_functionality_access_view')['iadl tab'] != "NO") {
		$iadltab_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['behavior activity tab']) && session()->get('array_menu_functionality_access_view')['behavior activity tab'] != "NO") {
		$batab_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['assmnts tab']) && session()->get('array_menu_functionality_access_view')['assmnts tab'] != "NO") {
		$assmnts_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['care plan tab']) && session()->get('array_menu_functionality_access_view')['care plan tab'] != "NO") {
		$care_plans_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['vitals tab']) && session()->get('array_menu_functionality_access_view')['vitals tab'] != "NO") {
		$vitals_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['mars tab']) && session()->get('array_menu_functionality_access_view')['mars tab'] != "NO") {
		$mars_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['adls tab']) && session()->get('array_menu_functionality_access_view')['adls tab'] != "NO") {
		$adls_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['hospitalization tab']) && session()->get('array_menu_functionality_access_view')['hospitalization tab'] != "NO") {
		$hospitalization_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['forms tab']) && session()->get('array_menu_functionality_access_view')['forms tab'] != "NO") {
		$documents_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['incident tab']) && session()->get('array_menu_functionality_access_view')['incident tab'] != "NO") {
		$incident_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['appointment tab']) && session()->get('array_menu_functionality_access_view')['appointment tab'] != "NO") {
		$appointment_tab_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['orders tab']) && session()->get('array_menu_functionality_access_view')['orders tab'] != "NO") {
		$orders_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['attendance tab']) && session()->get('array_menu_functionality_access_view')['attendance tab'] != "NO") {
		$attendance_view = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_view')['quiz tab']) && session()->get('array_menu_functionality_access_view')['quiz tab'] != "NO") {
		$quiz_view = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_view')['sms tab']) && session()->get('array_menu_functionality_access_view')['sms tab'] != "NO") {
		$sms_tab_view = 1;
	}

	/// admin Workflow
	if (isset(session()->get('array_menu_functionality_access_view')['workflow']) && session()->get('array_menu_functionality_access_view')['workflow'] != "NO") {
		$admin_workflow_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['workflow']) && session()->get('array_menu_functionality_access_edit')['workflow'] != "NO") {
		$admin_workflow_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['workflow']) && session()->get('array_menu_functionality_access_delete')['workflow'] != "NO") {
		$admin_workflow_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['workflow']) && session()->get('array_menu_functionality_access_print')['workflow'] != "NO") {
		$admin_workflow_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['workflow']) && session()->get('array_menu_functionality_access_employee')['workflow'] != "NO") {
		$admin_workflow_employee = 1;
	}
	// Transpotation
	if (isset(session()->get('array_menu_functionality_access_view')['transportation log']) && session()->get('array_menu_functionality_access_view')['transportation log'] != "NO") {
		$trans_log_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['inspection']) && session()->get('array_menu_functionality_access_view')['inspection'] != "NO") {
		$trans_inspection_view = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_view')['pick-up schedule']) && session()->get('array_menu_functionality_access_view')['pick-up schedule'] != "NO") {
		$trans_pickUpSchedule_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['drop-off-schedule']) && session()->get('array_menu_functionality_access_view')['drop-off-schedule'] != "NO") {
		$trans_dropOffSchedule_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['field trip log']) && session()->get('array_menu_functionality_access_view')['field trip log'] != "NO") {
		$trans_field_trip_log_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['field trip schedule']) && session()->get('array_menu_functionality_access_view')['field trip schedule'] != "NO") {
		$trans_field_trip_schedule_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['import schedule']) && session()->get('array_menu_functionality_access_view')['import schedule'] != "NO") {
		$trans_import_schedule_view = 1;
	}

	// Timecard
	if (isset(session()->get('array_menu_functionality_access_view')['timecard check in']) && session()->get('array_menu_functionality_access_view')['timecard check in'] != "NO") {
		$time_check_in_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['timecard check out']) && session()->get('array_menu_functionality_access_view')['timecard check out'] != "NO") {
		$time_check_out_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['timecard schedule']) && session()->get('array_menu_functionality_access_view')['timecard schedule'] != "NO") {
		$time_schedule_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_view')['timecard log']) && session()->get('array_menu_functionality_access_view')['timecard log'] != "NO") {
		$time_log_view = 1;
	}

	########################################## EDIT #######################################
	if (isset(session()->get('array_menu_functionality_access_edit')['facesheet tab']) && session()->get('array_menu_functionality_access_edit')['facesheet tab'] != "NO") {
		$facesheet_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['admission tab']) && session()->get('array_menu_functionality_access_edit')['admission tab'] != "NO") {
		$admission_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['nursing tab']) && session()->get('array_menu_functionality_access_edit')['nursing tab'] != "NO") {
		$nursing_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['visit tab']) && session()->get('array_menu_functionality_access_edit')['visit tab'] != "NO") {
		$visit_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['social tab']) && session()->get('array_menu_functionality_access_edit')['social tab'] != "NO") {
		$socialservice_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['dietary tab']) && session()->get('array_menu_functionality_access_edit')['dietary tab'] != "NO") {
		$dietary_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['h and p tab']) && session()->get('array_menu_functionality_access_edit')['h and p tab'] != "NO") {
		$h_and_p_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['immun tab']) && session()->get('array_menu_functionality_access_edit')['immun tab'] != "NO") {
		$immun_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['notes tab']) && session()->get('array_menu_functionality_access_edit')['notes tab'] != "NO") {
		$notes_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['care note tab']) && session()->get('array_menu_functionality_access_edit')['care note tab'] != "NO") {
		$carenotetab_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['iadl tab']) && session()->get('array_menu_functionality_access_edit')['iadl tab'] != "NO") {
		$iadltab_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['behavior activity tab']) && session()->get('array_menu_functionality_access_edit')['behavior activity tab'] != "NO") {
		$batab_edit = 1;
	}
	
	if (isset(session()->get('array_menu_functionality_access_edit')['assmnts tab']) && session()->get('array_menu_functionality_access_edit')['assmnts tab'] != "NO") {
		$assmnts_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['care plan tab']) && session()->get('array_menu_functionality_access_edit')['care plan tab'] != "NO") {
		$care_plans_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['vitals tab']) && session()->get('array_menu_functionality_access_edit')['vitals tab'] != "NO") {
		$vitals_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['mars tab']) && session()->get('array_menu_functionality_access_edit')['mars tab'] != "NO") {
		$mars_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['adls tab']) && session()->get('array_menu_functionality_access_edit')['adls tab'] != "NO") {
		$adls_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['hospitalization tab']) && session()->get('array_menu_functionality_access_edit')['hospitalization tab'] != "NO") {
		$hospitalization_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['forms tab']) && session()->get('array_menu_functionality_access_edit')['forms tab'] != "NO") {
		$documents_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['incident tab']) && session()->get('array_menu_functionality_access_edit')['incident tab'] != "NO") {
		$incident_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['appointment tab']) && session()->get('array_menu_functionality_access_edit')['appointment tab'] != "NO") {
		$appointment_tab_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['orders tab']) && session()->get('array_menu_functionality_access_edit')['orders tab'] != "NO") {
		$orders_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['attendance tab']) && session()->get('array_menu_functionality_access_edit')['attendance tab'] != "NO") {
		$attendance_edit = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_edit')['quiz tab']) && session()->get('array_menu_functionality_access_edit')['quiz tab'] != "NO") {
		$quiz_edit = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_edit')['sms tab']) && session()->get('array_menu_functionality_access_edit')['sms tab'] != "NO") {
		$sms_tab_edit = 1;
	}

	// Transpotation
	if (isset(session()->get('array_menu_functionality_access_edit')['transportation log']) && session()->get('array_menu_functionality_access_edit')['transportation log'] != "NO") {
		$trans_log_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['inspection']) && session()->get('array_menu_functionality_access_edit')['inspection'] != "NO") {
		$trans_inspection_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['pick-up schedule']) && session()->get('array_menu_functionality_access_edit')['pick-up schedule'] != "NO") {
		$trans_pickUpSchedule_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['drop-off-schedule']) && session()->get('array_menu_functionality_access_edit')['drop-off-schedule'] != "NO") {
		$trans_dropOffSchedule_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['field trip log']) && session()->get('array_menu_functionality_access_edit')['field trip log'] != "NO") {
		$trans_field_trip_log_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['field trip schedule']) && session()->get('array_menu_functionality_access_edit')['field trip schedule'] != "NO") {
		$trans_field_trip_schedule_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['import schedule']) && session()->get('array_menu_functionality_access_edit')['import schedule'] != "NO") {
		$trans_import_schedule_edit = 1;
	}

	// Timecard
	if (isset(session()->get('array_menu_functionality_access_edit')['timecard check in']) && session()->get('array_menu_functionality_access_edit')['timecard check in'] != "NO") {
		$time_check_in_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['timecard check out']) && session()->get('array_menu_functionality_access_edit')['timecard check out'] != "NO") {
		$time_check_out_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['timecard schedule']) && session()->get('array_menu_functionality_access_edit')['timecard schedule'] != "NO") {
		$time_schedule_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['timecard log']) && session()->get('array_menu_functionality_access_edit')['timecard log'] != "NO") {
		$time_log_edit = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_delete')['sms tab']) && session()->get('array_menu_functionality_access_delete')['sms tab'] != "NO") {
		$sms_tab_delete = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_print')['sms tab']) && session()->get('array_menu_functionality_access_print')['sms tab'] != "NO") {
		$sms_tab_print = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_employee')['sms tab']) && session()->get('array_menu_functionality_access_employee')['sms tab'] != "NO") {
		$sms_tab_employee = 1;
	}

	########################################## DELETE #######################################
	if (isset(session()->get('array_menu_functionality_access_delete')['facesheet tab']) && session()->get('array_menu_functionality_access_delete')['facesheet tab'] != "NO") {
		$facesheet_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['admission tab']) && session()->get('array_menu_functionality_access_delete')['admission tab'] != "NO") {
		$admission_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['nursing tab']) && session()->get('array_menu_functionality_access_delete')['nursing tab'] != "NO") {
		$nursing_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['visit tab']) && session()->get('array_menu_functionality_access_delete')['visit tab'] != "NO") {
		$visit_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['social tab']) && session()->get('array_menu_functionality_access_delete')['social tab'] != "NO") {
		$socialservice_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['dietary tab']) && session()->get('array_menu_functionality_access_delete')['dietary tab'] != "NO") {
		$dietary_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['h and p tab']) && session()->get('array_menu_functionality_access_delete')['h and p tab'] != "NO") {
		$h_and_p_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['immun tab']) && session()->get('array_menu_functionality_access_delete')['immun tab'] != "NO") {
		$immun_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['notes tab']) && session()->get('array_menu_functionality_access_delete')['notes tab'] != "NO") {
		$notes_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['care note tab']) && session()->get('array_menu_functionality_access_delete')['care note tab'] != "NO") {
		$carenotetab_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['iadl tab']) && session()->get('array_menu_functionality_access_delete')['iadl tab'] != "NO") {
		$iadltab_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['behavior activity tab']) && session()->get('array_menu_functionality_access_delete')['behavior activity tab'] != "NO") {
		$batab_delete = 1;
	}
	
	if (isset(session()->get('array_menu_functionality_access_delete')['assmnts tab']) && session()->get('array_menu_functionality_access_delete')['assmnts tab'] != "NO") {
		$assmnts_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['care plan tab']) && session()->get('array_menu_functionality_access_delete')['care plan tab'] != "NO") {
		$care_plans_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['vitals tab']) && session()->get('array_menu_functionality_access_delete')['vitals tab'] != "NO") {
		$vitals_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['mars tab']) && session()->get('array_menu_functionality_access_delete')['mars tab'] != "NO") {
		$mars_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['adls tab']) && session()->get('array_menu_functionality_access_delete')['adls tab'] != "NO") {
		$adls_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['hospitalization tab']) && session()->get('array_menu_functionality_access_delete')['hospitalization tab'] != "NO") {
		$hospitalization_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['forms tab']) && session()->get('array_menu_functionality_access_delete')['forms tab'] != "NO") {
		$documents_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['incident tab']) && session()->get('array_menu_functionality_access_delete')['incident tab'] != "NO") {
		$incident_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['appointment tab']) && session()->get('array_menu_functionality_access_delete')['appointment tab'] != "NO") {
		$appointment_tab_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['orders tab']) && session()->get('array_menu_functionality_access_delete')['orders tab'] != "NO") {
		$orders_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['attendance tab']) && session()->get('array_menu_functionality_access_delete')['attendance tab'] != "NO") {
		$attendance_delete = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_delete')['quiz tab']) && session()->get('array_menu_functionality_access_delete')['quiz tab'] != "NO") {
		$quiz_delete = 1;
	}

	// Transpotation
	if (isset(session()->get('array_menu_functionality_access_delete')['transportation log']) && session()->get('array_menu_functionality_access_delete')['transportation log'] != "NO") {
		$trans_log_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['inspection']) && session()->get('array_menu_functionality_access_delete')['inspection'] != "NO") {
		$trans_inspection_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['pick-up schedule']) && session()->get('array_menu_functionality_access_delete')['pick-up schedule'] != "NO") {
		$trans_pickUpSchedule_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['drop-off-schedule']) && session()->get('array_menu_functionality_access_delete')['drop-off-schedule'] != "NO") {
		$trans_dropOffSchedule_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['field trip log']) && session()->get('array_menu_functionality_access_delete')['field trip log'] != "NO") {
		$trans_field_trip_log_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['field trip schedule']) && session()->get('array_menu_functionality_access_delete')['field trip schedule'] != "NO") {
		$trans_field_trip_schedule_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['import schedule']) && session()->get('array_menu_functionality_access_delete')['import schedule'] != "NO") {
		$trans_import_schedule_delete = 1;
	}

	// Timecard
	if (isset(session()->get('array_menu_functionality_access_delete')['timecard check in']) && session()->get('array_menu_functionality_access_delete')['timecard check in'] != "NO") {
		$time_check_in_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['timecard check out']) && session()->get('array_menu_functionality_access_delete')['timecard check out'] != "NO") {
		$time_check_out_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['timecard schedule']) && session()->get('array_menu_functionality_access_delete')['timecard schedule'] != "NO") {
		$time_schedule_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['timecard log']) && session()->get('array_menu_functionality_access_delete')['timecard log'] != "NO") {
		$time_log_delete = 1;
	}

	########################################## PRINT #######################################
	if (isset(session()->get('array_menu_functionality_access_print')['facesheet tab']) && session()->get('array_menu_functionality_access_print')['facesheet tab'] != "NO") {
		$facesheet_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['admission tab']) && session()->get('array_menu_functionality_access_print')['admission tab'] != "NO") {
		$admission_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['nursing tab']) && session()->get('array_menu_functionality_access_print')['nursing tab'] != "NO") {
		$nursing_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['visit tab']) && session()->get('array_menu_functionality_access_print')['visit tab'] != "NO") {
		$visit_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['social tab']) && session()->get('array_menu_functionality_access_print')['social tab'] != "NO") {
		$socialservice_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['dietary tab']) && session()->get('array_menu_functionality_access_print')['dietary tab'] != "NO") {
		$dietary_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['h and p tab']) && session()->get('array_menu_functionality_access_print')['h and p tab'] != "NO") {
		$h_and_p_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['immun tab']) && session()->get('array_menu_functionality_access_print')['immun tab'] != "NO") {
		$immun_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['notes tab']) && session()->get('array_menu_functionality_access_print')['notes tab'] != "NO") {
		$notes_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['care note tab']) && session()->get('array_menu_functionality_access_print')['care note tab'] != "NO") {
		$carenotetab_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['iadl tab']) && session()->get('array_menu_functionality_access_print')['iadl tab'] != "NO") {
		$iadltab_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['behavior activity tab']) && session()->get('array_menu_functionality_access_print')['behavior activity tab'] != "NO") {
		$batab_print = 1;
	}
	
	if (isset(session()->get('array_menu_functionality_access_print')['assmnts tab']) && session()->get('array_menu_functionality_access_print')['assmnts tab'] != "NO") {
		$assmnts_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['care plan tab']) && session()->get('array_menu_functionality_access_print')['care plan tab'] != "NO") {
		$care_plans_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['vitals tab']) && session()->get('array_menu_functionality_access_print')['vitals tab'] != "NO") {
		$vitals_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['mars tab']) && session()->get('array_menu_functionality_access_print')['mars tab'] != "NO") {
		$mars_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['adls tab']) && session()->get('array_menu_functionality_access_print')['adls tab'] != "NO") {
		$adls_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['hospitalization tab']) && session()->get('array_menu_functionality_access_print')['hospitalization tab'] != "NO") {
		$hospitalization_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['forms tab']) && session()->get('array_menu_functionality_access_print')['forms tab'] != "NO") {
		$documents_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['incident tab']) && session()->get('array_menu_functionality_access_print')['incident tab'] != "NO") {
		$incident_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['appointment tab']) && session()->get('array_menu_functionality_access_print')['appointment tab'] != "NO") {
		$appointment_tab_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['orders tab']) && session()->get('array_menu_functionality_access_print')['orders tab'] != "NO") {
		$orders_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['attendance tab']) && session()->get('array_menu_functionality_access_print')['attendance tab'] != "NO") {
		$attendance_print = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_print')['quiz tab']) && session()->get('array_menu_functionality_access_print')['quiz tab'] != "NO") {
		$quiz_print = 1;
	}

	// Transpotation
	if (isset(session()->get('array_menu_functionality_access_print')['transportation log']) && session()->get('array_menu_functionality_access_print')['transportation log'] != "NO") {
		$trans_log_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['inspection']) && session()->get('array_menu_functionality_access_print')['inspection'] != "NO") {
		$trans_inspection_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['pick-up schedule']) && session()->get('array_menu_functionality_access_print')['pick-up schedule'] != "NO") {
		$trans_pickUpSchedule_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['drop-off-schedule']) && session()->get('array_menu_functionality_access_print')['drop-off-schedule'] != "NO") {
		$trans_dropOffSchedule_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['field trip log']) && session()->get('array_menu_functionality_access_print')['field trip log'] != "NO") {
		$trans_field_trip_log_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['field trip schedule']) && session()->get('array_menu_functionality_access_print')['field trip schedule'] != "NO") {
		$trans_field_trip_schedule_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['import schedule']) && session()->get('array_menu_functionality_access_print')['import schedule'] != "NO") {
		$trans_import_schedule_print = 1;
	}

	// Timecard
	if (isset(session()->get('array_menu_functionality_access_print')['timecard check in']) && session()->get('array_menu_functionality_access_print')['timecard check in'] != "NO") {
		$time_check_in_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['timecard check out']) && session()->get('array_menu_functionality_access_print')['timecard check out'] != "NO") {
		$time_check_out_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['timecard schedule']) && session()->get('array_menu_functionality_access_print')['timecard schedule'] != "NO") {
		$time_schedule_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['timecard log']) && session()->get('array_menu_functionality_access_print')['timecard log'] != "NO") {
		$time_log_print = 1;
	}

	########################################## EMPLOYEE #######################################
	if (isset(session()->get('array_menu_functionality_access_employee')['facesheet tab']) && session()->get('array_menu_functionality_access_employee')['facesheet tab'] != "NO") {
		$facesheet_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['admission tab']) && session()->get('array_menu_functionality_access_employee')['admission tab'] != "NO") {
		$admission_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['nursing tab']) && session()->get('array_menu_functionality_access_employee')['nursing tab'] != "NO") {
		$nursing_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['visit tab']) && session()->get('array_menu_functionality_access_employee')['visit tab'] != "NO") {
		$visit_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['social tab']) && session()->get('array_menu_functionality_access_employee')['social tab'] != "NO") {
		$socialservice_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['dietary tab']) && session()->get('array_menu_functionality_access_employee')['dietary tab'] != "NO") {
		$dietary_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['h and p tab']) && session()->get('array_menu_functionality_access_employee')['h and p tab'] != "NO") {
		$h_and_p_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['immun tab']) && session()->get('array_menu_functionality_access_employee')['immun tab'] != "NO") {
		$immun_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['notes tab']) && session()->get('array_menu_functionality_access_employee')['notes tab'] != "NO") {
		$notes_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['care note tab']) && session()->get('array_menu_functionality_access_employee')['care note tab'] != "NO") {
		$carenotetab_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['iadl tab']) && session()->get('array_menu_functionality_access_employee')['iadl tab'] != "NO") {
		$iadltab_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['behavior activity tab']) && session()->get('array_menu_functionality_access_employee')['behavior activity tab'] != "NO") {
		$batab_employee = 1;
	}
	
	if (isset(session()->get('array_menu_functionality_access_employee')['assmnts tab']) && session()->get('array_menu_functionality_access_employee')['assmnts tab'] != "NO") {
		$assmnts_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['care plan tab']) && session()->get('array_menu_functionality_access_employee')['care plan tab'] != "NO") {
		$care_plans_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['vitals tab']) && session()->get('array_menu_functionality_access_employee')['vitals tab'] != "NO") {
		$vitals_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['mars tab']) && session()->get('array_menu_functionality_access_employee')['mars tab'] != "NO") {
		$mars_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['adls tab']) && session()->get('array_menu_functionality_access_employee')['adls tab'] != "NO") {
		$adls_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['hospitalization tab']) && session()->get('array_menu_functionality_access_employee')['hospitalization tab'] != "NO") {
		$hospitalization_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['forms tab']) && session()->get('array_menu_functionality_access_employee')['forms tab'] != "NO") {
		$documents_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['incident tab']) && session()->get('array_menu_functionality_access_employee')['incident tab'] != "NO") {
		$incident_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['appointment tab']) && session()->get('array_menu_functionality_access_employee')['appointment tab'] != "NO") {
		$appointment_tab_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['orders tab']) && session()->get('array_menu_functionality_access_employee')['orders tab'] != "NO") {
		$orders_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['attendance tab']) && session()->get('array_menu_functionality_access_employee')['attendance tab'] != "NO") {
		$attendance_employee = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_employee')['quiz tab']) && session()->get('array_menu_functionality_access_employee')['quiz tab'] != "NO") {
		$quiz_employee = 1;
	}

	// Transpotation
	if (isset(session()->get('array_menu_functionality_access_employee')['transportation log']) && session()->get('array_menu_functionality_access_employee')['transportation log'] != "NO") {
		$trans_log_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['inspection']) && session()->get('array_menu_functionality_access_employee')['inspection'] != "NO") {
		$trans_inspection_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['pick-up schedule']) && session()->get('array_menu_functionality_access_employee')['pick-up schedule'] != "NO") {
		$trans_pickUpSchedule_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['drop-off-schedule']) && session()->get('array_menu_functionality_access_employee')['drop-off-schedule'] != "NO") {
		$trans_dropOffSchedule_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['field trip log']) && session()->get('array_menu_functionality_access_employee')['field trip log'] != "NO") {
		$trans_field_trip_log_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['field trip schedule']) && session()->get('array_menu_functionality_access_employee')['field trip schedule'] != "NO") {
		$trans_field_trip_schedule_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['import schedule']) && session()->get('array_menu_functionality_access_employee')['import schedule'] != "NO") {
		$trans_import_schedule_employee = 1;
	}

	// Timecard
	if (isset(session()->get('array_menu_functionality_access_employee')['timecard check in']) && session()->get('array_menu_functionality_access_employee')['timecard check in'] != "NO") {
		$time_check_in_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['timecard check out']) && session()->get('array_menu_functionality_access_employee')['timecard check out'] != "NO") {
		$time_check_out_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['timecard schedule']) && session()->get('array_menu_functionality_access_employee')['timecard schedule'] != "NO") {
		$time_schedule_employee = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['timecard log']) && session()->get('array_menu_functionality_access_employee')['timecard log'] != "NO") {
		$time_log_employee = 1;
	}

	//rpm
	if (isset(session()->get('array_menu_functionality_access_view')['rpm']) && session()->get('array_menu_functionality_access_view')['rpm'] != "NO") {
		$rpm_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['rpm']) && session()->get('array_menu_functionality_access_edit')['rpm'] != "NO") {
		$rpm_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['rpm']) && session()->get('array_menu_functionality_access_delete')['rpm'] != "NO") {
		$rpm_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['rpm']) && session()->get('array_menu_functionality_access_print')['rpm'] != "NO") {
		$rpm_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['rpm']) && session()->get('array_menu_functionality_access_employee')['rpm'] != "NO") {
		$rpm_employee = 1;
	}
	/// admin Custom forms
	if (isset(session()->get('array_menu_functionality_access_view')['custom form']) && session()->get('array_menu_functionality_access_view')['custom form'] != "NO") {
		$admin_custom_form_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['custom form']) && session()->get('array_menu_functionality_access_edit')['custom form'] != "NO") {
		$admin_custom_form_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['custom form']) && session()->get('array_menu_functionality_access_delete')['custom form'] != "NO") {
		$admin_custom_form_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['custom form']) && session()->get('array_menu_functionality_access_print')['custom form'] != "NO") {
		$admin_custom_form_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['custom form']) && session()->get('array_menu_functionality_access_employee')['custom form'] != "NO") {
		$admin_custom_form_employee = 1;
	}
	// Admin Referral Questions
	if (isset(session()->get('array_menu_functionality_access_view')['referral questions']) && session()->get('array_menu_functionality_access_view')['referral questions'] != "NO") {
		$admin_referral_questions_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['referral questions']) && session()->get('array_menu_functionality_access_edit')['referral questions'] != "NO") {
		$admin_referral_questions_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['referral questions']) && session()->get('array_menu_functionality_access_delete')['referral questions'] != "NO") {
		$admin_referral_questions_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['referral questions']) && session()->get('array_menu_functionality_access_print')['referral questions'] != "NO") {
		$admin_referral_questions_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['referral questions']) && session()->get('array_menu_functionality_access_employee')['referral questions'] != "NO") {
		$admin_referral_questions_employee = 1;
	}

	// Admin Referral Source
	if (isset(session()->get('array_menu_functionality_access_view')['referral source']) && session()->get('array_menu_functionality_access_view')['referral source'] != "NO") {
		$admin_referral_source_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['referral source']) && session()->get('array_menu_functionality_access_edit')['referral source'] != "NO") {
		$admin_referral_source_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['referral source']) && session()->get('array_menu_functionality_access_delete')['referral source'] != "NO") {
		$admin_referral_source_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['referral source']) && session()->get('array_menu_functionality_access_print')['referral source'] != "NO") {
		$admin_referral_source_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['referral source']) && session()->get('array_menu_functionality_access_employee')['referral source'] != "NO") {
		$admin_referral_source_employee = 1;
	}

	// Admin Referral Status
	if (isset(session()->get('array_menu_functionality_access_view')['referral status']) && session()->get('array_menu_functionality_access_view')['referral status'] != "NO") {
		$admin_referral_status_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['referral status']) && session()->get('array_menu_functionality_access_edit')['referral status'] != "NO") {
		$admin_referral_status_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['referral status']) && session()->get('array_menu_functionality_access_delete')['referral status'] != "NO") {
		$admin_referral_status_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['referral status']) && session()->get('array_menu_functionality_access_print')['referral status'] != "NO") {
		$admin_referral_status_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['referral status']) && session()->get('array_menu_functionality_access_employee')['referral status'] != "NO") {
		$admin_referral_status_employee = 1;
	}

	if (isset(session()->get('array_menu_functionality_access_view')['conversation status']) && session()->get('array_menu_functionality_access_view')['conversation status'] != "NO") {
		$admin_conversation_status_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['conversation status']) && session()->get('array_menu_functionality_access_edit')['conversation status'] != "NO") {
		$admin_conversation_status_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['conversation status']) && session()->get('array_menu_functionality_access_delete')['conversation status'] != "NO") {
		$admin_conversation_status_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['conversation status']) && session()->get('array_menu_functionality_access_print')['conversation status'] != "NO") {
		$admin_conversation_status_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['conversation status']) && session()->get('array_menu_functionality_access_employee')['conversation status'] != "NO") {
		$admin_conversation_status_employee = 1;
	}
	// Admin organization
	if (isset(session()->get('array_menu_functionality_access_view')['referral organization']) && session()->get('array_menu_functionality_access_view')['referral organization'] != "NO") {
		$admin_organization_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['referral organization']) && session()->get('array_menu_functionality_access_edit')['referral organization'] != "NO") {
		$admin_organization_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['referral organization']) && session()->get('array_menu_functionality_access_delete')['referral organization'] != "NO") {
		$admin_organization_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['referral organization']) && session()->get('array_menu_functionality_access_print')['referral organization'] != "NO") {
		$admin_organization_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['referral organization']) && session()->get('array_menu_functionality_access_employee')['referral organization'] != "NO") {
		$admin_organization_employee = 1;
	}
	// Admin Referral Prioirty
	if (isset(session()->get('array_menu_functionality_access_view')['referral priority']) && session()->get('array_menu_functionality_access_view')['referral priority'] != "NO") {
		$admin_referral_priority_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['referral priority']) && session()->get('array_menu_functionality_access_edit')['referral priority'] != "NO") {
		$admin_referral_priority_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['referral priority']) && session()->get('array_menu_functionality_access_delete')['referral priority'] != "NO") {
		$admin_referral_priority_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['referral priority']) && session()->get('array_menu_functionality_access_print')['referral priority'] != "NO") {
		$admin_referral_priority_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['referral priority']) && session()->get('array_menu_functionality_access_employee')['referral priority'] != "NO") {
		$admin_referral_priority_employee = 1;
	}

	// Admin Referral Prioirty
	if (isset(session()->get('array_menu_functionality_access_view')['referral note']) && session()->get('array_menu_functionality_access_view')['referral note'] != "NO") {
		$admin_referral_note_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['referral note']) && session()->get('array_menu_functionality_access_edit')['referral note'] != "NO") {
		$admin_referral_note_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['referral note']) && session()->get('array_menu_functionality_access_delete')['referral note'] != "NO") {
		$admin_referral_note_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['referral note']) && session()->get('array_menu_functionality_access_print')['referral note'] != "NO") {
		$admin_referral_note_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['referral note']) && session()->get('array_menu_functionality_access_employee')['referral note'] != "NO") {
		$admin_referral_note_employee = 1;
	}
	/// admin System Forms
    if(isset(session()->get('array_menu_functionality_access_view')['system form']) && session()->get('array_menu_functionality_access_view')['system form'] != "NO"){
        $admin_system_form_view = 1;
    }
    if(isset(session()->get('array_menu_functionality_access_edit')['system form']) && session()->get('array_menu_functionality_access_edit')['system form'] != "NO"){
        $admin_system_form_edit = 1;
    }
    if(isset(session()->get('array_menu_functionality_access_delete')['system form']) && session()->get('array_menu_functionality_access_delete')['system form'] != "NO"){
        $admin_system_form_delete = 1;
    }
    if(isset(session()->get('array_menu_functionality_access_print')['system form']) && session()->get('array_menu_functionality_access_print')['system form'] != "NO"){
        $admin_system_form_print = 1;
    }
    if(isset(session()->get('array_menu_functionality_access_employee')['system form']) && session()->get('array_menu_functionality_access_employee')['system form'] != "NO"){
        $admin_system_form_employee = 1;
    }

    // Admin Adl Questions
	if (isset(session()->get('array_menu_functionality_access_view')['adl questions']) && session()->get('array_menu_functionality_access_view')['adl questions'] != "NO") {
		$admin_adl_questions_view = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_edit')['adl questions']) && session()->get('array_menu_functionality_access_edit')['adl questions'] != "NO") {
		$admin_adl_questions_edit = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_delete')['adl questions']) && session()->get('array_menu_functionality_access_delete')['adl questions'] != "NO") {
		$admin_adl_questions_delete = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_print')['adl questions']) && session()->get('array_menu_functionality_access_print')['adl questions'] != "NO") {
		$admin_adl_questions_print = 1;
	}
	if (isset(session()->get('array_menu_functionality_access_employee')['adl questions']) && session()->get('array_menu_functionality_access_employee')['adl questions'] != "NO") {
		$admin_adl_questions_employee = 1;
	}


$sub_menu_access['facesheet']['view'] = $facesheet_view;
$sub_menu_access['facesheet']['edit'] = $facesheet_edit;
$sub_menu_access['facesheet']['delete'] = $facesheet_delete;
$sub_menu_access['facesheet']['print'] = $facesheet_print;
$sub_menu_access['facesheet']['employee'] = $facesheet_employee;

$sub_menu_access['admission']['view'] = $admission_view;
$sub_menu_access['admission']['edit'] = $admission_edit;
$sub_menu_access['admission']['delete'] = $admission_delete;
$sub_menu_access['admission']['print'] = $admission_print;
$sub_menu_access['admission']['employee'] = $admission_employee;

$sub_menu_access['nursing']['view'] = $nursing_view;
$sub_menu_access['nursing']['edit'] = $nursing_edit;
$sub_menu_access['nursing']['delete'] = $nursing_delete;
$sub_menu_access['nursing']['print'] = $nursing_print;
$sub_menu_access['nursing']['employee'] = $nursing_employee;

$sub_menu_access['visit']['view'] = $visit_view;
$sub_menu_access['visit']['edit'] = $visit_edit;
$sub_menu_access['visit']['delete'] = $visit_delete;
$sub_menu_access['visit']['print'] = $visit_print;
$sub_menu_access['visit']['employee'] = $visit_employee;

$sub_menu_access['socialservice']['view'] = $socialservice_view;
$sub_menu_access['socialservice']['edit'] = $socialservice_edit;
$sub_menu_access['socialservice']['delete'] = $socialservice_delete;
$sub_menu_access['socialservice']['print'] = $socialservice_print;
$sub_menu_access['socialservice']['employee'] = $socialservice_employee;

$sub_menu_access['dietary']['view'] = $dietary_view;
$sub_menu_access['dietary']['edit'] = $dietary_edit;
$sub_menu_access['dietary']['delete'] = $dietary_delete;
$sub_menu_access['dietary']['print'] = $dietary_print;
$sub_menu_access['dietary']['employee'] = $dietary_employee;

$sub_menu_access['h_and_p']['view'] = $h_and_p_view;
$sub_menu_access['h_and_p']['edit'] = $h_and_p_edit;
$sub_menu_access['h_and_p']['delete'] = $h_and_p_delete;
$sub_menu_access['h_and_p']['print'] = $h_and_p_print;
$sub_menu_access['h_and_p']['employee'] = $h_and_p_employee;

$sub_menu_access['immun']['view'] = $immun_view;
$sub_menu_access['immun']['edit'] = $immun_edit;
$sub_menu_access['immun']['delete'] = $immun_delete;
$sub_menu_access['immun']['print'] = $immun_print;
$sub_menu_access['immun']['employee'] = $immun_employee;

$sub_menu_access['notes']['view'] = $notes_view;
$sub_menu_access['notes']['edit'] = $notes_edit;
$sub_menu_access['notes']['delete'] = $notes_delete;
$sub_menu_access['notes']['print'] = $notes_print;
$sub_menu_access['notes']['employee'] = $notes_employee;

$sub_menu_access['care_plans']['view'] = $care_plans_view;
$sub_menu_access['care_plans']['edit'] = $care_plans_edit;
$sub_menu_access['care_plans']['delete'] = $care_plans_delete;
$sub_menu_access['care_plans']['print'] = $care_plans_print;
$sub_menu_access['care_plans']['employee'] = $care_plans_employee;

$sub_menu_access['carenotetab']['view'] = $carenotetab_view;
$sub_menu_access['carenotetab']['edit'] = $carenotetab_edit;
$sub_menu_access['carenotetab']['delete'] = $carenotetab_delete;
$sub_menu_access['carenotetab']['print'] = $carenotetab_print;
$sub_menu_access['carenotetab']['employee'] = $carenotetab_employee;


$sub_menu_access['iadltab']['view'] = $iadltab_view;
$sub_menu_access['iadltab']['edit'] = $iadltab_edit;
$sub_menu_access['iadltab']['delete'] = $iadltab_delete;
$sub_menu_access['iadltab']['print'] = $iadltab_print;
$sub_menu_access['iadltab']['employee'] = $iadltab_employee;


$sub_menu_access['batab']['view'] = $batab_view;
$sub_menu_access['batab']['edit'] = $batab_edit;
$sub_menu_access['batab']['delete'] = $batab_delete;
$sub_menu_access['batab']['print'] = $batab_print;
$sub_menu_access['batab']['employee'] = $batab_employee;

/*$sub_menu_access['carenotetab']['view'] = 1;
$sub_menu_access['carenotetab']['edit'] = 1;
$sub_menu_access['carenotetab']['delete'] = 1;
$sub_menu_access['carenotetab']['print'] = 1;
$sub_menu_access['carenotetab']['employee'] = 1;*/

$sub_menu_access['assmnts']['view'] = $assmnts_view;
$sub_menu_access['assmnts']['edit'] = $assmnts_edit;
$sub_menu_access['assmnts']['delete'] = $assmnts_delete;
$sub_menu_access['assmnts']['print'] = $assmnts_print;
$sub_menu_access['assmnts']['employee'] = $assmnts_employee;

$sub_menu_access['vitals']['view'] = $vitals_view;
$sub_menu_access['vitals']['edit'] = $vitals_edit;
$sub_menu_access['vitals']['delete'] = $vitals_delete;
$sub_menu_access['vitals']['print'] = $vitals_print;
$sub_menu_access['vitals']['employee'] = $vitals_employee;

$sub_menu_access['mars']['view'] = $mars_view;
$sub_menu_access['mars']['edit'] = $mars_edit;
$sub_menu_access['mars']['delete'] = $mars_delete;
$sub_menu_access['mars']['print'] = $mars_print;
$sub_menu_access['mars']['employee'] = $mars_employee;

$sub_menu_access['adls']['view'] = $adls_view;
$sub_menu_access['adls']['edit'] = $adls_edit;
$sub_menu_access['adls']['delete'] = $adls_delete;
$sub_menu_access['adls']['print'] = $adls_print;
$sub_menu_access['adls']['employee'] = $adls_employee;

$sub_menu_access['hospitalization']['view'] = $hospitalization_view;
$sub_menu_access['hospitalization']['edit'] = $hospitalization_edit;
$sub_menu_access['hospitalization']['delete'] = $hospitalization_delete;
$sub_menu_access['hospitalization']['print'] = $hospitalization_print;
$sub_menu_access['hospitalization']['employee'] = $hospitalization_employee;

$sub_menu_access['documents']['view'] = $documents_view;
$sub_menu_access['documents']['edit'] = $documents_edit;
$sub_menu_access['documents']['delete'] = $documents_delete;
$sub_menu_access['documents']['print'] = $documents_print;
$sub_menu_access['documents']['employee'] = $documents_employee;

$sub_menu_access['incident']['view'] = $incident_view;
$sub_menu_access['incident']['edit'] = $incident_edit;
$sub_menu_access['incident']['delete'] = $incident_delete;
$sub_menu_access['incident']['print'] = $incident_print;
$sub_menu_access['incident']['employee'] = $incident_employee;

$sub_menu_access['appointment tab']['view'] = $appointment_tab_view;
$sub_menu_access['appointment tab']['edit'] = $appointment_tab_edit;
$sub_menu_access['appointment tab']['delete'] = $appointment_tab_delete;
$sub_menu_access['appointment tab']['print'] = $appointment_tab_print;
$sub_menu_access['appointment tab']['employee'] = $appointment_tab_employee;

$sub_menu_access['sms tab']['view'] = $sms_tab_view;
$sub_menu_access['sms tab']['edit'] = $sms_tab_edit;
$sub_menu_access['sms tab']['delete'] = $sms_tab_delete;
$sub_menu_access['sms tab']['print'] = $sms_tab_print;
$sub_menu_access['sms tab']['employee'] = $sms_tab_employee;

$sub_menu_access['orders']['view'] = $orders_view;
$sub_menu_access['orders']['edit'] = $orders_edit;
$sub_menu_access['orders']['delete'] = $orders_delete;
$sub_menu_access['orders']['print'] = $orders_print;
$sub_menu_access['orders']['employee'] = $orders_employee;

$sub_menu_access['attendance']['view'] = $attendance_view;
$sub_menu_access['attendance']['edit'] = $attendance_edit;
$sub_menu_access['attendance']['delete'] = $attendance_delete;
$sub_menu_access['attendance']['print'] = $attendance_print;
$sub_menu_access['attendance']['employee'] = $attendance_employee;

$sub_menu_access['quiz']['view'] = $quiz_view;
$sub_menu_access['quiz']['edit'] = $quiz_edit;
$sub_menu_access['quiz']['delete'] = $quiz_delete;
$sub_menu_access['quiz']['print'] = $quiz_print;
$sub_menu_access['quiz']['employee'] = $quiz_employee;
/// Report
$sub_menu_access['admin_workflow']['view'] = $admin_workflow_view;
$sub_menu_access['admin_workflow']['edit'] = $admin_workflow_edit;
$sub_menu_access['admin_workflow']['delete'] = $admin_workflow_delete;
$sub_menu_access['admin_workflow']['print'] = $admin_workflow_print;
$sub_menu_access['admin_workflow']['employee'] = $admin_workflow_employee;

$sub_menu_access['admin_admission_reports']['view'] = 0;
//$sub_menu_access['clinical_profile_missing']['view'] = 0;
//$sub_menu_access['admission_missing_notes']['view'] = 0;
$sub_menu_access['admission_discharge']['view'] = 0;
$sub_menu_access['admission_level_of_care']['view'] = 0;
$sub_menu_access['administrator_cli_address_labels']['view'] = 0;
$sub_menu_access['admin_administrator_reports']['view'] = 0;
$sub_menu_access['administrator_birthday']['view'] = 0;
$sub_menu_access['administrator_caregiverbirthday']['view'] = 0;
$sub_menu_access['administrator_emergency_contact']['view'] = 0;
$sub_menu_access['administrator_physician_reports']['view'] = 0;
$sub_menu_access['administrator_physician_summary_reports']['view'] = 0;
$sub_menu_access['administrator_progress_notes']['view'] = 0;
$sub_menu_access['administrator_doc_exp_report']['view'] = 0;
$sub_menu_access['admin_billing_reports']['view'] = 0;
//$sub_menu_access['billing_census_data']['view'] = 0;
//$sub_menu_access['billing_census_retro']['view'] = 0;
$sub_menu_access['billing_caregiver_payment']['view'] = 0;
$sub_menu_access['billing_cn_not_received']['view'] = 0;
$sub_menu_access['billing_client_billing']['view'] = 0;
$sub_menu_access['billing_caregiver_ytd']['view'] = 0;
$sub_menu_access['billing_eligibility_exp']['view'] = 0;
$sub_menu_access['billing_missing_payer_approved']['view'] = 0;
$sub_menu_access['billing_pending_auth']['view'] = 0;
//$sub_menu_access['billing_stipend_payment']['view'] = 0;
$sub_menu_access['billing_careteam_payment_report']['view'] = 0;
$sub_menu_access['admin_clinical_reports']['view'] = 0;
$sub_menu_access['clinical_assessment_report']['view'] = 0;
$sub_menu_access['clinical_behavior_report']['view'] = 0;
$sub_menu_access['clinical_careplan_compliance']['view'] = 0;
$sub_menu_access['clinical_careplan_due']['view'] = 0;
$sub_menu_access['clinical_checklist_compliance']['view'] = 0;
$sub_menu_access['clinical_checklist_due']['view'] = 0;
$sub_menu_access['clinical_fallrisk_Assessment']['view'] = 0;
$sub_menu_access['clinical_HnP_expiration']['view'] = 0;
$sub_menu_access['clinical_Hospitalization_outcome']['view'] = 0;
$sub_menu_access['clinical_immunization_exp']['view'] = 0;
$sub_menu_access['clinical_incident_report']['view'] = 0;
$sub_menu_access['clinical_medication_outcome']['view'] = 0;
$sub_menu_access['clinical_hosp_missing_notes']['view'] = 0;
$sub_menu_access['clinical_special_care']['view'] = 0;
$sub_menu_access['clinical_top_11_icd']['view'] = 0;
$sub_menu_access['clinical_vital_alert']['view'] = 0;
$sub_menu_access['clinical_wandering_risk']['view'] = 0;
$sub_menu_access['clinical_weight_alert']['view'] = 0;
$sub_menu_access['compliance_analytical_report']['view'] = 0;
$sub_menu_access['compliance_assessment_due']['view'] = 0;
$sub_menu_access['compliance_custom_assessment_due']['view'] = 0;
$sub_menu_access['compliance_sign_missing']['view'] = 0;
$sub_menu_access['compliance_emp_cert_exp']['view'] = 0;
$sub_menu_access['compliance_emp_license_exp']['view'] = 0;
$sub_menu_access['compliance_facility_exp']['view'] = 0;
$sub_menu_access['compliance_operational_report']['view'] = 0;
$sub_menu_access['compliance_patient_chart']['view'] = 0;
//$sub_menu_access['compliance_audit_log']['view'] = 0;
$sub_menu_access['admin_caregiver missing care note report']['view'] = 0;
$sub_menu_access['admin_followup notes report']['view'] = 0;
$sub_menu_access['admin_hospitalization report']['view'] = 0;
$sub_menu_access['admin_care manger client_report']['view'] = 0;
$sub_menu_access['admin_client visit report']['view'] = 0;
$sub_menu_access['admin_shift report']['view'] = 0;
$sub_menu_access['appointment_visit_report']['view'] = 0;
$sub_menu_access['admin_suspension_report']['view'] = 0;
$sub_menu_access['admin_leave_record_report']['view'] = 0;
$sub_menu_access['discharge_reason']['view'] = 0;
$sub_menu_access['suspension_reason']['view'] = 0;
$sub_menu_access['sms_report']['view'] = 0;
$sub_menu_access['referral_notes_report']['view'] = 0;
$sub_menu_access['referral_transfer']['view'] = 0;
$sub_menu_access['referral_source']['view'] = 0;
$sub_menu_access['referral_referred_by']['view'] = 0;
$sub_menu_access['caregiver_hired_date']['view'] = 0;
$sub_menu_access['referral_referred_to']['view'] = 0;
$sub_menu_access['careteam_client_details']['view'] = 0;
$sub_menu_access['careteam_assessment_missing']['view'] = 0;
$sub_menu_access['careteam_appointment_missing']['view'] = 0;
$sub_menu_access['careteam_attendance']['view'] = 0;
$sub_menu_access['background_check_report']['view'] = 0;
$sub_menu_access['other_details_report']['view'] = 0;
$sub_menu_access['cn_signature_missing']['view'] = 0;
$sub_menu_access['referral_admitted']['view'] = 0;
$sub_menu_access['cn_missing_signature']['view'] = 0;

$sub_menu_access['admin_admission_reports']['edit'] = 0;
//$sub_menu_access['clinical_profile_missing']['edit'] = 0;
//$sub_menu_access['admission_missing_notes']['edit'] = 0;
$sub_menu_access['admission_discharge']['edit'] = 0;
$sub_menu_access['admission_level_of_care']['edit'] = 0;
$sub_menu_access['administrator_cli_address_labels']['edit'] = 0;
$sub_menu_access['admin_administrator_reports']['edit'] = 0;
$sub_menu_access['administrator_birthday']['edit'] = 0;
$sub_menu_access['administrator_caregiverbirthday']['edit'] = 0;
$sub_menu_access['administrator_emergency_contact']['edit'] = 0;
$sub_menu_access['administrator_physician_reports']['edit'] = 0;
$sub_menu_access['administrator_physician_summary_reports']['edit'] = 0;
$sub_menu_access['administrator_progress_notes']['edit'] = 0;
$sub_menu_access['administrator_doc_exp_report']['edit'] = 0;
$sub_menu_access['admin_billing_reports']['edit'] = 0;
//$sub_menu_access['billing_census_data']['edit'] = 0;
//$sub_menu_access['billing_census_retro']['edit'] = 0;
$sub_menu_access['billing_caregiver_payment']['edit'] = 0;
$sub_menu_access['billing_cn_not_received']['edit'] = 0;
$sub_menu_access['billing_client_billing']['edit'] = 0;
$sub_menu_access['billing_caregiver_ytd']['edit'] = 0;
$sub_menu_access['billing_eligibility_exp']['edit'] = 0;
$sub_menu_access['billing_missing_payer_approved']['edit'] = 0;
$sub_menu_access['billing_pending_auth']['edit'] = 0;
//$sub_menu_access['billing_stipend_payment']['edit'] = 0;
$sub_menu_access['billing_careteam_payment_report']['edit'] = 0;
$sub_menu_access['admin_clinical_reports']['edit'] = 0;
$sub_menu_access['clinical_assessment_report']['edit'] = 0;
$sub_menu_access['clinical_behavior_report']['edit'] = 0;
$sub_menu_access['clinical_careplan_compliance']['edit'] = 0;
$sub_menu_access['clinical_careplan_due']['edit'] = 0;
$sub_menu_access['clinical_checklist_compliance']['edit'] = 0;
$sub_menu_access['clinical_checklist_due']['edit'] = 0;
$sub_menu_access['clinical_fallrisk_Assessment']['edit'] = 0;
$sub_menu_access['clinical_HnP_expiration']['edit'] = 0;
$sub_menu_access['clinical_Hospitalization_outcome']['edit'] = 0;
$sub_menu_access['clinical_immunization_exp']['edit'] = 0;
$sub_menu_access['clinical_incident_report']['edit'] = 0;
$sub_menu_access['clinical_medication_outcome']['edit'] = 0;
$sub_menu_access['clinical_hosp_missing_notes']['edit'] = 0;
$sub_menu_access['clinical_special_care']['edit'] = 0;
$sub_menu_access['clinical_top_11_icd']['edit'] = 0;
$sub_menu_access['clinical_vital_alert']['edit'] = 0;
$sub_menu_access['clinical_wandering_risk']['edit'] = 0;
$sub_menu_access['clinical_weight_alert']['edit'] = 0;
$sub_menu_access['compliance_analytical_report']['edit'] = 0;
$sub_menu_access['compliance_assessment_due']['edit'] = 0;
$sub_menu_access['compliance_custom_assessment_due']['edit'] = 0;
$sub_menu_access['compliance_sign_missing']['edit'] = 0;
$sub_menu_access['compliance_emp_cert_exp']['edit'] = 0;
$sub_menu_access['compliance_emp_license_exp']['edit'] = 0;
$sub_menu_access['compliance_facility_exp']['edit'] = 0;
$sub_menu_access['compliance_operational_report']['edit'] = 0;
$sub_menu_access['compliance_patient_chart']['edit'] = 0;
//$sub_menu_access['compliance_audit_log']['edit'] = 0;
$sub_menu_access['admin_caregiver missing care note report']['edit'] = 0;
$sub_menu_access['admin_followup notes report']['edit'] = 0;
$sub_menu_access['admin_hospitalization report']['edit'] = 0;
$sub_menu_access['admin_care manger client_report']['edit'] = 0;
$sub_menu_access['admin_client visit report']['edit'] = 0;
$sub_menu_access['admin_shift report']['edit'] = 0;
$sub_menu_access['appointment_visit_report']['edit'] = 0;
$sub_menu_access['admin_suspension_report']['edit'] = 0;
$sub_menu_access['admin_leave_record_report']['edit'] = 0;
$sub_menu_access['discharge_reason']['edit'] = 0;
$sub_menu_access['suspension_reason']['edit'] = 0;
$sub_menu_access['sms_report']['edit'] = 0;
$sub_menu_access['referral_notes_report']['edit'] = 0;
$sub_menu_access['referral_transfer']['edit'] = 0;
$sub_menu_access['referral_source']['edit'] = 0;
$sub_menu_access['referral_referred_by']['edit'] = 0;
$sub_menu_access['caregiver_hired_date']['edit'] = 0;
$sub_menu_access['referral_referred_to']['edit'] = 0;
$sub_menu_access['careteam_client_details']['edit'] = 0;
$sub_menu_access['careteam_assessment_missing']['edit'] = 0;
$sub_menu_access['careteam_appointment_missing']['edit'] = 0;
$sub_menu_access['careteam_attendance']['edit'] = 0;
$sub_menu_access['background_check_report']['edit'] = 0;
$sub_menu_access['other_details_report']['edit'] = 0;
$sub_menu_access['cn_signature_missing']['edit'] = 0;
$sub_menu_access['referral_admitted']['edit'] = 0;
$sub_menu_access['cn_missing_signature']['edit'] = 0;

$sub_menu_access['admin_admission_reports']['delete'] = 0;
//$sub_menu_access['clinical_profile_missing']['delete'] = 0;
//$sub_menu_access['admission_missing_notes']['delete'] = 0;
$sub_menu_access['admission_discharge']['delete'] = 0;
$sub_menu_access['admission_level_of_care']['delete'] = 0;
$sub_menu_access['administrator_cli_address_labels']['delete'] = 0;
$sub_menu_access['admin_administrator_reports']['delete'] = 0;
$sub_menu_access['administrator_birthday']['delete'] = 0;
$sub_menu_access['administrator_caregiverbirthday']['delete'] = 0;
$sub_menu_access['administrator_emergency_contact']['delete'] = 0;
$sub_menu_access['administrator_physician_reports']['delete'] = 0;
$sub_menu_access['administrator_physician_summary_reports']['delete'] = 0;
$sub_menu_access['administrator_progress_notes']['delete'] = 0;
$sub_menu_access['administrator_doc_exp_report']['delete'] = 0;
$sub_menu_access['admin_billing_reports']['delete'] = 0;
//$sub_menu_access['billing_census_data']['delete'] = 0;
//$sub_menu_access['billing_census_retro']['delete'] = 0;
$sub_menu_access['billing_caregiver_payment']['delete'] = 0;
$sub_menu_access['billing_cn_not_received']['delete'] = 0;
$sub_menu_access['billing_client_billing']['delete'] = 0;
$sub_menu_access['billing_caregiver_ytd']['delete'] = 0;
$sub_menu_access['billing_eligibility_exp']['delete'] = 0;
$sub_menu_access['billing_missing_payer_approved']['delete'] = 0;
$sub_menu_access['billing_pending_auth']['delete'] = 0;
//$sub_menu_access['billing_stipend_payment']['delete'] = 0;
$sub_menu_access['billing_careteam_payment_report']['delete'] = 0;
$sub_menu_access['admin_clinical_reports']['delete'] = 0;
$sub_menu_access['clinical_assessment_report']['delete'] = 0;
$sub_menu_access['clinical_behavior_report']['delete'] = 0;
$sub_menu_access['clinical_careplan_compliance']['delete'] = 0;
$sub_menu_access['clinical_careplan_due']['delete'] = 0;
$sub_menu_access['clinical_checklist_compliance']['delete'] = 0;
$sub_menu_access['clinical_checklist_due']['delete'] = 0;
$sub_menu_access['clinical_fallrisk_Assessment']['delete'] = 0;
$sub_menu_access['clinical_HnP_expiration']['delete'] = 0;
$sub_menu_access['clinical_Hospitalization_outcome']['delete'] = 0;
$sub_menu_access['clinical_immunization_exp']['delete'] = 0;
$sub_menu_access['clinical_incident_report']['delete'] = 0;
$sub_menu_access['clinical_medication_outcome']['delete'] = 0;
$sub_menu_access['clinical_hosp_missing_notes']['delete'] = 0;
$sub_menu_access['clinical_special_care']['delete'] = 0;
$sub_menu_access['clinical_top_11_icd']['delete'] = 0;
$sub_menu_access['clinical_vital_alert']['delete'] = 0;
$sub_menu_access['clinical_wandering_risk']['delete'] = 0;
$sub_menu_access['clinical_weight_alert']['delete'] = 0;
$sub_menu_access['compliance_analytical_report']['delete'] = 0;
$sub_menu_access['compliance_assessment_due']['delete'] = 0;
$sub_menu_access['compliance_custom_assessment_due']['delete'] = 0;
$sub_menu_access['compliance_sign_missing']['delete'] = 0;
$sub_menu_access['compliance_emp_cert_exp']['delete'] = 0;
$sub_menu_access['compliance_emp_license_exp']['delete'] = 0;
$sub_menu_access['compliance_facility_exp']['delete'] = 0;
$sub_menu_access['compliance_operational_report']['delete'] = 0;
$sub_menu_access['compliance_patient_chart']['delete'] = 0;
//$sub_menu_access['compliance_audit_log']['delete'] = 0;
$sub_menu_access['admin_caregiver missing care note report']['delete'] = 0;
$sub_menu_access['admin_followup notes report']['delete'] = 0;
$sub_menu_access['admin_hospitalization report']['delete'] = 0;
$sub_menu_access['admin_care manger client_report']['delete'] = 0;
$sub_menu_access['admin_client visit report']['delete'] = 0;
$sub_menu_access['admin_shift report']['delete'] = 0;
$sub_menu_access['appointment_visit_report']['delete'] = 0;
$sub_menu_access['admin_suspension_report']['delete'] = 0;
$sub_menu_access['admin_leave_record_report']['delete'] = 0;
$sub_menu_access['discharge_reason']['delete'] = 0;
$sub_menu_access['suspension_reason']['delete'] = 0;
$sub_menu_access['sms_report']['delete'] = 0;
$sub_menu_access['referral_notes_report']['delete'] = 0;
$sub_menu_access['referral_transfer']['delete'] = 0;
$sub_menu_access['referral_source']['delete'] = 0;
$sub_menu_access['referral_referred_by']['delete'] = 0;
$sub_menu_access['caregiver_hired_date']['delete'] = 0;
$sub_menu_access['referral_referred_to']['delete'] = 0;
$sub_menu_access['careteam_client_details']['delete'] = 0;
$sub_menu_access['careteam_assessment_missing']['delete'] = 0;
$sub_menu_access['careteam_appointment_missing']['delete'] = 0;
$sub_menu_access['careteam_attendance']['delete'] = 0;
$sub_menu_access['background_check_report']['delete'] = 0;
$sub_menu_access['other_details_report']['delete'] = 0;
$sub_menu_access['cn_signature_missing']['delete'] = 0;
$sub_menu_access['referral_admitted']['delete'] = 0;
$sub_menu_access['cn_missing_signature']['delete'] = 0;


$sub_menu_access['admin_admission_reports']['print'] = 0;
//$sub_menu_access['clinical_profile_missing']['print'] = 0;
//$sub_menu_access['admission_missing_notes']['print'] = 0;
$sub_menu_access['admission_discharge']['print'] = 0;
$sub_menu_access['admission_level_of_care']['print'] = 0;
$sub_menu_access['administrator_cli_address_labels']['print'] = 0;
$sub_menu_access['admin_administrator_reports']['print'] = 0;
$sub_menu_access['administrator_birthday']['print'] = 0;
$sub_menu_access['administrator_caregiverbirthday']['print'] = 0;
$sub_menu_access['administrator_emergency_contact']['print'] = 0;
$sub_menu_access['administrator_physician_reports']['print'] = 0;
$sub_menu_access['administrator_physician_summary_reports']['print'] = 0;
$sub_menu_access['administrator_progress_notes']['print'] = 0;
$sub_menu_access['administrator_doc_exp_report']['print'] = 0;
$sub_menu_access['admin_billing_reports']['print'] = 0;
//$sub_menu_access['billing_census_data']['print'] = 0;
//$sub_menu_access['billing_census_retro']['print'] = 0;
$sub_menu_access['billing_caregiver_payment']['print'] = 0;
$sub_menu_access['billing_cn_not_received']['print'] = 0;
$sub_menu_access['billing_client_billing']['print'] = 0;
$sub_menu_access['billing_caregiver_ytd']['print'] = 0;
$sub_menu_access['billing_eligibility_exp']['print'] = 0;
$sub_menu_access['billing_missing_payer_approved']['print'] = 0;
$sub_menu_access['billing_pending_auth']['print'] = 0;
//$sub_menu_access['billing_stipend_payment']['print'] = 0;
$sub_menu_access['billing_careteam_payment_report']['print'] = 0;
$sub_menu_access['admin_clinical_reports']['print'] = 0;
$sub_menu_access['clinical_assessment_report']['print'] = 0;
$sub_menu_access['clinical_behavior_report']['print'] = 0;
$sub_menu_access['clinical_careplan_compliance']['print'] = 0;
$sub_menu_access['clinical_careplan_due']['print'] = 0;
$sub_menu_access['clinical_checklist_compliance']['print'] = 0;
$sub_menu_access['clinical_checklist_due']['print'] = 0;
$sub_menu_access['clinical_fallrisk_Assessment']['print'] = 0;
$sub_menu_access['clinical_HnP_expiration']['print'] = 0;
$sub_menu_access['clinical_Hospitalization_outcome']['print'] = 0;
$sub_menu_access['clinical_immunization_exp']['print'] = 0;
$sub_menu_access['clinical_incident_report']['print'] = 0;
$sub_menu_access['clinical_medication_outcome']['print'] = 0;
$sub_menu_access['clinical_hosp_missing_notes']['print'] = 0;
$sub_menu_access['clinical_special_care']['print'] = 0;
$sub_menu_access['clinical_top_11_icd']['print'] = 0;
$sub_menu_access['clinical_vital_alert']['print'] = 0;
$sub_menu_access['clinical_wandering_risk']['print'] = 0;
$sub_menu_access['clinical_weight_alert']['print'] = 0;
$sub_menu_access['compliance_analytical_report']['print'] = 0;
$sub_menu_access['compliance_assessment_due']['print'] = 0;
$sub_menu_access['compliance_custom_assessment_due']['print'] = 0;
$sub_menu_access['compliance_sign_missing']['print'] = 0;
$sub_menu_access['compliance_emp_cert_exp']['print'] = 0;
$sub_menu_access['compliance_emp_license_exp']['print'] = 0;
$sub_menu_access['compliance_facility_exp']['print'] = 0;
$sub_menu_access['compliance_operational_report']['print'] = 0;
$sub_menu_access['compliance_patient_chart']['print'] = 0;
//$sub_menu_access['compliance_audit_log']['print'] = 0;
$sub_menu_access['admin_caregiver missing care note report']['print'] = 0;
$sub_menu_access['admin_followup notes report']['print'] = 0;
$sub_menu_access['admin_hospitalization report']['print'] = 0;
$sub_menu_access['admin_care manger client_report']['print'] = 0;
$sub_menu_access['admin_client visit report']['print'] = 0;
$sub_menu_access['admin_shift report']['print'] = 0;
$sub_menu_access['appointment_visit_report']['print'] = 0;
$sub_menu_access['admin_suspension_report']['print'] = 0;
$sub_menu_access['admin_leave_record_report']['print'] = 0;
$sub_menu_access['discharge_reason']['print'] = 0;
$sub_menu_access['suspension_reason']['print'] = 0;
$sub_menu_access['sms_report']['print'] = 0;
$sub_menu_access['referral_notes_report']['print'] = 0;
$sub_menu_access['referral_transfer']['print'] = 0;
$sub_menu_access['referral_source']['print'] = 0;
$sub_menu_access['referral_referred_by']['print'] = 0;
$sub_menu_access['caregiver_hired_date']['print'] = 0;
$sub_menu_access['referral_referred_to']['print'] = 0;
$sub_menu_access['careteam_client_details']['print'] = 0;
$sub_menu_access['careteam_assessment_missing']['print'] = 0;
$sub_menu_access['careteam_appointment_missing']['print'] = 0;
$sub_menu_access['careteam_attendance']['print'] = 0;
$sub_menu_access['background_check_report']['print'] = 0;
$sub_menu_access['other_details_report']['print'] = 0;
$sub_menu_access['cn_signature_missing']['print'] = 0;
$sub_menu_access['referral_admitted']['print'] = 0;
$sub_menu_access['cn_missing_signature']['print'] = 0;




$sub_menu_access['admin_admission_reports']['employee'] = 0;
//$sub_menu_access['clinical_profile_missing']['employee'] = 0;
//$sub_menu_access['admission_missing_notes']['employee'] = 0;
$sub_menu_access['admission_discharge']['employee'] = 0;
$sub_menu_access['admission_level_of_care']['employee'] = 0;
$sub_menu_access['administrator_cli_address_labels']['employee'] = 0;
$sub_menu_access['admin_administrator_reports']['employee'] = 0;
$sub_menu_access['administrator_birthday']['employee'] = 0;
$sub_menu_access['administrator_caregiverbirthday']['employee'] = 0;
$sub_menu_access['administrator_emergency_contact']['employee'] = 0;
$sub_menu_access['administrator_physician_reports']['employee'] = 0;
$sub_menu_access['administrator_physician_summary_reports']['employee'] = 0;
$sub_menu_access['administrator_progress_notes']['employee'] = 0;
$sub_menu_access['administrator_doc_exp_report']['employee'] = 0;
$sub_menu_access['admin_billing_reports']['employee'] = 0;
//$sub_menu_access['billing_census_data']['employee'] = 0;
//$sub_menu_access['billing_census_retro']['employee'] = 0;
$sub_menu_access['billing_caregiver_payment']['employee'] = 0;
$sub_menu_access['billing_cn_not_received']['employee'] = 0;
$sub_menu_access['billing_client_billing']['employee'] = 0;
$sub_menu_access['billing_caregiver_ytd']['employee'] = 0;
$sub_menu_access['billing_eligibility_exp']['employee'] = 0;
$sub_menu_access['billing_missing_payer_approved']['employee'] = 0;
$sub_menu_access['billing_pending_auth']['employee'] = 0;
//$sub_menu_access['billing_stipend_payment']['employee'] = 0;
$sub_menu_access['billing_careteam_payment_report']['employee'] = 0;
$sub_menu_access['admin_clinical_reports']['employee'] = 0;
$sub_menu_access['clinical_assessment_report']['employee'] = 0;
$sub_menu_access['clinical_behavior_report']['employee'] = 0;
$sub_menu_access['clinical_careplan_compliance']['employee'] = 0;
$sub_menu_access['clinical_careplan_due']['employee'] = 0;
$sub_menu_access['clinical_checklist_compliance']['employee'] = 0;
$sub_menu_access['clinical_checklist_due']['employee'] = 0;
$sub_menu_access['clinical_fallrisk_Assessment']['employee'] = 0;
$sub_menu_access['clinical_HnP_expiration']['employee'] = 0;
$sub_menu_access['clinical_Hospitalization_outcome']['employee'] = 0;
$sub_menu_access['clinical_immunization_exp']['employee'] = 0;
$sub_menu_access['clinical_incident_report']['employee'] = 0;
$sub_menu_access['clinical_medication_outcome']['employee'] = 0;
$sub_menu_access['clinical_hosp_missing_notes']['employee'] = 0;
$sub_menu_access['clinical_special_care']['employee'] = 0;
$sub_menu_access['clinical_top_11_icd']['employee'] = 0;
$sub_menu_access['clinical_vital_alert']['employee'] = 0;
$sub_menu_access['clinical_wandering_risk']['employee'] = 0;
$sub_menu_access['clinical_weight_alert']['employee'] = 0;
$sub_menu_access['compliance_analytical_report']['employee'] = 0;
$sub_menu_access['compliance_assessment_due']['employee'] = 0;
$sub_menu_access['compliance_custom_assessment_due']['employee'] = 0;
$sub_menu_access['compliance_sign_missing']['employee'] = 0;
$sub_menu_access['compliance_emp_cert_exp']['employee'] = 0;
$sub_menu_access['compliance_emp_license_exp']['employee'] = 0;
$sub_menu_access['compliance_facility_exp']['employee'] = 0;
$sub_menu_access['compliance_operational_report']['employee'] = 0;
$sub_menu_access['compliance_patient_chart']['employee'] = 0;
//$sub_menu_access['compliance_audit_log']['employee'] = 0;
$sub_menu_access['admin_caregiver missing care note report']['employee'] = 0;
$sub_menu_access['admin_followup notes report']['employee'] = 0;
$sub_menu_access['admin_hospitalization report']['employee'] = 0;
$sub_menu_access['admin_care manger client_report']['employee'] = 0;
$sub_menu_access['admin_client visit report']['employee'] = 0;
$sub_menu_access['admin_shift report']['employee'] = 0;
$sub_menu_access['appointment_visit_report']['employee'] = 0;
$sub_menu_access['admin_suspension_report']['employee'] = 0;
$sub_menu_access['admin_leave_record_report']['employee'] = 0;
$sub_menu_access['discharge_reason']['employee'] = 0;
$sub_menu_access['suspension_reason']['employee'] = 0;
$sub_menu_access['sms_report']['employee'] = 0;
$sub_menu_access['referral_notes_report']['employee'] = 0;
$sub_menu_access['referral_transfer']['employee'] = 0;
$sub_menu_access['referral_source']['employee'] = 0;
$sub_menu_access['referral_referred_by']['employee'] = 0;
$sub_menu_access['caregiver_hired_date']['employee'] = 0;
$sub_menu_access['referral_referred_to']['employee'] = 0;
$sub_menu_access['careteam_client_details']['employee'] = 0;
$sub_menu_access['careteam_assessment_missing']['employee'] = 0;
$sub_menu_access['careteam_appointment_missing']['employee'] = 0;
$sub_menu_access['careteam_attendance']['employee'] = 0;
$sub_menu_access['background_check_report']['employee'] = 0;
$sub_menu_access['other_details_report']['employee'] = 0;
$sub_menu_access['cn_signature_missing']['employee'] = 0;
$sub_menu_access['referral_admitted']['employee'] = 0;
$sub_menu_access['cn_missing_signature']['employee'] = 0;

// Transpotation start
$sub_menu_access['transportation_log']['view'] = $trans_log_view;
$sub_menu_access['transportation_log']['edit'] = $trans_log_edit;
$sub_menu_access['transportation_log']['delete'] = $trans_log_delete;
$sub_menu_access['transportation_log']['print'] = $trans_log_print;
$sub_menu_access['transportation_log']['employee'] = $trans_log_employee;

$sub_menu_access['trans_inspection']['view'] = $trans_inspection_view;
$sub_menu_access['trans_inspection']['edit'] = $trans_inspection_edit;
$sub_menu_access['trans_inspection']['delete'] = $trans_inspection_delete;
$sub_menu_access['trans_inspection']['print'] = $trans_inspection_print;
$sub_menu_access['trans_inspection']['employee'] = $trans_inspection_employee;

$sub_menu_access['trans_pickUpSchedule']['view'] = $trans_pickUpSchedule_view;
$sub_menu_access['trans_pickUpSchedule']['edit'] = $trans_pickUpSchedule_edit;
$sub_menu_access['trans_pickUpSchedule']['delete'] = $trans_pickUpSchedule_delete;
$sub_menu_access['trans_pickUpSchedule']['print'] = $trans_pickUpSchedule_print;
$sub_menu_access['trans_pickUpSchedule']['employee'] = $trans_pickUpSchedule_employee;

$sub_menu_access['trans_dropOffSchedule']['view'] = $trans_dropOffSchedule_view;
$sub_menu_access['trans_dropOffSchedule']['edit'] = $trans_dropOffSchedule_edit;
$sub_menu_access['trans_dropOffSchedule']['delete'] = $trans_dropOffSchedule_delete;
$sub_menu_access['trans_dropOffSchedule']['print'] = $trans_dropOffSchedule_print;
$sub_menu_access['trans_dropOffSchedule']['employee'] = $trans_dropOffSchedule_employee;

$sub_menu_access['trans_field_trip_log']['view'] = $trans_field_trip_log_view;
$sub_menu_access['trans_field_trip_log']['edit'] = $trans_field_trip_log_edit;
$sub_menu_access['trans_field_trip_log']['delete'] = $trans_field_trip_log_delete;
$sub_menu_access['trans_field_trip_log']['print'] = $trans_field_trip_log_print;
$sub_menu_access['trans_field_trip_log']['employee'] = $trans_field_trip_log_employee;

$sub_menu_access['trans_field_trip_schedule']['view'] = $trans_field_trip_schedule_view;
$sub_menu_access['trans_field_trip_schedule']['edit'] = $trans_field_trip_schedule_edit;
$sub_menu_access['trans_field_trip_schedule']['delete'] = $trans_field_trip_schedule_delete;
$sub_menu_access['trans_field_trip_schedule']['print'] = $trans_field_trip_schedule_print;
$sub_menu_access['trans_field_trip_schedule']['employee'] = $trans_field_trip_schedule_employee;

$sub_menu_access['trans_import_schedule']['view'] = $trans_import_schedule_view;
$sub_menu_access['trans_import_schedule']['edit'] = $trans_import_schedule_edit;
$sub_menu_access['trans_import_schedule']['delete'] = $trans_import_schedule_delete;
$sub_menu_access['trans_import_schedule']['print'] = $trans_import_schedule_print;
$sub_menu_access['trans_import_schedule']['employee'] = $trans_import_schedule_employee;
// Transpotation end

// timecard start
$sub_menu_access['timecard_check_in']['view'] = $time_check_in_view;
$sub_menu_access['timecard_check_in']['edit'] = $time_check_in_edit;
$sub_menu_access['timecard_check_in']['delete'] = $time_check_in_delete;
$sub_menu_access['timecard_check_in']['print'] = $time_check_in_print;
$sub_menu_access['timecard_check_in']['employee'] = $time_check_in_employee;

$sub_menu_access['timecard_check_out']['view'] = $time_check_out_view;
$sub_menu_access['timecard_check_out']['edit'] = $time_check_out_edit;
$sub_menu_access['timecard_check_out']['delete'] = $time_check_out_delete;
$sub_menu_access['timecard_check_out']['print'] = $time_check_out_print;
$sub_menu_access['timecard_check_out']['employee'] = $time_check_out_employee;

$sub_menu_access['timecard_schedule']['view'] = $time_schedule_view;
$sub_menu_access['timecard_schedule']['edit'] = $time_schedule_edit;
$sub_menu_access['timecard_schedule']['delete'] = $time_schedule_delete;
$sub_menu_access['timecard_schedule']['print'] = $time_schedule_print;
$sub_menu_access['timecard_schedule']['employee'] = $time_schedule_employee;

$sub_menu_access['timecard_log']['view'] = $time_log_view;
$sub_menu_access['timecard_log']['edit'] = $time_log_edit;
$sub_menu_access['timecard_log']['delete'] = $time_log_delete;
$sub_menu_access['timecard_log']['print'] = $time_log_print;
$sub_menu_access['timecard_log']['employee'] = $time_log_employee;
// timecard end
$sub_menu_access['rpm']['view'] = $rpm_view;
$sub_menu_access['rpm']['edit'] = $rpm_edit;
$sub_menu_access['rpm']['delete'] = $rpm_delete;
$sub_menu_access['rpm']['print'] = $rpm_print;
$sub_menu_access['rpm']['employee'] = $rpm_employee;

$sub_menu_access['admin_custom_form']['view'] = $admin_custom_form_view;
$sub_menu_access['admin_custom_form']['edit'] = $admin_custom_form_edit;
$sub_menu_access['admin_custom_form']['delete'] = $admin_custom_form_delete;
$sub_menu_access['admin_custom_form']['print'] = $admin_custom_form_print;
$sub_menu_access['admin_custom_form']['employee'] = $admin_custom_form_employee;

$sub_menu_access['admin_system_form']['view'] = $admin_system_form_view;
$sub_menu_access['admin_system_form']['edit'] = $admin_system_form_edit;
$sub_menu_access['admin_system_form']['delete'] = $admin_system_form_delete;
$sub_menu_access['admin_system_form']['print'] = $admin_system_form_print;
$sub_menu_access['admin_system_form']['employee'] = $admin_system_form_employee;

$sub_menu_access['admin_referral_questions']['view'] = $admin_referral_questions_view;
$sub_menu_access['admin_referral_questions']['edit'] = $admin_referral_questions_edit;
$sub_menu_access['admin_referral_questions']['delete'] = $admin_referral_questions_delete;
$sub_menu_access['admin_referral_questions']['print'] = $admin_referral_questions_print;
$sub_menu_access['admin_referral_questions']['employee'] = $admin_referral_questions_employee;

$sub_menu_access['admin_referral_source']['view'] = $admin_referral_source_view;
$sub_menu_access['admin_referral_source']['edit'] = $admin_referral_source_edit;
$sub_menu_access['admin_referral_source']['delete'] = $admin_referral_source_delete;
$sub_menu_access['admin_referral_source']['print'] = $admin_referral_source_print;
$sub_menu_access['admin_referral_source']['employee'] = $admin_referral_source_employee;

$sub_menu_access['admin_referral_status']['view'] = $admin_referral_status_view;
$sub_menu_access['admin_referral_status']['edit'] = $admin_referral_status_edit;
$sub_menu_access['admin_referral_status']['delete'] = $admin_referral_status_delete;
$sub_menu_access['admin_referral_status']['print'] = $admin_referral_status_print;
$sub_menu_access['admin_referral_status']['employee'] = $admin_referral_status_employee;

$sub_menu_access['admin_conversation_status']['view'] = $admin_conversation_status_view;
$sub_menu_access['admin_conversation_status']['edit'] = $admin_conversation_status_edit;
$sub_menu_access['admin_conversation_status']['delete'] = $admin_conversation_status_delete;
$sub_menu_access['admin_conversation_status']['print'] = $admin_conversation_status_print;
$sub_menu_access['admin_conversation_status']['employee'] = $admin_conversation_status_employee;

$sub_menu_access['admin_organization']['view'] = $admin_organization_view;
$sub_menu_access['admin_organization']['edit'] = $admin_organization_edit;
$sub_menu_access['admin_organization']['delete'] = $admin_organization_delete;
$sub_menu_access['admin_organization']['print'] = $admin_organization_print;
$sub_menu_access['admin_organization']['employee'] = $admin_organization_employee;

$sub_menu_access['admin_referral_priority']['view'] = $admin_referral_priority_view;
$sub_menu_access['admin_referral_priority']['edit'] = $admin_referral_priority_edit;
$sub_menu_access['admin_referral_priority']['delete'] = $admin_referral_priority_delete;
$sub_menu_access['admin_referral_priority']['print'] = $admin_referral_priority_print;
$sub_menu_access['admin_referral_priority']['employee'] = $admin_referral_priority_employee;


$sub_menu_access['admin_referral_note']['view'] = $admin_referral_note_view;
$sub_menu_access['admin_referral_note']['edit'] = $admin_referral_note_edit;
$sub_menu_access['admin_referral_note']['delete'] = $admin_referral_note_delete;
$sub_menu_access['admin_referral_note']['print'] = $admin_referral_note_print;
$sub_menu_access['admin_referral_note']['employee'] = $admin_referral_note_employee;


$sub_menu_access['admin_adl_questions']['view'] = $admin_adl_questions_view;
$sub_menu_access['admin_adl_questions']['edit'] = $admin_adl_questions_edit;
$sub_menu_access['admin_adl_questions']['delete'] = $admin_adl_questions_delete;
$sub_menu_access['admin_adl_questions']['print'] = $admin_adl_questions_print;
$sub_menu_access['admin_adl_questions']['employee'] = $admin_adl_questions_employee;
	// view
	

			if (isset(session()->get('array_menu_functionality_access_view')['admission :: admission report']) && session()->get('array_menu_functionality_access_view')['admission :: admission report'] != "NO") {
				$sub_menu_access['admin_admission_reports']['view'] = 1;
			}

			/*if (isset(session()->get('array_menu_functionality_access_view')['admission :: admission clinical profile missing']) && session()->get('array_menu_functionality_access_view')['admission :: admission clinical profile missing'] != "NO") {
				$sub_menu_access['clinical_profile_missing']['view'] = 1;
			}*/

			/*if (isset(session()->get('array_menu_functionality_access_view')['admission :: admission missing notes']) && session()->get('array_menu_functionality_access_view')['admission :: admission missing notes'] != "NO") {
				$sub_menu_access['admission_missing_notes']['view'] = 1;
			}*/

			if (isset(session()->get('array_menu_functionality_access_view')['admission :: discharge']) && session()->get('array_menu_functionality_access_view')['admission :: discharge'] != "NO") {
				$sub_menu_access['admission_discharge']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['admission :: level of care']) && session()->get('array_menu_functionality_access_view')['admission :: level of care'] != "NO") {
				$sub_menu_access['admission_level_of_care']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: client address labels']) && session()->get('array_menu_functionality_access_view')['administrator :: client address labels'] != "NO") {
				$sub_menu_access['administrator_cli_address_labels']['view'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: anniversary']) && session()->get('array_menu_functionality_access_view')['administrator :: anniversary'] != "NO") {
				$sub_menu_access['admin_administrator_reports']['view'] = 1;
			}	
			 
			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: birthday']) && session()->get('array_menu_functionality_access_view')['administrator :: birthday'] != "NO") {
				$sub_menu_access['administrator_birthday']['view'] = 1;
			}	        
			 
			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: caregiver birthday']) && session()->get('array_menu_functionality_access_view')['administrator :: caregiver birthday'] != "NO") {
				$sub_menu_access['administrator_caregiverbirthday']['view'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: emergency contact']) && session()->get('array_menu_functionality_access_view')['administrator :: emergency contact'] != "NO") {
				$sub_menu_access['administrator_emergency_contact']['view'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: physician reports']) && session()->get('array_menu_functionality_access_view')['administrator :: physician reports'] != "NO") {
				$sub_menu_access['administrator_physician_reports']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: physician summary reports']) && session()->get('array_menu_functionality_access_view')['administrator :: physician summary reports'] != "NO") {
				$sub_menu_access['administrator_physician_summary_reports']['view'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: progress notes']) && session()->get('array_menu_functionality_access_view')['administrator :: progress notes'] != "NO") {
				$sub_menu_access['administrator_progress_notes']['view'] = 1;
			}		 

			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: document expiration report']) && session()->get('array_menu_functionality_access_view')['administrator :: document expiration report'] != "NO") {
				$sub_menu_access['administrator_doc_exp_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['billing :: active eligibility']) && session()->get('array_menu_functionality_access_view')['billing :: active eligibility'] != "NO") {
				$sub_menu_access['admin_billing_reports']['view'] = 1;
			}    

			/*if (isset(session()->get('array_menu_functionality_access_view')['billing :: census data']) && session()->get('array_menu_functionality_access_view')['billing :: census data'] != "NO") {
				$sub_menu_access['billing_census_data']['view'] = 1;
			} */          

			/*if (isset(session()->get('array_menu_functionality_access_view')['billing :: census retro']) && session()->get('array_menu_functionality_access_view')['billing :: census retro'] != "NO") {
				$sub_menu_access['billing_census_retro']['view'] = 1;
			}*/ 

			if (isset(session()->get('array_menu_functionality_access_view')['caregiver :: payment']) && session()->get('array_menu_functionality_access_view')['caregiver :: payment'] != "NO") {
				$sub_menu_access['billing_caregiver_payment']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['caregiver :: paper cn not received']) && session()->get('array_menu_functionality_access_view')['caregiver :: paper cn not received'] != "NO") {
				$sub_menu_access['billing_cn_not_received']['view'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_view')['billing :: client billing']) && session()->get('array_menu_functionality_access_view')['billing :: client billing'] != "NO") {
				$sub_menu_access['billing_client_billing']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['caregiver :: payment ytd']) && session()->get('array_menu_functionality_access_view')['caregiver :: payment ytd'] != "NO") {
				$sub_menu_access['billing_caregiver_ytd']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['billing :: eligibility expiration']) && session()->get('array_menu_functionality_access_view')['billing :: eligibility expiration'] != "NO") {
				$sub_menu_access['billing_eligibility_exp']['view'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_view')['billing :: payer missing for approved']) && session()->get('array_menu_functionality_access_view')['billing :: payer missing for approved'] != "NO") {
				$sub_menu_access['billing_missing_payer_approved']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['billing :: pending authorization']) && session()->get('array_menu_functionality_access_view')['billing :: pending authorization'] != "NO") {
				$sub_menu_access['billing_pending_auth']['view'] = 1;
			} 

			/*if (isset(session()->get('array_menu_functionality_access_view')['billing :: stipend payment record']) && session()->get('array_menu_functionality_access_view')['billing :: stipend payment record'] != "NO") {
				$sub_menu_access['billing_stipend_payment']['view'] = 1;
			} */

			if (isset(session()->get('array_menu_functionality_access_view')['care team ::  payment report']) && session()->get('array_menu_functionality_access_view')['care team ::  payment report'] != "NO") {
				$sub_menu_access['billing_careteam_payment_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: allergy report']) && session()->get('array_menu_functionality_access_view')['clinical :: allergy report'] != "NO") {
				$sub_menu_access['admin_clinical_reports']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: assessment report']) && session()->get('array_menu_functionality_access_view')['clinical :: assessment report'] != "NO") {
				$sub_menu_access['clinical_assessment_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: behavior report']) && session()->get('array_menu_functionality_access_view')['clinical :: behavior report'] != "NO") {
				$sub_menu_access['clinical_behavior_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: care plan – compliance']) && session()->get('array_menu_functionality_access_view')['clinical :: care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_careplan_compliance']['view'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: care plan - due']) && session()->get('array_menu_functionality_access_view')['clinical :: care plan - due'] != "NO") {
				$sub_menu_access['clinical_careplan_due']['view'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: checklist care plan – compliance']) && session()->get('array_menu_functionality_access_view')['clinical :: checklist care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_checklist_compliance']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: checklist care plan - due']) && session()->get('array_menu_functionality_access_view')['clinical :: checklist care plan - due'] != "NO") {
				$sub_menu_access['clinical_checklist_due']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: fall risk assessment']) && session()->get('array_menu_functionality_access_view')['clinical :: fall risk assessment'] != "NO") {
				$sub_menu_access['clinical_fallrisk_Assessment']['view'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: h&p expiration']) && session()->get('array_menu_functionality_access_view')['clinical :: h&p expiration'] != "NO") {
				$sub_menu_access['clinical_HnP_expiration']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: hospitalization outcome']) && session()->get('array_menu_functionality_access_view')['clinical :: hospitalization outcome'] != "NO") {
				$sub_menu_access['clinical_Hospitalization_outcome']['view'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: immunization expiration']) && session()->get('array_menu_functionality_access_view')['clinical :: immunization expiration'] != "NO") {
				$sub_menu_access['clinical_immunization_exp']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: incident report']) && session()->get('array_menu_functionality_access_view')['clinical :: incident report'] != "NO") {
				$sub_menu_access['clinical_incident_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: medication outcome']) && session()->get('array_menu_functionality_access_view')['clinical :: medication outcome'] != "NO") {
				$sub_menu_access['clinical_medication_outcome']['view'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: post hospitalization missing notes']) && session()->get('array_menu_functionality_access_view')['clinical :: post hospitalization missing notes'] != "NO") {
				$sub_menu_access['clinical_hosp_missing_notes']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: special care']) && session()->get('array_menu_functionality_access_view')['clinical :: special care'] != "NO") {
				$sub_menu_access['clinical_special_care']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: top 10 icd code']) && session()->get('array_menu_functionality_access_view')['clinical :: top 10 icd code'] != "NO") {
				$sub_menu_access['clinical_top_11_icd']['view'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: vitals alert']) && session()->get('array_menu_functionality_access_view')['clinical :: vitals alert'] != "NO") {
				$sub_menu_access['clinical_vital_alert']['view'] = 1;
			}             


			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: wandering risk']) && session()->get('array_menu_functionality_access_view')['clinical :: wandering risk'] != "NO") {
				$sub_menu_access['clinical_wandering_risk']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['clinical :: weight alert report']) && session()->get('array_menu_functionality_access_view')['clinical :: weight alert report'] != "NO") {
				$sub_menu_access['clinical_weight_alert']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['compliance :: analytical report']) && session()->get('array_menu_functionality_access_view')['compliance :: analytical report'] != "NO") {
				$sub_menu_access['compliance_analytical_report']['view'] = 1;
			}              

			if (isset(session()->get('array_menu_functionality_access_view')['compliance :: assessments due']) && session()->get('array_menu_functionality_access_view')['compliance :: assessments due'] != "NO") {
				$sub_menu_access['compliance_assessment_due']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['compliance :: custom assessments due']) && session()->get('array_menu_functionality_access_view')['compliance :: custom assessments due'] != "NO") {
				$sub_menu_access['compliance_custom_assessment_due']['view'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_view')['compliance :: assessment – signature missing']) && session()->get('array_menu_functionality_access_view')['compliance :: assessment – signature missing'] != "NO") {
				$sub_menu_access['compliance_sign_missing']['view'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_view')['compliance :: employee certification expiration']) && session()->get('array_menu_functionality_access_view')['compliance :: employee certification expiration'] != "NO") {
				$sub_menu_access['compliance_emp_cert_exp']['view'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_view')['compliance :: employee license expiration']) && session()->get('array_menu_functionality_access_view')['compliance :: employee license expiration'] != "NO") {
				$sub_menu_access['compliance_emp_license_exp']['view'] = 1;
			}  


			/*if (isset(session()->get('array_menu_functionality_access_view')['compliance :: audit log']) && session()->get('array_menu_functionality_access_view')['compliance :: audit log'] != "NO") {
				$sub_menu_access['compliance_audit_log']['view'] = 1;
			}*/ 		 

			if (isset(session()->get('array_menu_functionality_access_view')['caregiver :: missing care log']) && session()->get('array_menu_functionality_access_view')['caregiver :: missing care log'] != "NO") {
				$sub_menu_access['admin_caregiver missing care note report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['care team :: followup notes report']) && session()->get('array_menu_functionality_access_view')['care team :: followup notes report'] != "NO") {
				$sub_menu_access['admin_followup notes report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['Clinical :: Hospitalization Report']) && session()->get('array_menu_functionality_access_view')['Clinical :: Hospitalization Report'] != "NO") {
				$sub_menu_access['admin_hospitalization report']['view'] = 1;
			}    

			if (isset(session()->get('array_menu_functionality_access_view')['care team :: care manger client']) && session()->get('array_menu_functionality_access_view')['care team :: care manger client'] != "NO") {
				$sub_menu_access['admin_care manger client_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['care team :: client visit report']) && session()->get('array_menu_functionality_access_view')['care team :: client visit report'] != "NO") {
				$sub_menu_access['admin_client visit report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['caregiver :: shift']) && session()->get('array_menu_functionality_access_view')['caregiver :: shift'] != "NO") {
				$sub_menu_access['admin_shift report']['view'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_view')['care team :: appointment visit report']) && session()->get('array_menu_functionality_access_view')['care team :: appointment visit report'] != "NO") {
				$sub_menu_access['appointment_visit_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['admission :: suspension report']) && session()->get('array_menu_functionality_access_view')['admission :: suspension report'] != "NO") {
				$sub_menu_access['admin_suspension_report']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['admission :: leave record report']) && session()->get('array_menu_functionality_access_view')['admission :: leave record report'] != "NO") {
				$sub_menu_access['admin_leave_record_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['admission :: discharge reason']) && session()->get('array_menu_functionality_access_view')['admission :: discharge reason'] != "NO") {
				$sub_menu_access['discharge_reason']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['admission :: suspension']) && session()->get('array_menu_functionality_access_view')['admission :: suspension'] != "NO") {
				$sub_menu_access['suspension_reason']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['administrator :: sms']) && session()->get('array_menu_functionality_access_view')['administrator :: sms'] != "NO") {
				$sub_menu_access['sms_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['referral :: notes due']) && session()->get('array_menu_functionality_access_view')['referral :: notes due'] != "NO") {
				$sub_menu_access['referral_notes_report']['view'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_view')['referral :: transfer']) && session()->get('array_menu_functionality_access_view')['referral :: transfer'] != "NO") {
				$sub_menu_access['referral_transfer']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['referral :: source']) && session()->get('array_menu_functionality_access_view')['referral :: source'] != "NO") {
				$sub_menu_access['referral_source']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['referral :: referred by']) && session()->get('array_menu_functionality_access_view')['referral :: source'] != "NO") {
				$sub_menu_access['referral_referred_by']['view'] = 1;
			}


			if (isset(session()->get('array_menu_functionality_access_view')['caregiver:: caregiver hired date']) && session()->get('array_menu_functionality_access_view')['caregiver:: caregiver hired date'] != "NO") {
				$sub_menu_access['caregiver_hired_date']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['referral :: referred to']) && session()->get('array_menu_functionality_access_view')['referral :: referred to'] != "NO") {
				$sub_menu_access['referral_referred_to']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['care team :: care manger client details']) && session()->get('array_menu_functionality_access_view')['care team :: care manger client details'] != "NO") {
				$sub_menu_access['careteam_client_details']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['care team :: assessment missing']) && session()->get('array_menu_functionality_access_view')['care team :: assessment missing'] != "NO") {
				$sub_menu_access['careteam_assessment_missing']['view'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_view')['care team :: missing appointment report']) && session()->get('array_menu_functionality_access_view')['care team :: missing appointment report'] != "NO") {
				$sub_menu_access['careteam_appointment_missing']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['care team :: attendance']) && session()->get('array_menu_functionality_access_view')['care team :: attendance'] != "NO") {
				$sub_menu_access['careteam_attendance']['view'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_view')['compliance :: background check expiration']) && session()->get('array_menu_functionality_access_view')['compliance :: background check expiration'] != "NO") {
				$sub_menu_access['background_check_report']['view'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_view')['compliance :: other details expiration']) && session()->get('array_menu_functionality_access_view')['compliance :: other details expiration'] != "NO") {
				$sub_menu_access['other_details_report']['view'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_view')['Caregiver :: Care Note Signature Missing']) && session()->get('array_menu_functionality_access_view')['Caregiver :: Care Note Signature Missing'] != "NO") {
				$sub_menu_access['cn_signature_missing']['view'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_view')['caregiver :: care log signature report']) && session()->get('array_menu_functionality_access_view')['caregiver :: care log signature report'] != "NO") {
				$sub_menu_access['cn_missing_signature']['view'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_view')['referral :: admitted']) && session()->get('array_menu_functionality_access_view')['referral :: admitted'] != "NO") {
				$sub_menu_access['referral_admitted']['view'] = 1;
			}

				//Edit

				if (isset(session()->get('array_menu_functionality_access_edit')['admission :: admission report']) && session()->get('array_menu_functionality_access_edit')['admission :: admission report'] != "NO") {
				$sub_menu_access['admin_admission_reports']['edit'] = 1;
			}

			/*if (isset(session()->get('array_menu_functionality_access_edit')['admission :: admission clinical profile missing']) && session()->get('array_menu_functionality_access_edit')['admission :: admission clinical profile missing'] != "NO") {
				$sub_menu_access['clinical_profile_missing']['edit'] = 1;
			}*/

			/*if (isset(session()->get('array_menu_functionality_access_edit')['admission :: admission missing notes']) && session()->get('array_menu_functionality_access_edit')['admission :: admission missing notes'] != "NO") {
				$sub_menu_access['admission_missing_notes']['edit'] = 1;
			}*/

			if (isset(session()->get('array_menu_functionality_access_edit')['admission :: discharge']) && session()->get('array_menu_functionality_access_edit')['admission :: discharge'] != "NO") {
				$sub_menu_access['admission_discharge']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['admission :: level of care']) && session()->get('array_menu_functionality_access_edit')['admission :: level of care'] != "NO") {
				$sub_menu_access['admission_level_of_care']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: client address labels']) && session()->get('array_menu_functionality_access_edit')['administrator :: client address labels'] != "NO") {
				$sub_menu_access['administrator_cli_address_labels']['edit'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: anniversary']) && session()->get('array_menu_functionality_access_edit')['administrator :: anniversary'] != "NO") {
				$sub_menu_access['admin_administrator_reports']['edit'] = 1;
			}	
			 
			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: birthday']) && session()->get('array_menu_functionality_access_edit')['administrator :: birthday'] != "NO") {
				$sub_menu_access['administrator_birthday']['edit'] = 1;
			}	        
			 
			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: caregiver birthday']) && session()->get('array_menu_functionality_access_edit')['administrator :: caregiver birthday'] != "NO") {
				$sub_menu_access['administrator_caregiverbirthday']['edit'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: emergency contact']) && session()->get('array_menu_functionality_access_edit')['administrator :: emergency contact'] != "NO") {
				$sub_menu_access['administrator_emergency_contact']['edit'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: physician reports']) && session()->get('array_menu_functionality_access_edit')['administrator :: physician reports'] != "NO") {
				$sub_menu_access['administrator_physician_reports']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: physician summary reports']) && session()->get('array_menu_functionality_access_edit')['administrator :: physician summary reports'] != "NO") {
				$sub_menu_access['administrator_physician_summary_reports']['edit'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: progress notes']) && session()->get('array_menu_functionality_access_edit')['administrator :: progress notes'] != "NO") {
				$sub_menu_access['administrator_progress_notes']['edit'] = 1;
			}		 

			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: document expiration report']) && session()->get('array_menu_functionality_access_edit')['administrator :: document expiration report'] != "NO") {
				$sub_menu_access['administrator_doc_exp_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['billing :: active eligibility']) && session()->get('array_menu_functionality_access_edit')['billing :: active eligibility'] != "NO") {
				$sub_menu_access['admin_billing_reports']['edit'] = 1;
			}    

			/*if (isset(session()->get('array_menu_functionality_access_edit')['billing :: census data']) && session()->get('array_menu_functionality_access_edit')['billing :: census data'] != "NO") {
				$sub_menu_access['billing_census_data']['edit'] = 1;
			}*/           

			/*if (isset(session()->get('array_menu_functionality_access_edit')['billing :: census retro']) && session()->get('array_menu_functionality_access_edit')['billing :: census retro'] != "NO") {
				$sub_menu_access['billing_census_retro']['edit'] = 1;
			} */

			if (isset(session()->get('array_menu_functionality_access_edit')['caregiver :: payment']) && session()->get('array_menu_functionality_access_edit')['caregiver :: payment'] != "NO") {
				$sub_menu_access['billing_caregiver_payment']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['caregiver :: paper cn not received']) && session()->get('array_menu_functionality_access_edit')['caregiver :: paper cn not received'] != "NO") {
				$sub_menu_access['billing_cn_not_received']['edit'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_edit')['billing :: client billing']) && session()->get('array_menu_functionality_access_edit')['billing :: client billing'] != "NO") {
				$sub_menu_access['billing_client_billing']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['caregiver :: payment ytd']) && session()->get('array_menu_functionality_access_edit')['caregiver :: payment ytd'] != "NO") {
				$sub_menu_access['billing_caregiver_ytd']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['billing :: eligibility expiration']) && session()->get('array_menu_functionality_access_edit')['billing :: eligibility expiration'] != "NO") {
				$sub_menu_access['billing_eligibility_exp']['edit'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_edit')['billing :: payer missing for approved']) && session()->get('array_menu_functionality_access_edit')['billing :: payer missing for approved'] != "NO") {
				$sub_menu_access['billing_missing_payer_approved']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['billing :: pending authorization']) && session()->get('array_menu_functionality_access_edit')['billing :: pending authorization'] != "NO") {
				$sub_menu_access['billing_pending_auth']['edit'] = 1;
			} 

			/*if (isset(session()->get('array_menu_functionality_access_edit')['billing :: stipend payment record']) && session()->get('array_menu_functionality_access_edit')['billing :: stipend payment record'] != "NO") {
				$sub_menu_access['billing_stipend_payment']['edit'] = 1;
			} */

			if (isset(session()->get('array_menu_functionality_access_edit')['care team ::  payment report']) && session()->get('array_menu_functionality_access_edit')['care team ::  payment report'] != "NO") {
				$sub_menu_access['billing_careteam_payment_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: allergy report']) && session()->get('array_menu_functionality_access_edit')['clinical :: allergy report'] != "NO") {
				$sub_menu_access['admin_clinical_reports']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: assessment report']) && session()->get('array_menu_functionality_access_edit')['clinical :: assessment report'] != "NO") {
				$sub_menu_access['clinical_assessment_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: behavior report']) && session()->get('array_menu_functionality_access_edit')['clinical :: behavior report'] != "NO") {
				$sub_menu_access['clinical_behavior_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: care plan – compliance']) && session()->get('array_menu_functionality_access_edit')['clinical :: care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_careplan_compliance']['edit'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: care plan - due']) && session()->get('array_menu_functionality_access_edit')['clinical :: care plan - due'] != "NO") {
				$sub_menu_access['clinical_careplan_due']['edit'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: checklist care plan – compliance']) && session()->get('array_menu_functionality_access_edit')['clinical :: checklist care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_checklist_compliance']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: checklist care plan - due']) && session()->get('array_menu_functionality_access_edit')['clinical :: checklist care plan - due'] != "NO") {
				$sub_menu_access['clinical_checklist_due']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: fall risk assessment']) && session()->get('array_menu_functionality_access_edit')['clinical :: fall risk assessment'] != "NO") {
				$sub_menu_access['clinical_fallrisk_Assessment']['edit'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: h&p expiration']) && session()->get('array_menu_functionality_access_edit')['clinical :: h&p expiration'] != "NO") {
				$sub_menu_access['clinical_HnP_expiration']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: hospitalization outcome']) && session()->get('array_menu_functionality_access_edit')['clinical :: hospitalization outcome'] != "NO") {
				$sub_menu_access['clinical_Hospitalization_outcome']['edit'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: immunization expiration']) && session()->get('array_menu_functionality_access_edit')['clinical :: immunization expiration'] != "NO") {
				$sub_menu_access['clinical_immunization_exp']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: incident report']) && session()->get('array_menu_functionality_access_edit')['clinical :: incident report'] != "NO") {
				$sub_menu_access['clinical_incident_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: medication outcome']) && session()->get('array_menu_functionality_access_edit')['clinical :: medication outcome'] != "NO") {
				$sub_menu_access['clinical_medication_outcome']['edit'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: post hospitalization missing notes']) && session()->get('array_menu_functionality_access_edit')['clinical :: post hospitalization missing notes'] != "NO") {
				$sub_menu_access['clinical_hosp_missing_notes']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: special care']) && session()->get('array_menu_functionality_access_edit')['clinical :: special care'] != "NO") {
				$sub_menu_access['clinical_special_care']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: top 10 icd code']) && session()->get('array_menu_functionality_access_edit')['clinical :: top 10 icd code'] != "NO") {
				$sub_menu_access['clinical_top_11_icd']['edit'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: vitals alert']) && session()->get('array_menu_functionality_access_edit')['clinical :: vitals alert'] != "NO") {
				$sub_menu_access['clinical_vital_alert']['edit'] = 1;
			}             


			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: wandering risk']) && session()->get('array_menu_functionality_access_edit')['clinical :: wandering risk'] != "NO") {
				$sub_menu_access['clinical_wandering_risk']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['clinical :: weight alert report']) && session()->get('array_menu_functionality_access_edit')['clinical :: weight alert report'] != "NO") {
				$sub_menu_access['clinical_weight_alert']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: analytical report']) && session()->get('array_menu_functionality_access_edit')['compliance :: analytical report'] != "NO") {
				$sub_menu_access['compliance_analytical_report']['edit'] = 1;
			}              

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: assessments due']) && session()->get('array_menu_functionality_access_edit')['compliance :: assessments due'] != "NO") {
				$sub_menu_access['compliance_assessment_due']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: custom assessments due']) && session()->get('array_menu_functionality_access_edit')['compliance :: custom assessments due'] != "NO") {
				$sub_menu_access['compliance_custom_assessment_due']['edit'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: assessment – signature missing']) && session()->get('array_menu_functionality_access_edit')['compliance :: assessment – signature missing'] != "NO") {
				$sub_menu_access['compliance_sign_missing']['edit'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: employee certification expiration']) && session()->get('array_menu_functionality_access_edit')['compliance :: employee certification expiration'] != "NO") {
				$sub_menu_access['compliance_emp_cert_exp']['edit'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: employee license expiration']) && session()->get('array_menu_functionality_access_edit')['compliance :: employee license expiration'] != "NO") {
				$sub_menu_access['compliance_emp_license_exp']['edit'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: facility expiration']) && session()->get('array_menu_functionality_access_edit')['compliance :: facility expiration'] != "NO") {
				$sub_menu_access['compliance_facility_exp']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: operational reports']) && session()->get('array_menu_functionality_access_edit')['compliance :: operational reports'] != "NO") {
				$sub_menu_access['compliance_operational_report']['edit'] = 1;
			}            

			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: patient chart']) && session()->get('array_menu_functionality_access_edit')['compliance :: patient chart'] != "NO") {
				$sub_menu_access['compliance_patient_chart']['edit'] = 1;
			} 

			/*if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: audit log']) && session()->get('array_menu_functionality_access_edit')['compliance :: audit log'] != "NO") {
				$sub_menu_access['compliance_audit_log']['edit'] = 1;
			}*/ 		 

			if (isset(session()->get('array_menu_functionality_access_edit')['caregiver :: missing care log']) && session()->get('array_menu_functionality_access_edit')['caregiver :: missing care log'] != "NO") {
				$sub_menu_access['admin_caregiver missing care note report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['care team :: followup notes report']) && session()->get('array_menu_functionality_access_edit')['care team :: followup notes report'] != "NO") {
				$sub_menu_access['admin_followup notes report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['Clinical :: Hospitalization Report']) && session()->get('array_menu_functionality_access_edit')['Clinical :: Hospitalization Report'] != "NO") {
				$sub_menu_access['admin_hospitalization report']['edit'] = 1;
			}    

			if (isset(session()->get('array_menu_functionality_access_edit')['care team :: care manger client']) && session()->get('array_menu_functionality_access_edit')['care team :: care manger client'] != "NO") {
				$sub_menu_access['admin_care manger client_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['care team :: client visit report']) && session()->get('array_menu_functionality_access_edit')['care team :: client visit report'] != "NO") {
				$sub_menu_access['admin_client visit report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['caregiver :: shift']) && session()->get('array_menu_functionality_access_edit')['caregiver :: shift'] != "NO") {
				$sub_menu_access['admin_shift report']['edit'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_edit')['care team :: appointment visit report']) && session()->get('array_menu_functionality_access_edit')['care team :: appointment visit report'] != "NO") {
				$sub_menu_access['appointment_visit_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['admission :: suspension report']) && session()->get('array_menu_functionality_access_edit')['admission :: suspension report'] != "NO") {
				$sub_menu_access['admin_suspension_report']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['admission :: leave record report']) && session()->get('array_menu_functionality_access_edit')['admission :: leave record report'] != "NO") {
				$sub_menu_access['admin_leave_record_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['admission :: discharge reason']) && session()->get('array_menu_functionality_access_edit')['admission :: discharge reason'] != "NO") {
				$sub_menu_access['discharge_reason']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['admission :: suspension reason']) && session()->get('array_menu_functionality_access_edit')['admission :: suspension reason'] != "NO") {
				$sub_menu_access['suspension_reason']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['administrator :: sms']) && session()->get('array_menu_functionality_access_edit')['administrator :: sms'] != "NO") {
				$sub_menu_access['sms_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['referral :: notes due']) && session()->get('array_menu_functionality_access_edit')['referral :: notes due'] != "NO") {
				$sub_menu_access['referral_notes_report']['edit'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_edit')['referral :: transfer']) && session()->get('array_menu_functionality_access_edit')['referral :: transfer'] != "NO") {
				$sub_menu_access['referral_transfer']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['referral :: source']) && session()->get('array_menu_functionality_access_edit')['referral :: source'] != "NO") {
				$sub_menu_access['referral_source']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['referral :: referred by']) && session()->get('array_menu_functionality_access_edit')['referral :: source'] != "NO") {
				$sub_menu_access['referral_referred_by']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['caregiver:: caregiver hired date']) && session()->get('array_menu_functionality_access_edit')['caregiver:: caregiver hired date'] != "NO") {
				$sub_menu_access['caregiver_hired_date']['edit'] = 1;
			}  
			if (isset(session()->get('array_menu_functionality_access_edit')['referral :: referred to']) && session()->get('array_menu_functionality_access_edit')['referral :: referred to'] != "NO") {
				$sub_menu_access['referral_referred_to']['edit'] = 1;
			}    
			if (isset(session()->get('array_menu_functionality_access_edit')['care team :: care manger client details']) && session()->get('array_menu_functionality_access_edit')['care team :: care manger client details'] != "NO") {
				$sub_menu_access['careteam_client_details']['edit'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_edit')['care team :: assessment missing']) && session()->get('array_menu_functionality_access_edit')['care team :: assessment missing'] != "NO") {
				$sub_menu_access['careteam_assessment_missing']['edit'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_edit')['care team :: missing appointment report']) && session()->get('array_menu_functionality_access_edit')['care team :: missing appointment report'] != "NO") {
				$sub_menu_access['careteam_appointment_missing']['edit'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_edit')['care team :: attendance']) && session()->get('array_menu_functionality_access_edit')['care team :: attendance'] != "NO") {
				$sub_menu_access['careteam_attendance']['edit'] = 1;
			}    
			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: background check expiration']) && session()->get('array_menu_functionality_access_edit')['compliance :: background check expiration'] != "NO") {
				$sub_menu_access['background_check_report']['edit'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_edit')['compliance :: other details expiration']) && session()->get('array_menu_functionality_access_edit')['compliance :: other details expiration'] != "NO") {
				$sub_menu_access['other_details_report']['edit'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_edit')['Caregiver :: Care Note Signature Missing']) && session()->get('array_menu_functionality_access_edit')['Caregiver :: Care Note Signature Missing'] != "NO") {
				$sub_menu_access['cn_signature_missing']['edit'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_edit')['caregiver :: care log signature report']) && session()->get('array_menu_functionality_access_edit')['caregiver :: care log signature report'] != "NO") {
				$sub_menu_access['cn_missing_signature']['edit'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_edit')['referral :: admitted']) && session()->get('array_menu_functionality_access_edit')['referral :: admitted'] != "NO") {
				$sub_menu_access['referral_admitted']['edit'] = 1;
			}
				//Delete

				

			if (isset(session()->get('array_menu_functionality_access_delete')['admission :: admission report']) && session()->get('array_menu_functionality_access_delete')['admission :: admission report'] != "NO") {
				$sub_menu_access['admin_admission_reports']['delete'] = 1;
			}

			/*if (isset(session()->get('array_menu_functionality_access_delete')['admission :: admission clinical profile missing']) && session()->get('array_menu_functionality_access_delete')['admission :: admission clinical profile missing'] != "NO") {
				$sub_menu_access['clinical_profile_missing']['delete'] = 1;
			}*/

			/*if (isset(session()->get('array_menu_functionality_access_delete')['admission :: admission missing notes']) && session()->get('array_menu_functionality_access_delete')['admission :: admission missing notes'] != "NO") {
				$sub_menu_access['admission_missing_notes']['delete'] = 1;
			}*/

			if (isset(session()->get('array_menu_functionality_access_delete')['admission :: discharge']) && session()->get('array_menu_functionality_access_delete')['admission :: discharge'] != "NO") {
				$sub_menu_access['admission_discharge']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['admission :: level of care']) && session()->get('array_menu_functionality_access_delete')['admission :: level of care'] != "NO") {
				$sub_menu_access['admission_level_of_care']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: client address labels']) && session()->get('array_menu_functionality_access_delete')['administrator :: client address labels'] != "NO") {
				$sub_menu_access['administrator_cli_address_labels']['delete'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: anniversary']) && session()->get('array_menu_functionality_access_delete')['administrator :: anniversary'] != "NO") {
				$sub_menu_access['admin_administrator_reports']['delete'] = 1;
			}	
			 
			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: birthday']) && session()->get('array_menu_functionality_access_delete')['administrator :: birthday'] != "NO") {
				$sub_menu_access['administrator_birthday']['delete'] = 1;
			}	        
			 
			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: caregiver birthday']) && session()->get('array_menu_functionality_access_delete')['administrator :: caregiver birthday'] != "NO") {
				$sub_menu_access['administrator_caregiverbirthday']['delete'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: emergency contact']) && session()->get('array_menu_functionality_access_delete')['administrator :: emergency contact'] != "NO") {
				$sub_menu_access['administrator_emergency_contact']['delete'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: physician reports']) && session()->get('array_menu_functionality_access_delete')['administrator :: physician reports'] != "NO") {
				$sub_menu_access['administrator_physician_reports']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: physician summary reports']) && session()->get('array_menu_functionality_access_delete')['administrator :: physician summary reports'] != "NO") {
				$sub_menu_access['administrator_physician_summary_reports']['delete'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: progress notes']) && session()->get('array_menu_functionality_access_delete')['administrator :: progress notes'] != "NO") {
				$sub_menu_access['administrator_progress_notes']['delete'] = 1;
			}		 

			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: document expiration report']) && session()->get('array_menu_functionality_access_delete')['administrator :: document expiration report'] != "NO") {
				$sub_menu_access['administrator_doc_exp_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['billing :: active eligibility']) && session()->get('array_menu_functionality_access_delete')['billing :: active eligibility'] != "NO") {
				$sub_menu_access['admin_billing_reports']['delete'] = 1;
			}    

			/*if (isset(session()->get('array_menu_functionality_access_delete')['billing :: census data']) && session()->get('array_menu_functionality_access_delete')['billing :: census data'] != "NO") {
				$sub_menu_access['billing_census_data']['delete'] = 1;
			} */          

			/*if (isset(session()->get('array_menu_functionality_access_delete')['billing :: census retro']) && session()->get('array_menu_functionality_access_delete')['billing :: census retro'] != "NO") {
				$sub_menu_access['billing_census_retro']['delete'] = 1;
			} */

			if (isset(session()->get('array_menu_functionality_access_delete')['caregiver :: payment']) && session()->get('array_menu_functionality_access_delete')['caregiver :: payment'] != "NO") {
				$sub_menu_access['billing_caregiver_payment']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['caregiver :: paper cn not received']) && session()->get('array_menu_functionality_access_delete')['caregiver :: paper cn not received'] != "NO") {
				$sub_menu_access['billing_cn_not_received']['delete'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_delete')['billing :: client billing']) && session()->get('array_menu_functionality_access_delete')['billing :: client billing'] != "NO") {
				$sub_menu_access['billing_client_billing']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['caregiver :: payment ytd']) && session()->get('array_menu_functionality_access_delete')['caregiver :: payment ytd'] != "NO") {
				$sub_menu_access['billing_caregiver_ytd']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['billing :: eligibility expiration']) && session()->get('array_menu_functionality_access_delete')['billing :: eligibility expiration'] != "NO") {
				$sub_menu_access['billing_eligibility_exp']['delete'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_delete')['billing :: payer missing for approved']) && session()->get('array_menu_functionality_access_delete')['billing :: payer missing for approved'] != "NO") {
				$sub_menu_access['billing_missing_payer_approved']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['billing :: pending authorization']) && session()->get('array_menu_functionality_access_delete')['billing :: pending authorization'] != "NO") {
				$sub_menu_access['billing_pending_auth']['delete'] = 1;
			} 

			/*if (isset(session()->get('array_menu_functionality_access_delete')['billing :: stipend payment record']) && session()->get('array_menu_functionality_access_delete')['billing :: stipend payment record'] != "NO") {
				$sub_menu_access['billing_stipend_payment']['delete'] = 1;
			}*/ 

			if (isset(session()->get('array_menu_functionality_access_delete')['care team ::  payment report']) && session()->get('array_menu_functionality_access_delete')['care team ::  payment report'] != "NO") {
				$sub_menu_access['billing_careteam_payment_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: allergy report']) && session()->get('array_menu_functionality_access_delete')['clinical :: allergy report'] != "NO") {
				$sub_menu_access['admin_clinical_reports']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: assessment report']) && session()->get('array_menu_functionality_access_delete')['clinical :: assessment report'] != "NO") {
				$sub_menu_access['clinical_assessment_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: behavior report']) && session()->get('array_menu_functionality_access_delete')['clinical :: behavior report'] != "NO") {
				$sub_menu_access['clinical_behavior_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: care plan – compliance']) && session()->get('array_menu_functionality_access_delete')['clinical :: care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_careplan_compliance']['delete'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: care plan - due']) && session()->get('array_menu_functionality_access_delete')['clinical :: care plan - due'] != "NO") {
				$sub_menu_access['clinical_careplan_due']['delete'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: checklist care plan – compliance']) && session()->get('array_menu_functionality_access_delete')['clinical :: checklist care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_checklist_compliance']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: checklist care plan - due']) && session()->get('array_menu_functionality_access_delete')['clinical :: checklist care plan - due'] != "NO") {
				$sub_menu_access['clinical_checklist_due']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: fall risk assessment']) && session()->get('array_menu_functionality_access_delete')['clinical :: fall risk assessment'] != "NO") {
				$sub_menu_access['clinical_fallrisk_Assessment']['delete'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: h&p expiration']) && session()->get('array_menu_functionality_access_delete')['clinical :: h&p expiration'] != "NO") {
				$sub_menu_access['clinical_HnP_expiration']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: hospitalization outcome']) && session()->get('array_menu_functionality_access_delete')['clinical :: hospitalization outcome'] != "NO") {
				$sub_menu_access['clinical_Hospitalization_outcome']['delete'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: immunization expiration']) && session()->get('array_menu_functionality_access_delete')['clinical :: immunization expiration'] != "NO") {
				$sub_menu_access['clinical_immunization_exp']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: incident report']) && session()->get('array_menu_functionality_access_delete')['clinical :: incident report'] != "NO") {
				$sub_menu_access['clinical_incident_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: medication outcome']) && session()->get('array_menu_functionality_access_delete')['clinical :: medication outcome'] != "NO") {
				$sub_menu_access['clinical_medication_outcome']['delete'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: post hospitalization missing notes']) && session()->get('array_menu_functionality_access_delete')['clinical :: post hospitalization missing notes'] != "NO") {
				$sub_menu_access['clinical_hosp_missing_notes']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: special care']) && session()->get('array_menu_functionality_access_delete')['clinical :: special care'] != "NO") {
				$sub_menu_access['clinical_special_care']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: top 10 icd code']) && session()->get('array_menu_functionality_access_delete')['clinical :: top 10 icd code'] != "NO") {
				$sub_menu_access['clinical_top_11_icd']['delete'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: vitals alert']) && session()->get('array_menu_functionality_access_delete')['clinical :: vitals alert'] != "NO") {
				$sub_menu_access['clinical_vital_alert']['delete'] = 1;
			}             


			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: wandering risk']) && session()->get('array_menu_functionality_access_delete')['clinical :: wandering risk'] != "NO") {
				$sub_menu_access['clinical_wandering_risk']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['clinical :: weight alert report']) && session()->get('array_menu_functionality_access_delete')['clinical :: weight alert report'] != "NO") {
				$sub_menu_access['clinical_weight_alert']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: analytical report']) && session()->get('array_menu_functionality_access_delete')['compliance :: analytical report'] != "NO") {
				$sub_menu_access['compliance_analytical_report']['delete'] = 1;
			}              

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: assessments due']) && session()->get('array_menu_functionality_access_delete')['compliance :: assessments due'] != "NO") {
				$sub_menu_access['compliance_assessment_due']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: custom assessments due']) && session()->get('array_menu_functionality_access_delete')['compliance :: custom assessments due'] != "NO") {
				$sub_menu_access['compliance_custom_assessment_due']['delete'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: assessment – signature missing']) && session()->get('array_menu_functionality_access_delete')['compliance :: assessment – signature missing'] != "NO") {
				$sub_menu_access['compliance_sign_missing']['delete'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: employee certification expiration']) && session()->get('array_menu_functionality_access_delete')['compliance :: employee certification expiration'] != "NO") {
				$sub_menu_access['compliance_emp_cert_exp']['delete'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: employee license expiration']) && session()->get('array_menu_functionality_access_delete')['compliance :: employee license expiration'] != "NO") {
				$sub_menu_access['compliance_emp_license_exp']['delete'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: facility expiration']) && session()->get('array_menu_functionality_access_delete')['compliance :: facility expiration'] != "NO") {
				$sub_menu_access['compliance_facility_exp']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: operational reports']) && session()->get('array_menu_functionality_access_delete')['compliance :: operational reports'] != "NO") {
				$sub_menu_access['compliance_operational_report']['delete'] = 1;
			}            

			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: patient chart']) && session()->get('array_menu_functionality_access_delete')['compliance :: patient chart'] != "NO") {
				$sub_menu_access['compliance_patient_chart']['delete'] = 1;
			} 

			/*if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: audit log']) && session()->get('array_menu_functionality_access_delete')['compliance :: audit log'] != "NO") {
				$sub_menu_access['compliance_audit_log']['delete'] = 1;
			} */		 

			if (isset(session()->get('array_menu_functionality_access_delete')['caregiver :: missing care log']) && session()->get('array_menu_functionality_access_delete')['caregiver :: missing care log'] != "NO") {
				$sub_menu_access['admin_caregiver missing care note report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: followup notes report']) && session()->get('array_menu_functionality_access_delete')['care team :: followup notes report'] != "NO") {
				$sub_menu_access['admin_followup notes report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['Clinical :: Hospitalization Report']) && session()->get('array_menu_functionality_access_delete')['Clinical :: Hospitalization Report'] != "NO") {
				$sub_menu_access['admin_hospitalization report']['delete'] = 1;
			}    

			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: care manger client']) && session()->get('array_menu_functionality_access_delete')['care team :: care manger client'] != "NO") {
				$sub_menu_access['admin_care manger client_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: client visit report']) && session()->get('array_menu_functionality_access_delete')['care team :: client visit report'] != "NO") {
				$sub_menu_access['admin_client visit report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['caregiver :: shift']) && session()->get('array_menu_functionality_access_delete')['caregiver :: shift'] != "NO") {
				$sub_menu_access['admin_shift report']['delete'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: appointment visit report']) && session()->get('array_menu_functionality_access_delete')['care team :: appointment visit report'] != "NO") {
				$sub_menu_access['appointment_visit_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['admission :: suspension report']) && session()->get('array_menu_functionality_access_delete')['admission :: suspension report'] != "NO") {
				$sub_menu_access['admin_suspension_report']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['admission :: leave record report']) && session()->get('array_menu_functionality_access_delete')['admission :: leave record report'] != "NO") {
				$sub_menu_access['admin_leave_record_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['admission :: discharge reason']) && session()->get('array_menu_functionality_access_delete')['admission :: discharge reason'] != "NO") {
				$sub_menu_access['discharge_reason']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['admission :: suspension']) && session()->get('array_menu_functionality_access_delete')['admission :: suspension'] != "NO") {
				$sub_menu_access['suspension_reason']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['administrator :: sms']) && session()->get('array_menu_functionality_access_delete')['administrator :: sms'] != "NO") {
				$sub_menu_access['sms_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['referral :: notes due']) && session()->get('array_menu_functionality_access_delete')['referral :: notes due'] != "NO") {
				$sub_menu_access['referral_notes_report']['delete'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_delete')['referral :: transfer']) && session()->get('array_menu_functionality_access_delete')['referral :: transfer'] != "NO") {
				$sub_menu_access['referral_transfer']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['referral :: source']) && session()->get('array_menu_functionality_access_delete')['referral :: source'] != "NO") {
				$sub_menu_access['referral_source']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['referral :: referred by']) && session()->get('array_menu_functionality_access_delete')['referral :: source'] != "NO") {
				$sub_menu_access['referral_referred_by']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['caregiver:: caregiver hired date']) && session()->get('array_menu_functionality_access_delete')['caregiver:: caregiver hired date'] != "NO") {
				$sub_menu_access['caregiver_hired_date']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['referral :: referred to']) && session()->get('array_menu_functionality_access_delete')['referral :: referred to'] != "NO") {
				$sub_menu_access['referral_referred_to']['delete'] = 1;
			}     
			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: care manger client details']) && session()->get('array_menu_functionality_access_delete')['care team :: care manger client details'] != "NO") {
				$sub_menu_access['careteam_client_details']['delete'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: assessment missing']) && session()->get('array_menu_functionality_access_delete')['care team :: assessment missing'] != "NO") {
				$sub_menu_access['careteam_assessment_missing']['delete'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: missing appointment report']) && session()->get('array_menu_functionality_access_delete')['care team :: missing appointment report'] != "NO") {
				$sub_menu_access['careteam_appointment_missing']['delete'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: attendance']) && session()->get('array_menu_functionality_access_delete')['care team :: attendance'] != "NO") {
				$sub_menu_access['careteam_attendance']['delete'] = 1;
			}  
			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: background check expiration']) && session()->get('array_menu_functionality_access_delete')['compliance :: background check expiration'] != "NO") {
				$sub_menu_access['background_check_report']['delete'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_delete')['compliance :: other details expiration']) && session()->get('array_menu_functionality_access_delete')['compliance :: other details expiration'] != "NO") {
				$sub_menu_access['other_details_report']['delete'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_delete')['Caregiver :: Care Note Signature Missing']) && session()->get('array_menu_functionality_access_delete')['Caregiver :: Care Note Signature Missing'] != "NO") {
				$sub_menu_access['cn_signature_missing']['delete'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_delete')['caregiver :: care log signature report']) && session()->get('array_menu_functionality_access_delete')['caregiver :: care log signature report'] != "NO") {
				$sub_menu_access['cn_missing_signature']['delete'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_delete')['referral :: admitted']) && session()->get('array_menu_functionality_access_delete')['referral :: admitted'] != "NO") {
				$sub_menu_access['referral_admitted']['delete'] = 1;
			}     
				//Print


			if (isset(session()->get('array_menu_functionality_access_print')['admission :: admission report']) && session()->get('array_menu_functionality_access_print')['admission :: admission report'] != "NO") {
				$sub_menu_access['admin_admission_reports']['print'] = 1;
			}

			/*if (isset(session()->get('array_menu_functionality_access_print')['admission :: admission clinical profile missing']) && session()->get('array_menu_functionality_access_print')['admission :: admission clinical profile missing'] != "NO") {
				$sub_menu_access['clinical_profile_missing']['print'] = 1;
			}*/

			/*if (isset(session()->get('array_menu_functionality_access_print')['admission :: admission missing notes']) && session()->get('array_menu_functionality_access_print')['admission :: admission missing notes'] != "NO") {
				$sub_menu_access['admission_missing_notes']['print'] = 1;
			}*/

			if (isset(session()->get('array_menu_functionality_access_print')['admission :: discharge']) && session()->get('array_menu_functionality_access_print')['admission :: discharge'] != "NO") {
				$sub_menu_access['admission_discharge']['print'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_print')['admission :: level of care']) && session()->get('array_menu_functionality_access_print')['admission :: level of care'] != "NO") {
				$sub_menu_access['admission_level_of_care']['print'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: client address labels']) && session()->get('array_menu_functionality_access_print')['administrator :: client address labels'] != "NO") {
				$sub_menu_access['administrator_cli_address_labels']['print'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: anniversary']) && session()->get('array_menu_functionality_access_print')['administrator :: anniversary'] != "NO") {
				$sub_menu_access['admin_administrator_reports']['print'] = 1;
			}	
			 
			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: birthday']) && session()->get('array_menu_functionality_access_print')['administrator :: birthday'] != "NO") {
				$sub_menu_access['administrator_birthday']['print'] = 1;
			}	        
			 
			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: caregiver birthday']) && session()->get('array_menu_functionality_access_print')['administrator :: caregiver birthday'] != "NO") {
				$sub_menu_access['administrator_caregiverbirthday']['print'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: emergency contact']) && session()->get('array_menu_functionality_access_print')['administrator :: emergency contact'] != "NO") {
				$sub_menu_access['administrator_emergency_contact']['print'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: physician reports']) && session()->get('array_menu_functionality_access_print')['administrator :: physician reports'] != "NO") {
				$sub_menu_access['administrator_physician_reports']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: physician summary reports']) && session()->get('array_menu_functionality_access_print')['administrator :: physician summary reports'] != "NO") {
				$sub_menu_access['administrator_physician_summary_reports']['print'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: progress notes']) && session()->get('array_menu_functionality_access_print')['administrator :: progress notes'] != "NO") {
				$sub_menu_access['administrator_progress_notes']['print'] = 1;
			}		 

			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: document expiration report']) && session()->get('array_menu_functionality_access_print')['administrator :: document expiration report'] != "NO") {
				$sub_menu_access['administrator_doc_exp_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['billing :: active eligibility']) && session()->get('array_menu_functionality_access_print')['billing :: active eligibility'] != "NO") {
				$sub_menu_access['admin_billing_reports']['print'] = 1;
			}    

			/*if (isset(session()->get('array_menu_functionality_access_print')['billing :: census data']) && session()->get('array_menu_functionality_access_print')['billing :: census data'] != "NO") {
				$sub_menu_access['billing_census_data']['print'] = 1;
			} */          

			/*if (isset(session()->get('array_menu_functionality_access_print')['billing :: census retro']) && session()->get('array_menu_functionality_access_print')['billing :: census retro'] != "NO") {
				$sub_menu_access['billing_census_retro']['print'] = 1;
			} */

			if (isset(session()->get('array_menu_functionality_access_print')['caregiver :: payment']) && session()->get('array_menu_functionality_access_print')['caregiver :: payment'] != "NO") {
				$sub_menu_access['billing_caregiver_payment']['print'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_print')['caregiver :: paper cn not received']) && session()->get('array_menu_functionality_access_print')['caregiver :: paper cn not received'] != "NO") {
				$sub_menu_access['billing_cn_not_received']['print'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_print')['billing :: client billing']) && session()->get('array_menu_functionality_access_print')['billing :: client billing'] != "NO") {
				$sub_menu_access['billing_client_billing']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['caregiver :: payment ytd']) && session()->get('array_menu_functionality_access_print')['caregiver :: payment ytd'] != "NO") {
				$sub_menu_access['billing_caregiver_ytd']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['billing :: eligibility expiration']) && session()->get('array_menu_functionality_access_print')['billing :: eligibility expiration'] != "NO") {
				$sub_menu_access['billing_eligibility_exp']['print'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_print')['billing :: payer missing for approved']) && session()->get('array_menu_functionality_access_print')['billing :: payer missing for approved'] != "NO") {
				$sub_menu_access['billing_missing_payer_approved']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['billing :: pending authorization']) && session()->get('array_menu_functionality_access_print')['billing :: pending authorization'] != "NO") {
				$sub_menu_access['billing_pending_auth']['print'] = 1;
			} 

			/*if (isset(session()->get('array_menu_functionality_access_print')['billing :: stipend payment record']) && session()->get('array_menu_functionality_access_print')['billing :: stipend payment record'] != "NO") {
				$sub_menu_access['billing_stipend_payment']['print'] = 1;
			} */

			if (isset(session()->get('array_menu_functionality_access_print')['care team ::  payment report']) && session()->get('array_menu_functionality_access_print')['care team ::  payment report'] != "NO") {
				$sub_menu_access['billing_careteam_payment_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: allergy report']) && session()->get('array_menu_functionality_access_print')['clinical :: allergy report'] != "NO") {
				$sub_menu_access['admin_clinical_reports']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: assessment report']) && session()->get('array_menu_functionality_access_print')['clinical :: assessment report'] != "NO") {
				$sub_menu_access['clinical_assessment_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: behavior report']) && session()->get('array_menu_functionality_access_print')['clinical :: behavior report'] != "NO") {
				$sub_menu_access['clinical_behavior_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: care plan – compliance']) && session()->get('array_menu_functionality_access_print')['clinical :: care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_careplan_compliance']['print'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: care plan - due']) && session()->get('array_menu_functionality_access_print')['clinical :: care plan - due'] != "NO") {
				$sub_menu_access['clinical_careplan_due']['print'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: checklist care plan – compliance']) && session()->get('array_menu_functionality_access_print')['clinical :: checklist care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_checklist_compliance']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: checklist care plan - due']) && session()->get('array_menu_functionality_access_print')['clinical :: checklist care plan - due'] != "NO") {
				$sub_menu_access['clinical_checklist_due']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: fall risk assessment']) && session()->get('array_menu_functionality_access_print')['clinical :: fall risk assessment'] != "NO") {
				$sub_menu_access['clinical_fallrisk_Assessment']['print'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: h&p expiration']) && session()->get('array_menu_functionality_access_print')['clinical :: h&p expiration'] != "NO") {
				$sub_menu_access['clinical_HnP_expiration']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: hospitalization outcome']) && session()->get('array_menu_functionality_access_print')['clinical :: hospitalization outcome'] != "NO") {
				$sub_menu_access['clinical_Hospitalization_outcome']['print'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: immunization expiration']) && session()->get('array_menu_functionality_access_print')['clinical :: immunization expiration'] != "NO") {
				$sub_menu_access['clinical_immunization_exp']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: incident report']) && session()->get('array_menu_functionality_access_print')['clinical :: incident report'] != "NO") {
				$sub_menu_access['clinical_incident_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: medication outcome']) && session()->get('array_menu_functionality_access_print')['clinical :: medication outcome'] != "NO") {
				$sub_menu_access['clinical_medication_outcome']['print'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: post hospitalization missing notes']) && session()->get('array_menu_functionality_access_print')['clinical :: post hospitalization missing notes'] != "NO") {
				$sub_menu_access['clinical_hosp_missing_notes']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: special care']) && session()->get('array_menu_functionality_access_print')['clinical :: special care'] != "NO") {
				$sub_menu_access['clinical_special_care']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: top 10 icd code']) && session()->get('array_menu_functionality_access_print')['clinical :: top 10 icd code'] != "NO") {
				$sub_menu_access['clinical_top_11_icd']['print'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: vitals alert']) && session()->get('array_menu_functionality_access_print')['clinical :: vitals alert'] != "NO") {
				$sub_menu_access['clinical_vital_alert']['print'] = 1;
			}             


			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: wandering risk']) && session()->get('array_menu_functionality_access_print')['clinical :: wandering risk'] != "NO") {
				$sub_menu_access['clinical_wandering_risk']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['clinical :: weight alert report']) && session()->get('array_menu_functionality_access_print')['clinical :: weight alert report'] != "NO") {
				$sub_menu_access['clinical_weight_alert']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: analytical report']) && session()->get('array_menu_functionality_access_print')['compliance :: analytical report'] != "NO") {
				$sub_menu_access['compliance_analytical_report']['print'] = 1;
			}              

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: assessments due']) && session()->get('array_menu_functionality_access_print')['compliance :: assessments due'] != "NO") {
				$sub_menu_access['compliance_assessment_due']['print'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: custom assessments due']) && session()->get('array_menu_functionality_access_print')['compliance :: custom assessments due'] != "NO") {
				$sub_menu_access['compliance_custom_assessment_due']['print'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: assessment – signature missing']) && session()->get('array_menu_functionality_access_print')['compliance :: assessment – signature missing'] != "NO") {
				$sub_menu_access['compliance_sign_missing']['print'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: employee certification expiration']) && session()->get('array_menu_functionality_access_print')['compliance :: employee certification expiration'] != "NO") {
				$sub_menu_access['compliance_emp_cert_exp']['print'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: employee license expiration']) && session()->get('array_menu_functionality_access_print')['compliance :: employee license expiration'] != "NO") {
				$sub_menu_access['compliance_emp_license_exp']['print'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: facility expiration']) && session()->get('array_menu_functionality_access_print')['compliance :: facility expiration'] != "NO") {
				$sub_menu_access['compliance_facility_exp']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: operational reports']) && session()->get('array_menu_functionality_access_print')['compliance :: operational reports'] != "NO") {
				$sub_menu_access['compliance_operational_report']['print'] = 1;
			}            

			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: patient chart']) && session()->get('array_menu_functionality_access_print')['compliance :: patient chart'] != "NO") {
				$sub_menu_access['compliance_patient_chart']['print'] = 1;
			} 

			/*if (isset(session()->get('array_menu_functionality_access_print')['compliance :: audit log']) && session()->get('array_menu_functionality_access_print')['compliance :: audit log'] != "NO") {
				$sub_menu_access['compliance_audit_log']['print'] = 1;
			}*/ 		 

			if (isset(session()->get('array_menu_functionality_access_print')['caregiver :: missing care log']) && session()->get('array_menu_functionality_access_print')['caregiver :: missing care log'] != "NO") {
				$sub_menu_access['admin_caregiver missing care note report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['care team :: followup notes report']) && session()->get('array_menu_functionality_access_print')['care team :: followup notes report'] != "NO") {
				$sub_menu_access['admin_followup notes report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['Clinical :: Hospitalization Report']) && session()->get('array_menu_functionality_access_print')['Clinical :: Hospitalization Report'] != "NO") {
				$sub_menu_access['admin_hospitalization report']['print'] = 1;
			}    

			if (isset(session()->get('array_menu_functionality_access_print')['care team :: care manger client']) && session()->get('array_menu_functionality_access_print')['care team :: care manger client'] != "NO") {
				$sub_menu_access['admin_care manger client_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['care team :: client visit report']) && session()->get('array_menu_functionality_access_print')['care team :: client visit report'] != "NO") {
				$sub_menu_access['admin_client visit report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['caregiver :: shift']) && session()->get('array_menu_functionality_access_print')['caregiver :: shift'] != "NO") {
				$sub_menu_access['admin_shift report']['print'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_print')['care team :: appointment visit report']) && session()->get('array_menu_functionality_access_print')['care team :: appointment visit report'] != "NO") {
				$sub_menu_access['appointment_visit_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['admission :: suspension report']) && session()->get('array_menu_functionality_access_print')['admission :: suspension report'] != "NO") {
				$sub_menu_access['admin_suspension_report']['print'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_print')['admission :: leave record report']) && session()->get('array_menu_functionality_access_print')['admission :: leave record report'] != "NO") {
				$sub_menu_access['admin_leave_record_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['admission :: discharge reason']) && session()->get('array_menu_functionality_access_print')['admission :: discharge reason'] != "NO") {
				$sub_menu_access['discharge_reason']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['admission :: suspension']) && session()->get('array_menu_functionality_access_print')['admission :: suspension'] != "NO") {
				$sub_menu_access['suspension_reason']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['administrator :: sms']) && session()->get('array_menu_functionality_access_print')['administrator :: sms'] != "NO") {
				$sub_menu_access['sms_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['referral :: notes due']) && session()->get('array_menu_functionality_access_print')['referral :: notes due'] != "NO") {
				$sub_menu_access['referral_notes_report']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['referral :: transfer']) && session()->get('array_menu_functionality_access_print')['referral :: transfer'] != "NO") {
				$sub_menu_access['referral_transfer']['print'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_print')['referral :: source']) && session()->get('array_menu_functionality_access_print')['referral :: source'] != "NO") {
				$sub_menu_access['referral_source']['print'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_print')['referral :: referred by']) && session()->get('array_menu_functionality_access_print')['referral :: source'] != "NO") {
				$sub_menu_access['referral_referred_by']['print'] = 1;
			}


			if (isset(session()->get('array_menu_functionality_access_print')['caregiver:: caregiver hired date']) && session()->get('array_menu_functionality_access_print')['caregiver:: caregiver hired date'] != "NO") {
				$sub_menu_access['caregiver_hired_date']['print'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_print')['referral :: referred to']) && session()->get('array_menu_functionality_access_print')['referral :: referred to'] != "NO") {
				$sub_menu_access['referral_referred_to']['print'] = 1;
			}   
			if (isset(session()->get('array_menu_functionality_access_print')['care team :: care manger client details']) && session()->get('array_menu_functionality_access_print')['care team :: care manger client details'] != "NO") {
				$sub_menu_access['careteam_client_details']['print'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_print')['care team :: assessment missing']) && session()->get('array_menu_functionality_access_print')['care team :: assessment missing'] != "NO") {
				$sub_menu_access['careteam_assessment_missing']['print'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_print')['care team :: missing appointment report']) && session()->get('array_menu_functionality_access_print')['care team :: missing appointment report'] != "NO") {
				$sub_menu_access['careteam_appointment_missing']['print'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_print')['care team :: attendance']) && session()->get('array_menu_functionality_access_print')['care team :: attendance'] != "NO") {
				$sub_menu_access['careteam_attendance']['print'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: background check expiration']) && session()->get('array_menu_functionality_access_print')['compliance :: background check expiration'] != "NO") {
				$sub_menu_access['background_check_report']['print'] = 1;
			}  
			if (isset(session()->get('array_menu_functionality_access_print')['compliance :: other details expiration']) && session()->get('array_menu_functionality_access_print')['compliance :: other details expiration'] != "NO") {
				$sub_menu_access['other_details_report']['print'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_print')['Caregiver :: Care Note Signature Missing']) && session()->get('array_menu_functionality_access_print')['Caregiver :: Care Note Signature Missing'] != "NO") {
				$sub_menu_access['cn_signature_missing']['print'] = 1;
			}  
			if (isset(session()->get('array_menu_functionality_access_print')['caregiver :: care log signature report']) && session()->get('array_menu_functionality_access_print')['caregiver :: care log signature report'] != "NO") {
				$sub_menu_access['cn_missing_signature']['print'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_print')['referral :: admitted']) && session()->get('array_menu_functionality_access_print')['referral :: admitted'] != "NO") {
				$sub_menu_access['referral_admitted']['print'] = 1;
			}   
				//Employee

				

			if (isset(session()->get('array_menu_functionality_access_employee')['admission :: admission report']) && session()->get('array_menu_functionality_access_employee')['admission :: admission report'] != "NO") {
				$sub_menu_access['admin_admission_reports']['employee'] = 1;
			}

			/*if (isset(session()->get('array_menu_functionality_access_employee')['admission :: admission clinical profile missing']) && session()->get('array_menu_functionality_access_employee')['admission :: admission clinical profile missing'] != "NO") {
				$sub_menu_access['clinical_profile_missing']['employee'] = 1;
			}*/

			/*if (isset(session()->get('array_menu_functionality_access_employee')['admission :: admission missing notes']) && session()->get('array_menu_functionality_access_employee')['admission :: admission missing notes'] != "NO") {
				$sub_menu_access['admission_missing_notes']['employee'] = 1;
			}*/

			if (isset(session()->get('array_menu_functionality_access_employee')['admission :: discharge']) && session()->get('array_menu_functionality_access_employee')['admission :: discharge'] != "NO") {
				$sub_menu_access['admission_discharge']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['admission :: level of care']) && session()->get('array_menu_functionality_access_employee')['admission :: level of care'] != "NO") {
				$sub_menu_access['admission_level_of_care']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: client address labels']) && session()->get('array_menu_functionality_access_employee')['administrator :: client address labels'] != "NO") {
				$sub_menu_access['administrator_cli_address_labels']['employee'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: anniversary']) && session()->get('array_menu_functionality_access_employee')['administrator :: anniversary'] != "NO") {
				$sub_menu_access['admin_administrator_reports']['employee'] = 1;
			}	
			 
			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: birthday']) && session()->get('array_menu_functionality_access_employee')['administrator :: birthday'] != "NO") {
				$sub_menu_access['administrator_birthday']['employee'] = 1;
			}	        
			 
			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: caregiver birthday']) && session()->get('array_menu_functionality_access_employee')['administrator :: caregiver birthday'] != "NO") {
				$sub_menu_access['administrator_caregiverbirthday']['employee'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: emergency contact']) && session()->get('array_menu_functionality_access_employee')['administrator :: emergency contact'] != "NO") {
				$sub_menu_access['administrator_emergency_contact']['employee'] = 1;
			}		 
			 
			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: physician reports']) && session()->get('array_menu_functionality_access_employee')['administrator :: physician reports'] != "NO") {
				$sub_menu_access['administrator_physician_reports']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: physician summary reports']) && session()->get('array_menu_functionality_access_employee')['administrator :: physician summary reports'] != "NO") {
				$sub_menu_access['administrator_physician_summary_reports']['employee'] = 1;
			}	

			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: progress notes']) && session()->get('array_menu_functionality_access_employee')['administrator :: progress notes'] != "NO") {
				$sub_menu_access['administrator_progress_notes']['employee'] = 1;
			}		 

			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: document expiration report']) && session()->get('array_menu_functionality_access_employee')['administrator :: document expiration report'] != "NO") {
				$sub_menu_access['administrator_doc_exp_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['billing :: active eligibility']) && session()->get('array_menu_functionality_access_employee')['billing :: active eligibility'] != "NO") {
				$sub_menu_access['admin_billing_reports']['employee'] = 1;
			}    

			/*if (isset(session()->get('array_menu_functionality_access_employee')['billing :: census data']) && session()->get('array_menu_functionality_access_employee')['billing :: census data'] != "NO") {
				$sub_menu_access['billing_census_data']['employee'] = 1;
			}*/           

			/*if (isset(session()->get('array_menu_functionality_access_employee')['billing :: census retro']) && session()->get('array_menu_functionality_access_employee')['billing :: census retro'] != "NO") {
				$sub_menu_access['billing_census_retro']['employee'] = 1;
			} */

			if (isset(session()->get('array_menu_functionality_access_employee')['caregiver :: payment']) && session()->get('array_menu_functionality_access_employee')['caregiver :: payment'] != "NO") {
				$sub_menu_access['billing_caregiver_payment']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['caregiver :: paper cn not received']) && session()->get('array_menu_functionality_access_employee')['caregiver :: paper cn not received'] != "NO") {
				$sub_menu_access['billing_cn_not_received']['employee'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_employee')['billing :: client billing']) && session()->get('array_menu_functionality_access_employee')['billing :: client billing'] != "NO") {
				$sub_menu_access['billing_client_billing']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['caregiver :: payment ytd']) && session()->get('array_menu_functionality_access_employee')['caregiver :: payment ytd'] != "NO") {
				$sub_menu_access['billing_caregiver_ytd']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['billing :: eligibility expiration']) && session()->get('array_menu_functionality_access_employee')['billing :: eligibility expiration'] != "NO") {
				$sub_menu_access['billing_eligibility_exp']['employee'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_employee')['billing :: payer missing for approved']) && session()->get('array_menu_functionality_access_employee')['billing :: payer missing for approved'] != "NO") {
				$sub_menu_access['billing_missing_payer_approved']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['billing :: pending authorization']) && session()->get('array_menu_functionality_access_employee')['billing :: pending authorization'] != "NO") {
				$sub_menu_access['billing_pending_auth']['employee'] = 1;
			} 

			/*if (isset(session()->get('array_menu_functionality_access_employee')['billing :: stipend payment record']) && session()->get('array_menu_functionality_access_employee')['billing :: stipend payment record'] != "NO") {
				$sub_menu_access['billing_stipend_payment']['employee'] = 1;
			}*/ 

			if (isset(session()->get('array_menu_functionality_access_employee')['care team ::  payment report']) && session()->get('array_menu_functionality_access_employee')['care team ::  payment report'] != "NO") {
				$sub_menu_access['billing_careteam_payment_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: allergy report']) && session()->get('array_menu_functionality_access_employee')['clinical :: allergy report'] != "NO") {
				$sub_menu_access['admin_clinical_reports']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: assessment report']) && session()->get('array_menu_functionality_access_employee')['clinical :: assessment report'] != "NO") {
				$sub_menu_access['clinical_assessment_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: behavior report']) && session()->get('array_menu_functionality_access_employee')['clinical :: behavior report'] != "NO") {
				$sub_menu_access['clinical_behavior_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: care plan – compliance']) && session()->get('array_menu_functionality_access_employee')['clinical :: care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_careplan_compliance']['employee'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: care plan - due']) && session()->get('array_menu_functionality_access_employee')['clinical :: care plan - due'] != "NO") {
				$sub_menu_access['clinical_careplan_due']['employee'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: checklist care plan – compliance']) && session()->get('array_menu_functionality_access_employee')['clinical :: checklist care plan – compliance'] != "NO") {
				$sub_menu_access['clinical_checklist_compliance']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: checklist care plan - due']) && session()->get('array_menu_functionality_access_employee')['clinical :: checklist care plan - due'] != "NO") {
				$sub_menu_access['clinical_checklist_due']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: fall risk assessment']) && session()->get('array_menu_functionality_access_employee')['clinical :: fall risk assessment'] != "NO") {
				$sub_menu_access['clinical_fallrisk_Assessment']['employee'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: h&p expiration']) && session()->get('array_menu_functionality_access_employee')['clinical :: h&p expiration'] != "NO") {
				$sub_menu_access['clinical_HnP_expiration']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: hospitalization outcome']) && session()->get('array_menu_functionality_access_employee')['clinical :: hospitalization outcome'] != "NO") {
				$sub_menu_access['clinical_Hospitalization_outcome']['employee'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: immunization expiration']) && session()->get('array_menu_functionality_access_employee')['clinical :: immunization expiration'] != "NO") {
				$sub_menu_access['clinical_immunization_exp']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: incident report']) && session()->get('array_menu_functionality_access_employee')['clinical :: incident report'] != "NO") {
				$sub_menu_access['clinical_incident_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: medication outcome']) && session()->get('array_menu_functionality_access_employee')['clinical :: medication outcome'] != "NO") {
				$sub_menu_access['clinical_medication_outcome']['employee'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: post hospitalization missing notes']) && session()->get('array_menu_functionality_access_employee')['clinical :: post hospitalization missing notes'] != "NO") {
				$sub_menu_access['clinical_hosp_missing_notes']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: special care']) && session()->get('array_menu_functionality_access_employee')['clinical :: special care'] != "NO") {
				$sub_menu_access['clinical_special_care']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: top 10 icd code']) && session()->get('array_menu_functionality_access_employee')['clinical :: top 10 icd code'] != "NO") {
				$sub_menu_access['clinical_top_11_icd']['employee'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: vitals alert']) && session()->get('array_menu_functionality_access_employee')['clinical :: vitals alert'] != "NO") {
				$sub_menu_access['clinical_vital_alert']['employee'] = 1;
			}             


			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: wandering risk']) && session()->get('array_menu_functionality_access_employee')['clinical :: wandering risk'] != "NO") {
				$sub_menu_access['clinical_wandering_risk']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['clinical :: weight alert report']) && session()->get('array_menu_functionality_access_employee')['clinical :: weight alert report'] != "NO") {
				$sub_menu_access['clinical_weight_alert']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: analytical report']) && session()->get('array_menu_functionality_access_employee')['compliance :: analytical report'] != "NO") {
				$sub_menu_access['compliance_analytical_report']['employee'] = 1;
			}              

			if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: assessments due']) && session()->get('array_menu_functionality_access_employee')['compliance :: assessments due'] != "NO") {
				$sub_menu_access['compliance_assessment_due']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: custom assessments due']) && session()->get('array_menu_functionality_access_employee')['compliance :: custom assessments due'] != "NO") {
				$sub_menu_access['compliance_custom_assessment_due']['employee'] = 1;
			}           

			if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: assessment – signature missing']) && session()->get('array_menu_functionality_access_employee')['compliance :: assessment – signature missing'] != "NO") {
				$sub_menu_access['compliance_sign_missing']['employee'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: employee certification expiration']) && session()->get('array_menu_functionality_access_employee')['compliance :: employee certification expiration'] != "NO") {
				$sub_menu_access['compliance_emp_cert_exp']['employee'] = 1;
			}  	   

			if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: employee license expiration']) && session()->get('array_menu_functionality_access_employee')['compliance :: employee license expiration'] != "NO") {
				$sub_menu_access['compliance_emp_license_exp']['employee'] = 1;
			}  


			/*if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: audit log']) && session()->get('array_menu_functionality_access_employee')['compliance :: audit log'] != "NO") {
				$sub_menu_access['compliance_audit_log']['employee'] = 1;
			} */		 

			if (isset(session()->get('array_menu_functionality_access_employee')['caregiver :: missing care log']) && session()->get('array_menu_functionality_access_employee')['caregiver :: missing care log'] != "NO") {
				$sub_menu_access['admin_caregiver missing care note report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['care team :: followup notes report']) && session()->get('array_menu_functionality_access_employee')['care team :: followup notes report'] != "NO") {
				$sub_menu_access['admin_followup notes report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['Clinical :: Hospitalization Report']) && session()->get('array_menu_functionality_access_employee')['Clinical :: Hospitalization Report'] != "NO") {
				$sub_menu_access['admin_hospitalization report']['employee'] = 1;
			}    

			if (isset(session()->get('array_menu_functionality_access_employee')['care team :: care manger client']) && session()->get('array_menu_functionality_access_employee')['care team :: care manger client'] != "NO") {
				$sub_menu_access['admin_care manger client_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['care team :: client visit report']) && session()->get('array_menu_functionality_access_employee')['care team :: client visit report'] != "NO") {
				$sub_menu_access['admin_client visit report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['caregiver :: shift']) && session()->get('array_menu_functionality_access_employee')['caregiver :: shift'] != "NO") {
				$sub_menu_access['admin_shift report']['employee'] = 1;
			}         

			if (isset(session()->get('array_menu_functionality_access_employee')['care team :: appointment visit report']) && session()->get('array_menu_functionality_access_employee')['care team :: appointment visit report'] != "NO") {
				$sub_menu_access['appointment_visit_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['admission :: suspension report']) && session()->get('array_menu_functionality_access_employee')['admission :: suspension report'] != "NO") {
				$sub_menu_access['admin_suspension_report']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['admission :: leave record report']) && session()->get('array_menu_functionality_access_employee')['admission :: leave record report'] != "NO") {
				$sub_menu_access['admin_leave_record_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['admission :: discharge reason']) && session()->get('array_menu_functionality_access_employee')['admission :: discharge reason'] != "NO") {
				$sub_menu_access['discharge_reason']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['admission :: suspension reason']) && session()->get('array_menu_functionality_access_employee')['admission :: suspension reason'] != "NO") {
				$sub_menu_access['suspension_reason']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['administrator :: sms']) && session()->get('array_menu_functionality_access_employee')['administrator :: sms'] != "NO") {
				$sub_menu_access['sms_report']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['referral :: notes due']) && session()->get('array_menu_functionality_access_employee')['referral :: notes due'] != "NO") {
				$sub_menu_access['referral_notes_report']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['referral :: transfer']) && session()->get('array_menu_functionality_access_employee')['referral :: transfer'] != "NO") {
				$sub_menu_access['referral_transfer']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['referral :: source']) && session()->get('array_menu_functionality_access_employee')['referral :: source'] != "NO") {
				$sub_menu_access['referral_source']['employee'] = 1;
			} 

			if (isset(session()->get('array_menu_functionality_access_employee')['referral :: referred by']) && session()->get('array_menu_functionality_access_employee')['referral :: source'] != "NO") {
				$sub_menu_access['referral_referred_by']['employee'] = 1;
			}

			if (isset(session()->get('array_menu_functionality_access_employee')['caregiver:: caregiver hired date']) && session()->get('array_menu_functionality_access_employee')['caregiver:: caregiver hired date'] != "NO") {
				$sub_menu_access['caregiver_hired_date']['employee'] = 1;
			}   

			if (isset(session()->get('array_menu_functionality_access_employee')['referral :: referred to']) && session()->get('array_menu_functionality_access_employee')['referral :: referred to'] != "NO") {
				$sub_menu_access['referral_referred_to']['employee'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_employee')['care team :: care manger client details']) && session()->get('array_menu_functionality_access_employee')['care team :: care manger client details'] != "NO") {
				$sub_menu_access['careteam_client_details']['employee'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_employee')['care team :: assessment missing']) && session()->get('array_menu_functionality_access_employee')['care team :: assessment missing'] != "NO") {
				$sub_menu_access['careteam_assessment_missing']['employee'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_employee')['care team :: missing appointment report']) && session()->get('array_menu_functionality_access_employee')['care team :: missing appointment report'] != "NO") {
				$sub_menu_access['careteam_appointment_missing']['employee'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_employee')['care team :: attendance']) && session()->get('array_menu_functionality_access_employee')['care team :: attendance'] != "NO") {
				$sub_menu_access['careteam_attendance']['employee'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_delete')['care team :: missing appointment report']) && session()->get('array_menu_functionality_access_delete')['care team :: missing appointment report'] != "NO") {
				$sub_menu_access['careteam_appointment_missing']['delete'] = 1;
			}
			if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: background check expiration']) && session()->get('array_menu_functionality_access_employee')['compliance :: background check expiration'] != "NO") {
				$sub_menu_access['background_check_report']['employee'] = 1;
			}  
			if (isset(session()->get('array_menu_functionality_access_employee')['compliance :: other details expiration']) && session()->get('array_menu_functionality_access_employee')['compliance :: other details expiration'] != "NO") {
				$sub_menu_access['other_details_report']['employee'] = 1;
			}  

			if (isset(session()->get('array_menu_functionality_access_employee')['Caregiver :: Care Note Signature Missing']) && session()->get('array_menu_functionality_access_employee')['Caregiver :: Care Note Signature Missing'] != "NO") {
				$sub_menu_access['cn_signature_missing']['employee'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_employee')['caregiver :: care log signature report']) && session()->get('array_menu_functionality_access_employee')['caregiver :: care log signature report'] != "NO") {
				$sub_menu_access['cn_missing_signature']['employee'] = 1;
			} 
			if (isset(session()->get('array_menu_functionality_access_employee')['referral :: admitted']) && session()->get('array_menu_functionality_access_employee')['referral :: admitted'] != "NO") {
				$sub_menu_access['referral_admitted']['employee'] = 1;
			}

session()->set('sub_menu_access', $sub_menu_access);

$caregiver_login = "NO";
/*if(session()->get('usr_rol_id') == 154){
$caregiver_login = "YES";
}*/
if (session()->get('usr_rol_type') == 'CAREGIVER SPECIFIC') {
	$caregiver_login = "YES";
}
//session()->set('caregiver_login', $caregiver_login);

$restricted_staff_login = "NO";
if (session()->get('usr_rol_id') == 156) {
	$restricted_staff_login = "YES";
}
session()->set('restricted_staff_login', $restricted_staff_login);
/*echo "<pre>";
print_r($_SESSION);*/


?>