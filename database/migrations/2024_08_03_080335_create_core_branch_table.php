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
        Schema::create('core_branch', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained('core_company')->onDelete('cascade')->nullable()->index('company_id');
            $table->string('name')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->integer('zip')->nullable();
            $table->foreignId('country_id')->constrained('core_country')->onDelete('cascade')->nullable()->index('country_id');
            $table->string('fax', 20)->nullable();
            $table->string('phone', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_branch');
    }
};
