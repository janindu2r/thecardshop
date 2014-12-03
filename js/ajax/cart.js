$(document).ready(function() {
    $(document).on('click','#update-portable-cart',function () {
        var ar = {};
        ar['type'] = 'refresh';
        $.ajax({
            type: "POST",
            url: "/scripts/cart.php",
            data: ar,
            cache: false,
            success: function(result){
                var cItem = JSON.parse(result);
                if(cItem.success == 1)
                {
                    $("#portable-cart").html(cItem.itemAr);
                    var total = parseFloat(cItem.totalCost);
                    total = total.toFixed(2);
                    $('#portable-total-b').html(total);
                    $('#portable-total-a').html(total);
                }
                else
                    alert('Cart Update Failed. Try Again!');
            },
            error:function() {
                alert('Cart Update Failed. Try Again!');
            }
        });
    });


$(document).on("change", '.output-qty-cart',function(){
        var ar = {};
        ar['type'] = 'update';
        var st = this.id;
        ar['prodId']= st.substr(2);
        ar['isVar']= st.substr(0,1);
        ar['qty'] = this.value;
        $.ajax({
            type: "POST",
            url: "/scripts/cart.php",
            data: ar,
            cache: false,
            success: function(result){
                var cItem = JSON.parse(result);
                if(cItem.success == 1)
                    $("#update-portable-cart").click();
                else
                    alert('Quantity Update Failed. Try Again!');
            },
            error:function() {
                alert('Quantity Update Failed. Try Again!');
            }
        });
    });

    $(document).on("click", '.delete-cart-itm',function(){
        var ar = {};
        ar['type'] = 'delete';
        var st = this.id;
        ar['prodId']= st.substr(2);
        ar['isVar']= st.substr(0,1);
        $.ajax({
            type: "POST",
            url: "/scripts/cart.php",
            data: ar,
            cache: false,
            success: function(result){
                var cItem = JSON.parse(result);
                if(cItem.success == 1)
                    $("#update-portable-cart").click();
                else
                    alert('Item Delete Failed. Try Again!');
            },
            error:function() {
                alert('Item Delete Failed. Try Again!');
            }
        });
    });

});
