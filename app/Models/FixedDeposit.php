<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDeposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank',
        'amount',
        'start_date',
        'maturity_date',
        'interest_rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
