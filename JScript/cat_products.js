$().ready(function() {
    $(window).on("load",() =>{
        let x = $('#iSearch').val();
    $.ajax({
            url:"./server/cat_products.php",
            method:"POST",
            data:{"search":x}
        }).done(function(data) {
            $('#Products_cate').html(data);
        });
    })

});