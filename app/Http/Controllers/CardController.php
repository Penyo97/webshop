<?php

namespace App\Http\Controllers;
use App\Product;
use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class CardController extends Controller
{
    function addcart($id){
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [
                $id  => [
                'id' => $product->id,
                'productname' => $product->name,
                'quantity' => 1,
                'price' => $product->price
                    ]
                ];
                session()->put('cart',$cart);
                return redirect()->route('main');
        }
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart',$cart);
            return redirect()->route('main');
        }
        $cart[$id] = [
                'id' => $product->id,
                'productname' => $product->name,
                'quantity' => 1,
                'price' => $product->price
        ];
        session()->put('cart',$cart);
        return redirect()->route('main');
    }
    function getcart(){
        $cart = Session::get('cart');
        return view('main.cart',['cart'=>$cart]);
    }
    function getorder($totalprice){
        return view('main.order',['totalprice' => $totalprice]);
    }
    function postorder(Request $request,$totalprice){
        $request->validate([
            'cardd' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvc' => 'required',
        ]);
        $cart = new Card([
            'name' => Auth::user()->name,
            'credit_card_number' => $request->cardd,
            'month' => $request->month,
            'year' => $request->year,
            'cvc' => $request->cvc,
            'payment_amount' => $totalprice,
        ]);
        $cart->save();
        Session::forget('cart');
        return redirect()->route('main')->with('success','Successfully shopping');
    }

}
