<?php
//session_start();
//include_once 'db.php';
require 'vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '418393419036017',
    'app_secret' => 'c7ac7c14a50d5f62c1feb8a49a4a8d5b',
    'default_graph_version' => 'v4.0'
]);

$helper = $fb->getRedirectLoginHelper();
$logInURL = $helper->getLoginUrl('http://localhost/stopNstay/login/');

try {
//   $accessToken = $helper->getAccessToken();
//   if (isset($accessToken)) {
//       $_SESSION['accessToken'] = (string) $accessToken;
//       Util::redirect('index.php?login=success');
//   }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
//EOF