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
        Schema::create('cus_oder_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('cus_order_id')->constrained();
            $table->string('product_name');
            $table->string('price');
            $table->string('status')->default('Pending');
            $table->integer('quantity');
            $table->double('subtotal');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cus_oder_details');
    }
};
