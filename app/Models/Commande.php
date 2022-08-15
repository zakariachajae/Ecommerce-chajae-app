<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable=[
        
        'nom',
        'prenom',
        'email',
        'telephone',
        'methode_paiement',
        'article',
        'id_commande',
    ];
    use HasFactory;
}
