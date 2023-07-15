<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = pesanan::all();
        return view('pesanan.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // validation
        $pesanan = $request->validate([
            'no_pesanan' => 'required|min:3',
            'nm_supplier' => 'required|min:3',
            'nm_produk' => 'required|min:3',
            'total' => 'required|min:3|integer',
        ]);

        pesanan::create($pesanan);

        return redirect(route('pesanan.index'))->with('success', 'club berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pesanan = pesanan::find($id);
        return view('pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesanan = $request->validate([
            'no_pesanan' => 'required|min:3',
            'nm_supplier' => 'required|min:3',
            'nm_produk' => 'required|min:3',
            'total' => 'required|min:3|integer',
        ]);

        pesanan::find($id)->update($pesanan);
        return redirect(route('pesanan.index'))->with('success', 'pesanan berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pesanan::destroy($id);
        return redirect(route('pesanan.index'))->with('success', 'pesanan berhasil Dihapus');
    }
}
