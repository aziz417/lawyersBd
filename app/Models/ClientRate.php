<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRate extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lawyer_id',
        'rate',
    ];
}
