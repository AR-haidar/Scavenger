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
        Schema::create('waste_items', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // nama sampah
            $table->enum('category', ['organik', 'anorganik', 'b3']);

            $table->text('description')->nullable();
            $table->text('composition')->nullable();
            $table->text('impact')->nullable();
            $table->text('handling')->nullable();
            $table->text('recycling')->nullable();

            $table->string('image_path')->nullable(); // simpan path gambar

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_items');
    }
};
