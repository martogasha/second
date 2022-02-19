@include('client.nav')
<div class="page-content-wrapper">
    <div class="product-slide-wrapper">
        <!-- Product Slides-->
        <div class="product-slides owl-carousel">
            <!-- Single Hero Slide-->
            <div class="single-product-slide" style="background-image: url('{{asset('uploads/product/'.$detail->photo)}}')"></div>
            <!-- Single Hero Slide-->
            <div class="single-product-slide" style="background-image: url('{{asset('uploads/product/'.$detail->photo_one)}}')"></div>
            <!-- Single Hero Slide-->
            <div class="single-product-slide" style="background-image: url('{{asset('uploads/product/'.$detail->photo_two)}}')"></div>
        </div>

    </div>
    <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
            <div class="container d-flex justify-content-between">
                <div class="p-title-price">
                    <h6 class="mb-1">{{$detail->product_name}}</h6>
                    <p class="sale-price mb-0">Ksh {{$detail->selling_price}}</p>
                </div>
            </div>
            <!-- Ratings-->
            <div class="product-ratings">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="ratings"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><span class="ps-1">3 ratings</span></div>
                    <div class="total-result-of-ratings"><span>5.0</span><span>Very Good                                </span></div>
                </div>
            </div>
        </div>
        <!-- Flash Sale Panel-->
        <!-- Selection Panel-->
        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
            <div class="container">
                <form id="productDetailForm">
                    <input type="hidden" value="{{$detail->id}}" name="productId" id="productDetail">
                    <button class="btn btn-danger ms-3" type="submit">Add To Cart</button>
                </form>
            </div>
        </div>
        <!-- Product Specification-->
        <!-- Product Video -->
        <div class="pb-3"></div>
        <!-- Related Products Slides-->
        <!-- Rating & Review Wrapper -->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
            <div class="container">
                <h6>Ratings &amp; Reviews</h6>
                <div class="rating-review-content">
                    <ul class="ps-0">
                        <!-- Single User Review -->
                        <li class="single-user-review d-flex">
                            <div class="user-thumbnail"><img src="{{asset('img/bg-img/7.jpg')}}" alt=""></div>
                            <div class="rating-comment">
                                <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                                <p class="comment mb-0">Very good product. It's just amazing!</p><span class="name-date">Designing World 12 Dec 2021</span><a class="review-image mt-2 border rounded" href="img/product/3.png"><img class="rounded-3" src="img/product/3.png" alt=""></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Ratings Submit Form-->
        <div class="ratings-submit-form bg-white py-3">
            <div class="container">
                <h6>Submit A Review</h6>
                <form action="#" method="">
                    <div class="stars mb-3">
                        <input class="star-1" type="radio" name="star" id="star1">
                        <label class="star-1" for="star1"></label>
                        <input class="star-2" type="radio" name="star" id="star2">
                        <label class="star-2" for="star2"></label>
                        <input class="star-3" type="radio" name="star" id="star3">
                        <label class="star-3" for="star3"></label>
                        <input class="star-4" type="radio" name="star" id="star4">
                        <label class="star-4" for="star4"></label>
                        <input class="star-5" type="radio" name="star" id="star5">
                        <label class="star-5" for="star5"></label><span></span>
                    </div>
                    <textarea class="form-control mb-3" id="comments" name="comment" cols="30" rows="10" data-max-length="200" placeholder="Write your review..."></textarea>
                    <button class="btn btn-sm btn-primary" type="submit">Save Review</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
<!-- Footer Nav-->
@include('client.menu')
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
<script>
    $('#productDetailForm').on('submit',function (event) {
        event.preventDefault();
        productId = $('#productDetail').val();
        $.ajax({
            type:"post",
            url:"{{route('storeCart')}}",
            data:{
                "_token": "{{ csrf_token() }}",
                productId:productId},
            success:function (data) {
                alert('ok');
            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
</script>
</script>
<!-- Mirrored from designing-world.com/suha-v2.6.0/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:03:09 GMT -->
</html>
