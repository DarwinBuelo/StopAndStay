<?php
include_once '../includes/db.php';
$results_per_page = 10;

if(isset($_GET['searchit']))
{
	$stags=$_GET['searchit'];
		$sql = 'select * from tbl_pend';
	$result = mysqli_query($conn, $sql);
	$number_of_results = mysqli_num_rows($result);
 }
// 	$tickval = $_GET['optradio'];
	// $stags=$_GET['searchit'];
// 	switch ($tickval)
// 	{
// 		case 1:
// 			$stags=mysqli_real_escape_string($conn,$stags);
// 			$sql = 'SELECT * FROM user where user_id LIKE "'.$stags.'%"';
// 			$result = mysqli_query($conn, $sql);
// 			$number_of_results = mysqli_num_rows($result);
// 			$number_of_pages = ceil($number_of_results/$results_per_page);

// 			if (!isset($_GET['page'])) {
// 			     $page = 1;
// 			} else {
// 			     $page = $_GET['page'];
// 			}
// 			$this_page_first_result = ($page-1)*$results_per_page;
// 			$sql='SELECT * FROM user where user_id LIKE "'.$stags.'%" LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
// 			$result = mysqli_query($conn, $sql);	
// 			break;
// 		case 2:
// 			$stags=mysqli_real_escape_string($conn,$stags);
// 			$sql = 'SELECT * FROM user where membership LIKE "'.$stags.'%"';
// 			$result = mysqli_query($conn, $sql);
// 			$number_of_results = mysqli_num_rows($result);
// 			$number_of_pages = ceil($number_of_results/$results_per_page);

// 			if (!isset($_GET['page'])) {
// 			     $page = 1;
// 			} else {
// 			     $page = $_GET['page'];
// 			}
// 			$this_page_first_result = ($page-1)*$results_per_page;
// 			$sql='SELECT * FROM user where membership LIKE "'.$stags.'%" LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
// 			$result = mysqli_query($conn, $sql);	
// 			break;
// 		case 3:
// 			$stags=mysqli_real_escape_string($conn,$stags);
// 			$sql = 'SELECT * FROM user where username LIKE "'.$stags.'%"';
// 			$result = mysqli_query($conn, $sql);
// 			$number_of_results = mysqli_num_rows($result);
// 			$number_of_pages = ceil($number_of_results/$results_per_page);

// 			if (!isset($_GET['page'])) {
// 			     $page = 1;
// 			} else {
// 			     $page = $_GET['page'];
// 			}
// 			$this_page_first_result = ($page-1)*$results_per_page;
// 			$sql='SELECT * FROM user where username LIKE "'.$stags.'%" LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
// 			$result = mysqli_query($conn, $sql);	
// 			break;
// 		case 4:
// 			$stags=mysqli_real_escape_string($conn,$stags);
// 			$sql = 'SELECT * FROM user where name LIKE "'.$stags.'%"';
// 			$result = mysqli_query($conn, $sql);
// 			$number_of_results = mysqli_num_rows($result);
// 			$number_of_pages = ceil($number_of_results/$results_per_page);

// 			if (!isset($_GET['page'])) {
// 			     $page = 1;
// 			} else {
// 			     $page = $_GET['page'];
// 			}
// 			$this_page_first_result = ($page-1)*$results_per_page;
// 			$sql='SELECT * FROM user where name LIKE "'.$stags.'%" LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
// 			$result = mysqli_query($conn, $sql);	
// 			break;
// 	}
	
// 	// echo $sql;
// }

else
{
$sql="SELECT * FROM tbl_pend";
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
     $page = 1;
} else {
     $page = $_GET['page'];
}

$this_page_first_result = ($page-1)*$results_per_page;
$sql='SELECT * FROM tbl_pend  ORDER BY pend_stat ASC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);	
}