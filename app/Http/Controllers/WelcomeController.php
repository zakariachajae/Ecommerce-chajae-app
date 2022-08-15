<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Wishlist;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {

        $dernierProduits = Produit::orderBy('created_at', 'DESC')->limit(15)->get();
        $tendanceProduits = Produit::orderBy('nbr_panier', 'DESC')->limit(15)->get();
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
      
        session()->put('nbr_wishlist',count($wishlists) );
        return view('welcome', compact('dernierProduits', 'tendanceProduits'));
    }

    public function search(Request $request)
    {
        $rechercheProduits = Produit::where('nom', 'like', '%'.$request->name.'%')->simplePaginate(9);
        return view('search', compact('rechercheProduits'));
    }

    public function storeNewsletter(Request $request){

        $request->validate([
            'email' => ['required', 'email','unique:newsletters'],
        ]);

        Newsletter::create([
            
            'email' => $request->email,
        ]);
        return redirect()->back();

    }
}
