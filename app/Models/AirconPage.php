<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirconPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'description',
        'book_link',
        'service1image',
        'service2image',
        'service3image',
        'service1title',
        'service2title',
        'service3title',
        'service1description',
        'service2description',
        'service3description',
        'final_description',
        'price1',
        'price2',
        'price3',
    ];
}
