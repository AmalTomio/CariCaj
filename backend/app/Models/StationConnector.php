<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationConnector extends Model
{
    use HasFactory;

    protected $fillable = [
        'station_id',
        'connector_type_id',
        'power_kw',
        'total_ports',
        'available_ports',
        'price_per_kwh',
        'status',
    ];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function connectorType()
    {
        return $this->belongsTo(ConnectorType::class);
    }
}