<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counterparty extends Model
{
    /** @use HasFactory<\Database\Factories\CounterpartyFactory> */
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'full_name',
        'inn',
        'kpp',
        'legal_address',
        'actual_address',
        'phone',
        'email',
        'bank_account',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
