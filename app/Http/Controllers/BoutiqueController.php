<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;


class BoutiqueController extends Controller
{
    public function index()
    {

        $produits = Produit::simplePaginate(9);
        $wishlists = Wishlist::where('user_id', Auth::id())->get();

        return view('boutique', compact('produits'));
    }



    public function addToCart($id)
    {
        $product = Produit::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->nom,
                    "quantity" => 1,
                    "price" => $product->prix,

                ],

            
            ];
            session()->put('cart', $cart);

            Produit::where('id', $id)->increment('nbr_panier');
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            Produit::where('id', $id)->increment('nbr_panier');
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->nom,
            "quantity" => 1,
            "price" => $product->prix,

        ];
        session()->put('cart', $cart);
        Produit::where('id', $id)->increment('nbr_panier');
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function sort($id, $cat=null)
    {
       
        $options=null;
        switch($id ){
            case "latest" :
                $options= Produit::orderBy('created_at', 'DESC')->simplePaginate(9);
            break;
            case "oldest" :
                $options= Produit::orderBy('created_at', 'ASC')->simplePaginate(9);
            break;
            case "popularity" :
                $options= Produit::orderBy('nbr_panier', 'DESC')->simplePaginate(9);
            break;
            case "higherPrice" :
                $options= Produit::orderBy('prix', 'ASC')->simplePaginate(9);
            break;
            case "lowerPrice" :
                
            $options=Produit::orderBy('prix', 'DESC')->simplePaginate(9);
            break;
            case "catLatest" :
                $options= Produit::where('genre',$cat)->orderBy('created_at', 'DESC')->simplePaginate(9);
            break;
            case "catOldest" :
                $options= Produit::where('genre',$cat)->orderBy('created_at', 'ASC')->simplePaginate(9);
            break;
            case "catPopularity" :
                $options= Produit::where('genre',$cat)->orderBy('nbr_panier', 'DESC')->simplePaginate(9);
            break;
            case "catHigherPrice" :
                $options= Produit::where('genre',$cat)->orderBy('prix', 'ASC')->simplePaginate(9);
            break;
            case "catLowerPrice" :
                
            $options=Produit::where('genre',$cat)->orderBy('prix', 'DESC')->simplePaginate(9);
            break;
        }
      
        return view('sortBy', compact('options'));
    }

    public function category($id){
        $produits=Produit::where('genre',$id)->simplePaginate(9);
        $categorie=$id;
        return view('categorie',compact('produits','categorie'));
     
    }
    

   
}
