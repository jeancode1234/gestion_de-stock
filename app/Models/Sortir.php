<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sortir extends Model
{
    use HasFactory;
    protected $fillable=([
        'id_user',
        'commande_id',
        'quantite',
        'prixSortie',
        'dateSortie'
    ]);

    public function commandes():BelongsTo
    {
        return $this->belongsTo (Commande:: class,'commande_id', 'id');
    }

    public function users():BelongsTo
    {
        return $this->belongsTo (User:: class,'id_user', 'id');
    }
}
