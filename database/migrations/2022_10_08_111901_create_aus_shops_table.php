<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aus_shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner');
            $table->time('opening_time')->default('9:00:00');
            $table->time('closing_time')->default('17:00:00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aus_shops');
    }
};
