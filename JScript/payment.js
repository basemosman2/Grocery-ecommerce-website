


$(document).ready(function() {
    // window.addEventListener('load',function() {
    //     $.ajax({
    //         url:"../server/payment.php",
    //         method:"POST",
    //         data:{req:"cart-list",},
    //         success:function(res) {
    //             alert(res);
    //         }
    //     })
    // });

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