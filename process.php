<?php

spl_autoload_register(function ($class) {
    require_once "class/".$class.".php";
});


// Process all the data

//$reviewID = Util::getParam('reviewID');
$propID  = Util::getParam('propID');
$name = Util::getParam('name');
$comment = Util::getParam('message');
$rate = Util::getParam('rating');


if($propID){
    $sql = "INSERT INTO reviews 
            (
                name,
                comment,
                rate,
                prop_id
            )   VALUES
            (
                '{$name}',
                '{$comment}',
                '{$rate}',
                '{$propID}'
            )";

   DBcon::execute($sql);
   Util::redirect($_SERVER['HTTP_REFERER']);
}