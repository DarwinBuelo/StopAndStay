<?php
print_r($_POST);
echo "<br>";
include_once("../includes/db.php");
if(isset($_GET))
{
	$item=$_GET['item'];
	$query="UPDATE `tbl_ads` SET `ad_stat`=0 where id=$item";  
	echo $query;
	// echo "<br>";
	if(mysqli_query($conn, $query)){
	// Obtain last inserted id
	header("location:ads_view.php?success=2");
	// $res=mysqli_query($conn,$query);
	}
	else
	{
	echo mysqli_error($conn);
	}
}


	

?>