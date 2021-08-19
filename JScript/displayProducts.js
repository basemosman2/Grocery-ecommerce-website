$().ready(function() {
    $(window).on("load",() =>{
    $.ajax({
            url:"./server/getProducts.php",
            method:"POST",
            success:function(res) {
                $('#Products').html(res);
            }
        })
    })

});