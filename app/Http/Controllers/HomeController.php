<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categoty;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id = null)
    {
        $categories = Categoty::all();
        if (\request()->ajax()){
            if ($id == null){
                $menu = Menu::orderBy('category_id')->get();
            } else {
                $menu = Menu::whereCategoryId($id)->orderBy('category_id')->get();
            }

            return response()->json($menu);
        }
        return view ('index', compact('categories'));
    }

    public function listCart(){

        if (\request()->ajax()){
            $detail = $this->detailCart()->with('menu')->get();
            $total = $this->detailCart()->sum('subtotal');
            $count = $this->detailCart()->sum('qty');
            return response()->json('asdf');
        }
    }

    public function addCart(Request $request){

        if (\request()->ajax()){
            $menu = Menu::whereId($request->input('id'))->first();
            $subtotal = $request->input('qty') * $menu->price;
            Cart::create([
                'table_id' => Auth::user()->id,
                'menu_id' => $request->input('id'),
                'qty' => $request->input('qty'),
                'subtotal' => $subtotal
            ]);
            return response()->json('success');
        }
    }

    public function filterMenu($id){
        if (\request()->ajax()){
            $menu = Menu::whereId($id)->first();
            return response()->json($menu);

        }
    }

    public function asdf(){
        return view ('home');
    }

    static function detailCart(){
        return Cart::whereTableId(Auth::user()->id);
    }

    public function deleteCart($id){
        if (\request()->ajax()){
            Cart::whereId($id)->delete();
            return response()->json('success');
        }

    }

    public function zxc(){
        if (\request()->ajax()){
            return response('asdf');
        }
    }


}
