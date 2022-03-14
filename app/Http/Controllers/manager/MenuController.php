<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Categoty;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Order::with('user')->get();
        $menu = Menu::join('categoties', 'categoties.id', '=', 'menus.category_id')
                ->select('categoties.*', 'menus.*', 'categoties.name as cat_name')
            ->get();
//        return $user;
        if (\request()->ajax()){
            $menu = Menu::with('categoties')->get();
            return response()->json($menu);
        }
        return view('manager.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {

        $inject = [
            'url' => route('manager.menu.store'),
            'categories' => Categoty::pluck('name', 'id')->toArray()
        ];
        if ($id){
            $menu = Menu::with('cat')->whereId($id)->first();
//            return ($menu);
            $inject = [
                'url' => route('manager.menu.update', $id),
                'menu' => $menu,
                'categories' => Categoty::pluck('name', 'id')->toArray()
            ];
        }
        $menu = Menu::all();
        return view('manager.menu.create', $inject);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return $this->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->create($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function save(Request $request, $id = null){
        $menu = Menu::firstOrNew(['id' => $id]);
        $menu->name        = $request->input('name');
        $menu->category_id = $request->input('category_id');
        $menu->price       = $request->input('price');
        $menu->description = $request->input('description');
        if ($request->file('image')){
            $file = $request->file('image');
            $file_name = md5(now()).'.'.$file->getClientOriginalExtension();
            $file->move('images/products',$file_name);
            $menu->image = $file_name;
        } else {
            return 'tidak ada image';
        }
        $menu->save();
        return redirect()->route('manager.menu.index');

    }
}
