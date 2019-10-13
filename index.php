<?php
include_once 'includes/db.php';
include_once 'view_ads.php';
include_once 'init.php';
session_start();
$Outline->header('Home');
?>

<div class="s-12 m-2 l-3 xl-2 xxl-2 ads-left">
    <!-- ================== DISPLAYING APPROVED ADPOSTINGS ===========================-->
    <?php
    $adsLocation = view_ads::ADS_LOCATION_LEFT;
    view_ads::viewingAds($conn, $adsLocation);
    ?>
    <!-- ================== END OF DISPLAYING AD POSTINGS ============================ -->
    <!-- ADSPACE HERE -->&nbsp;
</div>
<div class="s-12 m-8 l-6 xl-8 xxl-8">
    <!-- HEADER -->

    <!-- ASIDE NAV AND CONTENT -->
    <div class="line">
        <!-- CONTENT -->
        <section class="s-12 m-12 l-12 xl-12">
            <br>
            <!-- Pruducts -->
            <div class="margin2x">
                <div class="s-12 m-12 l-12 xl-12 xxl-12">
                    <h1 class="margin-bottom" style="text-align:center;">Welcome to Stop N Stay</h1>

                    <div class="s-12 m-12 l-6 xl-6 xxl-6">
                        <h3 class="margin-bottom" style="text-align:center;">Apartment</h3>
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
                                          AND
                                            property_type = 1  
                                        LIMIT
                                            5
                                      ";
                                $res = mysqli_query($conn, $sql);
                                $x = 0;
                                while ($row = mysqli_fetch_array($res)) { ?>
                                    <ul>
                                        <li><?php echo '' . $row['title']; ?></li>
                                    </ul>
                                    <?php $x++;
                                }
                                while ($x < 5) { ?>
                                    <ul>
                                        <li></li>
                                    </ul>
                                    <?php $x++;
                                }
                                ?>

                            </div>
                        </div>
                    </div>


                    <div class="s-12 m-12 l-6 xl-6 xxl-6">
                        <h3 class="margin-bottom" style="text-align:center;">Boarding House</h3>
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
                          AND
                            property_type = 0  
                          LIMIT
                              5
                      ";
                                $res = mysqli_query($conn, $sql);
                                $x = 0;
                                while ($row = mysqli_fetch_array($res)) { ?>
                                    <ul>
                                        <li><?php echo '' . $row['title']; ?></li>
                                    </ul>
                                    <?php $x++;
                                }
                                while ($x < 5) { ?>
                                    <ul>
                                        <li></li>
                                    </ul>
                                    <?php $x++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!--                <div class="s-12 m-12 l-6 xl-6 xxl-6">-->
                    <!--                  <h3 class="margin-bottom" style="text-align:center;">Landmarks</h3>-->
                    <!--                   <div class="margin2x">-->
                    <!--                    <div class="s-12 m-12 l-12 xl-12 xxl-12">-->
                    <!--                    --><?php
                    //                      $sql = "
                    //                      SELECT DISTINCT
                    //                          title
                    //                      FROM
                    //                          tbl_property
                    //                      WHERE
                    //                          status = 1
                    //                      LIMIT
                    //                          5
                    //                      ";
                    //                      $res = mysqli_query($conn,$sql);
                    //                      $x=0;
                    //                      while($row = mysqli_fetch_array($res)) { ?>
                    <!--                        <ul>-->
                    <!--                          <li>--><?php //echo ''.$row['title']; ?><!--</li>-->
                    <!--                        </ul>-->
                    <!--                     --><?php //$x++;}
                    //                      while($x < 5) { ?>
                    <!--                        <ul>-->
                    <!--                        <li></li>-->
                    <!--                        </ul>-->
                    <!--                     --><?php //$x++;}
                    //                     ?>
                    <!--                    </div>-->
                    <!--                  </div>-->
                    <!--                </div>-->

                    <!--                <div class="s-12 m-12 l-6 xl-6 xxl-6">-->
                    <!--                  <h3 class="margin-bottom" style="text-align:center;">Reservation</h3>-->
                    <!--                   <div class="margin2x">-->
                    <!--                    <div class="s-12 m-12 l-12 xl-12 xxl-12">-->
                    <!--                    --><?php
                    //                      $sql = "
                    //                      SELECT DISTINCT
                    //                            title
                    //                        FROM
                    //                            tbl_property
                    //                        WHERE
                    //                            status = 1
                    //                        LIMIT
                    //                      5
                    //                      ";
                    //                      $res = mysqli_query($conn,$sql);
                    //                      $x=0;
                    //                      while($row = mysqli_fetch_array($res)) { ?>
                    <!--                        <ul>-->
                    <!--                          <li>--><?php //echo ''.$row['title']; ?><!--</li>-->
                    <!--                        </ul>-->
                    <!--                     --><?php //$x++;}
                    //                      while($x < 5) { ?>
                    <!--                        <ul>-->
                    <!--                        <li></li>-->
                    <!--                        </ul>-->
                    <!--                     --><?php //$x++;}
                    //                     ?>
                    <!--                    </div>-->
                    <!--                  </div>-->
                    <!--                </div>-->

                </div>
            </div>
    </div>
    </section>
</div>
<div class="s-12 m-2 l-3 xl-2 xxl-2 ads-right">

    <!-- ================== DISPLAYING APPROVED ADPOSTINGS ===========================-->
    <?php
    $adsLocation = view_ads::ADS_LOCATION_RIGHT;
    view_ads::viewingAds($conn, $adsLocation);
    ?>
    <!-- ================== END OF DISPLAYING AD POSTINGS ============================ -->
    <!-- ADSPACE HERE -->&nbsp;

</div>
<?php
function money_formater($value)
{
    return 'Php ' . number_format($value, 2);
}

$Outline->footer();
?>
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
    })
</script>