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
$Chats = Chat::getChatsForMe($User);
$ChaterIDs = array_keys($Chats);
?>
<div class="row">
    <div class="tab col-md-3">
        <?php
        $html = null;
        foreach ($ChaterIDs as $chatmate) {
            $html .= '<button class="tablinks" onclick="openCity(event, \''.$chatmate.'\')">'.User::getName($chatmate).'</button>';
        }
        echo $html;
        ?>

    </div>
    <?php
    foreach ($Chats as $key => $chat) {
        ?>
        <div id = "<?= $key ?>" class = "tabcontent col-md-9">
            <h3><?= User::getName($key) ?></h3>
            <div class="messageBlock align-bottom">
                <?php
                $html = null;
                    ksort($chat);
                    foreach($chat as $message){
                        if($message->getSenderID() == $User){
                            $html .= " <div class='row'><div class='myMessage'>{$message->getMessage()}</div></div>";
                        }else{
                            $html .= " <div class='row'><div class='userMessage'>{$message->getMessage()}</div></div>";
                        }
                    }
                    echo $html;
                ?>
            </div>
            <div class="messageForm">
                <form action="#">
                    <input type="hidden" name="to">
                    <input class="inputMessage" type="text" name="message">
                    <button class="btn btn-secondary">Send</button>
                </form>
            </div>
        </div>
        <?php
    }
    ?>

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
