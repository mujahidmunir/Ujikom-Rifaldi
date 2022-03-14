<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(){
        $history = Order::with('detail_order', 'detail_order.table')->whereDate('created_at', Carbon::now())->get();

        return view('kasir.history', compact('history'));
    }

    public function filter(Request $request){
        if (\request()->ajax()){

        }
    }

}
