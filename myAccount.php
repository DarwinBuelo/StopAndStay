<?php
include_once 'includes/db.php';
include_once 'view_ads.php';
include_once 'init.php';
session_start();
$Outline->header('My Account');
if (isset($_SESSION['user_id'])) {
    $reservedUser = Account::getReserveUser($_SESSION['user_id']);
}
require 'view/myAccountView.php';
if (isset($_POST['btnAction'])) {
    $data = [
        'approve' => 1
    ];
    $where = [
        'owner_id' => $_POST['ownerID'],
        'user_id' => $_POST['userID'],
        'tbl_property_id' => $_POST['propertyID']
    ];
    Dbcon::update(Dbcon::TABLE_TENANT_RESERVATION, $data, $where);
}
$Outline->addJS('common/js/myAccount.js');
$Outline->footer();
//EOF