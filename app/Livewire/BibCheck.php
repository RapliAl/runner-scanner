<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Participant;
use Illuminate\Support\Facades\Session;

class BibCheck extends Component
{
    
     public $displayData;
    
    public function search()
    {
        Session::put('search_bib', $this->displayData);

    }

    public function render()
    {
        return view('livewire.bib-check');
    }
}
