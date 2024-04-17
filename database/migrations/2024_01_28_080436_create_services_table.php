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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_title');
            $table->string('service_alias');
            $table->string('service_images')->nullable();
            $table->text('service_description')->nullable();
            $table->text('service_description_pull')->nullable();

            $table->foreignIdFor('\App\Models\Razdel')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('seo_title')->nullable();
            $table->string('seo_key')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
