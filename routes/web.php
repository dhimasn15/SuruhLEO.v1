<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Route utama
Route::get('/', [PostController::class, 'home'])->name('input_form.home');

// Route untuk input form (CRUD)
Route::resource('input_form', PostController::class);

// Halaman lain
Route::get('/about', [PostController::class, 'about'])->name('input_form.about');
Route::get('/history', [PostController::class, 'history'])->name('input_form.history');
Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// Status update
Route::patch('/input_form/{id}/update_status', [PostController::class, 'updateStatus'])->name('input_form.update_status');
Route::patch('/input_form/{id}/mark_complete', [PostController::class, 'markComplete'])->name('input_form.mark_complete');

// Auth (Login & Register)
Route::get('/login', [SesiController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('input_form.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Admin
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/input.form', [PostController::class, 'index'])->name('input.form');
});

// Logout Custom
Route::post('/logout', function () {
    Auth::logout();
    session()->flash('goodbye', 'Selamat Tinggal! Semoga hari Anda menyenangkan.');
    return redirect()->route('input_form.home');
})->name('logout');
