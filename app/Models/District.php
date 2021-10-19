<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class District extends Model
{
    protected $fillable = ['division_id', 'name', 'bn_name'];
}
