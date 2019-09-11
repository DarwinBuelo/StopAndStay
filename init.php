<?php
include 'class/Layout.php';
$companyname = '';
$companydesc = '';
$Outline = new Layout($companyname, $companydesc);

$css = [
    'css/bootstrap-337.min.css',
    'css/font-awesome.min.css',
    'css/style1.css',
    'css/main.css',
    'css/components.css',
    'css/icons.css',
    'css/responsee.css',
    'owl-carousel/owl.carousel.css',
    'owl-carousel/owl.theme.css',
    'css/template-style.css',
    'css/custom.css',
    'css/responsive.css',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext'
];
$js = [
    'js/jquery-1.8.3.min.js',
    'js/jquery-3.2.1.min.js',
    'js/jquery-ui.min.js',
    'js/responsee.js',
    'owl-carousel/owl.carousel.js'
];
$Outline->addCSS($css);
$Outline->addJS($js);

// set the current user
if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
} else {
    $user = false;
}
