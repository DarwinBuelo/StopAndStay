
$("document").ready(function () {
    $('#approvalForm').one('submit', function (e) {
        e.preventDefault();
//            $('#mymodal').fadeIn();
//            
//            $('#btnCancel').click(function(){
//                $('#mymodal').fadeOut();
//            });
//            
//            $('#btnAccept').click(function(){
//                var html = "<input type='hidden' name'btnAction' value='0'>"
//                 $('#approvalForm').append(html);
//                 $('#mymodal').fadeOut();
//                 $('#approvalForm').submit();
//            });
        var btn = $(this).find("button[type=submit]:focus" )
        console.log(btn.attr('id'));
        if (btn.attr('id') === 'btnAction') {
            var result = confirm("Want to decline?");
            if (result) {
                var html = "<input type='hidden' name='btnDecline' value='0'>"
                $(this).append(html);
                $(this).submit();
            }
        } else {
            var result = confirm("Want to Perform this action?");
            if (result) {
                var html = "<input type='hidden' name='btnAction' value='0'>"
                $(this).append(html);
                $(this).submit();
            }
        }


    });
});
