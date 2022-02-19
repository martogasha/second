<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
        dd($request->all());
        $oldCart = Session::get('cat');
        $cart = new Cat($oldCart);
        $checkouts = $cart->item;
        foreach ($checkouts as $checkout) {
            $phone = $request->phone;
            $order = new Order();
            $order->user_id = \Illuminate\Support\Facades\Auth::id();
            $order->product_id = $checkout['item']['id'];
            $order->order_quantity = $checkout['quantity'];
            $order->order_status = 'Mpesa';
            $order->order_status1 = 'Awaiting Confirmation';
            $order->save();

        }
        $request->session()->forget('cat');
        return redirect()->back()->with('success','INPUT PIN');
    }
}
