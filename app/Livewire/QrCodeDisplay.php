<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Participant;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeDisplay extends Component
{
    public ?Participant $participant = null;

    protected $listeners = ['showQrCode'];

    public function showQrCode($participantId)
    {
        $this->participant = Participant::find($participantId);
        $this->dispatch('open-modal', id: 'qr-code-modal');
    }

    public function render()
    {
        return view('livewire.qr-code-display');
    }
}