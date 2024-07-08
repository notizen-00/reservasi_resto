<br>
<br>

<head>
    <link href="{{ asset('asset/css/login.css') }}" rel="stylesheet">
</head>
<div class="cont">
    <div class="form sign-in">
        <h2>Selamat datang di E-Restaurant</h2>
        <form action="{{ route('pelanggan.login') }}" method="POST">
            @csrf
            <label>
                <span>Email</span>
                <input type="email" name="email" required />
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password" required />
            </label>
            <p class="forgot-pass">Lupa Password ?</p>
            <button type="submit" class="submit btn btn-primary">Sign In</button>
        </form>
    </div>
    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">

                <h3>Tidak punya akun ? Silahkan Registrasi !<h3>
            </div>
            <div class="img__text m--in">

                <h3>Jika punya akun silahkan masuk.<h3>
            </div>
            <div class="img__btn">
                <span class="m--up">Sign Up</span>
                <span class="m--in">Sign In</span>
            </div>
        </div>
        <div class="form sign-up">
            <form action="{{ route('pelanggan.register') }}" method="post">
                @csrf
                <h2>Buat Akun baru anda.</h2>
                <label>
                    <span>Nama</span>
                    <input type="text" name="nama" required />
                </label>
                <label>
                    <span>No Hp</span>
                    <input type="text" name="no_hp" required />
                </label>
                <label>
                    <span>Alamat ( opsional )</span>
                    <input type="text" name="alamat" required />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required />
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required />
                </label>
                <button type="submit" class="submit">Sign Up</button>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelector('.img__btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s--signup');
});
</script>
