<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Cart;
use Session;

class CartComponent extends Component
{
    public function render()
    {
        if( Session::get('user')){
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
            return view('livewire.cart-component', ['items' => $items, 'total'=>$total])->layout('layouts.layout');
        }
        return view('livewire.cart-component', ['items' => [], 'total'=>0])->layout('layouts.layout');
    }
     
    public function addToCart(Request $request) {
        if($request->session()->has('user')) {
            $cart = new Cart;
            $cart->uid = $request->session()->get('user')['id'];
            $cart->bookId = $request->book_id;
            $cart->save();
            return back();
        } else {
            return redirect('/login');
        }
    }

    static public function cartItem()
    {
        if(!Session::get('user')){
            return 0;
        }
        return Cart::where('uid', Session::get('user')['id'])->count();
    }

    public function deleteCartItem($id)
    {   
        $deletedItem = Cart::where('cart.bookId', $id)->first();
        Cart::destroy($deletedItem->id);

        return back();
    }

}
