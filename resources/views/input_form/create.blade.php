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


<div class="p-5 bg-primary text-white text-center">
  <h1 class="text-warning">SuruhLEO</h1>
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
                    <a class="nav-link text-white"  href="{{ route('input_form.about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fw-bolder" href="{{ route('input_form.create') }}">Input Job Suruh</a>
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
                @endauth
            </ul>
        </div>
    </div>
</nav>

    <!-- Alert Logout -->
  @if(session('goodbye'))
    <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
        <strong>{{ session('goodbye') }}</strong> <br> Anda telah berhasil keluar dari akun.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
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
    

    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    <!-- Main Content -->
    <div class="container mt-5 text-warning">
        <h1>Mau nyuruh apa nih...</h1>
        <!-- Formulir pada halaman create.blade.php -->
        <form action="{{ route('input_form.store') }}" method="POST">
    @csrf
    <!-- Kolom Nama -->
    <div class="mb-3">
        <label for="name" class="form-label text-white">Nama</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name ?? '' }}" readonly>
    </div>
    <!-- Kolom No Telepon -->
    <div class="mb-3">
        <label for="no_telp" class="form-label text-white">No Telepon</label>
        <input type="text" class="form-control" name="no_telp" id="no_telp" required>
    </div>
    <!-- Kolom Prodi -->
    <div class="mb-3">
        <label for="prodi" class="form-label text-white">Prodi</label>
        <input type="text" class="form-control" name="prodi" id="prodi" required>
    </div>
    <!-- Kolom Gender -->
    <div class="mb-3">
        <label for="gender" class="form-label text-white">Gender</label>
        <select class="form-select" name="gender" id="gender" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <!-- Kolom Deskripsi Bantuan -->
    <div class="mb-3">
        <label for="description" class="form-label text-white">Deskripsi Bantuan</label>
        <textarea class="form-control" name="description" id="description" required></textarea>
    </div>
    
    <!-- Kolom user_id (Hidden) -->
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    
    <!-- Tombol Kirim -->
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>

    

   
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
<p><i class="fas fa-envelope me-2"></i> suruhleoupj@example.com</p>
<p><i class="fas fa-phone me-2"></i> +62 123 4567 890</p>

      </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3 border-top">
    © 2024 SuruhLEO.
  </div>
</footer>
    
    <script>
    
function confirmLogout() {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
        document.getElementById('logoutForm').submit();
    }
}
</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
