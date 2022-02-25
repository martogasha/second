<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Mpesa;
use App\Models\Order;
use App\Models\Sales;
use App\Models\Sold;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function stock(){
        $stocks = Stock::all();
        return view('admin.stock',[
            'stocks'=>$stocks
        ]);
    }
    public function editStock($id){
        $edit = Stock::find($id);
        return view('admin.editStock',[
            'edit'=>$edit
        ]);
    }
    public function addStock(){
        $getLatestBarcode = Stock::latest('id')->first();
        if (isset($getLatestBarcode)){
            $getBarcode = $getLatestBarcode->barcode;
            $newBarcode = $getBarcode+1;
        }
        else{
            $newBarcode=1;
        }
        return view('admin.addStock',[
            'newBarcode'=>$newBarcode
        ]);
    }
    public function eStock(Request $request){
        $edit = Stock::find($request->id);
        $edit->client_name = $request->client_name;
        $edit->idno = $request->idno;
        $edit->phone = $request->phone;
        $edit->product_name = $request->product_name;
        $edit->buying_price = $request->buying_price;
        $edit->selling_price = $request->selling_price;
        if ($request->photo) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $edit->photo = $filename;
        }
        if ($request->photo_one) {
            $file = $request->file('photo_one');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $edit->photo_one = $filename;
        }
        if ($request->photo_two) {
            $file = $request->file('photo_two');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $edit->photo_two = $filename;
        }
        $edit->save();
        return redirect()->back()->with('success','EDITED SUCCESS');
    }
    public function storeStock(Request $request){
        $storeStock = new Stock();
        $storeStock->barcode = $request->barcode;
        $storeStock->client_name = $request->client_name;
        $storeStock->idno = $request->idno;
        $storeStock->phone = $request->phone;
        $storeStock->product_name = $request->product_name;
        $storeStock->buying_price = $request->buying_price;
        $storeStock->selling_price = $request->selling_price;
        if ($request->photo) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $storeStock->photo = $filename;
        }
        if ($request->photo_one) {
            $file = $request->file('photo_one');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $storeStock->photo_one = $filename;
        }
        if ($request->photo_two) {
            $file = $request->file('photo_two');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $storeStock->photo_two = $filename;
        }
        $storeStock->save();
        return redirect()->back()->with('success','PRODUCT ADDED SUCCESS');

    }
    public function deleteStock(Request $request){
        $del = Stock::find($request->id);
        $del->delete();
        return redirect(url('stock'))->with('success','PRODUCT DELETED SUCCESS');
    }
    public function order(){
        $orders = Order::where('payment_method',null)->orderByDesc('id')->get();
        return view('admin.order',[
            'orders'=>$orders
        ]);
    }
    public function sold(){
        $orders = Order::where('payment_method','!=',null)->orderByDesc('id')->get();
        return view('admin.sold',[
            'orders'=>$orders
        ]);
    }
    public function detail($id){
        $products = Sales::where('order_id',$id)->get();
        return view('admin.productDetail',[
            'products'=>$products,
            'detail'=>$id
        ]);
    }
    public function det($id){
        $products = Sales::where('order_id',$id)->get();
        $paymentMethod = Order::find($id);
        return view('admin.detail',[
            'products'=>$products,
            'detail'=>$id,
            'paymentMethod'=>$paymentMethod
        ]);
    }
    public function adminSell(Request $request){
        if ($request->payment_method==2){
            $getSales = Sales::where('order_id',$request->orderId)->get();
            $updatePaymentMethod = Order::where('id',$request->orderId)->update(['payment_method'=>$request->payment_method]);
            $order = Order::find($request->orderId);
            foreach ($getSales as $getSale){
                $sold = Sold::create([
                    'sales_id'=>$getSale->id,
                ]);
            }
            $cash = Cash::create([
               'first_name' =>$order->first_name,
               'last_name' =>$order->last_name,
               'phone' =>$order->phone,
               'amount' =>$order->total,
               'order_id' =>$request->orderId,
               'date' =>Carbon::now()->format('d-m-Y'),
            ]);
            return redirect(url('order'))->with('success','SOLD SUCCESS');
        }
        else{
            $getSales = Sales::where('order_id',$request->orderId)->get();
            $updatePaymentMethod = Order::where('id',$request->orderId)->update(['payment_method'=>$request->payment_method]);
            $order = Order::find($request->orderId);
            foreach ($getSales as $getSale){
                $sold = Sold::create([
                    'sales_id'=>$getSale->id,
                ]);
            }
            $cash = Mpesa::create([
                'first_name' =>$order->first_name,
                'last_name' =>$order->last_name,
                'phone' =>$order->phone,
                'amount' =>$order->total,
                'order_id' =>$request->orderId,
                'date' =>Carbon::now()->format('d-m-Y'),

            ]);
            return redirect(url('order'))->with('success','SOLD SUCCESS');
        }


    }
    public function cash(){
        $cashs = Cash::orderByDesc('id')->get();
        return view('admin.cash',[
            'cashs'=>$cashs
        ]);
    }
    public function mpesa(){
        $mpesas = Mpesa::orderByDesc('id')->get();
        return view('admin.mpesa',[
            'mpesas'=>$mpesas
        ]);
    }
    public function m($id){
        $mDetail = Mpesa::find($id);
        $products = Sales::where('order_id',$mDetail->order_id)->get();
        return view('admin.mDetail',[
            'products'=>$products,
            'detail'=>$mDetail->order_id
        ]);
    }
    public function c($id){
        $mDetail = Cash::find($id);
        $products = Sales::where('order_id',$mDetail->order_id)->get();
        return view('admin.cDetail',[
            'products'=>$products,
            'detail'=>$mDetail->order_id
        ]);
    }
}
