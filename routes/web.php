<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NccController;
use App\Http\Controllers\VattuController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/ncc', [NccController::class, 'index'])->name('ncc.index');
Route::get('/ncc/detail/{lvs_MaNCC}', [NccController::class, 'detail'])->name('ncc.detail');
Route::get('/ncc/create', [NccController::class, 'create'])->name('ncc.create');
Route::post('/ncc/create', [NccController::class, 'createSubmit'])->name('ncc.createSubmit');
Route::get('/ncc/edit/{lvs_MaNCC}', [NccController::class, 'edit'])->name('ncc.edit');  
Route::put('/ncc/update/{lvs_MaNCC}', [NccController::class, 'update'])->name('ncc.update');
Route::delete('/ncc/delete/{lvs_MaNCC}', [NccController::class, 'delete'])->name('ncc.delete');


Route::prefix('vattu')->group(function () {
    Route::get('/', [VattuController::class, 'index'])->name('vattu.index');
    Route::get('/create', [VattuController::class, 'create'])->name('vattu.create');
    Route::post('/create', [VattuController::class, 'createSubmit'])->name('vattu.createSubmit');
    Route::get('/detail/{lvs_Mavtu}', [VattuController::class, 'detail'])->name('vattu.detail');
    Route::get('/edit/{lvs_Mavtu}', [VattuController::class, 'edit'])->name('vattu.edit');
    Route::post('/update/{lvs_Mavtu}', [VattuController::class, 'update'])->name('vattu.update');
    Route::post('/delete/{lvs_Mavtu}', [VattuController::class, 'delete'])->name('vattu.delete');
});


