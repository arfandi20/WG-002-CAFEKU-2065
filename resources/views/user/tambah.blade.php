
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="container">
            <h1> Tambah Data </h1>
            
            <form action="{{ route ('user.store') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="masukkan nama" value="{{ old('nama')}}">
                </div>

                <div class="form-group mt-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="masukkan email" value="{{ old('email')}}">
                </div>

                <div class="form-group mt-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="masukkan password" value="{{ old('password')}}">
                </div>
                
                <div class="form-group mt-3">
                    <label for="">Confirmasi Password</label>
                    <input type="password" class="form-control @error('confir') is-invalid @enderror" name="confir" placeholder="masukkan ulang password" value="{{ old('confir')}}">
                </div>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection