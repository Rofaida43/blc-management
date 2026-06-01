<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repas', function (Blueprint $table) {
            $table->id();
            $table->enum('categorie', ['entree', 'boisson', 'dessert', 'snack']);
            $table->string('nom');
            $table->decimal('prix', 10, 2);
            $table->enum('unite', ['piece','sachet','bouteille','canette','plateau']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repas');
    }
};


