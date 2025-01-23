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
        Schema::create('guest_Houses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('type');
            $table->integer('single_beds');
            $table->integer('double_beds');
            $table->integer('capacity');
            $table->decimal('price_per_night',6,2);
            $table->boolean('hasPool');
            $table->boolean('hasInternet');
            $table->integer('rating');
            $table->foreignId('location_id')->constrained('guest_house_locations')->onDelete('cascade'); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_Houses');
    }
};
