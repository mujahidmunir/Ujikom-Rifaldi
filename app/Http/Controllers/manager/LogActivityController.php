<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogActivityController extends Controller
{
    public function index(){
        if (\request()->ajax()){
            $detail_order = DetailOrder::all();
        }
        return view('manager.log-activity.index');
    }

    public function chef(){
        if (\request()->ajax()){

            $chef = DetailOrder::whereDate('created_at', Carbon::now())
                ->whereNotIn('chef_id' , [0])
                ->with('chef', 'menu')
                ->select([
                    DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as day"),
                    DB::raw('SUM(qty) as Total'),
                    'detail_orders.*'])
                ->groupBy('chef_id')
                ->orderBy('created_at', 'DESC')
                ->get();
            return response()->json($chef);

        }
    }

    public function waiter(){
        if (\request()->ajax()){

            $waiter = DetailOrder::whereDate('created_at', Carbon::now())
                ->whereNotNull('waiter_id')
                ->with('waiter', 'menu')
                ->select([
                    DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as day"),
                    DB::raw('SUM(qty) as Total'),
                    'detail_orders.*'])
                ->groupBy('waiter_id')
                ->orderBy('created_at', 'DESC')
                ->get();
            return response()->json($waiter);

        }
    }

    public function filterChef(Request $request){
        if (\request()->ajax()){
            $start_date = $request->input('start_date');
            $end_date = Carbon::createFromFormat('Y-m-d', $request->input('end_date'));
            if ($request->input('start_date') == $request->input('end_date')){
                $chef = $this->queryDate($end_date, 'chef')->groupBy('day' , 'chef_id')->orderBy('created_at', 'DESC')->get();
            } else {
                $chef = $this->queryBetween($start_date, $end_date, 'chef')->groupBy('day' , 'chef_id')->orderBy('created_at', 'DESC')->get();
            }
            return response()->json($chef);

        }
    }

    public function filterWaiter(Request $request){
        if (\request()->ajax()){
            $start_date = $request->input('start_date');
            $end_date = Carbon::createFromFormat('Y-m-d', $request->input('end_date'));
            if ($request->input('start_date') == $request->input('end_date')){
                $waiter = $this->queryDate($end_date, 'waiter')->groupBy('day' , 'waiter_id')->orderBy('created_at', 'DESC')->get();
            } else {
                $waiter = $this->queryBetween($start_date, $end_date, 'waiter')->groupBy('day' , 'waiter_id')->orderBy('created_at', 'DESC')->get();
            }
            return response()->json($waiter);

        }
    }



    static function queryBetween($start_date, $end_date, $employee){
        return DetailOrder::whereBetween('created_at', [$start_date, $end_date])
            ->whereNotIn('chef_id' , [0])
            ->with($employee, 'menu')
            ->select([
                DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as day"),
                DB::raw('SUM(qty) as Total'),
                'detail_orders.*']);
    }

    static function queryDate($end_date, $employee){
        return DetailOrder::whereDate('created_at',$end_date)
            ->whereNotIn('chef_id' , [0])
            ->with($employee, 'menu')
            ->select([
                DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as day"),
                DB::raw('SUM(qty) as Total'),
                'detail_orders.*']);
    }




}
