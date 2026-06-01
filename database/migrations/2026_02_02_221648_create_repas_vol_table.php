<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('repas_vol', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vol_id')->constrained()->onDelete('cascade');
            $table->foreignId('repas_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repas_vol');
    }
};

