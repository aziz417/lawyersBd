<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Union extends Model
{
    protected $fillable = ['upazila_id', 'name', 'bn_name'];
}
