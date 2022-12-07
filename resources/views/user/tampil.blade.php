@extends('layouts.app')

@section('content')

<h1>Kategori</h1>

<a href="{{ url('user/create') }}" class="btn btn-primary mt-3">Tambah Data</a>

<div class="mt-4">
    <form>
    <table class="table text-center">
        <thead class="text-center">
            <tr>
                
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($data as $item)
            <tr>
                {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                <td>{{ $item->id}}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->email}}</td>
                <td>{{ $item->role}}</td>
                <td>
                    <a href="{{ url ('user/'. $item->id. '/edit') }}" class="btn btn-danger btn-sm mb-3">Edit</a>
                    <a href="{{ url ('deleteuser/'.$item->id)}}" class="btn btn-danger btn-sm mb-3">
                            Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </form>
</div>
@endsection
