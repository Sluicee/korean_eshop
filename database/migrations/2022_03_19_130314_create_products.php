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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->float('price');
            $table->integer('sale')->nullable();
            $table->boolean('stock');
            $table->string('description');
            $table->integer('mass');
            $table->string('taste', 100)->nullable();
            $table->integer('code');
            $table->integer('expiration_date');
            $table->string('storage_conditions');
            $table->integer('energy_value');
            $table->string('composition');
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
        Schema::dropIfExists('products');
    }
};
