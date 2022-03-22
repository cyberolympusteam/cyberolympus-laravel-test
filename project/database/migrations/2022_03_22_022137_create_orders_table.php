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
            $table->increments('id');
            $table->string('invoice_id', 50);
            $table->foreignId('customer_id');
            $table->string('name');
            $table->string('phone', 50);
            $table->text('address');
            $table->string('keluarahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('province');
            $table->string('kode_pos');
            $table->string('latitude');
            $table->string('longtitude');
            $table->foreignId('agent_id');
            $table->string('payment_method');
            $table->string('payment_link');
            $table->dateTime('payment_date');
            $table->string('buy_by', 100);
            $table->double('payment_total');
            $table->integer('coupon_id');
            $table->string('payment_discount_code', 30);
            $table->double('payment_discount');
            $table->double('payment_final');
            $table->float('order_weight');
            $table->float('order_distance');
            $table->double('delivery_fee');
            $table->integer('delivery_status');
            $table->string('delivery_track');
            $table->string('delivery_time', 100);
            $table->string('delivery_date', 50);
            $table->dateTime('order_time');
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
};
