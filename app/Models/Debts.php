<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debts extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'debt_amount',
        'payment_reference',
        'interbank_code',
        'payment_bank',
        'next_payment_date',
        'remaining_debt_amount',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
