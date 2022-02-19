<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.index', compact('user'));
    }

    public function account(){

    }
}
