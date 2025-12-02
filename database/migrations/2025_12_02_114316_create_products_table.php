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
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('full_description')->nullable();
            $table->string('image')->nullable();
            $table->string('image_2')->nullable();
            $table->string('video')->nullable();
            $table->text('videos')->nullable();
            $table->text('reviews')->nullable();
            $table->text('delivery_info')->nullable();
            $table->string('specs')->nullable();
            $table->string('npk')->nullable();
            $table->text('features')->nullable();
            $table->text('application')->nullable();
            $table->string('makes')->nullable();
            $table->string('yg_link')->nullable();
            $table->string('amazon_link')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
