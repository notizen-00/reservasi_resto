<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi request
        $request->validate([
            'pembayaran_id' => 'required|exists:pembayaran,id', // memastikan id ada di tabel pembayarans
            'foto_bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil file dari request
        $file = $request->file('foto_bukti');

        // Tentukan path penyimpanan
        $path = 'foto_bukti';

        // Simpan file dan dapatkan path yang tersimpan
        $filePath = $file->store($path, 'public');

        // Update model Pembayaran
        $pembayaran = Pembayaran::find($request->pembayaran_id);
        $pembayaran->foto_bukti = $filePath;
        $pembayaran->save();

        return back()->with('success', 'Foto berhasil diupload dan data pembayaran diperbarui!')->with('file', $filePath);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
