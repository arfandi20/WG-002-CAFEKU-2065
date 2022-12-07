@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-md-6">
                     <div class="card">
                            <div class="card-header">Biodata Diri</div>

                            <div class="card-body">
                                <form action="{{ route('order.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 mt-3">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="">Pesanan</label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="pesanan[]" value="kopi" type="checkbox" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Cappuchino
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="pesanan[]" value="Capucino" type="checkbox" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Americano
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="pesanan[]" value="Creamy Latte" type="checkbox" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                V60
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="member">Member</option>
                                            <option value="biasa">Non Member</option>
                                        </select>
                                    
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
                
                <div class= "col-md-6 mb-5">
                    <div class="card">
                        <div class="card-header">Hasil</div>
                        @isset($data)
                        <div class="card-body">
                            <div class="form-group mt-3">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                            </div>
                            <div class="form-group mt-3">
                                    <label for="">Jumlah Pesanan</label>
                                    <input type="number" class="form-control" value="{{ $data['jumlah_pesanan'] }}" readonly>
                            </div>
                            <div class="form-group mt-3">
                                    <label for="">Status</label>
                                    <input type="text" class="form-control" value="{{ $data['status'] }}" readonly>
                            </div>
                            <div class="form-group mt-3">
                                    <label for="">Total Pesanan</label>
                                    <input type="number" class="form-control" value="{{ $data['total_pesanan'] }}" readonly>
                            </div>
                            <div class="form-group mt-3">
                                    <label for="">Diskon</label>
                                    <input type="number" class="form-control" value="{{ $data['diskon'] }}" readonly>
                            </div>
                            <div class="form-group mt-3">
                                    <label for="">Total Pembayaran</label>
                                    <input type="number" class="form-control" value="{{ $data['total_pembayaran'] }}" readonly>
                            </div>
                            @endisset
                            </div>
                        </div>
                </div>
                
        </div>
    </div>
@endsection
