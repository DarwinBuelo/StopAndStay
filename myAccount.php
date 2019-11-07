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
            'remove' => 1
        ];
    }
    $message = 'Your reservation for '.$_POST['title'].' had been approved';
    $ownerID = $_POST['ownerID'];
    $receiverID = $_POST['userID'];
    $where = [
        'owner_id' => $ownerID,
        'user_id' => $receiverID,
        'tbl_property_id' => $_POST['propertyID']
    ];
    Dbcon::update(Dbcon::TABLE_TENANT_RESERVATION, $data, $where);
    $chat = new Chat();
    $chat->setReceiverID($receiverID);
    $chat->setSenderID($ownerID);
    $chat->setMessage($message);
    $chat->submit();
}

if (isset($_POST['btnDecline'])) {
    $data = [
        'approve' => 0,
        'remove' => 1
    ];
    $message = 'Your reservation for '.$_POST['title'].' had been rejected';
    $ownerID = $_POST['ownerID'];
    $receiverID = $_POST['userID'];
    $where = [
        'owner_id' => $ownerID,
        'user_id' => $receiverID,
        'tbl_property_id' => $_POST['propertyID']
    ];
    Dbcon::update(Dbcon::TABLE_TENANT_RESERVATION, $data, $where);
    $chat = new Chat();
    $chat->setReceiverID($receiverID);
    $chat->setSenderID($ownerID);
    $chat->setMessage($message);
    $chat->submit();
}

if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
    $reservedUser = Account::getReserveUser($userID);
    $reservedUserApartment = Account::getReservedApartment($userID);
    $expiredReservation = UserProperty::getExpiredReservation($userID);
}

require 'view/myAccountView.php';

$Outline->addJS('common/js/myAccount.js');
$Outline->footer();
//EOF