
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="container">
            <h1> Tambah Data </h1>
            
            <form action="{{ route ('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mt-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="masukkan nama makanan" value="{{ old('nama')}}">
                </div>

                <div class="form-group mt-3">
                    <label for="">foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" placeholder="masukkan foto" value="{{ old('foto')}}">
                </div>

                <div class="form-group mt-3">
                    <label for="">Harga</label>
                    <input type="number" min="1000" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="masukkan harga" value="{{ old('harga')}}">
                </div>

                <div class="form-group mt-3">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="masukkan keterangan" value="{{ old('keterangan')}}">
                </div>
                
                <div class="form-group mt-3">
                    <label for="">Kategori Artikel</label>
                    <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $item)
                        <option value="{{ $item->id }}" @selected(old('kategori')==$item->id)>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection