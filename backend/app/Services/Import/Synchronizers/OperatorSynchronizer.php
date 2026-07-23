<?php

declare(strict_types=1);

namespace App\Services\Import\Synchronizers;

use App\Data\Station\OperatorData;
use App\Models\Operator;
use Illuminate\Support\Str;

final class OperatorSynchronizer
{
    public function sync(OperatorData $operatorData): Operator
    {
        return Operator::firstOrCreate(
            [
                'slug' => Str::slug($operatorData->name),
            ],
            [
                'name' => $operatorData->name,
                'is_active' => true,
            ]
        );
    }
}