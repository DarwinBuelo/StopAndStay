<?php
print_r($_POST);
echo "<br>";
include_once("../includes/db.php");
if (isset($_GET['page'])) {
    $type = $_GET['page'];
}
$type = isset($type) ? $type : 0;
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
	$query="UPDATE `tbl_property` SET `status`=1 where ID=$item";  
	echo $query;
	if(mysqli_query($conn, $query)){
	// Obtain last inserted id
	header("location:prop_view.php?success=1&page=".$type);
	// $res=mysqli_query($conn,$query);
	}
	else
	{
	echo mysqli_error($conn);
	}
}


	

?>