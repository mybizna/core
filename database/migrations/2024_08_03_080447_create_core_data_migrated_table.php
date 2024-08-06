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
        Schema::create('core_data_migrated', function (Blueprint $table) {
            $table->id();

            $table->string('module', 255);
            $table->string('table_name', 255);
            $table->string('array_key', 255);
            $table->string('hash', 255);
            $table->integer('item_id')->nullable()->default(null);
            $table->integer('counter')->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_data_migrated');
    }
};
