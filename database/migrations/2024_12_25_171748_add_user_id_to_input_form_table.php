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
        Schema::table('input_form', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Menambah kolom user_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('input_form', function (Blueprint $table) {
            $table->dropColumn('user_id'); // Menghapus kolom user_id jika rollback
        });
    }
};
