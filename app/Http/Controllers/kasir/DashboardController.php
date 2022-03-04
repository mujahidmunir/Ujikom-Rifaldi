<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use App\Models\Cart;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($id = null){

        if (\request()->ajax()){
            $cart = Cart::whereTableId($id)->with('menu')->get();
            $total = Cart::whereTableId($id)->sum('subtotal');
            $tableName = Table::whereId($id)->first();
            return response()->json([$cart, $total, $tableName]);
        }

        $cart = Cart::with('meja')->groupBy('table_id')->orderBy('table_id', 'asc')
            ->get();
//        return $cart;
        return view('kasir.index', compact('cart'));


    }

    public function checkout(Request $request){
        $cart = Cart::whereTableId($request->input('table_id'));
        $subtotal = $cart->sum('subtotal');
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'sub_total' => $subtotal
        ]);

        foreach ($cart->get() as $data){
            DetailOrder::create([
                'order_id' => $order->id,
                'menu_id' => $data->menu_id,
                'qty' => $data->qty,
                'table_id' => $data->table_id
            ]);
            Cart::whereId($data->id)->delete();
        }
        return back()->withSuccess('Pesanan Berhasil Dibayar');
    }
}
