<div>  
    <form wire:submit.prevent="search">
        <div>
            <strong for="bib-number">Bib Number:</strong>
            <input type="text" wire:model.live="displayData" placeholder="Enter Bib Number">
        </div>
        <button type="submit">Search</button>
    </form>
</div>  