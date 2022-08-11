<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = [
        'id',
        'nom_proprietaire',
        'contenu_commentaire',
        'id_produit',
        
    ];
    use HasFactory;
}
