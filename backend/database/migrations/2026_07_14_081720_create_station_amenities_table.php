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
        Schema::create('station_amenities', function (Blueprint $table) {
              $table->foreignId('station_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('amenity_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->primary([
        'station_id',
        'amenity_id'
    ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_amenities');
    }
};
