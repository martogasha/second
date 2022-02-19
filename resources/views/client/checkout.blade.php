@include('client.nav')
<div class="page-content-wrapper">
    <div class="container">
        <!-- Checkout Wrapper-->
        <form action="{{url('placeOrder')}}" method="post" id="placeOrderForm">
            @csrf
        <div class="checkout-wrapper-area py-3">
            <!-- Billing Address-->
            <div class="billing-information-card mb-3">
                <div class="card billing-information-title-card bg-danger">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Billing Information</h6>
                    </div>
                </div>

                    <div class="card user-data-card">
                        <div class="card-body">
                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>First Name</span></div>
                                <input type="text" name="first_name">
                            </div>
                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Last Name</span></div>
                                <input type="text" name="last_name">
                            </div>
                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                                <input type="email" name="email">
                            </div>
                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone</span></div>
                                <input type="text" name="phone">
                            </div>
                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>Shipping Address</span></div>
                                <input type="text" name="address">
                            </div>
                            <!-- Edit Address--><a class="btn btn-danger w-100" href="edit-profile.html">Edit Billing Information</a>
                            <br>
                            <br>
                            <div class="checkbox">
                                <label> <input type="checkbox" name="check"><b>Create Account with above details</b></label>
                            </div>
                        </div>
                    </div>
            </div>
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
            <input type="hidden" name="total" value="{{$totalPrice}}">
            <!-- Shipping Method Choose-->
            <!-- Cart Amount Area-->
            <div class="card cart-amount-area">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h5 class="total-price mb-0">Ksh<span class="counter">{{$totalPrice}}</span></h5><a class="btn btn-warning" href="javascript:document.getElementById('placeOrderForm').submit();">ORDER</a>
                </div>
            </div>
        </div>
        </form>
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

<!-- Mirrored from designing-world.com/suha-v2.6.0/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:04:04 GMT -->
</html>
