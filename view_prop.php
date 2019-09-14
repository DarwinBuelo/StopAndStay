<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<?php
session_start();
include_once 'init.php';
include_once('includes/db.php');
require 'bityLink.php';
$Outline->addJS('js/jquery-1.8.3.min.js');
$url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = 'https://www.messenger.com';

if(!isset($_GET['viewid'])) {
  header('location:error_404.php');
} else {
  $Outline->header('View Property');
$ownerID = isset($_GET['ownerID']) ? $_GET['ownerID'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';
$returnTitle = '';
  if (isset($page)) {
      if ($page == '0') {
          $returnTitle = 'Apartment';
          $href = 'apartment.php';
      } else {
          $returnTitle = 'Boarding House';
          $href = 'boardingHouse.php';
      }
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

                $teabag= isset($_GET['viewid']) ? $_GET['viewid'] : 0;
                $sql=mysqli_query($conn,"SELECT * FROM tbl_property where id=$teabag");
                while($res=mysqli_fetch_array($sql))
                {  
                ?>
                <h3 class="margin-bottom"><?php echo $res['title'];?></h3>

                <!-- Pruducts -->
                <div class="margin2x">
                  <div class="s-12 m-9 l-9 xl-9 xl-9">

                    <div class="line">
                      <div id="header-carousel" class="owl-carousel owl-theme">
                        <?php
                          $imgs=$res['photos'];
                          $imgs=explode("--/",$imgs);
                          foreach($imgs as $image)
                          echo '<div class="item"><img class="full-img2" style="width:100%; height:100%;" src="post_img/'.$image.'" alt=""></div>';
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
                  <h4>Description:</h4>
                    <p class="margin-bottom"><?php echo $res['description']; ?></p>
                    <h4>Extra Features:</h4>
                    <?php 
                        $extras = explode(", ",$res['extras']);
                        foreach ($extras as $extra) {
                            echo '<p class="margin-bottom">'.$extra.'</p>';
                        }
                    ?>
                  </div>
                <div class="s-12 m-3 l-3 xl-3 xxl-3">
                    <form class="customform s-12 margin-bottom2x" method="post" action="<?= $_SERVER['PHP_SELF']; ?>?page=<?= $page; ?>&viewid=<?= $teabag; ?>&ownerID=<?= $ownerID; ?>">
                    <?php
                        include 'includes/reservation.php';
                        if (ifReserved($ownerID, $teabag, $conn) < 1) {
                            $bgcolor = '#B91515';
                            $btnReserve = 'Reserve Now';
                        } else {
                            $bgcolor = '#4FBFA8';
                            $btnReserve = 'Reserved';
                        }
                    ?>
                      <button class="button rounded-btn submit-btn s-12" style="background-color: <?= $bgcolor; ?>" name="btnReserve" <?= (isset($_SESSION['user_id']) ? '' : 'disabled'); ?>>
                        <b><?= $btnReserve; ?></b>
                      </button><br>
                    <h3>Information</h3>
                    <p>
                      <i class="material-icons">event_available</i> &nbsp;&nbsp; <?= date_format(date_create($res['ready']), 'm/d/Y'); ?> <br>
                      <i class="material-icons">phone</i> &nbsp;&nbsp; <?= $res['contact']; ?> <br>
                      <i class="material-icons">link</i> &nbsp;&nbsp; <?= shortenURL($url); ?><br>
                      <i class="material-icons">location_on</i> &nbsp;&nbsp; <a href="#" style="color: black;"><?php echo $res['location']; }}?></a><br>
                    </p>
                  </form>
                </div>
              </div>
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
        jQuery(document).ready(function($) {
          var owl = $('#header-carousel');
          owl.owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            loop: true,
            navText: ["&#xf007","&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000
          });
        })
      </script>     
   </body>
</html>
<?php
function money_formater($value) {
  return 'Php ' . number_format($value,2);
}