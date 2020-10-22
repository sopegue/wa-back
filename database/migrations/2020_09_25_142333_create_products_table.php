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
            $table->string('title');
            $table->string('description');
            $table->string('picture');
            $table->unsignedInteger('qte');
            $table->unsignedInteger('price');
            $table->timestamp('disponibility');
            $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('category_id')->references('id')->on('categorys');
            $table->foreign('shop_id')->references('id')->on('shops');
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
