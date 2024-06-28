<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Add the name column to fillable
        'status', // Add the name column to fillable
        'image', // Add the name column to fillable
        'price', // Add the name column to fillable
        'description', // Add the name column to fillable
        'feature', // Add the name column to fillable
    ];
}
