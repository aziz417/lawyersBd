<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static uodate(array $array)
 * @method static where(string $string, $id)
 */
class Quota extends Model
{
    protected $fillable = ['registration_id', 'quota'];
}
