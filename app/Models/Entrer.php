<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrer extends Model
{
    use HasFactory;

     protected $fillable=([
          'id_fournisseur',
          'id_produit',
          'quantite',
          'prixEntree',
          'dateEntree'
     ]);

     public function produits():BelongsTo
     {
         return $this->belongsTo (Produit:: class,'id_produit', 'id');
     }
 
     public function fournisseurs():BelongsTo
     {
         return $this->belongsTo (Fournisseur:: class,'id_fournisseur', 'id');
     }
}
