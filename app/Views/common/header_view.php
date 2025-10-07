<?php
$uri = service('uri');
$dcc_profile_access = 1;
if (session()->get('usr_type') === 'NORMAL USER') {
   if (session()->get('rol_dcc_profile_access') == "NO") {
      $dcc_profile_access = 0;
   }
} else if (session()->get('usr_type') === 'CUSTOMER ADMIN') {
   $dcc_profile_access = 0;
   if (session()->get('user_type') === 'HOME CARE AGENCY ADMIN' || session()->get('user_type') === 'DAY CARE CENTER ADMIN') {
      $dcc_profile_access = 1;
   }
}
//echo '<pre>'; print_r(session()->get()); die;
//echo session()->get('usr_admin_name') .'*'.session()->get('password'); die;
?>
<!DOCTYPE html>
<html lang="en" class="">

<head>
   <?php
   if ($_SERVER['SERVER_NAME'] == "myadulthomecare.com") { ?>

      <!-- CODE GIVEN BY KUNAL -->
      <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-TSHHEME440"></script>
      <script>
         window.dataLayer = window.dataLayer || [];

         function gtag() {
            dataLayer.push(arguments);
         }
         gtag('js', new Date());

         gtag('config', 'G-TSHHEME440');
      </script>
   <?php } ?>
   <meta charset="utf-8" />
   <meta http-equiv='cache-control' content='no-cache'>
   <meta http-equiv='expires' content='0'>
   <meta http-equiv='pragma' content='no-cache'>
   <link rel="icon" type="image/png" href="<?php echo ROOT_WWW . 'webassets/images/Myadulthomecarelogonotext.png'; ?>">
   <title id="page_title"><?php echo DISPLAY_HEADER_APP_NAME; ?></title>
   <meta name="description" content="<?php echo HEADER_META_DESCRIPTION; ?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <?php
   if (session()->get('user_id') > 0 || (isset($page_code) && $page_code == 'digital_signature')) {
      echo view('common/common_style_view.php');
   } else {
      echo view('common/login_common_style_view.php');
   }
   $page_code = (isset($page_code)) ? $page_code : "";
   ?>
   <!-- Schema for Software -->
   <script type="application/ld+json">
      {
         "@context": "http://schema.org",
         "@type": "SoftwareApplication",
         "name": "My Adult Homecare Software",
         "url": "http://myadulthomecare.com/",
         "description": "My Adult Foster Care offers SaaS solutions for Day Care Centers.",
         "operatingSystem": "Web-based",
         "applicationCategory": "Healthcare",
         "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "50"
         },
         "offers": {
            "@type": "Offer",
            "price": "Contact for Free Demo",
            "priceCurrency": "USD"
         }
      }
   </script>
</head>

