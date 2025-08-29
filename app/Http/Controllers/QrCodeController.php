<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function show(Participant $participant)
    {
        try {
            // QR Code berisi bib-number saja untuk kemudahan scanning
            $qrData = $participant->{'bib-number'};
            
            // Generate QR code dengan bib-number saja
            $qrCode = QrCode::format('svg')
                           ->size(200)
                           ->margin(2)
                           ->generate($qrData);
            
            return response($qrCode)
                ->header('Content-Type', 'image/svg+xml')
                ->header('Cache-Control', 'no-cache');
                
        } catch (\Exception $e) {
            // Fallback jika error
            return response()->view('qr-error', ['error' => $e->getMessage()], 500);
        }
    }
}
