<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\User;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()){
            $tables = User::doesntHave('roles')->get();
            return response()->json($tables);
        }

        return view('admin.tables.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        if (\request()->ajax()){
            $table = User::create([
                'name' => $request->input('name'),
                'email' => Str::replace(' ', '_', $name),
                'password' => Hash::make(env('TABLE_PASSWORD'))
            ]);
            return response()->json('Success');
        }

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
        if (\request()->ajax()){
            $tables = User::whereId($id)->first();
            return response()->json($tables);
        }
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
        if (\request()->ajax()){
            $table = User::whereId($id)->update([
                'name' => $request->input('name'),
                'email' => Str::replace(' ', '_', $request->input('name'))
            ]);


            return response()->json('Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();
        return response()->json('Delete Data Berhasil');
    }
}
