<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clarification extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'cel',
        'telephone',
        'email',
        'clarification'
    ];

    public function debtor()
    {
        return $this->belongsTo(Debtor::class);
    }
}
