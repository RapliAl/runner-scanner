<?php

use App\Livewire\BibCheck;
use App\Livewire\BibDisplay;
use App\Livewire\TestDisplay;
use App\Models\Participant;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Livewire\Connect\Register;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    return redirect('/bib-check');
});

Route::get('/bib-check', BibCheck::class);
Route::get('/bib-display', BibDisplay::class);
// Route::get('/test-display', TestDisplay::class);

// Route test session
Route::post('/test-session', function (Illuminate\Http\Request $request) {
    Session::put('search_bib', $request->input('search_bib', 'EV0001'));
    return response()->json(['status' => 'success', 'data' => Session::get('search_bib')]);
});

// Route untuk generate QR code
Route::get('/qr/{participant}', [QrCodeController::class, 'show'])->name('qr.show');