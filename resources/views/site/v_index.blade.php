@extends('layout.layout_default')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h5>Master Chefs</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                        <h5>Quality Food</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                        <h5>Online Order</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                        <h5>24/7 Service</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                            src="{{ asset('asset/img/about-1.jpg') }}">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s"
                            src="{{ asset('asset/img/about-2.jpg') }}" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                            src="{{ asset('asset/img/about-3.jpg') }}">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s"
                            src="{{ asset('asset/img/about-4.jpg') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                    diam et eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                    diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna
                    dolore erat amet</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15
                            </h1>
                            <div class="ps-4">
                                <p class="mb-0">Years of</p>
                                <h6 class="text-uppercase mb-0">Experience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50
                            </h1>
                            <div class="ps-4">
                                <p class="mb-0">Popular</p>
                                <h6 class="text-uppercase mb-0">Master Chefs</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu Makanan</h5>
            <h1 class="mb-5">Best Seller</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Popular</small>
                            <h6 class="mt-n1 mb-0">Minuman</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <i class="fa fa-hamburger fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Special</small>
                            <h6 class="mt-n1 mb-0">Snack</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Lovely</small>
                            <h6 class="mt-n1 mb-0">Makanan</h6>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach($minuman as $i)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <img class="img-fluid rounded-start" src="{{ asset('storage/'.$i->foto_produk )}}"
                                    alt="" style="width: 180px; height:100px; object-fit:cover;">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span>{{ $i->nama_produk }}</span>
                                        <span class="text-primary">
                                            {{ Illuminate\Support\Number::currency($i->harga_produk,"IDR","id"); }}</span>

                                    </h5>
                                    <span class="badge bg-info">{{ $i->kategori_produk }}</span>
                                    <div class="d-flex justify-content-between border-bottom pb-2 mt-10 pt-4">
                                        <button class="btn btn-sm btn-outline-primary px-3 cart-add"
                                            data-id="{{ $i->id }}"><i class="fas fa-cart-plus"></i> Tambah
                                            Keranjang</button>
                                        @if($i->status_produk == true)
                                        <span class="btn btn-sm btn-outline-success"><i class="fas fa-check"> Produk
                                                Tersedia</i>
                                        </span>
                                        @else
                                        <span class="btn btn-sm btn-outline-danger"><i class="fas fa-error">Produk
                                                Kosong</i>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($snack as $i)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <img class="img-fluid rounded-start" src="{{ asset('storage/'.$i->foto_produk )}}"
                                    alt="" style="width: 180px; height:100px; object-fit:cover;">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span>{{ $i->nama_produk }}</span>
                                        <span
                                            class="text-primary">{{ Illuminate\Support\Number::currency($i->harga_produk,"IDR","id"); }}</span>
                                    </h5>
                                    <span class="badge bg-info">{{ $i->kategori_produk }}</span>
                                    <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo
                                        diam</small>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach($makanan as $i)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <img class="img-fluid rounded-start" src="{{ asset('storage/'.$i->foto_produk )}}"
                                    alt="" style="width: 150px; height:100px; object-fit:cover;">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span>{{ $i->nama_produk }}</span>
                                        <span
                                            class="text-primary">{{ Illuminate\Support\Number::currency($i->harga_produk,"IDR","id"); }}</span>
                                    </h5>
                                    <span class="badge bg-info">{{ $i->kategori_produk }}</span>
                                    <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo
                                        diam</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->


<!-- Reservation Start -->
<div class="container-fluid reservation pt-5 pb-5">
    <div class="container">
        <div class="bg-light rounded" style="padding: 30px;">
            <div class="row align-items-center py-5">
                <div class="col-lg-8">
                    <h1 class="display-5">Reservation</h1>
                    <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="col-lg-12">

                    <!-- Reservation Start -->


                    <!-- Team Start -->
                    <div class="container-xxl pt-5 pb-3">
                        <div class="container">
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members
                                </h5>
                                <h1 class="mb-5">Our Master Chefs</h1>
                            </div>
                            <div class="row g-4">
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item text-center rounded overflow-hidden">
                                        <div class="rounded-circle overflow-hidden m-4">
                                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0">Full Name</h5>
                                        <small>Designation</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="team-item text-center rounded overflow-hidden">
                                        <div class="rounded-circle overflow-hidden m-4">
                                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0">Full Name</h5>
                                        <small>Designation</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="team-item text-center rounded overflow-hidden">
                                        <div class="rounded-circle overflow-hidden m-4">
                                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0">Full Name</h5>
                                        <small>Designation</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                    <div class="team-item text-center rounded overflow-hidden">
                                        <div class="rounded-circle overflow-hidden m-4">
                                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0">Full Name</h5>
                                        <small>Designation</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team End -->


                    <!-- Testimonial Start -->
                    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="container">
                            <div class="text-center">
                                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial
                                </h5>
                                <h1 class="mb-5">Our Clients Say!!!</h1>
                            </div>
                            <div class="owl-carousel testimonial-carousel">
                                <div class="testimonial-item bg-transparent border rounded p-4">
                                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                                        eos labore
                                        diam</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg"
                                            style="width: 50px; height: 50px;">
                                        <div class="ps-3">
                                            <h5 class="mb-1">Client Name</h5>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-item bg-transparent border rounded p-4">
                                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                                        eos labore
                                        diam</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg"
                                            style="width: 50px; height: 50px;">
                                        <div class="ps-3">
                                            <h5 class="mb-1">Client Name</h5>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-item bg-transparent border rounded p-4">
                                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                                        eos labore
                                        diam</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg"
                                            style="width: 50px; height: 50px;">
                                        <div class="ps-3">
                                            <h5 class="mb-1">Client Name</h5>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-item bg-transparent border rounded p-4">
                                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                                        eos labore
                                        diam</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg"
                                            style="width: 50px; height: 50px;">
                                        <div class="ps-3">
                                            <h5 class="mb-1">Client Name</h5>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection

                    @push('scripts')
                    <script>
                    $(document).ready(function() {
                        $('.cart-add').on('click', function(e) {
                            e.preventDefault();

                            var id = $(this).attr('data-id');
                            $.ajax({
                                type: "POST",
                                url: "{{ route('cart.store') }}",
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    console.log(response);
                                    // var obj = JSON.parse(response);
                                    $('#cart-count').text(response.cart_count);
                                    Swal.fire({
                                        position: "bottom-end",
                                        icon: "success",
                                        text: "Produk " + response.name +
                                            " telah di tambah ke keranjang",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            })

                        });
                    });
                    </script>
                    @endpush
