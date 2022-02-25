@include('admin.nav')
<div class="page-content-wrapper">
    <div class="container">
        <!-- Support Wrapper-->
        <div class="support-wrapper py-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="faq-heading text-center">ORDERS</h4>
                </div>
            </div>
            @include('flash-message')
            <!-- Accordian Area Wrapper-->
            @foreach($orders as $order)
            <div class="accordian-area-wrapper mt-3">
                <!-- Accordian Card-->
                <div class="card accordian-card">
                    <div class="card-body">
                        <div class="accordion" id="accordion1">
                            <!-- Single Accordian-->
                            <div class="accordian-header" id="headingOne">
                                <a href="{{url('detail',$order->id)}}"><button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><span><i class="lni lni-cart-full"></i>{{$order->first_name}} {{$order->last_name}} <b style="color: red;padding-left: 40px">{{$order->phone}}</b> <b style="color: green;padding-left: 40px">{{$order->address}}</b></span><b style="font-size: 20px"><b style="font-size: 10px">Ksh</b>{{$order->total}}</b></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
<!-- Footer Nav-->
@include('admin.menu')
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

<!-- Mirrored from designing-world.com/suha-v2.6.0/support.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:04:19 GMT -->
</html>
