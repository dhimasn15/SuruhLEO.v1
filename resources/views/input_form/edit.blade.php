<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('input_form.index') }}">SuruhLEO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-warning fw-bolder" href="{{ route('input_form.home') }}">Home</a>
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
                        <a class="nav-link text-white fw-bold" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <form id="logoutForm" action="/logout" method="POST" class="d-inline">
    @csrf
    <button type="button" onclick="confirmLogout()" class="nav-link text-danger fw-bold border-0 bg-transparent">Logout</button>
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
    
    <!-- Main Content -->
    <div class="container mt-5">
        <h1>Edit Biodata</h1>

        <form action="{{ route('input_form.update', $input_form->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" name="name" id="name" value="{{ $input_form->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">no_telp:</label>
                <input type="text" name="no_telp" id="no_telp" value="{{ $input_form->no_telp }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi:</label>
                <input type="text" name="prodi" id="prodi" value="{{ $input_form->prodi }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin:</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="male" {{ $input_form->gender == 'male' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="female" {{ $input_form->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea name="description" id="description" class="form-control" required>{{ $input_form->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>

        <a href="{{ route('input_form.index') }}" class="btn btn-secondary mt-3">Kembali ke daftar biodata</a>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
