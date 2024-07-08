 <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
     <a href="" class="navbar-brand p-0">
         <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>E-Resto</h1>
         <!-- <img src="img/logo.png" alt="Logo"> -->
     </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
         <span class="fa fa-bars"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarCollapse">
         <div class="navbar-nav ms-auto py-0 pe-4">

             <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
             <a href="about.html" class="nav-item nav-link">About</a>
             <a href="service.html" class="nav-item nav-link">Service</a>
             <a href="{{ url('/transaksi') }}"
                 class="nav-item nav-link {{ Request::is('transaksi') ? 'active' : '' }}">Transaksi</a>
         </div>

         @auth

         <a href="{{ route('cart.index') }}" class="btn btn-secondary py-2 px-4 me-2 position-relative">
             <i class="fa fa-shopping-cart me-2"></i>
             <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="cart-count">
                 {{ Cart::content()->count() }}
             </span>
         </a>
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <i class="fa fa-user me-2"></i>{{ Auth::user()->name }}
             </a>
             <div class="dropdown-menu m-0">
                 <a href="#" class="dropdown-item">Profile</a>
                 <a href="{{ route('pelanggan.logout') }}" class="dropdown-item"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout
                 </a>
                 <form id="logout-form" action="{{ route('pelanggan.logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
             </div>
         </div>

         @else
         <a href="{{ route('pelanggan.login.form') }}" class="btn btn-primary py-2 px-4">Member</a>
         @endauth
     </div>
 </nav>
