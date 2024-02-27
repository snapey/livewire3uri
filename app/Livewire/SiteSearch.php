<?php

namespace App\Livewire;

use Livewire\Component;

class SiteSearch extends Component
{
    public string $searchterm;

    public function render()
    {
        return view('livewire.site-search');
    }
}
