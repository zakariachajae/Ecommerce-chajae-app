<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $fillable = [
        'id',
        'nom',
        'image_file',
        'description',
        'genre',
        'prix',
        'nbr_panier',
    ];
    use HasFactory;
}
