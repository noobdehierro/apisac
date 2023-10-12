<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maps extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'help',
        'clarification',
        'imNot',
        'interested',
        'exhibition',
        'Installments',
    ];

    public function deptor()
    {
        return $this->belongsTo(Debtor::class);
    }
}
