<?php
session_start();
include_once 'includes/db.php';
include_once 'class/Dbcon.php';
require 'vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '696828140836013',
    'app_secret' => '27c4a8e229dc72e0be621013b6311d9d',
    'default_graph_version' => 'v4.0'
]);
if (isset($_GET['state'])) {
    $_SESSION['FBRLH_state'] = $_GET['state'];
}
$helper = $fb->getRedirectLoginHelper();
$logInURL = $helper->getLoginUrl('https://localhost/stopNstay/login/');

try {
   $accessToken = $helper->getAccessToken();
   if (isset($accessToken)) {
        $_SESSION['accessToken'] = (string) $accessToken;
        $fb->setDefaultAccessToken($_SESSION['accessToken']);
        $res = $fb->get('/me?locale=en_US&fields=id,name,first_name,last_name,email,gender,education,birthday,location,picture,link');
        $user = $res->getGraphUser();
        $count = createSql($user->getField('id'), $conn);
        if ($count[0] < 1) {
            $data = [
                'user_fname' => $user->getField('name'),
                'facebook_id' => $user->getField('id'),
                'confirm' => 1
            ];
            Dbcon::insert('tbl_users', $data);
        }
        if ($row = mysqli_fetch_assoc($count[1])) {
            $_SESSION['fname'] = $user->getField('name');
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = 0;
        }
        header('Location: https://localhost/stopNstay/index.php?login=success');
   }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
function createSql($facebookID, $conn)
{
    $sql = "
        SELECT
            user_id,
            facebook_id
        FROM
            tbl_users
        WHERE
            facebook_id = {$facebookID}
    ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    return [$resultCheck, $result];
}
//EOF