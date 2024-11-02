<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\guru\GuruController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\superadmin\SuperadminController;
use App\Http\Controllers\staffperpus\StaffperpusController;
use App\Http\Controllers\pembinaekstra\PembinaekstraController;
use App\Http\Controllers\staffakademik\StaffakademikController;
use App\Http\Controllers\pengurusekstra\PengurusekstraController;
use App\Http\Controllers\Ekstrakurikuler\EkstrakurikulerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::group(['prefix' => 'superadmin', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
});
Route::group(['prefix' => 'staff_akademik','middleware' => ['staff_akademik']], function () {
    Route::get('/dashboard', [StaffakademikController::class, 'index'])->name('staff_akademik.dashboard');
});
Route::group(['prefix' => 'staff_perpus','middleware' => ['staff_perpus']], function () {
    Route::get('/dashboard', [StaffperpusController::class, 'index'])->name('staff_perpus.dashboard');
});
Route::group(['prefix' => 'siswa', 'middleware' => ['siswa']], function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::group(['middleware' => 'pengurus'], function () {
        Route::get('/pengurus-dashboard', [PengurusekstraController::class, 'index'])->name('siswa.pengurus.dashboard');
    });
});

Route::group(['prefix' => 'guru','middleware' => ['guru']], function () {
    Route::get('/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::group(['middleware' => 'pembina_ekstra'], function () {
        Route::get('/pembina-dashboard', [PembinaekstraController::class, 'index'])->name('guru.pembina.dashboard');
    });
});
Route::group(['prefix' => 'pembina_ekstra','middleware' => ['pembina_ekstra']], function () {
    Route::get('/dashboard', [PembinaekstraController::class, 'index'])->name('pembina_ekstra.dashboard');
});


Route::get('/registrasi-ekstrakurikuler', [EkstrakurikulerController::class, 'showForm'])->name('ekstrakurikuler.registrasi');
Route::post('/registrasi-ekstrakurikuler', [EkstrakurikulerController::class, 'submitForm'])->name('ekstrakurikuler.submit');




require __DIR__.'/auth.php';
