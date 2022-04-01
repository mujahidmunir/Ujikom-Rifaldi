<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        if (\request()->ajax()){
            $report = Order::with('user')->select([
                DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as day"),
                DB::raw('SUM(sub_total) as subTotal'),
                'orders.user_id', 'orders.id'
            ])

                ->groupBy('day')
                ->orderBy('day', 'DESC')
                ->get();
            return response()->json($report);
        }
        return view('manager.report.index');
    }

    public function filter(Request $request){
        if (\request()->ajax()){
            $startDate = $request->input('start_date');
            $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->addDays(1);
            $report = Order::with('user')->whereBetween('created_at' , [$startDate, $endDate])
                ->select([
                    DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as day"),
                    DB::raw('SUM(sub_total) as subTotal'),
                    'orders.user_id', 'orders.id'
                ])
                ->groupBy('day')
                ->orderBy('day', 'DESC')
                ->get();

            $totalIncome = Order::whereBetween('created_at' , [$startDate, $endDate])->sum('sub_total');
            return response()->json([$report, $totalIncome]);
        }
    }
}
