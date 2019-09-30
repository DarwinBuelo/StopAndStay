<?php

require_once 'init.php';
$chat = SMS::send();
Util::debug($chat);
//EOF