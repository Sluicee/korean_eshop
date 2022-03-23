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
            $table->integer('category')->default('-');
            $table->float('price')->default(0);
            $table->integer('sale')->default(0);
            $table->boolean('stock')->default(false);
            $table->longText('description')->default('text');
            $table->integer('mass')->default(0);
            $table->string('taste')->nullable();
            $table->integer('code')->default(0);
            $table->integer('expiration_date')->default(0);
            $table->text('storage_conditions')->default("-");
            $table->integer('energy_value')->default(0);
            $table->longText('composition')->default("-");
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
