<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreements extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'status',
        'agreement_type',
        'created_at',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
