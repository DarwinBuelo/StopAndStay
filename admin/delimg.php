<?php
include('../includes/db2.php');
$imgname=$_POST['imgname'];
$imgid=$_POST['imgid'];
$sql="DELETE FROM tbl_touristspot_images where id=".$imgid."";
$res=mysqli_query($conn,$sql);

$dir = '../../lakbaybikol-api/images/'.$imgname.'';
// echo $dir;
unlink($dir);

return "yes";

?>