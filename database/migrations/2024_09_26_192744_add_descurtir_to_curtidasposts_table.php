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
        Schema::table('curtidasposts', function (Blueprint $table) {
            $table->boolean('descurtir')->default(false); // Adiciona a coluna descurtir com valor padrão false
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curtidasposts', function (Blueprint $table) {
            $table->dropColumn('descurtir'); // Remove a coluna caso seja necessário reverter
        });
    }
};
