@extends('layouts.app')

@section('content')
<h1>Kategori</h1>

<a href="{{ url('menu/create') }}" class="btn btn-primary mt-3">Tambah Data</a>

<div class="mt-4">
    <form>
    <table class="table text-center">
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto</th>
                <th scope="col">Harga</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($data as $item)
            <tr>
                {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                <td>{{ $item->id}}</td>
                <td>{{ $item->nama}}</td>
                <td><img src="{{ asset('storage/'.$item->foto) }}" height="100px" alt=""></td>
                <td>{{ $item->harga}}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->kategori->nama}}</td>
                <td>
                    <a href="{{ url ('menu/'. $item->id. '/edit') }}" class="btn btn-danger btn-sm mb-3">Edit</a>
                    <a href="{{ url ('deletemenu/'.$item->id)}}" class="btn btn-danger btn-sm mb-3">
                            Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </form>
</div
>
@endsection
