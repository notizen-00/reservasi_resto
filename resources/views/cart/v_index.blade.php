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
            <div class="card text-center">
                <div class="card-header">
                    Pilih Meja
                </div>
                <div class="card-body">
                    <div id="meja_choosen">
                        <a href="#" class="btn btn-primary pilih_meja">Pilih Meja</a>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Silahkan isi data tanggal dan reservasi untuk memilih meja
                </div>
            </div>
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

    <div class="modal fade " id="pilihMeja" tabindex="-1" aria-labelledby="editQtyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <form id="updateQtyForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editQtyModalLabel">Pilih Meja</h5><br>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <br>
                    <div class="container"><span class="ml-4 pl-4">Data Reservasi untuk tanggal : <span
                                id="tanggal_view"></span> & Jam :
                            <span id="jam_view"></span></span></div>
                    <div class="modal-body">
                        <div id="mejaGrid" class="row"></div>
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

        $('#meja_choosen .pilih_meja').on('click', function(e) {
            e.preventDefault();
            var jam = $('[name=jam]').val();
            var tanggal = $('[name=tanggal]').val();

            if (jam == '' && tanggal == '') {
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    text: "Pilih tanggal & jam reservasi terlebih dahulu",
                    showConfirmButton: false,
                    timer: 3000
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{ route('api.meja') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        jam: jam,
                        tanggal: tanggal
                    },
                    success: function(response) {
                        console.log(response);
                        $('#pilihMeja').modal('show');
                        $("#tanggal_view").text(tanggal);
                        $("#jam_view").text(jam);
                        $('#mejaGrid').empty();

                        // Generate new grid based on capacity
                        response.forEach(function(meja) {
                            var capacityDivs = '';
                            for (var i = 0; i < meja.kapasitas; i++) {
                                capacityDivs += '<div class="inner-box"></div>';
                            }

                            var mejaDiv = $('<div>', {
                                class: 'col-md-2 mb-3', // Adjust the column size as needed
                                html: '<div class="meja-box ' + (meja
                                        .status === 'reserved' ?
                                        'bg-danger' : '') + '" data-id="' +
                                    meja.id + '" data-name="' + meja
                                    .nomor_meja + '" data-status="' + meja
                                    .status + '">' +
                                    '<p class="mb-2">' + meja.nomor_meja +
                                    '</p>' +
                                    '<div class="d-flex justify-content-center flex-wrap mb-2">' +
                                    capacityDivs + '</div>' +
                                    '<div><span class="' + (meja.status ===
                                        'reserved' ?
                                        'badge bg-warning text-muted' :
                                        'badge bg-success text-white') +
                                    '">' +
                                    meja.status + '</span></div>' +
                                    '</div>'
                            });
                            $('#mejaGrid').append(mejaDiv);
                        });


                        Swal.fire({
                            position: "bottom-end",
                            icon: "success",
                            text: "Meja berhasil di load",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })

            }



        });

        $('#mejaGrid').on('click', '.meja-box', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var status = $(this).attr('data-status');
            $('[name=meja_id]').val(id);

            if (status === 'reserved') {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    text: "Meja ini telah di pesan!",
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                $('#pilihMeja').modal('hide');

                $("#meja_choosen").html("Meja Terpilih : " + name +
                    "<br><a href='{{ url('/cart') }}' class='btn btn-primary pilih_meja'>Pilih Ulang Meja</a>"
                );
                Swal.fire({
                    position: "center",
                    icon: "success",
                    text: "Meja berhasil di pilih",
                    showConfirmButton: false,
                    timer: 1500
                });
            }

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
