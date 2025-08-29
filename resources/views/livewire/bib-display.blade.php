<div wire:poll.2s="refreshData">
    <h1 style="text-align: center;">Bib Display</h1>
    
    @if(isset($participant) && $participant)
        <div style="border: 2px solid green; padding: 15px; margin: 10px; border-radius: 5px; text-align: center;">
            <h2>✅ Participant Found</h2>
            <p><strong>Bib Number:</strong> {{ $participant->{'bib-number'} }}</p>
            <p><strong>Name:</strong> {{ $participant->runner }}</p>
        </div>
    @else
        <div style="border: 2px solid orange; padding: 15px; margin: 10px; border-radius: 5px;">
            <h2>⏳ No participant found</h2>
            <p>Waiting for data from Scanner...</p>
            <p><small>Auto-refreshing every 2 seconds...</small></p>
        </div>
    @endif
</div>
