<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Admin\SupportController::class, 'index'])->name('support.index');

Route::prefix('support')->group(function () {
    Route::get('/create', [App\Http\Controllers\Admin\SupportController::class, 'create'])->name('support.create');
    Route::post('/create', [App\Http\Controllers\Admin\SupportController::class, 'store'])->name('support.store');

    Route::get('/show/{id}', [App\Http\Controllers\Admin\SupportController::class, 'show'])->name('support.show');

    Route::get('/edit/{id}', [App\Http\Controllers\Admin\SupportController::class, 'edit'])->name('support.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\SupportController::class, 'update'])->name('support.update');

    Route::delete('/delete/{id}', [App\Http\Controllers\Admin\SupportController::class, 'delete'])->name('support.delete');
});

