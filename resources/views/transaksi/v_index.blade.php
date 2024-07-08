@extends('layout.layout_transaksi')

@section('content')

<div class="container mt-5">
    <h2>Riwayat Transaksi</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Transaksi</th>
                <th>Nomor Meja</th>
                <th>Total Transaksi</th>
                <th>Tanggal & Jam Pemesanan</th>
                <th>Status Transaksi</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($transaksi->count() != 0)
            @foreach($transaksi as $i => $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->nomor_transaksi }}</td>
                <td>{{ $item->meja->nomor_meja }}</td>
                <td>Rp. {{ number_format($item->total, 2) }}</td>
                <td>{{ $item->tanggal_reservasi }} -- {{ $item->jam_reservasi }}</td>
                <td>
                    @if($item->status_transaksi->name == 'Pending')
                    <span class="badge bg-dark">Pending</span>
                    @elseif($item->status_transaksi->name == 'Verified')
                    <span class="badge bg-info">Verified</span>
                    @elseif($item->status_transaksi->name == 'Proses')
                    <span class="badge bg-warning">Proses</span>
                    @elseif($item->status_transaksi->name == 'Selesai')
                    <span class="badge bg-success">Selesai</span>
                    @endif
                </td>
                <td>
                    @if($item->pembayaran->status_pembayaran == 0)
                    <span class="badge bg-danger">Belum Lunas</span>
                    @else
                    <span class="badge bg-success">Lunas</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex justify-content-around">

                        <button class="btn btn-sm btn-outline-info transaksi-view" data-id="{{ $item->id }}"><i
                                class="fa-duotone fa-eye"></i> Lihat </button>
                        <button class="btn btn-sm btn-outline-warning transaksi-payment"
                            data-id="{{ $item->pembayaran->id }}"><i class="fa-duotone fa-credit-card"></i> Bayar
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="6">Data Transaksi Kosong Silahkan Lakukan Transaksi <br> <a href="{{ url('/') }}"
                        class="btn btn-outline-primary ">Buat Transaksi</a></td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
