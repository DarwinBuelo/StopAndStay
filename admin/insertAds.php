<?php
include_once("../includes/db.php");
$img = implode(',', $_POST['image']);
$sql="
    INSERT INTO tbl_ads (
        ad_title, 
        ad_date, 
        ad_image, 
        ads_location,
        ad_stat 
    )
    VALUES (
        '".$_POST['title']."',
        now(),
        '".$img."',
        '".$_POST['location']."',
        0
    )
";  
if(mysqli_query($conn, $sql)){
header("location:ads_view.php?success=1");
} else {
    echo mysqli_error($conn);
}
//EOF