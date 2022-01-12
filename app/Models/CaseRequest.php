<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CaseRequest extends Model
{
    protected $table = 'case_request';
    protected $fillable = ['case_id', 'lawyer_id'];
    use HasFactory;
}
