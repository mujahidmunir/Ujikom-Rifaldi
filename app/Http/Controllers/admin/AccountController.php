<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return Order::with('user')->get();
        $user = User::with('roles')->get();
        if (\request()->ajax()){
            $user = User::with('roles')->get();
            return response()->json($user);
        }

        return view('admin.account.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $inject = [
            'url' => route('admin.account.store')
        ];
        if ($id){
            $user = User::whereId($id)->first();
            $inject = [
                'url' => route('admin.account.update', $id),
                'user' => $user
            ];
        }
        $role = User::all();

        return view('admin.account.create', $inject, compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make('123')
        ]);

        $user->assignRole($request->input('role'));
        return back();
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
        $user = User::firstOrNew(['id' => $id]);
        $user->name     = $request->input('name');
        $user->email     = $request->input('email');
        $user->status     = $request->input('status');
        $user->phone     = $request->input('phone');
        $user->save();
        return redirect()->route('admin.account.index')->withSuccess('Berhasil');

    }
}
