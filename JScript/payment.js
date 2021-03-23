
$(document).ready(function() {
    $(window).on("load",() =>{
    $.ajax({
            url:"./server/payment.php",
            method:"POST",
            success:function(res) {
                //alert(res);
                console.log(res);
                $('#OI_list').html(res);
            }
        })
    })
});

