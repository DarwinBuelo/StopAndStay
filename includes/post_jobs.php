<?php
if (isset($_POST['btn_sub'])) {
    session_start();
     include_once 'db.php';
     $info = [];
     $info[] =  $user_id = $_SESSION['user_id'];
     $info[] = $companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
     $info[] = $position = mysqli_real_escape_string($conn, $_POST['position']);
     $info[] = $companySize = mysqli_real_escape_string($conn, $_POST['companySize']);
     $info[] = $industry = mysqli_real_escape_string($conn, $_POST['industry']);
     $info[] =  $companyWebsite = mysqli_real_escape_string($conn, $_POST['companyWebsite']);
     $info[] = $description = mysqli_real_escape_string($conn, $_POST['description']);
     $info[] = $contactName = mysqli_real_escape_string($conn, $_POST['contactName']);
     $info[] = $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
     $info[] = $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
     $info[] = $location = mysqli_real_escape_string($conn, $_POST['location']);
     $info[] = 0;
     $data = "'".implode("', '",$info)."'";
     $sql1 = "
     INSERT INTO job_opening (
        user_id,
        company_name,
        position,
        company_size,
        industry,
        company_website,
        description,
        contact_name,
        phone_number,
        email_address,
        location,
        status
    ) 
    VALUES (
        $data
    )";
    $result1 = mysqli_query($conn, $sql1);
    header('location:../index.php?regsuc=1');
} else {
    header('location: posting_job.php?error');
    exit();
}

?>