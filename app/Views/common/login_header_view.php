<?php
$dcc_profile_access = 1;
if (session()->get('usr_type') === 'NORMAL USER') {
    if (session()->get('rol_dcc_profile_access') == "NO") {
        $dcc_profile_access = 0;
    }
} else if (session()->get('usr_type') === 'CUSTOMER ADMIN') {
    $dcc_profile_access = 0;
    if (session()->get('user_type') === 'DAY CARE CENTER ADMIN') {
        $dcc_profile_access = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link rel="icon" type="image/png" href="<?php echo base_url('webassets/images/Myadulthomecarelogonotext.png'); ?>">
    <title id="page_title"><?php echo DISPLAY_HEADER_APP_NAME; ?></title>
    <meta name="description" content="<?php echo HEADER_META_DESCRIPTION; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <?php
    echo view('common/common_style_view.php');
    $page_code = (isset($page_code)) ? $page_code : "";
    ?>
</head>

<body>