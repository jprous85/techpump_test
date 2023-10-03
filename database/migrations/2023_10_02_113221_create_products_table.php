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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid();
            $table->string('reference');
            $table->string('name');
            $table->string('description')->nullable();
            $table->float('price');
            $table->integer('amount');
            $table->timestamp('available');
            $table->boolean('active');
            $table->timestamps();

            $table->primary('uuid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
