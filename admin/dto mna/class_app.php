<?php
print_r($_POST);
echo "<br>";
include_once("../includes/db.php");
if(isset($_GET))
{
	if(isset($_GET['item']))
	{

	$item=$_GET['item'];	
	}
	if(isset($_GET['id']))
	{
		$item=$_GET['id'];
	}
	$query="UPDATE `tbl_classified` SET `stat`=1 where ID=$item";  
	echo $query;
	// echo "<br>";
	if(mysqli_query($conn, $query)){
	// Obtain last inserted id
	header("location:class_view.php?success=1");
	// $res=mysqli_query($conn,$query);
	}
	else
	{
	echo mysqli_error($conn);
	}
}


	

?>