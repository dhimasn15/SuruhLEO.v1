<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Biodata</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="p-5 bg-primary text-white text-center">
        <h1>ADMIN</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('input_form.index') }}">SuruhLEO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
                </li>
                @auth
                
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
<main class="container my-4 text-black">
        <h1>Selamat datang, Admin {{ auth()->user()->name }}</h1>
        <p>Akun email kamu {{ auth()->user()->email }}</p>
    </main>

    <!-- Main Content -->
    <div class="container mt-4">
    <h2 class="mb-4">Daftar Job Yang Akan Diambil</h2>
    <div class="row g-3">
    @foreach ($input_form as $form)
        <div class="col-md-4">
            <div class="card">
            <div class="card-body">
    <p><strong>Nama:</strong> {{ $form->name }}</p>
    <p><strong>No Telp:</strong> {{ $form->no_telp }}</p>
    <p><strong>Prodi:</strong> {{ $form->prodi }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $form->gender == 'male' ? 'Laki-Laki' : 'Perempuan' }}</p>
    <p><strong>Deskripsi:</strong> {{ $form->description }}</p>
    <p><strong>Status:</strong> {{ $form->status }}</p>
    <a href="{{ route('input_form.edit', $form->id) }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ route('input_form.update_status', $form->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success btn-sm">Terima</button>
    </form>
    <form action="{{ route('input_form.mark_complete', $form->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Selesai</button>
        </form>
    <form action="{{ route('input_form.destroy', $form->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
    </form>
</div>

            </div>
        </div>
        @endforeach
    </div>
</div>


    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
function confirmLogout() {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
        document.getElementById('logoutForm').submit();
    }
}

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</html>
