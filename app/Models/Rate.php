<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'registration_id',
        'case_rate',
        'clint_rate',
        'education_rate',
        'average_rate',
        'status',
    ];
}
