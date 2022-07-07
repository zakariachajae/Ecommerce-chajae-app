<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class DashboardController extends Controller
{
    public function index(){

        $dernierProduits=Produit::orderBy('created_at','DESC')->limit(15)->get();
        return view('dashboard', compact('dernierProduits'));
    }
}
