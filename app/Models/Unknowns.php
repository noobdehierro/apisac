<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unknowns extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'response',
    ];

    public function debtor()
    {
        return $this->belongsTo(Debtor::class);
    }
}
