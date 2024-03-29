<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<?php
session_start();
include_once 'init.php';
include_once('includes/db.php');
require 'bityLink.php';
$Outline->addCSS(['css/message.css', 'css/mapModal.css', 'css/comment.css']);
$Outline->addJS('js/message.js');
$Outline->addJS('js/jquery-1.8.3.min.js');
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url = 'https://www.messenger.com';

if (!isset($_GET['viewid'])) {
    header('location:error_404.php');
} else {
    $Outline->header('View Property');
    $Outline->loadJS();
    $ownerID = Util::getParam('ownerID');
    $page = Util::getParam('page');
    $returnTitle = '';
    if (isset($page)) {
        if ($page == '0') {
            $returnTitle = 'Apartment';
            $href = 'apartment.php';
        } else {
            $returnTitle = 'Boarding House';
            $href = 'boardingHouse.php';
            $roomDetailID = Util::getParam('rdID');
        }
    }
    if (isset($_SESSION['user_id'])) {
        require 'view/messageModal.php';
    }
    ?>
    <!-- ASIDE NAV AND CONTENT -->
    <div class="line">
        <section class="s-12 m-12 l-9 xl-10 post-wrap">

            <!-- Breadcrumb -->
            <nav class="breadcrumb-nav">
                <ul>
                    <li><a href="index.php"><i class="icon-sli-home"></i></a></li>
                    <li><a href="<?= $href; ?>"><?= _($returnTitle); ?></a></li>
                    <li><a href="">View Post</a></li>
                    <!-- <li><span>Sub Category 1</span></li> -->
                </ul>
            </nav>
            <!-- ECHO THE POST NAME -->
            <?php
            $teabag = isset($_GET['viewid']) ? $_GET['viewid'] : 0;
            $title = '';
            if ($page == 1) {
                $query = "
                    SELECT
                        tl.photos,
                        tl.title,
                        rd.price as price,
                        tl.location,
                        tl.description,
                        tl.user_id,
                        tl.ID,
                        rd.room_type,
                        rd.capacity,
                        rd.vacant,
                        rd.room_details_id,
                        tl.extras,
                        tl.coord,
                        tl.ready,
                        tl.contact,
                        tl.size,
                        tl.bed,
                        tl.bath
                    FROM
                        tbl_property tl
                    INNER JOIN
                        room_details rd
                    ON
                        rd.tbl_property_id = tl.ID
                    WHERE
                        tl.id=$teabag
                    AND
                        rd.room_details_id = {$roomDetailID}
                ";
                $sql = mysqli_query($conn, $query);
            } else {
                $sql = mysqli_query($conn, "SELECT * FROM tbl_property where id=$teabag");
            }
            while ($res = mysqli_fetch_array($sql)) {
                $title = $res['title'];
                ?>
                <h3 class="margin-bottom"><?php echo $res['title']; ?></h3>

                <!-- Pruducts -->
                <div class="margin2x">
                    <div class="s-12 m-9 l-9 xl-9 xl-9">

                        <div class="line">
                            <div id="header-carousel" class="owl-carousel owl-theme">
                                <?php
                                $coord = explode(',', $res['coord']);

                                $imgs = $res['photos'];
                                $imgs = explode("--/", $imgs);
                                foreach ($imgs as $image) {
                                    echo '<div class="item"><img class="full-img2" style="width:100%; height:100%;" src="post_img/'.$image.'" alt=""></div>';
                                }
                                ?>
                            </div>
                        </div>

                        <h5><strong><?php echo money_formater($res['price']); ?></strong></h5>
                        <div  class="line hide-s">
                            <table>
                                <th align="center">Ready By</th>
                                <th align="center">Size</th>
                                <th align="center">Bedrooms</th>
                                <th align="center">Bathrooms</th>
                                <tr>
                                    <td align="center">
                                        <img class="details_icons" src="img/Calendar.png">
                                        <br><?= date_format(date_create($res['ready']), 'm/d/Y'); ?>
                                    </td>
                                    <td align="center">
                                        <img class="details_icons" src="img/sm.png">
                                        <br><?= $res['size']; ?>
                                    </td>
                                    <td align="center">
                                        <img class="details_icons" src="img/bed.png">
                                        <br><?= $res['bed']; ?></td>
                                    <td align="center">
                                        <img class="details_icons" src="img/bath.png">
                                        <br><?= $res['bath']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <!--  -->
                        <?php
                            if ($page == 1) {
                        ?>
                        <h4>Room Details:</h4>
                        <p>Room Type: <?= $res['room_type']; ?></p>
                        <p>Capacity: <?= $res['capacity']; ?></p>
                        <p>Vacant: <?= $res['vacant']; ?></p>
                        <?php } ?>
                        <h4>Description</h4>
                        <p><?= $res['description']; ?></p>
                        <h4>Extra Features:</h4>
                        <?php
                        $extras = explode(", ", $res['extras']);
                        foreach ($extras as $extra) {
                            echo '<pre  style="background-color: white; border: none; font-family: Arial;font-size: 10px; line-height: 0.5; color: #666666; margin: 0px;">'.$extra.'</pre>';
                        }
                        ?>
                    </div>
                    <div class="s-12 m-3 l-3 xl-3 xxl-3">
                        <form class="customform s-12 margin-bottom2x" method="post" action="<?= $_SERVER['PHP_SELF']; ?>?page=<?= $page; ?>&viewid=<?= $teabag; ?>&ownerID=<?= $ownerID; ?>&rdID=<?= !empty($roomDetailID) ? $roomDetailID : 0; ?>">
                            <?php
                            include 'includes/reservation.php';
                            $roomDetailID = !empty($roomDetailID) ? $roomDetailID : 0;
                            if (ifReserved($ownerID, $teabag, $conn, $roomDetailID) < 1) {
                                $bgcolor = '#B91515';
                                $btnReserve = 'Reserve Now';
                            } else {
                                $bgcolor = '#4FBFA8';
                                $btnReserve = 'Reserved';
                            }
                            ?>
                            <button class="button rounded-btn submit-btn s-12" style="background-color: <?= $bgcolor; ?>" id="btnReserve" name="btnReserve" <?=
                            (isset($_SESSION['user_id']) ? '' : 'disabled');
                            ?>>
                                <b><?= $btnReserve; ?></b>
                            </button>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                ?>
                                <button type="button" class="btn rounded-btn submit-btn s-12  btn-primary modalTriggerShow"  name="btnMessage" data-owner="<?= $ownerID ?>">
                                    <b>Send Message</b>
                                </button>

                                <?php
                            }
                            ?>

                            <br>
                            <h3>Information</h3>

                            <p>
                                <i class="material-icons">event_available</i> &nbsp;&nbsp; <?= date_format(date_create($res['ready']), 'm/d/Y'); ?> <br>
                                <i class="material-icons">phone</i> &nbsp;&nbsp; <?= $res['contact']; ?> <br>
                                <i class="material-icons">link</i> &nbsp;&nbsp; <?= shortenURL($url); ?><br>
                                <i class="material-icons">location_on</i> &nbsp;&nbsp; <a href="#" class="mapModalShow" style="color: black;"><?php
                                    echo $res['location'];
                                }
                            }
                            ?></a><br><br>
                    </p>
                            <?php
                                if (!empty(getExpiration($ownerID, $teabag, $conn, $roomDetailID))) {
                            ?>
                            <h3>Expiration</h3>
                            <p><?= getExpiration($ownerID, $teabag, $conn, $roomDetailID); ?></p>
                            <?php } ?>
                </form>
                <?php

                if(isset($_SESSION['user_id'])){
                
                $sql = "SELECT * FROM reviews WHERE prop_id='".Util::getParam('viewid')."'";
                $commenter = [];
                $resultss = Dbcon::execute($sql);
                $datass = Dbcon::fetch_all_assoc($resultss);
                if (count($datass) > 0) {
                    $html = null;
                    $rating = 0;
                    foreach ($datass as $item) {
                        if($item['user_id'] !== 0){
                            $commenter[] =  $item['user_id'];
                        }
                        $html .= "<div class='comment'>";
                        $html .= "<div class='name'><b>".$item['name']."</b></div>";
                        $html .= "<div class='commentMessage'>".$item['comment']."</div>";
                        $html .= "<div class='row details'>";
                        $html .= "<div class='col-md-6 rating'>Rating : ".$item['rate']."</div>";
                        $html .= "<div class='col-md-6  date'>Date : ".date('Y/m/d', strtotime($item['date']))."</div>";
                        $html .= "</div></div>";
                        $rating += $item['rate'];
                    }
                    $totalRating = $rating / count($datass);
                    echo "Rating : " . round($totalRating,2);
                }
                ?>
            </div>
        </div>
        <div class="col-md-9 commentBoxHolder">
            <h3>Comment Box</h3>
            <?php
                $userID = $_SESSION['user_id'];
                $propertyID = $_GET['viewid'];
                if (isset($userID) && !in_array($userID, $commenter) && (!empty(User::getFacebookID($userID)) || User::ifApproved($userID, $propertyID) == true )) { ?>
            <form method="post" action="process.php" class="commentForm">
                <input type="hidden" name="task" value="rate">
                <input type="hidden" name="propID" value="<?= Util::getParam('viewid') ?>">
                <input type="hidden" name="userID" value="<?= $_SESSION['user_id'] ?>">
                Comment: <textarea class="message" name="message"></textarea>
                Rate:
                <input type="radio" name="rating" value="1">1
                <input type="radio" name="rating" value="2">2
                <input type="radio" name="rating" value="3">3
                <input type="radio" name="rating" value="4">4
                <input type="radio" name="rating" value="5" checked>5
                <div class="submit">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
            <?php } ?>
            <div class="commentList">
                <?= isset($html)? $html : null ?>
            </div>
        </div>
             <?php   } ?>
    </section>
</div>
</div> 
<div class="s-2 m-2 l-3 xl-1 xxl-1">
    <!-- ADSPACE HERE -->&nbsp;
</div>
</div>
<script type="text/javascript" src="js/responsee.js"></script> 
<script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var owl = $('#header-carousel');
        owl.owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            loop: true,
            navText: ["&#xf007", "&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000
        });
    });
</script>
</body>
</html>
<?php
require 'view/mapModal2.php';

function money_formater($value)
{
    return 'Php '.number_format($value, 2);
}
//EOF