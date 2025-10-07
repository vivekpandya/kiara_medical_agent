<link rel="stylesheet" href="<?php echo ROOT_WWW ?>assets/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo ROOT_WWW ?>assets/css/bootstrap-responsive.min.css"  type="text/css" />
<link rel="stylesheet" href="<?php echo ROOT_WWW ?>assets/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="<?php echo ROOT_WWW ?>assets/css/fonts.css"  type="text/css" />
<link rel="stylesheet" href="<?php echo ROOT_WWW ?>assets/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo ROOT_WWW ?>assets/css/loader_style.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
<?php if (session()->get('admin_user_id') <= 0) { ?>
    <link rel="stylesheet" href="<?php echo ROOT_WWW ?>assets_new/css/signin.css" type="text/css" />
<?php } else { ?>
    <link href="<?php echo ROOT_WWW ?>assets/css/pages/dashboard.css" rel="stylesheet">
<?php } ?>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="<?php echo ROOT_WWW ?>assets/plugins/toastr-master/build/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo ROOT_WWW ?>assets/plugins/select2/dist/css/select2.min.css">
