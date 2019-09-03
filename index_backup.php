<?php

include_once 'includes/db.php';
session_start();     


?>
  <!DOCTYPE html>
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
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
     </head>
     
     <body class="size-1520">
        <div class="s-12 m-12 l-12 xl-12 xxl-12">
        <div class="s-4 m-4 l-3 xl-1 xxl-1">
          <!-- ADSPACE HERE -->&nbsp;
        </div>
        <div class="s-4 m-4 l-6 xl-10 xxl-10">
        <!-- HEADER -->
        <header>
           <div class="line">
              <div class="box">
                 <div class="s-12 l-2">
                    <img class="full-img logo" src="img/mocklogo.png">
                 </div>
                 <div class="s-12 l-8 right">
                    <div class="margin">
                       <form  class="customform s-12 l-8" method="POST" action="includes/searchmain.php">
                          <div class="s-9"><input type="text" placeholder="Search form" name="tags" title="Search form" /></div>
                          <div class="s-3"><button type="submit">Search</button></div>
                       </form>
                       <div class="s-12 l-4">
                          <?php 
                          if(isset($_SESSION['user_id']))
                          {
                            echo "<form action='pre-post.php'>";
                          }
                          else
                          {
                            echo "<form action='login'>";
                          }

                          ?>
                          <!-- <form action="login"> -->
                          <!-- <p class="right cart"><a class="submit" href="/login/"<i class="icon-sli-flag"></i> <b>Post my AD</b> </a></p> -->
                          <button class="button rounded-btn submit-btn s-12" type="submit"><i class="icon-sli-flag"></i>Post My AD </button>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <!-- TOP NAV -->  
           <div class="line">
              <nav>
                 <p class="nav-text">Main navigation</p>
                 <div class="top-nav"  style="background:#4267b2;">
                  <div class="l2 xl-2">
                    &nbsp;
                  </div>
                    <div class="l-8 xl-8" style="align:center;">
                    <ul class="chevron">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="automotives.php">Automotives</a></li>
                      <li><a href="properties.php">Properties</a></li>
                      <li><a href="jobs.php">Job Openings</a></li>
                      <li><a href="classifieds.php">Classifieds</a></li>
                       <?php
                            if(isset($_SESSION['user_id']))
                            {
                             echo "<li><a href='#''>Profile";
                             echo "</a>";
                             echo "<ul>";
                                echo "<li><a href='includes/logout.php'>Logout</a></li>";
                             echo "</ul></li>";
                            }
                            else
                            {
                             echo "<li><a href='login'>Login</a></li>";
                            }
                             ?>
                    </ul>
                  </div>
                  <div class="l-2 xl-2">
                  &nbsp;
                  </div>
                 </div>

              </nav>
           </div>
        </header>
        <!-- ASIDE NAV AND CONTENT -->
        <div class="line">
           <div class="box margin-bottom">
              <div class="margin2x">
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
                 <section class="s-12 m-8 l-9 xl-12"> 

                    <!-- CAROUSEL -->  
                   <!--  <div class="line hide-s">
                      <div id="header-carousel" class="owl-carousel owl-theme">
                         <div class="item"><img src="img/Untitled-1.jpg" alt=""></div>
                         <div class="item"><img src="img/Untitled-2.jpg" alt=""></div>
                         <div class="item"><img src="img/banner1.jpg" alt=""></div>
                      </div>
                    </div>    -->               
               
                  <!-- Breadcrumb -->
                  <!-- <nav class="breadcrumb-nav">
                    <ul>
                      <li><a href="/"><i class="icon-sli-home"></i></a></li>
                      </ul>
                  </nav> -->
                  <h1 class="margin-bottom" style="text-align:center;">Welcome to Billboard Nation</h1>
               
                  <!-- Pruducts -->
                  <div class="margin2x">
                    <div class="s-12 m-12 l-12 xl-12 xxl-12">
                     
                        <!-- OUTPUT ALL AD POSTINGS -->

                        <?php

                        if(isset($_GET['tagid']))
                        {
                          $tag = $_GET['tagid'];
                          $sql=mysqli_query($conn,"SELECT * FROM tbl_pend where pend_title Like '%$tag%'");
                         }
                         else{
                         $sql=mysqli_query($conn,"SELECT * from tbl_pend");   
                         }
                         while($res=mysqli_fetch_array($sql))
                         {
                           echo "<div class='s-12 m-12 l-4 xl-4 xxl-4'>";
                           // POSTING IMAGE

                           $imgs=$res['pend_photos'];
                           $imgs=explode("--/",$imgs);
                           echo "<a href=''><img class='full-img' style='width:250px; height:180px;'src='post_img/".$imgs[0]."'></a>";
                           // POSTING PRICE
                           echo "<h5>".money_formater($res['pend_price'])."</h5>";
                           echo "<a href=''><h4 class='margin-bottom' style='height: 60px;'><strong>".$res['pend_title']."</strong></h4></a>";
                           echo "<p class='margin-bottom' style='font-size:.70rem;height: 34px;'>".$res['pend_transtype'].",".$res['pend_fueltype'].",".$res['pend_loc']."</p>";
                           echo '<p class="margin-bottom" style="width: 250px;white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">'.$res['pend_desc'].'</p>';
                           // echo '<form class="customform s-12 margin-bottom2x" action="view_post.php?viewid='.$res['pend_id'].'">
                                    // <div><button class="button rounded-btn submit-btn s-12" type="submit">View Ad</button></div>
                                 // </form>';
                           echo "<a href='view_post.php?viewid=".$res['pend_id']."' class=button rounded-btn submit-btn s-12 type='submit'>View Ad</a>"; 
                           echo "</div>";
                        }
                        
                        ?>
                      </div>
                   </div>
                                     </div>
               </section>
            </div>
         </div>
      </div>
      <!-- FOOTER -->
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
 </div>
 <div class="s-4 m-4 l-3 xl-1 xxl-1">
  <!-- ADSPACE HERE -->
 </div>

 </div>
   </body>

</html>
<?php
function money_formater($value) {
  return 'Php ' . number_format($value,2);
}


?>