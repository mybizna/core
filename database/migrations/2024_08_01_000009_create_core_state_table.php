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
        Schema::create('core_state', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('country_code', 2);
            $table->string('type', 50)->nullable();
            $table->integer('item_id')->nullable();
            $table->string('state_code', 5)->nullable()->default(null);
            $table->string('latitude', 255)->nullable()->default(null);
            $table->string('longitude', 255)->nullable()->default(null);
            $table->boolean('is_system')->default(true);

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
        Schema::dropIfExists('core_state');
    }
};
