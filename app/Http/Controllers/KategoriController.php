<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // membukak halaman tabel kategori
        $data = kategori::all();
        return view ('kategori.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // membukak halaman untuk menambahkan kategori
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data yang telah di input dari halaman tambah ke dalam tabel kategori
        $request->validate([
            'kategori' => "required|string",
        ]);

        kategori::create(
            [
                'nama' => $request ->kategori,
            ]
            );
        return redirect('/kategori');
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
        // membukak halaman edit kategori
        $data = kategori ::findorFail($id);
        return view ('kategori.edit', compact('data'));
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
        // untuk mengbubah nama ketegori jika ada yang di rubah 
        $data = kategori ::findorFail($id);

        $data ->update ([
            'nama' => $request->kategori,
        ]);
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus kategori
        $data= kategori::findOrFail($id);
        $data->delete();
        return redirect('/kategori');
    }
}
