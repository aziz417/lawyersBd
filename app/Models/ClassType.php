<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static where(string $string, $count)
 */
class ClassType extends Model
{
    protected $fillable = [
        'class_name'
    ];
}
