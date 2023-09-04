<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'access_code',
        'status',
        'created_at',
    ];

    public function debt()
    {
        return $this->hasMany(Debts::class);
    }

    public function payment()
    {
        return $this->hasMany(Payments::class);
    }

    public function agreement()
    {
        return $this->hasMany(Agreements::class);
    }
}
