<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produit extends Model
{
    use HasFactory;
     
          protected $fillable =([
            'id_cat',
            'nom',
            'image',
            'quantite',
            'prix',
            'description'

          ]);
    public function entrers():HasMany
    {
        return $this->hasMany (Entrer:: class);
    }

    public function commandes():HasMany
    {
        return $this->hasMany (Commande:: class);
    }

    public function factures():HasMany
    {
        return $this->hasMany (Facture:: class);
    }

    public function categories():BelongsTo
    {
        return $this->belongsTo(Category:: class,'id_cat','id');
    }
   
}
