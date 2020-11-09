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
          // @TODO
          var x = document.getElementById("eAdd"+id);
          x.innerHTML=res;
          x.style.display = "block";
          setTimeout(function () {
          x.style.display = "none";
        }, 3000);
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
            target : "itemsprice1"
            // load : function (res) {
            //   alert("sdsd");
            //   x.innerHTML = res;
            // }
          });
        }

};

window.addEventListener("load", cart.count);
window.addEventListener("load", cart.itemsprice);
