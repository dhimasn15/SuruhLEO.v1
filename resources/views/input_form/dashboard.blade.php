```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuruhLEO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="p-4 bg-primary text-white text-center">
        <h1 class="text-warning">SuruhLEO</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('input_form.index') }}">SuruhLEO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.create') }}">Input Job Suruh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('input_form.history') }}">Riwayat</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-warning fw-bold border border-light rounded-3 p-2 m-1" href="{{ route('dashboard') }}" style="transition: background-color 0.3s ease, color 0.3s ease;">Dashboard</a>
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

    <main class="container my-4 text-white">
        <h1>Halo, {{ auth()->user()->name }}!</h1>
        <p>Akun email kamu adalah: {{ auth()->user()->email }}</p>
    </main>

   
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
    <script>
      
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>

```