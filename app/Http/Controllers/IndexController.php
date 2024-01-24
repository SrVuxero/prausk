<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Transaction;

class IndexController extends Controller
{
    public function index(){
       $transactions = null;
       $products  = Product::all();

       if(Auth::check()){
           $transactions = Transaction::with('product')->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(3);
       }

       return view('index',compact('products','transactions'));
    }

    public function auth(Request $request){
         if($request->ajax()){

            $data = [
               "name" => $request->username,
               "password" => $request->password
            ];

            $attempt = Auth::attempt($data);

            if(!$attempt) return response()->json([
                "message" => "auth-err",
            ]);

            return response()->json([
                "message" => "auth-succ"
            ]);


         }

    }

    public function addToCart(){

    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        return redirect()->back();
    }

}
