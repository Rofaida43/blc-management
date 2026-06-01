<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::table('blc_lignes', function (Blueprint $table) {
        $table->decimal('prix_unitaire', 10, 2)->after('quantite');
    });
}

public function down()
{
    Schema::table('blc_lignes', function (Blueprint $table) {
        $table->dropColumn('prix_unitaire');
    });
}


};
