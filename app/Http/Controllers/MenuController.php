<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // untuk mengarahkan ke tabel menu
        $data = menu::all();

        return view ('menu.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mengarahkan ke tampilan menambahkan menu
        $kategori = kategori:: all();
        return view ('menu.tambah', compact ('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // untuk menambahkan menu tabel
        $request->validate([
            'nama' => "required|string",
            'foto' => "required|image|max:10000|mimes:jpeg,jpg",
            'harga' => "required|integer",
            'keterangan' => "required|string",
            'kategori' => "required|integer",
        ]);

        $file = $request->file('foto')->store('artikel/foto');
        menu::create(
            [
                'nama' => $request ->nama,
                'foto' => $file,
                'harga' => $request ->harga,
                'keterangan' => $request ->keterangan,
                'kategori_id' => $request ->kategori,
            ]
            );
        return redirect('/menu');
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
        // untuk mengarahkan ketampilan edit menu
        $data = menu::findOrFail ($id);
        $kategori = kategori :: all();
        return view ('menu.edit', compact('data', 'kategori'));
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
        // untuk mengedit tampilan tabel menu
        $data = menu :: findOrFail ($id);
        $data ->update ([
            'nama' => $request ->nama,
            'harga' => $request ->harga,
            'keterangan' => $request ->keterangan,
            'kategori_id' => $request ->kategori
        ]);

        if ($request->file('foto')!= null){
            $file = $request->file('foto')->store('artikel/foto');
            $data ->update ([
                'foto'=>$file
            ]);
        } else {
            $data->update([
                'foto' =>$data->foto
            ]);
            // return redirect('/artikel');
        }

        return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus salah setu pada tebel menu
        $data= menu:: findOrFail($id);
        $data ->delete();
        Storage::delete([$data->foto]);
        return redirect('/menu');
    }

    public function beranda()
    {
        //untuk tampilan halaman menu atau halaman utama 
        $data = menu:: all ();

        return view('beranda', compact('data'));
    }
}
