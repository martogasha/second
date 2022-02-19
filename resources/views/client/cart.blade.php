@include('client.nav')

<div class="page-content-wrapper">
    <div class="container">
        <!-- Cart Wrapper-->
        @include('flash-message')
        <div class="cart-wrapper-area py-3">
            <div class="cart-table card mb-3">
                <div class="table-responsive card-body">
                    <table class="table mb-0">
                        <tbody>
                        @if(isset($products))
                            @foreach($products as $product)
                        <tr>
                            <th scope="row"><a class="remove-product" href="{{url('cartRemove',$product['item']['id'])}}"><i class="lni lni-close"></i></a></th>
                            <td><img class="rounded" src="{{asset('uploads/product/'.$product['item']['photo'])}}" alt=""></td>
                            <td><a href="single-product.html">{{$product['item']['product_name']}}<span>{{$product['item']['selling_price']}} × {{$product['quantity']}}</span></a></td>
                            <td>
                                <div class="quantity">
                                    <input class="qty-text" type="text" value="{{$product['item']['selling_price'] * $product['quantity']}}">
                                </div>
                            </td>
                        </tr>
                            @endforeach
                        @else
                            <td>Cart Empty</td>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Coupon Area-->
            <div class="card coupon-card mb-3">
                <div class="card-body">
                    <div class="apply-coupon">
                        <h6 class="mb-0">Have a coupon?</h6>
                        <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p>
                        <div class="coupon-form">
                            <form action="#">
                                <input class="form-control" type="text" placeholder="SUHA30">
                                <button class="btn btn-primary" type="submit">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart Amount Area-->
            <div class="card cart-amount-area">
                <div class="card-body d-flex align-items-center justify-content-between">
                    @if(isset($totalPrice))
                    <h5 class="total-price mb-0">Ksh<span class="counter">{{$totalPrice}}</span></h5><a class="btn btn-warning" href="{{url('checkout')}}">Checkout Now</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
<!-- Footer Nav-->
@include('client.menu')
<!-- All JavaScript Files-->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.passwordstrength.js"></script>
<script src="js/dark-mode-switch.js"></script>
<script src="js/no-internet.js"></script>
<script src="js/active.js"></script>
<script src="js/pwa.js"></script>
</body>

<!-- Mirrored from designing-world.com/suha-v2.6.0/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:03:40 GMT -->
</html>
