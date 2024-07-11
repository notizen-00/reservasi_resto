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
                            data-status="{{ $item->pembayaran->id }}"
                            data-id="{{ $item->pembayaran->status_pembayaran }}"><i
                                class="fa-duotone fa-credit-card"></i> Bayar
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
<div class="modal fade " id="modalView" tabindex="-1" aria-labelledby="editQtyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <!-- <form id="updateQtyForm"> -->
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="editQtyModalLabel">Detail Transaksi</h5><br>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="updateQtyForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editQtyModalLabel">Upload Bukti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit-row-id" name="pembayaran_id">
                        <div class="mb-3">
                            <label for="edit-qty" class="form-label">Foto ( JPG,PNG,JPEG ) *</label>
                            <input type="file" class="form-control" id="edit-qty" name="foto_bukti" min="1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Unggah</button>
                    </div>
                    <!-- </form> -->
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Pilih Meja</button> -->
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade " id="modalPayment" tabindex="-1" aria-labelledby="editQtyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <form id="updateQtyForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editQtyModalLabel">Form Pembayaran</h5><br>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <br>
                <div class="container"><span class="ml-4 pl-4">Mohon Unggah Bukti Pembayaran dibawah ini</span></div>
                <div class="d-flex justify-content-center">Rek : 1982891289 a/n PT. ABC (MANDIRI)</div>
                <div class="modal-body">
                    <form id="updateQtyForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editQtyModalLabel">Upload Bukti Pembayaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="edit-row-id" name="pembayaran_id">
                            <div class="mb-3">
                                <label for="edit-qty" class="form-label">Foto ( JPG,PNG,JPEG ) *</label>
                                <input type="file" class="form-control" id="edit-qty" name="foto_bukti" min="1"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Unggah</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Pilih Meja</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {

    $(".transaksi-view").on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "{{ url('transaksi/') }}/" + id,
            success: function(response) {
                console.log(response);
                $("#modalView").modal('show');

                // Build table for detail transaksi
                var detailTable = '<table class="table table-striped">';
                detailTable +=
                    '<thead><tr><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr></thead><tbody>';

                response.forEach(function(item) {
                    detailTable += '<tr>';
                    detailTable += '<td>' + item.produk.nama_produk + '</td>';
                    detailTable += '<td>' + item.produk.harga_produk + '</td>';
                    detailTable += '<td>' + item.jumlah + '</td>';
                    detailTable += '<td>' + item.subtotal + '</td>';
                    detailTable += '</tr>';
                });

                detailTable += '</tbody></table>';

                // Append table to modal body
                $('#modalView .modal-body').html(detailTable);

                Swal.fire({
                    position: "bottom-end",
                    icon: "success",
                    text: "Detail berhasil di Load",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });


});
$(".transaksi-payment").on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var status = $(this).attr('data-status');

    if (status == 1) {
        Swal.fire({
            position: "center",
            icon: "success",
            text: "Pembayaran Anda sudah lunas",
            showConfirmButton: false,
            timer: 1500
        });
        return false;
    } else {
        $("#modalPayment").modal('show');
        $("#edit-row-id").val(id);

        $("#updateQtyForm").on('submit', function(e) {
            e.preventDefault();

            var id = $('#edit-row-id').val();

            // var qty = $('#edit-qty').val();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('pembayaran.update') }}",
                data: formData,

                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#modalPayment').modal('hide');
                    location.reload();
                    Swal.fire({
                        position: "bottom-end",
                        icon: "success",
                        text: "Foto Bukti berhasil di update",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    }


})
</script>

@endpush
