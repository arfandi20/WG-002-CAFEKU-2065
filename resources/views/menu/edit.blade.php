@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="container">
            <h1> Edit Menu </h1>
            
            <form action="{{ url ('menu/'. $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group mt-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="nama" value="{{$data->nama}}">
                </div>

                <div class="form-group mt-3">
                    <img src="{{ asset('storage/'.$data->foto) }}" height="100px" alt="">
                    <br>
                    <label for="">Foto Makanan</label>
                    <input type="file" class="form-control @error('judul') is-invalid @enderror" name="foto" value="{{$data->foto}}">
                </div>

                <div class="form-group mt-3">
                    <label for="">Harga</label>
                    <input type="number" min="1000"class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{$data->harga}}">
                </div>

                <div class="form-group mt-3">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{$data->keterangan}}">
                </div>

                <div class="form-group mt-3">
                    <label for="">Kategori Menu</label>
                    <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $item)
                        <option value="{{ $item->id }}" @selected($data->kategori_id==$item->id)>{{ $item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
