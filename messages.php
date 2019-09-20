<?php
/*
 * Show messages
 */
session_start();
include_once 'view_ads.php';
include_once 'init.php';
$User = $_SESSION['user_id'];

$Outline->header('Boarding House');
$Chat = Chat::getChatsForMe($User);

Util::debug($Chat);


$Outline->footer();

function money_formater($value)
{
    return 'Php '.number_format($value, 2);
}
?>
