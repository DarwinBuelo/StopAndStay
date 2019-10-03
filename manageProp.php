<?php
session_start();
include_once 'view_ads.php';
include_once 'init.php';
$User = $_SESSION['user_id'];
$Outline->addCSS('css/myProp.css');
$Outline->header('My Properties');
$Outline->loadJS();
$myProps = UserProperty::GetMyProperties($User)
?>


<div class="row myPropList">
    <div class="col-md-9">
        <?php
        foreach ($myProps as $prop) {
            $photo = explode('--/', $prop->getPhotos());
            ?>
            <div class="row myPropContainer">
                <div class="col-md-3">
                    <img src="post_img/<?= $photo[0] ?>">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <?= $prop->getTitle() ?>
                    </div>
                    <div class="row">
                        <?= $prop->getDescription() ?>
                    </div>
                </div>
                <div class='col-md-3 align-content-center h-100'>
                    <button class="btn btn-primary center">Edit</button>
                </div>

            </div>

            <?php
        }
        ?>
    </div>
</div>