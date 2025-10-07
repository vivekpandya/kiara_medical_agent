<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig {
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf' => CSRF::class,
		'toolbar' => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'invalidchars' => InvalidChars::class,
		'secureheaders' => SecureHeaders::class,
		'checkLogin' => \App\Filters\CheckLogin::class,
		'checkFrontLogin' => \App\Filters\CheckFrontLogin::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'csrf',
			// 'invalidchars',
		],
		'after' => [
			'toolbar',
			// 'honeypot',
			// 'secureheaders',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['foo', 'bar']
	 *
	 * If you use this, you should disable auto-routing because auto-routing
	 * permits any HTTP method to access a controller. Accessing the controller
	 * with a method you don’t expect could bypass the filter.
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	// List filter aliases and any before/after uri patterns
	//public $filters = [];
	public $filters = [
		'checkLogin' => ['before' => ['superadmin', 'superadmin/*']],
		'checkFrontLogin' => ['before' => ['profile','profile/*','Profile','Profile/*','crm/lead', 'crm/lead/*', 'crm/contact', 'crm/contact/*', 'crm/opportunity', 'crm/opportunity/*', 'crm/task', 'crm/task/*', 'crm/activity', 'crm/activity/*', 'crm/report', 'crm/report/*', 'crm/setting', 'crm/setting/*', 'caremanager', 'caremanager/*', 'roles', 'user', 'user/*', 'edit_user/*', 'physician', 'physician/*', 'pharmacy', 'pharmacy/*', 'Pharmacist', 'Pharmacist/*', 'organize', 'organize/*', 'taskmanagement', 'taskmanagement/*', 'task_management', 'task_management/*', 'agency', 'agency/*', 'clients', 'clients/*', 'caregiver', 'caregiver/*', 'hospital', 'hospital/*', 'ambulance', 'ambulance/*', 'document', 'document/*', 'generate_care_plan', 'generate_care_plan/*', 'billing', 'billing/*', 'shift', 'shift/*', 'caregiver-adl', 'caregiver-adl/*', 'client-program', 'client-program/*', 'forms', 'forms/*', 'care_note', 'care_note/*', 'caregiver-documents', 'caregiver-documents/*', 'caregiver-document', 'caregiver-document/*', 'shift-calendar', 'shift-calendar/*','shift_calendar','shift_calendar/*', 'my_profile', 'my_profile/*', 'custom_forms', 'custom_forms/*','reports/*','ClientsNotes/getNotestabData','ClientsNotes/*','add_client','quality_check','quality_check/*','edit_form','edit_form/*','dashboard','ticket_system','ticket_system/*','ClientsAssesments','ClientsAssesments/*','ClientsAdmission','ClientsAdmission/*','ClientsNursing','ClientsNursing/*','ClientsVisit','ClientsVisit/*','ClientsSocialService','ClientsSocialService/*','ClientsNotes','ClientsNotes/*','clientsNotes','clientsNotes/*','ClientsCareplan/*','ClientsImmunization','ClientsImmunization/*','ClientsMars','ClientsMars/*','ClientsHospitalization','ClientsHospitalization/*','ClientsDocuments','ClientsDocuments/*','ClientsIncident','ClientsIncident/*','ClientsAdls','ClientsAdls/*','ClientsCareNoteTab','ClientsCareNoteTab/*','ClientQuiz','ClientQuiz/*','billing_report','billing_report/*','ClientsVitals','ClientsVitals/*','caregiver-form','caregiver-form/*','caregiverform/*','quiz-form','workflow','workflow/*','edit_roles/*','document_list','appointment/*','appointment/appointment_log_view']],
	];
}
