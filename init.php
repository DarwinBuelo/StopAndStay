<?php
$companyname = '';
$companydesc = '';
$Outline = new Layout($companyname, $companydesc);

$css = [
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
    'js/jquery-3.2.1.min.js',
    'js/jquery-ui.min.js',
    'styles/bootstrap4/bootstrap.min.js',
    'plugins/greensock/TweenMax.min.js',
    'plugins/greensock/TimelineMax.min.js',
    'plugins/scrollmagic/ScrollMagic.min.js',
    'plugins/greensock/animation.gsap.min.js',
    'plugins/greensock/ScrollToPlugin.min.js',
    'plugins/OwlCarousel2-2.2.1/owl.carousel.js',
    'plugins/easing/easing.js',
    'plugins/parallax-js-master/parallax.min.js',
    'js/custom.js'
];
$Outline->addCSS($css);
$Outline->addJS($js);

// set the current user
if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
} else {
    $user = false;
}
