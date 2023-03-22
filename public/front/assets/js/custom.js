loadCart();
navCart();

function loadCart() {
    $.ajax({
        method: 'GET',
        url:'/load-cart-data',
        success:function (response) {
            // console.log(response);
            $('.cart-count').html('');
            $('.cart-count').html(response.count);
        }
    })
}
