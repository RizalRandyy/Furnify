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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                column: 'id',
                indexName: 'checkouts_user_id',
            );
            $table->foreignId('product_id')->constrained(
                table: 'products',
                column: 'id',
                indexName: 'checkouts_product_id',
            );
            $table->integer('quantity');
            $table->decimal('price_per_item', 15, 2);
            $table->decimal('total_price', 15, 2);  
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('city')->nullable();
            $table->string('proof_of_payment_path')->nullable();
            $table->boolean('payment_status')->default(false);
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
