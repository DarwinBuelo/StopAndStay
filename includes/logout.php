<?php
session_start();
session_destroy();
unset($_SESSION['accessToken']);
header("location:../index.php");
//EOF