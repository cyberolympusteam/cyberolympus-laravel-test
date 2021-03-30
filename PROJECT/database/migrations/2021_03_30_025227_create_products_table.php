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
            $table->string('product_name');
            $table->string('category');
            $table->string('type');
            $table->string('item');
            $table->float('weight');
            $table->string('sku');
            $table->float('price_sell');
            $table->float('price_promo');
            $table->float('price_agent');
            $table->string('photo');
            $table->string('recmmendation');
            $table->string('description');
            $table->tinyInteger('status');
            $table->string('ordering');
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
}