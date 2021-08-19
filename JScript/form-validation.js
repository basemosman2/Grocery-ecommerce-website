
  $(document).ready(function() {
    $('#form-data').on('submit',(e)=>{
        e.preventDefault();
        $.ajax({
            url:"./server/user-info.php",
            method:"POST",
            data:$("#form-data").serialize(),
            success:function (res) {
                if (res =='success') {
                    $('#alert-data').css('display','none');
                    $('.user_info').fadeOut();
                    $('.cart_details').css('margin','10px 0');
                    $('.payment-display').fadeIn('slow');
                    $('.btn-submit').css('display','none');
                }else{
                    //alert(res);
                    $('#alert-data').html(res);
                    $('#alert-data').css('display','inline-block');
                }
            }
        })
    })

  })