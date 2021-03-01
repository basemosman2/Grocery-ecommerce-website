const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".log-container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

$(document).ready(function() {
    
  $('#signup_form').on('submit',(e)=>{
	e.preventDefault();
		//$(".overlay").show();
		$.ajax({
			url : "./server/user-info.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				// $(".overlay").hide();
				if (data == "success") {
					alert("Successful Sign up account, Login to continue.");
					window.location.reload();
				}else{
					$(".signup_msg").html(data);
				}

			} 
		  })
  })

  $('#signin_form').on('submit',(e)=>{
	e.preventDefault();
		//$(".overlay").show();
		$.ajax({
			url : "./server/user-info.php",
			method : "POST",
			data : $("#signin_form").serialize(),
			success : function(data){
				// $(".overlay").hide();
				if (data == "login_success") {
					window.location.href = "http://localhost/projects2020/e-grocery/index.php";
				}else{
					alert(data);
				}

			} 
		  })
  })

})

