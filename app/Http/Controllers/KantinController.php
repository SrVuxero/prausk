<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KantinController extends Controller
{
    public function index(){
        $userData = User::all();
        $products = Product::all();
        $transactionData = Transaction::count();

        return view('kantin.index',compact('userData', 'products', 'transactionData'));

    }

    public function login(){
        return view('kantin.login');
    }

    public function loginproceed(Request $request){
        $credentials = [
            "name" => $request->username,
            "password" => $request->password
        ];

        $checkRoles =  User::where('name',$credentials['name'])->first();

        if($checkRoles->role_id != 3 && !$checkRoles) return redirect()->back();

        if(Auth::attempt($credentials)) return redirect()->route('kantin.index');

        return redirect()->back();
    }

    public function addproductindex(){
        $products = Product::all();
        $productcategories = Category::all();
        return view('kantin.product',compact('products','productcategories'));
    }

    public function addproductpost(Request $request){
        $goods = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'photo' => 'photo',
            'desc' => $request->description,
            'category_id' => $request->category_id,
            'stand' => 2,
          ]);

          alert()->success('Success','Success Menambahkan Data');

          return redirect()->route('kantin.addproduct');
    }


    public function productdelete(Request $request){
        if ($request->ajax()) {
            $deletedProduct = Product::find($request->id_to_delete);

            $deletedProduct->delete();

            alert()->success("Success", "Success Delete Product");

            return response()->json([
              "message" => "Success Delete Data!",
              "data" => $deletedProduct
            ]);

          }
    }

    public function productupdate(Request $request){
        if ($request->ajax()) {
            $goodsToUpdate = Product::find($request->product_id);

            $goodsToUpdate->update([
              "name" => $request->product_name,
              "price" => $request->product_price,
              "stock" => $request->product_stock,
              "photo" => "photo",
              "desc" => $request->product_description,
              "category_id" => $request->product_categoryid,
              "stand" => 2
            ]);

            alert()->success("Success", "Success Update Product");

            return response()->json([
              "message" => "Success Update Data!",
              "data" => $goodsToUpdate
            ]);

          }
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        return redirect()->route('kantin.login.index');
    }

}
