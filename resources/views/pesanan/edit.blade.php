@extends('layouts.main')
@section('container')
        <section class="section">

            <div class="section-body container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('pesanan.update', $pesanan->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="no_pesanan">No Pesanan</label>
                                <input name="no_pesanan" type="text" class="form-control @error('no_pesanan') is-invalid @enderror" id="no_pesanan" value="{{ old('no_pesanan', $pesanan->no_pesanan) }}" placeholder="No Pesanan">
                                @error('no_pesanan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Nama Supplier</label>
                                <input name="nm_supplier" type="text" class="form-control @error('nm_supplier') is-invalid @enderror" id="nm_supplier" value="{{ old('nm_supplier', $pesanan->nm_supplier) }}" placeholder="Nama Supplier">
                                @error('nm_supplier')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nm_produk">Nama Produk</label>
                                <input name="nm_produk" type="text" class="form-control @error('nm_produk') is-invalid @enderror" id="nm_produk" value="{{ old('nm_produk', $pesanan->nm_produk) }}" placeholder="Nama Produk">
                                @error('nm_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input name="total" type="number" class="form-control @error('total') is-invalid @enderror" id="total" value="{{ old('total', $pesanan->total) }}" placeholder="Total">
                                @error('total')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('pesanan.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Edit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
@endsection
