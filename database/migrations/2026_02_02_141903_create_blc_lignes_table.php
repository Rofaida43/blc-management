<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blc_lignes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blc_id')->constrained('blcs')->onDelete('cascade');
            $table->foreignId('produit_id')->constrained()->onDelete('restrict');
            $table->unsignedInteger('quantite');
            $table->decimal('prix', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
            $table->foreignId('repas_id')->constrained()->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blc_lignes');
    }
};

