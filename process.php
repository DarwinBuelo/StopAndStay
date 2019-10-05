<?php
spl_autoload_register(function ($class) {
    require_once "class/".$class.".php";
});


// Process all the data
//$reviewID = Util::getParam('reviewID');
$propID = Util::getParam('propID');
$name = Util::getParam('name');
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
                comment,
                rate,
                prop_id
            )   VALUES
            (
                '{$name}',
                '{$comment}',
                '{$rate}',
                '{$propID}'
            )";
            }
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
        case 'savePropEdit';
            $data = [
                'title' => $title,
//                'photos' => $photos, // deprecated
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
