<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // untuk menampilkan ke halaman tabel user
        $data = User::all();
        return view ('user.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // untuk mengarahkan ke halam tambah user
        return view('user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // untuk menambah user 
        $request->validate([
            'name' => "required|string",
            'email' => "required|string",
            'password' => "required|string",
            'confir' => "required|same:password",
        ]);

        User::create(
            [
                'name' => $request ->name,
                'email' => $request ->email,
                'password' => Hash::make($request['password']),
            ]
            );
        return redirect('/user');
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
        //untk menampilkan ke halaman edit user
        $data = User ::findorFail($id);
        return view ('user.edit', compact('data'));
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
        // untuk mengedit user
        $data = User ::findorFail($id);
        $request->validate([
            'name' => "required|string",
            'email' => "required|string",
            'password' => "required|string",
            'confir' => "required|same:password",
            'role' => "required|string",
        ]);
        $data ->update ([
            'name' => $request ->name,
            'email' => $request ->email,
            'password' => Hash::make($request['password']),
            'role' => $request ->role,
        ]);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // untuk menghapus user
        $data= User::findOrFail($id);
        $data->delete();
        return redirect('/user');
    }
}
