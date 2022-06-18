<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PageNotFoundComponent extends Component
{
    public function render()
    {
        return view('livewire.page-not-found-component')->layout('layouts.layout');
    }
}
