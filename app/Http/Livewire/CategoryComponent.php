<?php

namespace App\Http\Livewire;

use App\Models\bookCategories;
use App\Models\Books;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class CategoryComponent extends Component
{
    use WithPagination;

    public $category_id;

    public function mount($category_id)
    {
        $this->category_id = $category_id;
    }
    
    public function render()
    {       
        $categories = bookCategories::all();

        // $books = DB::table('books')
        // ->join('categories', function($join)
        // {
        //     $join->on('categories.id', '=', 'books.category_id')
        //          ->where('category_name', 'like', $this->category_name);
        // })
        // ->get();
        $books = Books::where('category_id', $this->category_id)->get();
        
        return view('livewire.shop-component',['books'=>$books,'categories'=>$categories])->layout('layouts.layout');
    }
}
 