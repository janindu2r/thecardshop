/*$(document).on("click", "#update-portable-cart", function(){

}); */

$(document).ready(function() {
    $("#update-portable-cart").on('click',function () {
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


    $(".output-qty-cart").on('input',function () {
        var ar = {};
        ar['type'] = 'update';
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
});
