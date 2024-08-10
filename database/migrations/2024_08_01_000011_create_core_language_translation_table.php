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
        Schema::create('core_language_translation', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->nullable();
            $table->foreignId('language_id')->constrained('core_language')->onDelete('cascade')->nullable()->index('core_language_translation_language_id');
            $table->string('phrase')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_language_translation');
    }
};
