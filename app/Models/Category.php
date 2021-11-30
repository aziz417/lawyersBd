<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @method static where(string $string, $section_name)
 * @method static create(array $all)
 * @method static latest()
 * @method static get(string $string)
 */
class Category extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'position',
        'slug',
    ];

    public function classType()
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function createdUser()
    {
       
    }

    public function updatedUser()
    {
       
    }


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
            
        });
        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
           
            
        });

    }
}
