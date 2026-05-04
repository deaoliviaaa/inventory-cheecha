<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supplier_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('item_name');
            $table->string('store_name');
            $table->date('purchase_date');
            $table->integer('quantity')->default(1);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier_purchases');
    }
};