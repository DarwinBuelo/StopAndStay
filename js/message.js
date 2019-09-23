//will handle the modal
$(document).ready(function () {
    $('.modalTriggerShow').click(function () {
        $('.modalShow').fadeIn();
        var to = $(this).data('owner');
        if(to != null){
            $('.to').prop({type:"hidden",value:to});
        }
    });

    $('.modalTriggerHide').click(function () {
        $('.modalShow').fadeOut();
        $('#newMessageForm')[0].reset();
    });

});