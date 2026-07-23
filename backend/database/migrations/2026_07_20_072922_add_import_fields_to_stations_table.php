<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stations', function (Blueprint $table) {

            $table->unsignedBigInteger('external_id')
                ->nullable()
                ->unique()
                ->after('id');

            $table->string('source', 30)
                ->default('manual')
                ->after('status');

            $table->boolean('verified')
                ->default(false)
                ->after('source');

            $table->timestamp('last_synced_at')
                ->nullable()
                ->after('verified');

                
        });
    }

    public function down(): void
    {
        Schema::table('stations', function (Blueprint $table) {

            $table->dropColumn([
                'external_id',
                'source',
                'verified',
                'last_synced_at',
            ]);

        });
    }
};