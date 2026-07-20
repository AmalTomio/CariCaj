<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Import\StationSyncService;

class ImportStations extends Command
{
    protected $signature = 'stations:import';

    protected $description = 'Import EV charging stations from OpenStreetMap';

    public function __construct(
        protected StationSyncService $syncService
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->info('Fetching stations...');

        $stats = $this->syncService->sync();

        $this->newLine();

        $this->table(
            ['Created', 'Updated'],
            [[
                $stats['created'],
                $stats['updated'],
            ]]
        );

        return self::SUCCESS;
    }
}