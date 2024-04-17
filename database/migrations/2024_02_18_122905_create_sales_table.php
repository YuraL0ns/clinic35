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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->string('sales_title');
            $table->string('sales_alias');
            $table->text('sales_description')->nullable();
            $table->text('sales_images');

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
        Schema::dropIfExists('sales');
    }
};
