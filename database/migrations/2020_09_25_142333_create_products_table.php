<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('sizeclothe_id')->nullable();
            $table->unsignedBigInteger('sizeshoe_id')->nullable();
            $table->string('title');
            $table->string('description');
            $table->string('picture');
            $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('category_id')->references('id')->on('categorys');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('sizeclothe_id')->references('id')->on('sizeclothes');
            $table->foreign('sizeshoe_id')->references('id')->on('sizeshoes');
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
}
