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
            $table->string('name');
            $table->string('title_en');
            $table->string('title_vi');
            $table->json('images');
            $table->string('main_image')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_vi')->nullable();
            $table->string('slug', 1000);
            $table->float('price');
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
