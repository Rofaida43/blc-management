<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {

            $table->id();

            $table->string('nom');

            $table->enum('categorie', [
                'entree',
                'boisson',
                'dessert',
                'snacks'
            ]);

            $table->decimal('prix', 10, 2);

            $table->unsignedInteger('stock')->default(0);

            $table->enum('unite', [
                'piece',
                'sachet',
                'bouteille',
                'canette',
                'plateau'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};

