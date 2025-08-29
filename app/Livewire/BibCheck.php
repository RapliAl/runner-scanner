<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Participant;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class BibCheck extends Component
{
    public $displayData = '';
    public $sessionData = '';

    public function mount()
    {
        // Load existing session data
        $this->sessionData = Session::get('search_bib', '');
        $this->displayData = $this->sessionData;
    }

    public function search()
    {
        if ($this->displayData) {
            Session::put('search_bib', $this->displayData);
            $this->sessionData = $this->displayData;
        }
    }
    
    public function render()
    {
        return view('livewire.bib-check');
    }
}
