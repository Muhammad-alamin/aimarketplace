
<div class="table-outer table-responsive">
    <table class="cart-table">
        <thead class="cart-header">
            <tr>
                <th class="prod-column">Product</th>
                <th class="price">Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php $total_amount = 0; ?>
            @foreach($carts as $cart)
            <tr>
                <td class="prod-column">
                    <div class="column-box">
                        <figure class="prod-thumb"><a href="#"><img src="{{asset($cart->image)}}" alt="" style="width: 100px; height:70px;"></a></figure>
                        <h3 class="prod-title padd-top-20">{{ $cart->pro_name }}</h3>
                    </div>
                </td>
                <td class="price">${{number_format($cart->pro_price,2)}}</td>
                <td class="qty" style="box-sizing: content-box; !important">
                    <div class="cart-input-group" style="margin-top: 10px; margin-bottom: 10px;">
                        <input class=" form-control" type="number" value="{{$cart->pro_quantity}}">
                        <button class="quantity-plus  qtyPlus btnItemUpdate"  data-cartId="{{$cart->id}}">+</button>
                        <button class="quantity-minus  qtyMinus btnItemUpdate" data-cartId="{{$cart->id}}">-</button>
                    </div>
                </td>
                <td class="sub-total">${{number_format($cart->pro_price*$cart->pro_quantity,2)}}</td>
                <td class="remove"><a type="button" class="remove-btn remove-item-cart" data-cart_id="{{$cart->id}}"><span class="egypt-icon-remove"></span> </a></td>
            </tr>
            <?php $total_amount = $total_amount + ($cart->pro_price*$cart->pro_quantity); ?>
            @endforeach
        </tbody>
    </table>
</div>

<div class="cart-total" style="margin-top: 20px;">
    <h3 class="cart-total__text text-uppercase">Total Price: <span class="text-capitalize cart-total__highlight">$<?php echo number_format($total_amount,2); ?></span></h3><!-- /.cart-total__text -->
</div><!-- /.cart-total -->
