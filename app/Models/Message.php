<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 * @method static latest()
 * @method static select(string $string)
 */
class Message extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'subject', 'message'];

    public function replies(){
        return $this->hasMany(Reply::Class);
    }

    const PERMISSION = [
        'show',
        'delete',
        'reply',
        'reply delete',
        'reply show',
    ];

}
