<?php
include_once '../includes/db.php';
$results_per_page = 10;

if(isset($_GET['searchit']))
{
	$stags=$_GET['searchit'];
		$sql = 'select * from tbl_classified';
	$result = mysqli_query($conn, $sql);
	$number_of_results = mysqli_num_rows($result);
 }

else
{
$sql="SELECT * FROM tbl_classified";
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
     $page = 1;
} else {
     $page = $_GET['page'];
}

$this_page_first_result = ($page-1)*$results_per_page;
$sql='SELECT * FROM tbl_props  ORDER BY ID ASC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);	
}