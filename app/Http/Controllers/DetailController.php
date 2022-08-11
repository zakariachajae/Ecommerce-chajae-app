<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function detail($id)
    {
        $produit = Produit::findOrFail($id);
        $commentaires = Commentaire::where('id_produit', $id)->get();
        
        return view('detail', compact('produit','commentaires'));
    }

    public function add_comment(Request $request, $id){
        $request->validate([
            "commentaire" => "required",
        ]);
        Commentaire::create([
            'nom_proprietaire' => Auth::user()->name,
            'contenu_commentaire' => $request->commentaire,
            'id_produit' =>$id,
        ]);
        return redirect()->back();
    }
}
