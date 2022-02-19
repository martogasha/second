@include('client.nav')
<!-- PWA Install Alert -->

<div class="page-content-wrapper">
    <div class="container">
        <div class="pt-3">
            <!-- Hero Slides-->
            <div class="hero-slides owl-carousel">
                <!-- Single Hero Slide-->
                <div class="single-hero-slide" style="background-image: url('img/bg-img/1.jpg')">
                    <div class="slide-content h-100 d-flex align-items-center">
                        <div class="slide-text">
                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Amazon Echo</h4>
                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Hero Slide-->
                <div class="single-hero-slide" style="background-image: url('img/bg-img/2.jpg')">
                    <div class="slide-content h-100 d-flex align-items-center">
                        <div class="slide-text">
                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Light Candle</h4>
                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">Now only $22</p><a class="btn btn-success btn-sm" href="#" data-animation="fadeInUp" data-delay="500ms" data-duration="1000ms">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Hero Slide-->
                <div class="single-hero-slide" style="background-image: url('img/bg-img/3.jpg')">
                    <div class="slide-content h-100 d-flex align-items-center">
                        <div class="slide-text">
                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Best Furniture</h4>
                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3 years warranty</p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Catagories -->
    <div class="product-catagories-wrapper py-3">
    </div>
    <!-- Flash Sale Slide -->
    <!-- Top Products -->
    <div class="top-products-area py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6>Top Products</h6><a class="btn" href="{{url('shop')}}">View All</a>
            </div>
            <div class="row g-3">
                <!-- Single Top Product Card -->
                @foreach($stocks as $stock)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card">
                        <div class="card-body">
                            <!-- Thumbnail --><a class="product-thumbnail d-block" href="{{url('productDetail',$stock->id)}}"><img class="mb-2" src="{{asset('uploads/product/'.$stock->photo)}}" alt="">
                                <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                              </a>
                            <!-- Product Title --><a class="product-title d-block" href="{{url('productDetail',$stock->id)}}">{{$stock->product_name}}</a>
                            <!-- Product Price -->
                            <p class="sale-price">Ksh {{$stock->selling_price}}</p>
                            <!-- Rating -->
                            <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                            <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
                <!-- Single Top Product Card -->
            </div>
        </div>
    </div>
    <!-- Cool Facts Area-->
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

<!-- Mirrored from designing-world.com/suha-v2.6.0/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:02:59 GMT -->
</html>
