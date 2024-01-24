<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Admin;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.index')->compact('users');
    }
}
