<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /** @use HasFactory<\Database\Factories\ContractFactory> */
    use HasFactory;

    protected $fillable = [
        'counterparty_id',
        'type',
        'number',
        'date',
        'name',
        'currency',
        'valid_until',
    ];

    public function counterparty()
    {
        return $this->belongsTo(Counterparty::class);
    }
}
