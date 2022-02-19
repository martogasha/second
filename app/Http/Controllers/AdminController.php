<?php

namespace App\Http\Controllers;

use App\Models\Stock;
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
        return view('admin.addStock');
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
}
