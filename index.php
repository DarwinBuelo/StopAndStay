<?php

include_once 'includes/db.php';
include("view_ads.php");
session_start();     


?>
  <!DOCTYPE html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <html lang="en-US">
     <head>
        <meta charset="UTF-8">
        <title>Stop And Stay</title>
        <link rel="stylesheet" href="css/components.css">
        <link rel="stylesheet" href="css/icons.css">
        <link rel="stylesheet" href="css/responsee.css">
        <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="owl-carousel/owl.theme.css">  
        <!-- CUSTOM STYLE -->
        <link rel="stylesheet" href="css/template-style.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
        <style>
        .ad-img
        {   
        margin-left: 10px;
        margin-right: 5px;
        }
        </style>
     </head>
     
     <body class="size-1520">
        <div class="s-12 m-12 l-12 xl-12 xxl-12">
          <header>

           <div class="line">
              <div class="box">
                <div class="left"></div>
                 <div class="mid">
                    <img class="full-img logo" src="img/mocklogo.png">
                 </div>
                 <div class="right">
                    <div class="margin">
                       <div class="s-12 md-12 l-12">
                          <?php 
                          if(isset($_SESSION['user_id']))
                          {
                            echo "<form action='pre-post.php'>";
                          }
                          // else
                          {
                            echo "<form action='login'>";
                          }

                          ?>
                    
                          <button class="button rounded-btn submit-btn right" type="submit"><i class="icon-sli-flag"></i>Post My AD </button>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <!-- TOP NAV -->  
           <div class="line">
              <nav>
                <p class="nav-text">Menu</p>
                 <div class="top-nav" >
                   <ul class="" style="">
                    <li><a href="index.php"><img src="img/menus/home.png">Home</a></li>
                        <li style="display:inline;"><a href="automotives.php"><img src="img/menus/gear.png">Automotives</a></li>
                        <li style="display:inline;"><a href="properties.php"><img src="img/menus/key2.png">Properties</a></li>
                        <li style="display:inline;"><a href="jobs.php"><img src="img/menus/handshake.png">Job Openings</a></li>
                        <li style="display:inline;"><a href="classifieds.php"><img src="img/menus/handbag.png">Classifieds</a></li>
                        <li style="display:inline;">
                          <?php
                            if(isset($_SESSION['user_id']))
                              {
                                echo "<a href='includes/logout.php'><img src='img/menus/person12.png'>Sign-out</a>";
                              }
                              else
                              {
                              echo "<a href='login'><img src='img/menus/person12.png'>Login</a>";
                              }
                          ?>
                        </li> 
                    </ul>
                 </div>
              </nav>
           </div>
        </header>
        <div class="s-12 m-2 l-3 xl-2 xxl-2 ads-left">
            <!-- ================== DISPLAYING APPROVED ADPOSTINGS ===========================-->
            <?php
              $adsLocation = view_ads::ADS_LOCATION_LEFT;
              view_ads::viewingAds($conn,$adsLocation);
            ?>
            <!-- ================== END OF DISPLAYING AD POSTINGS ============================ -->
          <!-- ADSPACE HERE -->&nbsp;
        </div>
        <div class="s-12 m-8 l-6 xl-8 xxl-8">
        <!-- HEADER -->
        
        <!-- ASIDE NAV AND CONTENT -->
        <div class="line">
           <!-- <div class="box margin-bottom"> -->
              <!-- <div class="margin2x"> -->
                 <!-- ASIDE NAV -->
                <!--  <aside class="s-12 m-4 l-3 xl-2">
                    <h4 class="margin-bottom">Select Category</h4>
                    <div class="aside-nav minimize-on-small">
                       <p class="aside-nav-text">Select Category</p>
                       <ul>
                          <li><a>Automotives</a></li>
                          <li>
                             <a>Properties</a>
                          </li>
                          <li>
                             <a>Job Openings</a>
                          </li>
                          <li><a>Classifieds</a></li>
                          
                       </ul>
                    </div>
                 </aside> -->
                 <!-- CONTENT -->
           <section class="s-12 m-12 l-12 xl-12"> 
            <br>
            <!-- Pruducts -->
            <div class="margin2x">
              <div class="s-12 m-12 l-12 xl-12 xxl-12">
                <h1 class="margin-bottom" style="text-align:center;">Welcome to Billboard Nation</h1>
                
                <div class="s-12 m-12 l-6 xl-6 xxl-6">
                  <h3 class="margin-bottom" style="text-align:center;">Automotives</h3>
                  <div class="margin2x">
                    <div class="s-12 m-12 l-12 xl-12 xxl-12">
                    <?php
                      $sql = "
                            SELECT
                                distinct pend_model
                            FROM
                                tbl_pend
                            WHERE
                                pend_stat = 1
                            LIMIT
                                5
                      ";
                      $res = mysqli_query($conn,$sql);
                      $x=0;
                      while($row = mysqli_fetch_array($res)) { ?>
                        <ul>
                          <li><?php echo ''.$row['pend_model']; ?></li>
                        </ul>
                     <?php $x++;}
                      while($x < 5) { ?>
                        <ul>
                        <li></li>
                        </ul>
                     <?php $x++;}
                     ?>
                     
                    </div>
                  </div>
                </div>
                

                <div class="s-12 m-12 l-6 xl-6 xxl-6">
                  <h3 class="margin-bottom" style="text-align:center;">Properties</h3>
                   <div class="margin2x">
                    <div class="s-12 m-12 l-12 xl-12 xxl-12">
                    <?php
                      $sql = "
                          SELECT DISTINCT 
                              title
                          FROM
                              tbl_property
                          WHERE
                              status = 1
                          LIMIT
                              5
                      ";
                      $res = mysqli_query($conn,$sql);
                      $x=0;
                      while($row = mysqli_fetch_array($res)) { ?>
                        <ul>
                          <li><?php echo ''.$row['title']; ?></li>
                        </ul>
                     <?php $x++;}
                      while($x < 5) { ?>
                        <ul>
                        <li></li>
                        </ul>
                     <?php $x++;}
                     ?>
                    </div>
                  </div>
                </div>

                <div class="s-12 m-12 l-6 xl-6 xxl-6">
                  <h3 class="margin-bottom" style="text-align:center;">Job Openings</h3>
                   <div class="margin2x">
                    <div class="s-12 m-12 l-12 xl-12 xxl-12">
                    <?php
                      $sql = "
                            SELECT
                                distinct company_name
                            FROM
                                job_opening
                            WHERE
                                status = 1
                            LIMIT
                                5
                      ";
                      $res = mysqli_query($conn,$sql);
                      $x=0;
                      while($row = mysqli_fetch_array($res)) { ?>
                        <ul>
                          <li><?php echo ''.$row['company_name']; ?></li>
                        </ul>
                     <?php $x++;}
                      while($x < 5) { ?>
                        <ul>
                        <li></li>
                        </ul>
                     <?php $x++;}
                     ?>
                    </div>
                  </div>
                </div>

                <div class="s-12 m-12 l-6 xl-6 xxl-6">
                  <h3 class="margin-bottom" style="text-align:center;">Classifieds</h3>
                   <div class="margin2x">
                    <div class="s-12 m-12 l-12 xl-12 xxl-12">
                    <?php
                      $sql = "
                          SELECT DISTINCT 
                              title
                          FROM
                              tbl_classified
                          WHERE
                              stat = 1
                          LIMIT
                              5
                      ";
                      $res = mysqli_query($conn,$sql);
                      $x=0;
                      while($row = mysqli_fetch_array($res)) { ?>
                        <ul>
                          <li><?php echo ''.$row['title']; ?></li>
                        </ul>
                     <?php $x++;}
                      while($x < 5) { ?>
                        <ul>
                        <li></li>
                        </ul>
                     <?php $x++;}
                     ?>
                    </div>
                  </div>
                </div>

                </div>
             </div>
            </div>
         </section>
            </div>
             <div class="s-12 m-2 l-3 xl-2 xxl-2 ads-right">
    
            <!-- ================== DISPLAYING APPROVED ADPOSTINGS ===========================-->
            <?php
              $adsLocation = view_ads::ADS_LOCATION_RIGHT;
              view_ads::viewingAds($conn,$adsLocation);
            ?>
            <!-- ================== END OF DISPLAYING AD POSTINGS ============================ -->
          <!-- ADSPACE HERE -->&nbsp;
          
      </div>
         </div>
        
      </div>
      <!-- FOOTER -->
 

 </div>
 </body>
<footer>
         <?php //footer here

         ?>
      </footer>
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
</html>

<?php
function money_formater($value) {
  return 'Php ' . number_format($value,2);
}
?>