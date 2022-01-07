<?php

namespace App\Models;

use App\Registration;
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

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function register(){
        return $this->belongsTo(Registration::class, 'user_id');
    }
    public function type(){
        return $this->belongsTo(CaseType::class, 'case_type_id');
    }
}
