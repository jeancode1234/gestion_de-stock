<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    use HasFactory;
    protected $fillable=[
         'id_produit',
         'id_user',
         'quantite',
         'prixVente',
         'dateCommande',

    ];

    public function produits():BelongsTo
    {
        return $this->belongsTo (Produit:: class,'id_produit','id');
    }

    public function users():BelongsTo
    {
        return $this->belongsTo (User:: class,'id_user','id');
    }
}
