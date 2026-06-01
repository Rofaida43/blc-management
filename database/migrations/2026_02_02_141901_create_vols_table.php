<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->date('date');
            $table->time('heure');
            $table->unsignedInteger('passagers');
            $table->enum('classe', ['economique', 'business', 'first class']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};


