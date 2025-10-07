<?php 
public function getadmissionData()
{
    $id = $this->make_safe_post('cli_id');
    $data['page_code'] = 'client';
    $data['view'] = $this->make_safe_post('view');
    $data['dcc_id'] = session()->get('usr_dcc_id');
    $data['cus_id'] = session()->get('usr_cus_id_1');

    //Physician details
    $data['physiciancontact'] = $this->C->getPhysicianData($id);
    $data['clients'] = $this->Common_model->getDataById('*', TBL_CLIENTS, array('cli_id' => $id, 'cli_dcc_id' => session()->get('usr_dcc_id')));
    $data['form_permission'] = getFormPermission(session()->get('usr_dcc_id'));
    if (!empty($data['clients']->cli_schedule_shift)) {
        $data['dcc_timings'] = $this->Common_model->getDataById('*', TBL_DCC_TIMINGS, array('tim_shift' => $data['clients']->cli_schedule_shift, 'tim_dcc_id' => session()->get('usr_dcc_id')));
    }
    $dcc_id = session()->get('usr_dcc_id');
    $data['DCC_Details'] = $this->Common_model->getDataById('*', TBL_DCC, array('dcc_id' => $dcc_id));
    //Primary Physician Details for Perticular Client
    $data['primaryPhysicianList'] = $this->C->getprimaryPhysicianList($id);

    if (isset($data['primaryPhysicianList']) && !empty($data['primaryPhysicianList'])) {
        foreach ($data['primaryPhysicianList'] as $key => $value) {
            $phd_id = $value->phd_id;
        }
        if (isset($phd_id) && !empty($phd_id)) {
            $data['primaryPhysicianDetails'] = $this->C->getPrimaryPhysicianInfo($phd_id);
            $data['getPhyDeatils'] = $this->C->getPhyDeatils($phd_id);
        }
    }

    if (!empty($data['DCC_Details']->dcc_state)) {
        $data['dcc_state'] = $this->Common_model->getDataById('state_name', TBL_STATE, array('state_id' => $data['DCC_Details']->dcc_state));
    }

    //emergency details
    $data['emergencycontact'] = $this->Common_model->getAllData("*", TBL_EMERGENCY_CONTACT, array('emc_cli_id' => $id, 'emc_status' => 'ACTIVE'), "", "", "");
    if (!empty($data['emergencycontact'])) {
        foreach ($data['emergencycontact'] as $key => $value) {
            $value->emc_country = 'United States';
            $data['emc_city'] = '';
            if (!empty($value->emc_city)) {
                $emc_city = $this->Common_model->getDataById('city_name', TBL_CITY, array('city_id' => $value->emc_city));
                $value->emc_city = str_replace("'", '&#039;', $emc_city->city_name);
            }
            if (!empty($value->emc_state)) {
                $emc_state = $this->Common_model->getDataById('state_name', TBL_STATE, array('state_id' => $value->emc_state));
                $value->emc_state = str_replace("'", '&#039;', $emc_state->state_name);
            }
        }
    }

    $data['tran_country'] = 'United States';
    if (!empty($data['clients']->cli_city)) {
        $clients_city = $this->Common_model->getDataById('city_name', TBL_CITY, array('city_id' => $data['clients']->cli_city));
        $data['tran_city'] = $clients_city->city_name;
    }


    $data['tran_state'] = '';
    if (!empty($data['clients']->cli_state)) {
        $clients_state = $this->Common_model->getDataById('state_name', TBL_STATE, array('state_id' => $data['clients']->cli_state));
        $data['tran_state'] = $clients_state->state_name;
    }
    $data['all_users'] = $this->C->getAllStaffListDiertry();
    // Admission Informed Consent Details 
    $data['admissionconsent'] = $this->Common_model->getDataById("*", TBL_INFORMED_CONSENT, array('con_cli_id' => $id));
    // Medical Release Contact Details
    $data['medical_release'] = $this->Common_model->getDataById("*", TBL_MEDICAL_RELEASE_CONSENT, array('med_cli_id' => $id));
    if (isset($data['medical_release']->med_phd_id) && !empty($data['medical_release']->med_phd_id)) {
        $data['phd_name'] = $this->Common_model->getDataById("*", TBL_PHYSICIAN_DETAILS, array('phd_id' => $data['medical_release']->med_phd_id));
    }
    // Advance Directive Information Sheet 
    $data['inf_sheet'] = $this->Common_model->getDataById("*", TBL_CLIENT_ADV_DIR_INF_SHEET, array('adi_cli_id' => $id));
    // Notice of Privacy Practices
    $data['notice'] = $this->Common_model->getDataById("*", TBL_CLIENT_PRIVACY_PRACTICE_NOTICE, array('not_cli_id' => $id));
    // Admission Policy
    $data['adm_polcy'] = $this->Common_model->getDataById("*", TBL_CLIENT_ADMISSION_POLICY, array('cap_cli_id' => $id));
    // Get Ombudsman Disclosure Consent Details
    $data['obm_dis_consent'] = $this->Common_model->getDataById("*", TBL_CLIENT_OBM_DISCLOSURE_CONSENT, array('obm_cli_id' => $id));
    // Clients Transportation Information
    $data['transportation'] = $this->Common_model->getDataById("*", TBL_CLIENT_TRANSPORTATION_INFO, array('tran_cli_id' => $id));
    // Community Care
    $data['community_care'] = $this->Common_model->getDataById("*", TBL_COMMUNITY_CARE, array('ccnf_cli_id' => $id));
    $data['ExistingInt'] = $this->Common_model->getAllData('*', TBL_CLIENT_INTAKE_ASSESSMENT_MEDICAL_ADMISSION, array('pv_cli_id' => $id), array(), array(), array(), "array");
    $data['AdmissionLast'] = $this->Common_model->getAllData('*', TBL_CLIENT_INTAKE_ASSESSMENT_ADMISSION_LAST_YEAR, array('addm_cli_id' => $id), array(), array(), array(), "array");
    $data['service_assessment'] = $this->Common_model->getDataById('*', TBL_CLIENTS_SERVICE_ASSESSMENT, array('csa_cli_id' => $id));

    $defaultCountry = array('id' => '231', 'text' => 'United States');
    $data['ccnf_country_data'] = json_encode($defaultCountry);
    $data['ccnf_city_data'] = '';
    if (!empty($data['community_care']->ccnf_city)) {
        $clients_city = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['community_care']->ccnf_city));
        $clients_city->text = str_replace("'", '&#039;', $clients_city->text);
        $data['ccnf_city_data'] = json_encode($clients_city);
    }

    $data['ccnf_state_data'] = '';
    if (!empty($data['community_care']->ccnf_state)) {
        $clients_state = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['community_care']->ccnf_state));
        $clients_state->text = str_replace("'", '&#039;', $clients_state->text);
        $data['ccnf_state_data'] = json_encode($clients_state);
    }

    if (!empty($data['transportation']->tran_completed_by)) {
        $data['logged_in_userTRAN'] = $this->Common_model->getDataById("usr_id, usr_first_name, usr_last_name, usr_rol_id", TBL_USERS, array('usr_id' => $data['transportation']->tran_completed_by), "", "", "");
    }
    //Initial nursing
    $data['int_polcy'] = $this->Common_model->getDataById("*", TBL_CLIENTS_INITIAL_NURSING, array('int_nur_cli_id' => $id));

    // Home Assessment
    $data['assessment'] = $this->Common_model->getDataById("*", TBL_CLIENT_HOME_ASSESSMENT, array('hom_cli_id' => $id));
    if (!empty($data['assessment']->hom_completed_by)) {
        $data['logged_in_userHA'] = $this->Common_model->getDataById("usr_id, usr_first_name, usr_last_name, usr_rol_id", TBL_USERS, array('usr_id' => $data['assessment']->hom_completed_by), "", "", "");
    }
    $data['dcc_details'] = $this->C->getDCCData(session()->get('usr_dcc_id'));
    $data['client_details'] = $this->C->getClientData($id);

    if (isset($data['obm_dis_consent']->obm_person1_name) && !empty($data['obm_dis_consent']->obm_person1_name)) {
        $data['emergencycontact_person_one'] = $this->Common_model->getDataById("*", TBL_EMERGENCY_CONTACT, array('emc_id' => $data['obm_dis_consent']->obm_person1_name, 'emc_status' => 'ACTIVE'), "", "", "");
        $data['emergencycontact_person_two'] = $this->C->getEmergencyContact($data['obm_dis_consent']->obm_person2_name);
    }

    //food program application

    $data['food_program_data'] = $this->Common_model->getDataById('*', TBL_FOOD_PROGRAM_APPLICATION, array('fpa_cli_id' => $id));

    if (!empty($data['food_program_data'])) {
        $data['food_option3_data'] = $this->Common_model->getAllData("*", TBL_FOOD_PROGRAM_OPTION3, array('fop3_food_id' => $data['food_program_data']->fpa_id), "", "", "");
    }


    $shift_timing = 1;
    $data['dcc_shift_two'] = $this->Common_model->getDataById('*', TBL_DCC_TIMINGS, array('tim_shift' => $shift_timing, 'tim_dcc_id' => session()->get('usr_dcc_id')));

    $defaultCountry = array('id' => '231', 'text' => 'United States');
    $data['cs_country_id'] = json_encode($defaultCountry);

    $data['fpa_state'] = '';
    if (!empty($data['clients']->cli_state)) {
        $clients_state = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['clients']->cli_state));
        $data['fpa_state'] = $clients_state->text;
    }

    $data['fpa_city'] = '';
    if (!empty($data['clients']->cli_city)) {
        $clients_city = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['clients']->cli_city));
        $data['fpa_city'] = $clients_city->text;
    }

    // Client Orientation
    $data['clientOrientationInterview'] = $this->Common_model->getDataById("*", TBL_CLIENT_ORIENTATION_INTERVIEW, array('coi_cli_id' => $id));
    $data['primaryEmergencyContact'] = $this->C->getPrimaryEmergencyContact_obmPrio1($id);
    $data['primaryEmergencyContactPrio2'] = $this->C->getPrimaryEmergencyContact_obmPrio2($id);



    // client choice of Medical Consultant
    $data['medical_consultant'] = $this->Common_model->getDataById("*", TBL_CLIENT_MEDICAL_CONSULTANT, array('cmc_cli_id' => $id));
    //$data['assessment'] = $this->Common_model->getDataById("hom_emerg_contact_list", TBL_CLIENT_HOME_ASSESSMENT, array('hom_cli_id' => $id));
    //emergency details
    $data['emergencycontact'] = $this->Common_model->getAllData("*", TBL_EMERGENCY_CONTACT, array('emc_cli_id' => $id, 'emc_status' => 'ACTIVE'), "", "", "");
    if (!empty($data['emergencycontact']) > 0) {
        foreach ($data['emergencycontact'] as $key => $value) {
            $value->emc_country = 'United States';
            $data['emc_city'] = '';
            if (!empty($value->emc_city)) {
                $emc_city = $this->Common_model->getDataById('city_name', TBL_CITY, array('city_id' => $value->emc_city));
                $value->emc_city = str_replace("'", '&#039;', $emc_city->city_name);
            }
            if (!empty($value->emc_state)) {
                $emc_state = $this->Common_model->getDataById('state_name', TBL_STATE, array('state_id' => $value->emc_state));
                $value->emc_state = str_replace("'", '&#039;', $emc_state->state_name);
            }
        }
    }
    //SMIF Form
    $data['smif'] = $this->Common_model->getDataById("*", TBL_SMIF, array('smif_cli_id' => $id));


    // Intake Assessment Form

    $data['intake'] = $this->Common_model->getDataById("*", TBL_CLIENT_INTAKE_ASSESSMENT, array('in_cli_id' => $id));
    $data['logged_in_user'] = $this->Common_model->getDataById("usr_id, usr_first_name, usr_last_name", TBL_USERS, array('usr_id' => session()->get('user_id')), "", "", "");

    if (empty($data['intake'])) {
        $data['ExistingMed'] = $this->Common_model->getAllData('*', TBL_CLIENT_PHY_MEDICARE_NURSE, array('med_status' => 'ACTIVE', 'med_cli_id' => $id), array(), array(), array(), "array");
    } else {
        $data['ExistingMed'] = $this->Common_model->getAllData('*', TBL_CLIENT_PHY_MEDICARE_NURSE_INTAKE, array('med_status' => 'ACTIVE', 'med_cli_id' => $id), array(), array(), array(), "array");
        if (empty($data['ExistingMed'])) {
            $data['ExistingMed'] = $this->Common_model->getAllData('*', TBL_CLIENT_PHY_MEDICARE_NURSE, array('med_status' => 'ACTIVE', 'med_cli_id' => $id), array(), array(), array(), "array");
        }
    }
    $diaphy = $this->Common_model->getAllData("*", TBL_DIAGNOSIS_PHYSICIAN, array('dip_cli_id' => $id, 'dip_status' => 'ACTIVE'), "", "", "");
    $dia_ids = $this->to_string($diaphy);

    //Photo-Outing Consent Form
    $data['consent_form_data'] = $this->Common_model->getDataById('*', TBL_PHOTO_OUTING_CONSENT_FORM, array('consent_cli_id' => $id, 'consent_status' => 'ACTIVE'));
    //---------------------------
    //Application For Enrollment Form
    $defaultCountry = array('id' => '231', 'text' => 'United States');
    $data['app_enr_country'] = json_encode($defaultCountry);
    $data['app_enr_country1'] = json_encode($defaultCountry);
    $data['app_enr_country2'] = json_encode($defaultCountry);
    $data['app_enr_country3'] = json_encode($defaultCountry);
    $data['app_enr_country4'] = json_encode($defaultCountry);
    $data['enrollment_form_data'] = $this->Common_model->getDataById('*', TBL_APPLICATION_ENROLLMENT_FORM, array('app_enr_cli_id' => $id, 'app_enr_status' => 'ACTIVE'));

    // General information
    $data['app_enr_state'] = '';
    /* if (!empty($data['enrollment_form_data']->app_enr_state)) {
      $enrollment_form_data_state = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['enrollment_form_data']->app_enr_state));
      $enrollment_form_data_state->text = str_replace("'", '&#039;', $enrollment_form_data_state->text);
      $data['app_enr_state'] = json_encode($enrollment_form_data_state);
      } */
    if (!empty($data['clients']->cli_state)) {
        $enrollment_form_data_state = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['clients']->cli_state));
        $enrollment_form_data_state->text = str_replace("'", '&#039;', $enrollment_form_data_state->text);
        $data['app_enr_state'] = json_encode($enrollment_form_data_state);
    }

    $data['app_enr_city'] = '';
    /* if (!empty($data['enrollment_form_data']->app_enr_city)) {
      $enrollment_form_data_city = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['enrollment_form_data']->app_enr_city));
      $enrollment_form_data_city->text = str_replace("'", '&#039;', $enrollment_form_data_city->text);
      $data['app_enr_city'] = json_encode($enrollment_form_data_city);
      } */
    if (!empty($data['clients']->cli_city)) {
        $enrollment_form_data_city = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['clients']->cli_city));
        $enrollment_form_data_city->text = str_replace("'", '&#039;', $enrollment_form_data_city->text);
        $data['app_enr_city'] = json_encode($enrollment_form_data_city);
    }


    // information 1
    $data['app_enr_state1'] = '';
    if (!empty($data['enrollment_form_data']->app_enr_state1)) {
        $enrollment_form_data_state1 = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['enrollment_form_data']->app_enr_state1));
        $enrollment_form_data_state1->text = str_replace("'", '&#039;', $enrollment_form_data_state1->text);
        $data['app_enr_state1'] = json_encode($enrollment_form_data_state1);
    }

    $data['app_enr_city1'] = '';
    if (!empty($data['enrollment_form_data']->app_enr_city1)) {
        $enrollment_form_data_city1 = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['enrollment_form_data']->app_enr_city1));
        $enrollment_form_data_city1->text = str_replace("'", '&#039;', $enrollment_form_data_city1->text);
        $data['app_enr_city1'] = json_encode($enrollment_form_data_city1);
    }

    // information 2
    $data['app_enr_state2'] = '';
    if (!empty($data['enrollment_form_data']->app_enr_state2)) {
        $enrollment_form_data_state2 = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['enrollment_form_data']->app_enr_state2));
        $enrollment_form_data_state2->text = str_replace("'", '&#039;', $enrollment_form_data_state2->text);
        $data['app_enr_state2'] = json_encode($enrollment_form_data_state2);
    }

    $data['app_enr_city2'] = '';
    if (!empty($data['enrollment_form_data']->app_enr_city2)) {
        $enrollment_form_data_city2 = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['enrollment_form_data']->app_enr_city2));
        $enrollment_form_data_city2->text = str_replace("'", '&#039;', $enrollment_form_data_city2->text);
        $data['app_enr_city2'] = json_encode($enrollment_form_data_city2);
    }

    // information 3
    $data['app_enr_state3'] = '';
    if (!empty($data['enrollment_form_data']->app_enr_state3)) {
        $enrollment_form_data_state3 = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['enrollment_form_data']->app_enr_state3));
        $enrollment_form_data_state3->text = str_replace("'", '&#039;', $enrollment_form_data_state3->text);
        $data['app_enr_state3'] = json_encode($enrollment_form_data_state3);
    }

    $data['app_enr_city3'] = '';
    if (!empty($data['enrollment_form_data']->app_enr_city3)) {
        $enrollment_form_data_city3 = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['enrollment_form_data']->app_enr_city3));
        $enrollment_form_data_city3->text = str_replace("'", '&#039;', $enrollment_form_data_city3->text);
        $data['app_enr_city3'] = json_encode($enrollment_form_data_city3);
    }

    // information 4
    $data['app_enr_state4'] = '';
    if (!empty($data['enrollment_form_data']->app_enr_state4)) {
        $enrollment_form_data_state4 = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['enrollment_form_data']->app_enr_state4));
        $enrollment_form_data_state4->text = str_replace("'", '&#039;', $enrollment_form_data_state4->text);
        $data['app_enr_state4'] = json_encode($enrollment_form_data_state4);
    }

    $data['app_enr_city4'] = '';
    if (!empty($data['enrollment_form_data']->app_enr_city4)) {
        $enrollment_form_data_city4 = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['enrollment_form_data']->app_enr_city4));
        $enrollment_form_data_city4->text = str_replace("'", '&#039;', $enrollment_form_data_city4->text);
        $data['app_enr_city4'] = json_encode($enrollment_form_data_city4);
    }
    //---------------------------
    //Financial Disclosure Form
    $data['financial_disclosure_data'] = $this->Common_model->getDataById('*', TBL_FINANCIAL_DISCLOSURE_FORM, array('finan_parti_cli_id' => $id, 'finan_parti_status' => 'ACTIVE'));
    /* ------------------------------- */

    //Social Lifestyle History
    $data['social_lifestyle'] = $this->Common_model->getDataById('*', TBL_SOCIAL_LIFESTYLE_STYLE, array('sl_cli_id' => $id));
    $data['social_phy'] = $this->Common_model->getAllData('*', TBL_SOCIAL_LIFESTYLE_STYLE_PHYSICIAN, array('sl_status' => 'ACTIVE', 'sl_cli_id' => $id), array(), array(), "array");

    //Financial Agreement Form
    $data['financial_agreement_data'] = $this->Common_model->getDataById('*', TBL_FINANCIAL_AGREEMENT_FORM, array('fin_agr_cli_id' => $id, 'fin_agr_status' => 'ACTIVE'));

    $defaultCountry = array('id' => '231', 'text' => 'United States');
    $data['fin_agr_explorers_payer_source_country1'] = json_encode($defaultCountry);
    $data['fin_agr_explorers_payer_source_country2'] = json_encode($defaultCountry);

    // Address 1
    $data['fin_agr_explorers_payer_source_state1'] = '';
    if (!empty($data['financial_agreement_data']->fin_agr_explorers_payer_source_state1)) {
        $financial_agreement_data_state = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['financial_agreement_data']->fin_agr_explorers_payer_source_state1));
        $financial_agreement_data_state->text = str_replace("'", '&#039;', $financial_agreement_data_state->text);
        $data['fin_agr_explorers_payer_source_state1'] = json_encode($financial_agreement_data_state);
    }

    $data['fin_agr_explorers_payer_source_city1'] = '';
    if (!empty($data['financial_agreement_data']->fin_agr_explorers_payer_source_city1)) {
        $financial_agreement_data_city = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['financial_agreement_data']->fin_agr_explorers_payer_source_city1));
        $financial_agreement_data_city->text = str_replace("'", '&#039;', $financial_agreement_data_city->text);
        $data['fin_agr_explorers_payer_source_city1'] = json_encode($financial_agreement_data_city);
    }

    // Address 2
    $data['fin_agr_explorers_payer_source_state2'] = '';
    if (!empty($data['financial_agreement_data']->fin_agr_explorers_payer_source_state2)) {
        $financial_agreement_data_state = $this->Common_model->getDataById('state_id as id, state_name as text', TBL_STATE, array('state_id' => $data['financial_agreement_data']->fin_agr_explorers_payer_source_state2));
        $financial_agreement_data_state->text = str_replace("'", '&#039;', $financial_agreement_data_state->text);
        $data['fin_agr_explorers_payer_source_state2'] = json_encode($financial_agreement_data_state);
    }

    $data['fin_agr_explorers_payer_source_city2'] = '';
    if (!empty($data['financial_agreement_data']->fin_agr_explorers_payer_source_city2)) {
        $financial_agreement_data_city = $this->Common_model->getDataById('city_id as id, city_name as text', TBL_CITY, array('city_id' => $data['financial_agreement_data']->fin_agr_explorers_payer_source_city2));
        $financial_agreement_data_city->text = str_replace("'", '&#039;', $financial_agreement_data_city->text);
        $data['fin_agr_explorers_payer_source_city2'] = json_encode($financial_agreement_data_city);
    }

    //Financial Agreement Form
    $data['carepartners_assessment_data'] = $this->Common_model->getDataById('*', TBL_CAREPARTNERS_ASSESSMENT_FORM, array('car_cli_id' => $id, 'car_status' => 'ACTIVE'));
    /* ------------------------------- */

    $data['ma_form_data'] = $this->Common_model->getDataById('*', TBL_CLIENT_MA_FORM, array('ma_cli_id' => $id, 'ma_status' => 'ACTIVE'));

    //PCP Form Agreement Form
    $data['pcp_form_data'] = $this->Common_model->getDataById('*', TBL_CLIENT_PCP_FORM, array('pcp_cli_id' => $id, 'pcp_status' => 'ACTIVE'));
    //PC Order Form
    $data['pc_form_data'] = $this->Common_model->getDataById('*', TBL_CLIENT_PC_ORDER_FORM, array('pc_cli_id' => $id, 'pc_status' => 'ACTIVE'));

    // -------------- Start of Foster Function - By Rohit ------------

    $data['care_manager'] = $this->C->getEmergencyContactCareManager($id);
    $data['care_giver'] = $this->C->getEmergencyContactCareGiver($id);
    $data['reported_to'] = $this->C->getEmergencyContactNone($id);

    $data['clinical_visit_form'] = $this->Common_model->getDataById('*', TBL_CLINICAL_VISIT_FORM, array('cvf_cli_id' => $id, 'cvf_status' => 'ACTIVE'));
    $data['clinical_reported_to'] = $this->Common_model->getAllData('*', TBL_CLINICAL_VISIT_REPORTED_TO, array('cvr_cli_id' => $id, 'cvr_status' => 'ACTIVE'), array(), array(), array(), "array");
    $data['general_visit_form'] = $this->Common_model->getDataById('*', TBL_GENERAL_VISIT_FORM, array('gvf_cli_id' => $id, 'gvf_status' => 'ACTIVE'));

    // -------------- End of Foster Function - By Rohit ------------
    $data['cli_dia_id'] = '';
    if (!empty($dia_ids)) {
        $dia_ids = explode(',', $dia_ids);
        $dia_name = array();
        foreach ($dia_ids as $k => $v) {
            $clients_dia = $this->Common_model->getDataById('CONCAT(dia_name," ",dia_idc_code) as text', TBL_DIAGNOSIS, array('dia_id' => $v));
            $dia_name[] = $clients_dia->text;
        }
        $data['cli_dia_id'] = implode(', ', $dia_name);
    }

    $data['dcc_id'] = session()->get('usr_dcc_id');
    $data['payerList'] = $this->C->getMyInsuranceInfo($data['dcc_id']);
    echo view('clients/admission/admission', $data);
}