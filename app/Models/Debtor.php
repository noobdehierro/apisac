<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SDamian\Larasort\AutoSortable;

class Debtor extends Model
{
    use HasFactory;
    use AutoSortable;

    private array $sortables = [
        'full_name',
        'status',
        'sce',
        'origin_bank',
    ];

    protected $fillable = [
        'access_code',
        'credit_number',
        'full_name',
        'status',
        'remainingDebt',
        'nextPayday',
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
        'payment_bank_full_name',
        'interbank_key',
        'product',
        'phone',
        'email',
        'portfolio',
        'phone_1',
        'phone_2',
        'nvo_rfc',
        'marca',
        'modelo',
        'vehicle_year',
        'vin',
        'origin_bank',
        'status_id'
    ];

    public function statusNotification()
    {
        return $this->belongsTo(Status_notification::class, 'status_id');
    }
}
// $table->string('nvo_rfc')->nullable();
//             $table->string('marca')->nullable();
//             $table->string('modelo')->nullable();
//             $table->string('vehicle_year')->nullable();
//             $table->string('vin')->nullable();