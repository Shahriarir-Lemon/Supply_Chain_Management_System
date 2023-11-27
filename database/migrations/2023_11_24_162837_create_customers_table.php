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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('category_id');
              $table->string('c_picture')->nullable();
              $table->string('c_fullname');
              $table->string('c_username');
              $table->string('c_about')->nullable();
              $table->string('c_email')->unique();
              $table->string('password');
              $table->string('c_address')->nullable();
              $table->string('c_city')->nullable();
              $table->integer('c_zip')->nullable();
              $table->string('c_occupation')->nullable();
              $table->rememberToken();
              $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
