<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                <li class="active"><a href="{{url('/')}}"><i class="lni lni-home"></i>Home</a></li>
                <li><a href="{{url('shop')}}"><i class="lni lni-shopify"></i>Shop</a></li>
                <li><a href="{{url('cart')}}"><span class="ms-3 badge badge-warning">{{\Illuminate\Support\Facades\Session::has('cat') ? \Illuminate\Support\Facades\Session::get('cat')->totalQty: ''}}</span><i class="lni lni-cart"></i>Cart</a></li>
                <li><a href="pages.html"><i class="lni lni-heart"></i>Orders</a></li>
                <li><a href="{{url('login')}}"><i class="lni lni-cog"></i>Settings</a></li>
            </ul>
        </div>
    </div>
</div>
