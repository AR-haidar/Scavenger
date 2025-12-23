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
        Schema::create('ai_classifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Jenis input
            $table->enum('input_type', ['image', 'text']);

            // Input user
            $table->text('input_text')->nullable();
            $table->string('input_image_path')->nullable();

            // Hasil AI (terstruktur)
            $table->string('waste_name', 150);
            $table->string('slug')->unique();
            $table->enum('category', ['organik', 'anorganik', 'b3']);
            $table->text('description')->nullable();
            $table->text('composition')->nullable();
            $table->text('handling')->nullable();
            $table->text('recycling')->nullable();
            $table->text('impact')->nullable();

            // Response mentah AI
            $table->longText('raw_ai_response')->nullable();

            // Status proses
            $table->enum('status', ['success', 'failed'])
                ->default('success');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_classifications');
    }
};
