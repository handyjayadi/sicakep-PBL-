<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('bidang/datalaporanpaud',function(){
    return view('bidang/datalaporanpaud',['judul'=>'Data Laporan PAUD']);
});

Route::get('bidang/datalaporanpubkom',function(){
    return view('bidang/datalaporanpubkom',['judul'=>'Data Laporan PUBLIKASI DAN KOMUNIKASI']);
});

Route::get('bidang/datalaporansdsmp',function(){
    return view('bidang/datalaporansdsmp',['judul'=>'Data Laporan SD & SMP']);
});

Route::get('bidang/datalaporangtk',function(){
    return view('bidang/datalaporangtk',['judul'=>'Data Laporan GTK']);
});



Route::get('/',function(){
    return view('dashboard1',['judul'=>'Dashboard']);
})->middleware(['auth'])->name('dashboard');



Route::get('login',function(){
    return view('login',['judul'=>'Sign-In']);
})->name('login')->middleware('guest');

Route::get('userdata',[UserController::class,'index'])->middleware(['auth']);
//user store
Route::post('userdata',[UserController::class,'store'])->name('storeuser');
//user edit
Route::get('edituser/{id}',[UserController::class,'editV'])->middleware('auth')->name('edituser');
//edit user
Route::post('edituser/{id}',[UserController::class,'edit'])->name('edituser1');
//editpass defined
Route::post('edituser/{id}',[UserController::class,'editpass'])->name('editpass');

//deleteuser defined
Route::post('edituser/{id}',[UserController::class,'deleteuser'])->name('deleteuser');




Route::get('datakategori',[kategoriController::class,'index'=>'datakategori']);




require __DIR__.'/auth.php';
