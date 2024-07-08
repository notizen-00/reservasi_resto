<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Meja;
use App\Models\Pembayaran;
use App\Models\Produk;
use App\Models\Transaksi;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rowId = '8cbf215baa3b757e910e5305ab981172';
        // $data['if'] = Cart::remove($rowId);
        $data['meja'] = Meja::all();

        $data['konten'] = Cart::content();
        // dd(Cart::content());
        return view('cart.v_index', $data);
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
        $id = $request->id;

        $produk = Produk::findOrFail($id);

        $cart = Cart::add(['id' => $produk->id, 'name' => $produk->nama_produk, 'qty' => 1, 'price' => $produk->harga_produk]);

        $cart_count = Cart::content()->count();
        if ($cart) {
            return response()->json([
                'name' => $cart->name,
                'cart_count' => $cart_count,
            ]);
        }
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'meja_id' => 'required|max:3|min:1',
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'keterangan' => 'nullable|string|max:255',
        ]);
        try {
            DB::beginTransaction();

            // Simpan data pembayaran
            $total = Cart::subtotal();
            $pembayaran = Pembayaran::create([
                'nomor_pembayaran' => 'PAY-' . time(),
                'jumlah_pembayaran' => $total,
                'metode_pembayaran' => 'Transfer',
                'status_pembayaran' => false,
            ]);

            // Simpan data transaksi
            $data_transaksi = Transaksi::create([
                'nomor_transaksi' => 'INV-' . time(),
                'meja_id' => $request->meja_id,
                'tanggal_reservasi' => $request->tanggal_reservasi,
                'jam_reservasi' => $request->jam_reservasi,
                'total' => $total,
                'pelanggan_id' => auth()->user()->id,
                'pembayaran_id' => $pembayaran->id,
                'status_transaksi' => 0,
                'kembalian' => 0,
            ]);

            // Simpan detail transaksi
            $data_detail = Cart::content();
            foreach ($data_detail as $item) {
                DetailTransaksi::create([
                    'transaksi_id' => $data_transaksi->id,
                    'produk_id' => $item->id,
                    'jumlah' => $item->qty,
                    'subtotal' => $item->price * $item->qty,
                ]);
            }

            // Hapus isi keranjang
            Cart::destroy();

            DB::commit();

            return redirect()->route('transaksi.index')->with('success', 'Pemesanan Berhasil');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());

        }
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
        $id = $request->id;
        $qty = $request->qty;
        Cart::update($id, $qty);
        return redirect()->route('cart.index')->with('success', 'Item berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang');
    }
}
