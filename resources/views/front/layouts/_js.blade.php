<script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('front/assets/js/nouislider.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/theme.js') }}"></script>

<script>
      function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);


  if (!isNaN(currentVal == 1) && currentVal > 1) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  }

  else {
    parent.find('input[name=' + fieldName + ']').val(1);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});


$(document).on('click','.btnItemUpdate',function () {

if($(this).hasClass('qtyMinus')){
    var quantity = $(this).prev().prev().val();
    if(quantity <= 1){
        Command: toastr["error"]("item quantity must be 1 or greater!")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        return false;
    }
    else{
        new_qty = parseInt(quantity)-1;
    }
}
if($(this).hasClass('qtyPlus')){
    var quantity = $(this).prev().val();
        new_qty = parseInt(quantity)+1;
}
var cartId = $(this).data('cartid');
$.ajax({
    data:{
        "cartid": cartId,
        "qty": new_qty,
        "_token": "{{ csrf_token() }}",
    },
    url:'/update-cart-item-qty-ajax',
    type: 'post',
    success:function (resp) {
        // alert(resp);
        // $('#appendCartItem').html(resp.item);
        if(resp.status == false){

            Command: toastr["error"]("product stock not available")

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
        $('#appendCartItem').html(resp.item);
        loadCart();
        navCart();
    },
    error:function () {
        alert("Error");
    }
})
});

$(document).on('click','.remove-item-cart',function () {

var cartId = $(this).data("cart_id");
// var cartId = $(this).data('cartid');
// var result = confirm("want to delete this cart item");
    $.ajax({
        data:{
            "cartid": cartId,
            "_token": "{{ csrf_token() }}",
        },
        url:'/delete-cart-item-ajax',
        type: 'post',
        success:function (resp) {
            $('#appendCartItem').html(resp.item);
            loadCart();
            navCart();
        },
        error:function () {
            alert("Error");
        }
    })
});

</script>
