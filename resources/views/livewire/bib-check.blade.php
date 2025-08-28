<div>  
    <form wire:submit.prevent="search">
        <div>
            <strong>Search:</strong>
            <input type="text" wire:model="displayData" placeholder="Enter Bib Number or Runner Name">
        </div>
        <button type="submit">Search</button>
    </form>
</div>  