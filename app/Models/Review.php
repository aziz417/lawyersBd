<?php

namespace App\Models;

use App\Registration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'lawyer_id', 'title'];
}
