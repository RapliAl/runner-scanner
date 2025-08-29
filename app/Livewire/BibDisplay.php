<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BibDisplay extends Component
{
    public $participant = null;
    public $displayData = null;
    
    public function mount()
    {
        $this->refreshData();
    }
    
    public function refreshData()
    {
        $this->displayData = Session::get('search_bib');
        $this->participant = null;

        if ($this->displayData) {
            // Query database
            $this->participant = DB::table('participants')
                ->where('bib-number', $this->displayData)
                ->orWhere('runner', $this->displayData)
                ->first();
        }
    }

    public function render()
    {
        // Refresh data setiap render
        $this->refreshData();
        
        // Pass data to view using compact
        return view('livewire.bib-display', [
            'participant' => $this->participant,
            'displayData' => $this->displayData
        ]);
    }
}