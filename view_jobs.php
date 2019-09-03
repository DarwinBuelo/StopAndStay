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
     <body class="size-1520">
        <div class="s-12 m-12 l-12 xl-12 xxl-12">
        <div class="s-2 m-2 l-3 xl-1 xxl-1">
          <!-- ADSPACE HERE -->&nbsp;
        </div>
        <div class="s-12 m-12 l-12 xl-12 xxl-12">
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
         <div class="box margin-bottom">
            <div class="margin2x">
                <section class="s-12 m-12 l-9 xl-10 post-wrap"> 

                <!-- Breadcrumb -->
                <nav class="breadcrumb-nav">
                  <ul>
                    <li><a href="index.php"><i class="icon-sli-home"></i></a></li>
                    <li><a href="jobs.php">Job Openings</a></li>
                  <li><a href="">View Job </a></li>
                  <!-- <li><span>Sub Category 1</span></li> -->
                  </ul>
                </nav>
                <!-- ECHO THE POST NAME -->
                <?php

                $id=$_GET['viewid'];
                $sql=mysqli_query($conn,"SELECT * FROM job_opening where id=$id");
                while($res=mysqli_fetch_array($sql))
                {  
                ?>
                <h3 class="margin-bottom"><?php echo $res['position'];?></h3>

                <!-- Pruducts -->
                <div class="margin2x">
                  <div class="s-12 m-8 l-8 xl-7 xl-3">

                    <?php echo "
                    <p class='margin-bottom'>
                    <i class='material-icons'>business_center</i>".$res['company_name']."<br>
                    <i class='material-icons'>assignment_ind</i>".$res['industry']."<br>
                    <i class='material-icons'>people</i>".$res['company_size']."<br>
                    <i class='material-icons'>phone</i>".$res['phone_number']."<br>
                    <i class='material-icons'>email</i><a href='mailto:".$res['email_address']."'>".$res['email_address']."<br>
                    <i class='material-icons'>link</i><a href='//".$res['company_website']."'>".$res['company_website']."</a><br>
                    <i class='material-icons'>location_on</i>".$res['location']."</p>
                    <p class='margin-bottom'><h5>Job Description</h5>".$res['description']."</p>";
                  }
                }?><br>
                </div>
              </div>
            </section>
         </div>
             
      </div>
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