<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static select(string $string, string $string1)
 * @method static create(array $array)
 */
class Division extends Model
{
    protected $fillable = ['name', 'bn_name'];
}
