<?php
if (isset($_POST['btn_sub'])) {
    session_start();
    require '../init.php';
    include '../class/Util.php';
    include_once 'db.php';
    $user_id = $_SESSION['user_id'];
    $page = Util::getParam('page');

    // for the IMage
    $imgcounter = 0;
    $location = "../post_img/";
    foreach ($_FILES['image']['name'] as $file) {
        $filename[] = $file;
    }
    foreach ($_FILES['image']['tmp_name'] as $tempfile) {
        $tempname[] = $tempfile;
    }

    for ($imgcount = 0; $imgcount < count($tempname); $imgcount++) {
        if (move_uploaded_file($tempname[$imgcount], $location . $filename[$imgcount])) {
            //do nun
        }
    }
    //end of image code
    $img = implode("--/", $filename);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $contact_num = mysqli_real_escape_string($conn, $_POST['contact_num']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $tcf = mysqli_real_escape_string($conn, $_POST['tcf']);
    $bed = mysqli_real_escape_string($conn, $_POST['bed']);
    $bath = mysqli_real_escape_string($conn, $_POST['bath']);
    $dev = mysqli_real_escape_string($conn, $_POST['dev']);
    $ready = mysqli_real_escape_string($conn, $_POST['ready']);
    $acf = mysqli_real_escape_string($conn, $_POST['acf']);
    $pr = mysqli_real_escape_string($conn, $_POST['pr']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $coord = mysqli_real_escape_string($conn,  $_POST['coord']);
    $extra2 = '';
    if (!empty($_POST['extras'])) {
        $x = 0;
        foreach ($_POST['extras'] as $selected) {
            if ($x == 0) {
                $extra2 .= $selected;
            } else {
                $extra2 .= ', ' . $selected;
            }
            $x++;
        }
    }
    $sql1 = "INSERT INTO tbl_property (title,photos,contact,price,description,size,tcf,bed,bath,dev,ready,acf,pri,location,coord,extras, user_id, property_type) values('$title','$img','$contact_num','$price','$description','$size','$tcf','$bed','$bath','$dev','$ready','$acf','$pr','$location','$coord','$extra2', '$user_id', '$page')";
    $result1 = mysqli_query($conn, $sql1);
    $propertyID = mysqli_insert_id($conn);
    if ($page == 0) {
        $details = mysqli_real_escape_string($conn,  $_POST['details']);
        $details = explode(',', $details);
        for ($x = 0; $x < count($details); $x+=3) {
            $dataInsert = [
                'tbl_property_id' => $propertyID,
                'room_type' => $details[$x],
                'capacity' => $details[$x + 1],
                'price' => $details[$x + 2],
                'vacant' => $details[$x + 1]
            ];
            Dbcon::insert('room_details', $dataInsert);
        }
    }
    header('location:../index.php?regsuc=1');
} else {
    header('location: ../login/posting.php?null');
    exit();
}
//EOF