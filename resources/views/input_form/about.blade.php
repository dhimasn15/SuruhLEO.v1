<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuruhLEO</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    .badge-warning {
    background-color: #ffc107;
    color: #212529;
}

.badge-primary {
    background-color: #007bff;
    color: #fff;
}

.badge-success {
    background-color: #28a745;
    color: #fff;
}
/* Custom Styles for Navbar */
.navbar-nav .nav-item .nav-link {
    border: 3px solid transparent;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

.navbar-nav .nav-item .nav-link:hover {
    border-color: #ffc107; /* Border color when hovered */
    background-color: rgba(255, 193, 7, 0.1); /* Background color when hovered */
     border-radius: 8px
}

/* For logout button */
.navbar-nav .nav-item form button:hover {
    border-color: #dc3545; /* Border color for logout when hovered */
    background-color: blue; /* Background color for logout when hovered */
    color: #dc3545; /* Text color for logout when hovered */
}


</style>
</head>

<body class="bg-dark">

<!-- Header -->
<div class="p-5 bg-primary text-white text-center">
    <h1 class="text-warning">Tentang Kami</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bolder" href="{{ route('input_form.index') }}">SuruhLEO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fw-bolder" href="{{ route('input_form.create') }}"" href="{{ route('input_form.about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.create') }}">Input Job Suruh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.history') }}">Riwayat</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold border border-light rounded-3 p-2 m-1" href="{{ route('dashboard') }}" style="transition: background-color 0.3s ease, color 0.3s ease;">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form id="logoutForm" action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button type="button" onclick="confirmLogout()" class="nav-link text-danger fw-bold border border-light rounded-3 p-2 m-1 bg-transparent" style="transition: background-color 0.3s ease, color 0.3s ease;">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
    
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('input_form.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Daftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <div class="mb-3 d-grid">
        <button type="submit" class="btn btn-primary">Daftar</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>


    <!-- Alert Logout -->
  @if(session('goodbye'))
    <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
        <strong>{{ session('goodbye') }}</strong> <br> Anda telah berhasil keluar dari akun.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    
<!-- About Section -->
<section class="bg-light text-dark py-5">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Gambar -->
            <div class="col-lg-6 mb-4">
            <img 
    src="{{ asset('gambar/about.png') }}" 
    alt="Tentang Kami" 
    class="img-fluid rounded shadow" 
    style="max-width: 100%; height: auto;"
>
            </div>
            
            <!-- Deskripsi -->
            <div class="col-lg-6">
                <h2 class="text-primary">Mengenal SuruhLEO</h2>
                <p class="lead">
                    <strong>SuruhLEO</strong> adalah platform inovatif yang dirancang untuk mempermudah kehidupan sehari-hari Anda dengan menyediakan layanan "suruhan" yang cepat, terpercaya, dan efisien.
                </p>
                <p class="lead">
                    Kami hadir dengan visi menciptakan solusi praktis untuk kebutuhan Anda, mulai dari tugas-tugas kecil hingga permintaan khusus, semuanya dengan pendekatan yang ramah dan profesional.
                </p>
            </div>
            
        </div>
    </div>
</section>


<!-- Our Mission Section -->
<section class="bg-dark text-light py-5">
    <div class="container">
        <h2 class="text-center text-warning">Misi Kami</h2>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <i class="fas fa-thumbs-up fa-3x text-warning mb-3"></i>
                <h5>Kualitas</h5>
                <p>Kami berkomitmen memberikan layanan terbaik dengan hasil memuaskan.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-bolt fa-3x text-warning mb-3"></i>
                <h5>Kecepatan</h5>
                <p>Respons cepat dan layanan instan untuk kebutuhan Anda.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-heart fa-3x text-warning mb-3"></i>
                <h5>Kepuasan</h5>
                <p>Kepuasan pelanggan adalah prioritas utama kami.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center text-primary">Tim Kami</h2>
        <div class="row text-center mt-4">
            <div class="col-md-3">
                <img src="{{ asset('gambar/aset4.jpg') }}" class="rounded-circle mb-3" width="150" alt="Tim 1">
                <h5>Dhimas Suruh</h5>
                <p>CEO & Pendiri</p>
            </div>
            <div class="col-md-3">
            <img src="{{ asset('gambar/aset5.jpg') }}" class="rounded-circle mb-3" width="150" alt="Tim 2">
                <h5>Leo Bantu</h5>
                <p>Manajer Operasional</p>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('gambar/aset6.jpg') }}" class="rounded-circle mb-3" width="150"  alt="Tim 3">
                <h5>Rais Cepat</h5>
                <p>Spesialis Layanan</p>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('gambar/aset7.jpg') }}" class="rounded-circle mb-3"   width="150" alt="Tim 4">
                <h5>Fadil Kahim</h5>
                <p>Spesialis Layanan</p>
            </div>
        </div>
    </div>
</section>



<footer class="bg-dark text-white pt-4 pb-2">
  <div class="container text-center text-md-start">
    <div class="row">
      <!-- Kolom 1 -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        <h5 class=" fw-bold"><span class="text-warning"> SuruhLEO - Asisten Mahasiswa UPJ </span></h5>
        <p>
        SuruhLEO adalah layanan khusus untuk mahasiswa Universitas Pembangunan Jaya (UPJ) yang bertujuan membantu menyelesaikan berbagai kebutuhan harian di lingkungan kampus. Kami menyediakan layanan cepat dan praktis seperti jasa fotokopi, pembelian makanan, hingga pengurusan barang
        </p>
      </div>

      <!-- Kolom 2 -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase text-warning fw-bold">Tautan</h6>
        <ul class="list-unstyled">
          <li><a href="{{ route('input_form.home') }}" class="text-white text-decoration-none">Home</a></li>
          <li><a href="{{ route('input_form.about') }}" class="text-white text-decoration-none">Tentang Kami</a></li>
          <li><a href="{{ route('input_form.create') }}" class="text-white text-decoration-none">Input Job Suruh</a></li>
          <li><a href="{{ route('input_form.history') }}" class="text-white text-decoration-none">Riwayat</a></li>
        </ul>
      </div>

      <!-- Kolom 3 -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase text-warning fw-bold">Ikuti Kami</h6>
        <a href="https://www.instagram.com/dhimassn_/" target="_blank" class="btn btn-outline-light btn-sm me-2">Instagram 1</a>
        <a href="https://www.instagram.com/leonardocloixx/" target="_blank" class="btn btn-outline-light btn-sm me-2">Instagram 2</a>
        <a href="https://www.instagram.com/raisfadillahh/" target="_blank" class="btn btn-outline-light btn-sm me-2">Instagram 3</a>
        <a href="https://www.instagram.com/fadil_pras23/" target="_blank" class="btn btn-outline-light btn-sm me-2">Instagram 4</a>
      </div>

      <!-- Kolom 4 -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
        <h6 class="text-uppercase text-warning fw-bold">Kontak</h6>
        <p><i class="fas fa-home me-2"></i> Kampus UPJ, Jalan Cendrawasih Raya, Bintaro</p>
<p><i class="fas fa-envelope me-2"></i> suruhleoupj@gmail.com</p>
<p><i class="fas fa-phone me-2"></i> +62 895 1610 7824</p>

      </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3 border-top">
    © 2024 SuruhLEO.
  </div>
</footer>

<!-- Include FontAwesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    
function confirmLogout() {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
        document.getElementById('logoutForm').submit();
    }
}
</script>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
