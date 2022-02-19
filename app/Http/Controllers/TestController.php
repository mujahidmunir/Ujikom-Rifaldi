<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index(){
            if (\request()->ajax()){
                $detail = $this->detailCart()->with('menu')->get();
                $total = $this->detailCart()->sum('subtotal');
                $count = $this->detailCart()->sum('qty');
                return response()->json([$detail, $total, $count]);
            }
        return view('test');
    }



    static function detailCart(){
        return Cart::whereTableId(Auth::user()->id);
    }
}
