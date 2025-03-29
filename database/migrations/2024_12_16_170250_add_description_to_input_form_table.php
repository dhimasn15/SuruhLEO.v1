<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToInputFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('input_form', function (Blueprint $table) {
            $table->text('description')->nullable()->after('gender');  // Menambahkan kolom deskripsi
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('input_form', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
