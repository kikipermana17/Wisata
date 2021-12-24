<?php

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

Auth::routes(
    [
        'register' => false,
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
//     Route::get('/', function () {
//         return 'Halaman Admin';
//     });

//     Route::get('profile', function () {
//         return 'Halaman profil Admin';
//     });
// });

// Route::group(['prefix' => 'pengguna', 'middleware' => ['auth', 'role:pengguna']], function () {
//     Route::get('/', function () {
//         return 'Halaman Pengguna';
//     });

//     Route::get('profile', function () {
//         return 'Halaman profil pengguna';
//     });
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('buku', function () {
        return view('buku.index');
    });

    Route::get('pengarang', function () {
        return view('pengarang.index');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('buku', function () {
        return view('buku.index');
    })->middleware(['role:admin']);

    Route::get('pengarang', function () {
        return view('pengarang.index');
    })->middleware(['role:admin']);
});
