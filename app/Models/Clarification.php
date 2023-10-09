<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clarification extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'cel',
        'telephone',
        'email',
        'clarification'
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
