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
        <title>Billboard Nation | Jobs</title>
      	<link rel="stylesheet" type="text/css" href="css/main.css">
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
        .full-img1{    
          max-width: 200px;
          max-height: 150px;
        }
        .ad-img
        {   
        margin-left: 10px;
        margin-right: 5px;
        }
         .ad-img2
        {   
        margin-left: 0px;
        margin-right: 10px;
        }
        </style>
     </head>
     
     <body class="size-1520">
        <div class="s-12 m-12 l-12 xl-12 xxl-12">
          <header>

           <div class="line">
              <div class="box">
              <div class="left">
                    <div style="width: 80%; margin-top: 5%;">
                        <form  class="customform" method="POST" action="includes/searchmain.php?page=jobs">
                            <div class="wrap-input100 validate-input m-b-16" style="width: 100%;">
                              <input class="input100" type="text" placeholder="Search Title" name="tags" title="Search form"/>
                              <span class="focus-input100"></span>
                            </div>
                        </form>
                  </div>
                </div>
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
           <div class="box margin-bottom">
              <div class="margin2x">
                
                 <!-- CONTENT -->
              <section class="s-12 m-8 l-9 xl-12"> 

              <!-- CAROUSEL -->  
              <div class="line hide-s">
                <div id="header-carousel" class="owl-carousel owl-theme">
                  <?php
                    $adsLocation = view_ads::ADS_LOCATION_HEADER;
                    view_ads::viewingAds($conn,$adsLocation);
                  ?>
                </div>
              </div>                  

              <!-- Breadcrumb -->
              <nav class="breadcrumb-nav">
                <ul>
                  <li><a href="/"><i class="icon-sli-home"></i></a></li>
                  <li><a href="/">Jobs</a></li>
                </ul>
              </nav>

              <!-- Pruducts -->
                <div class="margin">
                  <div class="s-12 m-12 l-12 xl-12 xxl-12 center ">
                    
                  <h3>Job Openings</h3>
                  <!-- OUTPUT ALL AD POSTINGS -->

                    <?php
                    $counterpost=1;
                    if(isset($_GET['tagid']))
                    {
                    $tag = $_GET['tagid'];
                     $sql=mysqli_query($conn,"SELECT * FROM job_opening where company_name Like '%$tag%' and status = 1");
                    }
                    else{
                    $sql=mysqli_query($conn,"SELECT * from job_opening where status =1");   
                    }
                    
                    while($res=mysqli_fetch_array($sql))
                    {
                    
                     
                    echo "<div class='s-12 m-12 l-12 xl-4 xxl-4 item-container' style='padding-top:5px;'><div class='item-image'>";
                    // POSTING IMAGE

                   //$imgs=$res['pend_photos'];
                    //$imgs=explode("--/",$imgs);
                    //echo "<img class='full-img1' style='width:100%; height:100%;'src='post_img/".$imgs[0]."'>";
                    // POSTING PRICE
                    echo "<div class='details'>";
                    echo "<a href=''><h4><strong>".$res['company_name']."</strong></h4></a>";
                   // echo "<span class='price'>".money_formater($res['pend_price'])."</span>";                    
                    echo "<p class='specs'>
                    <i class='material-icons'>business_center</i>".$res['position']."<br>
                    <i class='material-icons'>assignment_ind</i>".$res['industry']."<br>
                    <i class='material-icons'>link</i><a href='//".$res['company_website']."'>".$res['company_website']."</a><br>
                    <i class='material-icons'>location_on</i>".$res['location']."</p>";                   
                    echo "<a href='view_jobs.php?viewid=".$res['id']."' class='button rounded-btn submit-btn s-12 l-10 m-10' type='submit'>View Ad</a>"; 
                   echo "</div></div></div>";
                    //  if($counterpost%3==0)
                    // {
                    //   echo '</div>';
                    //   echo '<div class="row">';
                    //   // echo 'ture';
                    // }
                    // $counterpost=$counterpost+1;
                    }

                    ?>
                  </div>
                </div>
              </section>
            </div>
         </div>
      </div>
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
 </div>
   </body>

</html>
<?php
function money_formater($value) {
  return 'Php ' . number_format($value,2);
}


?>