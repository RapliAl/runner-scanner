<?php

use App\Livewire\BibCheck;
use App\Livewire\BibDisplay;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/bib-check');
});

Route::get('/bib-check', BibCheck::class);
Route::get('/bib-display', BibDisplay::class);