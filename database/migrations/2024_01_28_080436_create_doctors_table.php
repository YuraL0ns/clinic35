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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name')->nullable();
            $table->string('doctor_alias')->nullable();
            $table->text('doctor_spec')->nullable();
            $table->string('doctor_exp')->default('2000')->nullable();
            $table->text('doctor_students')->nullable();
            $table->string('doctor_initial')->default('1500')->nullable();
            $table->string('doctor_secondary')->default('1500')->nullable();
            $table->text('doctor_images')->nullable();
            $table->string('doctor_visible')->default('1');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_key')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
