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
            $table->foreignId('category_id')->nullable() ->constrained('categories')->onDelete('set null');
            $table->string('name', 100);
            $table->string('slug');
            $table->bigInteger('price')->default(0);
            $table->bigInteger('size')->default(0);
            $table->bigInteger('thc')->default(0);
            $table->bigInteger('cbd')->default(0);
            $table->bigInteger('sku')->default(0);
            $table->bigInteger('discount')->default(0);
            $table->boolean('discount_enable')->default(1);
            $table->string('img_main');
            $table->json('images');
            $table->text('description');
            $table->string('title_seo', 100);
            $table->text('description_seo');
            $table->string('keywords');
            $table->string('plant_type');
            $table->string('effects');
            $table->tinyInteger('rating')->default(0);
            $table->boolean('is_published')->default(1);
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
        Schema::dropIfExists('products');
    }
};
