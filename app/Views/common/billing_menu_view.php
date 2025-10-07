<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/billing_menu.css">

<style>
    nav {
        margin-bottom: 10px;
        margin-top: -10px;
    }

    nav ul {
        padding: 0;
        margin: 0;
        list-style: none;
        position: relative;
    }

    nav ul li {
        display: inline-block;
        background-color: #122867;
    }

    nav a {
        display: block;
        padding: 0 8px;
        color: #FFF;
        font-size: 14px;
        line-height: 35px;
        text-decoration: none;
    }

    nav a:hover {
        background-color: rgba(0, 0, 0, 0.4);
        color: #fff;
        text-decoration: none;
    }

    /* Hide Dropdowns by Default */
    nav ul ul {
        display: none;
        position: absolute;
        top: 35px;
        /* the height of the main nav */
    }

    /* Display Dropdowns on Hover */
    nav ul li:hover>ul {
        display: inherit;
    }

    /* Fisrt Tier Dropdown */
    nav ul ul li {
        width: 120px;
        float: none;
        display: list-item;
        position: relative;
        z-index: 9999;
    }

    /* Second, Third and more Tiers	*/
    nav ul ul ul li {
        position: relative;
        top: -40px;
        left: 120px;
    }


    /* Change this in order to change the Dropdown symbol */
    /* li>a:after {
        content: 'f0d7';
    } */

    li>a:only-child:after {
        content: '';
    }

    .dropdowniconimg {
        width: 8px;
    }

    .dropdown-width {
        width: 180px;
    }

    .sub_menu_selected {
        background-color: #545454;
    }

    .nav-tabs li {
        float: unset;
    }
</style>

<body>
    <div class="container">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav" id="nav_home"><a href="<?php echo base_url() . 'billing/home'; ?>">Home</a></li>
                <li class="nav" id="nav_dashboard"><a href="<?php echo base_url() . 'billing/dashboard'; ?>">Dashboards </a>
                    <!-- First Tier Drop Down -->
                    <!-- <ul>
                        <li><a href="#">Themes</a></li>
                        <li><a href="#">Plugins</a></li>
                        <li><a href="#">Tutorials</a></li>
                    </ul> -->
                </li>
                <li class="nav" id="nav_client"><a href="#">Clients <img src="<?php echo base_url(); ?>assets/img/down-arrow-menu.png" class="dropdowniconimg"></a>
                    <!-- First Tier Drop Down -->
                    <ul>
                        <li id="nav_client_sub"><a href="<?php echo base_url() . 'billing/clients'; ?>">Clients</a></li>
                        <li><a href="#">Eligibility <img src="<?php echo base_url(); ?>assets/img/right-arrow-menu.png" class="dropdowniconimg"></a>
                            <!-- Second Tier Drop Down -->
                            <ul>
                                <li><a href="#">Request</a></li>
                                <li><a href="#">Responses</a>
                                    <!-- Third Tier Drop Down -->
                                    <!-- <ul>
                                        <li><a href="#">Stuff</a></li>
                                        <li><a href="#">Things</a></li>
                                        <li><a href="#">Other Stuff</a></li>
                                    </ul> -->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav" id="nav_claims"><a href="#">Claims <img src="<?php echo base_url(); ?>assets/img/down-arrow-menu.png" class="dropdowniconimg"></a>
                    <ul>
                        <!-- <li><a href="<?php echo base_url() . 'billing/institutional'; ?>">Institutional</a></li> -->
                        <li id="nav_claims_sub"><a href="<?php echo base_url() . 'billing/claim-batches'; ?>">Professional</a>
                        </li>
                    </ul>
                </li>
                <li class="nav" id="nav_invoice"><a href="<?php echo base_url() . 'billing/invoices'; ?>">Invoices</a></li>
                <li class="nav" id="nav_collection"><a href="#">Collections <img src="<?php echo base_url(); ?>assets/img/down-arrow-menu.png" class="dropdowniconimg"></a>
                    <ul>
                        <li id="nav_collection_sub"><a href="<?php echo base_url() . 'billing/institutional'; ?>">Institutional</a></li>
                        <li><a href="#">Professional</a>
                        </li>
                    </ul>
                </li>
                <li class="nav" id="nav_reporting"><a href="<?php echo base_url() . 'billing/agingReport'; ?>">Reporting </a></li>
                <li class="nav" id="nav_setting"><a href="#">Settings <img src="<?php echo base_url(); ?>assets/img/down-arrow-menu.png" class="dropdowniconimg"></a>
                    <ul>
                        <li class="dropdown-width" id="nav_payer_sub"><a href="<?php echo base_url() . 'billing/payer'; ?>">Payers</a></li>
                        <li class="dropdown-width" id="nav_hcpcs_sub"><a href="<?php echo base_url() . 'billing/hcpc-list'; ?>">HCPCS Codes</a>
                        </li>
                        <li class="dropdown-width" id="nav_pp_sub"><a href="<?php echo base_url() . 'billing/items'; ?>">Private Pay Items Codes</a></li>
                        <li class="dropdown-width" id="nav_icd_sub"><a href="<?php echo base_url() . 'billing/diagnosis'; ?>">ICD-10 Codes</a></li>
                        <li class="dropdown-width" id="nav_insurance_sub"><a href="#">Insurance Contracts</a></li>
                        <li class="dropdown-width" id="nav_provider_sub"><a href="<?php echo base_url() . 'billing/provider'; ?>">Provider</a></li>
                        <li class="dropdown-width" id="nav_billing_sub"><a href="<?php echo base_url() . 'billing/billing_enrollment'; ?>">Billing Enrollment</a></li>
                    </ul>
                </li>
                <li id="nav_import"><a href="<?php echo base_url() . 'BillingImport/import'; ?>">Import / Export</a></li>
            </ul>
        </nav>

    </div>
</body>


<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script> -->