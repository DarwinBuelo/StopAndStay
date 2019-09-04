<?php
include_once 'includes/db.php';
include_once 'view_ads.php';
include_once 'init.php';
session_start();     
$Outline->header('Boarding House');
?>
        <div class="s-12 m-2 l-2 xl-2 xxl-2 ads-left">
          
            <!-- ================== DISPLAYING APPROVED ADPOSTINGS ===========================-->
            <?php
              $adsLocation = view_ads::ADS_LOCATION_LEFT;
              view_ads::viewingAds($conn,$adsLocation);
            ?>
            <!-- ================== END OF DISPLAYING AD POSTINGS ============================ -->
          <!-- ADSPACE HERE -->&nbsp;
          
        </div>
        <div class="s-12 m-8 l-8 xl-8 xxl-8">
        <!-- HEADER -->
        
        <!-- ASIDE NAV AND CONTENT -->
        <div class="line">
           <div class="box margin-bottom">
              <div class="margin2x">
                
                 <!-- CONTENT -->
              <section class="s-12 m-12 l-12 xl-12"> 

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
                  <li><a href="/">Boarding House</a></li>
                </ul>
              </nav>

              <!-- Pruducts -->
                <div class="margin">
                  <div class="s-12 m-12 l-12 xl-12 xxl-12 center ">
                    
                  <h3>Boarding House</h3>
                  <!-- OUTPUT ALL AD POSTINGS -->

                    <?php
                    $counterpost=1;
                    if(isset($_GET['tagid']))
                    {
                    $tag = $_GET['tagid'];
                    $sql=mysqli_query($conn,"SELECT * FROM tbl_property where title Like '%$tag%' and status = 1");
                    }
                    else{
                    $sql=mysqli_query($conn,"SELECT * from tbl_property where status = 1");   
                    }
                    
                    while($res=mysqli_fetch_array($sql))
                    {
                    
                     
                    echo "<div class='s-12 m-6 l-6 xl-4 xxl-4 item-container' style='padding-top:5px;'><div class='item-image'>";
                    // POSTING IMAGE

                    $imgs=$res['photos'];
                    $imgs=explode("--/",$imgs);
                    echo "<img class='full-img1' style='width:100%; height:100%;'src='post_img/".$imgs[0]."'>";
                    // POSTING PRICE
                    echo "<div class='details'>";
                    echo "<a href=''><h4><strong>".$res['title']."</strong></h4></a>";
                    echo "<span class='price'>".money_formater($res['price'])."</span>";
                    echo "<p class='specs'>".$res['location']."</p>";
                    echo '<p class="margin-bottom" style="padding-right:15px;white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">'.$res['description'].'</p>';
                    // echo '<form class="customform s-12 margin-bottom2x" action="view_post.php?viewid='.$res['pend_id'].'">
                    // <div><button class="button rounded-btn submit-btn s-12" type="submit">View Ad</button></div>
                    // </form>';
                    echo "<a href='view_prop.php?viewid=".$res['ID']."' class='button rounded-btn submit-btn s-12 l-10 m-10' type='submit'>View Ad</a>"; 
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
 <div class="s-12 m-2 l-2 xl-2 xxl-2 ads-right">
   
            <!-- ================== DISPLAYING APPROVED ADPOSTINGS ===========================-->
            <?php
              $adsLocation = view_ads::ADS_LOCATION_RIGHT;
              view_ads::viewingAds($conn,$adsLocation);
            ?>
            <!-- ================== END OF DISPLAYING AD POSTINGS ============================ -->
          <!-- ADSPACE HERE -->&nbsp;
          
 </div>
 <?php
$Outline->footer();
function money_formater($value) {
  return 'Php ' . number_format($value,2);
}
?>
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