<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class BoutiqueController extends Controller
{
    public function index()
    {

        $produits = Produit::paginate(3);

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
        $dernierProduits = Produit::orderBy('created_at', 'DESC')->get();
        return view('orderBy.latest', compact('dernierProduits'));
    }
    public function sortByOldest()
    {
        $premierProduits = Produit::orderBy('created_at', 'ASC')->get();
        return view('orderBy.oldest', compact('premierProduits'));
    }
    public function sortByPopularity()
    {
        $tendanceProduits = Produit::orderBy('nbr_panier', 'DESC')->get();
        return view('orderBy.popularity', compact('tendanceProduits'));
    }
    public function sortByPice()
    {
        $Produits = Produit::orderBy('prix', 'ASC')->get();
        return view('orderBy.price', compact('Produits'));
    }

    public function detail($id)
    {
        $produit = Produit::findOrFail($id);
        return view('detail', compact('produit'));
    }
}
