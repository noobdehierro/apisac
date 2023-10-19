<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'quota_number',
        'payment_date',
        'paid_amount',
        'status',
        'created_at',
    ];

    public function debtor()
    {
        return $this->belongsTo(Debtor::class);
    }
}
