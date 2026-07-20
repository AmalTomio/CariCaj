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
       Schema::create('stations', function (Blueprint $table) {
    $table->id();

    $table->string('name');

$table->foreignId('operator_id')
      ->constrained()
      ->cascadeOnUpdate()
      ->restrictOnDelete();

    $table->text('address');

    $table->string('city');

    $table->string('state');

    $table->string('postcode');

    $table->decimal('latitude', 10, 7);

    $table->decimal('longitude', 10, 7);

    $table->json('opening_hours')->nullable();

    $table->text('description')->nullable();

    $table->boolean('is_public')->default(true);

    $table->enum('status', [
        'active',
        'maintenance',
        'inactive'
    ])->default('active');

    $table->timestamps();

    $table->softDeletes();

    $table->index(['latitude', 'longitude']);
    $table->index('city');
    $table->index('state');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stations');
    }
};
