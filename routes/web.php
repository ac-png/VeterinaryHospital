<?php

use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\User\AnimalController as UserAnimalController;

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

require __DIR__ . '/auth.php';

Route::resource('/admin/animals', AdminAnimalController::class)->middleware(['auth'])->names('admin.animals');
Route::resource('/user/animals', UserAnimalController::class)->middleware(['auth'])->names('user.animals')->only(['index', 'show']);
