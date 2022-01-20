<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name'
    ];

    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }
}
