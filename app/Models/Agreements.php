<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreements extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'status',
        'agreement_type',
        'number_installments',
        'unit_time',
        'amount_per_installment',
        'created_at',
    ];

    public function debtor()
    {
        return $this->belongsTo(Debtor::class);
    }
}
