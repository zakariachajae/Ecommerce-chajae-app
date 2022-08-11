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

                ]
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

    public function sortByLatest()
    {
        $dernierProduits = Produit::orderBy('created_at', 'DESC')->simplePaginate(3);
        return view('orderBy.latest', compact('dernierProduits'));
    }
    public function sortByOldest()
    {
        $premierProduits = Produit::orderBy('created_at', 'ASC')->simplePaginate(3);
        return view('orderBy.oldest', compact('premierProduits'));
    }
    public function sortByPopularity()
    {
        $tendanceProduits = Produit::orderBy('nbr_panier', 'DESC')->simplePaginate(3);
        return view('orderBy.popularity', compact('tendanceProduits'));
    }
    public function sortByPrice()
    {
        $Produits = Produit::orderBy('prix', 'ASC')->simplePaginate(3);
        return view('orderBy.price', compact('Produits'));
    }
    public function sortByPrices()
    {
        $Produits = Produit::orderBy('prix', 'DESC')->simplePaginate(3);
        return view('orderBy.price', compact('Produits'));
    }

   
}
