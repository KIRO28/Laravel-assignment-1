<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'Author',
        'Description',
        'Date',
        'user_id'
    ];

    protected static function booted()
    {
        static::creating(function (BlogModel $blogModel) {
            if (auth()->check()) {
                $blogModel->user_id = auth()->id();
            }
        });
    }
}
