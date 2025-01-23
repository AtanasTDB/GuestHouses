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
        Schema::create('guest_Houses_ImageUrls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('guest_house_id')->constrained()->onDelete('cascade');
            $table->string('image_path');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_Houses_ImageUrls');
    }
};
