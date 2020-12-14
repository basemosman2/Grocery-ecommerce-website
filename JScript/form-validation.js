function validate() {
     const email = $("#email").val();
     const postcode = $('#postcode').val();
     var invaild = document.querySelector('#invaild_title');
     invaild.innerHTML="";
     var vaild = true;
        if(!validateEmail(email)){
            $("#email").css({'background':'hsl(0, 50%, 90%)','border-color':'hsl(0, 50%, 50%)'});
            invaild.innerHTML = "*Email is Not Valid <br>";
            vaild = false;
            invaild.style.display ='block';
        }

        if (!valid_postcode(postcode)) {
            $("#postcode").css({'background':'hsl(0, 50%, 90%)','border-color':'hsl(0, 50%, 50%)'});
            invaild.innerHTML += "*Postcode is Not Valid";
            vaild = false;
            invaild.style.display ='block';
        }   
        return vaild;
      
}


function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  function valid_postcode(postcode) {
    postcode = postcode.replace(/\s/g, "");
    var regex = /^[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}$/i;
    return regex.test(postcode);
}