<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BibDisplay extends Component
{
    public $participant;

    public function render()
    {
        $displayData = Session::get('search_bib');
        $this->participant = null;

        if ($displayData) {
            // Cari di bib-number ATAU runner dengan 1 query
            $this->participant = DB::table('participants')
                ->where('bib-number', $displayData)
                ->orWhere('runner', 'LIKE', '%' . $displayData . '%')
                ->first();
        }

        return view('livewire.bib-display', ['participant' => $this->participant]);
    }
}