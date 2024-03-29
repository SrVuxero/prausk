<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index(){
        $user = User::all();

        return response()->json([
            "message" => "Success! Get Data",
            "data" => $user,
        ],200);
    }
}
