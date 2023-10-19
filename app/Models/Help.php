<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'cel',
        'telephone',
        'email',
        'telephoneContact',
    ];

    public function debtor()
    {
        return $this->belongsTo(Debtor::class);
    }
}
