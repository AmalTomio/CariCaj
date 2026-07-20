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
        Schema::create('station_connectors', function (Blueprint $table) {
              $table->id();

    $table->foreignId('station_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('connector_type_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->unsignedInteger('power_kw');

    $table->unsignedInteger('total_ports');

    $table->unsignedInteger('available_ports');

    $table->decimal('price_per_kwh', 8, 2)->nullable();

    $table->enum('status', [
        'available',
        'busy',
        'offline'
    ])->default('available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_connectors');
    }
};
