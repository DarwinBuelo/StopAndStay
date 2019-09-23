<?php
// will process the messages
require 'init.php';
session_start();
$sender = $_SESSION['user_id'];
$to  = Util::getParam('to');
$message = Util::getParam('message');
$backLink = $_SERVER['HTTP_REFERER'];

if(!is_numeric($to)){
    $id  = User::FindName($to);
    if($id){
        $chat = new Chat();
        $chat->setReceiverID($id);
        $chat->setSenderID($sender);
        $chat->setMessage($message);
        $chat->submit();
        Util::redirect($backLink);
    }else{
        $error = ['error'=>'failed','message'=>'Failed to send. User doesn\'t exist '];
        $_SESSION['error'] = $error;
        Util::redirect($backLink);
    }
}else{
    $chat = new Chat();
    $chat->setReceiverID($to);
    $chat->setSenderID($sender);
    $chat->setMessage($message);
    $chat->submit();
    Util::redirect($backLink);
}
