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
        'one_three_months',
        'nameInOne_threeMonths',
        'four_six_months',
        'nameInFour_sixMonths',
        'seven_twelve_months',
        'nameInSeven_twelveMonths',
        'thirteen_eighteen_months',
        'nameInThirteen_eighteenMonths',
        'nineteen_twentyfour_months',
        'nameInNineteen_twentyfourMonths',
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
