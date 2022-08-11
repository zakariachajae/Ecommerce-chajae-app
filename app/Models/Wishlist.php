<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table='wishlists';
    protected $fillable=[
        'user_id', 
        'produit_id',
        'nom_produit',
        'description_produit',
        'genre_produit',
        'prix_produit',
    
    ];
}
