<?php

namespace App\Http\Controllers\chef;

use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Employee;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($id = null){

        if (\request()->ajax()){
            $data = Employee::whereStatus($id)->get();
            return response()->json($data);
        }
        $data = [
            'makanan'       => $this->query(1),
            'minuman'       => $this->query(2),
            'chef'  => Employee::all()
        ];
//        return $data;
        return view('chef.index', $data);
    }

    static function query($cat){
            return DetailOrder::where('detail_orders.status',0)
                ->join('menus', 'menu_id' , 'menus.id')
                ->join('users', 'detail_orders.table_id' , 'users.id')
                ->select(
                    'menus.name',
                    'users.name as table_name',
                    'detail_orders.id',
                    'detail_orders.status',
                    'users.id as table_id',
                    'menus.id as menu_id'
                )
                ->where('menus.category_id', $cat)

                ->groupBy('table_name', 'menu_id', 'order_id')
                ->selectRaw("SUM(qty) as total_qty")
                ->get();
    }

    public function waiters($id = null){
        $data ['orders'] = DetailOrder::whereNotIn('detail_orders.status', [0,3])
            ->join('menus', 'menu_id' , 'menus.id')
            ->join('users', 'detail_orders.table_id' , 'users.id')
            ->select(
                'menus.name',
                'users.name as table_name',
                'detail_orders.id',
                'detail_orders.status',
                'users.id as table_id',
                'menus.id as menu_id'
            )

            ->groupBy('table_name', 'menu_id', 'order_id')
            ->selectRaw("SUM(qty) as total_qty")
            ->orderBy('detail_orders.updated_at', 'ASC')
            ->get();
        return view('chef.waiters', $data);
    }

    public function approve(Request $request){
        $menu_id = $request->input('menu_id');
        $table_id = $request->input('table_id');
        $chef_id = $request->input('chef_id');
        DetailOrder::whereChefId($chef_id)->whereIn('status', [1])
            ->update([
                'status' => 2
            ]);
        DetailOrder::whereMenuId($menu_id)->whereTableId($table_id)->whereStatus(0)->update([
           'status' => 1,
           'chef_id' => $chef_id
        ]);

        return back()->withToastSuccess('berhasil');
    }

    public function orderDelivery(Request $request){
        $menu_id = $request->input('menu_id');
        $table_id = $request->input('table_id');
        $waiter_id = $request->input('waiter_id');

        $order_id = DetailOrder::whereTableId($table_id)->whereIn('status', [1,2]);
        $getId = $order_id->first();
        $id = $getId->order_id;

        $query = DetailOrder::whereWaiterId(null)->whereMenuId($menu_id)->whereTableId($table_id)->whereIn('status', [1,2]);
        $query->update([
            'status' => 3,
            'waiter_id' => $waiter_id
        ]);

        $count_order = DetailOrder::whereTableId($table_id)->whereWaiterId(null)->count();
        if ($count_order == 0){
            Order::whereId($id)->update([
                'status' => '1'
            ]);
        }
        return back()->withToastSuccess('berhasil');
    }

}
