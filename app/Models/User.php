<?php

namespace App\Models;

use App\Registration;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create(array $array)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'registration_id',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function register(){
        return $this->belongsTo(Registration::class, 'registration_id');
    }

    public function casesWithCondition(){
        return $this->hasMany(Cases::class, 'lawyer_id');
    }
    public function userCasesWithCondition(){
        return $this->hasMany(Cases::class, 'user_id');
    }

    public function cases(){
        return $this->casesWithCondition()->whereNotIn('status', ['submitted']);
    }

    public function userCases(){
        return $this->userCasesWithCondition()->whereNotIn('status', ['submitted']);
    }

    public function rate(){
        return $this->belongsTo(Rate::class, 'id', 'registration_id');
    }

    public function requestCases(){
        return $this->belongsToMany(Cases::class, 'case_request', 'lawyer_id', 'case_id');
    }
}
