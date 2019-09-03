<?php
session_start();
$tags=$_POST['tags'];
$page = $_GET['page'];
header('location:../'.$page.'.php?tagid='.$tags);
?>