
<div class="mapModal">
    <div class="modalBox">
        <div class="mapheader">
            <button class="mapSave">Save</button>
            <button class="mapModalclose">x</button>
        </div>
        <div class="iframe">
            <iframe id="mapIframe" src="view/googleMap.php?drag=true&long=123.73333&lat=13.13333"></iframe>
        </div>
        <div class="mapFooter"> Please drag the pointer to the location and click save</div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('.mapModalShow').on('click focus', function () {
            
            $('.mapModal').fadeIn();
        });
        $('.mapModalclose').on('click focus', function () {
            $('.mapModal').fadeOut();
        });

        $('.mapSave').click(function () {
            var loc = $('#mapIframe').contents().find('#coordinate').html();
            $('.mapModal').fadeOut();
            $.ajax({
                url: "https://api.mapbox.com/geocoding/v5/mapbox.places/" + loc + ".json?access_token=pk.eyJ1IjoibWljcm9zYW0iLCJhIjoiY2pwOXdlM2hxMDBsZzNycGs4ODBwbTBxZyJ9.NUTOMtn_cFkY3tNXeffz8A",
                success: function (response) {
                    console.log(response);
                    var data = response.features[1].place_name;
                    $('#coord').val(loc);
                    $('#locator').val(data.slice(0, -13));
                }
            });
        });

    });
</script>