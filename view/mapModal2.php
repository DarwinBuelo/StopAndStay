
<div class="mapModal">
    <div class="modalBox">
        <div class="mapheader" style="left:642px">
            <button class="mapModalclose" >x</button>
        </div>
        <div class="iframe">
            <iframe id="mapIframe" src="view/googleMap.php?drag=false&long=<?= $coord[0] ?>&lat=<?= $coord[1] ?>"></iframe>
        </div>
        <div class="mapFooter">test</div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $.ajax({
            url: "https://api.mapbox.com/geocoding/v5/mapbox.places/<?= $coord[0].','.$coord[1] ?>.json?access_token=pk.eyJ1IjoibWljcm9zYW0iLCJhIjoiY2pwOXdlM2hxMDBsZzNycGs4ODBwbTBxZyJ9.NUTOMtn_cFkY3tNXeffz8A",
            success: function (response) {
                var data = response.features[1].place_name;
                $('#locator').val(data.slice(0, -13));
                $('.mapFooter').text(data.slice(0, -13));
            }
        });
        
        $('.mapModalShow').on('click focus', function () {
            $('.mapModal').fadeIn();

        });
        $('.mapModalclose').on('click focus', function () {
            $('.mapModal').fadeOut();
        });

    });
</script>