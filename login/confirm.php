<?php

include_once '../includes/db.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $sql1 = 'update tbl_users set confirm=1 where user_email = "'.$username.'"';
    $result1 = mysqli_query($conn, $sql1);
} else {
    die('something went wrong');
}
include 'index.php';
//EOF