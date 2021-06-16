<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

//routing login dan register
Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

//routing autentikasi dan fitur
Route::group(['middleware' => 'auth'],function(){
    Route::get('/siperan',[MahasiswaController::class,'index'])->name('mahasiswas.index');
    //view pengajuan
    Route::view('/ktpform', 'ktpform');
    Route::view('/formuser', 'formuser');

    Route::get('/pengajuan', [MahasiswaController::class, 'pengajuan'])->name('siperan.pengajuan');
    Route::get('/pengajuan/member', [MahasiswaController::class, 'pengajuanmember'])->name('siperan.pengajuanmember');
    Route::post('/mahasiswas',[MahasiswaController::class,'store'])->name('mahasiswas.store');
    //fitur
    Route::get('/mahasiswas/{id}',[MahasiswaController::class,'show']);
    Route::get('/mahasiswas/{mahasiswa}/edit',[MahasiswaController::class,'edit'])->name('mahasiswas.edit');
    Route::patch('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'update'])->name('mahasiswas.update');
    Route::delete('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'destroy'])->name('mahasiswas.destroy');
    Route::get('/siperan-delete',[MahasiswaController::class, 'delete']);
    //Route::get('/editprofil', [AuthController::class, 'editprofil'])->name('siperan.editprofil');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    //fitur sorting AND search
    Route::get('/search', [MahasiswaController::class, 'search']);
    Route::get('/sortbynama', [MahasiswaController::class, 'sortynama']);
    Route::get('/sortbytanggal', [MahasiswaController::class, 'sortytanggal']);
    Route::get('/sortbykategori', [MahasiswaController::class, 'sortykategori']);
});
