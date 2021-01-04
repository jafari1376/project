<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::with('photo')->whereId($id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return back();
    }

//    public function PricePoint($prices)
//    {
//        return number_format($prices,0);
//    }

    public function removeItem(Request $request, $id){
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);
        return back();
    }

    public function getCart()
    {

        $cart = Session::has('cart') ? Session::get('cart') : null;
        if (Auth::check()){
            $user=User::with('photo')->findOrFail(Auth::user()->id);
            return view('carts', compact(['user','cart']));
        }
        else{
            return view('carts', compact(['cart']));
        }
    }
}
