<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_vente',
        'id_user',
        'dateFacture',
        'quantite'
   ];

   public function sortirs():BelongsTo
   {
       return $this->belongsTo (Sortir:: class,'id_vente', 'id');
   }

   public function users():BelongsTo
   {
       return $this->belongsTo (User:: class,'id_user','id');
   }
}
