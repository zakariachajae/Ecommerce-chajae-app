<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(Request $request){

        $request->validate([
            'payment'=>'required',
        ]);
       
        Session::put('paiement', ['methode_de_paiement' =>$request->payment]);
        
        $total=0;
        $cart=session()->get('cart');
        $quantities=array();
        if ($cart!==null){
            
            foreach($cart as $id=>$details){
                $new_quantity=$request->$id;
               
                $details['quantity']=$new_quantity;
               
                $quantities += [$id => $new_quantity];
                
                
                $total += $details['price'] * $details['quantity'];
                
            }
        
         
        }
       
        
        return view('checkout',compact('total','quantities'));
    }

    public function finaliser(Request $request, int $i=1 ){

        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
            'telephone'=>'required',

        ]);
        while($i <= count(Commande::select('nom','prenom','id_commande')->distinct()->get()) ){
            $i++;
        }
        foreach(session('cart') as $id=>$details){
           
            Commande::create([
                
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'email'=>$request->email,
                'telephone'=>$request->telephone,
                'methode_paiement'=>Session::get('paiement')['methode_de_paiement'],
                'article'=>$details['name'],
                'id_commande'=>$i,

                
            ]);
            Produit::where('nom', $details['name'])->decrement('quantite_en_stock');
        
        }
      
        Session::forget('cart');
        Session::forget('paiement');
        
        return redirect('/recu')->with('success','votre commande a été etablie avec succes ');

    }

    public function recu(){
        return view('recu');
    }
}
