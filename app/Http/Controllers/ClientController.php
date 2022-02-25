<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Models\Stock;
use Illuminate\Http\Request;
use Session;
class ClientController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('client.index',[
            'stocks'=>$stocks
        ]);
    }
    public function productDetail($id){
        $detail = Stock::find($id);
        return view('client.productDetail',[
            'detail'=>$detail
        ]);
    }
    public function storeCart(Request $request){
        $product = Stock::find($request->productId);
        $oldCart = Session::has('cat') ? Session::get('cat') : null;
        $cart = new Cat($oldCart);
        $cart->add($product , $product->id);
        $request->session()->put('cat',$cart);
    }
    public function shop()
    {
        $stocks = Stock::all();
        return view('client.shop',[
            'stocks'=>$stocks
        ]);
    }
    public function cart()
    {
        if (!Session::has('cat')){
            return view('client.cart');
        }
        $oldCart = Session::get('cat');
        $cart = new Cat($oldCart);
        return view('client.cart',[
            'products'=>$cart->item,
            'totalPrice'=>$cart->totalPrice
        ]);
    }
    public function removeItem($id){
        $oldCart = Session::has('cat') ? Session::get('cat'):null;
        $cart = new Cat($oldCart);
        $cart->removeItem($id);
        if (count($cart->item)>0) {
            Session::put('cat', $cart);
        }
        else{
            Session::forget('cat');
        }
        return redirect(url('cart'))->with('success','ITEM SUCCESSFULLY REMOVED FROM CART');
    }
    public function checkout()
    {
        $oldCart = Session::get('cat');
        $cart = new Cat($oldCart);
        return view('client.checkout',[
            'products'=>$cart->item,
            'totalPrice'=>$cart->totalPrice,
        ]);
    }
    public function search(Request $request){
        $search = $request->input('search');
        $stocks = Stock::where('product_name','like',"%$search%")->get();
        $oldCart = Session::get('cat');
        $cart = new Cat($oldCart);

        return view('client.search',[
            'stocks'=>$stocks,
            'products'=>$cart->item,
            'totalPrice'=>$cart->totalPrice


        ]);
    }
}
