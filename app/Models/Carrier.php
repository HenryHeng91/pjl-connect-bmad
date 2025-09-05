<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Carrier extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'company_name',
        'contact_person',
        'phone_number',
        'email',
        'cost_details',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}