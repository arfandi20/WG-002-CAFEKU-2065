
@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Tambah Data </h1>
    
    <form action="{{ route ('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" placeholder="masukkan kategori buku" value="{{ old('kategori')}}">
        </div>
            <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
    </form>
</div>
@endsection