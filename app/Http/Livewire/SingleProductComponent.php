<?php

namespace App\Http\Livewire;

use App\Models\bookCategories;
use App\Models\Books;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SingleProductComponent extends Component
{
    public $book_id;

    public function mount($book_id)
    {
        $this->book_id = $book_id;
    }

    public function store($book_id, $book_title, $book_qty, $book_price) {

    }

    public function render()
    {
        $book = Books::where('id', $this->book_id)->first();
        $category = bookCategories::join('books', 'books.category_id', 'bookCategories.id')->where('books.id', $this->book_id)->first(); 
        $related_books = Books::where('category_id', $category->id)->inRandomOrder()->limit(3)->get();
        
        return view('livewire.single-product-component', ['book' => $book, 'category' => $category, 'related_books' => $related_books])->layout('layouts.layout');
    }
}
