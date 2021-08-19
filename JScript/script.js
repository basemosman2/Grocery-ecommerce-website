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
    $(".sCateMneu").each(function () {
      if ($(this).attr("id") != x) {
        $(this).hide("slow");
      }
    });

    $("#" + x).slideToggle("slow");

    $('.categories-menu ul li i').each((i,el)=>{
      let c = $(el).data('cat');
      if(x.toLowerCase() != c){
        $(el).removeClass('flip');
      }
    });

    $(`#${x}_angle i`).toggleClass('flip');

  });

   
  $(".m-sicon").click(function(){
    $(".searchbox").toggleClass("sbActive");
  });

  $(".cart-icon-box").click(function(){
    var url = "./checkout.php";    
    $(location).attr('href',url);
  });

  $(".menu-bar-box").click(function(){
    $(".side-menu").toggleClass("sMActive");
  });




});

