<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<?php
session_start();
include_once 'init.php';
include_once('includes/db.php');
require 'bityLink.php';
$Outline->addJS('js/jquery-1.8.3.min.js');
$url      = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = 'https://www.messenger.com';

if(!isset($_GET['viewid'])) {
  header('location:error_404.php');
} else {
  $Outline->header('View Property');
?>
        <!-- ASIDE NAV AND CONTENT -->
      <div class="line">
                <section class="s-12 m-12 l-9 xl-10 post-wrap"> 

                <!-- Breadcrumb -->
                <nav class="breadcrumb-nav">
                  <ul>
                    <li><a href="index.php"><i class="icon-sli-home"></i></a></li>
                    <li><a href="boardingHouse.php">Boarding House</a></li>
                  <li><a href="">View Post</a></li>
                  <!-- <li><span>Sub Category 1</span></li> -->
                  </ul>
                </nav>
                <!-- ECHO THE POST NAME -->
                <?php

                $teabag=$_GET['viewid'];
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
                  <!--  -->
                  <h4>Description:</h4>
                    <p class="margin-bottom"><?php echo $res['description']; ?></p>
                  <h4>Size:</h4>
                    <?php 
                    
                    echo '<p class="margin-bottom">'.$res['size'].'</p>';
                    ?>
                    <h4>Extra Features:</h4>
                    <?php 
                    $extras = explode(", ",$res['extras']);
                    foreach($extras as $extra)
                    {
                    echo '<p class="margin-bottom">'.$extra.'</p>';
                    }
                    
                    ?>
                  </div>
                <div class="s-12 m-3 l-3 xl-3 xxl-3">
                  <form class="customform s-12 margin-bottom2x" >
                      <button class="button rounded-btn submit-btn s-12" type="submit">
                        <b><?php echo $res['contact'] ?></b>
                      </button><br><br>
                    <h3>Information</h3>
                    <p>
                      <i class="material-icons">event_available</i> &nbsp;&nbsp; <?= date_format(date_create($res['ready']), 'm/d/Y'); ?> <br>
                      <i class="material-icons">location_on</i> &nbsp;&nbsp; <?php echo $res['location']; }}?><br>
                      <i class="material-icons">link</i> &nbsp;&nbsp; <?= shortenURL($url); ?>
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
      <!-- FOOTER -->
      <!-- <footer>
         <?php //footer here

         ?>
      </footer> -->
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