<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Concerns\ModalState;

class Modal extends Component
{
    public ModalState $state;

    public function mount()
    {
        $this->state = new ModalState;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
