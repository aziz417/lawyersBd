<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @method static create(array $array)
 * @method static Where(string $string, $id)
 */
class Experience extends Model
{
    protected $fillable = [
        //Professional Experience
        'registration_id',
        'designation',
        'start_date',
        'responsibilities',
        'organization_name',
        'end_date',
        'till_now',
    ];
}
