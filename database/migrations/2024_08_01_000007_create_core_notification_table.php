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
        Schema::create('core_notification', function (Blueprint $table) {
            $table->id();

            $table->string('slug');
            $table->string('short');
            $table->string('medium');
            $table->text('lengthy');
            $table->tinyInteger('enable_short')->nullable()->default(1);
            $table->tinyInteger('enable_medium')->nullable()->default(0);
            $table->tinyInteger('enable_lengthy')->nullable()->default(1);
            $table->tinyInteger('published')->nullable()->default(1);

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_notification');
    }
};
