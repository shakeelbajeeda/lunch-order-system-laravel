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
        Schema::create('all_energy_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->decimal('price', 8,2);
            $table->decimal('administration_fee', 8, 2);
            $table->decimal('energy_tax', 8, 2);
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
        Schema::dropIfExists('all_energy_types');
    }
};
