<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entrers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_fournisseur')->constrained('fournisseurs','id');
            $table->foreignId('id_produit')->constrained('produits','id');
            $table->decimal('prixEntree');
            $table->date('dateEntree');
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrers');
    }
};
