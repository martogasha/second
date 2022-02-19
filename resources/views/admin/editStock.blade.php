@include('admin.nav')
<div class="page-content-wrapper">
    <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Meta Data-->
            @include('flash-message')
            <div class="card user-data-card">
                <div class="card-body">
                    <h6>Edit Stock</h6>
                    <form action="{{route('eStock')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$edit->id}}" name="id">
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-user"></i><span>Client Name</span></div>
                            <input class="form-control" type="text" name="client_name" value="{{$edit->client_name}}">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-user"></i><span>Id No</span></div>
                            <input class="form-control" type="text" name="idno" value="{{$edit->idno}}">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-phone"></i><span>Phone No</span></div>
                            <input class="form-control" type="text" name="phone" value="{{$edit->phone}}">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-envelope"></i><span>Product Name</span></div>
                            <input class="form-control" type="text" name="product_name" value="{{$edit->product_name}}">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-map-marker"></i><span>Buying Price</span></div>
                            <input class="form-control" type="text" name="buying_price" value="{{$edit->buying_price}}">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-map-marker"></i><span>Selling Price</span></div>
                            <input class="form-control" type="text" name="selling_price" value="{{$edit->selling_price}}">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-map-marker"></i><span>Photo</span></div>
                            <input class="form-control" name="photo" value="{{$edit->photo}}" type="file">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-map-marker"></i><span>Photo 2</span></div>
                            <input class="form-control" name="photo_one" value="{{$edit->photo_one}}" type="file">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-map-marker"></i><span>Photo 3</span></div>
                            <input class="form-control" name="photo_two" value="{{$edit->photo_two}}" type="file">
                        </div>
                        <button class="btn btn-success w-100" type="submit">Save</button>
                    </form>
                    <br>
                    <form action="{{url('deleteStock')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$edit->id}}" name="id">
                        <button class="btn btn-danger w-100" type="submit">Delete</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
<!-- Footer Nav-->
<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                <li class="active"><a href="home.html"><i class="lni lni-home"></i>Home</a></li>
                <li><a href="message.html"><i class="lni lni-life-ring"></i>Support</a></li>
                <li><a href="cart.html"><i class="lni lni-shopping-basket"></i>Cart</a></li>
                <li><a href="pages.html"><i class="lni lni-heart"></i>Pages</a></li>
                <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
            </ul>
        </div>
    </div>
</div>
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

<!-- Mirrored from designing-world.com/suha-v2.6.0/edit-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:03:42 GMT -->
</html>
