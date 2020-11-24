$(document).ready(function () {

  $(".menu-bars").click(function () {
    alert("dfdd");
    console.log("dsds");
  });

  $(".cart").hover(function () {
    $(".cart-item").css("display", "block");
  });

  $(".categories-menu").fadeOut();

  $(".menu").click(function () {
    $(".main-menu").fadeIn();
    $(".categories-menu").fadeOut();
  });

  $(".cate").click(function () {
    $(".main-menu").fadeOut();
    $(".categories-menu").fadeIn();
  });

  $(".categories-menu ul li").click(function () {
    var x = $(this).attr("href");

    var z = $(".sCateMneu");

    $(".sCateMneu").each(function () {
      if ($(this).attr("id") != x) {
        $(this).hide("slow");
      }
    });

    $("#" + x).slideToggle("slow", function () {});
  });

    $(".credit input[id='credit']").click(function () {
      $('.card-details').slideToggle();
    });

    $(".cash input[id='cash']").click(function () {
      $('.card-details').slideUp();
    });
});


