var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

$(document).ready(function () {
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
});
