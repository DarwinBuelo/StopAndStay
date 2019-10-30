<?php
ini_set('post_max_size', '6400M');
spl_autoload_register(function ($class) {
    require_once "class/".$class.".php";
});
session_start();

// Process all the data
//$reviewID = Util::getParam('reviewID');
$propID = Util::getParam('propID');
$name = User::getName((int) $_SESSION['user_id']);
$comment = Util::getParam('message');
$rate = Util::getParam('rating');

foreach ($_REQUEST as $key => $value) {
    $$key = Util::getParam($key);
}

if (isset($task)) {
    switch ($task) {
        case 'rate':
            if ($propID) {
                $sql = "INSERT INTO reviews
            (
                name,
                user_id,
                comment,
                rate,
                prop_id
            )   VALUES
            (
                '{$name}',
                '{$userID}',
                '{$comment}',
                '{$rate}',
                '{$propID}'
            )";
            }
            echo $sql;
            DBcon::execute($sql);
            Util::redirect($_SERVER['HTTP_REFERER']);
            break;
        case 'editProps':
            //returns Json data to be use on the data
            $sql = "SELECT * FROM tbl_property WHERE id = {$propID} ";
            $result = DBcon::execute($sql);
            $data = DBcon::fetch_assoc($result);
            if (count($data) > 0) {
                echo json_encode($data);
            }
            break;

//        save image
        case 'savePropEdit';
            $imgcounter = 0;
            $location = "post_img/";
            foreach ($_FILES['image']['name'] as $file) {
                $filename[] = $file;
            }
            foreach ($_FILES['image']['tmp_name'] as $tempfile) {
                $tempname[] = $tempfile;
            }
            for ($imgcount = 0; $imgcount < count($tempname); $imgcount++) {
                if (move_uploaded_file($tempname[$imgcount], $location . $filename[$imgcount])) {
                    //do nun
                }else{
                    echo "fail to upload";
                }
            }
            //end of image code
            $json = json_decode($fileList);
            $photoList = [];
            foreach($json as $data){
                $getData = explode('/',$data);
                $photoList[] = end($getData);
            }
            $photo = implode("--/", array_merge($photoList,$filename));
            $data = [
                'title' => $title,
                'photos' => $photo,
                'contact' => $contact,
                'price' => $price,
                'description' => $description,
//                'size' => $this->getSize(),
                'tcf' => $tcf,
                'bed' => $bed,
                'bath' => $bath,
//                'dev' => $this->getDev(),
                'ready' => $ready,
//                'acf' => $this->getAcf(),
                'coord' => $coord,
                'location' => $location,
                'extras' => implode(', ',$extras),
            ];
            Util::debug($photo);
            if (isset($ID)) {
                $where = ['ID' => $ID];
                $result = DBcon::update(UserPropertiesInterface::TABLE, $data, $where);
             
            }
            Util::redirect($_SERVER['HTTP_REFERER']);
            break;
        default:
            Util::debug($task);
            echo 'loading default';
            break;
    }
}
