$(document).ready(function() {
    $(window).on("load",() =>{
        let type = $('#payType').val();
        $('.loader').css('display','flex');
    $.ajax({
            url:"./server/success-order.php",
            method:"POST",
            data:{Type:type},
            success:function(res) {
                let jsonobj = JSON.parse(res);
                if(jsonobj.checkoutStatus){
                    $('.loader').css('display','none');
                    $('.order_id').html(jsonobj[0].order_id);
                }
            },
            Error:function(xhr,error) {
                alert(xhr.responseText);
            }
            
        })
    })
});