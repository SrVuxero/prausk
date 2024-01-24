<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopUp;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function index(){
        if(!Auth::user() || Auth::user()->role_id != 2) return redirect()->back();

        $topups = TopUp::latest()->paginate(5);
        return view('bank.index',compact('topups'));
    }

    public function topuprequest(Request $request){
        if(!Auth::user() || Auth::user()->role_id != 2) return redirect()->back();

        $topups = TopUp::all();

        return view('bank.confirmtopup', compact('topups'));
    }

    public function topupreqproceed(Request $request){
        $topUp = TopUp::where('unique_code',$request->unique_code)->first();
        $userWallet = Wallet::where('user_id',$request->user_id)->first();
        $sumTopUp = $userWallet->credit += $request->nominals;

        $userWallet->update([
            "credit" => $sumTopUp
        ]);

        $topUp->update([
            "status" => "confirmed"
        ]);

        return redirect()->back();
    }


    public function loginindex(){
        return view('bank.login');
    }

    public function loginproceed(Request $request){
        $credentials = [
            "name" => $request->username,
            "password" => $request->password
        ];

        $checkRoles =  User::where('name',$credentials['name'])->first();

        if($checkRoles->role_id != 2) return redirect()->back();

        if(Auth::attempt($credentials)) return redirect()->route('bank');

        return redirect()->back();
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        return redirect()->route('login.bank');
    }
}
