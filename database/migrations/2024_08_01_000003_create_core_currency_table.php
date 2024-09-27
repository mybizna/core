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
        Schema::create('core_currency', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255);
            $table->string('code', 255)->nullable()->default(null);
            $table->string('symbol', 255)->nullable()->default(null);
            $table->decimal('rate', 11, 2)->nullable()->default(null);
            $table->decimal('buying', 11, 2)->nullable()->default(null);
            $table->decimal('selling', 11, 2)->nullable()->default(null);
            $table->integer('published')->nullable()->default(0);
            $table->integer('is_fetched')->nullable()->default(0);
            $table->tinyInteger('is_system')->nullable()->default(0);

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
        Schema::dropIfExists('core_currency');
    }
};
