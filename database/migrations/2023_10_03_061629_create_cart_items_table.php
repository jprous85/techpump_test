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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->uuid();
            $table->foreignUuid('cart_uuid');
            $table->foreignUuid('product_uuid');
            $table->integer('amount');
            $table->timestamps();

            $table->primary('uuid');

            $table->foreign('cart_uuid')->references('uuid')->on('carts');
            $table->foreign('product_uuid')->references('uuid')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
