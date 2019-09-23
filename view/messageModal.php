<!-- MODAL -->
<?php
$UserSender = $_SESSION['user_id'];

?>
<div class="modal modalShow fade-in">
    <div class="modalBox">
        <form action="processMessage.php" method="post" id="newMessageForm">
            <input type="hidden" name="sender" value="<?= $UserSender ?>">
            <div><input type="text" name="to" class="to" placeholder="Name" value=""></div>
            <div><textarea class="message" name="message" placeholder="Message"></textarea></div>
            <div class="inlineButton right"><button type="button" class="btn btn-danger modalTriggerHide">Cancel</button><button type="submit" class="btn btn-primary">Send</button>
        </div>
        </form>
    </div>
</div>
