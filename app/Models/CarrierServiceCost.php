<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierServiceCost extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['carrier_id', 'service_id', 'cost'];
}