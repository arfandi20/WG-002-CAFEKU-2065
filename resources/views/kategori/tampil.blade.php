@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Kategori</h1>

        <a href="{{ url('kategori/create') }}" class="btn btn-primary mt-3">Tambah Data</a>

        <div class="mt-4">
            <form>
            <table class="table text-center">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->nama}}</td>
                        <td>
                            <a href="{{ url ('kategori/'. $item->id. '/edit') }}" class="btn btn-danger btn-sm mb-3">Edit</a>
                            <a href="{{ url ('deletekategori/'.$item->id)}}" class="btn btn-danger btn-sm mb-3">
                                    Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </form>
        </div>
    </div>
@endsection
