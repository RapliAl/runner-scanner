<div style="text-align: center; padding: 20px;">
    <h3 style="margin-bottom: 10px; color: #333;">{{ $participant->runner }}</h3>
    <p style="margin-bottom: 20px; color: #666; font-size: 16px;">
        Bib Number: <strong style="color: #007bff;">{{ $participant->{'bib-number'} }}</strong>
    </p>
    
    <!-- QR Code menggunakan route -->
    <div style="display: flex; justify-content: center; margin: 20px 0;">
        <div style="padding: 15px; background: white; border: 2px solid #e0e0e0; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <img src="{{ route('qr.show', $participant) }}" 
                 alt="QR Code untuk {{ $participant->runner }}" 
                 style="display: block; max-width: 200px; height: auto;"
                 onerror="this.style.display='none'; document.getElementById('qr-fallback').style.display='block';">
        </div>
    </div>
    
    <!-- Preview data yang akan discan -->
    {{-- <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 20px 0; text-align: center;">
        <h4 style="margin-bottom: 10px; color: #495057;">📱 Yang akan terscan:</h4>
        <div style="background: white; padding: 15px; border-radius: 5px; font-size: 24px; font-weight: bold; color: #007bff; border: 2px dashed #007bff;">
            {{ $participant->{'bib-number'} }}
        </div>
        <p style="font-size: 12px; color: #666; margin-top: 10px;">Bib Number saja - sederhana dan cepat!</p>
    </div> --}}
    
    <!-- Fallback jika QR image gagal load -->
    {{-- <div id="qr-fallback" style="display: none; padding: 20px; background: #f8f9fa; border-radius: 8px; margin: 20px 0;">
        <h4 style="color: #dc3545; margin-bottom: 15px;">QR Code Data</h4>
        <div style="background: white; padding: 15px; border-radius: 5px; font-family: monospace; text-align: center; max-width: 300px; margin: 0 auto;">
            <div style="font-size: 24px; font-weight: bold; color: #007bff; border: 2px dashed #007bff; padding: 10px; border-radius: 5px;">
                {{ $participant->{'bib-number'} }}
            </div>
        </div>
    </div>
    
    <div style="background: #e7f3ff; padding: 15px; border-radius: 8px; margin-top: 20px;">
        <p style="font-size: 14px; color: #0066cc; margin: 0;">
            📱 <strong>Scan QR Code</strong> akan memberikan bib-number: <strong>{{ $participant->{'bib-number'} }}</strong><br>
            🏃‍♂️ <strong>Sederhana</strong> - Hanya nomor bib yang terscan, mudah diproses
        </p>
    </div> --}}
</div>
