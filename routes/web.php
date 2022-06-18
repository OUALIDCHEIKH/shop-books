<?php

use App\Http\Controllers\userController;
use App\Http\Livewire\GlobalSearchComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\NewsComponent;
use App\Http\Livewire\PageNotFoundComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\SingleNewsComponent;
use App\Http\Livewire\SingleProductComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('livewire.login-component');
});

Route::post('/login', 'App\Http\Controllers\userController@login')->name('login');

Route::get('/', HomeComponent::class);

Route::get('/about', AboutComponent::class)->name('about');

Route::get('/page-not-found', PageNotFoundComponent::class)->name('pagenotfound');

Route::get('/cart', CartComponent::class)->name('cart');

Route::post('/cart', 'App\Http\Livewire\CartComponent@addToCart')->name('cart');

Route::get('deleteFromCart/{id}', [CartComponent::class, 'deleteCartItem'])->name('deleteFromCart');

Route::get('/orders', [CartComponent::class, 'checkout'])->name('orders'); 

Route::get('/checkout', CheckoutComponent::class)->name('checkout'); 

Route::get('/place-order', 'App\Http\Livewire\CheckoutComponent@order')->name('place-order');

Route::get('/news', NewsComponent::class)->name('news');

Route::get('single-news', SingleNewsComponent::class)->name('singlenews');

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/single-product/{book_id}', SingleProductComponent::class)->name('singleproduct');

Route::get('/contact', ContactComponent::class)->name('contact');

Route::get('/book-category/{category_id}',CategoryComponent::class)->name('bookCategory');

Route::get('/search',GlobalSearchComponent::class)->name('bookSearch');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
