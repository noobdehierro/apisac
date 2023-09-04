<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unknowns extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'response',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
