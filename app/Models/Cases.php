<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $fillable = [
        'case_type_id',
        'user_id',
        'lawyer_id',
        'title',
        'caseDate',
        'coteDate',
        'document',
        'slug',
        'status',
        'description',
    ];

}
