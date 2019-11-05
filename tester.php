<?php

require_once 'init.php';
$chat = Account::getReserveUser(11);
Util::debug($chat);
//EOF