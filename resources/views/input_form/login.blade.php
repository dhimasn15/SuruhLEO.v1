<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Login</title>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-register {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-register:hover {
            background-color: #e0a800;
            color: #fff;
        }
    </style>
</head>

<body class="bg-dark">
<div class="p-5 bg-primary text-white text-center">
    <h1 class="text-warning">Login</h1>
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
                    <a class="nav-link  text-white" href="{{ route('input_form.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.create') }}">Input Job Suruh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.history') }}">History</a>
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
                        <a class="nav-link text-warning fw-bolder" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
</li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
    <!-- Alert Message -->
    <div class="alert alert-info text-center" role="alert">
        <strong>Masuk untuk menikmati SuruhLEO!</strong>
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

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="container py-5  ">
        <div class="row justify-content-center  ">
            <div class="col-12 col-md-8 col-lg-6   ">
                <div class="card px-4 py-5 bg-dark">
                    <h1 class="text-center text-warning mb-4 ">Login</h1>

                    @if ($errors->has('loginError'))
                    <div class="alert alert-danger">
                        {{ $errors->first('loginError') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('input_form.login') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Masukkan email Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password Anda" required>
                        </div>
                        <div class="mb-3 d-grid">
                            <button name="submit" type="submit" class="btn btn-primary text-white">Login</button>
                        </div>
                    </form>

                    <div class="text-center mt-4 text-white">
                        <p>Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#signupModal" class="btn btn-register btn-sm">Daftar di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
        <h6 class="text-uppercase fw-bold">Tautan</h6>
        <ul class="list-unstyled">
          <li><a href="{{ route('input_form.home') }}" class="text-white text-decoration-none">Home</a></li>
          <li><a href="{{ route('input_form.about') }}" class="text-white text-decoration-none">Tentang Kami</a></li>
          <li><a href="{{ route('input_form.create') }}" class="text-white text-decoration-none">Input Job Suruh</a></li>
          <li><a href="{{ route('input_form.history') }}" class="text-white text-decoration-none">Riwayat</a></li>
        </ul>
      </div>

      <!-- Kolom 3 -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold">Ikuti Kami</h6>
        <a href="https://www.instagram.com/dhimassn_/" target="_blank" class="btn btn-outline-light btn-sm me-2">Instagram 1</a>
        <a href="https://www.instagram.com/leonardocloixx/" target="_blank" class="btn btn-outline-light btn-sm me-2">Instagram 2</a>
        <a href="https://www.instagram.com/raisfadillahh/" target="_blank" class="btn btn-outline-light btn-sm me-2">Instagram 3</a>
        <a href="https://www.instagram.com/fadil_pras23/" target="_blank" class="btn btn-outline-light btn-sm me-2">Instagram 4</a>
      </div>

      <!-- Kolom 4 -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold">Kontak</h6>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
