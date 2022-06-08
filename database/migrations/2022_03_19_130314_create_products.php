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
            $table->string('name', 100);
            $table->integer('category')->default(0)->nullable();
            $table->float('rating', 5)->default(0)->nullable();
            $table->float('price', 5)->default(0)->nullable();
            $table->integer('sale')->default(0)->nullable();
            $table->boolean('stock')->default(false);
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
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
