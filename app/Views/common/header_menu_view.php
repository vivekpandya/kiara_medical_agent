<?php
echo view('common/sub_menu_access_set.php');
$dccData = getDccDataByID(session()->get('usr_dcc_id'), 'dcc_status,dcc_auto_schedule');
if ($dccData->dcc_status != "ACTIVE") {
    session()->set('error_message', 'You account has been disabled');
    return redirect()->route('logout');
    exit();
}
$userData = getUserDataByID(session()->get('user_id'), 'usr_status');

if ($userData->usr_status != "ACTIVE") {
    session()->set('error_message', 'You account has been disabled');
    return redirect()->route('logout');
    exit();
}
?>
<style type="text/css">
    .subnavbar .submenu-right::after {
        border-left: 0px solid transparent;
        border-right: 0px solid transparent;
    }

    .subnavbar .submenu-right::before {
        border-left: 0px solid transparent;
        border-right: 0px solid transparent;
    }
</style>
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container-fuild px-3">
            <ul class="mainnav">

                <?php
                $clientmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('client', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('client')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '1') == 'ACTIVE') {
                                $clientmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '1') == 'ACTIVE') {
                        $clientmenu = "block";
                    }
                }
                ?>
                <li style="display: <?php echo $clientmenu; ?>" <?php if ($page_code == "client") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'clients'; ?>">
                        <!-- <i class="icon-user custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Clients.png" class="headimg">
                        <span class="submenu-title">Clients</span>
                    </a>
                </li>

                <?php
                $trancemenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('transportation', session()->get('menu_items_arr'))) {
                        if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '2') == 'ACTIVE') {
                            $trancemenu = "block";
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '2') == 'ACTIVE') {
                        $trancemenu = "block";
                    }
                }
                ?>


                <?php
                $timecardmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('time card', session()->get('menu_items_arr'))) {
                        if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '3') == 'ACTIVE') {
                            $timecardmenu = "block";
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '3') == 'ACTIVE') {
                        $timecardmenu = "block";
                    }
                }
                ?>
                <!-- <li id="timecardlitag" style="display: <?php echo $timecardmenu; ?>" <?php if ($page_code == "time card") { ?> class="active" <?php } ?>>
                    <a id="timecardatag"  href="<?php echo base_url() . 'timecard'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/Timecart.png" class="headimg">
                        
                        <span class="submenu-title">Time Card</span>
                    </a>
                </li> -->

                <?php
                $trancemenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('nursing', session()->get('menu_items_arr'))) {
                        if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '4') == 'ACTIVE') {
                            $trancemenu = "block";
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '4') == 'ACTIVE') {
                        $trancemenu = "block";
                    }
                }
                ?>


                <?php
                $activitymenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('activity', session()->get('menu_items_arr'))) {
                        if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '8') == 'ACTIVE') {
                            $activitymenu = "block";
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '8') == 'ACTIVE') {
                        $activitymenu = "block";
                    }
                }
                ?>


                <?php
                $foodmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('food', session()->get('menu_items_arr'))) {
                        if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '5') == 'ACTIVE') {
                            $foodmenu = "block";
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '5') == 'ACTIVE') {
                        $foodmenu = "block";
                    }
                }
                ?>


                <?php
                /*echo "<pre>";
                print_r($_SESSION);
                exit;*/
                $adminismenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('administrator', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('administrator')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '9') == 'ACTIVE') {
                                $adminismenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '9') == 'ACTIVE') {
                        $adminismenu = "block";
                    }
                }
                ?>
                <li class="dropdown <?php
                                    if ($page_code == "administration" || $page_code == "schedule" || $page_code == "user" || $page_code == "roles" || $page_code == "caregiver_roles" || $page_code == "forms" || $page_code == "physician" || $page_code == "pharmacy" || $page_code == "restaurant" || $page_code == "supplier" || $page_code == "driver" || $page_code == "transport_route" || $page_code == "ambulance" || $page_code == "locations" || $page_code == "gifts" || $page_code == "document" || $page_code == "generateforms" || $page_code == "generatecareplans" || $page_code == "transportation_range" || $page_code == "admin_vehicle" || $page_code == "admin_shift" || $page_code == "admin_caregiver_adl" || $page_code == "admin_i_adl" || $page_code == "admin_behavior_activity" || $page_code == "hospital" || $page_code == "agency" || $page_code == "caremanager" || $page_code == "caregiver" || $page_code == "client_program" || $page_code == "workflow_checklist" || $page_code == "workflow_plan" || $page_code == "workflow_email_template" || $page_code == "workflow_status" || $page_code == "level_of_care"  || $page_code == "client_menu_setting") {

                                        echo "active";
                                    }
                                    ?>" style="display: <?php echo $adminismenu; ?>">
                    <a id="adminisratoratag" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <i class="icon-asterisk custmenuadj" style="margin-bottom: -4px; font-size: 22px;"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Admin.png" class="headimg">
                        <span>Admin</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li <?php if ($page_code == "schedule") { ?> class="active" <?php } ?>>
                            <a id="scheduleatag" href="<?php echo base_url() . 'schedule'; ?>">
                                <i class="icon-time"></i>
                                <span> Schedule</span> </a> 
                        </li> -->
                        <?php
                        $admin_workflow = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('workflow', session()->get('menu_items_arr'))) {
                                if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_workflow') == 'ACTIVE') {
                                    $admin_workflow = "block";
                                }
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_workflow') == 'ACTIVE') {
                                $admin_workflow = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_workflow; ?>" class="hassubnav <?php if ($page_code == "workflow_checklist" || $page_code == "workflow_plan" || $page_code == "workflow_email_template" || $page_code == "workflow_status") {
                                                                                                    echo 'active';
                                                                                                } ?>">
                            <a href="#"><i class="icon-eye-open"></i> Workflow</a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <li <?php if ($page_code == "workflow_checklist") { ?> class="active" <?php } ?>><a href="<?php echo ROOT_WWW . 'workflow/checklist'; ?>">
                                        <i class="icon-list-alt"></i>
                                        <span class="submenu-title">Workflow Task</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "workflow_plan") { ?> class="active" <?php } ?>><a href="<?php echo ROOT_WWW . 'workflow/plan'; ?>">
                                        <i class="icon-list-alt"></i>
                                        <span class="submenu-title">Workflow Plan</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "workflow_email_template") { ?> class="active" <?php } ?>><a href="<?php echo ROOT_WWW . 'workflow/email_category'; ?>">
                                        <i class="icon-list-alt"></i>
                                        <span class="submenu-title">Workflow Email Template</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "workflow_status") { ?> class="active" <?php } ?>><a href="<?php echo ROOT_WWW . 'workflow/status'; ?>">
                                        <i class="icon-list-alt"></i>
                                        <span class="submenu-title">Workflow Status</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        $admin_user = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('user', session()->get('menu_items_arr'))) {
                                $admin_user = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_user') == 'ACTIVE') {
                                $admin_user = "block";
                            }
                        } ?>
                        <li style="display: <?php echo $admin_user; ?>" <?php if ($page_code == "user") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'user'; ?>">
                                <i class="icon-user"></i>
                                <span>User</span>
                            </a>
                        </li>

                        <?php
                        $admin_roles = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('roles', session()->get('menu_items_arr'))) {
                                $admin_roles = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_roles') == 'ACTIVE') {
                                $admin_roles = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_roles; ?>" <?php if ($page_code == "roles") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'roles'; ?>">
                                <i class="icon-lock"></i>
                                <span>Roles</span>
                            </a>
                        </li>



                        <?php
                        $admin_forms = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('forms', session()->get('menu_items_arr'))) {
                                $admin_forms = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), '9_admin_forms') == 'ACTIVE') {
                                $admin_forms = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_forms; ?>" <?php if ($page_code == "forms") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'forms/listing'; ?>">
                                <i class="icon-th-list"></i>
                                <span class="submenu-title">Forms</span>
                            </a>
                        </li>

                        <?php
                        $admin_physician = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('physician', session()->get('menu_items_arr'))) {
                                $admin_physician = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_physician') == 'ACTIVE') {
                                $admin_physician = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_physician; ?>" <?php if ($page_code == "physician") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'physician'; ?>">
                                <i class="icon-plus"></i>
                                <span class="submenu-title">Physician</span>
                            </a>
                        </li>

                        <?php
                        $admin_pharmacy = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('pharmacy', session()->get('menu_items_arr'))) {
                                $admin_pharmacy = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_pharmacy') == 'ACTIVE') {
                                $admin_pharmacy = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_pharmacy; ?>" <?php if ($page_code == "pharmacy") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'pharmacy'; ?>">
                                <img width="14px" height="14px" src="<?php echo base_url() . 'assets/img/rx-icon.png' ?>">
                                <span class="submenu-title">Pharmacy</span>
                            </a>
                        </li>

                        <?php
                        $admin_agency = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('agency', session()->get('menu_items_arr'))) {
                                $admin_agency = "none";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_agency') == 'ACTIVE') {
                                $admin_agency = "none";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_agency; ?>" <?php if ($page_code == "agency") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'agency'; ?>">
                                <i class="icon-briefcase"></i>
                                <span class="submenu-title">Agency</span>
                            </a>
                        </li>

                        <?php
                        $admin_care_manager = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('care manager', session()->get('menu_items_arr'))) {
                                $admin_care_manager = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_care manager') == 'ACTIVE') {
                                $admin_care_manager = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_care_manager; ?>" <?php if ($page_code == "caremanager") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'caremanager'; ?>">
                                <i class="icon-briefcase"></i>
                                <span class="submenu-title">Care Manager</span>
                            </a>
                        </li>

                        <?php
                        $admin_care_giver = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('care giver', session()->get('menu_items_arr'))) {
                                $admin_care_giver = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_care giver') == 'ACTIVE') {
                                $admin_care_giver = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_care_giver; ?>" <?php if ($page_code == "caregiver") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'caregiver'; ?>">
                                <i class="icon-briefcase"></i>
                                <span class="submenu-title">Care Giver</span>
                            </a>
                        </li>

                        <?php
                        $admin_hospitals = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('hospitals', session()->get('menu_items_arr'))) {
                                $admin_hospitals = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_hospitals') == 'ACTIVE') {
                                $admin_hospitals = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_hospitals; ?>" <?php if ($page_code == "hospital") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'hospital'; ?>">
                                <i class="icon-hospital"></i>
                                <span class="submenu-title">Hospitals</span>
                            </a>
                        </li>
                        <!-- <li <?php if ($page_code == "restaurant") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'restaurant'; ?>">
                                <i class="icon-glass"></i>
                                <span class="submenu-title">Restaurant</span>
                            </a>
                        </li> -->
                        <!-- <li <?php if ($page_code == "supplier") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'supplier'; ?>">
                                <i class="icon-user-md"></i>
                                <span class="submenu-title">Vendor</span>
                            </a>
                        </li> -->
                        <!-- <li <?php if ($page_code == "driver") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'driver'; ?>">
                                <i class="icon-user"></i>
                                <span class="submenu-title">Driver</span>
                            </a>
                        </li> -->
                        <!-- <li <?php if ($page_code == "transport_route") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'routes'; ?>">
                                <i class="icon-road"></i><span> Routes</span> 
                            </a> 
                        </li>  -->

                        <?php
                        $admin_ambulance = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('ambulance', session()->get('menu_items_arr'))) {
                                $admin_ambulance = "none";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_ambulance') == 'ACTIVE') {
                                $admin_ambulance = "none";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_ambulance; ?>" <?php if ($page_code == "ambulance") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'ambulance'; ?>">
                                <i class="icon-plus-sign"></i>
                                <span class="submenu-title">Ambulance</span>
                            </a>
                        </li>
                        <!-- <li <?php if ($page_code == "locations") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'locations'; ?>">
                                <i class="icon-map-marker"></i>
                                <span class="submenu-title">Field Trip Locations</span>
                            </a>
                        </li> -->
                        <!-- <li <?php if ($page_code == "gifts") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'gifts'; ?>">
                                <i class="icon-gift"></i>
                                <span class="submenu-title">Gifts</span>
                            </a>
                        </li> -->

                        <?php
                        $admin_document_type = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('document type', session()->get('menu_items_arr'))) {
                                $admin_document_type = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_document type') == 'ACTIVE') {
                                $admin_document_type = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_document_type; ?>" class="hassubnav <?php if ($page_code == "document" || $page_code == 'document_list') { ?> active <?php } ?>">

                            <a href="#"><i class="icon-folder-close"></i> Document</a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <li <?php if ($page_code == "document") { ?> class="active" <?php } ?>><a href="<?php echo ROOT_WWW . 'document'; ?>">
                                        <i class="icon-list-alt"></i>
                                        <span class="submenu-title">Document Type</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "document_list") { ?> class="active" <?php } ?>><a href="<?php echo ROOT_WWW . 'document_list'; ?>">
                                        <i class="icon-list-alt"></i>
                                        <span class="submenu-title">Document List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li <?php if ($page_code == "generateforms") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'generateforms'; ?>">
                                <i class="icon-folder-close"></i>
                                <span class="submenu-title">Generate Forms</span>
                            </a>
                        </li> -->

                        <?php
                        $admin_careplan_template = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('careplan template', session()->get('menu_items_arr'))) {
                                $admin_careplan_template = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_careplan template') == 'ACTIVE') {
                                $admin_careplan_template = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_careplan_template; ?>" <?php if ($page_code == "generatecareplans") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'generate_care_plan'; ?>">
                                <i class="icon-folder-close"></i>
                                <span class="submenu-title">Careplan Template</span>
                            </a>
                        </li>
                        <?php
                        $admin_hcpcs_codes = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('hcpcs codes', session()->get('menu_items_arr'))) {
                                $admin_hcpcs_codes = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_hcpcs codes') == 'ACTIVE') {
                                $admin_hcpcs_codes = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_hcpcs_codes; ?>" <?php if ($page_code == "hcpc_codes") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/hcpc-list'; ?>">
                                <i class="icon-key"></i>
                                <span>HCPCS codes</span>
                            </a>
                        </li>
                        <!-- <li <?php if ($page_code == "transportation_range") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'transportation_range'; ?>">
                                <i class="icon-truck"></i>
                                <span>Transportation Range</span>
                            </a>
                        </li> -->
                        <!-- <li <?php if ($page_code == "admin_vehicle") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'vehicle'; ?>">
                                <i class="icon-truck"></i>
                                <span>Vehicle</span>
                            </a>
                        </li> -->

                        <?php
                        $admin_shift = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('shift', session()->get('menu_items_arr'))) {
                                $admin_shift = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_shift') == 'ACTIVE') {
                                $admin_shift = "block";
                            }
                        }
                        ?>
                        <?php
                        $admin_customforms = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('custom form', session()->get('menu_items_arr'))) {
                                $admin_customforms = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_custom form') == 'ACTIVE') {
                                $admin_customforms = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_customforms; ?>" <?php if ($page_code == "customforms") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'custom_forms'; ?>">
                                <i class="icon-folder-close"></i>
                                <span class="submenu-title">Custom Forms-Quiz</span>
                            </a>
                        </li>
                        <?php
                        $admin_caregiver_adl = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('caregiver adl', session()->get('menu_items_arr'))) {
                                $admin_caregiver_adl = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_caregiver adl') == 'ACTIVE') {
                                $admin_caregiver_adl = "block";
                            }
                        }
                        ?>
                        <?php
                        $admin_iadl = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('iadl', session()->get('menu_items_arr'))) {
                                $admin_iadl = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_iadl') == 'ACTIVE') {
                                $admin_iadl = "block";
                            }
                        }
                        ?>
                        <?php
                        $admin_behavior_activity = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('iadl', session()->get('menu_items_arr'))) {
                                $admin_behavior_activity = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_behavior_activity') == 'ACTIVE') {
                                $admin_behavior_activity = "block";
                            }
                        }
                        ?>

                        <?php
                        // Group under Caregiver Settings like Workflow
                        $admin_caregiver_settings = "none";
                        if ($admin_shift == "block" || $admin_caregiver_adl == "block" || $admin_iadl == "block" || $admin_behavior_activity == "block") {
                            $admin_caregiver_settings = "block";
                        }
                        ?>
                        <li style="display: <?php echo $admin_caregiver_settings; ?>" class="hassubnav <?php if ($page_code == "admin_shift" || $page_code == "admin_caregiver_adl" || $page_code == "admin_i_adl" || $page_code == "admin_behavior_activity") {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                            <a href="#"><i class="icon-list-alt"></i> Caregiver Settings</a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <?php if ($admin_shift == "block") { ?>
                                    <li <?php if ($page_code == "admin_shift") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'shift'; ?>">
                                            <i class="icon-plus"></i>
                                            <span class="submenu-title">Schedule Shift</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($admin_caregiver_adl == "block") { ?>
                                    <li <?php if ($page_code == "admin_caregiver_adl") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'caregiver-adl'; ?>">
                                            <i class="icon-plus"></i>
                                            <span class="submenu-title">ADL</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($admin_iadl == "block") { ?>
                                    <li <?php if ($page_code == "admin_i_adl") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'i-adl'; ?>">
                                            <i class="icon-plus"></i>
                                            <span class="submenu-title">IADL</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($admin_behavior_activity == "block") { ?>
                                    <li <?php if ($page_code == "admin_behavior_activity") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'behavior_activity'; ?>">
                                            <i class="icon-plus"></i>
                                            <span class="submenu-title">Behavior</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>

                        <?php
                        $admin_client_program = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('client program', session()->get('menu_items_arr'))) {
                                $admin_client_program = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_client program') == 'ACTIVE') {
                                $admin_client_program = "block";
                            }
                        } ?>
                        <li style="display: <?php echo $admin_client_program; ?>" <?php if ($page_code == "client_program") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'client-program'; ?>">
                                <i class="icon-user"></i>
                                <span>Client Program</span>
                            </a>
                        </li>
                        <?php
                        $level_of_care = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('level of care', session()->get('menu_items_arr'))) {
                                $level_of_care = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_level of care') == 'ACTIVE') {
                                $level_of_care = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $level_of_care; ?>" <?php if ($page_code == "level_of_care") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'level_of_care'; ?>">
                                <i class="icon-plus"></i>
                                <span>Level of care</span>
                            </a>
                        </li>
                        <?php
                        $adl_ques = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('adl questions', session()->get('menu_items_arr'))) {
                                $adl_ques = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_adl_question') == 'ACTIVE') {
                                $adl_ques = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $adl_ques; ?>" <?php if ($page_code == "adl_questions") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'adl_questions'; ?>">
                                <i class="icon-plus"></i>
                                <span>ADL Questions</span>
                            </a>
                        </li>
                        <?php
                        $client_menu_setting = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('client menu setting', session()->get('menu_items_arr'))) {
                                $client_menu_setting = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'client_menu_setting') == 'ACTIVE') {
                                $client_menu_setting = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $client_menu_setting; ?>" <?php if ($page_code == "client_menu_setting") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'client-menu-setting'; ?>">
                                <i class="icon-plus"></i>
                                <span>Client Menu Setting</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php
                $taskmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('task management', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('task management')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '13') == 'ACTIVE') {
                                $taskmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '13') == 'ACTIVE') {
                        $taskmenu = "block";
                    }
                }
                ?>
                <li id="task-iframe" style="display: <?php echo $taskmenu; ?>" class="dropdown <?php if ($page_code == "task-management-dashboard") { ?> active <?php } ?>">
                    <a href="<?php echo base_url() . 'task_management/dashboard'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Tasks.png" class="headimg">
                        <span>Tasks</span><b class="caret"></b>
                    </a>
                </li>
                <?php
                $appointmentmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('appointment', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('appointment')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '146') == 'ACTIVE') {
                                $appointmentmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '146') == 'ACTIVE') {
                        $appointmentmenu = "block";
                    }
                }
                ?>
                <li id="task-iframe" style="display: <?php echo $appointmentmenu; ?>" class="dropdown <?php if ($page_code == "appointment-dashboard" || $page_code == "appointment-priority" || $page_code == "appointment-email-template" || $page_code == "title-management") { ?> active <?php } ?>">
                    <a href="<?php echo base_url() . 'appointment/calendar'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/appointment_icon.png" class="headimg">
                        <span>Appointment</span><b class="caret"></b>
                    </a>
                </li>

                <?php
                //consultant_menu start
                $consultant_menu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('consultant', session()->get('menu_items_arr'))) {
                        if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '14') == 'ACTIVE') {
                            $consultant_menu = "block";
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '14') == 'ACTIVE') {
                        $consultant_menu = "block";
                    }
                }
                ?>

                <!-- consultant_menu end -->

                <!-- Notification start -->
                <?php
                $notificationmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('notification', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('notification')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '57') == 'ACTIVE') {
                                $notificationmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '57') == 'ACTIVE') {
                        $notificationmenu = "block";
                    }
                }
                ?>
                <li class="dropdown <?php
                                    if ($page_code == "notification") {
                                        echo 'active';
                                    }
                                    ?>" style="display: <?php echo $notificationmenu; ?>">
                    <a href="<?php echo base_url() . 'notification-list'; ?>">
                        <!-- <i class="icon-bell-alt custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Notification.png" class="headimg">
                        <span>Notification</span> <b class="caret"></b>
                    </a>
                </li>
                <!-- Notification End -->

                <!-- Fax Notification start -->
                <?php
                $fax_notificationmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('fax', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('fax')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '58') == 'ACTIVE') {
                                $fax_notificationmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '58') == 'ACTIVE') {
                        $fax_notificationmenu = "block";
                    }
                }
                ?>
                <li class="dropdown <?php
                                    if ($page_code == "notification_sent_via_fax") {
                                        echo 'active';
                                    }
                                    ?>" style="display: <?php echo $fax_notificationmenu; ?>">
                    <a href="<?php echo base_url() . 'fax-list'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Fax.png" class="headimg">
                        <span>Fax</span> <b class="caret"></b>
                    </a>
                </li>

                <!-- RPM start -->
                <?php
                $rpm_notificationmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('rpm', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('rpm')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '77') == 'ACTIVE') {
                                $rpm_notificationmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '77') == 'ACTIVE') {
                        $rpm_notificationmenu = "block";
                    }
                }
                ?>
                <li class="dropdown <?php
                                    if ($page_code == "rpm" || $page_code == "generaterpm" || $page_code == "rpm-assesment" || $page_code == "rpm-log" || $page_code == "rpm-remote-call" || $page_code == "rpm-meal-delivered" || $page_code == "rpm-medication-attendance" || $page_code == "rpm-medication-assistancce") {
                                        echo 'active';
                                    }
                                    ?>" style="display: <?php echo $rpm_notificationmenu; ?>">

                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <i class="icon-phone-sign  custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/RPM.png" class="headimg">
                        <span>RPM</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li <?php if ($page_code == "rpm-assesment") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'rpmassessment'; ?>">
                                <i class="icon-user"></i>
                                <span>RPM Assessment</span>
                            </a>
                        </li>
                        <li <?php if ($page_code == "rpm-log") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'rpmlog'; ?>">
                                <i class="icon-phone-sign"></i>
                                <span>RPM Log</span>
                            </a>
                        </li>
                        <li <?php if ($page_code == "rpm") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'rpm'; ?>">
                                <i class="icon-magic"></i>
                                <span>RPM Schedule</span>
                            </a>
                        </li>
                        <li <?php if ($page_code == "generaterpm") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'generaterpm'; ?>">
                                <i class="icon-folder-close"></i>
                                <span class="submenu-title">RPM Template</span>
                            </a>
                        </li>

                        <li class="dropdown <?php if ($page_code == "rpm-remote-call" || $page_code == "rpm-meal-delivered" || $page_code == "rpm-medication-attendance" || $page_code == "rpm-medication-assistancce" || $page_code == "rpm-medication-covid" || $page_code == "rpm-medication-homeservice" || $page_code == "rpm-doctor-appointment" || $page_code == "rpm-log-report" || $page_code == "rpm-assessment-log-report" || $page_code == "rpm-client-log-report") { ?> active <?php } ?>">
                            <a href="javascript:void(0);javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-wrench"></i>
                                <span>Reports</span>
                            </a>
                            <ul class="dropdown-menu span2 leftdd">
                                <li <?php if ($page_code == "rpm-remote-call") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm-reports/1'; ?>">
                                        <img src="<?php echo base_url() . 'assets/img/menu-icons/reports.png'; ?>">
                                        <span>Remote Call Monitoring Attendance</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "rpm-meal-delivered") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm-reports/2'; ?>">
                                        <i class="icon-sitemap"></i>
                                        <span>Meal Delivery</span>
                                    </a>
                                </li>

                                <li <?php if ($page_code == "rpm-medication-attendance") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm-reports/3'; ?>">
                                        <i class="icon-calendar"></i>
                                        <span>Medication Attendance</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "rpm-medication-assistancce") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm-reports/4'; ?>">
                                        <i class="icon-user-md"></i>
                                        <span>Need Medication</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "rpm-medication-covid") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm-reports/5'; ?>">
                                        <i class="icon-certificate"></i>
                                        <span>COVID-19</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "rpm-medication-homeservice") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm-reports/6'; ?>">
                                        <i class="icon-road"></i>
                                        <span>Face to Face Visit</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "rpm-doctor-appointment") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm-reports/7'; ?>">
                                        <i class="icon-briefcase"></i>
                                        <span>Doctor Appointment</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "rpm-log-report") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm/rpm_log_report'; ?>">
                                        <i class="icon-bell"></i>
                                        <span>Facility Daily Log</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "rpm-assessment-log-report") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm/rpm_assessment_log_report'; ?>">
                                        <i class="icon-screenshot"></i>
                                        <span>Client Assessment Log</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "rpm-client-log-report") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'rpm/rpm_client_log_report'; ?>">
                                        <i class="icon-bullseye"></i>
                                        <span>Client Log</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <?php
                $shift_calendar = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('shift calendar', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('shift calendar')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '82') == 'ACTIVE') {
                                $shift_calendar = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '82') == 'ACTIVE') {
                        $shift_calendar = "block";
                    }
                }
                ?>
                <li style="display: <?php echo $shift_calendar; ?>" <?php if ($page_code == "admin_calendar") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'shift-calendar'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Calender.png" class="headimg">
                        <span class="submenu-title">Calendar</span>
                    </a>
                </li>

                <?php
                $shift_organize = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('organize', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('organize')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_organize') == 'ACTIVE') {
                                $shift_organize = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_organize') == 'ACTIVE') {
                        $shift_organize = "block";
                    }
                }
                ?>
                <li style="display: <?php echo $shift_organize; ?>" <?php if ($page_code == "organize") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'organize'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Organize.png" class="headimg">
                        <span class="submenu-title">Organize</span>
                    </a>
                </li>
                <?php
                $quality_check = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('quality check', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('quality check')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_quality check') == 'ACTIVE') {
                                $quality_check = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_quality check') == 'ACTIVE') {
                        $quality_check = "block";
                    }
                }
                ?>
                <li style="display: <?php echo $quality_check; ?>" <?php if ($page_code == "quality_check") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'quality_check'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/QA.png" class="headimg">
                        <span class="submenu-title">QA</span>
                    </a>
                </li>
                <?php
                $crmmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('crm', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('crm')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '12') == 'ACTIVE') {
                                $crmmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '12') == 'ACTIVE') {
                        $crmmenu = "block";
                    }
                }
                ?>
                <li style="display: <?php echo $crmmenu; ?>" class="dropdown <?php if ($page_code == "crm-lead" || $page_code == "crm-client" || $page_code == "crm-activities" || $page_code == "crm-contact" || $page_code == "crm-setting-source" || $page_code == "crm-setting-status" || $page_code == "crm-setting-priority" || $page_code == "crm-setting-subject" || $page_code == "crm-reports-lead") { ?> active <?php } ?>">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/CRM.png" class="headimg">
                        <span>CRM</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li <?php if ($page_code == "crm-lead") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'crm'; ?>">
                                <i class="icon-magic"></i>
                                <span>Lead</span>
                            </a>
                        </li>

                        <li <?php if ($page_code == "crm-client") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'crm/clientList'; ?>">
                                <i class="icon-user"></i>
                                <span>Client</span>
                            </a>
                        </li>



                        <li <?php if ($page_code == "crm-activities") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'crm/activitiesList'; ?>">
                                <i class="icon-retweet"></i>
                                <span>Activities</span>
                            </a>
                        </li>


                        <li class="dropdown <?php if ($page_code == "crm-setting-source" || $page_code == "crm-setting-status" || $page_code == "crm-setting-priority" || $page_code == "crm-setting-subject") { ?> active <?php } ?>">
                            <a href="javascript:void(0);javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-wrench"></i>
                                <span>Settings</span>
                            </a>

                            <ul class="dropdown-menu span2">
                                <li <?php if ($page_code == "crm-setting-source") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'crm/source_list'; ?>">
                                        <i class="icon-globe"></i>
                                        <span>Lead Source</span>
                                    </a>
                                </li>

                                <li <?php if ($page_code == "crm-setting-status") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'crm/status_list'; ?>">
                                        <i class="icon-tag"></i>
                                        <span>Lead Status</span>
                                    </a>
                                </li>

                                <li <?php if ($page_code == "crm-setting-priority") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'crm/priority_list'; ?>">
                                        <i class="icon-bookmark"></i>
                                        <span>Priority</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "crm-setting-subject") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'crm/subject_list'; ?>">
                                        <i class="icon-reorder"></i>
                                        <span>Task Subject</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "crm-setting-call-purpose") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'crm/call_purpose_list'; ?>">
                                        <i class="icon-reorder"></i>
                                        <span>Call Purpose</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown <?php if ($page_code == "crm-reports-lead") { ?> active <?php } ?>">
                            <a href="javascript:void(0);javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-list"></i>
                                <span>Reports</span>
                            </a>

                            <ul class="dropdown-menu span2">
                                <li <?php if ($page_code == "crm-reports-lead") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'crm/lead_report'; ?>">
                                        <i class="icon-globe"></i>
                                        <span>Lead</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <?php
                $billingmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('billing', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('billing')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '11') == 'ACTIVE') {
                                $billingmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '11') == 'ACTIVE') {
                        $billingmenu = "block";
                    }
                }
                ?>
                <li class="dropdown <?php
                                    if ($page_code == "billing-client" || $page_code == "payer" || $page_code == "items" || $page_code == "claim-batches" || $page_code == "claim-status" || $page_code == "remit-payments" || $page_code == "remit_payment" || $page_code == "invoices" || $page_code == "billing-report" || $page_code == "hcpc_codes" || $page_code == "hcpc codes" || $page_code == "billing-aging-report" || $page_code == "invoice-sales-report" || $page_code == "claim-sales-report" || $page_code == "statement" || $page_code == "claimstatement" || $page_code == "billing-export-list" || $page_code == "pay-rate" || $page_code == "rejected_claims" || $page_code == 'remit-payments') {
                                        echo 'active';
                                    }
                                    ?>" style="display: <?php echo $billingmenu; ?>">

                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Billing.png" class="headimg">
                        <span>Billing</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li <?php if ($page_code == "billing-client") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/clients'; ?>">
                                <img src="<?php echo base_url() . 'assets/img/menu-icons/clients.png'; ?>">
                                <span>Clients</span>
                            </a>
                        </li>

                        <li <?php if ($page_code == "payer") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/payer'; ?>">
                                <img src="<?php echo base_url() . 'assets/img/menu-icons/payer.png'; ?>">
                                <span>Payer</span>
                            </a>
                        </li>

                        <li <?php if ($page_code == "hcpc_codes" || $page_code == "hcpc codes") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/hcpc-list'; ?>">
                                <i class="icon-key"></i>
                                <span>HCPCS codes</span>
                            </a>
                        </li>

                        <li <?php if ($page_code == "items") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/items'; ?>">
                                <img src="<?php echo base_url() . 'assets/img/menu-icons/items.png'; ?>">
                                <span>Private Pay Items</span>
                            </a>
                        </li>

                        <li <?php if ($page_code == "claim-batches") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/claim-batches'; ?>">
                                <img src="<?php echo base_url() . 'assets/img/menu-icons/claim-batches.png'; ?>">
                                <span>Claim Batches</span>
                            </a>
                        </li>
                        <li <?php if ($page_code == "remit-payments") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/remit-payments'; ?>">
                                <i class="icon-dollar"></i>
                                <span>Remit Payments</span>
                            </a>
                        </li>


                        <!--                       <li <?php if ($page_code == "claim-status") { ?> class="active" <?php } ?>>
                            <a href="#">
                                <img src="<?php echo base_url() . 'assets/img/menu-icons/claim-batches.png'; ?>">
                                <span>Claim Status</span>
                            </a>
                        </li> -->

                        <!--                         <li <?php if ($page_code == "remit_payment") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/remit-payment'; ?>">
                                <img src="<?php echo base_url() . 'assets/img/menu-icons/remit-payment.png'; ?>">
                                <span>Remit Payments</span>
                            </a>
                        </li>

                        <li <?php if ($page_code == "rejected_claims") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/rejected_claims'; ?>">
                                <i class="icon-retweet"></i><span> Rejected Claims</span>
                            </a>
                        </li> -->

                        <li <?php if ($page_code == "invoices") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/invoices'; ?>">
                                <img src="<?php echo base_url() . 'assets/img/menu-icons/invoice.png'; ?>">
                                <span>Invoices</span>
                            </a>
                        </li>

                        <li <?php if ($page_code == "billing-export-list") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/exportListings'; ?>">
                                <i class="icon-book"></i>
                                <span>Quickbook</span>
                            </a>
                        </li>

                        <li <?php if ($page_code == "pay-rate") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'billing/payrate'; ?>">
                                <i class="icon-book"></i>
                                <span>Pay Rate</span>
                            </a>
                        </li>

                        <li class="dropdown <?php if ($page_code == "billing-report" || $page_code == "crm-setting-status" || $page_code == "crm-setting-priority" || $page_code == "crm-setting-subject" || $page_code == "billing-aging-report" || $page_code == "invoice-sales-report" || $page_code == "claim-sales-report" || $page_code == "statement" || $page_code == "claimstatement") { ?> active <?php } ?>">
                            <a href="javascript:void(0);javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-wrench"></i>
                                <span>Reports</span>
                            </a>

                            <ul class="dropdown-menu span2">


                                <li <?php if ($page_code == "billing-aging-report") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'billing/agingReport'; ?>">
                                        <i class="icon-money"></i>
                                        <span>Aging</span>
                                    </a>
                                </li>

                                <li <?php if ($page_code == "invoice-sales-report") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'billing/invoice-sales-report'; ?>">
                                        <i class="icon-cogs"></i>
                                        <span>Invoice Sales</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "claim-sales-report") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'billing/claim-sales-report'; ?>">
                                        <i class="icon-calendar"></i>
                                        <span>Claim Sales</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "claim-payment-report") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'billing_report/claim_payment'; ?>">
                                        <i class="icon-dollar"></i>
                                        <span>Claim Payment</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "claim-denied-report") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'billing_report/claim_denied'; ?>">
                                        <i class="icon-dollar"></i>
                                        <span>Claim Denied</span>
                                    </a>
                                </li>
                                <li <?php if ($page_code == "statement") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'billing/statement'; ?>">
                                        <img src="<?php echo base_url() . 'assets/img/menu-icons/items.png'; ?>">
                                        <span class="submenu-title">Statement - Invoice</span>
                                    </a>
                                </li>

                                <li <?php if ($page_code == "claimstatement") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'billing/statement_claim'; ?>">
                                        <img src="<?php echo base_url() . 'assets/img/menu-icons/items.png'; ?>">
                                        <span class="submenu-title">Statement - Claim</span>
                                    </a>
                                </li>


                            </ul>
                        </li>

                    </ul>
                </li>
                <?php
                $care_note = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver care note', session()->get('menu_items_arr')) || in_array('caregiver iadl', session()->get('menu_items_arr')) || in_array('caregiver behavior', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver care note')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver care note') == 'ACTIVE') {
                                $care_note = "block";
                            }
                        }
                        if (careMemberAccess('caregiver iadl')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver IADL') == 'ACTIVE') {
                                $care_note = "block";
                            }
                        }
                        if (careMemberAccess('caregiver behavior')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver behavior') == 'ACTIVE') {
                                $care_note = "block";
                            }
                        }
                    }
                }
                ?>
                <li style="display: <?php echo $care_note; ?>" <?php if ($page_code == "care_log") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'care_note'; ?>">
                        <!-- <i class="icon-list-alt custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Carenote.png" class="headimg">
                        <span class="submenu-title">Care Log</span>
                    </a>
                </li>

                <?php
                $caregiver_training = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver traning', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver traning')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver traning') == 'ACTIVE') {
                                $caregiver_training = "block";
                            }
                        }
                    }
                }
                ?>
                <li style="display: <?php echo $caregiver_training; ?>" <?php if ($page_code == "documents") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'caregiver-documents'; ?>">
                        <!-- <i class="icon-list-alt custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Training.png" class="headimg">
                        <span class="submenu-title">Training</span>
                    </a>
                </li>

                <?php
                $caregiver_document = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver document', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver document')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver document') == 'ACTIVE') {
                                $caregiver_document = "block";
                            }
                        }
                    }
                }
                ?>
                <li style="display: <?php echo $caregiver_document; ?>" <?php if ($page_code == "document") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'caregiver-document'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Documents.png" class="headimg">
                        <span class="submenu-title">Document</span>
                    </a>
                </li>
                <?php
                $caregiver_behavior = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver behavior', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver behavior')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver behavior') == 'ACTIVE') {
                                $caregiver_behavior = "none";
                            }
                        }
                    }
                }
                ?>
                <li style="display: <?php echo $caregiver_behavior; ?>" <?php if ($page_code == "behavior") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'behavior'; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Carenote.png" class="headimg">
                        <span class="submenu-title">Behavior</span>
                    </a>
                </li>

                <?php
                $caregiver_documentation = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver documentation', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver documentation')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver documentation') == 'ACTIVE') {
                                $caregiver_documentation = "block";
                            }
                        }
                    }
                }
                ?>
                <li style="display: <?php echo $caregiver_documentation; ?>" <?php if ($page_code == "caregiver_form") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'caregiver-form'; ?>">
                        <!-- <i class="icon-list-alt custmenuadj"></i> -->
                        <!-- <span class="submenu-title">Documentation</span> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Form.png" class="headimg">
                        <span class="submenu-title">Forms</span>
                    </a>
                </li>
                <?php
                $quiz_form = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver quiz', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver quiz')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver quiz') == 'ACTIVE') {
                                $quiz_form = "block";
                            }
                        }
                    }
                }
                ?>
                <li style="display: <?php echo $quiz_form; ?>" <?php if ($page_code == "quiz_form") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'quiz-form'; ?>">
                        <!-- <i class="icon-list-alt custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Quiz.png" class="headimg">
                        <span class="submenu-title">Quiz</span>
                    </a>
                </li>

                <?php
                $caregiver_calendar = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver calendar', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver calendar')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver calendar') == 'ACTIVE') {
                                $caregiver_calendar = "block";
                            }
                        }
                    }
                }
                $caregiver_id = client_id_by_user_id_for_caregiver(session()->get('user_id'), 'emc_id');
                ?>
                <li style="display: <?php echo $caregiver_calendar; ?>" <?php if ($page_code == "admin_calendar") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'shift-calendar?caregiver_list=' . $caregiver_id; ?>">
                        <!-- <i class="icon-list-alt custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Calender.png" class="headimg">
                        <span class="submenu-title">Calendar</span>
                    </a>
                </li>

                <?php

                $caregiver_appointment = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver appointment', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver appointment')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver appointment') == 'ACTIVE') {
                                $caregiver_appointment = "block";
                            }
                        }
                    }
                }
                ?>
                <li style="display: <?php echo $caregiver_appointment; ?>" <?php if ($page_code == "task-management-dashboard") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'appointment/calendar'; ?>">
                        <!-- <i class="icon-list-alt custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Appointment.png" class="headimg">
                        <span class="submenu-title">Appointment</span>
                    </a>
                </li>
                <?php
                // echo "<pre>";print_r(session()->get('menu_items_arr'));die();
                $ciadl = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('caregiver iadl', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('caregiver iadl')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'caregiver_caregiver IADL') == 'ACTIVE') {
                                $ciadl = "none";
                            }
                        }
                    }
                }
                ?>
                <li style="display: <?php echo $ciadl; ?>" <?php if ($page_code == "caregiver_iadl") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'care_note/Iadl'; ?>">
                        <!-- <i class="icon-list-alt custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Carenote.png" class="headimg">
                        <span class="submenu-title">IADL</span>
                    </a>
                </li>
                <?php
                $timecardmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('time card', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('time card')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '3') == 'ACTIVE') {
                                $timecardmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '3') == 'ACTIVE') {
                        $timecardmenu = "block";
                    }
                }

                ?>
                <li style="display: <?php echo $timecardmenu; ?>" <?php if ($page_code == "timecard") { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url() . 'timecard_menu'; ?>">
                        <!-- <i class="icon-time custmenuadj"></i> -->
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/timeclock.png" class="headimg">
                        <span class="submenu-title">Time Clock</span>
                    </a>
                </li>

                <?php
                $reportmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('report', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('report')) {
                            if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '6') == 'ACTIVE') {
                                $reportmenu = "block";
                            }
                        }
                    }
                } else {
                    if (getMenuAccessForDcc(session()->get('usr_dcc_id'), '6') == 'ACTIVE') {
                        $reportmenu = "block";
                    }
                }
                ?>
                <?php
                if ($page_code == "admission" || $page_code == "admission_clinical" || $page_code == "admission_missing_notes" || $page_code == "reports" || $page_code == "allergy" || $page_code == "assessment_completed" || $page_code == "attendance_followup" || $page_code == "badge" || $page_code == "behaviour" || $page_code == "birthday" || $page_code == "caregiver_birthday" || $page_code == "cpcreport" || $page_code == "ccpcreport" || $page_code == "cpreport" || $page_code == "dashboard" || $page_code == "analyticaldashboard" || $page_code == "physiciandetails" || $page_code == "physiciansummary" || $page_code == "fall_risk" || $page_code == "employee_certification_expiration" || $page_code == "facility_expiration" || $page_code == "view_due_items" || $page_code == "payer_missing_for_approved" || $page_code == "timeandattendance" || $page_code == "timeandattendancefacility" || $page_code == "timeandattendanceavg" || $page_code == "weight_alert" || $page_code == "wandering_risk" || $page_code == "vitalreport" || $page_code == "transportationreport" || $page_code == "pending_authorization" || $page_code == "payer_missing_for_approved" || $page_code == "reports_dashboard" || $page_code == "mltssreport" || $page_code == "meal_tracking_name" || $page_code == "meal_tracking_facility" || $page_code == "meal_tracking" || $page_code == "immunizationreport" || $page_code == "top_ten_icd_cod" || $page_code == "special_care" || $page_code == "hosp_outcome" || $page_code == "handpreport" || $page_code == "facility_attendance" || $page_code == "eligibilityreport" || $page_code == "billing-eligibility-report" || $page_code == "driver_report" || $page_code == "discharge" || $page_code == "level_of_care" || $page_code == "ccpreport" || $page_code == "census_retro_report" || $page_code == "census_data_report" || $page_code == "attendance_exception" || $page_code == "assessment_compliance" || $page_code == "meal_count_type_report" || $page_code == "medication_outcome" || $page_code == "meal_auto_schedule" || $page_code == "meal_count" || $page_code == "licenseExpreport" || $page_code == "progress_notes" || $page_code == "anniversary_report" || $page_code == "client_diet_plan" || $page_code == "emergencycontact_report" || $page_code == "forecast_attd_facility" || $page_code == "forecast_attd_payer" || $page_code == "meal_cacfp_billing" || $page_code == "forecast_attd_facility_new" || $page_code == "forecast_attd_payer_new" || $page_code == "play_activity_report" || $page_code == "caregiver_missing_care_note"  || $page_code == "follow_up_notes" || $page_code == "hospitalization_report" || $page_code == "care_manger_client_report" || $page_code == "assessment_visit_report"  || $page_code == "caregiver_payment" || $page_code == "caregiver_missing_notes" || $page_code == "client_billing_report" || $page_code == "stipend_payment_record" || $page_code == "care_giver_payment_ytd" || $page_code == "shift_report" || $page_code == "appointment_visit_report" || $page_code == "sms-log-report" || $page_code == 'due_referral_notes' || $page_code == 'caregiver_hire_date_report' || $page_code == "suspension_reason" || $page_code == "leave_record_report" || $page_code == "backgroundcheckreport"  || $page_code == "otherdetailsreport" || $page_code == "cn_signature_missing" || $page_code == "referral_admitted" || $page_code == "cn_missing_signature") {
                    $reportclass = 'class="active dropdown"';
                } else {
                    $reportclass = 'class="dropdown"';
                }
                ?>
                <li <?php echo $reportclass; ?> style="display: <?php echo $reportmenu; ?>">
                    <a id="reportsmainmenu" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/Reports.png" class="headimg">
                        <span>Reports</span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $Admission_report = "display:none";
                        if (session()->get('sub_menu_access')['admin_admission_reports']['view'] === 1 || session()->get('sub_menu_access')['admission_discharge']['view'] === 1 || session()->get('sub_menu_access')['admission_level_of_care']['view'] === 1 || session()->get('sub_menu_access')['discharge_reason']['view'] === 1 || session()->get('sub_menu_access')['caregiver_hired_date']['view'] === 1  || session()->get('sub_menu_access')['suspension_reason']['view'] === 1 || session()->get('sub_menu_access')['admin_suspension_report']['view'] === 1 || session()->get('sub_menu_access')['admin_leave_record_report']['view'] === 1) {
                            $Admission_report = "display:block";
                        }
                        ?>
                        <li class="hassubnav <?php
                                                if ($page_code == "admission" || $page_code == "admission_clinical" || $page_code == "admission_missing_notes" || $page_code == "discharge" || $page_code == "level_of_care" || $page_code == "discharge_reason_report" || $page_code == "suspension_reason" || $page_code == "suspension_report" || $page_code == "leave_record_report") {
                                                    echo 'active';
                                                }
                                                ?>" style="<?php echo $Admission_report; ?>">
                            <a href="#" style="font-size: 13px;"><b><i class="icon-plus-sign"></i> Admission</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <?php if (session()->get('sub_menu_access')['admin_admission_reports']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "admission") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/admission_data'; ?>">
                                            <i class="icon-user"></i>
                                            <span class="submenu-title">Admission</span>
                                        </a>
                                    </li>
                                <?php } ?>

                                <?php if (session()->get('sub_menu_access')['admission_discharge']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "discharge") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/discharge_data'; ?>">
                                            <i class="icon-signal"></i>
                                            <span class="submenu-title">Discharge </span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['discharge_reason']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "discharge_reason_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/discharge_reason_report_data'; ?>">
                                            <i class="icon-retweet"></i>
                                            <span class="submenu-title">Discharge Challange</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['admission_level_of_care']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "level_of_care") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/level_of_care_data'; ?>">
                                            <i class="icon-eye-open"></i>
                                            <span class="submenu-title">Level of Care </span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['suspension_reason']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "suspension_reason") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/suspension_data'; ?>">
                                            <i class="icon-ban-circle"></i>
                                            <span class="submenu-title">Suspension </span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['admin_suspension_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "suspension_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/suspension_report'; ?>">
                                            <i class="icon-list-alt"></i>
                                            <span class="submenu-title">Suspension Report</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['admin_leave_record_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "leave_record_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/leave_record_report'; ?>">
                                            <i class="icon-calendar"></i>
                                            <span class="submenu-title">Leave Record Report</span>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>

                        <?php
                        $administrator_report = "display:none";
                        if (session()->get('sub_menu_access')['administrator_cli_address_labels']['view'] === 1 || session()->get('sub_menu_access')['admin_administrator_reports']['view'] === 1 || session()->get('sub_menu_access')['administrator_birthday']['view'] === 1 || session()->get('sub_menu_access')['administrator_caregiverbirthday']['view'] === 1 || session()->get('sub_menu_access')['administrator_emergency_contact']['view'] === 1  || session()->get('sub_menu_access')['administrator_physician_reports']['view'] === 1 || session()->get('sub_menu_access')['administrator_physician_summary_reports']['view'] === 1 || session()->get('sub_menu_access')['administrator_progress_notes']['view'] === 1 || session()->get('sub_menu_access')['administrator_doc_exp_report']['view'] === 1) {
                            $administrator_report = "display:block";
                        }
                        ?>
                        <li class="hassubnav <?php
                                                if ($page_code == "badge" || $page_code == "birthday" || $page_code == "caregiver_birthday" || $page_code == "mltssreport" || $page_code == "physiciandetails" || $page_code == "physiciansummary" || $page_code == "progress_notes" || $page_code == "anniversary_report" || $page_code == "emergencycontact_report") {
                                                    echo 'active';
                                                }
                                                ?>" style="<?php echo $administrator_report; ?>">
                            <a href="#" style="font-size: 13px;"><b><i class="icon-pushpin"></i> Administrator</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">

                                <?php if (session()->get('sub_menu_access')['admin_administrator_reports']['view'] === 1) { ?>

                                    <li <?php if ($page_code == "anniversary_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/anniversary_report_data'; ?>">
                                            <i class="icon-screenshot"></i>
                                            <span class="submenu-title">Anniversary</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['administrator_birthday']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "birthday") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/birthday_data'; ?>">
                                            <i class="icon-music"></i>
                                            <span class="submenu-title">Birthday</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['administrator_caregiverbirthday']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "caregiver_birthday") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/caregiver_birthday_data'; ?>">
                                            <i class="icon-music"></i>
                                            <span class="submenu-title">Caregiver Birthday</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['administrator_cli_address_labels']['view'] === 1) { ?>

                                    <li <?php if ($page_code == "badge") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/badge_report_data'; ?>">
                                            <i class="icon-screenshot"></i>
                                            <!-- <span class="submenu-title">Badge</span> -->
                                            <span class="submenu-title">Client Address Labels</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['administrator_doc_exp_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "doc_expiration_report") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/doc_expiration_report_data'; ?>">
                                            <i class="icon-money"></i>
                                            <span class="submenu-title">Document Expiration</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['administrator_emergency_contact']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "emergencycontact_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/emergencycontact_report_data'; ?>">
                                            <i class="icon-user"></i>
                                            <span class="submenu-title">Emergency Contact</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['administrator_physician_reports']['view'] === 1) { ?>


                                    <li <?php if ($page_code == "physiciandetails") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/physician_merged_report'; ?>">
                                            <i class="icon-user-md"></i>
                                            <span class="submenu-title">Physician</span>
                                        </a>
                                    </li>
                                <?php }  /* if (session()->get('sub_menu_access')['administrator_physician_summary_reports']['view'] === 1) {?>
                                <li <?php if ($page_code == "physiciansummary") { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url() . 'reports/physician_summary_report'; ?>">
                                        <i class="icon-briefcase"></i>
                                        <span class="submenu-title">Physician Summary</span>
                                    </a>
                                </li>
                                <?php }  */
                                if (session()->get('sub_menu_access')['administrator_progress_notes']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "progress_notes") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/progress_notes_data'; ?>">
                                            <i class="icon-money"></i>
                                            <span class="submenu-title">Progress Notes</span>
                                        </a>
                                    </li>
                                <?php }   ?>
                                <?php if (session()->get('sub_menu_access')['sms_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "sms-log-report") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/sms_log_report'; ?>">
                                            <i class="icon-comments"></i>
                                            <span class="submenu-title">SMS Log</span>
                                        </a>
                                    </li>
                                <?php }  ?>
                            </ul>
                        </li>

                        <?php
                        $billing_report = "display:none";
                        if (session()->get('sub_menu_access')['admin_billing_reports']['view'] === 1 || session()->get('sub_menu_access')['billing_client_billing']['view'] === 1 || session()->get('sub_menu_access')['billing_eligibility_exp']['view'] === 1 || session()->get('sub_menu_access')['billing_missing_payer_approved']['view'] === 1 || session()->get('sub_menu_access')['billing_pending_auth']['view'] === 1 || session()->get('sub_menu_access')['billing_careteam_payment_report']['view'] === 1) {
                            $billing_report = "display:block";
                        }
                        ?>
                        <li class="hassubnav <?php
                                                if ($page_code == "eligibilityreport" || $page_code == "payer_missing_for_approved" || $page_code == "pending_authorization" || $page_code == "billing-eligibility-report"   || $page_code == "client_billing_report" || $page_code == "stipend_payment_record") {
                                                    echo 'active';
                                                }
                                                ?>" style="<?php echo $billing_report; ?>">
                            <a href="#" style="font-size: 13px;"><b><i class="icon-money"></i> Billing</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <?php if (session()->get('sub_menu_access')['admin_billing_reports']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "billing-eligibility-report") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/activeEligibilityReport'; ?>">
                                            <img src="<?php echo base_url() . 'assets/img/menu-icons/reports.png'; ?>">
                                            <span>Active Eligibility</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['billing_client_billing']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "client_billing_report") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/client_billing_report_data'; ?>">
                                            <i class="icon-sitemap"></i>
                                            <span class="submenu-title">Client Billing</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['billing_eligibility_exp']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "eligibilityreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/eligibility_data'; ?>">
                                            <i class="icon-money"></i>
                                            <span class="submenu-title">Eligibility Expiration</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['billing_missing_payer_approved']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "payer_missing_for_approved") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/payer_missing_for_approved_report_data'; ?>">
                                            <i class="icon-undo"></i>
                                            <span class="submenu-title">Payer Missing For Approved</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['billing_pending_auth']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "pending_authorization") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/pending_authorization_data'; ?>">
                                            <i class="icon-group"></i>
                                            <span class="submenu-title">Pending Authorization</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>

                        <?php
                        $clinical_report = "display:none";
                        if (session()->get('sub_menu_access')['admin_clinical_reports']['view'] === 1 || session()->get('sub_menu_access')['clinical_assessment_report']['view'] === 1 || session()->get('sub_menu_access')['clinical_careplan_compliance']['view'] === 1 || session()->get('sub_menu_access')['clinical_careplan_due']['view'] === 1 || session()->get('sub_menu_access')['clinical_checklist_compliance']['view'] === 1 || session()->get('sub_menu_access')['clinical_checklist_due']['view'] === 1 || session()->get('sub_menu_access')['clinical_fallrisk_Assessment']['view'] === 1 || session()->get('sub_menu_access')['clinical_Hospitalization_outcome']['view'] === 1 || session()->get('sub_menu_access')['clinical_immunization_exp']['view'] === 1 || session()->get('sub_menu_access')['clinical_incident_report']['view'] === 1 || session()->get('sub_menu_access')['clinical_medication_outcome']['view'] === 1 || session()->get('sub_menu_access')['clinical_top_11_icd']['view'] === 1 || session()->get('sub_menu_access')['clinical_vital_alert']['view'] === 1 || session()->get('sub_menu_access')['clinical_wandering_risk']['view'] === 1 || session()->get('sub_menu_access')['clinical_weight_alert']['view'] === 1 || session()->get('sub_menu_access')['admin_hospitalization report']['view'] === 1) {
                            $clinical_report = "display:block";
                        }
                        ?>
                        <li class="hassubnav <?php
                                                if ($page_code == "allergy" || $page_code == "assessment_completed" || $page_code == "cpcreport"  || $page_code == "ccpcreport" || $page_code == "ccpreport" || $page_code == "fall_risk" || $page_code == "hosp_outcome" || $page_code == "immunizationreport" || $page_code == "top_ten_icd_cod" || $page_code == "vitalreport" || $page_code == "wandering_risk" || $page_code == "weight_alert" || $page_code == "medication_outcome" || $page_code == "incident_notes" || $page_code == "hospitalization_report") {
                                                    echo 'active';
                                                }
                                                ?>" style="<?php echo $clinical_report; ?>">
                            <a href="#" style="font-size: 13px;"><b><i class="icon-user-md"></i> Clinical</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <?php if (session()->get('sub_menu_access')['admin_clinical_reports']['view'] === 1) {?> 
                                <li <?php if ($page_code == "allergy") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/allergy_data'; ?>">
                                        <i class="icon-pushpin"></i>
                                        <span class="submenu-title">Allergy</span>
                                    </a>
                                </li>
                                <?php } if (session()->get('sub_menu_access')['clinical_assessment_report']['view'] === 1) {?>
                                <li <?php if ($page_code == "assessment_completed") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/assessment_completed_report_data'; ?>">
                                        <i class="icon-pushpin"></i>
                                        <span class="submenu-title">Assessment</span>
                                    </a>
                                </li>
                                <?php } if (session()->get('sub_menu_access')['clinical_careplan_compliance']['view'] === 1) {?>
                                <li <?php if ($page_code == "cpcreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/cpcdue_data'; ?>">
                                        <i class="icon-th-list"></i>
                                        <span class="submenu-title">Care Plan – Compliance</span>
                                    </a>
                                </li>
                                
                                <?php } if (session()->get('sub_menu_access')['clinical_checklist_compliance']['view'] === 1) {?>
                                <li <?php if ($page_code == "ccpcreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/ccpcdue_data'; ?>">
                                        <i class="icon-th-large"></i>
                                        <span class="submenu-title">Checklist Care Plan – Compliance</span>
                                    </a>
                                </li>
                                <?php } if (session()->get('sub_menu_access')['clinical_checklist_due']['view'] === 1) {?>
                                <li <?php if ($page_code == "ccpreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/ccpdue_data'; ?>">
                                        <i class="icon-reorder"></i>
                                        <span class="submenu-title">Checklist Care Plan - Due</span>
                                    </a>
                                </li>
                                 <?php } if (session()->get('sub_menu_access')['clinical_fallrisk_Assessment']['view'] === 1) {?>
                                <li <?php if ($page_code == "fall_risk") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/fall_risk_report_data'; ?>">
                                        <i class="icon-bullseye"></i>
                                        <span class="submenu-title">Fall Risk Assessment</span>
                                    </a>
                                </li>
                                <?php }  if (session()->get('sub_menu_access')['admin_hospitalization report']['view'] === 1) {?>
                                <li <?php if ($page_code == "hospitalization_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/hospitalization-report'; ?>">
                                        <i class="icon-sitemap"></i>
                                        <span class="submenu-title">Hospitalization</span>
                                    </a>
                                </li>
                                <?php } if (session()->get('sub_menu_access')['clinical_Hospitalization_outcome']['view'] === 1) {?>
                                <li <?php if ($page_code == "hosp_outcome") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/hosp_outcome_data'; ?>">
                                        <i class="icon-fire"></i>
                                        <span class="submenu-title">Hospitalization Outcome</span>
                                    </a>
                                </li>
                                    <?php } if (session()->get('sub_menu_access')['clinical_immunization_exp']['view'] === 1) {?>
                                <li <?php if ($page_code == "immunizationreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/immunizationexpiration_data'; ?>">
                                        <i class="icon-sitemap"></i>
                                        <span class="submenu-title">Immunization Expiration</span>
                                    </a>
                                </li>
                                     <?php } if (session()->get('sub_menu_access')['clinical_incident_report']['view'] === 1) {?>
                                <li <?php if ($page_code == "incident_notes") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/incident_report_data'; ?>">
                                        <i class="icon-signin"></i>
                                        <span class="submenu-title">Incident</span>
                                    </a>
                                </li>
                                 <?php } if (session()->get('sub_menu_access')['clinical_medication_outcome']['view'] === 1) {?>
                                <li <?php if ($page_code == "medication_outcome") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/medication_outcome'; ?>">
                                        <i class="icon-sitemap"></i>
                                        <span class="submenu-title">Medication Outcome</span>
                                    </a>
                                </li>
                                 <?php } if (session()->get('sub_menu_access')['clinical_top_11_icd']['view'] === 1) {?>
                                <li <?php if ($page_code == "top_ten_icd_cod") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/top_ten_icd_cod_data'; ?>">
                                        <i class="icon-sitemap"></i>
                                        <span class="submenu-title">Top 10 ICD Code</span>
                                    </a>
                                </li>
                                <?php } if (session()->get('sub_menu_access')['clinical_vital_alert']['view'] === 1) {?>
                                <li <?php if ($page_code == "vitalreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/vitals_data'; ?>">
                                        <i class="icon-user-md"></i>
                                        <span class="submenu-title">Vitals Alert</span>
                                    </a>
                                </li>
                                <?php } if (session()->get('sub_menu_access')['clinical_wandering_risk']['view'] === 1) {?>
                                <li <?php if ($page_code == "wandering_risk") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/wanderingRisk_data'; ?>">
                                        <i class="icon-dribbble"></i>
                                        <span class="submenu-title">Wandering Risk</span>
                                    </a>
                                </li>
                                <?php } if (session()->get('sub_menu_access')['clinical_weight_alert']['view'] === 1) {?>
                                <li <?php if ($page_code == "weight_alert") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/weightAlert_data'; ?>">
                                        <i class="icon-bullhorn"></i>
                                        <span class="submenu-title">Weight Alert</span>
                                    </a>
                                </li>
                                <?php } ?>

                            </ul>
                        </li>

                        <?php
                        $compliance_report = "display:none";
                        if (session()->get('sub_menu_access')['compliance_analytical_report']['view'] === 1 || session()->get('sub_menu_access')['compliance_assessment_due']['view'] === 1 || session()->get('sub_menu_access')['compliance_custom_assessment_due']['view'] === 1 || session()->get('sub_menu_access')['compliance_sign_missing']['view'] === 1 || session()->get('sub_menu_access')['compliance_facility_exp']['view'] === 1 || session()->get('sub_menu_access')['compliance_operational_report']['view'] === 1 || session()->get('sub_menu_access')['clinical_careplan_due']['view'] === 1 || session()->get('sub_menu_access')['compliance_patient_chart']['view'] === 1) {
                            $compliance_report = "display:block";
                        }
                        ?>
                        <li class="hassubnav <?php
                                                if ($page_code == "analyticaldashboard" || $page_code == "cpreport" || $page_code == "assessment_compliance" || $page_code == "facility_expiration" || $page_code == "reports_dashboard" || $page_code == "view_due_items" || $page_code == "patient_chart" || $page_code == "audit_log_report") {
                                                    echo 'active';
                                                }
                                                ?>" style="<?php echo $compliance_report; ?>">
                            <a href="#" style="font-size: 13px;"><b><i class="icon-trophy"></i> Compliance</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <?php if (session()->get('sub_menu_access')['compliance_analytical_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "analyticaldashboard") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'analytical_dashboard'; ?>">
                                            <i class="icon-retweet"></i>
                                            <span class="submenu-title">Analytical</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['compliance_assessment_due']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "view_due_items") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/view_due_items_report_data'; ?>">
                                            <i class="icon-certificate"></i>
                                            <span class="submenu-title">Assessments Due</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['compliance_sign_missing']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "assessment_compliance") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/assessment_compliance_data'; ?>">
                                            <i class="icon-bullhorn"></i>
                                            <span class="submenu-title">Assessment – Signature Missing</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['clinical_careplan_due']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "cpreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/cpdue_data'; ?>">
                                            <i class="icon-list-ul"></i>
                                            <span class="submenu-title">Care Plan - Due</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['compliance_custom_assessment_due']['view'] === 1) { ?>
                                    <!-- <li <?php if ($page_code == "view_custom_due_items") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/view_custom_due_items_report_data'; ?>">
                                        <i class="icon-certificate"></i>
                                        <span class="submenu-title">Custom Assessments Due</span>
                                    </a>
                                </li>-->

                                <?php }
                                if (session()->get('sub_menu_access')['compliance_facility_exp']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "facility_expiration") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/facility_expiration'; ?>">
                                            <i class="icon-dashboard"></i>
                                            <span>Facility Expiration</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['compliance_operational_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "reports_dashboard") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'dashboard'; ?>">
                                            <i class="icon-dashboard"></i>
                                            <span>Operational Reports</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['compliance_patient_chart']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "patient_chart") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/patient_chart'; ?>">
                                            <i class="icon-magic"></i>
                                            <span>Patient Chart</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>





                        <?php
                        $caregiver_report = "display:none";
                        if (session()->get('sub_menu_access')['admin_caregiver missing care note report']['view'] === 1 || session()->get('sub_menu_access')['admin_shift report']['view'] === 1 || session()->get('sub_menu_access')['billing_caregiver_payment']['view'] === 1 || session()->get('sub_menu_access')['billing_caregiver_ytd']['view'] === 1 || session()->get('sub_menu_access')['billing_cn_not_received']['view'] === 1  || session()->get('sub_menu_access')['cn_signature_missing']['view'] === 1 || session()->get('sub_menu_access')['cn_missing_signature']['view'] === 1 || session()->get('sub_menu_access')['caregiver_hired_date']['view'] === 1) {
                            $caregiver_report = "display:block";
                        }
                        ?>
                        <li class="hassubnav <?php if ($page_code == "caregiver_missing_care_note" || $page_code == "shift_report" || $page_code == "care_giver_payment_ytd" || $page_code == "caregiver_payment" || $page_code == "caregiver_missing_notes" || $page_code == "cn_signature_missing" || $page_code == "cn_missing_signature" || $page_code == "caregiver_hire_date_report") {
                                                    echo 'active';
                                                } ?>" style="<?php echo $caregiver_report; ?>">
                            <a href="#" style="font-size: 13px;"><b><i class="icon-user"></i> CareGiver</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <?php if (session()->get('sub_menu_access')['caregiver_hired_date']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "caregiver_hire_date_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/caregiver_hire_date_report'; ?>">
                                            <i class="icon-book"></i>
                                            <span class="submenu-title">Caregiver Hired Date</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php
                                if (session()->get('sub_menu_access')['billing_caregiver_payment']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "caregiver_payment") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/caregiver_payment_data'; ?>">
                                            <i class="icon-sitemap"></i>
                                            <span class="submenu-title">Care Giver Payment</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['billing_caregiver_ytd']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "care_giver_payment_ytd") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/care_giver_payment_ytd_data'; ?>">
                                            <i class="icon-sitemap"></i>
                                            <span class="submenu-title">Care Giver Payment YTD</span>
                                        </a>
                                    </li>
                                <?php }

                                if (session()->get('sub_menu_access')['admin_caregiver missing care note report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "caregiver_missing_care_note") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/caregiver_missing_care_note_data'; ?>">
                                            <i class="icon-user"></i>
                                            <span class="submenu-title">Missing Care Log</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['cn_missing_signature']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "cn_missing_signature") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/cn_missing_signature'; ?>">
                                            <i class="icon-ban-circle"></i>
                                            <span class="submenu-title">Care Log Signature</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['cn_signature_missing']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "cn_signature_missing") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/cn_signature_missing'; ?>">
                                            <i class="icon-user"></i>
                                            <span class="submenu-title">Care Log Signature1</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['admin_shift report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "shift_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/shift_report_data'; ?>">
                                            <i class="icon-time"></i>
                                            <span class="submenu-title">Shift Report</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (session()->get('sub_menu_access')['admin_caregiver missing care note report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "caregiver_missing_notes") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/caregiver_missing_notes_data'; ?>">
                                            <i class="icon-user"></i>
                                            <span class="submenu-title">Missing Notes</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>



                        <?php
                        $careteam_report = "display:none";
                        if (session()->get('sub_menu_access')['admin_followup notes report']['view'] === 1 || session()->get('sub_menu_access')['admin_care manger client_report']['view'] === 1 || session()->get('sub_menu_access')['admin_client visit report']['view'] === 1 || session()->get('sub_menu_access')['appointment_visit_report']['view'] === 1 || session()->get('sub_menu_access')['careteam_client_details']['view'] === 1 || session()->get('sub_menu_access')['careteam_assessment_missing']['view'] === 1 || session()->get('sub_menu_access')['careteam_appointment_missing']['view'] === 1 || session()->get('sub_menu_access')['careteam_attendance']['view'] === 1) {
                            $careteam_report = "display:block";
                        }
                        ?>
                        <li class="hassubnav <?php if ($page_code == "assessment_visit_report" || $page_code == "follow_up_notes" || $page_code == "care_manger_client_report" || $page_code == "appointment_visit_report") {
                                                    echo 'active';
                                                } ?>" style="<?php echo $careteam_report; ?>">
                            <a href="#" style="font-size: 13px;"><b><i class="icon-group"></i> Care Team</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <?php
                                if (session()->get('sub_menu_access')['appointment_visit_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "appointment_visit_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/appointment_visit_report'; ?>">
                                            <i class="icon-calendar"></i>
                                            <span class="submenu-title">Appointment Visit Log </span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['careteam_assessment_missing']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "assessment_missing") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/missing-assessment'; ?>">
                                            <i class="icon-sitemap"></i>
                                            <span class="submenu-title">Assessment Missing </span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['careteam_appointment_missing']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "appointment_missing") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/missing-appointment'; ?>">
                                            <i class="icon-sitemap"></i>
                                            <span class="submenu-title">Missing Appointments</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['careteam_attendance']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "careteam_attendance") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/careteam-attendance'; ?>">
                                            <i class="icon-calendar"></i>
                                            <span class="submenu-title">Care Team Attendance</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['admin_care manger client_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "care_manger_client_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/caremanger-client-report'; ?>">
                                            <i class="icon-sitemap"></i>
                                            <span class="submenu-title">Care Team Client </span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['careteam_client_details']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "care_manger_client_detail_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/caremanger-client-detail-report'; ?>">
                                            <i class="icon-sitemap"></i>
                                            <span class="submenu-title">Care Team Client Details </span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['billing_careteam_payment_report']['view'] === 1) { ?>
                                    <li class="<?php if ($page_code == "care_team_report") {
                                                    echo 'active';
                                                } ?>" style="">
                                        <a href="<?php echo base_url() . 'reports/care_team_report_data'; ?>">
                                            <i class="icon-money"></i>
                                            <span class="submenu-title">Care Team Payment</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['admin_client visit report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "assessment_visit_report") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/assessment_visit_report_data'; ?>">
                                            <i class="icon-certificate"></i>
                                            <span class="submenu-title">Client Visit</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['admin_followup notes report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "follow_up_notes") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/follow-up-notes'; ?>">
                                            <i class="icon-sitemap"></i>
                                            <span class="submenu-title">Follow up notes</span>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>

                        <?php
                        $employee_report = "display:none";
                        if (session()->get('sub_menu_access')['background_check_report']['view'] === 1 || session()->get('sub_menu_access')['compliance_emp_cert_exp']['view'] === 1 || session()->get('sub_menu_access')['compliance_emp_license_exp']['view'] === 1 || session()->get('sub_menu_access')['other_details_report']['view'] === 1) {
                            $employee_report = "display:block";
                        }
                        ?>
                        <li class="hassubnav <?php if ($page_code == "backgroundcheckreport" || $page_code == "employee_certification_expiration" || $page_code == "licenseExpreport" || $page_code == "otherdetailsreport") {
                                                    echo 'active';
                                                } ?>" style="<?php echo $employee_report; ?>">
                            <a href="#" style="font-size: 13px;"><b><i class="icon-user"></i> Employee</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">
                                <?php if (session()->get('sub_menu_access')['background_check_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "backgroundcheckreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/background_checkData'; ?>">
                                            <i class="icon-user"></i>
                                            <span class="submenu-title">Employee Background Check Expiration</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['compliance_emp_cert_exp']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "employee_certification_expiration") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo base_url() . 'reports/employee_certification_expiration'; ?>">
                                            <i class="icon-dashboard"></i>
                                            <span>Employee Certification Expiration</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['compliance_emp_license_exp']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "licenseExpreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/emp_license_expirationData'; ?>">
                                            <i class="icon-user"></i>
                                            <span class="submenu-title">Employee License Expiration</span>
                                        </a>
                                    </li>
                                <?php }
                                if (session()->get('sub_menu_access')['other_details_report']['view'] === 1) { ?>
                                    <li <?php if ($page_code == "otherdetailsreport") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/other_detailsData'; ?>">
                                            <i class="icon-user"></i>
                                            <span class="submenu-title">Employee Other Details Expiration</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>

                        <?php
                        $referral_report = "display:none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('referral', session()->get('menu_items_arr'))) {
                                if (careMemberAccess('referral')) {
                                    if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral') == 'ACTIVE') {
                                        if (session()->get('sub_menu_access')['referral_notes_report']['view'] === 1 || session()->get('sub_menu_access')['referral_transfer']['view'] === 1 || session()->get('sub_menu_access')['referral_source']['view'] === 1 || session()->get('sub_menu_access')['referral_referred_to']['view'] === 1 || session()->get('sub_menu_access')['referral_referred_by']['view'] === 1 || session()->get('sub_menu_access')['referral_admitted']['view'] === 1) {
                                            $referral_report = "display:block";
                                        }
                                    }
                                }
                            }
                        } else {

                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral') == 'ACTIVE') {
                                if (session()->get('sub_menu_access')['referral_notes_report']['view'] === 1 || session()->get('sub_menu_access')['referral_transfer']['view'] === 1 || session()->get('sub_menu_access')['referral_source']['view'] === 1 || session()->get('sub_menu_access')['referral_referred_to']['view'] === 1 || session()->get('sub_menu_access')['referral_referred_by']['view'] === 1 || session()->get('sub_menu_access')['referral_admitted']['view'] === 1) {
                                    $referral_report = "display:block";
                                }
                            }
                        }
                        ?>
                        <li class="hassubnav <?php if ($page_code == "referral_report" || $page_code == "referral_transfer" || $page_code == "due_referral_notes" || $page_code == "referred_to" || $page_code == "referred_by" || $page_code == "referral_admitted") {
                                                    echo 'active';
                                                } ?>" style="<?php echo $referral_report; ?>">

                            <a href="#" style="font-size: 13px;"><b><i class="icon-retweet"></i> Referral</b></a>
                            <ul class="subnav" style="list-style:none; margin-left: 0px;">

                                <?php
                                $referral_admitted = "display:none";
                                if (session()->get('sub_menu_access')['referral_admitted']['view'] === 1) {
                                    $referral_admitted = "display:block";
                                } ?>

                                <li <?php if ($page_code == "referral_admitted") { ?> class="active" <?php } ?> style="<?php echo $referral_admitted; ?>"><a href="<?php echo base_url() . 'reports/referral_admitted'; ?>">
                                        <i class="icon-book"></i>
                                        <span class="submenu-title">Pre-admission List</span>
                                    </a>
                                </li>


                                <?php
                                $referral_notes_report = "display:none";
                                if (session()->get('sub_menu_access')['referral_notes_report']['view'] === 1) {
                                    $referral_notes_report = "display:block";
                                } ?>

                                <li <?php if ($page_code == "due_referral_notes") { ?> class="active" <?php } ?> style="<?php echo $referral_notes_report; ?>"><a href="<?php echo base_url() . 'reports/due_referral_notes_report'; ?>">
                                        <i class="icon-book"></i>
                                        <span class="submenu-title">Referral Notes Due</span>
                                    </a>
                                </li>

                                <?php
                                $referred_by = "display:none";
                                if (session()->get('sub_menu_access')['referral_referred_by']['view'] === 1) {
                                    $referred_by = "display:block";
                                } ?>

                                <li <?php if ($page_code == "referred_by") { ?> class="active" <?php } ?> style="<?php echo $referred_by; ?>"><a href="<?php echo base_url() . 'reports/referred_by_report'; ?>">
                                        <i class="icon-book"></i>
                                        <span class="submenu-title">Referred By</span>
                                    </a>
                                </li>

                                <?php
                                $referral_source = "display:none";
                                if (session()->get('sub_menu_access')['referral_source']['view'] === 1) {
                                    $referral_source = "display:block";
                                } ?>

                                <li <?php if ($page_code == "referral_report") { ?> class="active" <?php } ?> style="<?php echo $referral_source; ?>"><a href="<?php echo base_url() . 'reports/referral_data'; ?>"><i class="icon-group"></i>
                                        <span class="submenu-title">Referral Source</span>
                                    </a></li>



                                <?php
                                $referral_transfer = "display:none";
                                if (session()->get('sub_menu_access')['referral_transfer']['view'] === 1) {
                                    $referral_transfer = "display:block";
                                } ?>
                                <li <?php if ($page_code == "referral_transfer") { ?> class="active" <?php } ?> style="<?php echo $referral_transfer; ?>"><a href="<?php echo base_url() . 'reports/referral_transfer_data'; ?>">
                                        <i class="icon-screenshot"></i>
                                        <span class="submenu-title">Referral Transfer</span>
                                    </a>
                                </li>


                                <?php
                                $referral_referred_to = "display:none";
                                if (session()->get('sub_menu_access')['referral_referred_to']['view'] === 1) {
                                    $referral_referred_to = "display:block";
                                } ?>
                                <li <?php if ($page_code == "referred_to") { ?> class="active" <?php } ?> style="<?php echo $referral_referred_to; ?>"><a href="<?php echo base_url() . 'reports/referral_referred_to'; ?>">
                                        <i class="icon-screenshot"></i>
                                        <span class="submenu-title">Referred To</span>
                                    </a>
                                </li>

                            </ul>
                        </li>





                    </ul>
                </li>
                <?php
                $referralmenu = "none";
                if (session()->get('usr_type') === 'NORMAL USER') {
                    if (in_array('referral', session()->get('menu_items_arr'))) {
                        if (careMemberAccess('referral')) {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral') == 'ACTIVE') {
                                $referralmenu = "block";
                            }
                        }
                    }
                } else {

                    if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral') == 'ACTIVE') {
                        $referralmenu = "block";
                    }
                }
                ?>
                <li style="display: <?php echo $referralmenu; ?>" class="dropdown <?php if ($page_code == "referral" || $page_code == "referral_questions" || $page_code == "referral_source" || $page_code == "referral_status" || $page_code == "conversation_status" || $page_code == "referral_notestitle" || $page_code == "organization" || $page_code == "referral_priority" || $page_code == "referral_note") { ?> active <?php } ?>">
                    <a id="referralstag" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>assets/img/header_icons/referrel.png" class="headimg">
                        <span class="submenu-title">Referral Management</span>
                    </a>
                    <ul class="dropdown-menu" style="list-style:none; margin-left: 0px;">
                        <li <?php if ($page_code == "referral") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'referral'; ?>">
                                <i class="icon-list-alt"></i>
                                <span class="submenu-title">Referral List</span>
                            </a>
                        </li>
                        <li <?php if ($page_code == "referral_notestitle") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'referral_notestitle'; ?>">
                                <i class="icon-list-alt"></i>
                                <span class="submenu-title">Referral Notes Title</span>
                            </a>
                        </li>
                        <?php $admin_referral_questions = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('referral questions', session()->get('menu_items_arr'))) {
                                $admin_referral_questions = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral_questions') == 'ACTIVE') {
                                $admin_referral_questions = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_referral_questions; ?>" <?php if ($page_code == "referral_questions") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'referral_questions'; ?>">
                                <i class="icon-question"></i>
                                <span class="submenu-title">Referral Questions</span>
                            </a>
                        </li>
                        <?php $admin_referral_source = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('referral source', session()->get('menu_items_arr'))) {
                                $admin_referral_source = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral_source') == 'ACTIVE') {
                                $admin_referral_source = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_referral_source; ?>" <?php if ($page_code == "referral_source") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'referral_source'; ?>">
                                <i class="icon-plus"></i>
                                <span class="submenu-title">Referral Source</span>
                            </a>
                        </li>
                        <?php $admin_referral_status = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('referral status', session()->get('menu_items_arr'))) {
                                $admin_referral_status = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral_status') == 'ACTIVE') {
                                $admin_referral_status = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_referral_status; ?>" <?php if ($page_code == "referral_status") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'referral_status'; ?>">
                                <i class="icon-plus"></i>
                                <span class="submenu-title">Referral Status</span>
                            </a>
                        </li>
                        <?php $admin_conversation_status = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('conversation status', session()->get('menu_items_arr'))) {
                                $admin_conversation_status = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_conversation_status') == 'ACTIVE') {
                                $admin_conversation_status = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_conversation_status; ?>" <?php if ($page_code == "converstation_status") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'conversation_status'; ?>">
                                <i class="icon-plus"></i>
                                <span class="submenu-title">Converstation Status</span>
                            </a>
                        </li>
                        <?php $admin_organization = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('organization', session()->get('menu_items_arr'))) {
                                $admin_organization = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_organization') == 'ACTIVE') {
                                $admin_organization = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_organization; ?>" <?php if ($page_code == "organization") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'organization'; ?>">
                                <i class="icon-hospital"></i>
                                <span class="submenu-title">Referral Organization</span>
                            </a>
                        </li>
                        <?php $admin_referral_priority = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('referral priority', session()->get('menu_items_arr'))) {
                                $admin_referral_priority = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral_priority') == 'ACTIVE') {
                                $admin_referral_priority = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_referral_priority; ?>" <?php if ($page_code == "referral_priority") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'referral_status/priority_list'; ?>">
                                <i class="icon-bookmark"></i>
                                <span>Referral Priority</span>
                            </a>
                        </li>
                        <?php $admin_referral_note = "none";
                        if (session()->get('usr_type') === 'NORMAL USER') {
                            if (in_array('referral note', session()->get('menu_items_arr'))) {
                                $admin_referral_note = "block";
                            }
                        } else {
                            if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_referral_note') == 'ACTIVE') {
                                $admin_referral_note = "block";
                            }
                        }
                        ?>
                        <li style="display: <?php echo $admin_referral_note; ?>" <?php if ($page_code == "referral_note") { ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url() . 'referral_status/referral_notes_list'; ?>">
                                <i class="icon-retweet"></i>
                                <span>Referral Note</span>
                            </a>
                        </li>
                        <?php
                        $referral_notes_report = "display:none";
                        if (session()->get('sub_menu_access')['referral_notes_report']['view'] === 1) {
                            $referral_notes_report = "display:block";
                        }
                        ?>
                        <li <?php if ($page_code == "due_referral_notes") { ?> class="active" <?php } ?>><a href="<?php echo base_url() . 'reports/due_referral_notes_report'; ?>">
                                <i class="icon-book"></i>
                                <span class="submenu-title">Referral Notes Due</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>