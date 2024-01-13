<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->string('address');
            $table->unsignedBigInteger('user_id')->constrained();
            $table->string('order_status')->default('Pending');
            $table->string('delevery_status')->default('Pending');
           // $table->foreignId('cus_oder_detail')->references('id')->on('cus_oder_details')->onDelete('cascade');
            $table->double('total_price')->default(0.0);
            $table->string('payment_status')->default('Cash_On_Delivery');
            $table->string('man')->default('0');
            
            $table->text('order_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order1s');
    }
};
