@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @foreach ($data as $item)
        <div class="col-sm-3 mb-5 m-2">
            <div class="card " style="width: 18rem;">
                <img src="{{ asset('storage/'. $item->foto) }}" class="rounded mx-auto d-block card-img-top mb-5" alt="" style="width: 75%;">
                <div class="card-body">
                    <h5> Nama :{{ $item->nama}}</h5>
                    <h6> Keterangan :{{ $item->keterangan }}</h6>
                    <p class="card-text">Harga :{{ $item->harga}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
