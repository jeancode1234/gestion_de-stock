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
        Schema::create('sortirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users','id');
            $table->foreignId('commande_id')->constrained('commandes','id');
            $table->decimal('prixSortie');
            $table->date('dateSortie');
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sortirs');
    }
};
