var cart = {
    ajax:function (opt){
    var data = null;
    if (opt.data) {
      data = new FormData();
      for (var d in opt.data) {
        data.append(d, opt.data[d]);
      }
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', opt.url, true);
    xhr.onload = function(){
      if (xhr.status!=200) {
        alert("Something Went Wrong Try Again Later");
      } else {
        if (opt.target) {
          document.getElementById(opt.target).innerHTML = this.response;
        }
        if (typeof opt.load == "function") {
          opt.load(this.response);
        }
      }
    };
    xhr.send(data);
  },

  add : function (id) { 
        cart.ajax({
        url : "./server/cart.php",
        data : {
          req : "add",
          product_id : id
        },
        load : function (res) {
          cart.count();
          cart.itemsprice();
          cart.cartlist();
          // @TODO
          var x = document.getElementById("eAdd"+id);
          x.innerHTML=res;
          x.style.display = "block";
          setTimeout(function () {
          x.style.display = "none";
        }, 500);
          return false;
        }
      });
    },

    count : function () {
        // count() : update items count
      
          cart.ajax({
            url : "./server/cart.php",
            data : { req : "count", },
            target : "page-cart-count"
          });
        },
      
        itemsprice : function () {
        // count() : update items count
          cart.ajax({
            url : "./server/cart.php",
            data : { req : "price", },
            //target : "itemsprice1"
            load : function (res) {
              var price1 = document.querySelector("#itemsprice1");
              var price2 = document.querySelector("#itemsprice2");

              price1.innerHTML = res;
              price2.innerHTML = res;

              // var choutprice = document.querySelector("#chout-price");
              // var choutservice = document.querySelector("#chout-service");
              // choutprice.innerHTML =res;
              // choutservice.innerHTML =res;
              
            }
          });
        },

        remove : function (id) {
          var qty = document.getElementById("qty_"+id).innerText;
          cart.ajax({
            url : "./server/cart.php",
            data : {
              req : "remove",
              product_id : id,
              qty : qty
            },
            load : function (res) {
              if(res == 0){
                $("#item"+id).fadeOut("slow",function () {
                  cart.count();
                  cart.itemsprice();
                  cart.cartlist();
                }); 
              }else{
                cart.count();
                cart.itemsprice();
                cart.cartlist();
              
              }
            }
          });
          },

        cartlist : function () {
            cart.ajax({
              url : "./server/cart.php",
              data : { req : "cartlist", },
              target:"cart-items-container"
            });
          },

          checkout: function () {
            cart.ajax({
              url : "./server/cart.php",
              data : { req : "chout-cartlist", },
              target:"chout-cart",
              load:function () {
                
              }
            });
          },

          change : function (id) {
            // change() : change quantity
              //var x = document.getElementById("gg");
              var qty = document.getElementById("choutQty_"+id).value;
              cart.ajax({
                url : "./server/cart.php",
                data : {
                  req : "change",
                  product_id : id,
                  qty : qty
                },
                load : function (res) {
                  cart.count();
                  cart.itemsprice();
                  cart.cartlist();
                  cart.checkout();
                  if (qty <=0) {
                    $("#choutItem"+id).fadeOut();
                  }
                }
              });
            },

          choutRemove : function (id) {
            cart.ajax({
              url : "./server/cart.php",
              data : {
                req : "chout-remove",
                product_id : id,
              },
              load : function (res) {
                  $("#choutItem"+id).fadeOut("slow",function () {
                    cart.count();
                    cart.itemsprice();
                    cart.cartlist();
                    cart.checkout();
                  }); 
              }
            });
            }
};

window.addEventListener("load", cart.count);
window.addEventListener("load", cart.itemsprice);
window.addEventListener("load", cart.cartlist);
window.addEventListener("load", cart.checkout);

