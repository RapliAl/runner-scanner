<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Participant;
use Illuminate\Support\Facades\Session;

class BibCheck extends Component
{
    public $displayData;
    // public $runnerData;

    public function search()
    {
        Session::put('search_bib', $this->displayData);
        // Session::put('search_runner', $this->runnerData);
    }

    public function render()
    {
        return view('livewire.bib-check');
    }
}
