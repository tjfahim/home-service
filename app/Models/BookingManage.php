<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingManage extends Model
{
    use HasFactory;

    protected $fillable = [
        'services_id',
        'date',
        'time',
        'name',
        'email',
        'phone',
        'description',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Services::class, 'services_id');
    }
}
