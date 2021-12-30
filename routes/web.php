<?php

use App\http\Controllers\BiroController;
use App\http\Controllers\KategoriController;
use App\http\Controllers\WisataController;
use App\http\Controllers\WisatawanController;
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

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//     Route::get('buku', function () {
//         return view('buku.index');
//     });

//     Route::get('pengarang', function () {
//         return view('pengarang.index');
//     });
// });

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//     Route::get('buku', function () {
//         return view('buku.index');
//     })->middleware(['role:admin']);

//     Route::get('pengarang', function () {
//         return view('pengarang.index');
//     })->middleware(['role:admin']);
// });
Route::get('layouts', function () {
    return view('layouts.admin');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('kategori', function () {
        return view('kategori.index');
    })->middleware(['role:admin']);
    Route::resource('kategori', KategoriController::class);

    Route::get('wisatawan', function () {
        return view('wisatawan.index');
    })->middleware(['role:admin']);
    Route::resource('wisatawan', WisatawanController::class);

    Route::get('biro', function () {
        return view('biro.index');
    })->middleware(['role:admin']);
    Route::resource('biro', BiroController::class);

    Route::get('wisata', function () {
        return view('wisata.index');
    })->middleware(['role:admin']);
    Route::resource('wisata', WisataController::class);

});

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//     Route::get('wisatawan', function () {
//         return view('wisatawan.index');
//     })->middleware(['role:admin']);
//     Route::resource('wisatawan', WisatawanController::class);
// });

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//     Route::get('biro', function () {
//         return view('biro.index');
//     })->middleware(['role:admin']);
//     Route::resource('biro', BiroController::class);
// });

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//     Route::get('wisata', function () {
//         return view('wisata.index');
//     })->middleware(['role:admin']);
//     Route::resource('wisata', WisataController::class);
// });
