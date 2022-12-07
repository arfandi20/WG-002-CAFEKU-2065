
@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Edit Data </h1>
    
    <form action="{{ url ('kategori/'. $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{$data->nama}}">
        </div>
            <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
    </form>
</div>
@endsection