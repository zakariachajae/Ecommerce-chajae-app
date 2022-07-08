<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function cart()
    {
        $total=0;
        if (session('cart')!==null){
            foreach(session('cart') as $id=>$details){
                $total += $details['price'] * $details['quantity'];
            }
        }
        return view('panier',compact('total'));
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
            return redirect()->back();
        }
    }
}
