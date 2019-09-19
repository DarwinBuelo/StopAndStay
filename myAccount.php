<?php
include_once 'includes/db.php';
include_once 'view_ads.php';
include_once 'init.php';
session_start();
// if the user is not login will be redirected to the login page
if (!isset($_SESSION['user_id'])) {
    Util::redirect('login/');
}

$Outline->header('My Account');

if (isset($_POST['btnAction'])) {
    /**
     *  @TODO : Inject SMS trigger here
     *  So that when the guest is approved they will receive a notice that they are approved
     * 
     */

    $status = Util::getParam('status');
    if ($status == 0) {
        $data = [
            'approve' => 1
        ];
    } else {
        $data = [
            'approve' => 0
        ];
    }

    $where = [
        'owner_id' => $_POST['ownerID'],
        'user_id' => $_POST['userID'],
        'tbl_property_id' => $_POST['propertyID']
    ];
    Dbcon::update(Dbcon::TABLE_TENANT_RESERVATION, $data, $where);
}

if (isset($_SESSION['user_id'])) {
    $reservedUser = Account::getReserveUser($_SESSION['user_id']);
}

require 'view/myAccountView.php';

$Outline->addJS('common/js/myAccount.js');
$Outline->footer();
//EOF