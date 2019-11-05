<div class="roomTypeModal">
    <div class="modalBox">
        <div class="mapheader">
            <button class="roomTypeModalClose">x</button>
        </div>
        <br>
        <div class="wrap-input100 input col-9">
            <input class="input100" type="text" name="roomType" id="roomType" placeholder="Room Type">
            <span class="focus-input100"></span>
        </div>
        <br>
        <div class="wrap-input100 input col-9">
            <input class="input100" type="number" name="capacity" id="capacity" placeholder="Capacity">
            <span class="focus-input100"></span>
        </div>
        <br>
        <div class="wrap-input100 input col-9" data-validate="Please enter price">
            <input class="input100" type="number" name="monthlyPrice" id="monthlyPrice" placeholder="Monthly Price">
            <span class="focus-input100"></span>
        </div>
        <br>
        <div class="mapFooter">
            <button class="login100-form-btn" id="btnSaveRoomType" name="btnSaveRoomType"  style="margin-left: 10%; width: 400px; background-color: <?= $color; ?>">
                Save
            </button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var details= [];
        $('.roomTypeModal').fadeOut();

        $('.roomTypeModalShow').click(function () {
            $('.roomTypeModal').fadeIn();
        });

        $('.roomTypeModalClose').click(function () {
            $('.roomTypeModal').fadeOut();
        });

        $('#btnSaveRoomType').click(function () {
            $('.roomTypeModal').fadeOut();
            var roomType = $("#roomType").val();
            var capacity = $("#capacity").val();
            var price = $("#monthlyPrice").val();
            details.push(roomType+","+capacity+","+price);
            $("#roomDetails").append("<option value='"+roomType+", "+capacity+"'>"+roomType+", "+capacity+", "+price+"</option>");
            $("#details").val(details);
            $("#roomType").val("");
            $("#capacity").val("");
            $("#monthlyPrice").val("");
        });

    });
</script>