<?php
/*
 * Show messages
 */
session_start();
include_once 'view_ads.php';
include_once 'init.php';
$User = $_SESSION['user_id'];
$Outline->addCSS('css/message.css');
$Outline->header('Boarding House');
$Chat = Chat::getChatsForMe($User);
?>
<div class="row">
<div class="tab col-md-3">
    <button class="tablinks active" onclick="openCity(event, 'London')">London</button>
    <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
</div>

<div id="London" class="tabcontent col-md-9 active ">
    <h3>London</h3>
    <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent col-md-9">
    <h3>Paris</h3>
    <p>Paris is the capital of France.</p>
</div>

<div id="Tokyo" class="tabcontent col-md-9">
    <h3>Tokyo</h3>
    <p>Tokyo is the capital of Japan.</p>
</div>
</div>
<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<?php
$Outline->footer();

function money_formater($value)
{
    return 'Php '.number_format($value, 2);
}
?>
