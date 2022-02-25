@include('admin.nav')
<div class="page-content-wrapper">
    <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <br>
        <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
                <table class="table mb-0">
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><img class="rounded" src="{{asset('uploads/product/'.$product->stock->photo)}}" alt=""></td>
                                <td><a href="single-product.html">{{$product->stock->product_name}}<span>{{$product->stock->selling_price}} × {{$product->quantity}}</span></a></td>
                                <td>
                                    <div class="quantity">
                                        <input class="qty-text" type="text" value="{{$product->stock->selling_price * $product->quantity}}">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Flash Sale Panel-->
        <!-- Selection Panel-->
        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
            <div class="container">
                <form action="{{url('adminSell')}}" method="post">
                    @csrf
                    <div class="radio">
                        <label><input type="radio" value="1" name="payment_method" checked>Mpesa</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="2" name="payment_method">Cash</label>
                    </div>
                    <input type="hidden" value="{{$detail}}" name="orderId">
                    <button class="btn btn-danger" type="submit">Sell</button>
                </form>
            </div>
        </div>
        <!-- Product Specification-->
        <!-- Product Video -->
        <div class="pb-3"></div>
        <!-- Related Products Slides-->
        <!-- Rating & Review Wrapper -->
        <!-- Ratings Submit Form-->
    </div>
</div>
<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
<!-- Footer Nav-->
@include('admin.menu')
<!-- All JavaScript Files-->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/jquery.passwordstrength.js')}}"></script>
<script src="{{asset('js/dark-mode-switch.js')}}"></script>
<script src="{{asset('js/no-internet.js')}}"></script>
<script src="{{asset('js/active.js')}}"></script>
<script src="{{asset('js/pwa.js')}}"></script>
</body>

<!-- Mirrored from designing-world.com/suha-v2.6.0/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:03:09 GMT -->
</html>
