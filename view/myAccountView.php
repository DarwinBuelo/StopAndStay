<div class="s-12 m-2 l-2 xl-2 xxl-2 ads-left">
    <!-- ================== DISPLAYING APPROVED ADPOSTINGS ===========================-->
    <?php
    $adsLocation = view_ads::ADS_LOCATION_LEFT;
    view_ads::viewingAds($conn, $adsLocation);
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
                            view_ads::viewingAds($conn, $adsLocation);
                            ?>
                        </div>
                    </div>
                    <!--                    <nav class="breadcrumb-nav">-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="index.php"><i class="icon-sli-home"></i></a></li>-->
                    <!--                            <li><a href="#">Apartment</a></li>-->
                    <!--                            <li><a href="#">Boarding House</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </nav>-->
                    <!-- Pruducts -->
                    <div class="margin">
                        <div class="s-12 m-12 l-12 xl-12 xxl-12 center ">
                            <h3>My Boarding House</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tspots_all" class="table table-striped table-bordered table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Room Type</th>
                                            <th>User</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x = 1;
                                        foreach ($reservedUser as $user) {
                                            $btnApprove = $user['approve'] == 0 ? 'Accept' : 'Decline';
                                            $bgcolor = $user['approve'] == 0 ? '#4FBFA8' : '#B91515';
                                            $ifExpired = date('Y-m-d') == $user['date_expiration'] ? true : false;
                                            $buttonStatus = $ifExpired == true ? 'disabled' : '';
                                            ?>
                                        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="ownerID" value="<?= $user['owner_id']; ?>">
                                                    <input type="hidden" name="userID" value="<?= $user['user_id']; ?>">
                                                    <input type="hidden" name="propertyID" value="<?= $user['tbl_property_id']; ?>">
                                                    <input type="hidden" name="status" value="<?= $user['approve']; ?>">
                                                    <input type="hidden" name="title" value="<?= $user['title']; ?>">
                                                    <input type="hidden" name="roomDetailsID" value="<?= $user['room_details_id']; ?>">
                                                    <?= $user['title']; ?>
                                                </td>
                                                <td><?= $user['description']; ?></td>
                                                <td><?= $user['room_type']; ?></td>
                                                <td><?= !empty($user['user_email']) ? $user['user_email'] : $user['user_fname']; ?></td>
                                                <td><?= $user['location']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($ifExpired == true) {
                                                        echo 'Expired';
                                                    } else {
                                                        echo $user['approve'] == 0 ? 'Unapprove' : 'Approved';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class="button rounded-btn submit-btn s-12" name="btnAction" style="background-color: <?= $bgcolor; ?>" <?= $buttonStatus; ?>>
                                                        <b><?= _($btnApprove); ?></b>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                        <?php $x++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="s-12 m-12 l-12 xl-12">

                    <!-- CAROUSEL -->
                    <div class="line hide-s">
                        <div id="header-carousel" class="owl-carousel owl-theme">
                            <?php
                            $adsLocation = view_ads::ADS_LOCATION_HEADER;
                            view_ads::viewingAds($conn, $adsLocation);
                            ?>
                        </div>
                    </div>
                    <!--                    <nav class="breadcrumb-nav">-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="index.php"><i class="icon-sli-home"></i></a></li>-->
                    <!--                            <li><a href="#">Apartment</a></li>-->
                    <!--                            <li><a href="#">Boarding House</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </nav>-->
                    <!-- Pruducts -->
                    <div class="margin">
                        <div class="s-12 m-12 l-12 xl-12 xxl-12 center ">
                            <h3>My Apartment</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tspots_all" class="table table-striped table-bordered table-sm" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>User</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($reservedUserApartment as $user) {
                                        $btnApprove = $user['approve'] == 0 ? 'Accept' : 'Decline';
                                        $bgcolor = $user['approve'] == 0 ? '#4FBFA8' : '#B91515';
                                        $ifExpired = date('Y-m-d') == $user['date_expiration'] ? true : false;
                                        $buttonStatus = $ifExpired == true ? 'disabled' : '';
                                        ?>
                                        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="ownerID" value="<?= $user['owner_id']; ?>">
                                                    <input type="hidden" name="userID" value="<?= $user['user_id']; ?>">
                                                    <input type="hidden" name="propertyID" value="<?= $user['tbl_property_id']; ?>">
                                                    <input type="hidden" name="status" value="<?= $user['approve']; ?>">
                                                    <input type="hidden" name="title" value="<?= $user['title']; ?>">
                                                    <?= $user['title']; ?>
                                                </td>
                                                <td><?= $user['description']; ?></td>
                                                <td><?= !empty($user['user_email']) ? $user['user_email'] : $user['user_fname']; ?></td>
                                                <td><?= $user['location']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($ifExpired == true) {
                                                        echo 'Expired';
                                                    } else {
                                                        echo $user['approve'] == 0 ? 'Unapprove' : 'Approved';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class="button rounded-btn submit-btn s-12" name="btnAction" style="background-color: <?= $bgcolor; ?>" <?= $buttonStatus; ?>>
                                                        <b><?= _($btnApprove); ?></b>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                        <?php $x++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>