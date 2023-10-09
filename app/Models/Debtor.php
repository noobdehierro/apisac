<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    use HasFactory;

    protected $fillable = [
        'access_code',
        'credit_number',
        'full_name',
        'status',
        'remainingDebt',
        'nextPayday',
        'capital',
        'sce',
        'minimum_to_collect',
        'cash',
        'nameInCash',
        '1_3_months',
        'nameIn1_3',
        '4_6_months',
        'nameIn4_6',
        '7_12_months',
        'nameIn7_12',
        '13_18_months',
        'nameIn13_18',
        '19_24_months',
        'nameIn19_24',
        'payment_reference',
        'agreement',
        'payment_bank',
        'interbank_key',
        'product',
        'phone',
        'email',
        'portfolio',
        'phone_1',
        'phone_2',
    ];
}
