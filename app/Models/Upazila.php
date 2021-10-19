<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 * @method static where(string $string, $id)
 * @method static orderBy(string $string, string $string1)
 */
class Upazila extends Model
{
    protected $fillable = ['district_id', 'name', 'bn_name'];
}
