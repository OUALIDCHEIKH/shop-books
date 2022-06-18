<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SingleNewsComponent extends Component
{
    public function render()
    {
        return view('livewire.single-news-component')->layout('layouts.layout');
    }
}
