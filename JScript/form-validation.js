// function validate() {
//      const email = $("#email").val();
//      const postcode = $('#postcode').val();
//      var invaild = document.querySelector('#invaild_title');
//      invaild.style.display="none";
//      var vaild = true;
//         if(!validateEmail(email)){
//             $("#email").css({'background':'hsl(0, 50%, 90%)','border-color':'hsl(0, 50%, 50%)'});
//             invaild.innerHTML = "*Email is Not Valid <br>";
//             vaild = false;
//             invaild.style.display ='block';
//         }

//         if (!valid_postcode(postcode)) {
//             $("#postcode").css({'background':'hsl(0, 50%, 90%)','border-color':'hsl(0, 50%, 50%)'});
//             invaild.innerHTML += "*Postcode is Not Valid";
//             vaild = false;
//             invaild.style.display ='block';
//         }   
//         return vaild;
      
// }

// function validateEmail(email) {
//     const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(email);
//   }

//   function valid_postcode(postcode) {
//     postcode = postcode.replace(/\s/g, "");
//     var regex = /^[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}$/i;
//     return regex.test(postcode);
// }

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