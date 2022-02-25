<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Models\Order;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Session;
class OrderController extends Controller
{
    public function placeOrder(Request $request){
        if ($request->check!='on'){
            if (is_null($request->first_name)||is_null($request->last_name)||is_null($request->email)||is_null($request->phone)||is_null($request->address)){
                return  redirect()->back()->with('error','PLEASE FILL ALL THE INPUTS BELOW');
            }
            else{
                $oldCart = Session::get('cat');
                $cart = new Cat($oldCart);
                $checkouts = $cart->item;
                    $phone = $request->phone;
                    $order = new Order();
                    $order->first_name = $request->first_name;
                    $order->last_name = $request->last_name;
                    $order->email = $request->email;
                    $order->phone = $request->phone;
                    $order->address = $request->address;
                    $order->total = $request->total;
                    $order->save();
                foreach ($checkouts as $checkout) {
                    $sale = Sales::create([
                        'stock_id'=>$checkout['item']['id'],
                        'quantity'=>$checkout['quantity'],
                        'order_id'=>$order->id,
                    ]);
                }
                $request->session()->forget('cat');
                return redirect(url('success'));
            }
        }
        else{
            if (is_null($request->first_name)||is_null($request->last_name)||is_null($request->email)||is_null($request->phone)||is_null($request->address)){
                return  redirect()->back()->with('error','PLEASE FILL ALL THE INPUTS BELOW');
            }
            else{
                $oldCart = Session::get('cat');
                $cart = new Cat($oldCart);
                $checkouts = $cart->item;
                $phone = $request->phone;
                $order = new Order();
                $order->first_name = $request->first_name;
                $order->last_name = $request->last_name;
                $order->email = $request->email;
                $order->phone = $request->phone;
                $order->address = $request->address;
                $order->total = $request->total;
                $order->save();
                foreach ($checkouts as $checkout) {
                    $sale = Sales::create([
                        'stock_id'=>$checkout['item']['id'],
                        'quantity'=>$checkout['quantity'],
                        'order_id'=>$order->id,
                    ]);
                }
                $createUser = User::create([
                   'first_name'=>$request->first_name,
                   'last_name'=>$request->last_name,
                   'phone'=>$request->phone,
                   'address'=>$request->address,
                   'email'=>$request->email,
                   'role'=>$request->role,
                   'password'=>Hash::make('password'),
                ]);
                $request->session()->forget('cat');
                return redirect(url('success'));
            }
        }

    }
    public function success(){
        return view('client.success');
    }

}
