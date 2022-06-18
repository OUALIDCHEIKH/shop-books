<?php

namespace App\Http\Livewire;

use App\Models\bookCategories;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class GlobalSearchComponent extends Component
{
    use WithPagination;
    public $searchbook;

    public function mount()
    {
        $this->searchbook = request()->get('search');
    }
    
    public function render()
    {
        $books = DB::table('books')
        ->join('bookCategories', function($join)
        {
            $join->on('bookCategories.id', '=', 'books.category_id')
                 ->where('title', 'like','%'.$this->searchbook.'%');
        })
        ->get();

        $categories = bookCategories::all();

        // dd($this->searchbook);

        return view('livewire.shop-component',['books'=>$books,'categories'=>$categories])->layout('layouts.layout');
    }
}
 