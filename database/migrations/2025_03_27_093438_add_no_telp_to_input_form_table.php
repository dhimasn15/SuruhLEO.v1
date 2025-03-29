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
        Schema::table('input_form', function (Blueprint $table) {
            $table->string('no_telp')->after('name'); // Menambah kolom no_telp setelah kolom name
        });
    }
    
    public function down()
    {
        Schema::table('input_form', function (Blueprint $table) {
            $table->dropColumn('no_telp');
        });
    }
    
};
