<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InputFormController;




// Route untuk halaman index
Route::get('/input_form', [PostController::class, 'index'])->name('input_form.index');


// Route untuk store data
Route::post('/input_form/store', [PostController::class, 'store'])->name('input_form.store');

Route::get('/input_form', [PostController::class, 'index'])->name('input_form.index');

Route::get('/', [PostController::class, 'home'])->name('input_form.home');
Route::get('/create', [InputFormController::class, 'create'])->name('input_form.create');
Route::post('/store', [InputFormController::class, 'store'])->name('input_form.store');
Route::resource('input_form', PostController::class);
Route::get('/input_form/home', [InputFormController::class, 'index'])->name('input_form.home');
Route::get('/history', [PostController::class, 'history'])->name('input_form.history');
Route::get('/about', [PostController::class, 'about'])->name('input_form.about');





// 

// Halaman input form
Route::get('/input_form/create', [PostController::class, 'create'])->name('input_form.create');
//Route::post('/input_form/login', [SesiController::class, 'login'])->name('input_form.login');

// Menyimpan data dari form
Route::post('/input_form/store', [PostController::class, 'store'])->name('input_form.store');

// Menampilkan daftar data
Route::get('/input_form', [PostController::class, 'index'])->name('input_form.index');

// status
Route::patch('/input_form/{id}/update_status', [PostController::class, 'updateStatus'])->name('input_form.update_status');
Route::patch('/input_form/{id}/mark_complete', [PostController::class, 'markComplete'])->name('input_form.mark_complete');

 
// user

Route::get('/login', [SesiController::class, 'showLoginForm'])->name('login');
Route::post('/input_form/login', [SesiController::class, 'login'])->name('input_form.login');

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('input_form.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

 
// admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/logout', [SesiController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('input_form.create');
    Route::post('/create', [PostController::class, 'store'])->name('input_form.store');
});

Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware('auth');
Route::post('/logout', function () {
    Auth::logout();
    session()->flash('goodbye', 'Selamat Tinggal! Semoga hari Anda menyenankan."kata Leo"');
    return redirect()->route('input_form.home');
})->name('logout');

Route::post('/register', [SesiController::class, 'store'])->name('register');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
});

Route::get('/input.form', [InputFormController::class, 'index'])
    ->middleware('admin')
    ->name('input.form');
    
Route::get('/history', [PostController::class, 'history'])->name('input_form.history');
Route::middleware(['auth'])->group(function () {
    Route::get('/input_form/create', [PostController::class, 'create'])->name('input_form.create');
});


