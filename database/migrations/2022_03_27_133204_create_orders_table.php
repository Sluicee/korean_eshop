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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->text('cart');
            $table->float('total_price');
            $table->string('fio', 100);
            $table->string('address', 100)->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('status', 50)->nullable()->default('В обработке');
            $table->string('payment_status', 50)->nullable()->default('Не оплачен');
            $table->string('trackcode', 50)->nullable();
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
        Schema::dropIfExists('orders');
    }
};
