
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>

   <div id="top"><!-- Top Begin -->

       <div class="container"><!-- container Begin -->

           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->

               <a href="#" class="btn btn-success btn-sm">

                   <?php

                   if(!isset($_SESSION['customer_email'])){

                       echo "Welcome: Guest";

                   }else{

                       echo "Welcome: " . $_SESSION['customer_email'] . "";

                   }
                   ?>

               </a>


           </div><!-- col-md-6 offer Finish -->

           <div class="col-md-6"><!-- col-md-6 Begin -->

               <ul class="menu"><!-- cmenu Begin -->
                   <li>
                       <a href="checkout.php">

                        <?php
                                if (isset($_SESSION['user_id'])) {
                                $html = "<a href='includes/logout.php'>Sign-out</a>";
                              } else {
                                $html = "<a href='login'>Register | Login</a>";
                              }
                        ?>

                       </a>
                   </li>

               </ul><!-- menu Finish -->

           </div><!-- col-md-6 Finish -->

       </div><!-- container Finish -->

   </div><!-- Top Finish -->

   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->

       <div class="container"><!-- container Begin -->

           <div class="navbar-header"><!-- navbar-header Begin -->

               <a href="front.php" class="navbar-brand home"><!-- navbar-brand home Begin -->

                   <h3 class="hidden-xs">Stop And Stay</h3>
                   <h3 class="visible-xs">Stop And Stay</h3>

               </a><!-- navbar-brand home Finish -->

               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                   <span class="sr-only">Toggle Navigation</span>

                   <i class="fa fa-align-justify"></i>

               </button>

               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                   <span class="sr-only">Toggle Search</span>

                   <i class="fa fa-search"></i>

               </button>

           </div><!-- navbar-header Finish -->

           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

               <div class="padding-nav"><!-- padding-nav Begin -->

                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->

                       <li class="active">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="active">
                           <a href="boardingHouse.php">Boarding House</a>
                       </li>
                       <li class="active">
                           <a href="apartment.php">Apartment</a>
                       </li>
                       <li class="active">
                           <a href='#'>My Account</a>
                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="#">Contact Us</a>
                       </li>

                   </ul><!-- nav navbar-nav left Finish -->

               </div><!-- padding-nav Finish -->
               <?php
                    if (isset($_SESSION["user_id"])) {
                        echo '<a href="pre-post.php" class="btn navbar-btn btn-primary right">';


                    } else {
                        echo '<a href="login" class="btn navbar-btn btn-primary right">';
                    }
                ?>
                   <span>Post my Ads</span>
               </a>

               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->

                   <!--<button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">-->

                       <!--<span class="sr-only">Toggle Search</span>-->

                       <!--<i class="fa fa-search"></i>-->

                   <!--</button>-->

               </div><!-- navbar-collapse collapse right Finish -->


           </div><!-- navbar-collapse collapse Finish -->

       </div><!-- container Finish -->

   </div><!-- navbar navbar-default Finish -->
