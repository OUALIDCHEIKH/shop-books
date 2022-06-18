<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use Session;
class CheckoutComponent extends Component
{
    public function render()
    {
        $user = Session::get('user')['id'];
        $items = DB::table('cart')
                ->join('books', 'cart.bookId', '=', 'books.id')
                ->where('cart.uid', $user)
                ->select('books.*')
                ->get();
        $total = DB::table('cart')
                ->join('books', 'cart.bookId', '=', 'books.id')
                ->where('cart.uid', $user)
                ->sum('books.price');

        return view('livewire.checkout-component', ['items' => $items, 'total'=>$total, 'name' => Session::get('user')['name'], 'email' => Session::get('user')['email']])->layout('layouts.layout');
    }

    public function Order() {
        return redirect('/');
    }
}
