@extends('layouts.main')
@section('container')
        <section class="section">
            <div class="section-body container mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Tabel Pesanan</h4>
                        <div class="card-header-action">
                            <a href="{{ route('pesanan.create') }}" class="btn btn-primary">Tambah pesanan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>No. Pesanan</th>
                                        <th>Tanggal</th>
                                        <th>Nama Supplier</th>
                                        <th>Nama Produk</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanans as $pesanan)
                                        <tr class="text-center">
                                            <td >{{ $loop->iteration }}</td>
                                            <td>{{ $pesanan->no_pesanan }}</td>
                                            <td>{{ $pesanan->created_at }}</td>
                                            <td>{{ $pesanan->nm_supplier }}</td>
                                            <td>{{ $pesanan->nm_produk }}</td>
                                            <td>{{ $pesanan->total }}</td>
                                            <td class="text-center"><a href="{{ route('pesanan.edit', $pesanan) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('pesanan.destroy', $pesanan) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return confirm('Anda yakin ingin menghapus Pesanan ini ?')"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
