<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use HasFactory, SoftDeletes;

   protected $fillable = [
    'external_id',
    'operator_id',

    'name',

    'address',
    'city',
    'state',
    'postcode',

    'latitude',
    'longitude',

    'opening_hours',

    'description',

    'is_public',

    'status',

    'source',

    'verified',

    'last_synced_at',
];

   protected $casts = [
    'opening_hours' => 'array',

    'is_public' => 'boolean',

    'verified' => 'boolean',

    'last_synced_at' => 'datetime',
];
    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function connectors()
    {
        return $this->hasMany(StationConnector::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(
            Amenity::class,
            'station_amenities'
        );
    }
}