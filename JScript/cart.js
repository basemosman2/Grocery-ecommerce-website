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
    let countValue = document.querySelector('#input'+id).value;
        cart.ajax({
        url : "./server/cart.php",
        data : {
          req : "add",
          product_id : id,
          qty:countValue
        },
        load : function (res) {
          cart.count();
          cart.itemsprice();
          cart.cartlist();
          var x = document.getElementById("eAdd"+id);
          x.innerHTML=res;
          x.style.display = "block";
          setTimeout(function () {
          x.style.display = "none";
        }, 500);
        }
      });
    },

    count : function () {
        // count() : update items count
      
          cart.ajax({
            url : "./server/cart.php",
            data : { req : "count", },
            load : function (res) {
              var mCount = document.querySelector("#m-cart-count");
              var dCount = document.querySelector("#page-cart-count");

              mCount.innerHTML = res;
              dCount.innerHTML = res;
            }
          
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
              success:function (res) {
                if (res =='G-userisSet') {
                  $('.user_info').fadeOut();
                  $('.cart_details').css('margin','10px 0');
                  $('.payment-display').fadeIn('slow');
                }
              }
            });
          },

          change : function (x,id) {
              var qty = document.getElementById("choutQty_"+id).value;
              let count = parseInt(qty);
              if (count >= 1) {
                count = count +x;
                if (count !=0) {
                  qty=count;
                }
              }
              console.log(count);

              cart.ajax({
                url : "./server/cart.php",
                data : {
                  req : "change",
                  product_id : id,
                  qty : count
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

            change1:function (id) {
              alert(id);
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

function qtyCount(x,id){
  let countValue = document.querySelector('#input'+id);
  let count = parseInt(countValue.value );
  if (count >= 1) {
    count = count +x;
    if (count !=0) {
      countValue.value=count;
    }
  }
}


window.addEventListener("load",function(){
  cart.count();
  cart.cartlist();
  cart.itemsprice();
});


