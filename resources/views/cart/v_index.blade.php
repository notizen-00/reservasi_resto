@extends('layout.layout_blank')

@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Meja Tersedia</h5>
            <h1 class="mb-5">Pilih Meja</h1>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="form-floating date">
                    <input type="date" class="form-control" name="tanggal" placeholder="Date & Time" />
                    <label for="datetime">Tanggal</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="time" class="form-control" id="select1" name="jam" placeholder="Select One">
                    <label for="select1">Jam</label>
                </div>
            </div>
        </div>
        <div class="card-group">
            @foreach($meja as $i)
            <div class="card">
                <img src="{{ asset('storage/'.$i->foto_meja) }}" style="height: 250px; width: 100%;  object-fit:cover;"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $i->nomor_meja }}</h5>
                    <p class="card-text"><span class="badge bg-info"><i class="fas fa-table-picnic"></i>
                            {{ $i->kapasitas }} Orang</span></p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <small class="text-muted"><button class="btn btn-outline-primary pilih_meja"
                            data-id="{{ $i->id }}">Pilih
                            Meja</button></small>
                </div>
            </div>
            @endforeach
        </div>


    </div>
    <div class="container mt-5">
        <h2>Keranjang Belanja</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(Cart::count() != 0)
                @foreach(Cart::content() as $i => $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ number_format($item->price * $item->qty, 2) }}</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"><i
                                        class="fa-duotone fa-trash"></i></button>
                            </form>
                            <button class="btn btn-outline-info cart-update" data-qty="{{ $item->qty }}"
                                data-id="{{ $item->rowId }}"><i class="fa-duotone fa-pen-to-square"></i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="text-center">
                    <td colspan="6">Data Keranjang Kosong Silahkan Pilih Produk <br> <a href="{{ url('/') }}"
                            class="btn btn-outline-primary ">Pilih Produk</a></td>
                </tr>
                @endif
            </tbody>
        </table>
        <h3>Total Keseluruhan: Rp.{{ number_format(Cart::subtotal(),2); }}</h3>
    </div>

    <div class="row mb-5">
        <div class="col-md-12 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Pemesanan</h5>
                <h1 class="text-white mb-4">Ringkasan Pemesanan</h1>
                <form action="{{ route('cart.simpan') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <input type="hidden" name="meja_id" />
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" readonly
                                    value="{{ auth()->user()->name }}" placeholder="Nama anda ">
                                <label for="name">Nama Pemesan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" readonly value="{{ auth()->user()->email }}"
                                    id="email" placeholder="Nomor meja di pilih dari atas ">
                                <label for="email">email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" name="tanggal_reservasi" class="form-control" id="tanggal_reservasi"
                                    readonly placeholder="Nama anda ">
                                <label for="name">Tanggal Pemesanan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="time" name="jam_reservasi" class="form-control" readonly id="jam_reservasi"
                                    placeholder="Nomor meja di pilih dari atas ">
                                <label for="email">Jam Reservasi</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan" id="message"
                                    style="height: 100px"></textarea>
                                <label for="message">Keterangan</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Pesan Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editQtyModal" tabindex="-1" aria-labelledby="editQtyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="updateQtyForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editQtyModalLabel">Edit Kuantitas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit-row-id" name="row_id">
                        <div class="mb-3">
                            <label for="edit-qty" class="form-label">Kuantitas</label>
                            <input type="number" class="form-control" id="edit-qty" name="qty" min="1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
    <script>
    $(document).ready(function() {

        $('[name=jam]').on('change', function(e) {
            e.preventDefault();
            var jam = $(this).val();

            $('[name=jam_reservasi]').val(jam);
        });

        $('[name=tanggal]').on('change', function(e) {
            e.preventDefault();
            var tgl = $(this).val();

            $('[name=tanggal_reservasi]').val(tgl);
        });
        $('.pilih_meja').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');

            // Cek apakah meja sudah dipilih
            if ($(this).attr('data-selected') === "true") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Meja ini sudah dipilih sebelumnya!',
                });
                return;
            }

            // Reset status selected pada semua tombol meja
            $('.pilih_meja').each(function() {
                $(this).removeAttr('data-selected').html('Pilih Meja');
            });

            // Tandai meja yang dipilih
            $(this).attr('data-selected', 'true').html(
                '<i class="fa-duotone fa-check text-success"></i> Dipilih');

            // Set nilai input meja_id
            $('[name=meja_id]').val(id);

            // Tampilkan notifikasi bahwa meja berhasil dipilih
            Swal.fire({
                position: "bottom-end",
                icon: "success",
                text: "Meja " + id + " berhasil dipilih",
                showConfirmButton: false,
                timer: 1500
            });
        });

        $('.cart-update').on('click', function(e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            var qty = $(this).attr('data-qty');

            $('#edit-row-id').val(id);
            $('#edit-qty').val(qty);

            $('#editQtyModal').modal('show');
        });

        $('#updateQtyForm').on('submit', function(e) {
            e.preventDefault();

            var id = $('#edit-row-id').val();
            var qty = $('#edit-qty').val();

            $.ajax({
                type: "POST",
                url: "{{ route('cart.update') }}",
                data: {
                    id: id,
                    qty: qty,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    $('#editQtyModal').modal('hide');
                    location.reload();
                    Swal.fire({
                        position: "bottom-end",
                        icon: "success",
                        text: "Produk berhasil di update",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
    </script>
    @endpush