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
	$query="UPDATE `job_opening` SET `status`=0 where `id`=$item";  
	echo $query;
	// echo "<br>";
	if(mysqli_query($conn, $query)){
	// Obtain last inserted id
	header("location:job_view.php?success=2");
	// $res=mysqli_query($conn,$query);
	}
	else
	{
	echo mysqli_error($conn);
	}
}


	

?>