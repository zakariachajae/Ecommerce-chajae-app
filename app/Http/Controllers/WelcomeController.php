<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class WelcomeController extends Controller
{
    public function index()
    {

        $dernierProduits = Produit::orderBy('created_at', 'DESC')->limit(15)->get();
        $tendanceProduits = Produit::orderBy('nbr_panier', 'DESC')->limit(15)->get();
        return view('welcome', compact('dernierProduits', 'tendanceProduits'));
    }

    public function search(Request $request)
    {
        $rechercheProduits = Produit::where('nom', 'like', '%'.$request->name.'%')->get();
        return view('search', compact('rechercheProduits'));
    }
}
