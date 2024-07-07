<?php

use App\Http\Controllers\AppZipper;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [AppZipper::class, 'cypher'])->name('creation');
