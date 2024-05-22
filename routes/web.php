<?php

use App\Livewire\Products\ProductCreate;
use App\Livewire\Products\ProductEdit;
use App\Livewire\Products\ProductView;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->group(function () {

    // Products
    Route::get('/products', ProductView::class)->name('products.index');
    Route::get('/products/create', ProductCreate::class)->name('products.create');
    Route::get('/products/edit/{id}', ProductEdit::class)->name('products.edit');
});
