<?php
session_start();
include_once 'view_ads.php';
include_once 'init.php';
$User = $_SESSION['user_id'];
$Outline->addCSS('css/myProp.css');
$Outline->header('My Properties');
$Outline->loadJS();
$myProps = UserProperty::GetMyProperties($User)
?>


<div class="row myPropList">
    <div class="col-md-6 offset-md-3">
        <?php
        foreach ($myProps as $prop) {
            $photo = explode('--/', $prop->getPhotos());
            ?>
            <div class="row myPropContainer">
                <div class="col-md-3">
                    <img src="post_img/<?= $photo[0] ?>">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <?= $prop->getTitle() ?>
                    </div>
                    <div class="row">
                        <?= $prop->getDescription() ?>
                    </div>
                </div>
                <div class='col-md-3 align-content-center h-100'>
                    <button class="btn btn-primary center" id="modalTrigger" data-key="<?= $prop->getPropertyID() ?>">Edit</button>
                </div>

            </div>

            <?php
        }
        ?>
    </div>
</div>

<!-- modal -->
<div class="modal" id="editProp">
    <div class="modalContainer">
        <form id="editForm" method="post" action="process.php">
            <div class="header">
                Edit Property Details
                <div class="close" id="modalTriggerClose">x</div>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <img src="post_img/hnl.jpg">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12"><h3>Properties Details</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">Title :</div>
                                        <div class="col-md-9"><input type="text"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Contact:</div>
                                        <div class="col-md-9"><input type="text"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Monthly Price:</div>
                                        <div class="col-md-9"><input type="text"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Advance Payment:</div>
                                        <div class="col-md-9"><input type="text"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Bed Rooms:</div>
                                        <div class="col-md-9"><input type="text"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Bath Rooms:</div>
                                        <div class="col-md-9"><input type="text"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Ready by:</div>
                                        <div class="col-md-9"><input type="text"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Extras:
                                        </div>
                                    </div>
                                    <div class="row extras">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="Balcony">
                                                </div>
                                                <div class="col-md-5">
                                                    Balcony
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]"  value="Built n Kitchen Appliances">
                                                </div>
                                                <div class="col-md-5">
                                                    Built n Kitchen Appliances
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="Built in Wardrobes">
                                                </div>
                                                <div class="col-md-5">
                                                    Built in Wardrobes
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]"  value="Covered Parking">
                                                </div>
                                                <div class="col-md-5">
                                                    Covered Parking
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="Maid Service">
                                                </div>
                                                <div class="col-md-5">
                                                    Maid Service
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]"  value="Maids Room">
                                                </div>
                                                <div class="col-md-5">
                                                    Maids Room
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="Pets Allowed">
                                                </div>
                                                <div class="col-md-5">
                                                    Pets Allowed
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]"  value="Private Garden">
                                                </div>
                                                <div class="col-md-5">
                                                    Private Garden
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="Private Gym">
                                                </div>
                                                <div class="col-md-5">
                                                    Private Gym
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]"  value="Private Pool">
                                                </div>
                                                <div class="col-md-5">
                                                    Private Pool
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="Security">
                                                </div>
                                                <div class="col-md-5">
                                                    Security
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]"  value="Study">
                                                </div>
                                                <div class="col-md-5">
                                                    Study
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="View of Landmark">
                                                </div>
                                                <div class="col-md-5">
                                                    View of Landmark
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]"  value="Walk-in Closet">
                                                </div>
                                                <div class="col-md-5">
                                                    Walk-in Closet
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="CCTV">
                                                </div>
                                                <div class="col-md-5">
                                                    CCTV
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]"  value="Wifi">
                                                </div>
                                                <div class="col-md-5">
                                                    Wifi
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="checkbox" name="extras[]" value="Fire Extinguisher">
                                                </div>
                                                <div class="col-md-5">
                                                    Fire Extinguisher
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">Description :</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-11"><textarea></textarea></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-11">Location :</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="mapIframe">
                                                <iframe id="mapIframe" src="view/googleMap.php?drag=true&long=123.73333&lat=13.13333"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-danger" id="modalTriggerClose">Close</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<!-- Script for modal -->
<script>
    $(document).ready(function () {
        //show modal and load data
        $("[id=modalTrigger]").click(function () {
            var propID = $(this).data("key");
            console.log(propID);
            $('#editProp').fadeIn();

        });

        //close Modal
        $("[id=modalTriggerClose]").click(function (event) {
            event.preventDefault();
            $('#editForm').trigger("reset");
            $('#editProp').fadeOut();
        });


    });
</script>