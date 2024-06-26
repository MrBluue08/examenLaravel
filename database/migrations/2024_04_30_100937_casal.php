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
        Schema::create('casals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->date('data_inici');
            $table->date('data_final');
            $table->integer('n_places');
            $table->integer('id_ciutat');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('casals', function (Blueprint $table) {
            //
        });
    }
};
