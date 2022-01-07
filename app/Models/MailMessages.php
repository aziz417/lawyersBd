<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailMessages extends Model
{

    /**
     * @method static create(string[] $array)
     * @method static latest()
     * @method static select(string $string)
     */

    use HasFactory;
    protected $fillable = ['name', 'email', 'subject', 'message'];

    public function replies(){
        return $this->hasMany(MailReplies::Class, 'mail_message_id', 'id');
    }

    const PERMISSION = [
        'show',
        'delete',
        'reply',
        'reply delete',
        'reply show',
    ];
}
