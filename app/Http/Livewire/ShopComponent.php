<?php

namespace App\Http\Livewire;

use App\Models\bookCategories;
use App\Models\Books;
use Livewire\Component;

class ShopComponent extends Component
{
    public function render()
    {
        $books = Books::paginate(15);

        $categories = bookCategories::all();

        // dd($categories,$books);

        return view('livewire.shop-component',['books'=>$books,'categories'=>$categories])->layout('layouts.layout');

    }
}
