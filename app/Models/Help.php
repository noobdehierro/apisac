<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'cel',
        'telephone',
        'email',
        'telephoneContact',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
