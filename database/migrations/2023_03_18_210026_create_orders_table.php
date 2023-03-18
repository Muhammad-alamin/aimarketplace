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
            $table->string('order_id',20)->default(0);
            $table->string('user_id');
            $table->string('category_id');
            $table->string('seller_id');
            $table->integer('invoice_id');
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->float('product_price',9,2);
            $table->float('grand_total',9,2);
            $table->enum('payment_method',['card','cod']);
            $table->enum('status',['Pending','Processing','Shipped','Canceled','Delivered'])->default('Pending');
            $table->string('order_date')->nullable();
            $table->string('order_month')->nullable();
            $table->string('order_year')->nullable();
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
