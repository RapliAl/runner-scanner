<div>
    <h1 style="text-align: center;">
        Bib Check - Search Participant
    </h1>
    
    <!-- Flash message -->
    @if (session('message'))
        <div style="background: #d4edda; color: #155724; padding: 10px; margin: 10px; border-radius: 5px;">
            {{ session('message') }}
        </div>
    @endif
    
    <form wire:submit.prevent="search">
        <div style="margin-bottom: 15px; text-align: center;">
            <label for="search"><strong>Search by Bib Number or Runner Name:</strong></label><br>
            <input type="text" 
                   wire:model.live="displayData" 
                   placeholder="Enter Bib Number (EV0001) or Runner Name (Rapli)" 
                   style="padding: 10px; width: 400px; border: 1px solid #ccc; border-radius: 5px; margin-top: 5px;">
        </div>
    </form>
    
    <!-- Live preview of what will be searched -->
    @if($displayData)
        <div style="background: #0000; padding: 10px; margin: 10px; border-radius: 5px; text-align: center;">
            <strong>Will search for:</strong> {{ $displayData }}
            @if(is_numeric($displayData))
                <em>(searching as Bib Number)</em>
            @else
                <em>(searching as Runner Name)</em>
            @endif
        </div>
    @endif
</div>
