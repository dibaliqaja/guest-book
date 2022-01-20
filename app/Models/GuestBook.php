<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'organization',
        'address',
        'province_code',
        'city_code'
    ];

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_code', 'code');
    }
}
