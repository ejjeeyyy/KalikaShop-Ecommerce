<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'category',
        // 'tags',
        'description',
        'image',
    ];
}
