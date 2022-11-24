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
//            $table->unsignedInteger('orderID');
            $table->foreignId('user_id')->nullable() ->constrained('users')->onDelete('set null');
            $table->unsignedInteger('amount')->default(0);
            $table->unsignedTinyInteger('payment_status')->default(0);
            $table->unsignedTinyInteger('delivery_status')->default(0);
            $table->string('payment_method');
            $table->string('country');
            $table->timestamps();
            $table->softDeletes();
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
