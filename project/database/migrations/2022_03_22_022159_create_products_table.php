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
            $table->increments('id');
            $table->string('product_name');
            $table->foreignId('category');
            $table->string('type', 30);
            $table->string('item', 30);
            $table->float('weight');
            $table->string('sku', 100);
            $table->double('price_sell');
            $table->double('price_promo');
            $table->double('price_agent');
            $table->string('photo');
            $table->string('recomendation', 20);
            $table->text('description');
            $table->string('status');
            $table->integer('ordering');
            // $table->timestamps();
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
