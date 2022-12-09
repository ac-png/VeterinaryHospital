<?php

use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\User\AnimalController as UserAnimalController;

use App\Http\Controllers\Admin\HospitalController as AdminHospitalController;
use App\Http\Controllers\User\HospitalController as UserHospitalController;

use App\Http\Controllers\Admin\VeterinarianController as AdminVeterinarianController;
use App\Http\Controllers\User\VeterinarianController as UserVeterinarianController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/home/hospitals', [App\Http\Controllers\HomeController::class, 'hospitalIndex'])->name('home.hospital.index');
Route::get('/home/veterinarians', [App\Http\Controllers\HomeController::class, 'veterinarianIndex'])->name('home.veterinarian.index');

require __DIR__ . '/auth.php';

Route::resource('/admin/animals', AdminAnimalController::class)->middleware(['auth'])->names('admin.animals');
Route::resource('/user/animals', UserAnimalController::class)->middleware(['auth'])->names('user.animals')->only(['index', 'show']);

Route::resource('/admin/hospitals', AdminHospitalController::class)->middleware(['auth'])->names('admin.hospitals');
Route::resource('/user/hospitals', UserHospitalController::class)->middleware(['auth'])->names('user.hospitals')->only(['index', 'show']);

Route::resource('/admin/veterinarians', AdminVeterinarianController::class)->middleware(['auth'])->names('admin.veterinarians');
Route::resource('/user/veterinarians', UserVeterinarianController::class)->middleware(['auth'])->names('user.veterinarians')->only(['index', 'show']);
