@extends('layouts.main')
@section('container')
        <section class="section">

            <div class="section-body container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Pesanan</h4>
                    </div>
                    {{-- foreach($errors->all() as $error)
                    <h3>{{$error}}</h3>
                    @endforeach --}}
                    {{-- <h2>{{ $exception->getMessage() }}</h2> --}}
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('pesanan.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="no_pesanan">No Pesanan</label>
                                <input name="no_pesanan" type="text" class="form-control @error('no_pesanan') is-invalid @enderror" id="no_pesanan" value="{{ old('no_pesanan') }}" placeholder="No Pesanan">
                                @error('no_pesanan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Nama Supplier</label>
                                <input name="nm_supplier" type="text" class="form-control @error('nm_supplier') is-invalid @enderror" id="nm_supplier" value="{{ old('nm_supplier') }}" placeholder="Nama Supplier">
                                @error('nm_supplier')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nm_produk">Nama Produk</label>
                                <input name="nm_produk" type="text" class="form-control @error('nm_produk') is-invalid @enderror" id="nm_produk" value="{{ old('nm_produk') }}" placeholder="Nama Produk">
                                @error('nm_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input name="total" type="text" class="form-control @error('total') is-invalid @enderror" id="total" value="{{ old('total') }}" placeholder="Total">
                                @error('total')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('pesanan.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
@endsection
