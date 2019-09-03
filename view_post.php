<!DOCTYPE html>
<?php
session_start();
include_once('includes/db.php');
if(!isset($_GET['viewid']))
{
  header('location:error_404.php');
}
else
{
?>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Billboard Nation</title>
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
   </head>
   <style>
       .full-img1{    
          max-width: 100%;
          max-height: 500px;
        }

        </style>
     <body class="size-1520">
        <div class="s-12 m-12 l-12 xl-12 xxl-12">
        <div class="s-2 m-2 l-3 xl-1 xxl-1">
          <!-- ADSPACE HERE -->&nbsp;
        </div>
        <div>
        <!-- HEADER -->
        <header>

           <div class="line">
              <div class="box">
                <div class="left"></div>
                 <div class="mid">
                    <img class="full-img logo" src="img/mocklogo.png">
                 </div>
                 <div class="right">
                    <div class="margin">
                       <div class="s-12 md-12 l-12 center">
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
        <!-- ASIDE NAV AND CONTENT -->
      <div class="line">
                <section class="s-12 m-12 l-9 xl-10 post-wrap"> 

                <!-- Breadcrumb -->
                <nav class="breadcrumb-nav">
                  <ul>
                    <li><a href="index.php"><i class="icon-sli-home"></i></a></li>
                    <li><a href="automotives.php">Automotives</a></li>
                  <li><a href="">View Post</a></li>
                  <!-- <li><span>Sub Category 1</span></li> -->
                  </ul>
                </nav>
                <!-- ECHO THE POST NAME -->
                <?php

                $teabag=$_GET['viewid'];
                $sql=mysqli_query($conn,"SELECT * FROM tbl_pend where pend_id=$teabag");
                while($res=mysqli_fetch_array($sql))
                {  
                ?>
                <h3 class="margin-bottom"><?php echo $res['pend_title'];?></h3>

                <!-- Pruducts -->
                <div class="margin2x">
                  <div class="s-12 m-9 l-9 xl-9 xl-9">

                    <div class="line">
                      <div id="header-carousel" class="owl-carousel owl-theme">
                        <?php
                        $imgs=$res['pend_photos'];
                        $imgs=explode("--/",$imgs);
                        foreach($imgs as $image)
                        echo '<div class="item"><img class="full-img1" style="width:100%; height:100%;" src="post_img/'.$image.'" alt=""></div>';
                        ?>
                      </div>
                    </div>

                  <h5><strong><?php echo money_formater($res['pend_price']); ?></strong></h5>
                  <div  class="line hide-s">
                  <table>
                    <th align="center">Year</th>
                    <th align="center">Kilometers</th>
                    <th align="center">Fuel Type</th>
                    <th align="center">Transmission</th>
                    <tr>
                      <td align="center">
                        <img class="details_icons" src="img/Calendar.png">
                        <br><?php echo $res['pend_year']; ?>
                      </td>
                      <td align="center">
                        <img class="details_icons" src="img/Km.png">
                        <br><?php echo $res['pend_km']; ?>
                      </td>
                      <td align="center">
                        <img class="details_icons" src="img/FuelType.png">
                        <br><?php echo $res['pend_fueltype']; ?></td>
                      <td align="center">
                        <img class="details_icons" src="img/Automatic.png">
                        <br><?php echo $res['pend_transtype']; ?></td>
                      </tr>
                    <th align="center">Body Type</th>
                    <th align="center">Doors</th>
                    <th align="center">Color</th>
                    <th align="center">Condition</th>
                    <tr>
                      <td align="center">
                        <img class="details_icons" src="img/BodyCondition.png">
                        <br><?php echo $res['pend_bodytype']; ?>
                      </td>
                      <td align="center">
                        <img class="details_icons" src="img/Doors.png">
                        <br><?php echo $res['pend_doors']; ?>
                      </td>
                      <td align="center">
                        <img class="details_icons" src="img/Color.png">
                        <br><?php echo $res['pend_color']; ?></td>
                      <td align="center">
                        <img class="details_icons" src="img/BodyCondition.png">
                        <br><?php echo $res['pend_bodycon']; ?></td>
                    </tr>
                  </table>
                </div>
                  <h4>Description:</h4>
                    <p class="margin-bottom"><?php echo $res['pend_desc']; ?></p>
                  <h4>Extra Features:</h4>
                    <?php 
                    $extras = explode(", ",$res['pend_extras']);
                    foreach($extras as $extra)
                    {
                    echo '<p class="margin-bottom">'.$extra.'</p>';
                    }
                    ?>
                  </div>
                <div class="s-12 m-3 l-3 xl-3 xxl-3">
                  <form class="customform s-12 margin-bottom2x" >
                    <button class="button rounded-btn submit-btn s-12" type="submit"><b><?php echo $res['pend_pnum'] ?></b></button><br><br>
                    <!-- <button class="button rounded-btn submit-btn s-12" type="submit">Show On Map</button><br><br> -->
                    <h3>Information</h3>
                    <p>
                      <i class="material-icons">event_available</i> &nbsp;&nbsp; January 25, 2018 <br>
                      <i class="material-icons">location_on</i> &nbsp;&nbsp; <?php echo $res['pend_loc']; }}?><br>
                      <i class="material-icons">link</i> &nbsp;&nbsp; BITLY LINK
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