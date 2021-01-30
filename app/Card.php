<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'name', 'credit_card_number', 'month', 'year','cvc','payment_amount',
    ];
}
