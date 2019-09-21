<?php

require_once 'init.php';
$chat = Chat::getChatsForMe(9);
Util::debug($chat);
?>