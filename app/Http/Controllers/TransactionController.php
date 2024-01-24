<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\TopUp;
use App\Models\Wallet;

class TransactionController extends Controller
{
    public function index(){
        $product_count = 0;
        $total_prices = 0;
        $carts = Transaction::with('product')->where('user_id', Auth::user()->id)->where('status','not_paid')->orderBy('created_at','desc')->get();

        foreach($carts as $product_cart){
            $product_count += $product_cart->quantity;
        }

        foreach($carts as $product_cart){
            $total_prices += $product_cart->price;
        }

        return view('cart',compact('carts','product_count','total_prices'));
    }

    public function payCart(Request $request){
        $total_prices = 0;
        $carts = Transaction::with('product')->where('user_id', Auth::user()->id)->where('status','not_paid')->orderBy('created_at','desc')->get();

        foreach($carts as $product_cart){
            $total_prices += $product_cart->price;
        }

        $wallets = Wallet::where('user_id',Auth::user()->id)->first();

        if ($total_prices > $wallets->credit) {
            return redirect()->back()->with('message','saldo anda tidak mencukupi');
        } else {
            $current_debit = $wallets->debit;
            $current_credit = $wallets->credit;

            foreach($carts as $cr){
                $cr->update([
                     "status" => "paid"
                ]);
            }

            $wallets->update([
                "debit" => ($current_debit += $total_prices),
                "credit" => ($current_credit -= $total_prices)
            ]);


            return redirect()->route('cart.receipt');
        }


    }

    public function receipt(){
        $total_prices = 0;
        $currentTransactions = Transaction::where('status', 'paid')->where('user_id', Auth::user()->id)->get();

        foreach ($currentTransactions as $transaction) {
            $total_prices += $transaction->price;
        }

        $currentTransactions->total_prices = $total_prices;

        return view('receiptcart', compact('currentTransactions'));

    }

    public function sentToCart(Request $request){


        $product = Product::find($request->product_id);
        $productPrice = $product->price;
        $productSummaryPrice  = ($productPrice * $request->quantity);



        Transaction::create([
           "user_id" => Auth::user()->id,
           "product_id" => $product->id,
           "status" => "not_paid",
           "order_id" => "INV-" . Auth::user()->id . now()->format('dmYHis'),
           "quantity" => $request->quantity,
           "price" =>  $productSummaryPrice
        ]);

        return redirect()->back();

    }

    public function cart_take(Request $request)
    {
        $currentTransactions = Transaction::where('status', 'paid')->where('user_id', Auth::user()->id)->get();

        foreach ($currentTransactions as $transaction) {
            $transaction->update([
                'status' => 'taken'
            ]);
        }

        return redirect()->route('home');
    }

    public function topUpIndex(Request $request){
        if($request->status == "success" && $request->id != ""){
            return view('successtopup');
        }

           return view('topup');
    }

    public function topUp(Request $request){
         $topUp = TopUp::create([
            "user_id" => Auth::user()->id,
            "nominals" => $request->saldo,
            "unique_code" => "TU-" . Auth::user()->id . now()->format('dmYHis'),
            "status" => "unconfirmed",
         ]);
         return redirect()->route('topup.index',"status=success&id=$topUp->id");
    }

    public function cart_delete(Request $request)
    {

            $TransactionToDelete = Transaction::find($request->id);

            $delete = $TransactionToDelete->delete();

            return redirect()->back();

    }
}
