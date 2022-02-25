<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                <li class="active"><a href="{{url('admin')}}"><i class="lni lni-home"></i>Home</a></li>
                <li><a href="{{url('mpesa')}}"><i class="lni lni-mobile"></i>Mpesa</a></li>
                <li><a href="{{url('order')}}"><span class="ms-3 badge badge-warning">{{\App\Models\Order::where('payment_method',null)->count()}}</span><i class="lni lni-shopping-basket"></i>Orders</a></li>
                <li><a href="{{url('cash')}}"><i class="lni lni-money-location"></i>Cash</a></li>
                <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
            </ul>
        </div>
    </div>
</div>