<body style="overflow-x: hidden;">

   <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
         <div class="container">
            <?php if (session()->get('user_id') > 0) { ?>
               <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </a>
            <?php } ?>
            <?php
            $homeurl = base_url();
            if (session()->get('user_id') > 0) {
               $homeurl = "javascript:void(0);";
            } ?>
            <a class="brand" href="<?php echo $homeurl; ?>">
               <?php
               //echo "<pre>";print_r($_SESSION);die();
               $logosrc = empty(session()->get('usr_logo')) ? base_url() . 'assets/images/loginlogo.png' : session()->get('usr_logo');
               ?>
               <?php if (session()->get('user_id') > 0) { ?>
                  <img class="sadminlogo" src="<?php echo $logosrc; ?>" alt="" title="<?php echo DISPLAY_FOOTER_APP_NAME; ?>" align="middle">
               <?php } else { ?>
                  <img class="mainlogo" src="<?php echo $logosrc; ?>" alt="" title="<?php echo DISPLAY_FOOTER_APP_NAME; ?>" align="middle">
               <?php } ?>
               <?php if ($page_title != 'Login') { ?>
                  <?php echo empty(session()->get('usr_dcc_name')) ? DISPLAY_HEADER_APP_NAME : session()->get('usr_dcc_name');
                  ?>
               <?php } ?>
            </a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button> -->
            <div class="nav-collapse marg_top">
               <ul class="nav pull-right">
                  <?php if (session()->get('user_id') > 0) { ?>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <i class="icon-user"></i> <?php echo session()->get('usr_display_name'); ?>
                           <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           
                           <li <?php if ($page_code == "myprofile") { ?> class="active" <?php } ?>>
                              <a href="<?php echo base_url() . 'my_profile'; ?>">
                                 <span>My Profile</span>
                              </a>
                           </li>
                           <?php if(session()->get('caregiver_login') == 'YES'){ ?>
                           <li <?php if ($page_code == "clientprofile") { ?> class="active" <?php } ?>>
                              <a href="<?php echo base_url() . 'my_profile?r=loadClientInfo'; ?>">
                                 <span>Clients Profile</span>
                              </a>
                           </li>
                           <?php } ?>
                           <?php if ($dcc_profile_access == 1) { ?>
                              <li <?php if ($page_code == "profile") { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url() . 'profile'; ?>">
                                    <span> Agency Profile</span>
                                 </a>
                              </li>
                              <li <?php if ($page_code == "billing_invoice") { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url() . 'billing_invoice'; ?>">
                                    <span> Billing</span>
                                 </a>
                              </li>
                           <?php }
                           ?>
                           <?php if (session()->get('usr_cus_id') && session()->get('usr_cus_id') > 0 && $uri->getSegment(1) !== "customer-dashboard") { ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>customer-dashboard">Back to Day Care Center List</a>
                              </li>
                           <?php } ?>
                           <?php if ((session()->get('usr_back_sa')) && session()->get('usr_back_sa') == "Yes") { ?>
                              <li>
                                 <a href="<?php echo base_url() . 'superadmin/backtosuperadmin'; ?>">
                                    <span> Back to SuperAdmin </span>
                                 </a>
                              </li>
                           <?php } ?>
                           <li><a onclick="$('#logoutModalContent').modal('show');">Logout</a></li>
                        </ul>
                     </li>
                     <?php if (session()->get('usr_dcc_id')) { ?>
                        <li class="dropdown">
                           <div id="alertsfrommydb" style="padding: 10px;"></div>
                        </li>
                     <?php } ?>
                     <?php
                     if (session()->get('usr_type') == "HOME CARE AGENCY ADMIN" || session()->get('usr_type') == 'DAY CARE CENTER ADMIN') { ?>
                        <li>
                           <a href="<?php echo base_url() . 'dashboard'; ?>" alt="Dashboard" title="Dashboard">
                              <span><i class="icon-dashboard" style="font-size:20px;"></i></span>
                           </a>
                        </li>

                        
                     <?php } ?>

                     <?php
                     $ticket_system = "none";
                     
                        if (session()->get('usr_type') === 'NORMAL USER') {
                           if (!empty(session()->get('menu_items_arr')) && in_array('ticket system', session()->get('menu_items_arr'))) {
                              if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_ticket system') == 'ACTIVE') {
                                 $ticket_system = "block";
                              }
                           }
                        } else {
                           if (getMenuAccessForDccByUniqueKey(session()->get('usr_dcc_id'), 'admin_ticket system') == 'ACTIVE') {
                              $ticket_system = "block";
                           }
                        }
                     ?>
                     <li style="display: <?php echo $ticket_system; ?>">
                        <a href="<?php echo base_url() . 'ticket_system'; ?>"><img title="Ticket System" alt="Ticket System" src="<?php echo base_url('assets/img/ticket-system-Icon.svg'); ?>" class="mr-5"></a>
                     </li>
                      <?php if ((session()->get('usr_back_sa')) && session()->get('usr_back_sa') == "Yes") {
                     } else { ?>
                       <li>
                           <a href="<?php echo MHELP_URL . 'moodle-autologin.php?id=' . session()->get('usr_admin_name') . '&nm=' . session()->get('password') ?>" alt="Help" title="Help">
                              <span><i class="icon-question-sign mr-5" style="font-size:22px;margin-top: 1px;"></i></span>
                           </a>
                        </li> 
                     <?php } ?>

                  <?php }
                  ?>
               </ul>
            </div>
            <!--/.nav-collapse -->
            <!--                    <div id="alertsfrommydb">
                  </div>-->
         </div>
         <!-- /container -->
      </div>
      <!-- /navbar-inner -->
   </div>
   <!-- /navbar -->