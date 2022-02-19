<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categoty;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JsonController extends Controller
{
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



    public function add_cart(Request $request){

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



    static function detailCart(){
        return Cart::whereTableId(Auth::user()->id);
    }

    public function delete_cart($id){
        if (\request()->ajax()){
            Cart::whereId($id)->delete();
            return response()->json('success');
        }

    }
}
