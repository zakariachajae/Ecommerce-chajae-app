<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Produit;

class WishlistController extends Controller
{
    public function index()
    {

        $wishlists = Wishlist::where('user_id', Auth::id())->get();
      

        return view('wishlist', compact('wishlists'));
    }

    public function ajouter($id)
    {
        $product=Produit::findOrFail($id);
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        $status= Wishlist::where('user_id', Auth::id())->where('produit_id',$id)->first();
        
        
        if(isset($status->user_id) and isset($id)){
            return redirect()->back();
        }
        else {
            
            Wishlist::create([
                'user_id' => Auth::id(),
                'produit_id' => $product->id,
                'nom_produit' => $product->nom,
                'genre_produit' => $product->genre,
                'prix_produit' => $product->prix,
            ]);
            session()->put('nbr_wishlist',count($wishlists) + 1 );
            return redirect()->back();
        }
            
        

    
    }

    public function remove($id){
        $wishlist=Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect()->back();

    }
}
