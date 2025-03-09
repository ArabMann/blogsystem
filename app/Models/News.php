<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        'image',
        "description",
        "user_id",
        "slug",
        "category_id",
    ];

    public function getRouteKeyName() 
    {
        // karena resource defaultnya Id dengan function getRouteKeyName bisa menggubah menggunakan slug
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
