<div wire:poll.1s>
    @if($participant)
        <h2>Participant Details</h2>
        <p><strong>Bib Number:</strong> {{ $participant->{"bib-number"} }}</p>
        <p><strong>Name:</strong> {{ $participant->{"runner"} }}</p>
    @else
        <p>No participant found.</p>
    @endif 
</div>