<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recuperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'type',
        'status',
    ];

    public function debtor()
    {
        return $this->belongsTo(Debtor::class);
    }
}
