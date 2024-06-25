<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section1title',
        'section1subtitle',
        'section1buttontext',
        'section1buttonlink',
        'section1image',
        'section2title',
        'section2description',
        'section2buttontext',
        'section2buttonlink',
        'section2image',
        'aboutservicetitle',
        'aboutservicedescription',
    ];
}
