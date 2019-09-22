<?php
// will process the messages
require 'init.php';
session_start();
$sender = $_SESSION['user_id'];
$to  = Util::getParam('to');
$message = Util::getParam('message');

$chat = new Chat();
$chat->setReceiverID($to);
$chat->setSenderID($sender);
$chat->setMessage($message);
$chat->submit();

Util::redirect('messages.php');
// let us not send the data to server ;