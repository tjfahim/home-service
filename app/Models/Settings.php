<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'logo',
        'favicon',
        'webtitle',
        'callnownumber',
        'location',
        'whatsapp',
        'email',
        'opentime',
        'facebook',
        'twitter',
        'instagram',
    ];
}
